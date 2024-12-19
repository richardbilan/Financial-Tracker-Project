let expenses = [];
let totalAmount = 0;

const categorySelect = document.getElementById('category-select');
const amountInput = document.getElementById('amount-input');
const dateInput = document.getElementById('date-input');
const addBtn = document.getElementById('add-btn');
const expensesTableBody = document.getElementById('expnese-table-body');
const totalAmountCell = document.getElementById('total-amount');
const printBtn = document.getElementById('print-btn');

addBtn.addEventListener('click', function() {
    const category = categorySelect.value;
    const amount = Number(amountInput.value);
    const date = dateInput.value;

    // Validation
    if (category === '') {
        alert('Please select a category');
        return;
    }
    if (isNaN(amount) || amount <= 0) {
        alert('Please enter a valid amount');
        return;
    }
    if (date === '') {
        alert('Please select a date');
        return;
    }

    // Add the new expense
    const expense = { category, amount, date };
    expenses.push(expense);

    // Update total amount
    totalAmount += amount;
    totalAmountCell.textContent = totalAmount;

    // Create new row for the expense
    const newRow = expensesTableBody.insertRow();

    const categoryCell = newRow.insertCell();
    const amountCell = newRow.insertCell();
    const dateCell = newRow.insertCell();
    const deleteCell = newRow.insertCell();
    const deleteBtn = document.createElement('button');

    deleteBtn.textContent = 'Delete';
    deleteBtn.classList.add('delete-btn');
    deleteBtn.addEventListener('click', function() {
        // Remove expense from array
        const index = expenses.indexOf(expense);
        if (index > -1) {
            expenses.splice(index, 1);
        }

        // Update total amount
        totalAmount -= expense.amount;
        totalAmountCell.textContent = totalAmount;

        // Remove the row from the table
        expensesTableBody.removeChild(newRow);
    });

    categoryCell.textContent = expense.category;
    amountCell.textContent = expense.amount;
    dateCell.textContent = expense.date;
    deleteCell.appendChild(deleteBtn);
});

// Print button functionality
printBtn.addEventListener('click', () => {
    const printContent = document.querySelector('.expenses-list').innerHTML; // Only print the table
    const originalContent = document.body.innerHTML;

    document.body.innerHTML = printContent; // Replace body content with table content
    window.print(); // Open print dialog
    document.body.innerHTML = originalContent; // Restore original content
    window.location.reload(); // Reload to restore event listeners
});
