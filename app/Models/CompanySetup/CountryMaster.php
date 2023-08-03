<?php

namespace App\Models\CompanySetup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Laravel\Sanctum\HasApiTokens;
class CountryMaster extends Model
{
    use HasApiTokens, HasFactory, Searchable;
    protected $fillable = [
        'CountryName',
       ];
   
    public function toSearchableArray()
    {
        return [
            'CountryName' => $this->CountryName,
           ];
    }
}
