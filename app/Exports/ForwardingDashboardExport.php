<?php
namespace App\Exports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Operation\Forwarding;
use DB;
class ForwardingDashboardExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct() {
     
     }
    public function collection()
    {
       return Forwarding::leftjoin("vendor_masters","vendor_masters.id","=","forwarding.Forwarding_Vendor")
       ->leftjoin("docket_masters","docket_masters.Docket_No","=","forwarding.DocketNo")
       ->leftjoin("docket_allocations","docket_masters.Docket_No","=","docket_allocations.Docket_No")
       ->leftjoin('employees','employees.user_id','=','forwarding.CreatedBy')
       ->leftjoin('office_masters','employees.OfficeName','=','office_masters.id')
       ->leftjoin('docket_booking_types','docket_booking_types.id','=','docket_masters.Booking_Type')
       ->leftjoin('customer_masters','docket_masters.Cust_Id','=','customer_masters.id')
       ->leftjoin("pincode_masters as OrgPIN","OrgPIN.id","docket_masters.Origin_Pin")
       ->leftjoin("pincode_masters as DestPIN","DestPIN.id","docket_masters.Dest_Pin")
       ->leftjoin("cities as OrgCity","OrgCity.id","OrgPIN.city")
       ->leftjoin("cities as DestCity","DestCity.id","DestPIN.city")

       ->leftjoin("states as OrgState","OrgState.id","OrgPIN.State")
       ->leftjoin("states as DestState","DestState.id","DestPIN.State")
       ->leftjoin("docket_product_details","docket_product_details.Docket_Id","docket_masters.id")

       ->Select(  DB::raw("DATE_FORMAT(forwarding.Forwarding_Date,'%d-%m-%Y') as FD"),
       DB::raw("CONCAT(OrgState.name ) as stts"),
       DB::raw("CONCAT(OrgCity.Code, '~',OrgCity.CityName ) as City"),

       DB::raw("CONCAT(DestState.name ) as DESTstts"),
       DB::raw("CONCAT(DestCity.Code, '~',DestCity.CityName ) as DESTCity"),
       "forwarding.DocketNo",
       DB::raw("CONCAT(customer_masters.CustomerCode, '~',customer_masters.CustomerName ) as Cust"),
   
       DB::raw("CONCAT(vendor_masters.VendorCode, '~',vendor_masters.VendorName ) as VNdr"),
       "forwarding.ForwardingNo","docket_product_details.Qty","docket_product_details.Actual_Weight",
       "docket_product_details.Charged_Weight","docket_booking_types.BookingType",
      DB::raw("CONCAT(office_masters.OfficeCode, '~',office_masters.OfficeName ) as Offc"),
      DB::raw("DATEDIFF(NOW(),forwarding.Forwarding_Date) as dayss")
       )
       ->where("docket_allocations.Status","=",10)
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
            'Docket No.',
            'Client Name',
            'Vendor',
            'Forwarding Number',
            'Pieces',
            'Act. Wt.',
            'Chrg. Wt.',
            'Sale Type',
            'Branch',
            'Forwarding In Days'
        ];
    }

}