<h2>Creación de Favoritos</h2>
<div class="form-row">
    <div class="col-6">
        <div class="mb-3">
            <label for="url" class="form-label">URL</label>

            <input 
                type="text" 
                name="url" 
                value="{{ isset($favorito->url) ? $favorito->url : old('url') }}" 
                class="form-control" 
                id="url" 
                aria-describedby="url">

                @if ( $errors->has('url'))
                    <div id="url" class="form-text">El campo Nombres, es invalido.</div>
                @endif
        </div>
    </div>

    <div class="col-6">
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>

            <input 
                type="text" 
                name="titulo" 
                value="{{ isset($favorito->titulo) ? $favorito->titulo : old('titulo') }}" 
                class="form-control" 
                id="titulo" 
                aria-describedby="titulo">

                @if ( $errors->has('titulo'))
                    <div id="titulo" class="form-text">El campo titulo, es invalido.</div>
                @endif
        </div>
    </div>

    <div class="col-6">
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion</label>
        
            <input 
                type="text" 
                name="descripcion" 
                value="{{ isset($favorito->descripcion) ? $favorito->descripcion : old('descripcion') }}" 
                class="form-control" 
                id="descripcion" 
                aria-describedby="descripcion">
        
                @if ( $errors->has('descripcion'))
                    <div id="descripcion" class="form-text">El campo Descripción, es invalido.</div>
                @endif
        </div>
    </div>

    <div class="col-6">
        <div class="mb-3">
            <label for="cat_id" class="form-label">Categoria</label>
            <select class="custom-select mb-3" aria-label="Default select example" name="cat_id">
                @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}"> {{ $categoria->nombre_categoria }} </option>
                @endforeach
            </select>
        </div>
    </div>

{{-- <select multiple class="form-control" name="categoria[]" id="categoria">
    @foreach ($categorias as $categoria)
        <option value="{{$categoria->id}}"> {{ $categoria->nombre_categoria }} </option>
    @endforeach
</select> --}}

    <div class="col-6">
        <div class="form-check">
            {{ Form::label('visibilidad','Publico',array('id'=>'','class'=>'form-check-label mb-3')) }}
            @if (isset($favorito->visibilidad)=='publico')
                {{ Form::radio('visibilidad','publico', true) }}
            @else
                {{ Form::radio('visibilidad','publico',) }}
            @endif
        </div>
        
        <div class="form-check">
            {{ Form::label('visibilidad','Privado',array('id'=>'','class'=>'form-check-label mb-3')) }}
            @if (isset($favorito->visibilidad)=='privado')
                {{ Form::radio('visibilidad','privado', true) }}
            @else
                {{ Form::radio('visibilidad','privado', true) }}
            @endif
        </div>
    </div>

</div>

<button type="submit" class="btn btn-primary btn-block">{{ $accionBoton }}</button>