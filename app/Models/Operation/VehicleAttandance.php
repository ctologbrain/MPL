<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleAttandance extends Model
{
    use HasFactory;
    protected $table ="Vehicle_Attendance";

    public function Vehicle(){
        return $this->hasMany(\App\Models\Vendor\VehicleMaster::class, "VehicleId","id");
    }

    public function vehicleDetails(){
        return $this->belongsTo(\App\Models\Vendor\VehicleMaster::class, "VehicleId","id")->with('VehicleTypeDetails','VendorDetails');
    }

    public function User()
    {
        return $this->hasMany(\App\Models\OfficeSetup\employee::class, 'Created_By','user_id');
    }

    public function UserDetails()
    {
        return $this->belongsTo(\App\Models\OfficeSetup\employee::class,'Created_By','user_id')->with('OfficeMasterParent');
    }

}
