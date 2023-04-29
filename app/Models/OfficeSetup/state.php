<?php

namespace App\Models\OfficeSetup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class state extends Model
{
    use HasFactory;
    public function Country()
    {
        return $this->hasMany(\App\Models\CompanySetup\CountryMaster::class, 'country_id');
    }

    public function CountryDetails()
    {
        return $this->belongsTo(\App\Models\CompanySetup\CountryMaster::class, 'country_id');
    }
}
