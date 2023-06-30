<?php
namespace App\Exports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Operation\PickupRequest;
use DB;
class PickupRequestExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct($status,$date,$Customer) {
        $this->status = $status;
        $this->date=$date;
        $this->Customer=$Customer;
        
 }
    public function collection()
    {
       return PickupRequest::leftjoin('pincode_masters as destP','destP.id','=','Pickup_Request.DestId')
       ->leftjoin('pincode_masters as OrgP','OrgP.id','=','Pickup_Request.originId')
       ->leftjoin('customer_masters','customer_masters.id','=','Pickup_Request.customerId')
       ->leftjoin('Content_Master','Content_Master.id','=','Pickup_Request.contentId')

       ->leftjoin('cities as OrgC','OrgC.id','=','OrgP.city')
       ->leftjoin('cities as DestC','DestC.id','=','destP.city')
       ->leftjoin('employees as BookBy','BookBy.user_id','=','Pickup_Request.CreatedBy')
       ->leftjoin('office_masters as PickOff','BookBy.OfficeName','=','PickOff.id')

    ->where(function($query){
        if($this->status!=''){
            $query->where("Pickup_Request.Office_ID",$this->status);
        }
       })
       ->where(function($query){
        if($this->Customer!=''){
            $query->where("Pickup_Request.customerId",$this->Customer);
        }
       })
       ->where(function($query){
        if(isset($this->date['formDate']) &&  isset($this->date['todate'])){
            $query->whereBetween(DB::raw("DATE_FORMAT(pickup_date,'%Y-%m-%d')"),[$this->date['formDate'],$this->date['todate']]);
        }
       })
       ->select(
            DB::raw("(CASE WHEN Pickup_Request.Status=1   THEN 'ASSIGN'  WHEN Pickup_Request.Status=2   THEN  'PICK'
            WHEN Pickup_Request.Status=3 THEN  'UNPICK'    WHEN Pickup_Request.Status=4   THEN 'CANCEL' END ) as Stts"),
            DB::raw("DATE_FORMAT(Pickup_Request.Updated_At,'%d-%m-%Y') as StDate"),

            DB::raw("DATE_FORMAT(Pickup_Request.Updated_At,'%d-%m-%Y') as StDate"), "Pickup_Request.status_remark",
            "Pickup_Request.DocketNo","Pickup_Request.OrderNo","PickOff.OfficeName","customer_masters.CustomerName",
            "Pickup_Request.store_name" ,  DB::raw("DATE_FORMAT(Pickup_Request.pickup_date,'%d-%m-%Y') as PICDate"), 
            DB::raw("DATE_FORMAT(Pickup_Request.pickup_date,'%H:%i') as PICTime")
            ,"Pickup_Request.OrderNo"
            ,"Pickup_Request.contactPersonName", "Pickup_Request.mobile_no", "Pickup_Request.warehouse_address"
            ,"OrgP.PinCode as OrgPIN" , "OrgC.CityName as OrCity", "Pickup_Request.pieces",
            "Pickup_Request.weight", "destP.PinCode as DestPin",  "DestC.CityName as DesCity", 
            DB::raw("(CASE WHEN Pickup_Request.sale_refere=1   THEN 'WEB'  WHEN Pickup_Request.sale_refere=2   THEN  'EMAIL'
            WHEN Pickup_Request.sale_refere=3 THEN  'EMPLOYEE'    END ) as Refer"), 
            "Pickup_Request.reference_name","Pickup_Request.bill_to","Content_Master.Contents",
            "Pickup_Request.remark"
       )
       ->get();
    }
    public function headings(): array
    {
        return [
            'Status',
            'Status date',
            'Status Remark',
            'Docket No.',
            'Order Number',
            'Pickup Office',
            'Customer Name',
            'Warehouse Name',
            'Pickup Date',
            'Time',
            'Contact Person',
            'Mobile Number',
            'Warehouse Address',
            'Origin Pincode',
            'Origin City',
            'Pcs',
            'Weight',
            'Dest. Pincode',
            'Destination City',
            'Sale Reference',
            'Reference Name',
            'Bill To ',
            'Contents',
            'Remarks'
        ];
    }

}