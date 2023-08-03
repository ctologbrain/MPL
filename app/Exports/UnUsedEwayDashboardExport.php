<?php
namespace App\Exports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Operation\DocketMaster;
use DB;
class UnUsedEwayDashboardExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct() {
      
     }
    public function collection()
    {
       return   $Invoice=DocketMaster::join("docket_invoice_details","docket_masters.id","docket_invoice_details.Docket_Id")
       //->leftjoin("docket_allocations","docket_masters.Docket_No","docket_allocations.Docket_No")
       ->leftjoin("customer_masters","customer_masters.id","docket_masters.Cust_Id")
       ->leftjoin("customer_addresses","customer_addresses.cust_id","customer_masters.id")
       ->leftjoin("pincode_masters","pincode_masters.id","docket_masters.Dest_Pin")
       ->leftjoin("cities","cities.id","pincode_masters.city")
       ->leftjoin("states","states.id","pincode_masters.state")
       ->select( DB::raw("DATE_FORMAT(docket_invoice_details.EWB_Date,'%d-%m-%Y') as ED"),
       "docket_invoice_details.EWB_No", \DB::raw("CONCAT(customer_masters.CustomerCode, '-', customer_masters.CustomerName) AS Cust"),
       "customer_addresses.City",
       "cities.CityName","states.name","pincode_masters.PinCode")
       ->get();
    }
    public function headings(): array
    {
        return [
            'eWaybill Date',
            'eWaybill No',
            'Customer Name',
            'Customer City',
            'Place Of Delivery',
            'State',
            'Pincode',
            'eWaybill Expiry Date'
        ];
    }

}