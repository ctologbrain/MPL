<?php

namespace App\Models\Vendor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleMaster extends Model
{
    use HasFactory;
    public function office()
    {
        return $this->hasOne(\App\Models\OfficeSetup\OfficeMaster::class,'Reportinghub');
    }

    public function officeDetails()
    {
        return $this->belongsTo(\App\Models\OfficeSetup\OfficeMaster::class,'Reportinghub');
    }
    public function Vendor()
    {
        return $this->hasOne(\App\Models\Vendor\VendorMaster::class,'VendorName');
    }

    public function VendorDetails()
    {
        return $this->belongsTo(\App\Models\Vendor\VendorMaster::class,'VendorName');
    }
    public function VehicleType()
    {
        return $this->hasOne(\App\Models\Vendor\VehicleType::class,'VehicleModel');
    }

    public function VehicleTypeDetails()
    {
        return $this->belongsTo(\App\Models\Vendor\VehicleType::class,'VehicleModel');
    }
}
