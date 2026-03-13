<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'El Sabor - Restaurante') | El Sabor</title>
    <meta name="description" content="@yield('description', 'Restaurante El Sabor - Cocina de autor con productos frescos de temporada')">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-serif { font-family: 'Playfair Display', serif; }
    </style>
</head>
<body class="bg-stone-50 text-stone-800">

    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white/95 backdrop-blur-sm shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <span class="text-2xl font-serif font-bold text-amber-700">El Sabor</span>
                </a>

                <!-- Desktop nav -->
                <div class="hidden md:flex items-center gap-8">
                    <a href="{{ route('home') }}" class="text-stone-600 hover:text-amber-700 font-medium transition-colors {{ request()->routeIs('home') ? 'text-amber-700' : '' }}">Inicio</a>
                    <a href="{{ route('menu') }}" class="text-stone-600 hover:text-amber-700 font-medium transition-colors {{ request()->routeIs('menu') ? 'text-amber-700' : '' }}">La Carta</a>
                    <a href="{{ route('spaces') }}" class="text-stone-600 hover:text-amber-700 font-medium transition-colors {{ request()->routeIs('spaces') ? 'text-amber-700' : '' }}">Espacios</a>
                    <a href="{{ route('reservations.create') }}" class="text-stone-600 hover:text-amber-700 font-medium transition-colors {{ request()->routeIs('reservations.*') ? 'text-amber-700' : '' }}">Reservas</a>
                    <a href="{{ route('contact') }}" class="text-stone-600 hover:text-amber-700 font-medium transition-colors {{ request()->routeIs('contact') ? 'text-amber-700' : '' }}">Contacto</a>
                </div>

                <div class="flex items-center gap-3">
                    <a href="{{ route('reservations.create') }}" class="hidden md:inline-flex bg-amber-700 hover:bg-amber-800 text-white text-sm font-semibold px-4 py-2 rounded-lg transition-colors">
                        Reservar Mesa
                    </a>
                    @auth
                    <a href="{{ route('waiter.dashboard') }}" class="text-xs bg-stone-800 text-white px-3 py-1.5 rounded-lg hover:bg-stone-700 transition-colors">Panel Camarero</a>
                    @endauth

                    <!-- Mobile menu button -->
                    <button id="mobile-menu-btn" class="md:hidden p-2 rounded-lg text-stone-600 hover:bg-stone-100">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile nav -->
            <div id="mobile-menu" class="md:hidden hidden pb-4 border-t border-stone-100 mt-2 pt-4">
                <div class="flex flex-col gap-3">
                    <a href="{{ route('home') }}" class="text-stone-600 hover:text-amber-700 font-medium py-1">Inicio</a>
                    <a href="{{ route('menu') }}" class="text-stone-600 hover:text-amber-700 font-medium py-1">La Carta</a>
                    <a href="{{ route('spaces') }}" class="text-stone-600 hover:text-amber-700 font-medium py-1">Espacios</a>
                    <a href="{{ route('reservations.create') }}" class="text-stone-600 hover:text-amber-700 font-medium py-1">Reservas</a>
                    <a href="{{ route('contact') }}" class="text-stone-600 hover:text-amber-700 font-medium py-1">Contacto</a>
                    <a href="{{ route('reservations.create') }}" class="btn-primary text-center mt-2">Reservar Mesa</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main content -->
    <main class="pt-16">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-stone-900 text-stone-300 pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mb-12">
                <div class="md:col-span-2">
                    <h3 class="text-2xl font-serif font-bold text-white mb-4">El Sabor</h3>
                    <p class="text-stone-400 leading-relaxed mb-6">Restaurante de cocina de autor en el corazón de la ciudad. Experiencias gastronómicas únicas con productos frescos de temporada.</p>
                    <div class="flex gap-4">
                        <a href="#" class="w-9 h-9 bg-stone-700 hover:bg-amber-700 rounded-full flex items-center justify-center transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="#" class="w-9 h-9 bg-stone-700 hover:bg-amber-700 rounded-full flex items-center justify-center transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                    </div>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4">Navegación</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-stone-400 hover:text-amber-400 transition-colors text-sm">Inicio</a></li>
                        <li><a href="{{ route('menu') }}" class="text-stone-400 hover:text-amber-400 transition-colors text-sm">La Carta</a></li>
                        <li><a href="{{ route('spaces') }}" class="text-stone-400 hover:text-amber-400 transition-colors text-sm">Espacios</a></li>
                        <li><a href="{{ route('reservations.create') }}" class="text-stone-400 hover:text-amber-400 transition-colors text-sm">Reservas</a></li>
                        <li><a href="{{ route('contact') }}" class="text-stone-400 hover:text-amber-400 transition-colors text-sm">Contacto</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4">Contacto</h4>
                    <ul class="space-y-2 text-sm text-stone-400">
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 mt-0.5 text-amber-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            Calle Mayor 15, 50001 Zaragoza
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-amber-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            976 123 456
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-amber-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Mar–Dom: 13:00 – 23:00
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-amber-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            info@restauranteelsabor.com
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-stone-700 pt-8 text-center text-stone-500 text-sm">
                <p>&copy; {{ date('Y') }} Restaurante El Sabor. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <script>
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
    @stack('scripts')
</body>
</html>
