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
        return $this->hasOne(\App\Models\Account\CustomerMaster::class, 'Cust_Id')->with('PaymentDetails');;
    }

    public function customerDetails()
    {
        return $this->belongsTo(\App\Models\Account\CustomerMaster::class, 'Cust_Id')->with('PaymentDetails');;
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
        return $this->belongsTo(\App\Models\Operation\DocketProductDetails::class,'id','Docket_Id')->with('DocketProdductDetails','PackingMDataDetails');
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
       
        return $this->belongsTo(\App\Models\Operation\DocketInvoiceDetails::class ,'id', 'Docket_Id');
        
    }

    public function DocketAllocation()
    {
        return $this->hasMany(\App\Models\Operation\DocketAllocation::class,'Docket_No','Docket_No');
    }

    public function DocketAllocationDetail()
    {
        return $this->belongsTo(\App\Models\Operation\DocketAllocation::class,'Docket_No','Docket_No')->with('GetStatusWithAllocateDett','DocketSeriesMasterDetails');
    }

    public function NDRTrans()
    {
        return $this->hasMany(\App\Models\Operation\NoDelvery::class,'id','Docket_No');
    }

     public function NDRTransDetails()
    {
         return $this->belongsTo(\App\Models\Operation\NoDelvery::class,'id','Docket_No')->with('NDrMasterDetails');
    }

    public function DrsTrans(){
        return $this->hasMany(\App\Models\Operation\DRSTransactions::class,'Docket_No','Docket_No');
        
    }

    public function DrsTransDetails(){
        return $this->belongsTo(\App\Models\Operation\DRSTransactions::class,'Docket_No','Docket_No')->with('DRSDatasDetails');
        
    }

    public function offEnt(){
        return $this->hasMany(\App\Models\Operation\OffLoadEntry::class,'Docket_No','Docket_NO');
        
    }

     public function offEntDetails(){
        return $this->belongsTo(\App\Models\Operation\OffLoadEntry::class,'Docket_No','Docket_NO')->with('offReasonDetails');
        
    }

    public function RTOData(){
        return $this->hasMany(\App\Models\Operation\RTO::class,'Docket_No','Initial_Docket');
        
    }

     public function RTODataDetails(){
        return $this->belongsTo(\App\Models\Operation\RTO::class,'Docket_No','Initial_Docket');
        
    }

    public function RegulerDeliveryData(){
        return $this->hasMany(\App\Models\Operation\RegularDelivery::class,'Docket_No','Docket_ID');
        
    }

     public function RegulerDeliveryDataDetails(){
        return $this->belongsTo(\App\Models\Operation\RegularDelivery::class,'Docket_No','Docket_ID');
        
    }

    public function getpassData(){
        return $this->hasMany(\App\Models\Operation\GatePassWithDocket::class,'Docket_No','Docket');
        
    }

     public function getpassDataDetails(){
        return $this->belongsTo(\App\Models\Operation\GatePassWithDocket::class,'Docket_No','Docket')->with('DocketDetailGPData','DocketDetailGPData');
        
    }

    public function PartLoadBal(){
        return $this->hasMany(\App\Models\Operation\PartTruckLoad::class,'Docket_No','DocketNo');
    }

    public function PartLoadBalDetail(){
        return $this->belongsTo(\App\Models\Operation\PartTruckLoad::class,'Docket_No','DocketNo');
    }

    public function DocketManyInvoice()
    {
        return $this->hasMany(\App\Models\Operation\DocketMaster::class, \App\Models\Operation\DocketInvoiceDetails::class, 'id','Docket_Id');
    }

    public function DocketManyInvoiceDetails()
    {
        return $this->hasManyThrough( \App\Models\Operation\DocketInvoiceDetails::class, \App\Models\Operation\DocketMaster::class , 'id' ,'Docket_Id');
        
    }
    


}
