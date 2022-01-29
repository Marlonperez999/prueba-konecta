@extends('layouts.app')

@section('content')
    <div class="container">
        <a type="button" class="btn btn-info mb-2" href="{{ url('/categoria') }}">Lista de Categorias</a>
        <form action="{{ url('/categoria') }}" method="post">
            @csrf

            @include('categorias.cate-form-plantilla', ['accionBoton' => 'Crear'])
        </form>
    </div>
@endsection