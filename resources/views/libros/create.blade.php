@extends('layouts.main')
@section('title','Create')
@section('content')
    <div class="container">
        <h1 class="mb-4">Registrar Nuevo Libro</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('libros.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo') }}" required>
            </div>
            <div class="mb-3">
                <label for="autor" class="form-label">Autor</label>
                <input type="text" class="form-control" id="autor" name="autor" value="{{ old('autor') }}" required>
                {{-- @error('autor')
                    <br>
                    <small style="color: red">{{$message}}</small>
                @enderror --}}
            </div>
            <div class="mb-3">
                <label for="ISBN" class="form-label">ISBN</label>
                <input type="text" class="form-control" id="ISBN" name="ISBN" value="{{ old('ISBN') }}" required>
            </div>
            <div class="mb-3">
                <label for="editorial" class="form-label">Editorial</label>
                <input type="text" class="form-control" id="editorial" name="editorial" value="{{ old('editorial') }}" required>
            </div>
            <div class="mb-3">
                <label for="anio_publicacion" class="form-label">Año de Publicación</label>
                <input type="number" min="1901" max="2155" class="form-control" id="anio_publicacion" name="anio_publicacion" value="{{ old('anio_publicacion') }}" required>
            </div>
            <div class="mb-3">
                <label for="genero" class="form-label">Género</label>
                <input type="text" class="form-control" id="genero" name="genero" value="{{ old('genero') }}" required>
            </div>
            <div class="mb-3">
                <label for="num_paginas" class="form-label">Número de Páginas</label>
                <input type="number" class="form-control" id="num_paginas" name="num_paginas" value="{{ old('num_paginas') }}" required>
            </div>
            <div class="mb-3">
                <label for="idioma" class="form-label">Idioma</label>
                <input type="text" class="form-control" id="idioma" name="idioma" value="{{ old('idioma') }}" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" required>{{ old('descripcion') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>
@endsection
