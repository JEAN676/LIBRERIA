@extends('layouts.app2')
@section('cont1')
{{-- <div id="iz">
    <div id="contenedor-imagen">
        <img src="img/imagen.jpg" alt="Imagen">
      </div>   
</div> --}}
<div id="de">
    <h5>{{ $libro->titulo}}</h5>
    <p><strong>Autor: </strong> {{$libro->autor}}</p>
    <p><strong>Autor: </strong> {{$libro->editorial}}</p>
    <p><strong>Autor: </strong> {{$libro->anio_publicacion}}</p>
    <p><strong>Autor: </strong> {{$libro->descripcion}}</p>
    <a href="{{ url('/libros/'.$libro->id.'/edit')}}">Editar</a>
    <form action="{{ url('/libros/'.$libro->id)}}" method="post"
        style="display:inline">
    @csrf
    @method('DELETE')
    <button type="submit">Eliminar</button>
    </form>

</div>
<script src="/js/app2.js"></script>
{{-- <script>
    document.getElementById("C").addEventListener("click", salir);
</script> --}}
@endsection