@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Venta de Producto</h2>

        {{-- Validación de que si existe la variable msg, se muestre el alert del mensaje --}}
        @if (Session::has('msg') && Session::has('color'))
            <div class="alert alert-{{ Session::get('color') }} mt-2" role="alert">
                {{ Session::get('msg') }}
            </div>
        @endif

        <a class="btn btn-primary mb-3" href="{{ url('/productos')}}">Volver a Productos</a>
        
        <form action="{{ url('ventas/crear') }}" method="post">
            @csrf
            
            {{-- campo oculto para el id del producto --}}
            <input 
                type="hidden" 
                name="prod_id" 
                value="{{ isset($producto->id) ? $producto->id : old('id')   }}" 
                class="form-control" 
                id="id" 
                aria-describedby="id"
                required
                >

            <div class="row">
                <div class="col-5 mb-3">
                    <label class="form-label">Nombre Producto</label>
                    <input 
                        type="text" 
                        name="nombre_producto" 
                        value="{{ isset($producto->nombre_producto) ? $producto->nombre_producto : old('nombre_producto')   }}" 
                        class="form-control" 
                        id="nombre_producto" 
                        aria-describedby="nombre_producto"
                        required
                        disabled
                    >
                </div>

                <div class="col-5 mb-3">
                    <label class="form-label">Stock</label>
                    <input 
                        type="number" 
                        name="stock" 
                        value="{{ isset($producto->stock) ? $producto->stock : old('stock')   }}" 
                        class="form-control" 
                        id="stock" 
                        aria-describedby="stock"
                        required
                        disabled
                    >
                </div>
            </div>

            <div class="row">
                <div class="col-5 mb-3">
                    <label class="form-label">Precio</label>
                    <input 
                        type="number" 
                        name="precio" 
                        value="{{ isset($producto->precio) ? $producto->precio : old('precio')   }}" 
                        class="form-control" 
                        id="precio" 
                        aria-describedby="precio"
                        required
                        disabled
                    >
                </div>

                <div class="col-5 mb-3">
                    <label class="form-label">Cantidad</label>
                    <input 
                        type="number" 
                        name="cantidad"
                        class="form-control" 
                        id="stock" 
                        aria-describedby="stock"
                        required
                    >
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-success">Vender</button>
                </div>
            </div>
        </form>
    </div>
@endsection