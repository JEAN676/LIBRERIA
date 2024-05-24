@extends('layouts.main')
@section('title','Lista')
@section('content')
    <div class="container">
        <h1 class="mb-4">Detalles del Historial</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">ID: {{ $historial->id }}</h5>
                <p class="card-text">Libro: {{ $historial->libro->titulo }}</p>
                <p class="card-text">Acción: {{ $historial->accion }}</p>
                <p class="card-text">Descripción: {{ $historial->descripcion }}</p>
                <p class="card-text">Fecha de Creación: {{ $historial->created_at }}</p>
            </div>
        </div>

        <a href="{{ route('historiales.index') }}" class="btn btn-secondary mt-3">Volver al Historial</a>
    </div>
@endsection
