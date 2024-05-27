@extends('layouts.main')
@section('title','Lista')
@section('content')
    <div class="container">
        <h1 class="mb-4">Todos los Libros</h1>

        {{-- <a href="{{ route('libros.create') }}" class="btn btn-primary mb-4">Registrar Nuevo Libro</a> --}}

        <table class="table">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>ISBN</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($libros as $libro)
                    <tr>
                        <td>{{ $libro->titulo }}</td>
                        <td>{{ $libro->autor }}</td>
                        <td>{{ $libro->ISBN }}</td>
                        <td>
                            <a href="{{ route('libros.show', ['id' => $libro->id]) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('libros.edit', ['id' => $libro->id]) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('libros.destroy', ['id' => $libro->id]) }}" method="POST" style="display: inline;" onsubmit="confirmaEliminarEquipo(event)">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
