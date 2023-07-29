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
    function __construct($keyword){
        $this->keyword=$keyword;
    }
    public function collection()
    {
       return CustomerInvoice::leftjoin('customer_masters','customer_masters.id','=','InvoiceMaster.Cust_Id')
       ->leftjoin('InvoiceDetails','InvoiceDetails.InvId','=','InvoiceMaster.id')
       ->Select("MainOff.OfficeName as OfficeName", 
       DB::raw("CONCAT(customer_masters.CustomerName ,'~',customer_masters.CustomerCode)"),
       
       DB::raw("DATE_FORMAT(InvoiceMaster.InvDate,'%d-%m-%Y') as InvDate"), "docket_booking_types.BookingType", 
      
       DB::raw("SUM(InvoiceDetails.Total) as InvTotalAmt")

       )

       ->whereIn('docket_masters.Booking_Type',[3,4])
       ->where('Docket_Collection_Trans.Amt','=',null)
        ->get();
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