@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ url('/categoria/'.$categoria->id) }}" method="post">
            @csrf
            {{ method_field('PATCH') }}
            
            @include('categorias.cate-form-plantilla', ['accionBoton' => 'Editar'])
        </form>
    </div>
@endsection