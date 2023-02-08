<?php

namespace App\Models\OfficeSetup;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class designation extends Model
{
    use HasFactory;
    protected $fillable = ['Parent_Id', 'DesignationName', 'ShortName'];
    public function designation()
    {
        return $this->hasMany(\App\Models\OfficeSetup\designation::class, 'Parent_Id');
    }

    public function designationParent()
    {
        return $this->belongsTo(\App\Models\OfficeSetup\designation::class, 'Parent_Id');
    }
}
