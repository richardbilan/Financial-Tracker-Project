<?php

namespace App\Http\Controllers\Admin;

use App\Models\Expense;
use App\Models\Income;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Get the total income and expenses
        $totalIncome = Income::whereUserId(auth()->id())->sum('amount');
        $totalExpense = Expense::whereUserId(auth()->id())->sum('amount');
        
        // Calculate profit
        $profit = $totalIncome - $totalExpense;

        // Get expense and income data grouped by category
        $expenseCategories = Expense::whereUserId(auth()->id())
            ->selectRaw('expense_category_id, sum(amount) as total')
            ->groupBy('expense_category_id')
            ->get();
            
        $incomeCategories = Income::whereUserId(auth()->id())
            ->selectRaw('income_category_id, sum(amount) as total')
            ->groupBy('income_category_id')
            ->get();
        
        return view('admin.dashboard', compact('totalIncome', 'totalExpense', 'profit', 'expenseCategories', 'incomeCategories'));
    }
}
