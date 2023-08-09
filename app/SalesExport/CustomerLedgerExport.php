<?php
namespace App\SalesExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\SalesReport\CustomerLedger;
use DB;
class CustomerLedgerExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct($date,$CustomerData ){
        $this->date=$date;
        $this->CustomerData = $CustomerData;
    }
    public function collection()
    {
       return CustomerLedger::leftjoin("customer_masters","customer_masters.id","CustomerLadger.CustId")
       
       ->where(function($query)  {
        if($this->CustomerData!=''){
           $query->where("CustomerLadger.CustId",$this->CustomerData);
        }
       })
       ->where(function($query)  {
        if(isset($this->date['formDate']) &&  isset($this->date['todate'])){
            $query->whereBetween(DB::raw("DATE_FORMAT(CustomerLadger.Date, '%Y-%m-%d')"),[$this->date['formDate'],$this->date['todate']]);
        }
       })
     
        ->select(
        'customer_masters.CustomerName',
        DB::raw('DATE_FORMAT(CustomerLadger.Date,"%d-%m-%Y %H:%i") as CT'),
        'CustomerLadger.Description',
        'CustomerLadger.VoucherType',
        'CustomerLadger.VoucherNo', 
        'CustomerLadger.Debit', 
        'CustomerLadger.Credit', 
        'CustomerLadger.Balance'
     // 
        )->get();
    }
    public function headings(): array
    {
        return [
            'Name',
            'Date',
            'Description',
            'Voucher Type',
            'Voucher No',
            'Debit',
            'Credit',
            'Balance'
        ];
    }

}