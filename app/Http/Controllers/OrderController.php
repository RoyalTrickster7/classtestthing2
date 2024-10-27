<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $users = User::all();
        return view('orders.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'status' => 'required|string|max:255',
            'process_name' => 'nullable|string|max:255',
            'process_date' => 'nullable|date',
            'customer_id' => 'required|exists:users,id',
            'user_id' => 'required|exists:users,id',
            'invoice_number' => 'nullable|string|max:255|unique:orders',
        ]);

        Order::create($validated);
        return redirect()->route('orders.index')->with('success', 'Pedido creado exitosamente.');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $users = User::all();
        return view('orders.edit', compact('order', 'users'));
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|string|max:255',
            'process_name' => 'nullable|string|max:255',
            'process_date' => 'nullable|date',
            'customer_id' => 'required|exists:users,id',
            'user_id' => 'required|exists:users,id',
            'invoice_number' => 'nullable|string|max:255|unique:orders,invoice_number,' . $order->id,
        ]);

        $order->update($validated);
        return redirect()->route('orders.index')->with('success', 'Pedido actualizado exitosamente.');
    }

    public function search(Request $request)
    {
        $order = Order::where('invoice_number', $request->invoice_number)->first();
        if ($order) {
            return view('order-details', compact('order'));
        } else {
            return redirect()->route('home')->with('error', 'Factura no encontrada');
        }
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Pedido eliminado exitosamente.');
    }

    // Nuevo método para actualizar el estado y cargar una foto de evidencia
    public function updateStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|string|max:255',
            'evidence_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validación de la foto
        ]);

        // Actualizar el estado del pedido
        $order->status = $validated['status'];

        // Verificar si el estado es 'in route' o 'delivered' y si se ha subido una foto
        if (($order->status == 'in route' || $order->status == 'delivered') && $request->hasFile('evidence_photo')) {
            $path = $request->file('evidence_photo')->store('evidence_photos', 'public'); // Guardar la foto en almacenamiento público
            $order->evidence_photo_url = $path; // Guardar la ruta de la foto en el modelo
        }

        $order->save();

        return redirect()->route('orders.show', $order->id)->with('success', 'Estado del pedido actualizado exitosamente.');
    }
}
