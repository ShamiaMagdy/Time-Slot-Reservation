<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
    use HasFactory;

    protected $fillable = [];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

}
