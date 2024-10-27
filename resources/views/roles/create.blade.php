@extends('layouts.app')

@section('content')
    <h1>Crear Rol</h1>

    <form action="{{ route('roles.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre del Rol</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Rol</button>
    </form>
@endsection
