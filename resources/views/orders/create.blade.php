@extends('layouts.app')

@section('content')
    <h1>Crear Pedido</h1>

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="invoice_number">Número de Factura</label>
            <input type="text" name="invoice_number" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="customer_id">Cliente</label>
            <select name="customer_id" class="form-control" required>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="status">Estado</label>
            <input type="text" name="status" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="process_name">Nombre del Proceso</label>
            <input type="text" name="process_name" class="form-control">
        </div>

        <div class="form-group">
            <label for="process_date">Fecha de Proceso</label>
            <input type="date" name="process_date" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Guardar Pedido</button>
    </form>
@endsection
