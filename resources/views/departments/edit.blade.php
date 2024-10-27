@extends('layouts.app')

@section('content')
    <h1>Editar Departamento</h1>

    <form action="{{ route('departments.update', $department->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">Nombre del Departamento</label>
            <input type="text" name="name" class="form-control" value="{{ $department->name }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Departamento</button>
    </form>
@endsection
