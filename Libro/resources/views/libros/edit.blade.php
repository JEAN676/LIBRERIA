@extends('layouts.app2')
@section('cont1')
<div id="basto">
    {{-- <div id="pri">
        <div id="ima">
            <img src="imagen1.jpg" alt="Imagen 1" class="imagen-con-marco">
            <img src="imagen2.jpg" alt="Imagen 2" class="imagen-con-marco">
        </div> --}}
        <div id="for">
            <form id="formulario-registro" action="{{url('/libros/'.$libro->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div>
                    <label for="autor">Titulo: </label>
                    <input type="text" id="autor" name="titulo" value="{{$libro->titulo}}">
                </div>
                <div>
                    <label for="autor">Autor: </label>
                    <input type="text" id="autor" name="autor" value="{{$libro->autor}}">
                </div>
                <div>
                    <label for="editorial">Editorial: </label>
                    <input type="text" id="editorial" name="editorial" value="{{$libro->editorial}}">
                </div>
                <div>
                    <label for="año">Año: </label>
                    <input type="text" id="año" name="anio_publicacion" value="{{$libro->anio_publicacion}}">
                </div>
                <div>
                    <label for="descripcion">Descripcion: </label>
                    <input type="text" id="descripcion" name="descripcion" value="{{$libro->descripcion}}">
                </div>
                <button id="col" type="submit">Guardar Cambios</button>
            </form>
        </div>
    {{-- </div> --}}
    {{-- <div id="sec"><h4>Despcricion</h4></div>
    <div id="ter">
        <textarea id="detal" name="descripcion1"></textarea>
    </div> --}}
</div>
@endsection