<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditNote extends Model
{
    use HasFactory;
    protected $table="CreditNote";
    public function InvDetails()
    {
        return $this->hasOne(\App\Models\Account\InvoiceDetails::class,'id','InvId');
    }

    public function Sum()
    {
        return $this->belongsTo(\App\Models\Account\InvoiceDetails::class,'id','InvId')->with('SourceDet','DestDet');
    }

    public function Customer()
    {
        return $this->hasOne(\App\Models\Account\CustomerMaster::class,'CustId','id');
    }

    public function CustomerDetail()
    {
        return $this->belongsTo(\App\Models\Account\CustomerMaster::class,'CustId','id');
    }

    public function InvoiceMasterData(){
        return $this->hasMany(\App\Models\Account\CustomerInvoice::class,'InvId', 'id');
    }

    public function InvoiceMasterDataDetail(){
        return $this->belongsTo(\App\Models\Account\CustomerInvoice::class,'InvId', 'id');
    }

    public function CustomerAdd()
    {
        return $this->hasOne(\App\Models\Account\CustomerMaster::class,'AddressId','id');
    }

    public function CustomerAddDetails()
    {
        return $this->belongsTo(\App\Models\Account\CustomerMaster::class,'AddressId','id');
    }

    public function userData()
    {
        return $this->belongsTo(\App\Models\User::class,'CreatedBy', 'id');
    }

    public function userDetail()
    {
        return $this->hasMany(\App\Models\User::class,'CreatedBy', 'id')->with('empOffDetail');
    } 

    public function CancelByData()
    {
        return $this->belongsTo(\App\Models\User::class,'cancelBy', 'id');
    }

    public function CancelByDataDetail()
    {
        return $this->hasMany(\App\Models\User::class,'cancelBy', 'id');
    } 

    public function CustomerAddrs()
    {
        return $this->hasOne(\App\Models\Account\CustomerAddress::class,'AddressId','id');
    }

    public function CustomerAddrsDetails()
    {
        return $this->belongsTo(\App\Models\Account\CustomerAddress::class,'AddressId','id')->with('cityDetails','PINDetails');
    }
}
