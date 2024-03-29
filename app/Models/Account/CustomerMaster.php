<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerMaster extends Model
{
    use HasFactory;
    public function Payment()
    {
        return $this->hasMany(\App\Models\Account\CustomerPayment::class,'id' ,'cust_id');
    }

    public function PaymentDetails()
    {
        return $this->belongsTo(\App\Models\Account\CustomerPayment::class,'id','cust_id');
    }
    public function Address()
    {
        return $this->hasMany(\App\Models\Account\CustomerAddress::class,'id' ,'cust_id');
    }

    public function CustAddress()
    {
        return $this->belongsTo(\App\Models\Account\CustomerAddress::class,'id','cust_id')->with('cityDetails','statesDetails','PINDetails');
    }
  
    public function parent()
    {
        return $this->belongsTo(\App\Models\Account\CustomerMaster::class,'id', 'ParentCustomer');
    }

    public function children()
    {
        return $this->hasOne(\App\Models\Account\CustomerMaster::class,'id', 'ParentCustomer');
    } 
    
    public function userData()
    {
        return $this->belongsTo(\App\Models\User::class,'CreatedBy', 'id');
    }

    public function userDetail()
    {
        return $this->hasMany(\App\Models\User::class,'CreatedBy', 'id');
    } 

    public function userUpdateData()
    {
        return $this->belongsTo(\App\Models\User::class,'UpdatedBy', 'id');
    }

    public function userUpdateDetail()
    {
        return $this->hasMany(\App\Models\User::class,'UpdatedBy', 'id');
    } 

    public function userCustomerData()
    {
        return $this->belongsTo(\App\Models\User::class,'UserId', 'id');
    }

    public function userCustomerDetail()
    {
        return $this->hasMany(\App\Models\User::class,'UserId', 'id');
    } 

    public function DocketVol(){
        return $this->hasMany(\App\Models\Operation\DocketMaster::class,'id', 'Cust_Id');
    }

    public function DocketVolDetails(){
        return $this->belongsTo(\App\Models\Operation\DocketMaster::class,'id', 'Cust_Id');
    }
    public function DocketVols(){
        return $this->hasMany(\App\Models\Operation\DocketMaster::class,'id', 'Cust_Id');
    }

    public function DocketVolDetailss(){
        return $this->hasManyThrough(\App\Models\Operation\DocketMaster::class,\App\Models\Account\CustomerMaster::class,'id', 'Cust_Id')->with('PincodeDetails','DestPincodeDetails','BookignTypeDetails','DocketProductDetails','customerDetails','TariffTypeDeatils')->withsum('DocketInvoiceDetails','Amount');
    }


    public function InvoiceCust(){
        return $this->hasMany(\App\Models\Account\CustomerInvoice::class,'id', 'Cust_Id');
    }

    public function InvoiceCustDetails(){
        return $this->belongsTo(\App\Models\Account\CustomerInvoice::class,'id', 'Cust_Id');
    }


    public function CRM(){
        return $this->hasMany(\App\Models\OfficeSetup\employee::class,'CRMExecutive', 'id');
    }

    public function CRMDetails(){
        return $this->belongsTo(\App\Models\OfficeSetup\employee::class,'CRMExecutive', 'id');
    }

    public function billingPerson(){
        return $this->hasMany(\App\Models\OfficeSetup\employee::class,'BillingPerson', 'id');
    }

    public function billingPersonDetails(){
        return $this->belongsTo(\App\Models\OfficeSetup\employee::class,'BillingPerson', 'id');
    }


    public function refereBy(){
        return $this->hasMany(\App\Models\OfficeSetup\employee::class,'ReferenceBy', 'id');
    }

    public function refereByDetails(){
        return $this->belongsTo(\App\Models\OfficeSetup\employee::class,'ReferenceBy', 'id');
    }

    public function Mode(){
        return $this->hasMany(\App\Models\Operation\BookingMode::class,'Mode', 'id');
    }

    public function ModeDetails(){
        return $this->belongsTo(\App\Models\Operation\BookingMode::class,'Mode', 'id');
    }

    public function Office(){
        return $this->hasMany(\App\Models\OfficeSetup\OfficeMaster::class,'office_id', 'id');
    }

    public function OfficeDetails(){
        return $this->belongsTo(\App\Models\OfficeSetup\OfficeMaster::class,'office_id', 'id');
    }
    
    
   

   
}
