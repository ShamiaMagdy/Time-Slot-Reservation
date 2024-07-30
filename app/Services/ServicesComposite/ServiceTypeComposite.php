<?php
namespace App\Services\ServicesComposite;

use App\Models\Service;
use App\Models\ServiceType;

class ServiceTypeComposite implements ServiceComponent
{
    private $serviceType;
    private $services = [];

    public function __construct(ServiceType $serviceType)
    {
        $this->serviceType = $serviceType;
        //$this->getServices();
    }

    public function getServices()
    {
        $this->services = Service::where('serviceTypeId', $this->serviceType->id)->get();
        return $this->services;
    }

    public function addService(ServiceComponent $serviceComponent)
    {
        $this->services = $serviceComponent;
    }
    public function removeService(ServiceComponent $serviceComponent)
    {
        $this->services = array_filter($this->services, function ($s) use ($serviceComponent) {
            return $s !== $serviceComponent;
        });
    }

    public function getTimeSlots()
    {
        $timeSlots = [];
        foreach ($this->services as $service) {
            $individualService = new IndividualService($service);
            $timeSlots = array_merge($timeSlots,$individualService->getTimeSlots()->toArray());
        }
        return $timeSlots;
    }

}
