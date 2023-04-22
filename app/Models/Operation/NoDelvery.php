<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoDelvery extends Model
{
    use HasFactory;
    protected $table ="NDR_Trans";

    public function NDrMaster(){
        return $this->hasMany(\App\Models\OfficeSetup\NdrMaster::class,'  NDR_Reason','id');
    }

     public function NDrMasterDetails(){
        return $this->belongsTo(\App\Models\OfficeSetup\NdrMaster::class,'   NDR_Reason','id');
    }
}
