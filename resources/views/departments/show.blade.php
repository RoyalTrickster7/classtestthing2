@extends('layouts.app')

@section('content')
    <h1>Detalles del Departamento</h1>

    <p><strong>Nombre:</strong> {{ $department->name }}</p>

    <a href="{{ route('departments.index') }}" class="btn btn-secondary">Volver a la lista</a>
@endsection
