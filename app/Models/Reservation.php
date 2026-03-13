<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'date', 'time',
        'guests', 'location', 'notes', 'status', 'table_id'
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function table(): BelongsTo
    {
        return $this->belongsTo(Table::class);
    }

    public function getLocationLabelAttribute(): string
    {
        return match($this->location) {
            'bar' => 'Bar',
            'room' => 'Salón',
            'restaurant' => 'Restaurante',
            default => $this->location,
        };
    }
}
