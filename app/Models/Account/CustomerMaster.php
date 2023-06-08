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
        return $this->belongsTo(\App\Models\Account\CustomerAddress::class,'id','cust_id');
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

    public function InvoiceCust(){
        return $this->hasMany(\App\Models\Account\CustomerInvoice::class,'id', 'Cust_Id');
    }

    public function InvoiceCustDetails(){
        return $this->belongsTo(\App\Models\Account\CustomerInvoice::class,'id', 'Cust_Id');
    }
}
