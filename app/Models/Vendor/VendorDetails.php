<?php

namespace App\Models\Vendor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorDetails extends Model
{
    use HasFactory;
    Protected $table ="vendor_details";
    public function Pincode()
    {
        return $this->hasOne(\App\Models\CompanySetup\PincodeMaster::class,'Pincode');
    }

    public function PincodeDetails()
    {
        return $this->belongsTo(\App\Models\CompanySetup\PincodeMaster::class,'Pincode');
    }
}
