<?php

namespace App\Models\OfficeSetup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    use HasFactory;
    public function Zone()
    {
        return $this->hasOne(\App\Models\CompanySetup\ZoneMaster::class, 'ZoneName');
    }

    public function ZoneDetails()
    {
        return $this->belongsTo(\App\Models\CompanySetup\ZoneMaster::class, 'ZoneName');
    }
    public function State()
    {
        return $this->hasMany(\App\Models\OfficeSetup\state::class, 'stateId');
    }

    public function StateDetails()
    {
        return $this->belongsTo(\App\Models\OfficeSetup\state::class, 'stateId');
    }

    public function pincodeData()
    {
        return $this->hasOne(\App\Models\CompanySetup\PincodeMaster::class,'id', 'city');
    }

    public function pincodeDataDetails()
    {
        return $this->belongsTo(\App\Models\CompanySetup\PincodeMaster::class,'id', 'city');
    }
}
