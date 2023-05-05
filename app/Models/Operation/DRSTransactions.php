<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DRSTransactions extends Model
{
    use HasFactory;
    protected $table="DRS_Transactions";

    public function DRSDatas(){
        return  $this->hasMany(\App\Models\Operation\DRSEntry::class, 'DRS_No','ID');
    }

    public function DRSDatasDetails(){
        return  $this->belongsTo(\App\Models\Operation\DRSEntry::class, 'DRS_No','ID')->with('getVehicleNoDett');
    }
}
