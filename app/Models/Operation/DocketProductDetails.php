<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocketProductDetails extends Model
{
    use HasFactory;
    public function DocketProdduct()
    {
        return $this->hasOne(\App\Models\Operation\DocketProduct::class,'D_Product');
    }

    public function DocketProdductDetails()
    {
        return $this->belongsTo(\App\Models\Operation\DocketProduct::class,'D_Product');
    }
}
