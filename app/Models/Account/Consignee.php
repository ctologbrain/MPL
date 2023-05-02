<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consignee extends Model
{
    use HasFactory;
    public function Address()
    {

        return $this->hasMany(\App\Models\Account\ConsignorMaster::class,'ConsrId');

    }

    public function CustAddress()
    {

        return $this->belongsTo(\App\Models\Account\ConsignorMaster::class,'ConsrId');

    }
}
