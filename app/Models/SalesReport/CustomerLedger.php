<?php

namespace App\Models\SalesReport;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerLedger extends Model
{
    use HasFactory;
    protected $table="CustomerLadger";
    public function customer()
    {
        return $this->hasOne(\App\Models\Account\CustomerMaster::class, 'CustId');
    }

    public function customerDetails()
    {
        return $this->belongsTo(\App\Models\Account\CustomerMaster::class,'CustId');
    }
}
