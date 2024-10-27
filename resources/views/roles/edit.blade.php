@extends('layouts.app')

@section('content')
    <h1>Editar Rol</h1>

    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">Nombre del Rol</label>
            <input type="text" name="name" class="form-control" value="{{ $role->name }}" required>
        </div>

        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea name="description" class="form-control">{{ $role->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Rol</button>
    </form>
@endsection
