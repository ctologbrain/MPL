<?php

namespace App\Models\CompanySetup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PincodeMaster extends Model
{
    use HasFactory;
    public function State()
    {
        return $this->hasMany(\App\Models\OfficeSetup\state::class, 'State');
    }

    public function StateDetails()
    {
        return $this->belongsTo(\App\Models\OfficeSetup\state::class, 'State');
    }
    public function City()
    {
        return $this->hasMany(\App\Models\OfficeSetup\city::class, 'city');
    }

    public function CityDetails()
    {
        return $this->belongsTo(\App\Models\OfficeSetup\city::class, 'city');
    }
}
