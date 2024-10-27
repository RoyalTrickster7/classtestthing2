@extends('layouts.app')

@section('content')
    <h1>Crear Departamento</h1>

    <form action="{{ route('departments.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre del Departamento</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Departamento</button>
    </form>
@endsection
