@extends('layouts.public')

@section('title', 'La Carta')
@section('description', 'Descubre nuestra carta de cocina de autor con entrantes, primeros, segundos, postres y bebidas')

@section('content')

{{-- Header --}}
<section class="py-20 bg-gradient-to-br from-stone-800 to-amber-900 text-white text-center">
    <div class="max-w-3xl mx-auto px-4">
        <p class="text-amber-400 uppercase tracking-widest text-sm font-medium mb-3">Restaurante El Sabor</p>
        <h1 class="font-serif text-5xl font-bold mb-4">Nuestra Carta</h1>
        <p class="text-stone-300 text-lg">Elaborada con productos frescos de temporada y proveedores locales de Aragón</p>
    </div>
</section>

{{-- Tab nav --}}
<nav class="sticky top-16 z-40 bg-white shadow-sm border-b border-stone-200">
    <div class="max-w-7xl mx-auto px-4 overflow-x-auto">
        <div class="flex gap-1 py-3 min-w-max">
            <button onclick="showTab('comida')" id="tab-comida" class="tab-btn active px-5 py-2 rounded-full text-sm font-medium transition-all">🍽 Carta de Cocina</button>
            <button onclick="showTab('bebidas')" id="tab-bebidas" class="tab-btn px-5 py-2 rounded-full text-sm font-medium transition-all">🍷 Carta de Bebidas</button>
        </div>
    </div>
</nav>

{{-- Food categories --}}
<div id="content-comida" class="tab-content">
    @foreach($foodCategories as $category)
    <section class="py-16 {{ $loop->even ? 'bg-stone-50' : 'bg-white' }}">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="font-serif text-3xl md:text-4xl font-bold text-stone-800 mb-2">{{ $category->name }}</h2>
                <div class="w-16 h-1 bg-amber-600 mx-auto rounded"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($category->items as $item)
                <div class="flex gap-4 p-5 bg-white rounded-xl border border-stone-100 hover:border-amber-200 hover:shadow-md transition-all duration-200">
                    <div class="flex-1 min-w-0">
                        <div class="flex items-start justify-between gap-4 mb-1">
                            <h3 class="font-semibold text-stone-800 text-lg leading-snug">{{ $item->name }}</h3>
                            <span class="font-bold text-amber-700 text-lg whitespace-nowrap">{{ number_format($item->price, 2) }} €</span>
                        </div>
                        @if($item->description)
                        <p class="text-stone-500 text-sm leading-relaxed">{{ $item->description }}</p>
                        @endif
                        @if($item->allergens)
                        <p class="text-xs text-stone-400 mt-2">
                            <span class="font-medium">Alérgenos:</span> {{ $item->allergens }}
                        </p>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endforeach
</div>

{{-- Drinks categories --}}
<div id="content-bebidas" class="tab-content hidden">
    {{-- Non-alcoholic first --}}
    @foreach($drinkCategories as $category)
    <section class="py-16 {{ $loop->even ? 'bg-stone-50' : 'bg-white' }}">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="font-serif text-3xl md:text-4xl font-bold text-stone-800 mb-2">{{ $category->name }}</h2>
                <div class="w-16 h-1 bg-amber-600 mx-auto rounded"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-4xl mx-auto">
                @foreach($category->items as $item)
                <div class="flex items-center justify-between p-5 bg-white rounded-xl border border-stone-100 hover:border-amber-200 hover:shadow-md transition-all duration-200">
                    <div class="flex-1">
                        <h3 class="font-semibold text-stone-800">{{ $item->name }}</h3>
                        @if($item->description)
                        <p class="text-stone-500 text-sm mt-0.5">{{ $item->description }}</p>
                        @endif
                        @if($item->allergens)
                        <p class="text-xs text-stone-400 mt-1"><span class="font-medium">Alérgenos:</span> {{ $item->allergens }}</p>
                        @endif
                    </div>
                    <span class="font-bold text-amber-700 text-lg ml-4 whitespace-nowrap">{{ number_format($item->price, 2) }} €</span>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endforeach
</div>

{{-- Allergen info --}}
<section class="py-10 bg-amber-50 border-t border-amber-100">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <p class="text-sm text-stone-500">
            <svg class="w-4 h-4 inline-block mr-1 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            Si tienes alguna alergia o intolerancia alimentaria, por favor comunícaselo a nuestro personal. Podemos adaptar algunos platos a tus necesidades.
        </p>
    </div>
</section>

{{-- CTA --}}
<section class="py-16 bg-stone-800 text-white text-center">
    <div class="max-w-2xl mx-auto px-4">
        <h2 class="font-serif text-3xl font-bold mb-4">¿Te ha gustado lo que ves?</h2>
        <p class="text-stone-300 mb-8">Reserva tu mesa y disfruta de toda nuestra carta en el mejor ambiente.</p>
        <a href="{{ route('reservations.create') }}" class="bg-amber-700 hover:bg-amber-600 text-white font-bold px-8 py-4 rounded-lg transition-colors text-lg">
            Reservar Ahora
        </a>
    </div>
</section>

@endsection

@push('scripts')
<script>
function showTab(tab) {
    document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
    document.querySelectorAll('.tab-btn').forEach(el => {
        el.classList.remove('active', 'bg-amber-700', 'text-white');
        el.classList.add('text-stone-600', 'hover:bg-stone-100');
    });
    document.getElementById('content-' + tab).classList.remove('hidden');
    const btn = document.getElementById('tab-' + tab);
    btn.classList.add('bg-amber-700', 'text-white');
    btn.classList.remove('text-stone-600', 'hover:bg-stone-100');
}
document.addEventListener('DOMContentLoaded', () => showTab('comida'));
</script>
@endpush
