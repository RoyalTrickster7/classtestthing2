@extends('layouts.app')

@section('content')
    <h1>Panel de Control</h1>
    <ul>
        <li><a href="{{ route('users.index') }}">Usuarios</a></li>
        <li><a href="{{ route('roles.index') }}">Roles</a></li>
        <li><a href="{{ route('orders.index') }}">Pedidos</a></li>
        <li><a href="{{ route('departments.index') }}">Departamentos</a></li>
    </ul>
@endsection
