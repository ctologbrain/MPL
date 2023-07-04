<?php
namespace App\Exports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Operation\DocketCase;
use DB;
class UrgantDeliveryDashboardExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct() {
      
     }
    public function collection()
    {
       return   DocketCase::leftjoin("docket_masters","docket_masters.Docket_No","=","Docket_Case.Docket_Number")
       ->leftjoin('pincode_masters','pincode_masters.id','=','docket_masters.Origin_Pin')
      ->leftjoin('cities','cities.id','=','pincode_masters.city')
      ->leftjoin('pincode_masters as DestPin','DestPin.id','=','docket_masters.Dest_Pin')
      ->leftjoin('cities as DestCity','DestCity.id','=','DestPin.city')
      ->leftjoin('customer_masters','customer_masters.id','=','docket_masters.Cust_Id')
      ->leftjoin('gate_pass_with_dockets','gate_pass_with_dockets.Docket','=','docket_masters.Docket_No')
      ->leftjoin('vehicle_gatepasses','vehicle_gatepasses.id','=','gate_pass_with_dockets.GatePassId')
      ->leftjoin('vehicle_masters','vehicle_masters.id','=','vehicle_gatepasses.vehicle_id')
      ->leftjoin('docket_allocations','docket_allocations.Docket_No','=','docket_masters.Docket_No')
      ->leftjoin('docket_statuses','docket_statuses.id','=','docket_allocations.Status')
      ->leftjoin('employees','employees.user_id','=','docket_allocations.Updated_By')
      ->leftjoin('office_masters','office_masters.id','=','employees.OfficeName')
      ->select(
       DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%d-%m-%Y') as BD"),
       'cities.Code', 'DestCity.Code as DCity','vehicle_masters.VehicleNo',
       'vehicle_gatepasses.GP_Number','docket_masters.Docket_No', DB::raw('CONCAT(customer_masters.CustomerCode, "~",customer_masters.CustomerName) as cust') ,
       DB::raw("DATE_FORMAT(docket_allocations.BookDate, '%d-%m-%Y') as allocDate"), "docket_statuses.title","office_masters.OfficeName","Docket_Case.Remark as CRemark")
       ->where("docket_allocations.Status","!=",8)
       ->get();
    }
    public function headings(): array
    {
        return [
            'Date',
            'Origin',
            'Dest. ',
            'Vehicle No.',
            'Gatepass No.',
            'Docket No.',
            'Client Name',
            'Activity Date',
            'Activity',
            'Current Office',
            'Remarks',
        ];
    }

}