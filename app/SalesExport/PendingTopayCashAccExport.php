<?php
namespace App\SalesExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Operation\DocketMaster;
use DB;
class PendingTopayCashAccExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct($keyword){
        $this->keyword=$keyword;
    }
    public function collection()
    {
       return DocketMaster::leftjoin('tariff_types','tariff_types.Docket_Id','=','docket_masters.id')
       ->leftjoin('Docket_Collection_Trans','Docket_Collection_Trans.Docket_Id','=','docket_masters.id')
       ->leftjoin('customer_masters','docket_masters.Cust_Id','=','customer_masters.id')
       ->leftjoin('office_masters as MainOff','MainOff.id','=','docket_masters.Office_ID')
       ->leftjoin('consignees','consignees.id','=','docket_masters.Consignee_Id')
       ->leftjoin('docket_allocations','docket_allocations.Docket_No','=','docket_masters.Docket_No')
       ->leftjoin('docket_statuses','docket_allocations.Status','=','docket_statuses.id')
       ->leftJoin('pincode_masters as ScourcePinCode', 'ScourcePinCode.id', '=', 'docket_masters.Origin_Pin')
       ->leftJoin('pincode_masters as DestPinCode', 'DestPinCode.id', '=', 'docket_masters.Dest_Pin')
       ->leftJoin('cities as ScourceCity', 'ScourceCity.id', '=', 'ScourcePinCode.city')
       ->leftJoin('cities as DestCity', 'DestCity.id', '=', 'DestPinCode.city')
       ->leftjoin('docket_product_details','docket_masters.id','docket_product_details.Docket_Id')

       ->leftjoin("drs_delivery_transactions","drs_delivery_transactions.Docket","docket_masters.Docket_No")  
       ->leftjoin("drs_deliveries","drs_deliveries.id","drs_delivery_transactions.Drs_id")  
       ->leftjoin('employees as DelvEMP','DelvEMP.user_id','drs_delivery_transactions.CreatedBy')
       ->leftjoin("office_masters as DRSOffice","DRSOffice.id","DelvEMP.OfficeName")

       ->leftjoin("Regular_Deliveries","Regular_Deliveries.Docket_ID","docket_masters.Docket_No")  
       ->leftjoin("office_masters as DelvOff","DelvOff.id","Regular_Deliveries.Dest_Office_Id")
       ->leftjoin("docket_booking_types","docket_booking_types.id","docket_masters.Booking_Type")

       ->leftjoin('Docket_Deposit_Trans','Docket_Deposit_Trans.Docket_Id','=','docket_masters.id')
       ->leftjoin('bank_masters','Docket_Collection_Trans.Bank','=','bank_masters.id')
       
       ->Select("MainOff.OfficeName as OfficeName", "docket_booking_types.BookingType", 
       DB::raw("DATE_FORMAT(docket_masters.Booking_Date,'%d-%m-%Y') as BookingDatte"),
       'ScourceCity.CityName as SourceCity','DestCity.CityName as DestCity', "docket_masters.Docket_No",
       "customer_masters.CustomerName",
       "docket_product_details.Qty","docket_product_details.Actual_Weight","docket_product_details.Charged_Weight",
       "tariff_types.TotalAmount",
       DB::raw("(CASE WHEN DelvOff.OfficeName IS NOT NULL  THEN  DelvOff.OfficeName ELSE DRSOffice.OfficeName  END ) as DelBranch"),
       "Docket_Deposit_Trans.RefNo", "docket_statuses.title","docket_allocations.BookDate",
       DB::raw("(CASE WHEN Regular_Deliveries.Delivery_date IS NOT NULL THEN DATE_FORMAT(Regular_Deliveries.Delivery_date,'%d-%m-%Y')  WHEN drs_delivery_transactions.Time IS NOT NULL THEN DATE_FORMAT(drs_delivery_transactions.Time,'%d-%m-%Y') END ) as DelDate"),
       )

       ->whereIn('docket_masters.Booking_Type',[3,4])
       ->where('Docket_Collection_Trans.Amt','=',null)
        ->get();
    }
    public function headings(): array
    {
        return [
            'Collection Office',
            'Booking Date',
            'Sale Type',
            'Origin',
            'Destination',
            'Docket NO',
            'Client Name',
            'Pcs',
            'Act Wt',
            'Chrg Wt',
            'Amount',
            'Delivery Branch',
            'Date',
        ];
    }

}