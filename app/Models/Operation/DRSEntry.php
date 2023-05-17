<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DRSEntry extends Model
{
    use HasFactory;
    protected $table="DRS_Masters";
    public function   GetOfficeCodeName(){
        return  $this->hasMany(\App\Models\OfficeSetup\OfficeMaster::class, 'D_Office_Id');
      }
  
       public function   GetOfficeCodeNameDett(){
        return  $this->belongsTo(\App\Models\OfficeSetup\OfficeMaster::class, 'D_Office_Id');
      }
  
      public function   getVehicleNo(){
        return  $this->hasMany(\App\Models\Vendor\VehicleMaster::class, 'Vehicle_No');
      }
  
  
      public function   getVehicleNoDett(){
         return  $this->belongsTo(\App\Models\Vendor\VehicleMaster::class, 'Vehicle_No');
      }
  
  
       public function   getDeliveryBoy(){
         return $this->hasMany(\App\Models\OfficeSetup\employee::class, 'D_Boy');    
      }
  
      public function   getDeliveryBoyNameDett(){
         return  $this->belongsTo(\App\Models\OfficeSetup\employee::class, 'D_Boy');  
      }

      public function   getVehicleType(){
        return  $this->hasMany(\App\Models\Vendor\VehicleType::class, 'Vehcile_Type');
      }

       public function   getVehicleTypeDett(){
         return  $this->belongsTo(\App\Models\Vendor\VehicleType::class, 'Vehcile_Type');
        }

        public function   getDRSTrans(){
          return  $this->hasMany(\App\Models\Operation\DRSTransactions::class, 'ID','DRS_No');
        }
  
         public function   getDRSTransDett(){
           return  $this->belongsTo(\App\Models\Operation\DRSTransactions::class, 'ID','DRS_No')->with('DRSDocketDataDeatils','DRSDelNonDelDataDeatils');
          }

      
}
