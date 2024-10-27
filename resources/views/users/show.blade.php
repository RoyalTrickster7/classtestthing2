@extends('layouts.app')

@section('content')
    <h1>Detalles del Usuario</h1>

    <p><strong>Nombre:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Rol:</strong> {{ $user->role->name ?? 'No asignado' }}</p>
    <p><strong>Departamento:</strong> {{ $user->department->name ?? 'No asignado' }}</p>

    <a href="{{ route('users.index') }}" class="btn btn-secondary">Volver a la lista</a>
@endsection
