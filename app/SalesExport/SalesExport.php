<?php
namespace App\SalesExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\SalesReport\salesReport;
use DB;
class SalesExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct($keyword){
        $this->keyword=$keyword;
        $this->DocketNo = $DocketNo;
        $this->office = $office;
        $this->CustomerData = $CustomerData;
        $this->ParentCustomerData = $ParentCustomerData;
        $this->originCityData = $originCityData;
        $this->DestCityData = $DestCityData;
        $this->SaleType = $SaleType;
      
    }
    public function collection()
    {
       return salesReport::
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
       ->leftjoin('docket_invoice_details','docket_invoice_details.Docket_Id','=','docket_masters.id')
       ->leftjoin('employees as BookBy','BookBy.id','=','docket_masters.Booked_By')
       ->leftjoin('docket_allocations','docket_allocations.Docket_No','=','docket_masters.Docket_No')
       ->leftjoin('docket_statuses','docket_statuses.id','=','docket_allocations.Status')
       ->leftjoin('gate_pass_receivings','gate_pass_receivings.Gp_Id','=','vehicle_gatepasses.id')
       
       ->leftjoin('employees as CsP','CsP.id','=','customer_masters.CRMExecutive')
       ->select(
        'docket_masters.Docket_No',
        DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d') as BkngDate"),
        DB::raw("CONCAT(cities.Code ,'~',cities.CityName)"),
        'states.name',
        DB::raw("CONCAT(cities.Code ,'~',cities.CityName)"),
        'NameAsAccount', 
        DB::raw('(CASE WHEN AccountType=1 THEN "CURRENT" ELSE "SAVING" END) as types'),
        'AccountNo',
        DB::raw('(CASE WHEN Active=1 THEN "YES" ELSE "NO" END) as status')

        ->where(function($query) {
        if($DocketNo!=''){
            $query->where("docket_masters.Docket_No",$this->DocketNo);
        }
       })->where(function($query) {
        if($office!=''){
            $query->where("docket_masters.Office_ID",$this->office);
        }
       })
       ->where(function($query) {
        if($CustomerData!=''){
           $query->where("docket_masters.Cust_Id",$this->CustomerData);
        }
       })
       ->where(function($query) {
        if($ParentCustomerData!=''){
            $query->where("docket_masters.Cust_Id",$this->ParentCustomerData);
        }
       })
       ->where(function($query)  {
        if($originCityData!=''){
            $query->whereRelation("PincodeDetails","city","=",$this->originCityData);
        }
       })
       ->where(function($query)  {
        if($DestCityData!=''){
            $query->whereRelation("DestPincodeDetails","city","=",$this->DestCityData);
        }
       })
       ->where(function($query) {
        if($SaleType!=''){
            $query->where("Booking_Type","=",$this->SaleType);
        }
       })
       ->where(function($query) use($date){
        if(isset($date['formDate']) &&  isset($date['todate'])){
            $query->whereBetween(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),[$date['formDate'],$date['todate']]);
        }
       })
    
        )->get();
    }
    public function headings(): array
    {
        return [
            'Bank Code',
            'Bank Name',
            'Branch Name',
            'Branch Address',
            'Name As In Account',
            'Account Type',
            'Account No',
            'Is Active'
        ];
    }

}