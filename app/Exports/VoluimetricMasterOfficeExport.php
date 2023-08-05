<?php
namespace App\Exports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\AdminTool\VolumetricFormulaForOffcie;
use DB;
class VoluimetricMasterOfficeExport implements FromCollection, WithHeadings,ShouldAutoSize
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
       return VolumetricFormulaForOffcie::
       leftjoin('office_masters','office_masters.id','=','VolumetricFormulaForOff.OfficeId')
       ->select(DB::raw('(CASE WHEN VolumetricFormulaForOff.FromulaFor=1 THEN "OFFICE" ELSE  "CUSTOMER" END) as FFOR'),
        'office_masters.OfficeCode',
        'office_masters.OfficeName',
        DB::raw('(CASE WHEN VolumetricFormulaForOff.Mode=1 THEN "AIR" WHEN VolumetricFormulaForOff.Mode=2 THEN "COURIER"
        WHEN VolumetricFormulaForOff.Mode=3 THEN "ROAD" WHEN VolumetricFormulaForOff.Mode=4 THEN "TRAIN" END) as MD '),
       'VolumetricFormulaForOff.Volumetric',
       'VolumetricFormulaForOff.Measurement',
       'VolumetricFormulaForOff.DevideBy',
       'VolumetricFormulaForOff.MultipleBy' )
       ->where(function($query){
           if($this->search!=""){
                $query->where("office_masters.OfficeName","like", "%".$this->search. "%");
                $query->orWhere("office_masters.OfficeCode","like", "%".$this->search. "%");
           }
       })->get();
    }

    public function headings(): array
    {
        return [
            'Formula For',
            'Office Code',
            'Office Name',
            'Mode Type',
            'Volumetric/CFT',
            'Measurement',
            'Divide By',
            'Multiply By'
         ];
    }
}