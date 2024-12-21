@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Analytics Panel -->
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

    <!-- Expense Category Breakdown -->
    <div class="row">
        <div class="col-xl-6 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Expense Category Breakdown</h6>
                </div>
                <div class="card-body">
                    <!-- Example of a chart -->
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
                    <!-- Example of a chart -->
                    <canvas id="incomeCategoryChart"></canvas>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Include Chart.js or another chart library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Example chart for expenses
    const ctx1 = document.getElementById('expenseCategoryChart').getContext('2d');
    const expenseCategoryChart = new Chart(ctx1, {
        type: 'pie',
        data: {
            labels: @json($expenseCategories->pluck('category_name')),
            datasets: [{
                data: @json($expenseCategories->pluck('total')),
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
            }]
        },
    });

    // Example chart for incomes
    const ctx2 = document.getElementById('incomeCategoryChart').getContext('2d');
    const incomeCategoryChart = new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: @json($incomeCategories->pluck('category_name')),
            datasets: [{
                data: @json($incomeCategories->pluck('total')),
                backgroundColor: ['#4CAF50', '#FFC107', '#2196F3'],
            }]
        },
    });
</script>

@endsection
