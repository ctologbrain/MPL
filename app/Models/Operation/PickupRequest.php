<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PickupRequest extends Model
{
    use HasFactory;
    protected $table ="Pickup_Request";

    public function Customer(){
        return $this->hasMany(\App\Models\Account\CustomerMaster::class ,"customerId","id");
    }

    public function CustomerDetails(){
        return $this->belongsTo(\App\Models\Account\CustomerMaster::class ,"customerId","id");
    }

    public function content(){
        return $this->hasMany(\App\Models\OfficeSetup\ContentsMaster::class ,"contentId","id");
    }

    public function contentDetails(){
        return $this->belongsTo(\App\Models\OfficeSetup\ContentsMaster::class ,"contentId","id");
    }


    public function PincodeOrigin(){
        return $this->hasMany(\App\Models\CompanySetup\PincodeMaster::class ,"originId","id");
    }

    public function PincodeOriginDetails(){
        return $this->belongsTo(\App\Models\CompanySetup\PincodeMaster::class ,"originId","id")->with('StateDetails','CityDetails');
    }

    public function PincodeDest(){
        return $this->hasMany(\App\Models\CompanySetup\PincodeMaster::class ,"DestId","id");
    }

    public function PincodeDestDetails(){
        return $this->belongsTo(\App\Models\CompanySetup\PincodeMaster::class ,"DestId","id")->with('StateDetails','CityDetails');
    }

    public function userDet(){
        return $this->hasMany(\App\Models\User::class ,"CreatedBy","id");
    }

    public function userDetails(){
        return $this->belongsTo(\App\Models\User::class ,"CreatedBy","id")->with('empOffDetail');
    }

    public function empl(){
        return $this->hasMany(\App\Models\OfficeSetup\employee::class ,"AssignTo","id");
    }

    public function emplDet(){
        return $this->belongsTo(\App\Models\OfficeSetup\employee::class ,"AssignTo","id");
    }

    
}
