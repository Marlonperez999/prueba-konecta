@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Listado de Favoritos</h2>
        @if (Auth::check())
            <a type="button" class="btn btn-primary mb-2" href="{{ url('/favorito/create') }}">Crear Favorito</a>
            <a type="button" class="btn btn-info mb-2" href="{{ url('/categoria/create') }}">Crear categoria</a>
        @endif

        {{-- Validación de que si existe la variable msg y color, se muestre el alert del mensaje --}}
        @if (Session::has('msg') && Session::has('color'))
            <div class="alert alert-{{ Session::get('color') }} mt-2" role="alert">
                {{ Session::get('msg') }}
            </div>
        @endif

        <table class="table table-light">

            {{-- Cabecera Tabla--}}
            <thead class="thead-light">
                <tr>
                    <th>URL</th>
                    <th>Titulo</th>
                    @if (Auth::check())
                        <th>Descripción</th>
                        <th>Categorias</th>
                        <th>Visibilidad</th>
                        <th>Creación</th>
                        <th>Actualización</th>
                        <th>Acciones</th>
                    @endif
                </tr>
            </thead>

            {{-- Cuerpo Tabla --}}
            <tbody>
                @foreach ($favoritos as $favorito)
                    <tr>
                        <td>{{ $favorito->url }}</td>
                        <td>
                            <a href="{{ url('/ver-detalle-favorito/'.$favorito->id) }}" class="badge badge-pill badge-info text-white" >
                                {{ $favorito->titulo }}
                            </a>
                        </td>
                        @if (Auth::check())
                            <td>{{ $favorito->descripcion }}</td>
                            <td>{{ $favorito->categoria->nombre_categoria }}</td>
                            <td>{{ $favorito->visibilidad }}</td>
                            <td>{{ $favorito->created_at }}</td>
                            <td>{{ $favorito->updated_at }}</td>
                            <td>
                                <form action="{{ url('/favorito/'.$favorito->id ) }}" class="d-inline" method="post">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    
                                    <button 
                                        type="submit" 
                                        class="btn btn-danger "
                                        onclick="return confirm('¿Seguro de borrar el registro?')"
                                        >Borrar
                                    </button>
                                </form>

                                <a 
                                    type="button" 
                                    class="btn btn-primary" 
                                    href="{{ url('/favorito/'.$favorito->id.'/edit') }}"
                                    >Editar
                                </a>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>

        </table>
        {!! $favoritos->links() !!}
    </div>
@endsection