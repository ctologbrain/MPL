<?php
namespace App\Exports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Operation\DocketMaster;
use DB;
class PendingReceivingDashboardExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct() {
      
     }
    public function collection()
    {
       return  DocketMaster::leftjoin("docket_allocations","docket_masters.Docket_No","docket_allocations.Docket_No")
       ->leftjoin("gate_pass_with_dockets","docket_masters.Docket_No","gate_pass_with_dockets.Docket")
       ->leftjoin("vehicle_gatepasses","vehicle_gatepasses.id","gate_pass_with_dockets.GatePassId")
       ->leftjoin("vehicle_masters","vehicle_masters.id","vehicle_gatepasses.vehicle_id")
       ->leftjoin("driver_masters","vehicle_gatepasses.DrvierId","driver_masters.id")
  
       ->leftjoin("office_masters","gate_pass_with_dockets.destinationOffice","office_masters.id")
          ->where("docket_allocations.Status","=",5)
          ->Select(DB::raw("DATE_FORMAT(vehicle_gatepasses.GP_TIME,'%d-%m-%Y') as GT"),
          DB::raw("CONCAT(office_masters.OfficeCode,'~', office_masters.OfficeName) as DEST"),
          "vehicle_gatepasses.GP_Number",  "docket_masters.Docket_No", "vehicle_masters.VehicleNo",
          "driver_masters.DriverName")
       ->get();
    }
    public function headings(): array
    {
        return [
            'GP Date',
            'Destination  Office',
            'Gatepass Number',
            'Docket Number',
            'Vehicle No',
            'Driver Name',
            'Consolidated EWB'
        ];
    }

}