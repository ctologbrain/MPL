<?php

namespace App\Models\CompanySetup;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
class ZoneMaster extends Model
{
    use HasApiTokens, HasFactory, Searchable;
    protected $fillable = [
        'ZoneName',
       ];
   
    public function toSearchableArray()
    {
        return [
            'ZoneName' => $this->ZoneName,
           ];
    }
    public function Country()
    {
        return $this->hasMany(\App\Models\CompanySetup\CountryMaster::class, 'CountryName');
    }

    public function CountryDetails()
    {
        return $this->belongsTo(\App\Models\CompanySetup\CountryMaster::class, 'CountryName');
    }
}
