<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OffLoadEntry extends Model
{
    use HasFactory;
    protected $table ="Offload_Transactions";

    public function OffReason(){
          return $this->hasMany(\App\Models\Operation\OffloadReason::class,'Offload_Reason','id');
    }

    public function offReasonDetails(){
         return $this->belongsTo(\App\Models\Operation\OffloadReason::class,'Offload_Reason','id');
    }

    
}
