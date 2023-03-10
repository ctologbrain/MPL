<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class DocketMaster extends Model
{
    use HasFactory;
    public function offcie()
    {
        return $this->hasOne(\App\Models\OfficeSetup\OfficeMaster::class, 'Office_ID');
    }

    public function offcieDetails()
    {
        return $this->belongsTo(\App\Models\OfficeSetup\OfficeMaster::class, 'Office_ID');
    }
    public function BookignType()
    {
        return $this->hasOne(\App\Models\Operation\DocketBookingType::class, 'Booking_Type');
    }

    public function BookignTypeDetails()
    {
        return $this->belongsTo(\App\Models\Operation\DocketBookingType::class, 'Booking_Type');
    }
    public function DevileryType()
    {
        return $this->hasOne(\App\Models\Operation\DevileryType::class, 'Delivery_Type');
    }

    public function DevileryTypeDet()
    {
        return $this->belongsTo(\App\Models\Operation\DevileryType::class, 'Delivery_Type');
    }
    public function customer()
    {
        return $this->hasOne(\App\Models\Account\CustomerMaster::class, 'Cust_Id');
    }

    public function customerDetails()
    {
        return $this->belongsTo(\App\Models\Account\CustomerMaster::class, 'Cust_Id');
    }
    public function consignor()
    {
        return $this->hasOne(\App\Models\Account\ConsignorMaster::class,'id','Consigner_Id');
    }

    public function consignorDetails()
    {
        return $this->belongsTo(\App\Models\Account\ConsignorMaster::class,'id','Consigner_Id');
    }
    public function consignoee()
    {
        return $this->hasOne(\App\Models\Account\Consignee::class,'Consignee_Id');
    }

    public function consignoeeDetails()
    {
        return $this->belongsTo(\App\Models\Account\Consignee::class,'Consignee_Id');
    }
    public function DocketProduct()
    {
        return $this->hasOne(\App\Models\Operation\DocketProductDetails::class,'Docket_Id')->with('DocketProdductDetails');
    }

    public function DocketProductDetails()
    {
        return $this->belongsTo(\App\Models\Operation\DocketProductDetails::class,'id','Docket_Id')->with('DocketProdductDetails');
    }
    public function Pincode()
    {
        return $this->hasOne(\App\Models\CompanySetup\PincodeMaster::class,'Origin_Pin')->with('StateDetails','CityDetails');
    }

    public function PincodeDetails()
    {
        return $this->belongsTo(\App\Models\CompanySetup\PincodeMaster::class,'Origin_Pin')->with('StateDetails','CityDetails');
    }
    public function DestPincode()
    {
        return $this->hasOne(\App\Models\CompanySetup\PincodeMaster::class,'Dest_Pin')->with('StateDetails','CityDetails');
    }

    public function DestPincodeDetails()
    {
        return $this->belongsTo(\App\Models\CompanySetup\PincodeMaster::class,'Dest_Pin')->with('StateDetails','CityDetails');
    }
    public function DocketInvoice()
    {
        return $this->hasMany(\App\Models\Operation\DocketInvoiceDetails::class,'id','Docket_Id');
    }

    public function DocketInvoiceDetails()
    {
       
        return $this->belongsTo(\App\Models\Operation\DocketInvoiceDetails::class,'id','Docket_Id');
        
        }
}
