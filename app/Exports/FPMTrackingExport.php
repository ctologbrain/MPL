<?php
namespace App\Exports;
use App\Models\Operation\PickupScanAndDocket;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Operation\DocketMaster;
use App\Models\Operation\VehicleTripSheetTransaction;
use App\Models\Operation\VehicleGatepass;
use DB;
class FPMTrackingExport implements FromCollection, WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct($fpmId) {
        $this->fpmId = $fpmId;
     
        
 }
    public function collection()
    {
        return  VehicleGatepass::
        leftjoin('route_masters','route_masters.id','=','vehicle_gatepasses.Route_ID')
       ->leftJoin('cities as ScourceCity', 'ScourceCity.id', '=', 'route_masters.Source')
       ->leftJoin('cities as DestCity', 'DestCity.id', '=', 'route_masters.Destination')
       ->leftJoin('vendor_masters', 'vendor_masters.id', '=', 'vehicle_gatepasses.Vendor_ID')
       ->leftJoin('vehicle_types', 'vehicle_types.id', '=', 'vehicle_gatepasses.Vehicle_Model')
      
        ->leftJoin('vehicle_masters', 'vehicle_masters.id', '=', 'vehicle_gatepasses.vehicle_id')
       ->leftJoin('gate_pass_with_dockets', 'gate_pass_with_dockets.GatePassId', '=', 'vehicle_gatepasses.id')
       ->where('vehicle_gatepasses.Fpm_Number','=',$this->fpmId)

       ->select('vehicle_gatepasses.GP_Number', DB::raw("DATE_FORMAT(vehicle_gatepasses.GP_TIME, '%d-%m-%Y')") ,'ScourceCity.CityName as SourceCity','DestCity.CityName as DestCity'
       ,'vendor_masters.VendorName','vehicle_types.VehicleType','vehicle_masters.VehicleNo')
    //    ->groupBy("vehicle_trip_sheet_transactions.FPMNo")
       ->get();
        
    }
    public function headings(): array
    {
        return [
            'GP Number',
            'GP Date',
            'Origin City',
            'Destination City',
            'Vendor Name',
            'Vehicle Model',
            'Vehicle No'
         ];
    }

}