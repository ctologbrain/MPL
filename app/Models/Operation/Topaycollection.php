<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topaycollection extends Model
{
    use HasFactory;
    protected $table = "Docket_Collection_Trans";

    // public function   DocketDeposit(){
    //     return  $this->hasMany(\App\Models\Operation\DocketDepositTrans::class, 'Docket_Id', 'Docket_Id');
    // }
  
    // public function   DocketDepositInfo(){
    //     return  $this->belongsTo(\App\Models\Operation\DocketDepositTrans::class, 'Docket_Id', 'Docket_Id')->with('DocketBankInfo','DocketBranchInfo');
    // }

    public function   DocketMaster(){
        return  $this->hasMany(\App\Models\Operation\DocketMaster::class, 'Docket_Id');
    }
  
    public function   DocketMasterInfo(){
        return  $this->belongsTo(\App\Models\Operation\DocketMaster::class, 'Docket_Id')->with('ToPayCollectionDetails')->orderby('id','ASC');
    }

     public function   DocketcalBank(){
        return  $this->hasMany(\App\Models\CompanySetup\BankMaster::class, 'Bank');
    }
  
    public function   DocketcalBankInfo(){
        return  $this->belongsTo(\App\Models\CompanySetup\BankMaster::class, 'Bank');
    }
}
