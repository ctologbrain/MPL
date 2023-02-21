<?php

namespace App\Models\OfficeSetup;
use Laravel\Scout\Searchable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckListMaster extends Model
{
    use HasApiTokens, HasFactory, Searchable;
    protected $fillable = [
        'DocumentName',
       ];
   
    public function toSearchableArray()
    {
        return [
            'DocumentName' => $this->DocumentName,
           ];
    }
}
