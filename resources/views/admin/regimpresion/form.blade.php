<div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
    <label for="descripcion" class="control-label">{{ 'Descripcion' }}</label>
    <input class="form-control" name="descripcion" type="text" id="descripcion" value="{{ isset($regimpresion->descripcion) ? $regimpresion->descripcion : ''}}" >
    {!! $errors->first('descripcion', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('cantidad') ? 'has-error' : ''}}">
    <label for="cantidad" class="control-label">{{ 'Cantidad' }}</label>
    <input class="form-control" name="cantidad" type="number" id="cantidad" value="{{ isset($regimpresion->cantidad) ? $regimpresion->cantidad : ''}}" >
    {!! $errors->first('cantidad', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('fecha') ? 'has-error' : ''}}">
    <label for="fecha" class="control-label">{{ 'Fecha' }}</label>
    <input class="form-control" name="fecha" type="date" id="fecha" value="{{ isset($regimpresion->fecha) ? $regimpresion->fecha : ''}}" >
    {!! $errors->first('fecha', '<p class="help-block">:message</p>') !!}
</div>
{{-- <div class="form-group {{ $errors->has('usuario_id') ? 'has-error' : ''}}">
    <label for="usuario_id" class="control-label">{{ 'Usuario Id' }}</label>
    <input class="form-control" name="usuario_id" type="number" id="usuario_id" value="{{ isset($regimpresion->usuario_id) ? $regimpresion->usuario_id : ''}}" >
    {!! $errors->first('usuario_id', '<p class="help-block">:message</p>') !!}
</div> --}}

<div class="form-group {{ $errors->has('usuario_id') ? 'has-error' : ''}}">
    <label for="usuario_id" class="control-label">{{ 'Usuario' }}</label>
    <select required name="usuario_id" class="form-control" id="exampleFormControlSelect1">
    <option value="">--Seleccione el Usuario--</option>
    @foreach ($usuarios as $usuario)
        <option value="{{ isset($usuario->id) ? $usuario->id : '' }}"
            @if(isset($regimpresion))
                @if($usuario->id == $regimpresion->usuario_id)
                    selected
                @endif
            @endif
            >{{ $usuario->nombre }}</option>
    @endforeach
    
    </select>
    {!! $errors->first('usuario_id', '<p class="help-block">:message</p>') !!}
</div>
{{-- <div class="form-group {{ $errors->has('tamhoja_id') ? 'has-error' : ''}}">
    <label for="tamhoja_id" class="control-label">{{ 'Tamhoja Id' }}</label>
    <input class="form-control" name="tamhoja_id" type="number" id="tamhoja_id" value="{{ isset($regimpresion->tamhoja_id) ? $regimpresion->tamhoja_id : ''}}" >
    {!! $errors->first('tamhoja_id', '<p class="help-block">:message</p>') !!}
</div> --}}

<div class="form-group {{ $errors->has('tamhoja_id') ? 'has-error' : ''}}">
    <label for="tamhoja_id" class="control-label">{{ 'Tamaño de Hoja' }}</label>
    <select required name="tamhoja_id" class="form-control" id="exampleFormControlSelect1">
    <option value="">--Seleccione el Tamaño de Hoja--</option>
    @foreach ($hojas as $hoja)
        <option value="{{ isset($hoja->id) ? $hoja->id : '' }}"
            @if(isset($regimpresion))
                @if($hoja->id == $regimpresion->tamhoja_id)
                    selected
                @endif
            @endif
            >{{ $hoja->nombre }}</option>
    @endforeach
    
    </select>
    {!! $errors->first('tamhoja_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
</div>
