@extends('layouts.public')

@section('title', 'Nuestros Espacios')
@section('description', 'Elige entre nuestros tres espacios: Bar, Salón y Restaurante. Cada uno con su propio ambiente y encanto')

@section('content')

{{-- Header --}}
<section class="py-20 bg-gradient-to-br from-stone-800 to-amber-900 text-white text-center">
    <div class="max-w-3xl mx-auto px-4">
        <p class="text-amber-400 uppercase tracking-widest text-sm font-medium mb-3">El Sabor</p>
        <h1 class="font-serif text-5xl font-bold mb-4">Nuestros Espacios</h1>
        <p class="text-stone-300 text-lg">Tres ambientes únicos para cada ocasión. Elige el que mejor se adapte a ti.</p>
    </div>
</section>

{{-- Bar --}}
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="rounded-2xl overflow-hidden h-96 shadow-xl">
                <img src="https://images.unsplash.com/photo-1514362545857-3bc16c4c7d1b?w=800&q=80" alt="El Bar" class="w-full h-full object-cover">
            </div>
            <div>
                <span class="inline-block bg-amber-100 text-amber-700 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-4">Espacio 01</span>
                <h2 class="font-serif text-4xl font-bold text-stone-800 mb-5">El Bar</h2>
                <p class="text-stone-500 leading-relaxed mb-5">Nuestro bar es el espacio más dinámico e informal. Perfecto para disfrutar de tapas, pinchos y una selección de vinos y cócteles en un ambiente animado y social.</p>
                <p class="text-stone-500 leading-relaxed mb-8">Con capacidad para grupos pequeños, el bar es el lugar ideal para aperitivos, after-work y quedadas espontáneas con amigos.</p>
                <ul class="space-y-3 mb-8">
                    @foreach(['Ambiente informal y dinámico', '6 mesas disponibles (2-6 personas)', 'Carta de tapas y pinchos', 'Selección de cervezas y vermús', 'Horario continuo de 12:00 a 24:00'] as $feature)
                    <li class="flex items-center gap-3 text-stone-600">
                        <svg class="w-5 h-5 text-amber-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        {{ $feature }}
                    </li>
                    @endforeach
                </ul>
                <a href="{{ route('reservations.create') }}?location=bar" class="btn-primary">Reservar en el Bar</a>
            </div>
        </div>
    </div>
</section>

{{-- Room --}}
<section class="py-24 bg-stone-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="order-2 lg:order-1">
                <span class="inline-block bg-amber-100 text-amber-700 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-4">Espacio 02</span>
                <h2 class="font-serif text-4xl font-bold text-stone-800 mb-5">El Salón</h2>
                <p class="text-stone-500 leading-relaxed mb-5">Un espacio íntimo y elegante, diseñado para ocasiones especiales. El salón combina decoración cálida y luz tenue para crear la atmósfera perfecta.</p>
                <p class="text-stone-500 leading-relaxed mb-8">Ideal para cenas románticas, comidas de negocios íntimas o celebraciones familiares en un entorno acogedor y privado.</p>
                <ul class="space-y-3 mb-8">
                    @foreach(['Ambiente íntimo y elegante', '8 mesas (2-10 personas)', 'Decoración contemporánea', 'Iluminación cálida y regulable', 'Servicio de mesa personalizado'] as $feature)
                    <li class="flex items-center gap-3 text-stone-600">
                        <svg class="w-5 h-5 text-amber-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        {{ $feature }}
                    </li>
                    @endforeach
                </ul>
                <a href="{{ route('reservations.create') }}?location=room" class="btn-primary">Reservar en el Salón</a>
            </div>
            <div class="order-1 lg:order-2 rounded-2xl overflow-hidden h-96 shadow-xl">
                <img src="https://images.unsplash.com/photo-1528360983277-13d401cdc186?w=800&q=80" alt="El Salón" class="w-full h-full object-cover">
            </div>
        </div>
    </div>
</section>

{{-- Restaurant --}}
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="rounded-2xl overflow-hidden h-96 shadow-xl">
                <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=800&q=80" alt="El Restaurante" class="w-full h-full object-cover">
            </div>
            <div>
                <span class="inline-block bg-amber-100 text-amber-700 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-4">Espacio 03</span>
                <h2 class="font-serif text-4xl font-bold text-stone-800 mb-5">El Restaurante</h2>
                <p class="text-stone-500 leading-relaxed mb-5">La experiencia gastronómica completa. Nuestro restaurante principal ofrece toda la carta de autor con maridaje de vinos seleccionados de las mejores denominaciones de origen.</p>
                <p class="text-stone-500 leading-relaxed mb-8">Con 10 mesas para grupos de 2 a 12 personas, es el espacio ideal para celebraciones, eventos corporativos y quienes quieran disfrutar de lo mejor de nuestra cocina.</p>
                <ul class="space-y-3 mb-8">
                    @foreach(['Carta completa de autor', '10 mesas (2-12 personas)', 'Sumiller disponible', 'Menús degustación bajo reserva', 'Celebraciones y eventos especiales'] as $feature)
                    <li class="flex items-center gap-3 text-stone-600">
                        <svg class="w-5 h-5 text-amber-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        {{ $feature }}
                    </li>
                    @endforeach
                </ul>
                <a href="{{ route('reservations.create') }}?location=restaurant" class="btn-primary">Reservar en el Restaurante</a>
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-16 bg-amber-700 text-white text-center">
    <div class="max-w-2xl mx-auto px-4">
        <h2 class="font-serif text-3xl font-bold mb-4">¿Ya tienes claro cuál elegir?</h2>
        <p class="text-amber-100 mb-8">Haz tu reserva ahora y garantiza tu plaza en el espacio que más te guste.</p>
        <a href="{{ route('reservations.create') }}" class="bg-white text-amber-700 hover:bg-amber-50 font-bold px-8 py-4 rounded-lg transition-colors text-lg inline-block">
            Reservar Mesa
        </a>
    </div>
</section>

@endsection
