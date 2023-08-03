<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerTariff extends Model
{
    use HasFactory;
    protected $table="Cust_Tariff_Master";
}
