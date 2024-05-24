@extends('layouts.main')
@section('title','Bienvenido')
@section('content')
<div class="container-fluid bg-dark text-light py-5">
    <!-- Contenido del contador de libros -->
    <div class="mb-4">
        <p class="h4">Total de libros registrados: {{ $librosCount }}</p>
    </div>

    <!-- Contenido del gráfico de líneas -->
    <div class="mb-4">
        <canvas id="myChart" width="400" height="200"></canvas>
    </div>
</div>

<!-- Incluir la biblioteca Chart.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

<!-- Script para generar el gráfico -->
<script>
    // Obtener los datos del gráfico desde PHP
    var accionesData = @json($accionesData);

    // Preparar los datos para el gráfico
    var labels = Object.keys(accionesData);
    var datasets = [];
    var acciones = Object.keys(accionesData[labels[0]]);
    
    acciones.forEach(function(accion) {
        var data = labels.map(function(label) {
            return accionesData[label][accion];
        });

        datasets.push({
            label: accion,
            data: data,
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        });
    });

    // Configuración del gráfico
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: datasets
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection