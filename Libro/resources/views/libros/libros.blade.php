@extends('layouts.app3')

@section('title', 'Libros')

@section('content')
<section class="libros">
  <h2>Libros disponibles</h2>
  <ul>
    <li class="libro">
      <div style="display: flex; flex-direction: column;">
        <img src="imagen-libro-1.jpg" alt="Libro 1">
        <h3>El Principito</h3>
        <p>Fábula mítica y relato filosófico que interroga acerca de la relación del ser humano con su prójimo y con el mundo, El Principito concentra, con maravillosa simplicidad, la constante reflexión de Saint-Exupery sobre la amistad, el amor, la responsabilidad y el sentido de la vida.</p>
        <a href="/libros/descripcion">Examinar</a>
      </div>
    </li>
    <li class="libro">
      <div style="display: flex; flex-direction: column;">
        <img src="imagen-libro-2.jpg" alt="Libro 2">
        <h3>La Metamorfosis</h3>
        <p>“La metamorfosis” narra de forma magistral la transformación de Gregorio Samsa de comerciante a un monstruoso insecto. Samsa primero cree que es un sueño, pero poco a poco va descubriendo que la pesadilla es real y su transformación en animal es un hecho que afecta a su trabajo y a su relación con su familia.</p>
        <a href="/libros/descripcion">Examinar</a>
      </div>
    </li>
    <li class="libro">
      <div style="display: flex; flex-direction: column;">
        <img src="imagen-libro-3.jpg" alt="Libro 3">
        <h3>Moby-Dick</h3>
        <p>El capitán Ahab, apoyado sobre su pierna fabricada con una mandíbula de cachalote, empuja a su tripulación del Pequod al desastre en su obsesión por acabar con la ballena blanca, con Moby Dick; esa reencarnación del mal que mutiló su cuerpo y su alma para siempre.</p>
        <a href="/libros/descripcion">Examinar</a>
      </div>
    </li>
  </ul>
</section>
<script src="/js/app3.js"></script>
@endsection

