<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Panel Camarero') | El Sabor</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-950 text-white min-h-screen">

    <!-- Top bar -->
    <header class="bg-gray-900 border-b border-gray-800 px-4 py-3 flex items-center justify-between sticky top-0 z-50">
        <div class="flex items-center gap-4">
            <a href="{{ route('waiter.dashboard') }}" class="text-amber-400 font-bold text-lg tracking-tight">
                ⚡ El Sabor <span class="text-gray-400 font-normal text-sm">| Panel Camarero</span>
            </a>
        </div>
        <div class="flex items-center gap-4">
            <span class="text-sm text-gray-400">{{ auth()->user()->name }}</span>
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="text-sm bg-gray-700 hover:bg-gray-600 text-gray-200 px-3 py-1.5 rounded-lg transition-colors">
                    Salir
                </button>
            </form>
            <a href="{{ route('home') }}" target="_blank" class="text-sm text-gray-500 hover:text-gray-300 transition-colors">
                Ver web →
            </a>
        </div>
    </header>

    <main class="p-4 md:p-6">
        @yield('content')
    </main>

    @stack('scripts')

</body>
</html>
