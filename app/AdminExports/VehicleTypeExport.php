<?php
namespace App\AdminExports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Vendor\VehicleType;
use DB;
class VehicleTypeExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct(){
       // $this->keyword=$keyword;
      
    }
    public function collection()
    {
       return VehicleType::orderBy('vehicle_types.id')
        ->select(
       'vehicle_types.VehicleType',
       'vehicle_types.Capacity',
       'vehicle_types.BodyType',
       'vehicle_types.VehSize',
       'vehicle_types.Length',
       'vehicle_types.Width',
       'vehicle_types.height',
       'vehicle_types.TotalWheels'
        )->get();
    }
    public function headings(): array
    {
        return [
            'Vehicle Model Name',
            'Capacity',
            'Body Type',
            'Vehicle Size',
            'Length',
            'Width',
            'Height',
            'Total Wheels'
        ];
    }

}