@extends('layouts.main')
@section('title','Lista')
@section('content')
    <div class="container">
        <h1 class="mb-4">Historial de Acciones</h1>

        <table class="table table-striped">
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
        <div class="pagination">
            <ul>
                @if ($historiales->onFirstPage())
                    <li class="disabled"><span>&laquo;</span></li>
                @else
                    <li><a href="{{ $historiales->previousPageUrl() }}">&laquo;</a></li>
                @endif
                
                @foreach (range(1, $historiales->lastPage()) as $i)
                    <li class="{{ ($historiales->currentPage() == $i) ? 'active' : '' }}">
                        <a href="{{ $historiales->url($i) }}">{{ $i }}</a>
                    </li>
                @endforeach
        
                @if ($historiales->hasMorePages())
                    <li><a href="{{ $historiales->nextPageUrl() }}">&raquo;</a></li>
                @else
                    <li class="disabled"><span>&raquo;</span></li>
                @endif
            </ul>
        </div>
    </div>
@endsection
