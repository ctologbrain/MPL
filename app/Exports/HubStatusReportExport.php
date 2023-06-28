<?php
namespace App\Exports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Operation\DocketMaster;
use DB;
class HubStatusReportExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct($offcie,$date) {
        $this->offcie = $offcie;
        $this->date=$date;
       
        
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
       ->leftjoin('UploadDocketImage','UploadDocketImage.DocketNo','=','docket_masters.Docket_No')
       
       ->leftjoin('Regular_Deliveries','Regular_Deliveries.Docket_ID','=','docket_masters.Docket_No')
        ->leftjoin('office_masters as RegDestOff','RegDestOff.id','=','Regular_Deliveries.Dest_Office_Id')

       ->leftjoin('drs_delivery_transactions','drs_delivery_transactions.Docket','=','docket_masters.Docket_No')
       ->leftjoin('drs_deliveries','drs_deliveries.id','=','drs_delivery_transactions.Drs_id')
       ->leftjoin('employees as DRSEMP','DRSEMP.user_id','=','drs_delivery_transactions.CreatedBy')
       ->leftjoin('office_masters as DRSDELOFF','DRSEMP.OfficeName','=','DRSDELOFF.id')

       ->leftjoin('employees as CurrentlocEmp','CurrentlocEmp.user_id','=','docket_allocations.Updated_By')
       ->leftjoin('office_masters as ActivityOff','CurrentlocEmp.OfficeName','=','ActivityOff.id')
        ->leftjoin('route_masters','route_masters.id','vehicle_gatepasses.Route_ID')

    ->where(function($query){
        if($this->offcie!=''){
            $query->where("docket_masters.Office_ID",$this->offcie);
        }
       })
       ->where(function($query){
        if(isset($this->date['formDate']) &&  isset($this->date['todate'])){
            $query->whereBetween(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),[$this->date['formDate'],$this->date['todate']]);
        }
       })
       ->select('docket_statuses.title as DocketStatus', 'docket_masters.Docket_No', 'ActivityOff.OfficeName',
       DB::raw('(CASE WHEN docket_allocations.BookDate IS NOT NULL THEN docket_allocations.BookDate END) as BkDate'),
       DB::raw("(CASE WHEN Regular_Deliveries.Delivery_date!='' THEN Regular_Deliveries.Delivery_date  WHEN drs_delivery_transactions.Time!='' THEN drs_delivery_transactions.Time END )"),
       DB::raw('(CASE WHEN RegDestOff.OfficeName!="" THEN RegDestOff.OfficeName ELSE DRSDELOFF.OfficeName END )'),
       \DB::raw("docket_masters.Booking_Date as BookDtt")
       ,'devilery_types.Title','devilery_types.Title','states.name','cities.CityName',
       'pincode_masters.PinCode','DestState.name as Dstate','DestCity.CityName as DCity','DestPin.PinCode as DestPin',\DB::raw("CONCAT(zone_masters.ZoneName, '-', DestZone.ZoneName) AS Zone"),
       'docket_masters.Mode'  ,'customer_masters.CustomerCode','customer_masters.CustomerName',
       \DB::raw("CONCAT(office_masters.OfficeCode, '-', office_masters.OfficeName) AS Office"),
       'docket_products.Title as ProjectTitel',
       'consignor_masters.ConsignorName','docket_product_details.Qty','docket_product_details.Actual_Weight',
       'docket_product_details.Charged_Weight', 'BookBy.EmployeeName','docket_masters.Booked_At',
      // \DB::raw("DATE_FORMAT(docket_masters.Booking_Date + INTERVAL (CASE WHEN route_masters.TransitDays!='' THEN route_masters.TransitDays ELSE 0 END)  DAY,'%d-%m-%Y')  as EDd"),
        'docket_booking_types.BookingType',
        \DB::raw('(CASE WHEN UploadDocketImage.file IS NULL THEN "NO" ELSE "YES" END )'),
        \DB::raw('gate_pass_receivings.Rcv_Date as ArivlTime'))
       ->get();
       
      
    }
    public function headings(): array
    {
        return [
            'Activity Date',
            'Docket No.',
            'Last Activity',
            'Activity Office',
            'Delivery Date',
            'Delivery Office',
            'Book Date',
            'Delivery Type',
            'Origin State',
            'Origin City',
            'Org. Pincode',
            'Dest. State',
            'Dest. City',
            'Dest. Pincode',
            'Zone',
            'Mode',
            'Client Code',
            'Client Name',
            'Office',
            'Product',
            'Consignee Name',
            'Consignor Name',
             'Pcs.',
            'Act. Wt.',
            'Chrg. Wt.',
            'Booked By',
            'Booked At',
           // 'EDD',
            'SALE TYPE',
            'Scan Image Status',
            'Vehicle Arrivel Date',
            'TAT STATUS'
        ];
    }

}