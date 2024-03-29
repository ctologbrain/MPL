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
    return $this->belongsTo(\App\Models\Account\CustomerOtherCharges::class,'Charge_Id','Id');
   }
   

   public function CustomerData(){
    return $this->hasMany(\App\Models\Account\CustomerMaster::class,'Customer_Id','id');
   }
   public function CustomerDataDetails(){
    return $this->belongsTo(\App\Models\Account\CustomerMaster::class,'Customer_Id','id');
   }

   public function OriginData(){
    return $this->hasMany(\App\Models\OfficeSetup\city::class,'Origin','id');
   }
   public function OriginDataDetails(){
    return $this->belongsTo(\App\Models\OfficeSetup\city::class,'Origin','id');
   }

    public function DestData(){
    return $this->hasMany(\App\Models\OfficeSetup\city::class,'Destination','id');
   }
   public function DestDataDetails(){
    return $this->belongsTo(\App\Models\OfficeSetup\city::class,'Destination','id');
   }

   public function ChargeType(){
    return $this->hasMany(\App\Models\Account\ChargeRange::class, 'Range_Id','Id');
    }

    public function ChargeTypeDeatils(){
    return  $this->belongsTo(\App\Models\Account\ChargeRange::class, 'Range_Id','Id');
    }

    public function userData(){
        return $this->hasMany(\App\Models\User::class, 'Created_By');
    }
    public function UserDetail(){
         return  $this->belongsTo(\App\Models\User::class, 'Created_By');
    }

    public function userUpdateData(){
        return $this->hasMany(\App\Models\User::class, 'Updated_By');
    }
    public function UserUpdateDetail(){
         return  $this->belongsTo(\App\Models\User::class, 'Updated_By');
    }
    
}
