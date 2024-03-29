<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegularDelivery extends Model
{
    use HasFactory;
    protected $table="Regular_Deliveries";
    

    public function RagularGPData(){
        return $this->hasMany(\App\Models\Operation\VehicleGatepass::class, 'GP_ID','id');
    }

    public function RagularGPDetails(){
        return $this->belongsTo(\App\Models\Operation\VehicleGatepass::class,'GP_ID','id')->with('VendorDetails');
    }

    public function RagularDocketData(){
        return $this->hasMany(\App\Models\Operation\DocketMaster::class, 'Docket_ID','Docket_No');
    }

    public function RagularDocketDetails(){
        return $this->belongsTo(\App\Models\Operation\DocketMaster::class,'Docket_ID','Docket_No')->with('PincodeDetails','DestPincodeDetails','consignoeeDetails','consignorDetails','DocketProductDetails','offcieDetails','DevileryTypeDet','getpassDataDetails');
    }

    public function RagularOfficeData(){
       return $this->hasOne(\App\Models\OfficeSetup\OfficeMaster::class, 'Dest_Office_Id','id');
    }

    public function RagularOfficeDetails(){
        return $this->belongsTo(\App\Models\OfficeSetup\OfficeMaster::class, 'Dest_Office_Id','id');
    }

    public function ProofMaster(){
        return $this->hasMany(\App\Models\OfficeSetup\DeliveryProofMaster::class,'Doc_Proof','id');
    }

    public function ProofMasterDett(){
        return $this->belongsTo(\App\Models\OfficeSetup\DeliveryProofMaster::class,'Doc_Proof','id');
    }
}
