<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExcessReceiving extends Model
{
    use HasFactory;
    Protected $table = 'Excess_Receiving';

    public function getGatepassDockets(){
        return $this->hasOne(\App\Models\Operation\VehicleGatepass::class, 'GatepassId','id');
    }

    public function getGatepassDocketsDet(){
        return $this->belongsTo(\App\Models\Operation\VehicleGatepass::class, 'GatepassId','id');
    }
    

    public function office(){
        return $this->hasOne(\App\Models\OfficeSetup\OfficeMaster::class, 'Receiving_office','id');
    }

    public function offcieDetails(){
        return $this->belongsTo(\App\Models\OfficeSetup\OfficeMaster::class, 'Receiving_office','id');
    }
}
