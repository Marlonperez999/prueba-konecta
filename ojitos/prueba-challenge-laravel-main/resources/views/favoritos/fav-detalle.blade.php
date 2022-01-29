@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-auto">
                <div class="card text-center" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title font-italic">Descripción Favorito: {{ $favorito->descripcion }}</h5>
                        <p class="card-text">Categoria: {{ $favorito->categoria->nombre_categoria}}</p>

                        @if (Auth::check())
                            <a href="{{ url('/favorito') }}" class="btn btn-primary">Ir a Favoritos</a>
                        @else
                            <a href="{{ url('/login') }}" class="btn btn-primary">Volver</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection