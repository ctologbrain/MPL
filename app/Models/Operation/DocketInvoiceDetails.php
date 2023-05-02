<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocketInvoiceDetails extends Model
{
    use HasFactory;

    public function DocketInviceType(){
        return $this->hasMany(\App\Models\Operation\DocketInvoiceType::class,'Type');
    }

    public function DocketInviceTypeData(){
         return $this->belongsTo(\App\Models\Operation\DocketInvoiceType::class,'Type');
    }
}
