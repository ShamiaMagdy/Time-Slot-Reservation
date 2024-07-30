<?php
namespace App\Services\ServicesComposite;

use App\Models\TimeSlot;

class IndividualService implements ServiceComponent
{

    private $service;

    public function __construct($service)
    {
        $this->service = $service;
    }
    public function getTimeSlots()
    {
        $timeSlots = TimeSlot::where('serviceId', $this->service->id)->get();
        return $timeSlots;
    }
}
