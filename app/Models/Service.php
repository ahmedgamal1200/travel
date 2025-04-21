<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class Service extends Model
{     
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'compare_price',
        'note',
        'images',
        'icon'
    ];

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
