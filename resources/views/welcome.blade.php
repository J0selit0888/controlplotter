<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro de Impresiones</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <style>
      body{
            background-image: url('images/cotel4.jpg');
            background-size: cover;
            background-position: center;
      }
    </style>
</head>

<body>
    <div class="container">
    
    <div class="text-right">
    <a href="{{ route ('auth.login')}}" class="btn btn-primary">Administrador</a>
    </div>
        
        <div class="row justify-content-center">
              <div class="col-md-9">
                <div class="login-logo">
                    <a>
                    <h1 style="color: white; font-size: 50px; font-weight: bold;">D.G.R. - FORMULARIO DE REGISTRO</h1>
                    
                    </a>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-6">

                        <div class="card">
                            <div class="card-body login-card-body">
                                <form action="{{ route('verificar.usuario') }}" method="post">
                                    @csrf
                                    <h6 class="text-center"><b>Ingresa tu número de carnet</b></h6>
                                    <div class="input-group ">
                                        <input name="ci" type="text" class="form-control" placeholder="9231324">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary">Ingresar</button>
                                        </div>
                                    </div>
                                    @error('ci')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-2">
                    <div class="card-body login-card-body">
                        <form 
                            @if (isset($buscarUsuario->id)) method="post" action="{{ route('registrar.impresion', $buscarUsuario->id) }}"   
                        @else
                         action="{{ route('validar.registro') }}" method="post" @endif>
                            @csrf
                            <h6 class="text-center"><b>REGISTRE LOS SIGUIENTES DATOS</b></h6>

                            <div class="form-group">
                                <label for="usuario_id">Usuario</label>
                                @if (isset($buscarUsuario->nombre))
                                    <input value="{{ $buscarUsuario->nombre }}" type="text" class="form-control"
                                        id="usuario_id" disabled>
                                @else
                                    <input value="" type="text" class="form-control" id="usuario_id" disabled>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="usuario_id">Numero de Carnet de Identidad</label>
                                @if (isset($buscarUsuario->ci))
                                    <input value="{{ $buscarUsuario->ci }}" type="text" class="form-control"
                                        id="usuario_id" disabled>
                                @else
                                    <input value="" type="text" class="form-control" id="usuario_id" disabled>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="unidad">Unidad</label>
                                @if (isset($buscarUsuario->unisolicitante->nombre))
                                    <input value="{{ $buscarUsuario->unisolicitante->nombre }}" type="text"
                                        class="form-control" id="unidad" disabled>
                                @else
                                    <input value="" type="text" class="form-control" id="unidad" disabled>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="fecha">Fecha</label>
                                @if (isset($fecha))
                                    <input name="fecha" value="{{ $fecha }}" type="text"
                                        class="form-control" id="fecha" disabled>
                                @else
                                    <input value="" type="text" class="form-control" id="fecha" disabled>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="cantidad">Ingrese la Cantidad</label>
                                <input name="cantidad" type="number" class="form-control" id="cantidad">
                                @error('cantidad')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleformcontrolselect1">Seleccione el Tamaño de Hoja</label>
                                <select name="hoja" class="form-control" id="exampleformcontrolselect1">
                                    <option value="">--- Seleccione el Tamaño de la Hoja ---</option>
                                    @foreach ($tamhojas as $item)
                                        <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                    @endforeach
                                </select>
                                @error('hoja')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Descripción</label>
                                <textarea name="descripcion" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>

                                @error('descripcion')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- jQuery -->
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
