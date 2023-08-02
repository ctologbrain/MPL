<?php

namespace App\Models\OfficeSetup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empPresentContactInformation extends Model
{
    use HasFactory;
    protected $table ="emp_present_contact_information";

    public function state()
    {
        return $this->hasMany(\App\Models\OfficeSetup\state::class, 'State','id');
    }

    public function StatesDetails()
    {
        return $this->belongsTo(\App\Models\OfficeSetup\state::class, 'State','id');
    }


    public function city()
    {
        return $this->hasMany(\App\Models\OfficeSetup\city::class, 'City','id');
    }

    public function CityDetails()
    {
        return $this->belongsTo(\App\Models\OfficeSetup\city::class, 'City','id');
    }

    public function Pincode()
    {
        return $this->hasMany(\App\Models\CompanySetup\PincodeMaster::class, 'Pincode','id');
    }

    public function PincodeDetails()
    {
        return $this->belongsTo(\App\Models\CompanySetup\PincodeMaster::class, 'Pincode','id');
    }
}
