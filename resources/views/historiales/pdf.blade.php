@extends('layouts.read')
@section('content')
<h1>Historial Details</h1>
<p>ID: {{ $historial->id }}</p>
<p>Libro: {{ $historial->libro->titulo }}</p>
<p>Acción: {{ $historial->accion }}</p>
<p>Descripción: {{ $historial->descripcion }}</p>
<p>Fecha de Creación: {{ $historial->created_at }}</p>
@endsection