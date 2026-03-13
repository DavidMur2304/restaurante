<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Table extends Model
{
    protected $fillable = ['number', 'location', 'capacity', 'status'];

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function isFree(): bool
    {
        return $this->status === 'free';
    }

    public function isOccupied(): bool
    {
        return $this->status === 'occupied';
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
