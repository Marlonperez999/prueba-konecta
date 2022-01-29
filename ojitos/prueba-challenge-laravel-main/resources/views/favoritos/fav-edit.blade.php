@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ url('/favorito/'.$favorito->id) }}" method="post">
            @csrf
            {{ method_field('PATCH') }}
            @include('favoritos.fav-form-plantilla', ['accionBoton' => 'Editar'])
        </form>
    </div>
@endsection