<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocketCase extends Model
{
    use HasFactory;
    protected $table= "Docket_Case";

    public function Employee()
    {
        return $this->hasMany(\App\Models\OfficeSetup\employee::class,'Case_OpenBy' ,'id');
    }

    public function EmployeeDetail()
    {
        return $this->belongsTo(\App\Models\OfficeSetup\employee::class,'Case_OpenBy', 'id');
    }

    public function Status()
    {
        return $this->hasMany(\App\Models\Stock\DocketAllocation::class,'Docket_Number' ,'Docket_No');
    }

    public function StatusDetail()
    {
        return $this->belongsTo(\App\Models\Stock\DocketAllocation::class,'Docket_Number', 'Docket_No')->with("StatusDetails","EmployeeDetails");
    }
  
}
