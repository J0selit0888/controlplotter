@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">MOSTRAR REGISTRO</h4>
                    </div>
                    <div class="card-body">

                        <a href="{{ url('/admin/regimpresion') }}" title="Back"><button class="btn btn-warning btn-sm"><i
                                    class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/regimpresion/' . $regimpresion->id . '/edit') }}"
                            title="Edit Regimpresion"><button class="btn btn-primary btn-sm"><i
                                    class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/regimpresion' . '/' . $regimpresion->id) }}"
                            accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Regimpresion"
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
                                        <td>{{ $regimpresion->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Descripcion </th>
                                        <td> {{ $regimpresion->descripcion }} </td>
                                    </tr>
                                    <tr>
                                        <th> Cantidad </th>
                                        <td> {{ $regimpresion->cantidad }} </td>
                                    </tr>
                                    <tr>
                                        <th> Fecha </th>
                                        <td> {{ $regimpresion->fecha }} </td>
                                    </tr>
                                    <tr>
                                        <th> Usuario </th>
                                        <td> {{ $regimpresion->usuario->nombre }} </td>
                                    </tr>
                                    <tr>
                                        <th> Tamaño </th>
                                        <td> {{ $regimpresion->tamhoja->nombre }} </td>
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
