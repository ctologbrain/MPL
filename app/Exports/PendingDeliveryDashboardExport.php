<?php
namespace App\Exports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Operation\DocketMaster;
use DB;
class PendingDeliveryDashboardExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct() {
      
     }
    public function collection()
    {
       return  DocketMaster::leftjoin('docket_booking_types','docket_booking_types.id','=','docket_masters.Booking_Type')
       ->leftjoin('office_masters','office_masters.id','=','docket_masters.Office_ID')
       ->leftjoin('devilery_types','devilery_types.id','=','docket_masters.Delivery_Type')
       ->leftjoin('pincode_masters','pincode_masters.id','=','docket_masters.Origin_Pin')
       ->leftjoin('cities','cities.id','=','pincode_masters.city')
       ->leftjoin('states','states.id','=','cities.stateId')
       ->leftjoin('zone_masters','zone_masters.id','=','cities.ZoneName')
       ->leftjoin('pincode_masters as DestPin','DestPin.id','=','docket_masters.Dest_Pin')
       ->leftjoin('cities as DestCity','DestCity.id','=','DestPin.city')
       ->leftjoin('states as DestState','DestState.id','=','DestCity.stateId')
       ->leftjoin('zone_masters as DestZone','DestZone.id','=','DestCity.ZoneName')
       ->leftjoin('docket_product_details','docket_product_details.Docket_Id','=','docket_masters.id')
       ->leftjoin('docket_products','docket_products.id','=','docket_product_details.D_Product')
       ->leftjoin('gate_pass_with_dockets','gate_pass_with_dockets.Docket','=','docket_masters.Docket_No')
       ->leftjoin('vehicle_gatepasses','vehicle_gatepasses.id','=','gate_pass_with_dockets.GatePassId')
       ->leftjoin('vendor_masters','vendor_masters.id','=','vehicle_gatepasses.Vendor_ID')
       ->leftjoin('vehicle_masters','vehicle_masters.id','=','vehicle_gatepasses.vehicle_id')
       ->leftjoin('vehicle_trip_sheet_transactions','vehicle_trip_sheet_transactions.id','=','vehicle_gatepasses.Fpm_Number')
       ->leftjoin('customer_masters','customer_masters.id','=','docket_masters.Cust_Id')
       ->leftjoin('consignees','consignees.id','=','docket_masters.Consigner_Id')
       ->leftjoin('consignor_masters','consignor_masters.id','=','docket_masters.Consignee_Id')
       ->leftjoin('docket_invoice_details','docket_invoice_details.Docket_Id','=','docket_masters.id')
       ->leftjoin('employees as BookBy','BookBy.id','=','docket_masters.Booked_By')
       ->leftjoin('docket_allocations','docket_allocations.Docket_No','=','docket_masters.Docket_No')
       ->leftjoin('docket_statuses','docket_statuses.id','=','docket_allocations.Status')
       ->leftjoin('gate_pass_receivings','gate_pass_receivings.Gp_Id','=','vehicle_gatepasses.id')
       ->leftjoin('NDR_Trans','NDR_Trans.Docket_No','=','docket_masters.Docket_No')
       ->leftjoin('ndr_masters','ndr_masters.ReasonDetail','=','NDR_Trans.NDR_Reason')
       ->where("docket_allocations.Status","!=",8)
        ->select(DB::raw("DATE_FORMAT(docket_masters.Booking_Date,'%d-%m-%Y') as BD"),'docket_masters.Docket_No',
          \DB::raw("CONCAT(customer_masters.CustomerCode, '-', customer_masters.CustomerName) AS Cust"),
          'states.name','cities.CityName',
          'DestState.name as Dstate','DestCity.CityName as DCity',  'devilery_types.Title',
          'ndr_masters.ReasonDetail',
         'consignor_masters.ConsignorName',  'consignees.ConsigneeName',
         'docket_product_details.Qty','docket_product_details.Actual_Weight','docket_product_details.Charged_Weight',
         DB::raw("DATE_FORMAT(vehicle_gatepasses.GP_TIME,'%d-%m-%Y') as GT"),
         DB::raw('DATE_FORMAT(gate_pass_receivings.Rcv_Date,"%d-%m-%Y") as ArivlTime'),
         'docket_statuses.title as DocketStatus', DB::raw("DATE_FORMAT(docket_allocations.BookDate,'%d-%m-%Y') as BD") )
       ->get();
    }
    public function headings(): array
    {
        return [
            'Date',
            'Docket No.',
            'Client Name',
            'Origin State',
            'Origin City',
            'Dest. State',
            'Dest. City',
            'Delivery Type',
            'NDR Reason',
            'Consignor Name',
            'Consignee Name',
            'Pcs.',
            'Act. Wt.',
            'Chrg. Wt.',
            'Vehicle Dispatch Date',
            'Vehicle Arrival Date',
            //'TAT',
            'Current Status',
            'Status Date'
        ];
    }

}