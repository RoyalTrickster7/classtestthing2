@extends('layouts.app')

@section('content')
    <h1>Detalles del Rol</h1>

    <p><strong>Nombre:</strong> {{ $role->name }}</p>
    <p><strong>Descripción:</strong> {{ $role->description }}</p>

    <a href="{{ route('roles.index') }}" class="btn btn-secondary">Volver a la lista</a>
@endsection
