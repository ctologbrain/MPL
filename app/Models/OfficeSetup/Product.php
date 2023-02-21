<?php

namespace App\Models\OfficeSetup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable;
class Product extends Model
{
    use HasApiTokens, HasFactory, Searchable;
    protected $fillable = [
        'ProductCode',
        'ProductName',
        'ProductCategory',
     ];
   
    public function toSearchableArray()
    {
        return [
            'ProductCode' => $this->ProductCode,
            'ProductName' => $this->ProductName,
            'ProductCategory'=>$this->ProductCategory
        ];
    }
}
