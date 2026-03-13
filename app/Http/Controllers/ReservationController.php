<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function create()
    {
        return view('public.reservation');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return response()->json(['success' => true]);
    }

    public function assignTable(Request $request, Reservation $reservation)
    {
        $request->validate(['table_id' => 'required|exists:tables,id']);

        $table = Table::findOrFail($request->table_id);
        $reservation->update(['table_id' => $table->id, 'status' => 'confirmed']);
        $table->update(['status' => 'reserved']);

        return response()->json(['success' => true]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|max:255',
            'phone'    => 'required|string|max:20',
            'date'     => 'required|date|after_or_equal:today',
            'time'     => 'required',
            'guests'   => 'required|integer|min:1|max:20',
            'location' => 'required|in:bar,room,restaurant',
            'notes'    => 'nullable|string|max:1000',
        ], [
            'name.required'     => 'El nombre es obligatorio.',
            'email.required'    => 'El email es obligatorio.',
            'email.email'       => 'El email no tiene un formato válido.',
            'phone.required'    => 'El teléfono es obligatorio.',
            'date.required'     => 'La fecha es obligatoria.',
            'date.after_or_equal' => 'La fecha debe ser hoy o posterior.',
            'time.required'     => 'La hora es obligatoria.',
            'guests.required'   => 'El número de comensales es obligatorio.',
            'guests.min'        => 'Debe haber al menos 1 comensal.',
            'guests.max'        => 'Máximo 20 comensales por reserva.',
            'location.required' => 'Debes seleccionar un espacio.',
            'location.in'       => 'El espacio seleccionado no es válido.',
        ]);

        Reservation::create($validated);

        return redirect()->route('reservations.create')
            ->with('success', '¡Reserva realizada con éxito! Nos pondremos en contacto contigo para confirmarla.');
    }
}
