@extends('layouts.app')

@section('content')
    <h1>Editar Pedido</h1>

    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="invoice_number">Número de Factura</label>
            <input type="text" name="invoice_number" class="form-control" value="{{ $order->invoice_number }}" required>
        </div>

        <div class="form-group">
            <label for="customer_id">Cliente</label>
            <select name="customer_id" class="form-control" required>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" {{ $order->customer_id == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="status">Estado</label>
            <input type="text" name="status" class="form-control" value="{{ $order->status }}" required>
        </div>

        <div class="form-group">
            <label for="process_name">Nombre del Proceso</label>
            <input type="text" name="process_name" class="form-control" value="{{ $order->process_name }}">
        </div>

        <div class="form-group">
            <label for="process_date">Fecha de Proceso</label>
            <input type="date" name="process_date" class="form-control" value="{{ $order->process_date ? $order->process_date->format('Y-m-d') : '' }}">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Pedido</button>
    </form>

    <hr>

    
    <h2>Actualizar Estado del Pedido</h2>
    <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="status">Estado del Pedido</label>
            <select name="status" class="form-control" required>
                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="in route" {{ $order->status == 'in route' ? 'selected' : '' }}>In Route</option>
                <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
            </select>
        </div>

        <div class="form-group">
            <label for="evidence_photo">Foto de Evidencia (Opcional)</label>
            <input type="file" name="evidence_photo" class="form-control">
        </div>

        <button type="submit" class="btn btn-secondary">Actualizar Estado</button>
    </form>
@endsection
