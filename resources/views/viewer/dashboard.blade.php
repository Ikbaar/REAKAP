@extends('layouts.viewer.app') 

@section('title', 'Statistik Petani')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4">Statistik Data Petani</h2>

    <div class="row justify-content-center mb-4">
        <div class="col-md-6">
            <canvas id="dataPieChart" height="300"></canvas>
        </div>
    </div>

    <div class="row text-center">
        <div class="col-md-4 mb-3">
            <div class="card bg-primary text-white">
                <div class="card-header">Total Petani</div>
                <div class="card-body">
                    <h5>{{ $totalPetani }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card bg-success text-white">
                <div class="card-header">Data Lengkap</div>
                <div class="card-body">
                    <h5>{{ $jumlahLengkap }}</h5>
                    <p>{{ round($jumlahLengkap / max($totalPetani, 1) * 100, 2) }}%</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card bg-danger text-white">
                <div class="card-header">Data Belum Lengkap</div>
                <div class="card-body">
                    <h5>{{ $jumlahBelumLengkap }}</h5>
                    <p>{{ round($jumlahBelumLengkap / max($totalPetani, 1) * 100, 2) }}%</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('dataPieChart').getContext('2d');

    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Lengkap', 'Belum Lengkap'],
            datasets: [{
                data: [{{ $jumlahLengkap }}, {{ $jumlahBelumLengkap }}],
                backgroundColor: ['#28a745', '#dc3545'],
                borderColor: ['#ffffff', '#ffffff'],
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const total = {{ $totalPetani }};
                            const value = context.raw;
                            const percentage = ((value / total) * 100).toFixed(2);
                            return `${context.label}: ${value} (${percentage}%)`;
                        }
                    }
                }
            }
        }
    });
</script>
@endsection
