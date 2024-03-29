<?php
namespace App\Exports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use App\Models\AdminTool\VolumetricFormulaForCustomer;
use DB;
class VoluimetricMasterCustExport implements FromCollection, WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct($search) {
       
        $this->search = $search;
    }
        

    public function collection()
    {
       return VolumetricFormulaForCustomer::
       leftjoin('customer_masters','customer_masters.id','=','VolumetricFormulaForCust.CustId')
       ->select(DB::raw('(CASE WHEN VolumetricFormulaForCust.FromulaFor=1 THEN "OFFICE" ELSE  "CUSTOMER" END) as FFOR'),
        'customer_masters.CustomerCode',
        'customer_masters.CustomerName',
       DB::raw('(CASE WHEN VolumetricFormulaForCust.Mode=1 THEN "AIR" WHEN VolumetricFormulaForCust.Mode=2 THEN "COURIER"
       WHEN VolumetricFormulaForCust.Mode=3 THEN "ROAD" WHEN VolumetricFormulaForCust.Mode=4 THEN "TRAIN" END) as MD '),
       'VolumetricFormulaForCust.Volumetric',
       'VolumetricFormulaForCust.Measurement',
       'VolumetricFormulaForCust.DevideBy',
       'VolumetricFormulaForCust.MultipleBy' )
       ->where(function($query){
           if($this->search!=""){
                $query->where("customer_masters.CustomerName","like", "%".$this->search. "%");
                $query->orWhere("customer_masters.CustomerCode","like", "%".$this->search. "%");
           }
       })->get();
    }

    public function headings(): array
    {
        return [
            'Formula For',
            'Customer Code',
            'Customer Name',
            'Mode Type',
            'Volumetric/CFT',
            'Measurement',
            'Divide By',
            'Multiply By'
         ];
    }
}