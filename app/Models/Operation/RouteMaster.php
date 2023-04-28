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
        return $this->belongsTo(\App\Models\OfficeSetup\city::class, 'Source')->with('pincodeDataDetails');
    }
    public function Dest()
    {
        return $this->hasOne(\App\Models\OfficeSetup\city::class, 'Destination');
    }

    public function EndPointDetails()
    {
        return $this->belongsTo(\App\Models\OfficeSetup\city::class, 'Destination')->with('pincodeDataDetails');
    }

     public function user()
    {
        return $this->hasOne(\App\Models\User::class, 'CreatedBy');
    }

    public function userDetails()
    {
        return $this->belongsTo(\App\Models\User::class, 'CreatedBy');
    }

    public function touchpointData(){
        return $this->hasMany(\App\Models\Operation\TouchPoints::class,'id', 'RouteId');
        
    }

    public function touchpointDetails()
    {
        return $this->belongsTo(\App\Models\Operation\TouchPoints::class,'id', 'RouteId');
    }

    
  
   
}
