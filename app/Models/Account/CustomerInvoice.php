<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerInvoice extends Model
{
    use HasFactory;
    protected $table="InvoiceMaster";
    public function customer()
    {
        return $this->hasOne(\App\Models\Account\CustomerMaster::class, 'Cust_Id');
    }

    public function customerDetails()
    {
        return $this->belongsTo(\App\Models\Account\CustomerMaster::class, 'Cust_Id')->with('CustAddress');
    }
    public function customerAdd()
    {
        return $this->hasOne(\App\Models\Account\CustomerAddress::class,'id','cust_id');
    }

    public function customerAddressDetails()
    {
        return $this->belongsTo(\App\Models\Account\CustomerAddress::class,'id','cust_id');
    }
    public function InvDetails()
    {
        return $this->hasOne(\App\Models\Account\InvoiceDetails::class,'id','InvId');
    }

    public function Sum()
    {
        return $this->belongsTo(\App\Models\Account\InvoiceDetails::class,'id','InvId')->with('SourceDet','DestDet');
    }
    public function InvNewDetails()
    {
        return $this->hasOne(\App\Models\Account\InvoiceDetails::class,'id','InvId');
    }

    public function InvNewDetailsMoney()
    {
        return $this->belongsTo(\App\Models\Account\InvoiceDetails::class,'id','InvId');
    }
    public function MoneryRecept()
    {
        return $this->hasOne(\App\Models\Account\MoneyReceiptTrans::class,'id','InvId');
    }

    public function MoneryReceptDetails()
    {
        return $this->belongsTo(\App\Models\Account\MoneyReceiptTrans::class,'id','InvId');
    }
    public function customerAddSupply()
    {
        return $this->hasOne(\App\Models\Account\CustomerAddress::class,'Cust_Id','cust_id');
    }

    public function customerAddressDetailsSupply()
    {
        return $this->belongsTo(\App\Models\Account\CustomerAddress::class,'Cust_Id','cust_id');
    }
    public function countSupply()
    {

        return $this->hasOne(\App\Models\Account\CustomerInvoice::class,'id','ParentInvoice');
    }
    public function countSupplyDetails()
    {

        return $this->belongsTo(\App\Models\Account\CustomerInvoice::class,'id','ParentInvoice');
    }

}
