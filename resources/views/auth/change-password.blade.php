@extends('layouts.app')

@section('content')
    <h1>Cambiar contraseña</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('update-password') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="current_password">Contraseña actual:</label>
            <input type="password" name="current_password" id="current_password" class="form-control">
        </div>

        <div class="form-group">
            <label for="new_password">Nueva contraseña:</label>
            <input type="password" name="new_password" id="new_password" class="form-control">
        </div>

        <div class="form-group">
            <label for="new_password_confirmation">Confirmar nueva contraseña:</label>
            <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Cambiar contraseña</button>
    </form>
@endsection


