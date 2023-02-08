<?php

namespace App\Models\Stock;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocketSeriesMaster extends Model
{
    use HasFactory;
    public function DocketType()
    {
        return $this->hasMany(\App\Models\Stock\DocketType::class, 'Docket_Type');
    }

    public function DocketTypeDetials()
    {
        return $this->belongsTo(\App\Models\Stock\DocketType::class, 'Docket_Type');
    }
   
    
}
