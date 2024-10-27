@extends('layouts.app')

@section('content')
    <h1>Buscar Factura</h1>
    <form action="{{ route('order.search') }}" method="GET">
        <div class="form-group">
            <label for="invoice_number">Número de Factura</label>
            <input type="text" name="invoice_number" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
@endsection
