<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteMaster extends Model
{
    use HasFactory;
    public function route()
    {
        return $this->hasOne(\App\Models\OfficeSetup\city::class, 'Source');
    }

    public function StatrtPointDetails()
    {
        return $this->belongsTo(\App\Models\OfficeSetup\city::class, 'Source');
    }
    public function Dest()
    {
        return $this->hasOne(\App\Models\OfficeSetup\city::class, 'Destination');
    }

    public function EndPointDetails()
    {
        return $this->belongsTo(\App\Models\OfficeSetup\city::class, 'Destination');
    }
  
   
}
