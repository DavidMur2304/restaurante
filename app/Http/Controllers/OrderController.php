<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\MenuItem;
use App\Models\Table;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $request->validate([
            'table_id' => 'required|exists:tables,id',
            'items'    => 'required|array|min:1',
            'items.*.id'       => 'required|exists:menu_items,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        $table = Table::findOrFail($request->table_id);

        $order = Order::create([
            'table_id' => $table->id,
            'user_id'  => auth()->id(),
            'status'   => 'sent',
            'notes'    => $request->notes,
        ]);

        $total = 0;
        foreach ($request->items as $item) {
            $menuItem = MenuItem::findOrFail($item['id']);
            $order->items()->create([
                'menu_item_id' => $menuItem->id,
                'quantity'     => $item['quantity'],
                'unit_price'   => $menuItem->price,
                'notes'        => $item['notes'] ?? null,
            ]);
            $total += $menuItem->price * $item['quantity'];
        }

        $order->update(['total' => $total]);
        $table->update(['status' => 'occupied']);

        return response()->json([
            'success' => true,
            'message' => '¡Comanda enviada a cocina!',
            'order_id' => $order->id,
        ]);
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,sent,preparing,ready,delivered',
        ]);

        $order->update(['status' => $request->status]);

        if ($request->status === 'delivered') {
            $order->table->update(['status' => 'free']);
        }

        return response()->json(['success' => true]);
    }

    public function freeTable(Request $request)
    {
        $request->validate(['table_id' => 'required|exists:tables,id']);

        $table = Table::findOrFail($request->table_id);
        $table->update(['status' => 'free']);

        Order::where('table_id', $table->id)
            ->whereIn('status', ['pending', 'sent', 'preparing', 'ready'])
            ->update(['status' => 'delivered']);

        return response()->json(['success' => true, 'message' => 'Mesa liberada correctamente']);
    }
}
