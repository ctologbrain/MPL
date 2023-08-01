<?php

namespace App\Models\Role;
use Laravel\Scout\Searchable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleMaster extends Model
{
    use HasApiTokens, HasFactory, Searchable;
    protected $fillable = [
        'RoleName',
       ];
   
    public function toSearchableArray()
    {
        return [
            'RoleName' => $this->DocumentName,
           ];
    }
}
