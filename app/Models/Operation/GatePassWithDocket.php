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
    return $this->hasMany(\App\Models\Operation\DocketAllocation::class, 'Docket_No','Docket');
    }

     public function getAllocationDetail()
    {
     return $this->hasMany(\App\Models\Operation\DocketAllocation::class, 'Docket_No','Docket');
    }

    public function DocketDetailGP()
    {
        return $this->hasMany(\App\Models\Operation\VehicleGatepass::class, 'GatePassId','id');
    }

    public function DocketDetailGPData()
    {
        return $this->belongsTo(\App\Models\Operation\VehicleGatepass::class, 'GatePassId','id')->with('VehicleDetails','VendorDetails','fpmDetails','RouteDataDetail');
    }

    
    
}
