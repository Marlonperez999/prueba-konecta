@extends('layouts.app')

@section('content')
    <div class="container">
        <a type="button" class="btn btn-info mb-2" href="{{ url('/favorito') }}">Lista de Favoritos</a>
        <form action="{{ url('/favorito') }}" method="POST">
            @csrf
    
            @include('favoritos.fav-form-plantilla', ['accionBoton' => 'Crear'])
        </form>
    </div>
@endsection