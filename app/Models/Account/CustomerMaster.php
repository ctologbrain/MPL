<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerMaster extends Model
{
    use HasFactory;
    public function Payment()
    {
        return $this->hasMany(\App\Models\Account\CustomerPayment::class,'id' ,'cust_id');
    }

    public function PaymentDetails()
    {
        return $this->belongsTo(\App\Models\Account\CustomerPayment::class,'id','cust_id');
    }
    public function Address()
    {
        return $this->hasMany(\App\Models\Account\CustomerAddress::class,'id' ,'cust_id');
    }

    public function CustAddress()
    {
        return $this->belongsTo(\App\Models\Account\CustomerAddress::class,'id','cust_id');
    }
  
    public function parent()
    {
        return $this->belongsTo(\App\Models\Account\CustomerMaster::class,'id', 'ParentCustomer');
    }

    public function children()
    {
        return $this->hasOne(\App\Models\Account\CustomerMaster::class,'id', 'ParentCustomer');
    } 
    
}
