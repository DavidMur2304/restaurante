@extends('layouts.public')

@section('title', 'Reservar Mesa')
@section('description', 'Reserva tu mesa en El Sabor. Elige fecha, hora, número de comensales y espacio preferido')

@section('content')

{{-- Header --}}
<section class="py-20 bg-gradient-to-br from-stone-800 to-amber-900 text-white text-center">
    <div class="max-w-3xl mx-auto px-4">
        <p class="text-amber-400 uppercase tracking-widest text-sm font-medium mb-3">El Sabor</p>
        <h1 class="font-serif text-5xl font-bold mb-4">Reservar Mesa</h1>
        <p class="text-stone-300 text-lg">Completa el formulario y te confirmaremos la reserva en menos de 24 horas</p>
    </div>
</section>

<section class="py-20 bg-stone-50">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

        @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-800 rounded-xl p-5 mb-8 flex items-start gap-3">
            <svg class="w-5 h-5 text-green-600 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <p class="font-medium">{{ session('success') }}</p>
        </div>
        @endif

        <div class="bg-white rounded-2xl shadow-sm border border-stone-200 p-8 md:p-10">
            <h2 class="font-serif text-2xl font-bold text-stone-800 mb-2">Datos de la reserva</h2>
            <p class="text-stone-500 mb-8 text-sm">Todos los campos marcados con * son obligatorios</p>

            <form action="{{ route('reservations.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="form-label">Nombre completo *</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}"
                            placeholder="Tu nombre y apellidos"
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

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="phone" class="form-label">Teléfono *</label>
                        <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                            placeholder="600 000 000"
                            class="form-input @error('phone') border-red-400 @enderror">
                        @error('phone') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="guests" class="form-label">Número de comensales *</label>
                        <select id="guests" name="guests" class="form-input @error('guests') border-red-400 @enderror">
                            <option value="">Selecciona...</option>
                            @for($i = 1; $i <= 20; $i++)
                            <option value="{{ $i }}" {{ old('guests') == $i ? 'selected' : '' }}>{{ $i }} {{ $i == 1 ? 'persona' : 'personas' }}</option>
                            @endfor
                        </select>
                        @error('guests') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="date" class="form-label">Fecha *</label>
                        <input type="date" id="date" name="date" value="{{ old('date') }}"
                            min="{{ date('Y-m-d') }}"
                            class="form-input @error('date') border-red-400 @enderror">
                        @error('date') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="time" class="form-label">Hora *</label>
                        <select id="time" name="time" class="form-input @error('time') border-red-400 @enderror">
                            <option value="">Selecciona hora...</option>
                            @foreach(['13:00','13:30','14:00','14:30','15:00','15:30','20:00','20:30','21:00','21:30','22:00','22:30'] as $t)
                            <option value="{{ $t }}" {{ old('time') == $t ? 'selected' : '' }}>{{ $t }}</option>
                            @endforeach
                        </select>
                        @error('time') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <label class="form-label">Espacio preferido *</label>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-2">
                        @foreach(['bar' => ['El Bar', 'Ambiente informal', '🍻'], 'room' => ['El Salón', 'Íntimo y elegante', '🕯️'], 'restaurant' => ['El Restaurante', 'Experiencia completa', '🍽️']] as $value => [$name, $desc, $emoji])
                        <label class="relative cursor-pointer">
                            <input type="radio" name="location" value="{{ $value }}"
                                {{ old('location', request('location')) == $value ? 'checked' : '' }}
                                class="peer sr-only">
                            <div class="border-2 border-stone-200 rounded-xl p-4 text-center peer-checked:border-amber-600 peer-checked:bg-amber-50 hover:border-amber-300 transition-all">
                                <span class="text-2xl">{{ $emoji }}</span>
                                <p class="font-semibold text-stone-800 mt-1 text-sm">{{ $name }}</p>
                                <p class="text-stone-500 text-xs">{{ $desc }}</p>
                            </div>
                        </label>
                        @endforeach
                    </div>
                    @error('location') <p class="text-red-500 text-sm mt-2">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="notes" class="form-label">Notas o peticiones especiales</label>
                    <textarea id="notes" name="notes" rows="3"
                        placeholder="Alergias, celebraciones, solicitudes especiales..."
                        class="form-input resize-none @error('notes') border-red-400 @enderror">{{ old('notes') }}</textarea>
                    @error('notes') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="bg-amber-50 border border-amber-100 rounded-xl p-4">
                    <p class="text-sm text-stone-600">
                        <svg class="w-4 h-4 inline-block mr-1 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Te confirmaremos la disponibilidad por teléfono o email en un máximo de 24 horas. Para grupos de más de 10 personas, contáctanos directamente.
                    </p>
                </div>

                <button type="submit" class="w-full bg-amber-700 hover:bg-amber-800 text-white font-bold py-4 rounded-xl transition-colors text-lg">
                    Solicitar Reserva
                </button>
            </form>
        </div>

        {{-- Info cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-8">
            <div class="bg-white rounded-xl p-5 border border-stone-200 text-center">
                <svg class="w-7 h-7 text-amber-700 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                <p class="font-semibold text-stone-800 text-sm">Llámanos</p>
                <p class="text-stone-500 text-sm">976 123 456</p>
            </div>
            <div class="bg-white rounded-xl p-5 border border-stone-200 text-center">
                <svg class="w-7 h-7 text-amber-700 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <p class="font-semibold text-stone-800 text-sm">Horario</p>
                <p class="text-stone-500 text-sm">Mar–Dom 13–23h</p>
            </div>
            <div class="bg-white rounded-xl p-5 border border-stone-200 text-center">
                <svg class="w-7 h-7 text-amber-700 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                <p class="font-semibold text-stone-800 text-sm">Dirección</p>
                <p class="text-stone-500 text-sm">Calle Mayor 15</p>
            </div>
        </div>
    </div>
</section>

@endsection
