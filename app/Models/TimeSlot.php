<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
    use HasFactory;

    protected $fillable = ['startTime','endTime','is_available','serviceId'];

    public function service()
    {
        return $this->belongsTo(Service::class,'serviceId');
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

}
