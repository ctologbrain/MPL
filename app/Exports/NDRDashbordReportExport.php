<?php
namespace App\Exports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Operation\NoDelvery;
use DB;
class NDRDashbordReportExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct() {
     }
    public function collection()
    {
       return NoDelvery::leftjoin('docket_masters','NDR_Trans.Docket_No','=','docket_masters.Docket_No')
       ->leftjoin('ndr_masters','ndr_masters.id','=','NDR_Trans.NDR_Reason')
       ->leftjoin('office_masters','docket_masters.Office_ID','=','office_masters.id')
       ->leftjoin('drs_delivery_transactions',function($joinq){
        $joinq->on('docket_masters.Docket_No','=','drs_delivery_transactions.Docket');
        $joinq->where('drs_delivery_transactions.Type','NDR');
       })
       ->leftjoin('ndr_masters as NDRDEl','NDRDEl.id','=','NDR_Trans.NDR_Reason')
       
       ->select( 'NDR_Trans.Docket_No', 
       DB::raw("(CASE WHEN NDR_Trans.NDR_Date!='' THEN DATE_FORMAT(NDR_Trans.NDR_Date,'%d-%m-%Y') WHEN drs_delivery_transactions.Time!='' THEN DATE_FORMAT(drs_delivery_transactions.Time,'%d-%m-%Y') END) as NDate"),
       DB::raw("(CASE WHEN NDR_Trans.NDR_Reason!='' THEN CONCAT(ndr_masters.ReasonCode,'~',ndr_masters.ReasonDetail) WHEN drs_delivery_transactions.NdrReason!='' THEN   CONCAT(NDRDEl.ReasonCode,'~',NDRDEl.ReasonDetail)  END ) as Resn"),
       DB::raw("(CASE WHEN NDR_Trans.Remark!='' THEN  NDR_Trans.Remark  WHEN drs_delivery_transactions.Ndr_remark!='' THEN drs_delivery_transactions.Ndr_remark   END) as NRem"),
       DB::raw("CONCAT(office_masters.OfficeCode,'~',office_masters.OfficeName) as Offc")
      )
      ->get();
    }
    public function headings(): array
    {
        return [
            'Docket No.',
            'NDR Date',
            'NDR Reason',
            'NDR remarks',
            'Booking Branch'
        ];
    }

}