@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">USUARIOS</h4>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/admin/usuario/create') }}" class="btn btn-success btn-sm" title="Add New Usuario">
                            <i class="fa fa-plus" aria-hidden="true"></i> Añadir Usuario
                        </a>

                        <form method="GET" action="{{ url('/admin/usuario') }}" accept-charset="UTF-8"
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
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre Completo</th>
                                        <th>Ci</th>
                                        <th>Solicitante</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usuario as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nombre }}</td>
                                            <td>{{ $item->ci }}</td>
                                            <td>{{ $item->unisolicitante->nombre }}</td>
                                            <td>
                                                <a href="{{ url('/admin/usuario/' . $item->id) }}"
                                                    title="View Usuario"><button class="btn btn-info btn-sm"><i
                                                            class="fa fa-eye" aria-hidden="true"></i>Ver</button></a>
                                                <a href="{{ url('/admin/usuario/' . $item->id . '/edit') }}"
                                                    title="Edit Usuario"><button class="btn btn-primary btn-sm"><i
                                                            class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        Editar</button></a>

                                                <form method="POST" action="{{ url('/admin/usuario' . '/' . $item->id) }}"
                                                    accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete Usuario"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                            class="fa fa-trash-o" aria-hidden="true"></i>Borrar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $usuario->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
