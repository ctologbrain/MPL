<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetails extends Model
{
    use HasFactory;
    protected $table="InvoiceDetails";
    public function city()
    {
        return $this->hasMany(\App\Models\OfficeSetup\city::class, 'DestId');
    }

    public function CityDetails()
    {
        return $this->belongsTo(\App\Models\OfficeSetup\city::class, 'DestId')->with('StateDetails');
    }
}
