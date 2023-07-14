<?php

namespace App\Models\Vendor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverMaster extends Model
{
    use HasFactory;
    public function VendorD()
    {
        return $this->hasOne(\App\Models\Vendor\VendorMaster::class,'VendorName');
    }

    public function VendorDetails()
    {
        return $this->belongsTo(\App\Models\Vendor\VendorMaster::class,'VendorName');
    }

    public function Pincode()
    {
        return $this->hasMany(\App\Models\CompanySetup\PincodeMaster::class, 'Pincode','id');
    }

    public function PincodeDetails()
    {
        return $this->belongsTo(\App\Models\CompanySetup\PincodeMaster::class, 'Pincode','id');
    }
}
