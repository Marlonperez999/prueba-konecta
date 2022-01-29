@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Listado de Productos</h2>
        <a type="button" class="btn btn-primary mb-2" href="{{ url('/productos/create') }}">Crear Producto</a>

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
                    <th>Nombre Producto</th>
                    <th>Referencia</th>
                    <th>Precio</th>
                    <th>Peso</th>
                    <th>Categoria</th>
                    <th>Stock</th>
                    <th>Fecha Creacion</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            {{-- Cuerpo Tabla --}}
            <tbody>
                @foreach ($Productos as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->nombre_producto }}</td>
                        <td>{{ $producto->referencia }}</td>
                        <td>{{ $producto->precio }}</td>
                        <td>{{ $producto->peso }}</td>
                        <td>{{ $producto->categoria->nombre_categoria }}</td>
                        <td>{{ $producto->stock }}</td>
                        <td>{{ $producto->fecha_creacion }}</td>
                        <td>
                            <form action="{{ url('/productos/'.$producto->id) }}" class="d-inline" method="post">
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
                                href="{{ url('/productos/'.$producto->id.'/edit') }}"
                                >Editar
                            </a>

                            <a 
                                type="button" 
                                class="btn btn-success" 
                                href="{{ url('/ventas/'.$producto->id.'') }}"
                                >Vender
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>        
    </div>
@endsection