@extends('layouts.app')

@section('content')
    <h1>Detalles de la Factura</h1>

    @if($order->status == 'delivered')
        <p><strong>Foto de Entrega:</strong></p>
        <img src="{{ $order->delivery_photo_url }}" alt="Foto de entrega" class="img-fluid">
    @elseif($order->status == 'in process')
        <p><strong>Proceso:</strong> {{ $order->process_name }}</p>
        <p><strong>Fecha de Proceso:</strong> {{ $order->process_date->format('d-m-Y') }}</p>
    @endif
@endsection
