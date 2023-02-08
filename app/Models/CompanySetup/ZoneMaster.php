<?php

namespace App\Models\CompanySetup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZoneMaster extends Model
{
    use HasFactory;
    public function Country()
    {
        return $this->hasMany(\App\Models\CompanySetup\CountryMaster::class, 'CountryName');
    }

    public function CountryDetails()
    {
        return $this->belongsTo(\App\Models\CompanySetup\CountryMaster::class, 'CountryName');
    }
}
