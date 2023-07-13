<?php

namespace App\Models\Vendor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable;
class VendorMaster extends Model
{
    use HasApiTokens, HasFactory, Searchable;
    
    public function VendorD()
    {
        return $this->hasOne(\App\Models\Vendor\VendorDetails::class,'id', 'Vid');
    }

    public function VendorDetails()
    {
        return $this->belongsTo(\App\Models\Vendor\VendorDetails::class,'id', 'Vid')->with('PincodeDetails');
    }
    public function VendorB()
    {
        return $this->hasOne(\App\Models\Vendor\VendorBank::class,'id', 'Vid');
    }

    public function VendorBankDetails()
    {
        return $this->belongsTo(\App\Models\Vendor\VendorBank::class,'id', 'Vid')->with('BankDetails');
    }
    public function Offcie()
    {
        return $this->hasOne(\App\Models\OfficeSetup\OfficeMaster::class,'OfficeName');
    }

    public function OfficeDetails()
    {
        return $this->belongsTo(\App\Models\OfficeSetup\OfficeMaster::class,'OfficeName');
    }
   
}
