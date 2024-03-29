<?php
namespace App\SalesExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Account\CustomerInvoice;
use DB;
class OverdueOutstandingExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct(){
        // $this->keyword=$keyword;
    }
    public function collection()
    {
       return CustomerInvoice::leftjoin('customer_masters','customer_masters.id','=','InvoiceMaster.Cust_Id')
       ->leftjoin('InvoiceDetails','InvoiceDetails.InvId','=','InvoiceMaster.id')
       ->Select(
       DB::raw("CONCAT(customer_masters.CustomerName ,'~',customer_masters.CustomerCode)"),
       DB::raw("DATE_FORMAT(InvoiceMaster.InvDate,'%d-%m-%Y') as InvDate"), 
       DB::raw("CONCAT(DATE_FORMAT(InvoiceMaster.FormDate,'%d-%m-%Y') ,'-',DATE_FORMAT(InvoiceMaster.ToDate,'%d-%m-%Y') ) as FormDate"), 
       "InvoiceMaster.InvNo",
       DB::raw("SUM(InvoiceDetails.Total) as InvTotalAmt")
       )->get();
    }
    public function headings(): array
    {
        return [
            'Customer',
            'Invoice Date',
            'Billing Period',
            'Invoice No',
            'Total Amount'
        ];
    }

}