<?php
namespace App\Exports;
use App\Models\Operation\PickupScanAndDocket;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Models\Operation\DocketMaster;
use DB;
class DocketReport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct($offcie,$date,$DocketNo,$SaleType,$CustomerData,$ParentCustomerData,$originCityData,$DestCityData) {
        $this->offcie = $offcie;
        $this->date=$date;
        $this->DocketNo=$DocketNo;
        $this->SaleType=$SaleType;
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
        if($this->SaleType!=''){
            $query->where("docket_masters.Booking_Type",$this->SaleType);
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
       ->select('docket_masters.Booking_Date','docket_booking_types.BookingType','devilery_types.Title','devilery_types.Title','states.name','cities.CityName','pincode_masters.PinCode','DestState.name as Dstate','DestCity.CityName as DCity','DestPin.PinCode as DestPin',\DB::raw("CONCAT(zone_masters.ZoneName, '-', DestZone.ZoneName) AS Zone"),'docket_masters.Mode',\DB::raw("CONCAT(office_masters.OfficeCode, '-', office_masters.OfficeName) AS Office"),'docket_products.Title as ProjectTitel','docket_masters.Docket_No','docket_masters.Ref_No','docket_masters.PO_No','vendor_masters.VendorName','vehicle_masters.VehicleNo','vehicle_gatepasses.GP_Number','vehicle_trip_sheet_transactions.FPMNo','customer_masters.CustomerCategory','customer_masters.CRMExecutive','customer_masters.CRMExecutive','customer_masters.CustomerCode','customer_masters.CustomerName','consignor_masters.ConsignorName','consignees.ConsigneeName','docket_product_details.Qty','docket_product_details.Actual_Weight','docket_product_details.Charged_Weight')
       ->get();
       
      
    }
    public function headings(): array
    {
        return [
            'Date',
            'Sale Type',
            'Delivery Type',
            'Origin State',
            'Origin City',
            'Org. Pincode',
            'Dest. State',
            'Dest. City',
            'Dest. Pincode',
            'Zone',
            'Mode',
            'Office',
            'Product',
            'Docket No.',
            'Reference No',
            'PO Number',
            'Vendor Name',
            'Vehicle No.',
            'Gatepass No.',
            'FPM No.',
            'Client Category',
            'CS Person',
            'Client Code',
            'Client Name',
            'Consignor Name',
             'Pcs.',
            'Act. Wt.',
            'Chrg. Wt.',
            'Invoice No',
            'Invoice Date',
            'Goods Value',
            'eWayBill No',
            'EWB Date',
            'Contents',
            'Amount',
            'DOD Amount',
            'DACC',
            'Booked By',
            'Booked At',
            'Booking Remark',
            'Last Status',
            'Current Location',
            'RTO Status',
            'Offload Status',
            'NDR Reason',
            'Delivery Status',
            'Delivery Date',
            'EDD',
            'TAT Status',
            'DRS Date',
            'DRS Vehicle',
            'DRS Number',
            'Billing Status',
            'Category',
            'Scan Image Status',
          
        ];
    }

}