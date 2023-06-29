<?php
namespace App\Exports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Operation\DocketMaster;
use App\Models\Operation\VehicleTripSheetTransaction;
use App\Models\Operation\DocketInvoiceDetails;
use DB;
class InvoiceModelExport implements FromCollection, WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct($docket) {
       
        $this->docket = $docket;
    }
        

    public function collection()
    {
       return DocketInvoiceDetails::
        leftjoin('docket_masters','docket_masters.id','=','docket_invoice_details.Docket_Id')
        ->Select("docket_invoice_details.Invoice_No",DB::raw("DATE_FORMAT(docket_invoice_details.Invoice_Date,'%d-%m-%Y') as DATEI"),
        "docket_invoice_details.Description","docket_invoice_details.Amount","docket_invoice_details.EWB_No"
        )
        ->where("docket_invoice_details.Docket_Id",$this->docket)
        ->get();
    }

    public function headings(): array
    {
        return [
            'Invoice Number',
            'Invoice Date',
            'Contents ',
            'Amount',
            'E-Way bill'
         ];
    }
}