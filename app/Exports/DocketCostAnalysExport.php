<?php
namespace App\Exports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Models\Operation\DocketMaster;
use App\Models\Operation\VehicleTripSheetTransaction;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use  App\Models\Vendor\VehicleMaster;
use DB;
class DocketCostAnalysExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct($office,$date) {
        $this->office         = $office;
        $this->date = $date;
       
    }
        

    public function collection()
    {
       return  $DsrData=   VehicleMaster::leftjoin('vehicle_types','vehicle_types.id','=','vehicle_masters.VehicleModel')
       ->leftjoin('vehicle_gatepasses','vehicle_gatepasses.vehicle_id','=','vehicle_masters.id')
       ->leftjoin('gate_pass_with_dockets','vehicle_gatepasses.id','=','gate_pass_with_dockets.GatePassId')
       ->leftjoin('docket_masters','docket_masters.Docket_No','gate_pass_with_dockets.Docket')

       ->leftjoin('docket_product_details','docket_product_details.Docket_Id','docket_masters.id')

       ->leftjoin('vendor_masters','vendor_masters.id','=','vehicle_masters.VendorName')
       ->leftjoin('route_masters','route_masters.id','=','vehicle_gatepasses.Route_ID')

       ->leftjoin('DRS_Masters','vehicle_masters.id','=','DRS_Masters.Vehicle_No')
       ->leftjoin('employees','employees.id','DRS_Masters.D_Boy')

       ->leftjoin('drs_delivery_transactions', function($query){
           $query->on('docket_masters.Docket_No','=','drs_delivery_transactions.Docket');
           $query->where("drs_delivery_transactions.Type","=","DELIVERED");
       })
       ->leftjoin('drs_deliveries','drs_delivery_transactions.Drs_id','=','drs_deliveries.id')
       ->leftjoin('Regular_Deliveries','Regular_Deliveries.Docket_ID','=','docket_masters.Docket_No')
       // ->where(function($query) use($office){
       //     if($office!=''){
       //         $query->where("docket_masters.Office_ID",$office);
       //     }
       //    })
        ->where(function($query) {
           if(isset($this->date['formDate']) &&  isset($this->date['todate'])){
               $query->whereBetween(DB::raw("DATE_FORMAT(vehicle_gatepasses.GP_TIME,'%Y-%m-%d')"),[$this->date['formDate'],$this->date['todate']]);
              
           }
        })
       ->select(DB::raw("DATE_FORMAT(vehicle_gatepasses.GP_TIME ,'%d-%m-%Y') as date"),"vehicle_masters.VehicleNo"
       ,\DB::raw("CONCAT(vendor_masters.VendorCode, '~',vendor_masters.VendorName )"),
       "vehicle_types.VehSize",  "vehicle_types.Capacity", \DB::raw("DATE_FORMAT(vehicle_gatepasses.GP_TIME,'%d-%m-%Y') as GPTIME"),
       \DB::raw('COUNT(DISTINCT docket_masters.Docket_No) as TotDocket'), \DB::raw('(COUNT(DISTINCT Regular_Deliveries.Docket_ID) + COUNT(DISTINCT drs_delivery_transactions.Docket)) as TotRegulerDelivered'),
       \DB::raw('(((COUNT(DISTINCT Regular_Deliveries.Docket_ID)+COUNT(DISTINCT drs_delivery_transactions.Docket)) / COUNT(DISTINCT docket_masters.Docket_No) )*100 ) as percentage'),
       DB::raw('SUM(drs_delivery_transactions.Weight) as TotWeight'), 
        \DB::raw("CONCAT(employees.EmployeeCode, '~',employees.EmployeeName )"),
        "vehicle_masters.ReportingTime",
        "vehicle_masters.MonthRent",  \DB::raw('(vehicle_masters.MonthRent/30) as Daily'),
       "DRS_Masters.OpenKm","employees.EmployeeName",
       "employees.EmployeeCode"
       )
         ->groupBy('vehicle_masters.id')
        ->orderBy('vehicle_masters.id','DESC')
        ->get();
       //
    }

    public function headings(): array
    {
        return [
            'Date',
            'Vehicle No.',
            'Vendor Name',
            'Size Of Vehicle',
            'Capacity Of Vehicle',
            
            'Actual Time Of Vehicle Departure',
            'No Of Docket',
            'No Of Docket Delivered',
            '% Of Delivery Done',
            'Total Weight Of The Delivery',
            'Delivery Boy',
            'Arrival Of The Vehicle At Hub',
            'Monthly Rent Of The Vehicle',
            'Daily Rent Of The Vehicle',
            'Opening KM',
            'Total Km Done Daily',
            'GPS ID',
            'Remark',
          
         ];
    }
}