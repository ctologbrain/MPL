<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocketAllocation extends Model
{
    use HasFactory;
    protected $table ="docket_allocations";


    public function   GetStatusWithAllocate(){
        return  $this->hasMany(\App\Models\Operation\DocketStatus::class, 'Status');
    }
  
    public function   GetStatusWithAllocateDett(){
        return  $this->belongsTo(\App\Models\Operation\DocketStatus::class, 'Status');
    }

    public function DocketSeriesMasterData(){
        return $this->hasMany(\App\Models\Stock\DocketSeriesMaster::class,'Series_ID','id');
        
    }

     public function DocketSeriesMasterDetails(){
        return $this->belongsTo(\App\Models\Stock\DocketSeriesMaster::class,'Series_ID','id')->with('DocketTypeDetials');
        
    }

        
}
