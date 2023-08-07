<?php

namespace App\Models\ToolAdmin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HolidayMaster extends Model
{
    use HasFactory;
    protected $table ="Holiday_Master";

    public function HolidayDesc(){
       return  $this->hasMany(\App\Models\ToolAdmin\HolidayListMaster::class ,'Description','id');
    }

    public function HolidayDescDetails(){
        return  $this->belongsTo(\App\Models\ToolAdmin\HolidayListMaster::class ,'Description','id');
     }

     public function city(){
        return  $this->hasMany(\App\Models\OfficeSetup\city::class ,'City','id');
     }
 
     public function cityDetails(){
         return  $this->belongsTo(\App\Models\OfficeSetup\city::class ,'City','id');
      }

      public function state(){
        return  $this->hasMany(\App\Models\OfficeSetup\state::class ,'State','id');
     }
 
     public function stateDetails(){
         return  $this->belongsTo(\App\Models\OfficeSetup\state::class ,'State','id');
      }
}
