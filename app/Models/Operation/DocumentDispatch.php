<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentDispatch extends Model
{
    use HasFactory;
    protected $table ="Document_Dispatch";

    public function GetOffice(){
        return $this->hasMany(\App\Models\OfficeSetup\OfficeMaster::class,'Destination_Office','id');
    }
    
    public function GetOfficeDet(){
         return $this->belongsTo(\App\Models\OfficeSetup\OfficeMaster::class,'Destination_Office','id');
    }

    public function user(){
        return $this->hasMany(\App\Models\User::class,'Created_By','id');
    }
    
    public function userDet(){
         return $this->belongsTo(\App\Models\User::class,'Created_By','id')->with('empOffDetail');
    }

    public function DispatchTrans(){
        return $this->hasMany(\App\Models\Operation\DocumentDispatchTrans::class,'id','Dispatch_ID');
    }
    
    public function DispatchTransSum(){
         return $this->belongsTo(\App\Models\Operation\DocumentDispatchTrans::class,'id','Dispatch_ID');
    }
    
}
