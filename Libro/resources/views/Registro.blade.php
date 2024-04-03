@extends('layouts.app')
@section('content') 
<div class="contenedor">
    <div class="cabezera"><h2>Registro de Libro</h2> </div>
    <div class="contenido">
        <div class="izquierda">

    <form>
        <div class="campo">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" required>
        </div>
        <div class="campo">
            <label for="autor">Autor:</label>
            <input type="text" id="autor" name="autor" required>
        </div>
        <div class="campo">
            <label for="editorial">Editorial:</label>
            <input type="text" id="editorial" name="editorial" required>
        </div>
        <div class="campo">
            <label for="anio">Año de Publicación:</label>
            <input type="number" id="anio" name="anio" required>
        </div>
        
    </form>
        </div>
        <div class="derecha">
            <form>
                <div class="campo">
                    <label for="imagen">Seleccionar Imagen:</label>
                    <input type="file" id="imagen" name="imagen" accept="image/*" required>
                </div>
                <button type="submit">Cargar</button>
            </form>
        </div>
    </div>
    <div class="observaciones">
        <form>
            <div class="campo">
                <label id ="descri"for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" rows="4" required></textarea>
            </div>
        </form>
    </div>
    <div class="botones"><button type="submit">Registrar</button></div>
</div>
@endsection