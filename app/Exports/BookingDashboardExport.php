<?php
namespace App\Exports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Operation\DocketMaster;
use DB;
class BookingDashboardExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct() {
     }
    public function collection()
    {
       return DocketMaster::
       leftjoin('docket_booking_types','docket_booking_types.id','=','docket_masters.Booking_Type')
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
    
       ->leftjoin('employees as BookBy','BookBy.id','=','docket_masters.Booked_By')
       ->leftjoin('docket_allocations','docket_allocations.Docket_No','=','docket_masters.Docket_No')
       ->leftjoin('docket_statuses','docket_statuses.id','=','docket_allocations.Status')
       ->leftjoin('gate_pass_receivings','gate_pass_receivings.Gp_Id','=','vehicle_gatepasses.id')
       ->select(
        DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),
        'states.name','cities.CityName', 'DestState.name as Dstate','DestCity.CityName as DCity','vehicle_masters.VehicleNo',
        'vehicle_gatepasses.GP_Number','docket_masters.Docket_No', DB::raw('CONCAT(customer_masters.CustomerCode, "~",customer_masters.CustomerName) as cust'),
        'docket_product_details.Qty','docket_product_details.Actual_Weight',
        'docket_product_details.Charged_Weight',    'docket_booking_types.BookingType',
        \DB::raw("CONCAT(office_masters.OfficeCode, '-', office_masters.OfficeName) AS Office"))
       ->get();
    }
    public function headings(): array
    {
        return [
            'Date',
            'Origin State',
            'Origin City',
            'Dest. State',
            'Dest. City',
            'Vehicle No.',
            'Gatepass No.',
            'Docket No.',
            'Client Name',
            'Pcs.',
            'Act. Wt.',
            'Chrg. Wt.',
            'Sale Type',
            'Branch'
        ];
    }

}