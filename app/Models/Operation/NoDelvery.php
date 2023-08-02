<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoDelvery extends Model
{
    use HasFactory;
    protected $table ="NDR_Trans";

    public function NDrMaster(){
        return $this->hasMany(\App\Models\OfficeSetup\NdrMaster::class,'NDR_Reason','id');
    }

     public function NDrMasterDetails(){
        return $this->belongsTo(\App\Models\OfficeSetup\NdrMaster::class,'NDR_Reason','id');
    }

    public function DocketMasterData(){
        return $this->hasMany(\App\Models\Operation\DocketMaster::class,'Docket_No','Docket_No');
    }

    public function DocketMasterDet(){
        return $this->belongsTo(\App\Models\Operation\DocketMaster::class,'Docket_No','Docket_No')->with('customerDetails','consignoeeDetails','PincodeDetails','DestPincodeDetails','DocketProductDetails','consignorDetails','DocketAllocationDetail','offcieDetails','DrsTransDeliveryDetails');
    }

    public function OfficeData(){
        return $this->hasMany(\App\Models\OfficeSetup\OfficeMaster::class,'Dest_Office','id');
    }

    public function OfficeDataDet(){
        return $this->belongsTo(\App\Models\OfficeSetup\OfficeMaster::class,'Dest_Office','id');
    }
}
