<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerChargesMapWithCustomer extends Model
{
    use HasFactory;
   protected $table="Cust_Oth_Charge_Map";  

    public function ChargeData(){
    return $this->hasMany(\App\Models\Account\CustomerOtherCharges::class,'Charge_Id','Id');
   }
   public function ChargeDataDetails(){
    return $this->belongsTo(\App\Models\Account\CustomerOtherCharges::class,'Charge_Id','Id')->with('ChargeTypeDeatils');
   }

   public function CustomerData(){
    return $this->hasMany(\App\Models\Account\CustomerMaster::class,'Customer_Id','id');
   }
   public function CustomerDataDetails(){
    return $this->belongsTo(\App\Models\Account\CustomerMaster::class,'Customer_Id','id');
   }
}
