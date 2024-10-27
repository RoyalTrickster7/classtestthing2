@extends('layouts.app')

@section('content')
    <h1>Lista de Departamentos</h1>
    <a href="{{ route('departments.create') }}" class="btn btn-primary">Crear Departamento</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($departments as $department)
                <tr>
                    <td>{{ $department->id }}</td>
                    <td>{{ $department->name }}</td>
                    <td>
                        <a href="{{ route('departments.show', $department->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('departments.destroy', $department->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
