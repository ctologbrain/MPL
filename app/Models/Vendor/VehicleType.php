<?php

namespace App\Models\Vendor;

use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    use HasApiTokens, HasFactory, Searchable;
    protected $fillable = [
        'VehicleType',
       
      ];
   
    public function toSearchableArray()
    {
        return [
            'VehicleType' => $this->VehicleType,
          
        ];
    }
}
