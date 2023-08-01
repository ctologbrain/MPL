<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsignorMaster extends Model
{
    use HasFactory;
    public function Address()
    {
        return $this->hasMany(\App\Models\Account\CustomerMaster::class,'CustId');
    }

    public function CustAddress()
    {
        return $this->belongsTo(\App\Models\Account\CustomerMaster::class,'CustId');
    }

    public function City()
    {
        return $this->hasMany(\App\Models\OfficeSetup\city::class,'City','id');
    }

    public function Citydetails()
    {
        return $this->belongsTo(\App\Models\OfficeSetup\city::class,'City','id');
    }
}
