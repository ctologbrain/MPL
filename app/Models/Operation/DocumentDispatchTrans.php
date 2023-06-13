<?php

namespace App\Models\Operation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentDispatchTrans extends Model
{
    use HasFactory;
    protected $table ="Document_Dispatch_Trans";

    public function GetDocument(){
        return $this->hasMany(\App\Models\Operation\DocumentMaster::class,'Document_Name','id');
    }
    
    public function GetDocumentDet(){
         return $this->belongsTo(\App\Models\Operation\DocumentMaster::class,'Document_Name','id');
    }
}
