@extends('layouts.app')

@section('content')
    <h1>Lista de Pedidos</h1>
    <a href="{{ route('orders.create') }}" class="btn btn-primary">Crear Pedido</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Número de Factura</th>
                <th>Cliente</th>
                <th>Estado</th>
                <th>Fecha de Proceso</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->invoice_number }}</td>
                    <td>{{ $order->customer->name ?? 'No asignado' }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->process_date ? $order->process_date->format('d-m-Y') : 'No asignada' }}</td>
                    <td>
                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
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
