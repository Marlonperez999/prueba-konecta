@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="alert alert-primary" role="alert">
                <h1>Productos con mas Stock</h1>
                <ul>
                    @foreach ($productosMasStock as $producto)
                      <li>
                        {{ $producto->nombre_producto }}
                        {{ $producto->stock }}
                      </li>
                    @endforeach
                </ul>
                {{-- <?php dump($masStockTiene) ?> --}}
            </div>
        </div>
    </div>
@endsection