@extends('layouts.read')
{{-- @section('title', 'PDF del libro') --}}
@section('content')
    <embed src="{{ $libro->archivo->pdf_path }}" type="application/pdf"  />
@endsection

