<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GatePassRecvTrans extends Model
{
    use HasFactory;
    protected $table="Gp_Recv_Trans";

    public function GetPassReciving()
    {
        return $this->hasMany(\App\Models\Operation\GatePassReceiving::class, 'GP_Recv_Id','id');
    }

     public function GetPassRecivingDetails()
    {
        return $this->belongsTo(\App\Models\Operation\GatePassReceiving::class, 'GP_Recv_Id','id')->with('DocketDetailUser','GetPassReciveDet');
    }


    public function DocketGPDataDet()
    {
        return $this->hasMany(\App\Models\Operation\DocketMaster::class, 'Docket_No','Docket_No');
    }

     public function DocketGPDataDetails()
    {
        return $this->belongsTo(\App\Models\Operation\DocketMaster::class, 'Docket_No','Docket_No');
    }
}
