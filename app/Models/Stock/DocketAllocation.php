<?php

namespace App\Models\Stock;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable;
use App\Models\OfficeSetup\OfficeMaster;
class DocketAllocation extends Model
{
    use HasApiTokens, HasFactory, Searchable;
    public function Offcice()
    {
        return $this->hasMany(\App\Models\OfficeSetup\OfficeMaster::class, 'Branch_ID');
    }

    public function OffciceDetails()
    {
        return $this->belongsTo(\App\Models\OfficeSetup\OfficeMaster::class, 'Branch_ID');
       
    }
  
    public function OffciceP()
    {
      
        return $this->hasMany(\App\Models\OfficeSetup\OfficeMaster::class,'Branch_ID','ParentOffice','id');
    }

    public function OffciceDetailsParentDetauls()
    {
     
         return $this->belongsTo(\App\Models\OfficeSetup\OfficeMaster::class,'Branch_ID','ParentOffice','id');
        
    }
    
    public function Status()
    {
        return $this->hasMany(\App\Models\Stock\DocketStatus::class, 'Status');
    }

    public function StatusDetails()
    {
        return $this->belongsTo(\App\Models\Stock\DocketStatus::class, 'Status');
    }
    public function DocketSeries()
    {
        return $this->hasMany(\App\Models\Stock\DocketSeriesDevision::class, 'Series_ID');
    }

    public function DocketSeriesDeatils()
    {
        return $this->belongsTo(\App\Models\Stock\DocketSeriesDevision::class, 'Series_ID');
    }

    public function DocketSeriesMasterData(){
        return $this->hasMany(\App\Models\Stock\DocketSeriesMaster::class,'Series_ID','id');
        
    }

     public function DocketSeriesMasterDetails(){
        return $this->belongsTo(\App\Models\Stock\DocketSeriesMaster::class,'Series_ID','id')->with('DocketTypeDetials');
        
    }

    protected $fillable = [
        'Docket_No',
       ];
   
    public function toSearchableArray()
    {
        return [
            'Docket_No' => $this->Docket_No,
           
        ];
    }

   
}
