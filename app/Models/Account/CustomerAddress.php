<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    use HasFactory;
    protected $table = "customer_addresses";
    public function  city(){
        return $this->hasMany(\App\Models\OfficeSetup\city::class,'City', 'id');
    }

    public function cityDetails(){
        return $this->belongsTo(\App\Models\OfficeSetup\city::class,'City', 'id');
    }

    public function  states(){
        return $this->hasMany(\App\Models\OfficeSetup\state::class,'State', 'id');
    }

    public function statesDetails(){
        return $this->belongsTo(\App\Models\OfficeSetup\state::class,'State', 'id');
    }

    public function  PIN(){
        return $this->hasMany(\App\Models\CompanySetup\PincodeMaster::class,'Pincode', 'id');
    }

    public function PINDetails(){
        return $this->belongsTo(\App\Models\CompanySetup\PincodeMaster::class,'Pincode', 'id');
    }
    
}
