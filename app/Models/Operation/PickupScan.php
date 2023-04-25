<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PickupScan extends Model
{
    use HasFactory;

    public function Driver(){
        return $this->hasMany(\App\Models\Vendor\DriverMaster::class,'driverName');
    }

    public function DriverDetail(){
        return $this->belongsTo(\App\Models\Vendor\DriverMaster::class,'driverName');
    }

    

     public function vender(){
        return $this->hasMany(\App\Models\Vendor\VendorMaster::class,'vendorName');
    }

    public function venderDetail(){
        return $this->belongsTo(\App\Models\Vendor\VendorMaster::class,'vendorName');
    }

    public function EmployeeSuperwiser(){
        return $this->hasMany(\App\Models\OfficeSetup\employee::class,'unloadingSupervisorName');
    }

    public function EmployeeDetailSuperwiser(){
        return $this->belongsTo(\App\Models\OfficeSetup\employee::class,'unloadingSupervisorName');
    }

     public function EmployeePickupPerson(){
        return $this->hasMany(\App\Models\OfficeSetup\employee::class,'pickupPersonName');
    }

    public function EmployeeDetailPickupPerson(){
        return $this->belongsTo(\App\Models\OfficeSetup\employee::class,'pickupPersonName');
    }

     public function Vehicle(){
        return $this->hasMany(\App\Models\Vendor\VehicleMaster::class,'vehicleNo');
    }

    public function VehicleDetail(){
        return $this->belongsTo(\App\Models\Vendor\VehicleMaster::class,'vehicleNo');
    }

    //  public function Creation(){
    //     return $this->hasMany(\App\Models\User::class,'CreatedBy');
    // }

    // public function CreationDetail(){
    //     return $this->belongsTo(\App\Models\User::class,'CreatedBy');
    // }

    
}
