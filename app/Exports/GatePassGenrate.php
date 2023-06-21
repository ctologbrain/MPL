<?php
namespace App\Exports;
use App\Models\Operation\PickupScanAndDocket;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Models\Operation\DocketMaster;
use App\Models\Operation\VehicleTripSheetTransaction;
use App\Models\Operation\VehicleGatepass;
use DB;
class GatePassGenrate implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct($vendor,$date,$origin,$dest) {
        $this->vendor = $vendor;
        $this->date=$date;
        $this->origin=$origin;
        $this->dest=$dest;
        
        
 }
    public function collection()
    {
        return  VehicleGatepass::
        leftjoin('vehicle_trip_sheet_transactions','vehicle_trip_sheet_transactions.id','=','vehicle_gatepasses.id')
        ->leftjoin('trip_types','trip_types.id','=','vehicle_trip_sheet_transactions.Trip_Type')
        ->leftjoin('route_masters','route_masters.id','=','vehicle_trip_sheet_transactions.Route_Id')
       ->leftJoin('cities as ScourceCity', 'ScourceCity.id', '=', 'route_masters.Source')
       ->leftJoin('cities as DestCity', 'DestCity.id', '=', 'route_masters.Destination')
       ->leftJoin('vendor_masters', 'vendor_masters.id', '=', 'vehicle_trip_sheet_transactions.Vehicle_Provider')
       ->leftJoin('vehicle_types', 'vehicle_types.id', '=', 'vehicle_trip_sheet_transactions.Vehicle_Model')
       ->leftJoin('driver_masters', 'driver_masters.id', '=', 'vehicle_trip_sheet_transactions.Driver_Id')
        ->leftJoin('vehicle_masters', 'vehicle_masters.id', '=', 'vehicle_trip_sheet_transactions.Vehicle_No')
     ->leftJoin('users', 'users.id', '=', 'vehicle_trip_sheet_transactions.CreatedBy')
       ->leftJoin('gate_pass_with_dockets', 'gate_pass_with_dockets.GatePassId', '=', 'vehicle_gatepasses.id')
       ->where(function($query){
        if(isset($this->date['formDate']) &&  isset($this->date['todate'])){
           $query->whereBetween(DB::raw("DATE_FORMAT(vehicle_trip_sheet_transactions.Fpm_Date, '%Y-%m-%d')"), [$date['from'],$date['to']]);
           }
       })
       ->where(function($query){
        if(isset($this->dest) && $this->dest !=''){
           $query->where('route_masters.Destination','=',$dest);
           }
       })
       ->where(function($query){
        if(isset($this->origin) && $this->origin !=''){
           $query->where('route_masters.Source','=',$origin);
           }
       })
       ->where(function($query){
        if(isset($this->origin) && $this->origin !=''){
           $query->where('vehicle_trip_sheet_transactions.Vehicle_Provider','=',$vendor);
           }
       })
       ->select(DB::raw("DATE_FORMAT(vehicle_gatepasses.GP_TIME, '%d-%m-%Y')"),'vehicle_gatepasses.GP_Number','vehicle_trip_sheet_transactions.FPMNo',DB::raw("DATE_FORMAT(vehicle_trip_sheet_transactions.Fpm_Date, '%d-%m-%Y')"),'vendor_masters.VendorName','vehicle_types.VehicleType','vehicle_trip_sheet_transactions.Weight','vehicle_masters.VehicleNo','vehicle_gatepasses.Supervisor','driver_masters.DriverName','driver_masters.Phone','vehicle_gatepasses.Seal','ScourceCity.CityName as SourceCity','DestCity.CityName as DestCity','vehicle_gatepasses.Start_Km',DB::raw('COUNT(gate_pass_with_dockets.Docket ) as DocketTotal'),DB::raw('SUM(gate_pass_with_dockets.weight ) as DocketTotalWidth'))
       ->groupBy("vehicle_trip_sheet_transactions.FPMNo")
       ->get();
        
    }
    public function headings(): array
    {
        return [
            'GP Date',
            'GP Number',
            'FPM No.',
            'FPM Date',
            'Vendor Name',
            'Vehicle Model',
            'Capacity',
            'Vehicle No',
            'Supervisor Name',
            'Driver Name',
            'Contact No',
            'Seal No',
            'Origin',
            'Destination',
            'Dist.(Km)',
            'Total Dockets',
            'Actual Wt',
          
         ];
    }

}