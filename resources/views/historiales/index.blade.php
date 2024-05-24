@extends('layouts.main')
@section('title','Lista')
@section('content')
<h1>Historial de Acciones</h1>

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Libro</th>
            <th scope="col">Acción</th>
            <th scope="col">Descripción</th>
            <th scope="col">Fecha de Creación</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($historiales as $historial)
            <tr>
                <th scope="row">{{ $historial->id }}</th>
                <td>{{ $historial->libro->titulo }}</td>
                <td>{{ $historial->accion }}</td>
                <td>{{ $historial->descripcion }}</td>
                <td>{{ $historial->created_at }}</td>
                <td>
                    <a href="{{ route('historiales.show', $historial->id) }}" class="btn btn-info btn-sm">Ver Detalles</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
