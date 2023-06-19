<?php
namespace App\Exports;
use App\Models\Operation\PickupScanAndDocket;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Models\Operation\DocketMaster;
use App\Models\Operation\VehicleTripSheetTransaction;
use DB;
class FpmReport implements FromCollection, WithHeadings
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
        return VehicleTripSheetTransaction::
        leftjoin('trip_types','trip_types.id','=','vehicle_trip_sheet_transactions.Trip_Type')
        ->leftjoin('route_masters','route_masters.id','=','vehicle_trip_sheet_transactions.Route_Id')
       ->leftJoin('cities as ScourceCity', 'ScourceCity.id', '=', 'route_masters.Source')
       ->leftJoin('cities as DestCity', 'DestCity.id', '=', 'route_masters.Destination')
       ->leftJoin('vendor_masters', 'vendor_masters.id', '=', 'vehicle_trip_sheet_transactions.Vehicle_Provider')
       ->leftJoin('vehicle_types', 'vehicle_types.id', '=', 'vehicle_trip_sheet_transactions.Vehicle_Model')
       ->leftJoin('driver_masters', 'driver_masters.id', '=', 'vehicle_trip_sheet_transactions.Driver_Id')
        ->leftJoin('vehicle_masters', 'vehicle_masters.id', '=', 'vehicle_trip_sheet_transactions.Vehicle_No')
        ->leftJoin('users', 'users.id', '=', 'vehicle_trip_sheet_transactions.CreatedBy')
        ->leftJoin('vehicle_gatepasses', 'vehicle_gatepasses.Fpm_Number', '=', 'vehicle_trip_sheet_transactions.id') 
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
       ->select(DB::raw("DATE_FORMAT(vehicle_trip_sheet_transactions.Fpm_Date, '%d-%m-%Y')"),'trip_types.TripType','vehicle_trip_sheet_transactions.FPMNo','ScourceCity.CityName as SourceCity','DestCity.CityName as DestCity','vendor_masters.VendorName','vehicle_trip_sheet_transactions.Weight','vehicle_masters.VehicleNo','driver_masters.DriverName','vehicle_trip_sheet_transactions.Reporting_Time','users.name',DB::raw('COUNT(gate_pass_with_dockets.Docket ) as DocketTotal'),DB::raw('SUM(gate_pass_with_dockets.weight ) as DocketTotalWidth'),'vehicle_trip_sheet_transactions.VehicleTarrif','vehicle_trip_sheet_transactions.AdvToBePaid','vehicle_trip_sheet_transactions.PaymentMode','vehicle_trip_sheet_transactions.AdvType',DB::raw("DATE_FORMAT(vehicle_trip_sheet_transactions.vehcile_Load_Date, '%d-%m-%Y')"),'vehicle_trip_sheet_transactions.Remark')
       ->groupBy("vehicle_trip_sheet_transactions.FPMNo")
       ->get();
    
      
    }
    public function headings(): array
    {
        return [
            'FPM Date',
            'Trip Type',
            'FPM Number',
            'Origin',
            'Destination',
            'Transporter Name',
            'Capacity',
            'Vehicle No',
            'Driver Name-Number',
            'Reporting Date',
            'Total Docket',
            'Total Box',
            'Total Box Charge',
            'Vehicle Trip Tariff',
            'Adv to be paid',
            'Payment Mode',
            'Adv Type',
            'Dispatch Date',
            'Remarks',
         ];
    }

}