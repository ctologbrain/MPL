<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrsDeliveryTransaction extends Model
{
    use HasFactory;
    protected $table="drs_delivery_transactions";

    public function ProofMaster(){
        return $this->hasMany(\App\Models\OfficeSetup\DeliveryProofMaster::class,'ProofName','id');
    }

    public function ProofMasterDett(){
        return $this->belongsTo(\App\Models\OfficeSetup\DeliveryProofMaster::class,'ProofName','id');
    }
    
    public function DRSDel(){
        return $this->hasMany(\App\Models\Operation\DrsDelivery::class,'Drs_id','id');
    }

    public function DRSDelDetails(){
        return $this->belongsTo(\App\Models\Operation\DrsDelivery::class,'Drs_id','id');
    }
    

    public function DRSReason(){
        return $this->hasMany(\App\Models\OfficeSetup\NdrMaster::class,'NdrReason','id');
    }
    
    public function DRSReasonDet(){
         return $this->belongsTo(\App\Models\OfficeSetup\NdrMaster::class,'NdrReason','id');
    }
    

}
