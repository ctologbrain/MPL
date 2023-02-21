<?php

namespace App\Models\OfficeSetup;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeTypeMaster extends Model
{
    use HasApiTokens, HasFactory, Searchable;
    protected $fillable = [
        'OfficeTypeCode',
        'OfficeTypeName',
      ];
   
    public function toSearchableArray()
    {
        return [
            'OfficeTypeCode' => $this->OfficeTypeCode,
            'OfficeTypeName' => $this->OfficeTypeName,
        ];
    }
}
