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
        return  $this->belongsTo(\App\Models\Operation\DRSEntry::class, 'DRS_No','ID')->with('getVehicleNoDett','GetOfficeCodeNameDett','getDeliveryBoyNameDett');
    }

    public function DRSDocketData(){
        return  $this->hasMany(\App\Models\Operation\DocketMaster::class, 'Docket_No','Docket_No');
    }

    public function DRSDocketDataDeatils(){
        return  $this->belongsTo(\App\Models\Operation\DocketMaster::class, 'Docket_No','Docket_No')->with('DocketProductDetails','BookignTypeDetails','DocketAllocationDetail','getpassDataDetails')->withCount('NDRTransDetails as TotalNDR')->withCount('RTODataDetails as TotRTO')->withSum('DocketProductDetails as TotActWt','Actual_Weight')->withSum('DocketProductDetails as TotChrgWt','Charged_Weight');
    }

    public function DRSDelNonDelData(){
        return  $this->hasMany(\App\Models\Operation\DRSTransactions::class, \App\Models\Operation\DrsDeliveryTransaction::class, 'Docket_No', 'Docket');
    }
    public function DRSDelNonDelDataDeatils(){
       
       // return $this->hasManyThrough(\App\Models\Operation\DrsDeliveryTransaction::class,\App\Models\Operation\DRSTransactions::class,'Docket_No','Docket');
        return  $this->belongsTo(\App\Models\Operation\DrsDeliveryTransaction::class, 'Docket_No','Docket')->where("Type","DELIVERED");
    }

    // public function DRSNonDelData(){
    //     return  $this->hasMany(\App\Models\Operation\DRSTransactions::class, \App\Models\Operation\DrsDeliveryTransaction::class, 'Docket_No', 'Docket');
    // }
    // public function DRSNonDelDataDeatils(){
       
    //    // return $this->hasManyThrough(\App\Models\Operation\DrsDeliveryTransaction::class,\App\Models\Operation\DRSTransactions::class,'Docket_No','Docket');
    //     return  $this->belongsTo(\App\Models\Operation\DrsDeliveryTransaction::class, 'Docket_No','Docket')->where("Type","NDR");
    // }
}
