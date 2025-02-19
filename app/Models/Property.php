<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Property extends Model
{
    public function getMainPhotoUrlAttribute(): string
    {
        if ($this->main_photo && Storage::disk('public')->exists($this->main_photo)) {
            return asset('storage/' . $this->main_photo);
        }
        return asset('images/default-property.jpg');
    }

    public function getSecondaryPhoto1UrlAttribute(): string
    {
        if ($this->secondary_photo_1 && Storage::disk('public')->exists($this->secondary_photo_1)) {
            return asset('storage/' . $this->secondary_photo_1);
        }
        return asset('images/default-property.jpg');
    }

    public function getSecondaryPhoto2UrlAttribute(): string
    {
        if ($this->secondary_photo_2 && Storage::disk('public')->exists($this->secondary_photo_2)) {
            return asset('storage/' . $this->secondary_photo_2);
        }
        return asset('images/default-property.jpg');
    }
    protected $fillable = [
        'main_photo',
        'secondary_photo_1',
        'secondary_photo_2',
        'name',
        'description',
        'price_per_night',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
