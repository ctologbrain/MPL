<?php

namespace App\Models\OfficeSetup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplaintType extends Model
{
    use HasFactory;
    protected $table ="complaint_types";

    public function   GetUser(){
        return  $this->hasMany(\App\Models\User::class, 'Created_By','id');
    }
  
    public function   GetUserDett(){
        return  $this->belongsTo(\App\Models\User::class, 'Created_By','id');
    }
}
