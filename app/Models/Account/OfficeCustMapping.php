<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeCustMapping extends Model
{
    use HasFactory;
    protected $table = "officecustmappping";

    public function Cust()
    {
        return $this->hasMany(\App\Models\Account\CustomerMaster::class, 'CustomerId','id');
    }
    public function CustDetails()
    {
        return $this->belongsTo(\App\Models\Account\CustomerMaster::class, 'CustomerId','id');
    }

    public function Office()
    {
        return $this->hasMany(\App\Models\OfficeSetup\OfficeMaster::class, 'OfficeId','id');
    }
    public function OfficeDetails()
    {
        return $this->belongsTo(\App\Models\OfficeSetup\OfficeMaster::class, 'OfficeId','id');
    }

    public function User()
    {
        return $this->hasMany(\App\Models\OfficeSetup\employee::class, 'CreatedBy','user_id');
    }
    public function UserDetails()
    {
        return $this->belongsTo(\App\Models\OfficeSetup\employee::class, 'CreatedBy','user_id');
    }
}
