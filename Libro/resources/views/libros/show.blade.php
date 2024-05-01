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
        {{-- <form id="todo">
            <div>
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo">
            </div>
            <div>
                <label for="autor">Autor:</label>
                <input type="text" id="autor" name="autor">
            </div>
            <div>
                <label for="editor">Editor:</label>
                <input type="text" id="editor" name="editor">
            </div>
            <div>
                <label for="anio">Año de Publicación:</label>
                <input type="text" id="anio" name="anio">
            </div>
            <div id="sam">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion"></textarea>
            </div>
            <div id="contenedor">
                <button id="A" type="submit">Guardar</button>
                <button id="B" type="button" onclick="eliminar()">Eliminar</button>
                <button id="C" type="button" onclick="salir()">Salir</button>
            </div>
        </form>    --}}
</div>
<script src="/js/app2.js"></script>
{{-- <script>
    document.getElementById("C").addEventListener("click", salir);
</script> --}}
@endsection