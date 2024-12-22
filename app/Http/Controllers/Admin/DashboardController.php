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
    $totalIncome = Income::where('user_id', auth()->id())->sum('amount');
    $totalExpense = Expense::where('user_id', auth()->id())->sum('amount');
    
    // Calculate profit
    $profit = $totalIncome - $totalExpense;

    // Get expense and income data grouped by category
    $expenseCategories = Expense::join('expense_categories', 'expenses.expense_category_id', '=', 'expense_categories.id')
        ->where('expenses.user_id', auth()->id()) // Explicitly specify the table
        ->select('expense_categories.name as category_name', \DB::raw('sum(expenses.amount) as total'))
        ->groupBy('expenses.expense_category_id', 'expense_categories.name')
        ->get();
        
    $incomeCategories = Income::join('income_categories', 'incomes.income_category_id', '=', 'income_categories.id')
        ->where('incomes.user_id', auth()->id()) // Explicitly specify the table
        ->select('income_categories.name as category_name', \DB::raw('sum(incomes.amount) as total'))
        ->groupBy('incomes.income_category_id', 'income_categories.name')
        ->get();
    
    return view('admin.dashboard', compact('totalIncome', 'totalExpense', 'profit', 'expenseCategories', 'incomeCategories'));
}

}
