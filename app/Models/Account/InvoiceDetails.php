<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetails extends Model
{
    use HasFactory;
    protected $table="InvoiceDetails";
     public function city()
    {
        return $this->hasMany(\App\Models\OfficeSetup\city::class, 'DestId');
    }
    public function CityDetails()
    {
        return $this->belongsTo(\App\Models\OfficeSetup\city::class, 'DestId')->with('StateDetails');
    }
    public function Source(){
      return  $this->hasMany(\App\Models\OfficeSetup\city::class, 'SourceId','id');
    }

    public function SourceDet(){
      return  $this->belongsTo(\App\Models\OfficeSetup\city::class, 'SourceId','id');
    }

     public function Dest(){
       return $this->hasMany(\App\Models\OfficeSetup\city::class, 'DestId','id');
    }

      public function DestDet(){
       return $this->belongsTo(\App\Models\OfficeSetup\city::class, 'DestId','id');

    }

    public function CustomerOthChages(){
      return $this->hasMany(\App\Models\Account\CustomerOtherCharges::class, 'ChargeId','Id');
    }

    public function CustomerOthChagesDet(){
      return $this->belongsTo(\App\Models\Account\CustomerOtherCharges::class, 'ChargeId','Id');

    }

    public function InvoiceMasters(){
      return $this->hasMany(\App\Models\Account\CustomerInvoice::class, 'DestId','id');
   }

     public function InvoiceMastersDet(){
      return $this->belongsTo(\App\Models\Account\CustomerInvoice::class, 'DestId','id');

   }
   public function InvoiceMastersMainForMaster(){
    return $this->hasMany(\App\Models\Account\CustomerInvoice::class, 'InvId','id');
 }

   public function InvoiceMastersMainForMasterDet(){
    return $this->belongsTo(\App\Models\Account\CustomerInvoice::class, 'InvId','id');

 }

    
}
