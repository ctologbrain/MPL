<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleTripSheetTransaction extends Model
{
    use HasFactory;

    public function Vendor()
    {
        return $this->hasOne(\App\Models\Vendor\VendorMaster::class, 'Vehicle_Provider');
    }

    public function VendorDetails()
    {
        return $this->belongsTo(\App\Models\Vendor\VendorMaster::class, 'Vehicle_Provider');
    }

     public function Vehicle()
    {
        return $this->hasOne(\App\Models\Vendor\VehicleMaster::class, 'Vehicle_No','id');
    }

    public function VehicleDetails()
    {
        return $this->belongsTo(\App\Models\Vendor\VehicleMaster::class, 'Vehicle_No','id');
    }

     public function Driver()
    {
        return $this->hasOne(\App\Models\Vendor\DriverMaster::class, 'Driver_Id','id');
    }

    public function DriverDetails()
    {
        return $this->belongsTo(\App\Models\Vendor\DriverMaster::class, 'Driver_Id','id');
    }

    public function RouteMaster()
    {
        return $this->hasOne(\App\Models\Operation\RouteMaster::class, 'Route_Id')->with('StatrtPointDetails','EndPointDetails');
    }

    public function RouteMasterDetails()
    {
        return $this->belongsTo(\App\Models\Operation\RouteMaster::class, 'Route_Id')->with('StatrtPointDetails','EndPointDetails');
    }

     public function VehicleModel()
    {
        return $this->hasOne(\App\Models\Vendor\VehicleType::class, 'Vehicle_Model','id');
    }

    public function VehicleModelDetails()
    {
        return $this->belongsTo(\App\Models\Vendor\VehicleType::class, 'Vehicle_Model','id');
    }



}
