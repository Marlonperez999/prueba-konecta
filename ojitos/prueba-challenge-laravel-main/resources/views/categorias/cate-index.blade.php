@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Listado de Categorias</h2>
        <a type="button" class="btn btn-primary mb-2" href="{{ url('/categoria/create') }}">Crear Categoria</a>

        {{-- Validación de que si existe la variable msg, se muestre el alert del mensaje --}}
        @if (Session::has('msg') && Session::has('color'))
            <div class="alert alert-{{ Session::get('color') }} mt-2" role="alert">
                {{ Session::get('msg') }}
            </div>
        @endif

        <table class="table table-light">

            {{-- Cabecera Tabla--}}
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Nombre Categoria</th>
                    <th>Creación</th>
                    <th>Actualización</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            {{-- Cuerpo Tabla --}}
            <tbody>
                @foreach ($Categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->nombre_categoria }}</td>
                        <td>{{ $categoria->created_at}}</td>
                        <td>{{ $categoria->updated_at }}</td>
                        <td>
                            <form action="{{ url('/categoria/'.$categoria->id) }}" class="d-inline" method="post">
                                @csrf
                                {{ method_field('DELETE')}}

                                <button 
                                    type="submit" 
                                    class="btn btn-danger"
                                    onclick="return confirm('¿Seguro de borrar el registro?')"
                                    >Borrar
                                </button>
                            </form>
                            
                            <a 
                                type="button" 
                                class="btn btn-primary" 
                                href="{{ url('/categoria/'.$categoria->id.'/edit') }}"
                                >Editar
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        {!! $Categorias->links() !!}
    </div>
@endsection