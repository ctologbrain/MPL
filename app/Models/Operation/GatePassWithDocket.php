<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GatePassWithDocket extends Model
{
    use HasFactory;

     public function DocksHasEndPoint()
    {
        return $this->hasOne(\App\Models\OfficeSetup\city::class, 'destinationOffice');
    }

    public function DockEndPoint()
    {
        return $this->belongsTo(\App\Models\OfficeSetup\city::class, 'destinationOffice');
    }

    public function getAllocation()
    {
    return $this->hasMany(\App\Models\Operation\DocketAllocation::class,'Docket','Docket_No');
    }

     public function getAllocationDetail()
    {
     return $this->belongsTo(\App\Models\Operation\DocketAllocation::class, 'Docket','Docket_No')->with('DocketMasterMainDetails');
    }

    public function DocketDetailGP()
    {
        return $this->hasMany(\App\Models\Operation\VehicleGatepass::class, 'GatePassId','id');
    }

    public function DocketDetailGPData()
    {
        return $this->belongsTo(\App\Models\Operation\VehicleGatepass::class, 'GatePassId','id')->with('VehicleDetails','VendorDetails','fpmDetails','RouteMasterDetails');
    }

    public function getDocketMaster()
    {
        return $this->hasMany(\App\Models\Operation\DocketMaster::class, 'Docket','Docket_No');
    }

    public function getDocketMasterDetail()
    {
        return $this->belongsTo(\App\Models\Operation\DocketMaster::class, 'Docket','Docket_No')->withSum('DocketProductDetails','Charged_Weight')->withSum('DocketProductDetails','Actual_Weight')->withSum('DocketProductDetails','charge')->withSum('DocketProductDetails','Is_Volume');
    }

    

    
    
}
