<?php

namespace App\Models\OfficeSetup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empPermanentContactInformation extends Model
{
    use HasFactory;
    protected $table ="emp_permanent_contact_information";

    public function stateP()
    {
        return $this->hasMany(\App\Models\OfficeSetup\state::class, 'State','id');
    }

    public function StatesDetailsP()
    {
        return $this->belongsTo(\App\Models\OfficeSetup\state::class, 'State','id');
    }


    public function cityP()
    {
        return $this->hasMany(\App\Models\OfficeSetup\city::class, 'City','id');
    }

    public function CityDetailsP()
    {
        return $this->belongsTo(\App\Models\OfficeSetup\city::class, 'City','id');
    }

    public function PincodeP()
    {
        return $this->hasMany(\App\Models\CompanySetup\PincodeMaster::class, 'Pincode','id');
    }

    public function PincodeDetailsP()
    {
        return $this->belongsTo(\App\Models\CompanySetup\PincodeMaster::class, 'Pincode','id');
    }
}
