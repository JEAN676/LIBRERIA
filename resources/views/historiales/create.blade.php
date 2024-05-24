@extends('layouts.main')
@section('title','Create Historial')
@section('content')
<h1>Crear Nuevo Historial</h1>

<form action="{{ route('historiales.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="libro_id" class="form-label">Libro</label>
        <select class="form-select" name="libro_id" id="libro_id" required>
            <option value="" selected disabled>Seleccione un libro</option>
            @foreach ($libros as $libro)
                <option value="{{ $libro->id }}">{{ $libro->titulo }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="accion" class="form-label">Acción</label>
        <select class="form-select" name="accion" id="accion" required>
            <option value="" selected disabled>Seleccione una acción</option>
            <option value="agregar">Agregar</option>
            <option value="actualizar">Actualizar</option>
            <option value="eliminar">Eliminar</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Registrar Historial</button>
</form>
@endsection
