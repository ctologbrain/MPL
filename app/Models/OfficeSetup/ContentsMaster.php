<?php

namespace App\Models\OfficeSetup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentsMaster extends Model
{
    use HasFactory;
    protected $table="Content_Master";
     public function userData()
    {
        return $this->hasMany(\App\Models\User::class, 'Created_By','id');
    }

    public function userDatasDetails()
    {
        return $this->belongsTo(\App\Models\User::class, 'Created_By','id');
    }
}
