@extends('layouts.app2')
@section('cont1')
<div id="basto">
    <div id="pri">
        <div id="ima">
            <img src="imagen1.jpg" alt="Imagen 1" class="imagen-con-marco">
            <img src="imagen2.jpg" alt="Imagen 2" class="imagen-con-marco">
        </div>
        <div id="for">
            <form id="formulario-registro">
                <div>
                    <label for="autor">Autor:</label>
                    <input type="text" id="autor" name="autor" placeholder="Ingrese el nombre del autor">
                </div>
                <div>
                    <label for="editorial">Editorial:</label>
                    <input type="text" id="editorial" name="editorial" placeholder="Ingrese el nombre de la editorial">
                </div>
                <button id="col" type="submit">Agregar</button>
            </form>
        </div>
    </div>
    <div id="sec"><h4>Despcricion</h4></div>
    <div id="ter">
        <textarea id="detal" name="descripcion1"></textarea>
    </div>
</div>
@endsection