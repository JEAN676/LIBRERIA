@extends('layouts.app3')

@section('title', 'Búsqueda de libros')

@section('content')
<section class="busqueda">
  <h2>Búsqueda</h2>
  <form action="#">
    <label for="titulo">Título</label>
    <input type="text" id="titulo" name="titulo">
    <button type="submit">Buscar</button>
  </form>
</section>

<section class="resultados">
  <h2>Resultados</h2>
  <ul>
    <li>
      <a href="#">Cien años de soledad</a>
      <p>Gabriel García Márquez</p>
      <p>1967</p>
    </li>
    <li>
      <a href="#">El principito</a>
      <p>Antoine de Saint-Exupéry</p>
      <p>1943</p>
    </li>
    <li>
      <a href="#">1984</a>
      <p>George Orwell</p>
      <p>1949</p>
    </li>
  </ul>
</section>

<!-- Agrega el script al final del cuerpo del HTML -->
<script src="/js/app3.js"></script>
@endsection
