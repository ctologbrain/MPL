<?php

namespace App\Models\OfficeSetup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NdrMaster extends Model
{
    use HasFactory;
    protected $table ="ndr_masters";

    public function   GetUser(){
        return  $this->hasMany(\App\Models\User::class, 'CreatedBy','id');
    }
  
    public function   GetUserDett(){
        return  $this->belongsTo(\App\Models\User::class, 'CreatedBy','id');
    }
}
