<?php

namespace App\Models\Purchase;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorBillingDetails extends Model
{
    use HasFactory;
    protected $table = "VendorInvoiceDetails";
}
