<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocketDepositTrans extends Model
{
    use HasFactory;
    protected $table = "Docket_Deposit_Trans";

    public function   DocketBank(){
        return  $this->hasMany(\App\Models\CompanySetup\BankMaster::class, 'Bank');
    }
  
    public function   DocketBankInfo(){
        return  $this->belongsTo(\App\Models\CompanySetup\BankMaster::class, 'Bank');
    }

    public function   DocketBranch(){
        return  $this->hasMany(\App\Models\OfficeSetup\OfficeMaster::class, 'Branch');
    }
  
    public function   DocketBranchInfo(){
        return  $this->belongsTo(\App\Models\OfficeSetup\OfficeMaster::class, 'Branch');
    }
    public function Docket()
    {
        return $this->hasMany(\App\Models\Operation\DocketMaster::class,'Docket_Id');
    }

    public function DocketDetails()
    {
        return $this->belongsTo(\App\Models\Operation\DocketMaster::class,'Docket_Id');
    }
    public function Bank()
    {
        return $this->hasMany(\App\Models\CompanySetup\BankMaster::class,'Bank');
    }

    public function BankDetails()
    {
        return $this->belongsTo(\App\Models\CompanySetup\BankMaster::class,'Bank');
    }

    public function   DocketMaster(){
        return  $this->hasMany(\App\Models\Operation\DocketMaster::class, 'Docket_Id');
    }
  
    public function   DocketMasterInfo(){
        return  $this->belongsTo(\App\Models\Operation\DocketMaster::class, 'Docket_Id');
    }
}
