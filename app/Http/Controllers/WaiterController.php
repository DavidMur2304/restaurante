<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Models\MenuCategory;
use App\Models\Order;

class WaiterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $tables = Table::orderBy('location')->orderBy('number')->get()->groupBy('location');
        return view('waiter.dashboard', compact('tables'));
    }

    public function tableDetail($id)
    {
        $table = Table::findOrFail($id);

        $categories = MenuCategory::orderBy('sort_order')
            ->with(['items' => fn($q) => $q->where('available', true)])
            ->get();

        $activeOrder = Order::where('table_id', $id)
            ->whereIn('status', ['pending', 'sent', 'preparing'])
            ->with('items.menuItem')
            ->latest()
            ->first();

        return view('waiter.table', compact('table', 'categories', 'activeOrder'));
    }
}
