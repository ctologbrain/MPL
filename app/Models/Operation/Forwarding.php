<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forwarding extends Model
{
    use HasFactory;
    Protected $table = "forwarding";

    public function vendor()
    {
        return $this->hasMany(\App\Models\Vendor\VendorMaster::class,'Forwarding_Vendor','id');
    }

     public function vendorDetails()
    {
         return $this->belongsTo(\App\Models\Vendor\VendorMaster::class,'Forwarding_Vendor','id');
    }

    public function Docket()
    {
        return $this->hasMany(\App\Models\Operation\DocketMaster::class,'DocketNo','Docket_No');
    }

     public function DocketDetails()
    {
         return $this->belongsTo(\App\Models\Operation\DocketMaster::class,'DocketNo','Docket_No')->with('offcieDetails')->withCount('NDRTransDetails as TotNDR')->withCount('RTODataDetails as TotRTO')->withCount('RegulerDeliveryDataDetails as RDel')->withCount('DrsTransDeliveryDetails as DRSDel');
    }

}
