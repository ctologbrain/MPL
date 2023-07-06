<?php

namespace App\Models\CompanySetup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Laravel\Sanctum\HasApiTokens;
class PincodeMaster extends Model
{
    use HasApiTokens, HasFactory, Searchable;
    protected $fillable = [
        'PinCode',
       ];
   
    public function toSearchableArray()
    {
        return [
            'PinCode' => $this->PinCode,
           ];
    }
   
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
        return $this->hasMany(\App\Models\OfficeSetup\city::class, 'city')->with('ZoneDetails');
    }

    public function CityDetails()
    {
        return $this->belongsTo(\App\Models\OfficeSetup\city::class, 'city')->with('ZoneDetails');
    }

    public function   GetUser(){
        return  $this->hasMany(\App\Models\User::class, 'Created_By','id');
    }
  
    public function   GetUserDett(){
        return  $this->belongsTo(\App\Models\User::class, 'Created_By','id');
    }
}
