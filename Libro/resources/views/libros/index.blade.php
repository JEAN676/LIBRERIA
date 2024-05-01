@extends('layouts.app3')

@section('title', 'INDICE')

@section('content')
@if ($libros->isEmpty())
    <p>No se encontraron resultados para la búsqueda.</p>
@else
    <!-- Mostrar la tabla de libros -->
@endif
{{-- falta habilitar su logica --}}
<section class="busqueda">
  <h2>Búsqueda</h2>
  <form action="{{ route('libros.search')}}" method="GET">
    @csrf
    <label for="titulo">Título</label>
    <input type="text" id="titulo" name="titulo">
    <button type="submit">Buscar</button>
  </form>
</section>
{{-- falta dar diseño --}}
<section>
<h1>Listado de Libros</h1>
<a href="{{ url('/libros/create') }}">Agregar Libro</a>
<table > 
  <thead>
      <tr>
          <th>Título</th>
          <th>Autor</th>
          <th>Editorial</th>
          <th>Publicado</th>
          {{-- <th>Descripcion</th> --}}
          <th>Acciones</th>
      </tr>
  </thead>
  <tbody>
      @foreach ($libros as $libro)
          <tr>
              <td>{{ $libro->titulo }}</td>
              <td>{{ $libro->autor }}</td>
              <td>{{ $libro->editorial }}</td>
              <td>{{ $libro->anio_publicacion}}</td>
              {{-- <td>{{ $libro->descripcion}}</td> --}}
              <td>
                  <a href="{{ url('/libros/'.$libro->id) }}">Ver</a>
                  <a href="{{ url('/libros/'.$libro->id.'/edit') }}">Editar</a>
                  <form action="{{ url('/libros/'.$libro->id) }}" method="POST" style="display:inline">
                      @csrf
                      @method('DELETE')
                      <button type="submit">Eliminar</button>
                  </form>
              </td>
          </tr>
      @endforeach
  </tbody>
</table>
</section>
<!-- Agrega el script al final del cuerpo del HTML -->
<script src="/js/app3.js"></script>
@endsection
