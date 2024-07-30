<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable=['serviceName','description','serviceTypeId'];

    public function timeSlots(){
        return $this->hasMany(TimeSlot::class,'serviceId');
    }

    public function serviceType(){
        return $this->belongsTo(ServiceType::class);
    }
}
