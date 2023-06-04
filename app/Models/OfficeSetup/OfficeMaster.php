<?php

namespace App\Models\OfficeSetup;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeMaster extends Model
{
    use HasApiTokens, HasFactory, Searchable;
    protected $fillable = [
        'OfficeName',
        'OfficeCode',
      ];
   
    public function toSearchableArray()
    {
        return [
            'OfficeName' => $this->OfficeName,
            'OfficeCode' => $this->OfficeCode,
        ];
    }
    
    public function state()
    {
        return $this->hasMany(\App\Models\OfficeSetup\state::class, 'State_id');
    }

    public function StatesDetails()
    {
        return $this->belongsTo(\App\Models\OfficeSetup\state::class, 'State_id');
    }
    public function OfficeTypeMaster()
    {
        return $this->hasMany(\App\Models\OfficeSetup\OfficeTypeMaster::class, 'OfficeType');
    }

    public function OfficeTypeMasterDetails()
    {
        return $this->belongsTo(\App\Models\OfficeSetup\OfficeTypeMaster::class, 'OfficeType');
    }
    public function city()
    {
        return $this->hasMany(\App\Models\OfficeSetup\city::class, 'City_id');
    }

    public function CityDetails()
    {
        return $this->belongsTo(\App\Models\OfficeSetup\city::class, 'City_id');
    }
    public function OfficeMaster()
    {
        return $this->hasMany(\App\Models\OfficeSetup\OfficeMaster::class, 'ParentOffice');
    }

    public function OfficeMasterParent()
    {
        return $this->belongsTo(\App\Models\OfficeSetup\OfficeMaster::class, 'ParentOffice');
    }
    
    
    
  
}
