<?php

namespace App\Models\Stock;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocketType extends Model
{
    use HasFactory;
    public function Caegory()
    {
        return $this->hasMany(\App\Models\Stock\DocketCategory::class, 'Cat_Id');
    }

    public function CaegoryDetails()
    {
        return $this->belongsTo(\App\Models\Stock\DocketCategory::class, 'Cat_Id');
    }

    public function  User(){
         return $this->hasMany(\App\Models\User::class, 'Created_By','id');
    }

    public function  UserDetails(){
        return $this->belongsTo(\App\Models\User::class, 'Created_By','id');
    }
}
