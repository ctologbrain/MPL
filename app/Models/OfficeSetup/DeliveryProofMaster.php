<?php

namespace App\Models\OfficeSetup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryProofMaster extends Model
{
    use HasFactory;
    protected $table ="delivery_proof_masters";
     public function userData()
    {
        return $this->hasMany(\App\Models\User::class, 'Created_By','id');
    }

    public function userDataDetails()
    {
        return $this->belongsTo(\App\Models\User::class, 'Created_By','id');
    }
}
