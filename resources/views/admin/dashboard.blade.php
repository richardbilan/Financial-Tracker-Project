@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="row">
        <!-- Total Income -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Income</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">₱{{ number_format($totalIncome, 2) }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Expense -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Expense</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">₱{{ number_format($totalExpense, 2) }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-credit-card fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Profit -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Profit</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">₱{{ number_format($profit, 2) }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chart-line fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <!-- Expense Category Breakdown -->
        <div class="col-xl-6 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Expense Category Breakdown</h6>
                </div>
                <div class="card-body">
                    <canvas id="expenseCategoryChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Income Category Breakdown -->
        <div class="col-xl-6 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Income Category Breakdown</h6>
                </div>
                <div class="card-body">
                    <canvas id="incomeCategoryChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>


     <!-- Print Section -->
     <div class="row mt-4">
        <div class="col-12">
            <div id="printSection" class="p-3 border bg-light">
                <h4>Financial Summary</h4>
                <p><strong>Month & Year:</strong> {{ now()->format('F Y') }}</p>
                <p><strong>Total Income:</strong> ₱{{ number_format($totalIncome, 2) }}</p>
                <p><strong>Total Expense:</strong> ₱{{ number_format($totalExpense, 2) }}</p>
                <p><strong>Profit:</strong> ₱{{ number_format($profit, 2) }}</p>
            </div>
            <button class="btn btn-primary mt-3" onclick="printSummary()">Print</button>
        </div>
    </div>
</div>
<br>
<br>




<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Chart for expense categories
    const ctx1 = document.getElementById('expenseCategoryChart').getContext('2d');
    const expenseCategoryChart = new Chart(ctx1, {
        type: 'pie',
        data: {
            labels: @json($expenseCategories->pluck('category_name')),
            datasets: [{
                data: @json($expenseCategories->pluck('total')),
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
            }]
        }
    });

    // Chart for income categories
    const ctx2 = document.getElementById('incomeCategoryChart').getContext('2d');
    const incomeCategoryChart = new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: @json($incomeCategories->pluck('category_name')),
            datasets: [{
                data: @json($incomeCategories->pluck('total')),
                backgroundColor: ['#4CAF50', '#FFC107', '#2196F3']
            }]
        }
    });

    function printSummary() {
        const printContents = document.getElementById('printSection').innerHTML;
        const originalContents = document.body.innerHTML;

        // Create a printable view
        document.body.innerHTML = printContents;
        window.print();

        // Revert back to the original contents
        document.body.innerHTML = originalContents;
        location.reload(); // Reload to restore JavaScript functionality
    }

</script>
@endsection
