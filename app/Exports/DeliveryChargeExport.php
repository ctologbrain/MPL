<?php
namespace App\Exports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Operation\DocketMaster;
use DB;
class DeliveryChargeExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct($offie,$date,$CustomerData) {
        $this->offce = $offie;
        $this->date=$date;
        $this->CustomerData=$CustomerData;
       
        
 }
    public function collection()
    {
       return    $docket = DocketMaster::join("docket_product_details","docket_product_details.Docket_Id","=","docket_masters.id")
       ->leftjoin("customer_masters","customer_masters.id","=","docket_masters.Cust_Id")
       ->leftjoin("Cust_Other_Charge","Cust_Other_Charge.Id","=","docket_product_details.cahrge_id")
       ->select(DB::raw("CONCAT(customer_masters.CustomerCode,'~',customer_masters.CustomerName)"),"docket_masters.Docket_No"
       ,DB::raw("DATE_FORMAT(docket_masters.Booking_Date,'%d-%m-%Y') as BD"), "docket_product_details.charge","Cust_Other_Charge.Title"
        )->where("docket_product_details.cahrge_id","!=",null)
        ->where(function($query){
            if($this->offce!=''){
                $query->where("docket_masters.Office_ID",$this->offce);
            }
         })
         ->where(function($query){
            if(isset($this->date['formDate']) &&  isset($this->date['todate'])){
                $query->whereBetween(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),[$this->date['formDate'],$this->date['todate']]);
            }
        })
        ->where(function($query) {
            if($this->CustomerData!=''){
               $query->where("docket_masters.Cust_Id",$this->CustomerData);
            }
        })
       ->get();
       
     echo '<pre>'; print_r($docket); die;
    }
    public function headings(): array
    {
        return [
            'Customer',
            'Docket No.',
            'Book Date',
            'Charge Amonut',
            'Charge Name'
        ];
    }

}