<?php
namespace App\Exports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Stock\DocketAllocation;
use App\Models\Operation\VehicleTripSheetTransaction;
use DB;
class DocketStatusExport implements FromCollection, WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct($office ,$date) {
       
        $this->office = $office;
        $this->date = $date;
    }
        

    public function collection()
    {
       
    //    DocketAllocation::
    //     leftjoin('docket_masters','docket_masters.Docket_No','=','docket_allocations.Docket_No')
    //     ->Select("docket_invoice_details.Invoice_No","docket_invoice_details.Invoice_Date",
    //     "docket_invoice_details.Description","docket_invoice_details.Amount","docket_invoice_details.EWB_No"
    //     )
    //     ->get();
     
        return  $packet;
    }

    public function headings(): array
    {
        return [
            'Activity',
            'Activity Date',
            'Description ',
            'Entry Date',
            'Entry Detail'
         ];
    }
}