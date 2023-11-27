@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">MOSTRAR USUARIO</h4>
                    </div>
                    <div class="card-body">

                        <a href="{{ url('/admin/usuario') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/usuario/' . $usuario->id . '/edit') }}" title="Edit Usuario"><button
                                class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                Edit</button></a>

                        <form method="POST" action="{{ url('admin/usuario' . '/' . $usuario->id) }}" accept-charset="UTF-8"
                            style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Usuario"
                                onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                                    aria-hidden="true"></i> Delete</button>
                        </form>
                        <br />
                        <br />

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $usuario->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Nombre </th>
                                        <td> {{ $usuario->nombre }} </td>
                                    </tr>
                                    <tr>
                                        <th> Ci </th>
                                        <td> {{ $usuario->ci }} </td>
                                    </tr>
                                    <tr>
                                        <th> Unidad </th>
                                        <td> {{ $usuario->unisolicitante->nombre }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
