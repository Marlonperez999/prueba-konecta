<h2>Creación de Categorias</h2>
<div class="row mb-2" >
    <div class="col-6 ">
        <div class="mb-3">
            <label for="nombre_producto" class="form-label">Nombre producto</label>
            
            <input 
                type="text" 
                name="nombre_producto" 
                value="{{ isset($producto->nombre_producto) ? $producto->nombre_producto : old('nombre_producto')   }}" 
                class="form-control" 
                id="nombre_producto" 
                aria-describedby="nombre_producto"
                required>

            @if ($errors->has('nombre_producto'))
                <div id="nombre_producto" class="form-text">El campo Nombre Producto, es Invalido.</div>
            @endif
            
        </div>
    </div>
    <div class="col-6">
        <div class="mb-3">
            <label for="referencia" class="form-label">Referencia</label>
            
            <input 
                type="text" 
                name="referencia" 
                value="{{ isset($producto->referencia) ? $producto->referencia : old('referencia')   }}" 
                class="form-control" 
                id="referencia" 
                aria-describedby="referencia"
                required>

            @if ($errors->has('referencia'))
                <div id="referencia" class="form-text">El campo Referencia, es Invalido.</div>
            @endif
            
        </div>
    </div>
</div>
<div class="row mb-2" >
    <div class="col-6 ">
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            
            <input 
                type="number" 
                name="precio" 
                value="{{ isset($producto->precio) ? $producto->precio : old('precio')   }}" 
                class="form-control" 
                id="precio" 
                aria-describedby="precio"
                required>

            @if ($errors->has('precio'))
                <div id="precio" class="form-text">El campo Precio, es Invalido.</div>
            @endif
            
        </div>
    </div>
    <div class="col-6">
        <div class="mb-3">
            <label for="peso" class="form-label">Peso</label>
            
            <input 
                type="number" 
                name="peso" 
                value="{{ isset($producto->peso) ? $producto->peso : old('peso')   }}" 
                class="form-control" 
                id="peso" 
                aria-describedby="peso"
                required>

            @if ($errors->has('peso'))
                <div id="peso" class="form-text">El campo Peso, es Invalido.</div>
            @endif
            
        </div>
    </div>
</div>
<div class="row mb-2" >
    <div class="col-6 ">
        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoria</label>
            
            <select class=" mb-3 form-select"  name="cat_id">
                @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}"> {{ $categoria->nombre_categoria }} </option>
                @endforeach
            </select>

            @if ($errors->has('categoria_id'))
                <div id="categoria_id" class="form-text">El campo Categoria, es Invalido.</div>
            @endif
            
        </div>
    </div>
    <div class="col-6">
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            
            <input 
                type="number" 
                name="stock" 
                value="{{ isset($producto->stock) ? $producto->stock : old('stock')   }}" 
                class="form-control" 
                id="stock" 
                aria-describedby="stock"
                required
                >

            @if ($errors->has('stock'))
                <div id="stock" class="form-text">El campo Stock, es Invalido.</div>
            @endif
            
        </div>
    </div>
</div>
<div class="row mb-2" >
    <div class="col-6 ">
        <div class="mb-3">
            <label for="Fecha_creacion" class="form-label">Fecha Creación</label>
            
            <input 
                type="date" 
                name="fecha_creacion" 
                value="{{ isset($producto->fecha_creacion) ? $producto->fecha_creacion : old('fecha_creacion')   }}" 
                class="form-control" 
                id="fecha_creacion" 
                aria-describedby="fecha_creacion"
                required>

            @if ($errors->has('fecha_creacion'))
                <div id="fecha_creacion" class="form-text">El campo Fecha , es Invalido.</div>
            @endif
            
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary">{{ $accionBoton }}</button>