document.getElementById('add-btn').addEventListener('click', function () {
    const category = document.getElementById('category-select').value;
    const amount = document.getElementById('amount-input').value;
    const date = document.getElementById('date-input').value;

    if (category && amount && date) {
        const tableBody = document.getElementById('expense-table-body');
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${category}</td>
            <td>${amount}</td>
            <td>${date}</td>
            <td><button class="delete-btn">Delete</button></td>
        `;
        tableBody.appendChild(row);

        updateTotal();

        // Clear inputs after adding
        document.getElementById('category-select').value = '';
        document.getElementById('amount-input').value = '';
        document.getElementById('date-input').value = '';
    }
});

// Delete Expense Logic
document.getElementById('expense-table-body').addEventListener('click', function (event) {
    if (event.target.classList.contains('delete-btn')) {
        event.target.closest('tr').remove();
        updateTotal();
    }
});

// Update Total Calculation
function updateTotal() {
    let total = 0;
    const rows = document.querySelectorAll('#expense-table-body tr');
    rows.forEach(function (row) {
        total += parseFloat(row.cells[1].innerText) || 0;
    });
    document.getElementById('total-amount').innerText = total;
}
