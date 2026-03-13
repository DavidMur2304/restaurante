@extends('layouts.waiter')

@section('title', 'Mesa ' . $table->number)

@section('content')

<div class="max-w-7xl mx-auto" x-data="comandaApp()" x-init="init()">

    {{-- Header --}}
    <div class="flex items-center gap-4 mb-6">
        <a href="{{ route('waiter.dashboard') }}" class="text-gray-400 hover:text-white transition-colors">
            ← Volver
        </a>
        <div class="flex-1">
            <div class="flex items-center gap-3">
                <h1 class="text-2xl font-bold text-white">Mesa {{ $table->number }}</h1>
                <span class="text-sm px-3 py-1 rounded-full font-medium
                    {{ $table->status === 'free' ? 'bg-emerald-900 text-emerald-300' : '' }}
                    {{ $table->status === 'occupied' ? 'bg-red-900 text-red-300' : '' }}
                    {{ $table->status === 'reserved' ? 'bg-amber-900 text-amber-300' : '' }}">
                    {{ $table->status === 'free' ? 'Libre' : ($table->status === 'occupied' ? 'Ocupada' : 'Reservada') }}
                </span>
                <span class="text-gray-500 text-sm">{{ $table->location_label }} · {{ $table->capacity }} personas</span>
            </div>
        </div>
        @if(in_array($table->status, ['occupied', 'reserved']))
        <button onclick="if(confirm('¿Liberar la mesa?')) freeTable({{ $table->id }})"
            class="bg-gray-700 hover:bg-gray-600 text-white text-sm px-4 py-2 rounded-lg transition-colors">
            Liberar Mesa
        </button>
        @endif
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

        {{-- Menu panel --}}
        <div class="xl:col-span-2 space-y-4">
            <div class="bg-gray-800 rounded-xl border border-gray-700 overflow-hidden">
                <div class="p-4 border-b border-gray-700 flex items-center justify-between">
                    <h2 class="font-semibold text-white">Nueva Comanda</h2>
                    <span class="text-sm text-gray-400" x-text="totalItems + ' artículos · ' + totalPrice.toFixed(2) + ' €'"></span>
                </div>

                {{-- Category tabs --}}
                <div class="flex gap-1 p-3 overflow-x-auto border-b border-gray-700 bg-gray-900/50">
                    @foreach($categories as $cat)
                    <button @click="activeCategory = {{ $cat->id }}"
                        :class="activeCategory === {{ $cat->id }} ? 'bg-amber-700 text-white' : 'bg-gray-700 text-gray-300 hover:bg-gray-600'"
                        class="whitespace-nowrap text-xs font-medium px-3 py-1.5 rounded-full transition-all">
                        {{ $cat->name }}
                    </button>
                    @endforeach
                </div>

                {{-- Items --}}
                <div class="p-4 max-h-[500px] overflow-y-auto">
                    @foreach($categories as $cat)
                    <div x-show="activeCategory === {{ $cat->id }}">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                            @foreach($cat->items as $item)
                            <button @click="addItem({{ $item->id }}, '{{ addslashes($item->name) }}', {{ $item->price }})"
                                class="flex items-center justify-between gap-2 bg-gray-700/50 hover:bg-gray-700 border border-gray-600 hover:border-amber-500/50 rounded-lg p-3 text-left transition-all group">
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-white group-hover:text-amber-300 truncate">{{ $item->name }}</p>
                                    <p class="text-xs text-gray-400 truncate">{{ Str::limit($item->description, 50) }}</p>
                                </div>
                                <div class="flex items-center gap-2 shrink-0">
                                    <span class="text-amber-400 font-bold text-sm">{{ number_format($item->price, 2) }}€</span>
                                    <span class="w-6 h-6 bg-amber-700/50 group-hover:bg-amber-700 rounded-full flex items-center justify-center text-white text-xs transition-colors">+</span>
                                </div>
                            </button>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Order summary panel --}}
        <div class="space-y-4">
            {{-- Current order --}}
            <div class="bg-gray-800 rounded-xl border border-gray-700">
                <div class="p-4 border-b border-gray-700">
                    <h2 class="font-semibold text-white">Comanda Actual</h2>
                </div>
                <div class="p-4 max-h-80 overflow-y-auto">
                    <div x-show="cart.length === 0" class="text-center py-8 text-gray-500">
                        <p class="text-3xl mb-2">🛒</p>
                        <p class="text-sm">Añade artículos desde la carta</p>
                    </div>
                    <div x-show="cart.length > 0" class="space-y-2">
                        <template x-for="item in cart" :key="item.id">
                            <div class="flex items-center gap-2 bg-gray-700/50 rounded-lg p-2">
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-white truncate" x-text="item.name"></p>
                                    <p class="text-xs text-amber-400" x-text="(item.price * item.quantity).toFixed(2) + ' €'"></p>
                                </div>
                                <div class="flex items-center gap-1 shrink-0">
                                    <button @click="decreaseItem(item.id)" class="w-6 h-6 bg-gray-600 hover:bg-gray-500 rounded text-white text-xs flex items-center justify-center transition-colors">−</button>
                                    <span class="text-white text-sm font-bold w-6 text-center" x-text="item.quantity"></span>
                                    <button @click="increaseItem(item.id)" class="w-6 h-6 bg-gray-600 hover:bg-gray-500 rounded text-white text-xs flex items-center justify-center transition-colors">+</button>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
                <div class="p-4 border-t border-gray-700" x-show="cart.length > 0">
                    <div class="flex justify-between text-sm mb-2">
                        <span class="text-gray-400">Total artículos:</span>
                        <span class="text-white font-medium" x-text="totalItems"></span>
                    </div>
                    <div class="flex justify-between mb-4">
                        <span class="text-gray-400 font-medium">Total:</span>
                        <span class="text-amber-400 font-bold text-lg" x-text="totalPrice.toFixed(2) + ' €'"></span>
                    </div>
                    <div class="mb-3">
                        <textarea x-model="notes" placeholder="Notas para cocina..."
                            class="w-full bg-gray-700 border border-gray-600 rounded-lg px-3 py-2 text-sm text-white placeholder-gray-400 resize-none focus:outline-none focus:border-amber-500"
                            rows="2"></textarea>
                    </div>
                    <button @click="sendOrder({{ $table->id }})"
                        :disabled="sending"
                        class="w-full bg-amber-700 hover:bg-amber-600 disabled:opacity-50 text-white font-bold py-3 rounded-lg transition-colors flex items-center justify-center gap-2">
                        <span x-show="!sending">🔔 Enviar a Cocina</span>
                        <span x-show="sending">Enviando...</span>
                    </button>
                </div>
            </div>

            {{-- Active order status --}}
            @if($activeOrder)
            <div class="bg-gray-800 rounded-xl border border-gray-700">
                <div class="p-4 border-b border-gray-700 flex items-center justify-between">
                    <h2 class="font-semibold text-white">Comanda #{{ $activeOrder->id }}</h2>
                    <span class="text-xs font-medium px-2 py-1 rounded-full
                        {{ $activeOrder->status === 'sent' ? 'bg-blue-900 text-blue-300' : '' }}
                        {{ $activeOrder->status === 'preparing' ? 'bg-yellow-900 text-yellow-300' : '' }}
                        {{ $activeOrder->status === 'ready' ? 'bg-green-900 text-green-300' : '' }}">
                        {{ ['sent'=>'Enviada','preparing'=>'Preparando','ready'=>'Lista'][$activeOrder->status] ?? $activeOrder->status }}
                    </span>
                </div>
                <div class="p-4">
                    <ul class="space-y-1 mb-4">
                        @foreach($activeOrder->items as $item)
                        <li class="flex justify-between text-sm">
                            <span class="text-gray-300">{{ $item->quantity }}x {{ $item->menuItem->name }}</span>
                            <span class="text-gray-500">{{ number_format($item->unit_price * $item->quantity, 2) }}€</span>
                        </li>
                        @endforeach
                    </ul>
                    <div class="flex justify-between pt-3 border-t border-gray-700">
                        <span class="text-gray-400 text-sm">Total:</span>
                        <span class="text-amber-400 font-bold">{{ number_format($activeOrder->total, 2) }} €</span>
                    </div>
                    <div class="mt-3 grid grid-cols-2 gap-2">
                        @if($activeOrder->status === 'sent')
                        <button onclick="updateStatus({{ $activeOrder->id }}, 'preparing')"
                            class="bg-yellow-700 hover:bg-yellow-600 text-white text-xs font-medium py-2 px-3 rounded-lg transition-colors">
                            Preparando
                        </button>
                        @endif
                        @if(in_array($activeOrder->status, ['sent','preparing']))
                        <button onclick="updateStatus({{ $activeOrder->id }}, 'ready')"
                            class="bg-green-700 hover:bg-green-600 text-white text-xs font-medium py-2 px-3 rounded-lg transition-colors">
                            Lista ✓
                        </button>
                        @endif
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>
</div>

