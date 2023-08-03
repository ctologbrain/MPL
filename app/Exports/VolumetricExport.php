<?php
namespace App\Exports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use App\Models\Operation\VolumetricCalculation;
use DB;
class VolumetricExport implements FromCollection, WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct($docket) {
       
        $this->docket = $docket;
    }
        

    public function collection()
    {
       return VolumetricCalculation::
        Select("Volumetric_Calculation.PackingM",
        "Volumetric_Calculation.Quantity",
        "Volumetric_Calculation.Length","Volumetric_Calculation.Width",
        "Volumetric_Calculation.Height",
        "Volumetric_Calculation.TotalVolumatric",
        "Volumetric_Calculation.TotalVolumatric as Final"
        )
        ->where("Volumetric_Calculation.Docket_Id",$this->docket)
        ->get();
    }

    public function headings(): array
    {
        return [
            'Measurement',
            'Quantity',
            'Length',
            'Width',
            'Height',
            'Weight',
            'FinalWeight'
         ];
    }
}