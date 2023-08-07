<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddCustomerKYC extends Model
{
    use HasFactory;
    protected $table ="kyccustomermaster";

    public function DcsName()
    {

        return $this->hasMany(\App\Models\ToolAdmin\DocumentProofMaster::class,'DocumentName','id');

    }

    public function DcsNameDetail()
    {

        return $this->belongsTo(\App\Models\ToolAdmin\DocumentProofMaster::class,'DocumentName','id');

    }
}
