<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso Camareros | El Sabor</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-950 min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md">
        {{-- Logo --}}
        <div class="text-center mb-8">
            <a href="{{ route('home') }}" class="inline-block">
                <h1 class="text-3xl font-bold text-amber-400">El Sabor</h1>
                <p class="text-gray-500 text-sm mt-1">Panel de Camareros</p>
            </a>
        </div>

        <div class="bg-gray-900 border border-gray-800 rounded-2xl p-8 shadow-2xl">
            <h2 class="text-xl font-bold text-white mb-1">Iniciar Sesión</h2>
            <p class="text-gray-400 text-sm mb-8">Accede con tus credenciales de camarero</p>

            @if(session('status'))
            <div class="bg-green-900/50 border border-green-700 text-green-300 rounded-lg p-3 mb-6 text-sm">
                {{ session('status') }}
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-1.5">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}"
                        required autofocus autocomplete="username"
                        placeholder="tu@email.com"
                        class="w-full bg-gray-800 border border-gray-700 text-white placeholder-gray-500 rounded-lg px-4 py-3 focus:outline-none focus:border-amber-500 focus:ring-1 focus:ring-amber-500 transition-colors @error('email') border-red-500 @enderror">
                    @error('email')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-300 mb-1.5">Contraseña</label>
                    <input id="password" type="password" name="password"
                        required autocomplete="current-password"
                        placeholder="••••••••"
                        class="w-full bg-gray-800 border border-gray-700 text-white placeholder-gray-500 rounded-lg px-4 py-3 focus:outline-none focus:border-amber-500 focus:ring-1 focus:ring-amber-500 transition-colors @error('password') border-red-500 @enderror">
                    @error('password')
                    <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <label class="flex items-center gap-2 text-sm text-gray-400 cursor-pointer">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded bg-gray-700 border-gray-600 text-amber-600 focus:ring-amber-500">
                        Recordarme
                    </label>
                </div>

                <button type="submit" class="w-full bg-amber-700 hover:bg-amber-600 text-white font-bold py-3 rounded-lg transition-colors mt-2">
                    Entrar al Panel
                </button>
            </form>

            <div class="mt-6 pt-6 border-t border-gray-800">
                <p class="text-center text-xs text-gray-500">
                    Solo para personal autorizado del restaurante
                </p>
            </div>
        </div>

        <div class="text-center mt-6">
            <a href="{{ route('home') }}" class="text-sm text-gray-500 hover:text-gray-300 transition-colors">
                ← Volver al sitio web
            </a>
        </div>
    </div>

</body>
</html>
