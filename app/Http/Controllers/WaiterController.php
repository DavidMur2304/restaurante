<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Models\MenuCategory;
use App\Models\Order;
use App\Models\Reservation;
use Carbon\Carbon;

class WaiterController extends Controller
{
    public function dashboard()
    {
        $tables = Table::orderBy('location')->orderBy('number')->get()->groupBy('location');

        $todayReservations = Reservation::whereDate('date', Carbon::today())
            ->orderBy('time')
            ->get();

        $reservedTableIds = $todayReservations->whereNotNull('table_id')->pluck('table_id')->toArray();

        $freeTables = Table::where('status', 'free')->orderBy('location')->orderBy('number')->get();

        return view('waiter.dashboard', compact('tables', 'todayReservations', 'reservedTableIds', 'freeTables'));
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
