@extends('layouts.waiter')

@section('title', 'Panel de Mesas')

@section('content')

<div class="max-w-7xl mx-auto">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl font-bold text-white">Estado de Mesas</h1>
            <p class="text-gray-400 text-sm mt-1">{{ now()->format('l, d \d\e F \d\e Y') }} · {{ now()->format('H:i') }}</p>
        </div>
        <div class="flex gap-4 text-sm">
            <div class="flex items-center gap-2 bg-gray-800 px-4 py-2 rounded-lg">
                <span class="w-3 h-3 bg-emerald-500 rounded-full"></span>
                <span class="text-gray-300">Libre</span>
            </div>
            <div class="flex items-center gap-2 bg-gray-800 px-4 py-2 rounded-lg">
                <span class="w-3 h-3 bg-red-500 rounded-full"></span>
                <span class="text-gray-300">Ocupada</span>
            </div>
            <div class="flex items-center gap-2 bg-gray-800 px-4 py-2 rounded-lg">
                <span class="w-3 h-3 bg-amber-500 rounded-full"></span>
                <span class="text-gray-300">Reservada</span>
            </div>
        </div>
    </div>

    {{-- Stats --}}
    @php
        $allTables = $tables->flatten();
        $free = $allTables->where('status', 'free')->count();
        $occupied = $allTables->where('status', 'occupied')->count();
        $reserved = $allTables->where('status', 'reserved')->count();
        $total = $allTables->count();
    @endphp
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-10">
        <div class="bg-gray-800 rounded-xl p-5 border border-gray-700">
            <p class="text-gray-400 text-sm">Total Mesas</p>
            <p class="text-3xl font-bold text-white mt-1">{{ $total }}</p>
        </div>
        <div class="bg-gray-800 rounded-xl p-5 border border-emerald-800/50">
            <p class="text-emerald-400 text-sm">Libres</p>
            <p class="text-3xl font-bold text-emerald-400 mt-1">{{ $free }}</p>
        </div>
        <div class="bg-gray-800 rounded-xl p-5 border border-red-800/50">
            <p class="text-red-400 text-sm">Ocupadas</p>
            <p class="text-3xl font-bold text-red-400 mt-1">{{ $occupied }}</p>
        </div>
        <div class="bg-gray-800 rounded-xl p-5 border border-amber-800/50">
            <p class="text-amber-400 text-sm">Reservadas</p>
            <p class="text-3xl font-bold text-amber-400 mt-1">{{ $reserved }}</p>
        </div>
    </div>

    {{-- Tables by location --}}
    @foreach(['bar' => ['🍻 Bar', 'bar'], 'room' => ['🕯️ Salón', 'room'], 'restaurant' => ['🍽️ Restaurante', 'restaurant']] as $key => [$label, $loc])
    @if(isset($tables[$key]) && $tables[$key]->count())
    <div class="mb-10">
        <h2 class="text-lg font-semibold text-gray-200 mb-4">{{ $label }}</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
            @foreach($tables[$key] as $table)
            @php
                $isFree = $table->status === 'free';
                $isOccupied = $table->status === 'occupied';
                $isReserved = $table->status === 'reserved';
                $borderColor = $isFree ? 'border-emerald-600' : ($isOccupied ? 'border-red-600' : 'border-amber-500');
                $bgColor = $isFree ? 'bg-emerald-950/50' : ($isOccupied ? 'bg-red-950/50' : 'bg-amber-950/50');
                $dotColor = $isFree ? 'bg-emerald-500' : ($isOccupied ? 'bg-red-500' : 'bg-amber-500');
                $textColor = $isFree ? 'text-emerald-400' : ($isOccupied ? 'text-red-400' : 'text-amber-400');
                $statusLabel = $isFree ? 'Libre' : ($isOccupied ? 'Ocupada' : 'Reservada');
            @endphp
            <a href="{{ route('waiter.table', $table->id) }}"
               class="block border-2 {{ $borderColor }} {{ $bgColor }} rounded-xl p-4 hover:scale-105 transition-all duration-200 cursor-pointer group">
                <div class="flex items-center justify-between mb-3">
                    <span class="text-xl font-bold text-white">{{ $table->number }}</span>
                    <span class="w-3 h-3 {{ $dotColor }} rounded-full {{ $isOccupied ? 'animate-pulse' : '' }}"></span>
                </div>
                <p class="text-gray-400 text-xs mb-1">{{ $table->capacity }} pers.</p>
                <p class="text-xs font-semibold {{ $textColor }}">{{ $statusLabel }}</p>
                @if($isOccupied)
                <p class="text-xs text-gray-500 mt-1 group-hover:text-gray-300">Ver comanda →</p>
                @elseif($isFree)
                <p class="text-xs text-gray-500 mt-1 group-hover:text-gray-300">Nueva comanda →</p>
                @endif
            </a>
            @endforeach
        </div>
    </div>
    @endif
    @endforeach

    {{-- Active orders --}}
    <div class="mt-10">
        <h2 class="text-lg font-semibold text-gray-200 mb-4">⏳ Comandas Activas</h2>
        @php
            $activeOrders = \App\Models\Order::whereIn('status', ['sent','preparing'])->with(['table','items.menuItem'])->latest()->get();
        @endphp
        @if($activeOrders->isEmpty())
        <div class="bg-gray-800 rounded-xl p-8 text-center border border-gray-700">
            <p class="text-gray-400">No hay comandas activas en este momento.</p>
        </div>
        @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($activeOrders as $order)
            <div class="bg-gray-800 border border-gray-700 rounded-xl p-5">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <span class="text-white font-bold">Mesa {{ $order->table->number }}</span>
                        <span class="text-gray-400 text-sm ml-2">#{{ $order->id }}</span>
                    </div>
                    @php
                        $statusMap = ['sent' => ['Enviada','bg-blue-900 text-blue-300'], 'preparing' => ['Preparando','bg-yellow-900 text-yellow-300']];
                        [$statusLabel, $statusClass] = $statusMap[$order->status] ?? ['Desconocido','bg-gray-700 text-gray-300'];
                    @endphp
                    <span class="text-xs font-medium px-2 py-1 rounded-full {{ $statusClass }}">{{ $statusLabel }}</span>
                </div>
                <ul class="space-y-1 mb-4">
                    @foreach($order->items->take(4) as $item)
                    <li class="flex justify-between text-sm">
                        <span class="text-gray-300">{{ $item->quantity }}x {{ $item->menuItem->name }}</span>
                        <span class="text-gray-500">{{ number_format($item->unit_price * $item->quantity, 2) }}€</span>
                    </li>
                    @endforeach
                    @if($order->items->count() > 4)
                    <li class="text-xs text-gray-500">+{{ $order->items->count() - 4 }} artículos más...</li>
                    @endif
                </ul>
                <div class="flex items-center justify-between pt-3 border-t border-gray-700">
                    <span class="text-amber-400 font-bold">{{ number_format($order->total, 2) }} €</span>
                    <a href="{{ route('waiter.table', $order->table_id) }}" class="text-xs bg-gray-700 hover:bg-gray-600 text-gray-200 px-3 py-1.5 rounded-lg transition-colors">
                        Ver mesa →
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>

</div>

@push('scripts')
<script>
    // Auto refresh every 30 seconds
    setTimeout(() => location.reload(), 30000);
</script>
@endpush

@endsection
