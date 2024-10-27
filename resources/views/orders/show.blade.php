@extends('layouts.app')

@section('content')
    <h1>Detalles del Pedido</h1>

    <p><strong>Número de Factura:</strong> {{ $order->invoice_number }}</p>
    <p><strong>Cliente:</strong> {{ $order->customer->name ?? 'No asignado' }}</p>
    <p><strong>Estado:</strong> {{ $order->status }}</p>
    <p><strong>Nombre del Proceso:</strong> {{ $order->process_name }}</p>
    <p><strong>Fecha de Proceso:</strong> {{ $order->process_date ? $order->process_date->format('d-m-Y') : 'No asignada' }}</p>

    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Volver a la lista</a>
@endsection
