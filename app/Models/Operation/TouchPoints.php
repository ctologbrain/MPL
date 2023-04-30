<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TouchPoints extends Model
{
    use HasFactory;

    public function City()
    {
        return $this->hasMany(\App\Models\OfficeSetup\city::class, 'CityId');
    }

    public function CityDetails()
    {
        return $this->belongsTo(\App\Models\OfficeSetup\city::class, 'CityId');
    }

      public function user()
    {
        return $this->hasOne(\App\Models\User::class, 'Created_By');
    }

    public function userDetails()
    {
        return $this->belongsTo(\App\Models\User::class, 'Created_By');
    }
}
