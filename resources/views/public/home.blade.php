@extends('layouts.public')

@section('title', 'Inicio')
@section('description', 'Restaurante El Sabor - Cocina de autor con productos frescos de temporada en Zaragoza')

@section('content')

{{-- Hero --}}
<section class="relative h-screen min-h-[600px] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-stone-900 via-stone-800 to-amber-900"></div>
    <div class="absolute inset-0 opacity-20" style="background-image: url('https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=1600&q=80'); background-size: cover; background-position: center;"></div>
    <div class="absolute inset-0 bg-black/40"></div>
    <div class="relative z-10 text-center text-white px-4 max-w-4xl mx-auto">
        <p class="text-amber-400 font-medium tracking-widest uppercase text-sm mb-4">Bienvenidos a</p>
        <h1 class="font-serif text-5xl md:text-7xl font-bold mb-6 leading-tight">El Sabor</h1>
        <p class="text-xl md:text-2xl text-stone-200 mb-4 font-light">Cocina de autor con alma mediterránea</p>
        <p class="text-stone-300 mb-10 max-w-2xl mx-auto">Ingredientes frescos de temporada, recetas de tradición y una experiencia gastronómica que recordarás para siempre.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('reservations.create') }}" class="bg-amber-700 hover:bg-amber-600 text-white font-semibold px-8 py-4 rounded-lg transition-all duration-200 text-lg">
                Reservar Mesa
            </a>
            <a href="{{ route('menu') }}" class="border-2 border-white/70 hover:border-white text-white hover:bg-white/10 font-semibold px-8 py-4 rounded-lg transition-all duration-200 text-lg">
                Ver la Carta
            </a>
        </div>
    </div>
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
        <svg class="w-6 h-6 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
    </div>
</section>

