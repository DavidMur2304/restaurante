@extends('layouts.public')

@section('title', 'Contacto')
@section('description', 'Contacta con el Restaurante El Sabor. Estamos en Zaragoza y encantados de atenderte')

@section('content')

{{-- Header --}}
<section class="py-20 bg-gradient-to-br from-stone-800 to-amber-900 text-white text-center">
    <div class="max-w-3xl mx-auto px-4">
        <p class="text-amber-400 uppercase tracking-widest text-sm font-medium mb-3">El Sabor</p>
        <h1 class="font-serif text-5xl font-bold mb-4">Contacto</h1>
        <p class="text-stone-300 text-lg">¿Tienes alguna pregunta? Escríbenos y te responderemos en menos de 24 horas</p>
    </div>
</section>

<section class="py-20 bg-stone-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

            {{-- Contact info --}}
            <div class="space-y-6">
                <div>
                    <h2 class="font-serif text-2xl font-bold text-stone-800 mb-6">Encuéntranos</h2>
                </div>

                <div class="bg-white rounded-2xl p-6 border border-stone-200 shadow-sm">
                    <div class="w-10 h-10 bg-amber-100 rounded-full flex items-center justify-center mb-3">
                        <svg class="w-5 h-5 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <h3 class="font-semibold text-stone-800 mb-1">Dirección</h3>
                    <p class="text-stone-500 text-sm">Calle Mayor, 15<br>50001 Zaragoza, Aragón</p>
                </div>

                <div class="bg-white rounded-2xl p-6 border border-stone-200 shadow-sm">
                    <div class="w-10 h-10 bg-amber-100 rounded-full flex items-center justify-center mb-3">
                        <svg class="w-5 h-5 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    </div>
                    <h3 class="font-semibold text-stone-800 mb-1">Teléfono</h3>
                    <p class="text-stone-500 text-sm">976 123 456</p>
                    <a href="tel:976123456" class="text-amber-700 text-sm font-medium hover:underline">Llamar ahora</a>
                </div>

                <div class="bg-white rounded-2xl p-6 border border-stone-200 shadow-sm">
                    <div class="w-10 h-10 bg-amber-100 rounded-full flex items-center justify-center mb-3">
                        <svg class="w-5 h-5 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <h3 class="font-semibold text-stone-800 mb-1">Email</h3>
                    <p class="text-stone-500 text-sm">info@restauranteelsabor.com</p>
                    <a href="mailto:info@restauranteelsabor.com" class="text-amber-700 text-sm font-medium hover:underline">Enviar email</a>
                </div>

                <div class="bg-white rounded-2xl p-6 border border-stone-200 shadow-sm">
                    <div class="w-10 h-10 bg-amber-100 rounded-full flex items-center justify-center mb-3">
                        <svg class="w-5 h-5 text-amber-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h3 class="font-semibold text-stone-800 mb-2">Horario</h3>
                    <div class="text-sm text-stone-500 space-y-1">
                        <div class="flex justify-between"><span>Lunes</span><span class="text-red-500 font-medium">Cerrado</span></div>
                        <div class="flex justify-between"><span>Martes – Jueves</span><span>13:00 – 22:00</span></div>
                        <div class="flex justify-between"><span>Viernes – Sábado</span><span>12:00 – 01:00</span></div>
                        <div class="flex justify-between"><span>Domingo</span><span>13:00 – 21:00</span></div>
                    </div>
                </div>
            </div>

            {{-- Form --}}
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-sm border border-stone-200 p-8 md:p-10">
                    <h2 class="font-serif text-2xl font-bold text-stone-800 mb-2">Envíanos un mensaje</h2>
                    <p class="text-stone-500 mb-8 text-sm">Te responderemos en menos de 24 horas en días laborables.</p>

                    @if(session('success'))
                    <div class="bg-green-50 border border-green-200 text-green-800 rounded-xl p-5 mb-8 flex items-start gap-3">
                        <svg class="w-5 h-5 text-green-600 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <p class="font-medium">{{ session('success') }}</p>
                    </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="form-label">Nombre *</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}"
                                    placeholder="Tu nombre"
                                    class="form-input @error('name') border-red-400 @enderror">
                                @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label for="email" class="form-label">Email *</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}"
                                    placeholder="tu@email.com"
                                    class="form-input @error('email') border-red-400 @enderror">
                                @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div>
                            <label for="subject" class="form-label">Asunto *</label>
                            <input type="text" id="subject" name="subject" value="{{ old('subject') }}"
                                placeholder="¿En qué podemos ayudarte?"
                                class="form-input @error('subject') border-red-400 @enderror">
                            @error('subject') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="message" class="form-label">Mensaje *</label>
                            <textarea id="message" name="message" rows="6"
                                placeholder="Escribe tu mensaje aquí..."
                                class="form-input resize-none @error('message') border-red-400 @enderror">{{ old('message') }}</textarea>
                            @error('message') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <button type="submit" class="w-full bg-amber-700 hover:bg-amber-800 text-white font-bold py-4 rounded-xl transition-colors text-lg">
                            Enviar Mensaje
                        </button>
                    </form>
                </div>

                {{-- Map placeholder --}}
                <div class="mt-6 bg-stone-200 rounded-2xl overflow-hidden h-56 flex items-center justify-center">
                    <div class="text-center text-stone-400">
                        <svg class="w-12 h-12 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                        <p class="text-sm font-medium">Calle Mayor, 15 – Zaragoza</p>
                        <p class="text-xs mt-1">Aquí iría el mapa de Google Maps</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
