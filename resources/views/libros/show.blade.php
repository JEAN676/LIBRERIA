@extends('layouts.main')
@section('title','Show')
@section('content')
<h1>Detalles del Libro</h1>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Título: {{ $libro->titulo }}</h5>
        <p class="card-text">Autor: {{ $libro->autor }}</p>
        <p class="card-text">ISBN: {{ $libro->ISBN }}</p>
        <p class="card-text">Editorial: {{ $libro->editorial }}</p>
        <p class="card-text">Año de Publicación: {{ $libro->anio_publicacion }}</p>
        <p class="card-text">Género: {{ $libro->genero }}</p>
        <p class="card-text">Número de Páginas: {{ $libro->num_paginas }}</p>
        <p class="card-text">Idioma: {{ $libro->idioma }}</p>
        <p class="card-text">Descripción: {{ $libro->descripcion }}</p>
    </div>
</div>

<a href="{{ route('libros.index') }}" class="btn btn-primary mt-3">Volver</a>
@endsection