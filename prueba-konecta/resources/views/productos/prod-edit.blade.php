@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ url('/productos/'.$producto->id) }}" method="post">
            @csrf
            {{ method_field('PATCH') }}
            
            @include('productos.prod-form-plantilla', ['accionBoton' => 'Editar'])
        </form>
    </div>
@endsection