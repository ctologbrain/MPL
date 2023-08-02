<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadInvoice extends Model
{
    use HasFactory;
    protected $table ="Upload_Invoice";

    public function customerRelate()
    {
        return $this->hasMany(\App\Models\Account\CustomerMaster::class,'cust_id' ,'id');
    }

    public function customerDetails()
    {
        return $this->belongsTo(\App\Models\Account\CustomerMaster::class,'cust_id','id');
    }

    public function user()
    {
        return $this->hasMany(\App\Models\User::class,'Created_By' ,'id');
    }

    public function userDetails()
    {
        return $this->belongsTo(\App\Models\User::class,'Created_By','id');
    }

}
