@extends('layouts.main')
@section('title','Lista')
@section('content')
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

@endsection