{{-- Features --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <div class="text-center">
                <div class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-5">
                    <svg class="w-8 h-8 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-serif font-bold text-stone-800 mb-3">Cocina de Autor</h3>
                <p class="text-stone-500 leading-relaxed">Nuestra chef combina técnicas clásicas con creatividad contemporánea para ofrecer platos únicos y memorables.</p>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-5">
                    <svg class="w-8 h-8 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064"/>
                    </svg>
                </div>
                <h3 class="text-xl font-serif font-bold text-stone-800 mb-3">Producto Local</h3>
                <p class="text-stone-500 leading-relaxed">Trabajamos con productores locales de Aragón para garantizar la máxima frescura y apoyar la economía de la región.</p>
            </div>
            <div class="text-center">
                <div class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-5">
                    <svg class="w-8 h-8 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-serif font-bold text-stone-800 mb-3">Experiencia Única</h3>
                <p class="text-stone-500 leading-relaxed">Cada visita a El Sabor es una experiencia sensorial completa: sabor, ambiente y servicio de primer nivel.</p>
            </div>
        </div>
    </div>
</section>

{{-- About --}}
<section class="py-20 bg-stone-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <p class="text-amber-700 font-semibold uppercase tracking-wide text-sm mb-3">Nuestra Historia</p>
                <h2 class="font-serif text-4xl font-bold text-stone-800 mb-6 leading-tight">Pasión por la buena cocina desde 1998</h2>
                <p class="text-stone-500 leading-relaxed mb-5">Lo que empezó como un pequeño restaurante familiar en el corazón de Zaragoza se ha convertido en uno de los referentes gastronómicos de Aragón. Durante más de 25 años, hemos mantenido el compromiso con la calidad y la tradición.</p>
                <p class="text-stone-500 leading-relaxed mb-8">Nuestros platos cuentan historias de la tierra aragonesa: el aceite del bajo Aragón, los vinos de Cariñena, las verduras de la ribera del Ebro y las carnes de los Pirineos.</p>
                <div class="grid grid-cols-3 gap-6 mb-8">
                    <div class="text-center">
                        <p class="text-3xl font-serif font-bold text-amber-700">25+</p>
                        <p class="text-stone-500 text-sm">Años de experiencia</p>
                    </div>
                    <div class="text-center">
                        <p class="text-3xl font-serif font-bold text-amber-700">3</p>
                        <p class="text-stone-500 text-sm">Espacios únicos</p>
                    </div>
                    <div class="text-center">
                        <p class="text-3xl font-serif font-bold text-amber-700">4.9★</p>
                        <p class="text-stone-500 text-sm">Valoración media</p>
                    </div>
                </div>
                <a href="{{ route('spaces') }}" class="btn-primary">Conocer nuestros espacios</a>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-4">
                    <div class="h-48 bg-amber-100 rounded-2xl overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1559339352-11d035aa65de?w=400&q=80" alt="Interior" class="w-full h-full object-cover">
                    </div>
                    <div class="h-32 bg-stone-200 rounded-2xl overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1544025162-d76694265947?w=400&q=80" alt="Plato" class="w-full h-full object-cover">
                    </div>
                </div>
                <div class="space-y-4 pt-8">
                    <div class="h-32 bg-stone-200 rounded-2xl overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1567620905732-2d1ec7ab7445?w=400&q=80" alt="Cocina" class="w-full h-full object-cover">
                    </div>
                    <div class="h-48 bg-amber-100 rounded-2xl overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1476224203421-9ac39bcb3327?w=400&q=80" alt="Vinos" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Spaces preview --}}
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <p class="text-amber-700 font-semibold uppercase tracking-wide text-sm mb-3">Dónde comer</p>
        <h2 class="font-serif text-4xl font-bold text-stone-800 mb-4">Nuestros Espacios</h2>
        <p class="text-stone-500 mb-12 max-w-2xl mx-auto">Elige el ambiente que más se adapte a tu ocasión: informal en el bar, íntimo en el salón o la experiencia completa en el restaurante.</p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach([['bar','El Bar','Ambiente informal para tapas y vinos. Perfecto para aperitivos y quedadas con amigos.','https://images.unsplash.com/photo-1514362545857-3bc16c4c7d1b?w=600&q=80'],['room','El Salón','Espacio íntimo y elegante, ideal para cenas románticas y reuniones privadas.','https://images.unsplash.com/photo-1528360983277-13d401cdc186?w=600&q=80'],['restaurant','El Restaurante','La experiencia gastronómica completa con nuestra carta de autor y vinos seleccionados.','https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=600&q=80']] as [$slug, $name, $desc, $img])
            <div class="group relative overflow-hidden rounded-2xl h-72 cursor-pointer">
                <img src="{{ $img }}" alt="{{ $name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                    <h3 class="font-serif text-2xl font-bold mb-1">{{ $name }}</h3>
                    <p class="text-stone-200 text-sm">{{ $desc }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="mt-10">
            <a href="{{ route('spaces') }}" class="btn-secondary">Ver todos los espacios</a>
        </div>
    </div>
</section>

{{-- CTA Reservation --}}
<section class="py-20 bg-amber-700">
    <div class="max-w-4xl mx-auto px-4 text-center text-white">
        <h2 class="font-serif text-4xl font-bold mb-4">¿Tienes una ocasión especial?</h2>
        <p class="text-amber-100 text-lg mb-8">Reserva tu mesa ahora y déjanos sorprenderte. Disponemos de menús especiales para celebraciones, eventos corporativos y grupos.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('reservations.create') }}" class="bg-white text-amber-700 hover:bg-amber-50 font-bold px-8 py-4 rounded-lg transition-colors text-lg">
                Hacer una Reserva
            </a>
            <a href="{{ route('contact') }}" class="border-2 border-white/70 text-white hover:bg-white/10 font-semibold px-8 py-4 rounded-lg transition-colors text-lg">
                Contactar con nosotros
            </a>
        </div>
    </div>
</section>

{{-- Testimonials --}}
<section class="py-20 bg-stone-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <h2 class="font-serif text-4xl font-bold text-stone-800 mb-4">Lo que dicen nuestros clientes</h2>
            <p class="text-stone-500">Las mejores experiencias las crean quienes nos visitan.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach([
                ['Ana M.', 'Una experiencia gastronómica increíble. Los platos son de una calidad excepcional y el servicio es atento y profesional. Sin duda volvería.', 5],
                ['Carlos R.', 'Celebramos nuestro aniversario aquí y fue perfecto. El salón tiene un ambiente íntimo precioso. La carta de vinos, espectacular.', 5],
                ['Laura G.', 'El chuletón de buey es de los mejores que he probado. El pulpo a la gallega, impresionante. El personal muy amable. 100% recomendable.', 5],
            ] as [$name, $text, $stars])
            <div class="bg-white rounded-2xl p-8 shadow-sm">
                <div class="flex gap-1 mb-4">
                    @for($i = 0; $i < $stars; $i++)<svg class="w-5 h-5 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>@endfor
                </div>
                <p class="text-stone-600 leading-relaxed mb-6">"{{ $text }}"</p>
                <p class="font-semibold text-stone-800">{{ $name }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
