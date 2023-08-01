<?php

namespace App\Models\CompanySetup;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Laravel\Sanctum\HasApiTokens;
class BankMaster extends Model
{
    use HasApiTokens, HasFactory, Searchable;
    protected $table= "bank_masters";
    protected $fillable = [
        'BankName',
       ];
   
    public function toSearchableArray()
    {
        return [
            'BankName' => $this->BankName,
           ];
    }


    public function   GetUser(){
        return  $this->hasMany(\App\Models\User::class, 'Created_By','id');
    }
  
    public function   GetUserDett(){
        return  $this->belongsTo(\App\Models\User::class, 'Created_By','id');
    }
}
