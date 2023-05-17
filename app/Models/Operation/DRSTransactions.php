<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DRSTransactions extends Model
{
    use HasFactory;
    protected $table="DRS_Transactions";

    public function DRSDatas(){
        return  $this->hasMany(\App\Models\Operation\DRSEntry::class, 'DRS_No','ID');
    }

    public function DRSDatasDetails(){
        return  $this->belongsTo(\App\Models\Operation\DRSEntry::class, 'DRS_No','ID')->with('getVehicleNoDett');
    }

    public function DRSDocketData(){
        return  $this->hasMany(\App\Models\Operation\DocketMaster::class, 'Docket_No','Docket_No');
    }

    public function DRSDocketDataDeatils(){
        return  $this->belongsTo(\App\Models\Operation\DocketMaster::class, 'Docket_No','Docket_No')->withCount('RTODataDetails as TotRTO')->withSum('DocketProductDetails as TotActWt','Actual_Weight')->withSum('DocketProductDetails as TotChrgWt','Charged_Weight');
    }

    public function DRSDelNonDelData(){
        return  $this->hasMany(\App\Models\Operation\DRSTransactions::class, \App\Models\Operation\DrsDeliveryTransaction::class, 'Docket','Docket_No');
    }
    public function DRSDelNonDelDataDeatils(){
        return  $this->hasManyThrough(\App\Models\Operation\DrsDeliveryTransaction::class ,\App\Models\Operation\DRSTransactions::class ,'Docket_No','Docket');
    }
}
