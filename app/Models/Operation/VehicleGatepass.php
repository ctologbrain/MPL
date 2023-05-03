<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleGatepass extends Model
{
    use HasFactory;
   
    public function fpm()
    {
        return $this->hasOne(\App\Models\Operation\VehicleTripSheetTransaction::class, 'Fpm_Number');
    }

    public function fpmDetails()
    {
        return $this->belongsTo(\App\Models\Operation\VehicleTripSheetTransaction::class, 'Fpm_Number');
    }
    public function Vendor()
    {
        return $this->hasOne(\App\Models\Vendor\VendorMaster::class, 'Vendor_ID');
    }

    public function VendorDetails()
    {
        return $this->belongsTo(\App\Models\Vendor\VendorMaster::class, 'Vendor_ID');
    }
    public function VehicleType()
    {
        return $this->hasOne(\App\Models\Vendor\VehicleType::class, 'Vehicle_Model');
    }

    public function VehicleTypeDetails()
    {
        return $this->belongsTo(\App\Models\Vendor\VehicleType::class, 'Vehicle_Model');
    }
    public function Vehicle()
    {
        return $this->hasOne(\App\Models\Vendor\VehicleMaster::class, 'vehicle_id');
    }

    public function VehicleDetails()
    {
        return $this->belongsTo(\App\Models\Vendor\VehicleMaster::class, 'vehicle_id');
    }
    public function Driver()
    {
        return $this->hasOne(\App\Models\Vendor\DriverMaster::class, 'DrvierId');
    }

    public function DriverDetails()
    {
        return $this->belongsTo(\App\Models\Vendor\DriverMaster::class, 'DrvierId');
    }
    public function RouteMaster()
    {
        return $this->hasOne(\App\Models\Operation\RouteMaster::class, 'Route_ID')->with('StatrtPointDetails','EndPointDetails');
    }

    public function RouteMasterDetails()
    {
        return $this->belongsTo(\App\Models\Operation\RouteMaster::class, 'Route_ID')->with('StatrtPointDetails','EndPointDetails');
    }
    public function getPassDocket()
    {
    return $this->hasMany(\App\Models\Operation\VehicleGatepass::class,\App\Models\Operation\GatePassWithDocket::class,'GatePassId','id');
    }

    public function getPassDocketDetails()
    {
        return $this->hasManyThrough(\App\Models\Operation\GatePassWithDocket::class,\App\Models\Operation\VehicleGatepass::class,'id','GatePassId')->with('DockEndPoint','getAllocationDetail');
    }


    
    
}
