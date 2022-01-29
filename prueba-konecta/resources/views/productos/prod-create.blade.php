@extends('layouts.app')

@section('content')
    <div class="container ">
        <a type="button" class="btn btn-info my-2" href="{{ url('/productos') }}">Lista de Productos</a>
        <form action="{{ url('/productos') }}" method="post">
            @csrf

            @include('productos.prod-form-plantilla', ['accionBoton' => 'Crear'])
        </form>
    </div>
@endsection