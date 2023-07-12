<?php

namespace App\Models\Vendor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorBank extends Model
{
    use HasFactory;
    Protected $table ="vendor_banks";
    public function Bank()
    {
        return $this->hasOne(\App\Models\CompanySetup\BankMaster::class,'BankName');
    }

    public function BankDetails()
    {
        return $this->belongsTo(\App\Models\CompanySetup\BankMaster::class,'BankName');
    }

    
}
