<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Expense Tracker App') }}
        </h2>
    </x-slot>

    {{-- Include styles --}}
    <link href="{{ asset('admin/css/expense-tracker.css') }}" rel="stylesheet" />

    {{-- Expense Tracker App Content --}}
    <div class="expense-container">
        <h1 class="expense-heading">Expense Tracker App</h1>
        <form action="{{ route('expenses.store') }}" method="POST">
            @csrf
            <div class="expense-input-section">
                <label for="category-select">Category:</label>
                <select name="category" id="category-select" required>
                    <option value="" disabled selected>Select a category</option>
                    <option value="Grocery">Grocery</option>
                    <option value="Rent">Rent</option>
                    <option value="Transportation">Transportation</option>
                    <option value="Water">Water Bill</option>
                    <option value="Electric Bill">Electric Bill</option>
                    <option value="Miscellaneous">Miscellaneous</option>
                </select>

                <label for="amount-input">Amount:</label>
                <input type="number" name="amount" id="amount-input" placeholder="Enter amount" required>

                <label for="date-input">Date:</label>
                <input type="date" name="date" id="date-input" required>

                <button type="submit" id="add-btn">Add</button>
            </div>
        </form>

        <div class="expense-list">
            <h2>Expenses List</h2>
            <table class="expense-table">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody id="expense-table-body">
                    @if ($expenses->isEmpty())
                        <tr>
                            <td colspan="4">No expenses found.</td>
                        </tr>
                    @else
                        @foreach ($expenses as $expense)
                            <tr>
                                <td>{{ $expense->category }}</td>
                                <td>{{ number_format($expense->amount, 2) }}</td>
                                <td>{{ $expense->date }}</td>
                                <td>
                                    <form action="{{ route('expenses.destroy', $expense->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-btn">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <td>Total:</td>
                        <td>{{ number_format($expenses->sum('amount'), 2) }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    {{-- Include scripts --}}
    <script src="{{ asset('admin/js/expense-tracker.js') }}"></script>
</x-app-layout>
