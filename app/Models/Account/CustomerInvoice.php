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
        return $this->belongsTo(\App\Models\Account\CustomerMaster::class, 'Cust_Id');
    }
    public function InvDetails()
    {
        return $this->hasOne(\App\Models\Account\InvoiceDetails::class,'id','InvId');
    }

    public function Sum()
    {
        return $this->belongsTo(\App\Models\Account\InvoiceDetails::class,'id','InvId');
    }

}
