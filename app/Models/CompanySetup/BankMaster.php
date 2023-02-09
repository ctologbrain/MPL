<?php

namespace App\Models\CompanySetup;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Laravel\Sanctum\HasApiTokens;
class BankMaster extends Model
{
    use HasApiTokens, HasFactory, Searchable;
    protected $fillable = [
        'BankName',
       ];
   
    public function toSearchableArray()
    {
        return [
            'BankName' => $this->BankName,
           ];
    }
}
