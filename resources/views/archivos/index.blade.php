@extends('layouts.main')
@section('title','Lista')
@section('content')
<div class="container">
    <h1 class="text-center">Libros</h1>
    <div class="row">
        @foreach($libros as $libro)
            @if($libro->archivo)
                <div class="col-md-4 book-card">
                    <div class="card">
                        <a href="{{ asset('storage/' . $libro->archivo->pdf_path) }}" target="_blank">
                            <img src="{{ asset('storage/' . $libro->archivo->imagen_path) }}" alt="{{ $libro->titulo }}" class="card-img-top book-image">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $libro->titulo }}</h5>
                            <p class="card-text">Autor: {{ $libro->autor }}</p>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
@endsection