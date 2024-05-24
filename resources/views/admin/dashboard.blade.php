@extends('admin.layout.main')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .container { max-width: 1200px; margin: auto; padding: 20px; }
        .cards { display: flex; justify-content: space-around; margin-bottom: 20px; }
        .card { background: #f4f4f4; padding: 20px; border-radius: 5px; text-align: center; width: 22%; }
        .charts { display: flex; flex-wrap: wrap; justify-content: space-around; }
        .chart-container { width: 45%; margin-bottom: 20px; }
</style>

@section('container')
<div class="card text-center w-100">
    <div class="container">
        <div class="cards">
            @foreach($totalPerCondition as $condition)
                <div class="card">
                    <h3>{{ $condition->condition }}</h3>
                    <p>Total: {{ $condition->total }}</p>
                </div>
            @endforeach
        </div>
        <div class="charts">
            @foreach($categoriesPerCondition as $condition => $categories)
                <div class="chart-container">
                    <h4>{{ ucfirst($condition) }}</h4>
                    <canvas id="chart-{{ $condition }}"></canvas>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const data = @json($categoriesPerCondition);

            Object.keys(data).forEach(condition => {
                const ctx = document.getElementById(`chart-${condition}`).getContext('2d');
                const chartData = {
                    labels: data[condition].map(item => item.item_name),
                    datasets: [{
                        data: data[condition].map(item => item.total),
                        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0']
                    }]
                };

                new Chart(ctx, {
                    type: 'pie',
                    data: chartData
                });
            });
        });
    </script>
</div>
@endsection
