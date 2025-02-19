<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{


    public function getTotalPriceAttribute(): float
    {
        $nights = $this->start_date->diffInDays($this->end_date);
        return $nights * $this->property->price_per_night;
    }

    public function getDaysUntilCheckInAttribute(): int
    {
        $now = now();
        if ($now > $this->start_date) {
            return 0;
        }
        return $now->diffInDays($this->start_date);
    }
    protected $fillable = [
        'user_id',
        'property_id',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function property(): BelongsTo
    {
        return $this->belongsTo(Property::class);
    }
}
