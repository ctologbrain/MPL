<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerOtherCharges extends Model
{
    use HasFactory;
    protected $table= "Cust_Other_Charge";

    public function ChargeType(){
    return $this->hasMany(\App\Models\Account\ChargeRange::class, 'Range_Type','Id');
    }

    public function ChargeTypeDeatils(){
    return  $this->belongsTo(\App\Models\Account\ChargeRange::class, 'Range_Type','Id');
    }

     public function User(){
     return   $this->hasMany(\App\Models\User::class, 'Created_By');
    }

     public function UserDetails(){
      return  $this->belongsTo(\App\Models\User::class, 'Created_By');
    }

    

    
}
