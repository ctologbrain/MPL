<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeModeMap extends Model
{
    use HasFactory;
    protected $table = "officemodemap";

    public function Cust()
    {
        return $this->hasMany(\App\Models\Account\CustomerMaster::class, 'CustId','id');
    }
    public function CustDetails()
    {
        return $this->belongsTo(\App\Models\Account\CustomerMaster::class, 'CustId','id');
    }

    public function Mode()
    {
        return $this->hasMany(\App\Models\Operation\BookingMode::class, 'ModeId','id');
    }
    public function ModeDetails()
    {
        return $this->belongsTo(\App\Models\Operation\BookingMode::class, 'ModeId','id');
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
