@extends('layouts.app3')

@section('title', 'Historial de procedimientos')

@section('content')
<header>
  <h2>Historial</h2>
  <h3>Procedimientos realizados:</h3>
  <p>Fecha: 2023-11-14</p>
</header>
<main>
  <table class="tabla-historial">
    <thead>
      <tr>
        <th>Fecha</th>
        <th>Procedimiento</th>
        <th>Usuario</th>
        <th>Observaciones</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>2023-11-14</td>
        <td>Préstamo de libro</td>
        <td>Juan Pérez</td>
        <td>Libro: "Cien años de soledad"</td>
      </tr>
      <tr>
        <td>2023-11-13</td>
        <td>Devolución de libro</td>
        <td>María López</td>
        <td>Libro: "El principito"</td>
      </tr>
      <tr>
        <td>2023-11-11</td>
        <td>Registro de nuevo libro</td>
        <td>Pedro Martínez</td>
        <td>Libro: "Ilíada"</td>
        <td></td>
      </tr>
    </tbody>
  </table>
  <div class="botones">
    <button>Agregar procedimiento</button>
    <button>Ver detalles</button>
    <button>Imprimir</button>
  </div>
</main>
<script src="/js/app3.js"></script>
@endsection
