<?php
namespace App\Exports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Operation\DocketMaster;
use DB;
class CustomersDocketExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct($offcie,$date,$DocketNo,$CustomerData,$ParentCustomerData,$originCityData,$DestCityData) {
        $this->offcie = $offcie;
        $this->date=$date;
        $this->DocketNo=$DocketNo;
       
        $this->CustomerData=$CustomerData;
        $this->ParentCustomerData=$ParentCustomerData;
        $this->originCityData=$originCityData;
        $this->DestCityData=$DestCityData;
        
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
        ->leftjoin('docket_invoice_details','docket_invoice_details.Docket_Id','=','docket_masters.id')
        ->where(function($query) {
            if($this->DocketNo!=''){
                $query->where("docket_masters.Docket_No",$this->DocketNo);
            }
           })->where(function($query){
            if($this->offcie!=''){
                $query->where("docket_masters.Office_ID",$this->offcie);
            }
           })
           
           ->where(function($query){
            if($this->CustomerData!=''){
               $query->where("docket_masters.Cust_Id",$this->CustomerData);
            }
           })
           ->where(function($query){
            if($this->ParentCustomerData!=''){
                $query->where("docket_masters.Cust_Id",$this->ParentCustomerData);
            }
           })
           ->where(function($query){
            if($this->originCityData!=''){
                $query->whereRelation("PincodeDetails","city","=",$this->originCityData);
            }
           })
           ->where(function($query){
            if($this->DestCityData!=''){
                $query->whereRelation("DestPincodeDetails","city","=",$this->DestCityData);
            }
           })
       ->where(function($query){
        if(isset($this->date['formDate']) &&  isset($this->date['todate'])){
            $query->whereBetween(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),[$this->date['formDate'],$this->date['todate']]);
        }
       })

        ->select( 'docket_masters.Docket_No',DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%d-%m-%Y') as BDate"),
        'states.name','cities.CityName','pincode_masters.PinCode','DestState.name as Dstate',
        'DestCity.CityName as DCity','DestPin.PinCode as DestPin',\DB::raw("CONCAT(zone_masters.ZoneName, '-', DestZone.ZoneName) AS Zone"),
          'customer_masters.CustomerCode',  'customer_masters.CustomerName', \DB::raw("CONCAT(office_masters.OfficeCode, '-', office_masters.OfficeName) AS Office"),
        'docket_masters.Ref_No','docket_masters.PO_No',  'consignor_masters.ConsignorName','consignees.ConsigneeName',
        'docket_product_details.Qty','docket_product_details.Actual_Weight','docket_product_details.Charged_Weight', 
        DB::raw("GROUP_CONCAT(docket_invoice_details.Invoice_No SEPARATOR ' , ') as `DocketInvoice`"),
        DB::raw("GROUP_CONCAT(docket_invoice_details.Invoice_Date SEPARATOR ' , ') as `InvDate`"),
        'BookBy.EmployeeName','docket_masters.Booked_At',
        \DB::raw("DATE_FORMAT(docket_masters.Booking_Date + INTERVAL (CASE WHEN route_masters.TransitDays!='' THEN route_masters.TransitDays ELSE 0 END)  DAY,'%d-%m-%Y')  as EDd"),
        
        DB::raw('(CASE WHEN Regular_Deliveries.Delivery_date IS NOT NULL THEN "YES" WHEN drs_delivery_transactions.Time IS NOT NULL THEN "YES" ELSE "NO" END ) as Available'), 
         DB::raw("(CASE WHEN Regular_Deliveries.Delivery_date IS NOT NULL THEN DATE_FORMAT(Regular_Deliveries.Delivery_date,'%d-%m-%Y')  WHEN drs_delivery_transactions.Time IS NOT NULL THEN DATE_FORMAT(drs_delivery_transactions.Time,'%d-%m-%Y') END )"),
        'docket_booking_types.BookingType',
        \DB::raw('(CASE WHEN UploadDocketImage.file IS NULL THEN "NO" ELSE "YES" END ) as IMG'))
        ->groupBy('docket_masters.Docket_No')
       ->get();
       
      
    }
    public function headings(): array
    {
        return [
            
            'Docket No.',
            'Booking Date',
            'Origin State',
            'Origin City',
            'Org. Pincode',
            'Dest. State',
            'Dest. City',
            'Dest. Pincode',
            'Zone',
            'Client Code',
            'Client Name',
            'Office',
            'Reference No',
            'PO Number',
            'Consignee Name',
            'Consignor Name',
             'Pcs.',
            'Act. Wt.',
            'Chrg. Wt.',
            'Invoice. No.',
            'Invoice  Date',
            'Booked By',
            'Booked At',
            'Dalivery Status',
            'Dalivery Date',
            'EDD',
            'Sale Type',
            'Scan Image Status	'
        ];
    }

}