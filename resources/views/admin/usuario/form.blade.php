<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="control-label">{{ 'Nombre' }}</label>
    <input class="form-control" name="nombre" type="text" id="nombre" value="{{ isset($usuario->nombre) ? $usuario->nombre : ''}}" >
    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('ci') ? 'has-error' : ''}}">
    <label for="ci" class="control-label">{{ 'Ci' }}</label>
    <input class="form-control" name="ci" type="text" id="ci" value="{{ isset($usuario->ci) ? $usuario->ci : ''}}" >
    {!! $errors->first('ci', '<p class="help-block">:message</p>') !!}
</div>
{{-- <div class="form-group {{ $errors->has('unisolicitante_id') ? 'has-error' : ''}}">
    <label for="unisolicitante_id" class="control-label">{{ 'Unisolicitante Id' }}</label>
    <input class="form-control" name="unisolicitante_id" type="number" id="unisolicitante_id" value="{{ isset($usuario->unisolicitante_id) ? $usuario->unisolicitante_id : ''}}" >
    {!! $errors->first('unisolicitante_id', '<p class="help-block">:message</p>') !!}
</div> --}}

<div class="form-group {{ $errors->has('unisolicitante_id') ? 'has-error' : ''}}">
    <label for="unisolicitante_id" class="control-label">{{ 'Uni solicitante Id' }}</label>
    <select required name="unisolicitante_id" class="form-control" id="exampleFormControlSelect1">
    <option value="">--Seleccione la Clasificación--</option>
    @foreach ($unidades as $unidad)
        <option value="{{ isset($unidad->id) ? $unidad->id : '' }}"
            @if(isset($usuario))
                @if($unidad->id == $usuario->unisolicitante_id)
                    selected
                @endif
            @endif
            >{{ $unidad->nombre }}</option>
    @endforeach
    
    </select>
    {!! $errors->first('unisolicitante_id', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
