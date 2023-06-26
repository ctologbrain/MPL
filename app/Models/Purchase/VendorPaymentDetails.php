<?php

namespace App\Models\Purchase;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorPaymentDetails extends Model
{
    use HasFactory;
    protected $table = "VendorMoneyReceiptTransaction";
}
