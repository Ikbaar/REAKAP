<!-- resources/views/dashboard.blade.php -->
@extends('layouts.admin.app')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<div class="dashboard-main" style="display: flex; flex-wrap: wrap; gap: 20px; padding: 20px;">
    <!-- Donut Chart Card -->
    <div class="card" style="flex: 1 1 45%; background: var(--card-bg); padding: 20px; border-radius: 10px;">
        <h3>Data Petani</h3>
        <p style="font-size: 18px; font-weight: bold; margin-bottom: 10px; color: #007bff;">
            Total: {{ $totalPetani }}
        </p>

        <canvas id="donutChart" style="max-width: 100%; height: auto;"></canvas>

    </div>

    <!-- Calendar Card -->
    <div class="card" style="flex: 1 1 45%; background: var(--card-bg); padding: 20px; border-radius: 10px;">
        <h3>Kalender</h3>
        <div id="calendar" style="max-width: 100%;"></div>
    </div>

    <!-- Bar Chart Card -->
    <div class="card" style="flex: 1 1 100%; background: var(--card-bg); padding: 20px; border-radius: 10px;">
        <h3>Total Legalitas/Desa</h3>
<canvas id="barChart" height="500"></canvas>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<!-- Chart.js Data Labels Plugin -->
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.2.0/dist/chartjs-plugin-datalabels.min.js"></script>

<script>
    // Donut Chart
    const donutCtx = document.getElementById('donutChart').getContext('2d');
    new Chart(donutCtx, {
    type: 'doughnut',
    data: {
        labels: ['Data lengkap', 'Data belum lengkap'],
        datasets: [{
            data: [{{ $jumlahLengkap }}, {{ $jumlahBelumLengkap }}],
            backgroundColor: ['#ff9f40', '#36a2eb'],
        }]
    },
    options: {
        plugins: {
            tooltip: {
    enabled: true,
    mode: 'nearest',
    callbacks: {
        label: function(context) {
            let label = context.label || '';
            let value = context.parsed;
            return `${label}: ${value} petani`;
        }
    },
    titleFont: {
        size: 12 // Ukuran judul (atas tooltip)
    },
    bodyFont: {
        size: 14, // Ukuran isi (label + value)
        weight: 'bold'
    }
},

            legend: { position: 'bottom' }
        }
    }
});
;

    // Bar Chart (Horizontal)
    const barCtx = document.getElementById('barChart').getContext('2d');
    new Chart(barCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($labelsKoperasi) !!},
data: {!! json_encode($dataKoperasi) !!},
datasets: [{
    label: 'Jumlah Legalitas',
    data: {!! json_encode($dataKoperasi) !!},
    backgroundColor: ['#4dc9f6', '#ff9f40', '#9966ff', '#ff6384', '#36a2eb']
}]

        },
        options: {
            indexAxis: 'y',
            responsive: true,
            plugins: {
                legend: { display: false },
                tooltip: { enabled: true }
            }
        }
    });

    // Calendar
    flatpickr("#calendar", {
        inline: true,
        defaultDate: new Date()
    });
</script>
<!-- Chart.js datalabels plugin -->
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
@endsection