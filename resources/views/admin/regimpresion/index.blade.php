@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">REGISTRO DE IMPRESIONES</h4>
                    </div>
                    <div class="card-body">
                        
                    <a href="{{ route('regimpresion.pdf', ['start_date' => request('start_date'), 'end_date' => request('end_date')]) }}" 
                    class="btn btn-success btn-sm" data-placement="left">
                        {{__('Reporte Global') }}
                    </a>

                        
                        &nbsp;
                        
                        <a href="{{ url('/admin/regimpresion/create') }}" class="btn btn-success btn-sm"
                            title="Add New Regimpresion">
                            <i class="fa fa-plus" aria-hidden="true"></i> Nuevo Registro
                        </a>

                        <form method="GET" action="{{ url('/admin/regimpresion') }}" accept-charset="UTF-8"
                            class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Buscar..."
                                    value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br />
                        <br />
                        <div class="table-responsive">
                        
                        <form method="GET" action="{{ url('/admin/regimpresion/pdf') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="date" class="form-control" name="start_date" placeholder="Fecha de inicio" value="{{ request('start_date') }}">
                                    <input type="date" class="form-control" name="end_date" placeholder="Fecha de fin" value="{{ request('end_date') }}">
                                    <span class="input-group-append">
                                        <button class="btn btn-secondary" type="submit">
                                            <i class="fa fa-book"></i> Reporte</i>
                                        </button>
                                    </span>
                                </div>
                            </form>


                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Usuario</th>
                                        <th>Descripcion</th>
                                        <th>Cantidad</th>
                                        <th>Fecha y hora</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($regimpresion as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->usuario->nombre }}</td>
                                            <td>{{ $item->descripcion }}</td>
                                            <td>{{ $item->cantidad }}</td>
                                            <td>{{ \Carbon\Carbon::parse($item->fecha)->format('d/m/Y H:i')}}</td>
                                            <td>
                                                <a href="{{ url('/admin/regimpresion/' . $item->id) }}"
                                                    title="View Regimpresion"><button class="btn btn-info btn-sm"><i
                                                            class="fa fa-eye" aria-hidden="true"></i>Ver</button></a>
                                                <a href="{{ url('/admin/regimpresion/' . $item->id . '/edit') }}"
                                                    title="Edit Regimpresion"><button class="btn btn-primary btn-sm"><i
                                                            class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        Editar</button></a>

                                                <form method="POST"
                                                    action="{{ url('/admin/regimpresion' . '/' . $item->id) }}"
                                                    accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete Regimpresion"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                            class="fa fa-trash-o" aria-hidden="true"></i> Borrar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $regimpresion->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
