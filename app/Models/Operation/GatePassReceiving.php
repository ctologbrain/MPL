<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Laravel\Scout\Searchable;

class GatePassReceiving extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'GP_Number'
        
      ];
   
    public function toSearchableArray()
    {
        return [
            'GP_Number' => $this->GP_Number
        ];
    }

    public function GetPassRecive()
    {
        return $this->hasMany(\App\Models\OfficeSetup\OfficeMaster::class, 'Rcv_Office');
    }

     public function GetPassReciveDet()
    {
        return $this->belongsTo(\App\Models\OfficeSetup\OfficeMaster::class, 'Rcv_Office');
    }

    public function GetVehicleGatepass()
    {
        return $this->hasMany(\App\Models\Operation\VehicleGatepass::class, 'Gp_Id');
    }

    public function GetVehicleGatepassDet()
    {
        return $this->belongsTo(\App\Models\Operation\VehicleGatepass::class, 'Gp_Id');
    }


    public function GetDocketData()
    {
        return $this->hasMany(\App\Models\Operation\GatePassRecvTrans::class, 'id','GP_Recv_Id');
    }

    public function GetDocketDataDet()
    {
        return $this->belongsTo(\App\Models\Operation\GatePassRecvTrans::class, 'id','GP_Recv_Id');
    }

    public function vehicle_gatepassesF(){
        
    }

    public function DocketUser()
    {
        return $this->hasMany(\App\Models\User::class, 'Recieved_By','id');
    }

    public function DocketDetailUser()
    {
        return $this->belongsTo(\App\Models\User::class,'Recieved_By','id')->with('empOffDetail');
    }


}

