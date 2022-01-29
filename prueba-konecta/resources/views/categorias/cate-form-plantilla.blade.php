<h2>Creación de Categorias</h2>
<div class="form-row">
    <div class="col-12">
        <div class="mb-3">
            <label for="nombre_categoria" class="form-label">Nombre Categoria</label>
            
            <input 
                type="text" 
                name="nombre_categoria" 
                value="{{ isset($categoria->nombre_categoria) ? $categoria->nombre_categoria : old('nombre_categoria')   }}" 
                class="form-control" 
                id="nombre_categoria" 
                aria-describedby="nombre_categoria">

            @if ($errors->has('nombre_categoria'))
                <div id="nombre_categoria" class="form-text">El campo Nombre Categoria, es Invalido.</div>
            @endif
            
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary">{{ $accionBoton }}</button>