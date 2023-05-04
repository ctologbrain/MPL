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
}
