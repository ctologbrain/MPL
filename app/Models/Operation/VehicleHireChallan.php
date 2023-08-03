<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleHireChallan extends Model
{
    use HasFactory;
    protected $table = "Vehicle_Hire_Challan";

    public function Vehicle()
    {
        return $this->hasOne(\App\Models\Vendor\VehicleMaster::class, 'Vehicle_Number' ,'id');
    } 

    public function VehicleDetails()
    {
        return $this->belongsTo(\App\Models\Vendor\VehicleMaster::class, 'Vehicle_Number', 'id');
    }

    public function vendor()
    {
        return $this->hasOne(\App\Models\Vendor\VendorMaster::class, 'Vendor_Name' ,'id');
    } 

    public function vendorDetails()
    {
        return $this->belongsTo(\App\Models\Vendor\VendorMaster::class, 'Vendor_Name' ,'id');
    }

    public function VehicleModel()
    {
        return $this->hasOne(\App\Models\Vendor\VehicleType::class, 'Vehicle_Model' ,'id');
    } 

    public function VehicleModelDetails()
    {
        return $this->belongsTo(\App\Models\Vendor\VehicleType::class, 'Vehicle_Model', 'id');
    }

    public function OriginOffice()
    {
        return $this->hasOne(\App\Models\OfficeSetup\OfficeMaster::class, 'Origin_Office' ,'id');
    } 

    public function OriginOfficeDetails()
    {
        return $this->belongsTo(\App\Models\OfficeSetup\OfficeMaster::class, 'Origin_Office', 'id');
    }


    public function DestOffice()
    {
        return $this->hasOne(\App\Models\OfficeSetup\OfficeMaster::class, 'Destination' ,'id');
    } 

    public function DestOfficeDetails()
    {
        return $this->belongsTo(\App\Models\OfficeSetup\OfficeMaster::class, 'Destination', 'id');
    }


    public function AdvOffice()
    {
        return $this->hasOne(\App\Models\OfficeSetup\OfficeMaster::class, 'Adv_PaidByOffice' ,'id');
    } 

    public function AdvOfficeDetails()
    {
        return $this->belongsTo(\App\Models\OfficeSetup\OfficeMaster::class, 'Adv_PaidByOffice', 'id');
    }


    public function BalOffice()
    {
        return $this->hasOne(\App\Models\OfficeSetup\OfficeMaster::class, 'Bal_PaidByOffice' ,'id');
    } 

    public function BalOfficeDetails()
    {
        return $this->belongsTo(\App\Models\OfficeSetup\OfficeMaster::class, 'Bal_PaidByOffice', 'id');
    }
    
    
    
}
