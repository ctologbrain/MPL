<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustOtherChargeMultiSource extends Model
{
    use HasFactory;
    protected $table="Cust_Other_Charge_Multi_Sources";  
    public function OriginDataMulti(){
        return $this->hasMany(\App\Models\OfficeSetup\city::class,\App\Models\Account\CustOtherChargeMultiSource::class,'Source','id');
       }
       public function OriginDataDetailsMulti(){
        return $this->hasManyThrough(\App\Models\OfficeSetup\city::class,\App\Models\Account\CustOtherChargeMultiSource::class,'Source','id');
       }
       public function DestDataMulti(){
        return $this->hasMany(\App\Models\OfficeSetup\city::class,\App\Models\Account\CustOtherChargeMultiSource::class,'Dest','id');
       }
       public function DestDataMultiDetails(){
        return $this->hasManyThrough(\App\Models\OfficeSetup\city::class,\App\Models\Account\CustOtherChargeMultiSource::class,'Dest','id');
       }
}
