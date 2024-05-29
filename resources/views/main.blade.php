{{-- @extends('layouts.main')
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
@endsection --}}
@extends('layouts.main')
@section('title','Bienvenido')
@section('content')
<div class="container-fluid bg-dark text-light py-5" style="min-height: 100vh;">
    <!-- Título centrado -->
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h2>Análisis de Biblioteca</h2>
        </div>
    </div>
    <div class="row align-items-center" style="min-height: 80vh;">
        <!-- Contenido del contador de libros -->
        <div class="col-md-4 mb-4 d-flex align-items-center justify-content-center">
            <div class="counter">
                <p class="h4">Total de libros registrados:</p>
                <div class="counter-box">
                    <span class="counter-number">{{ $librosCount }}</span>
                </div>
            </div>
        </div>
        <!-- Contenido del gráfico de líneas -->
        <div class="col-md-8 mb-4 d-flex align-items-center justify-content-center">
            <canvas id="myChart" width="400" height="200"></canvas>
        </div>
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
    var colores = ['rgb(75, 192, 192)', 'rgb(255, 99, 132)'];
    var acciones = Object.keys(accionesData[labels[0]]).filter(function(accion) {
        return accion !== 'eliminacion';
    });

    acciones.forEach(function(accion, index) {
        var data = labels.map(function(label) {
            return accionesData[label][accion];
        });

        datasets.push({
            label: accion,
            data: data,
            fill: false,
            borderColor: colores[index],
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

<!-- Estilos personalizados para el contador -->
<style>
    .counter {
        text-align: center;
    }
    .counter-box {
        background-color: #333;
        border: 2px solid #fff;
        border-radius: 10px;
        padding: 20px;
        display: inline-block;
        margin-top: 10px;
    }
    .counter-number {
        font-size: 2.5em;
        color: #0f0;
        font-family: 'Courier New', Courier, monospace;
    }
</style>
@endsection
