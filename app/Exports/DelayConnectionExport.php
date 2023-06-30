<?php
namespace App\Exports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Stock\DocketAllocation;
use App\Models\Operation\DocketMaster;
use DB;
class DelayConnectionExport implements FromCollection, WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct($office ,$date,$customer) {
       
        $this->office = $office;
        $this->date = $date;
        $this->customer = $customer;
    }
        

    public function collection()
    {
       
      return DocketMaster::leftjoin("docket_product_details","docket_product_details.Docket_Id","=","docket_masters.id")
      ->leftjoin("customer_masters","customer_masters.id","=","docket_masters.Cust_Id")
      ->leftjoin("gate_pass_with_dockets","gate_pass_with_dockets.Docket","=","docket_masters.Docket_No")
      ->leftjoin("vehicle_gatepasses","vehicle_gatepasses.id","=","gate_pass_with_dockets.GatePassId")
      ->leftjoin("users","vehicle_gatepasses.Created_By","=","users.id")
      ->leftjoin("employees","employees.user_id","=","users.id")
      ->leftjoin("office_masters","office_masters.id","=","employees.OfficeName")
      ->leftjoin("NDR_Trans","NDR_Trans.Docket_No","=","docket_masters.Docket_No")
      ->leftjoin("ndr_masters as NDRR","NDRR.id","=","NDR_Trans.NDR_Reason")
      ->leftjoin("Offload_Transactions","Offload_Transactions.Docket_NO","=","docket_masters.Docket_No")
      ->leftjoin("ndr_masters as OFFLoadR","OFFLoadR.id","=","Offload_Transactions.Offload_Reason")
      ->select("docket_masters.Docket_No","docket_masters.Booking_Date",
      DB::raw("GROUP_CONCAT(DISTINCT vehicle_gatepasses.GP_Number SEPARATOR ',')  as `GPN`"),
      DB::raw("GROUP_CONCAT(DISTINCT office_masters.OfficeName SEPARATOR ',') as `GPBranch`"),
      DB::raw("GROUP_CONCAT(DISTINCT vehicle_gatepasses.GP_TIME SEPARATOR ',')  as `GPT`"),
     DB::raw("CONCAT(customer_masters.CustomerCode ,'~',customer_masters.CustomerName)"),
      "docket_product_details.Qty" ,"docket_product_details.Actual_Weight",
      "docket_masters.Remark as DocketRemark", "NDR_Trans.Remark as NDR_REMARK",
      "Offload_Transactions.Offload_Date", "Offload_Transactions.Remark as OFFLoad_REMARK",
      "OFFLoadR.ReasonDetail as OFFRD" // "OFFLoadR.ReasonCode as OffRC",
      )
       ->where(function($query){
            if($this->office!=''){
                $query->where("docket_masters.Office_ID",$this->office);
            }
        })
        ->where(function($query){
            if(isset($this->date['formDate']) && $this->date['formDate']!='' && isset($this->date['todate'])  && $this->date['todate']!='' ){
                $query->whereBetween(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),[$this->date['formDate'],$this->date['todate']]);
            }
        })
        ->where(function($query) {
            if($this->customer!=''){
                $query->where("docket_masters.Cust_Id",$this->customer);
            }
        })
        ->get();
      
    }

    public function headings(): array
    {
        return [
            'Docket No.',
            'Book Date',
            'GP -1/2',
            'GP Branch-1/2',
            'GP Date -1/2',
            'Customer',
            'Pieces',
            'Actual Weight',
            'Booking Remark',
            'NDR Remark',
            'Offload Date',
         ];
    }
}