@push('scripts')
<script>
// Alpine.js component
function comandaApp() {
    return {
        cart: [],
        notes: '',
        sending: false,
        activeCategory: null,

        init() {
            // Set first category as active
            const firstBtn = document.querySelector('[\\@click^="activeCategory"]');
            @if($categories->isNotEmpty())
            this.activeCategory = {{ $categories->first()->id }};
            @endif
        },

        get totalItems() {
            return this.cart.reduce((sum, item) => sum + item.quantity, 0);
        },

        get totalPrice() {
            return this.cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
        },

        addItem(id, name, price) {
            const existing = this.cart.find(i => i.id === id);
            if (existing) {
                existing.quantity++;
            } else {
                this.cart.push({ id, name, price, quantity: 1 });
            }
        },

        increaseItem(id) {
            const item = this.cart.find(i => i.id === id);
            if (item) item.quantity++;
        },

        decreaseItem(id) {
            const idx = this.cart.findIndex(i => i.id === id);
            if (idx !== -1) {
                if (this.cart[idx].quantity > 1) {
                    this.cart[idx].quantity--;
                } else {
                    this.cart.splice(idx, 1);
                }
            }
        },

        async sendOrder(tableId) {
            if (this.cart.length === 0) return;
            this.sending = true;
            try {
                const response = await fetch('{{ route("waiter.order.store") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: JSON.stringify({
                        table_id: tableId,
                        items: this.cart.map(i => ({ id: i.id, quantity: i.quantity })),
                        notes: this.notes,
                    }),
                });
                const data = await response.json();
                if (data.success) {
                    alert('✅ ' + data.message);
                    this.cart = [];
                    this.notes = '';
                    location.reload();
                } else {
                    alert('❌ Error al enviar la comanda');
                }
            } catch (e) {
                alert('❌ Error de conexión');
            }
            this.sending = false;
        }
    };
}

async function updateStatus(orderId, status) {
    const labels = { preparing: 'en preparación', ready: 'lista', delivered: 'entregada' };
    if (!confirm(`¿Marcar la comanda como ${labels[status] || status}?`)) return;

    const response = await fetch(`/panel/comanda/${orderId}/estado`, {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        },
        body: JSON.stringify({ status }),
    });
    const data = await response.json();
    if (data.success) location.reload();
}

async function freeTable(tableId) {
    const response = await fetch('{{ route("waiter.table.free") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        },
        body: JSON.stringify({ table_id: tableId }),
    });
    const data = await response.json();
    if (data.success) {
        alert('✅ ' + data.message);
        window.location.href = '{{ route("waiter.dashboard") }}';
    }
}
</script>
@endpush

@endsection
