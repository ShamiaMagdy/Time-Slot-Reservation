<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceTypeRequest;
use App\Models\ServiceType;
use App\Services\ServicesComposite\ServiceTypeComposite;

class ServiceTypeController extends Controller
{
    public function getServiceTypes()
    {
        $serviceTypes = ServiceType::all();
        return response()->json(['Service Types: ' => $serviceTypes]);
    }

    public function getSpecificServiceType($id)
    {
        $serviceType = ServiceType::find($id);
        if (!$serviceType) {
            return response()->json(['error' => 'Service Type not found'], 404);
        }
        $serviceTypeComposite = new ServiceTypeComposite($serviceType);
        $services = $serviceTypeComposite->getServices();
        $timeSlots = $serviceTypeComposite->getTimeSlots();
        return response()->json(['Service Types: ' => $serviceType, 'Services: ' => $services, 'Timeslots: ' => $timeSlots]);
    }

    public function addServiceType(ServiceTypeRequest $serviceTypeRequest)
    {

    }
    public function updateServiceType(ServiceTypeRequest $serviceTypeRequest, $id)
    {

    }
    public function removeServiceType($id)
    {

    }
}
