<?php
namespace App\Exports;
use App\Models\Operation\PickupScanAndDocket;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Operation\DocketMaster;
use App\Models\Operation\VehicleTripSheetTransaction;
use App\Models\Operation\GatePassReceiving;
use DB;
class GatePassReceivingExport implements FromCollection, WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct($search,$formDate,$todate) {
        $this->search = $search;
        $this->formDate=$formDate;
        $this->todate=$todate;
      
        
        
 }
    public function collection()
    {
       
        return GatePassReceiving::
        leftjoin('vehicle_gatepasses','vehicle_gatepasses.id','=','gate_pass_receivings.Gp_Id')
       ->leftJoin('office_masters', 'office_masters.id', '=', 'gate_pass_receivings.Rcv_Office')
       ->leftJoin('Gp_Recv_Trans', 'Gp_Recv_Trans.GP_Recv_Id', '=', 'gate_pass_receivings.id')
       ->where(function($query){
        if($this->formDate !='' &&  $this->todate !=''){
           $query->whereBetween('gate_pass_receivings.Rcv_Date',[$this->formDate,$this->todate]);
           }
       })
       ->where( function ($query){
         if($this->search!=''){
          $query->where('vehicle_gatepasses.GP_Number', 'like', '%'.$this->search.'%');
        }
         })
       ->select(DB::raw('(CASE WHEN gate_pass_receivings.Gp_Rcv_Type = "1" THEN "Docket" 
         ELSE "Document"  END) AS status_lable'),'office_masters.OfficeName',DB::raw("DATE_FORMAT(gate_pass_receivings.Rcv_Date, '%d-%m-%Y')"),'gate_pass_receivings.Supervisor',DB::raw('COUNT(Gp_Recv_Trans.Docket_No ) as DocketTotal'),'vehicle_gatepasses.GP_Number',DB::raw('SUM(Gp_Recv_Trans.Recv_Qty ) as ReceivedQty'),DB::raw('SUM(Gp_Recv_Trans.Balance_Qty ) as BalanceQty'),'gate_pass_receivings.Remark')
       ->groupBy("Gp_Recv_Trans.Docket_No")
       ->orderBy('gate_pass_receivings.id','DESC')
       ->get();
      
    }
    public function headings(): array
    {
        return [
            'Gatepass Receiving Type',
            'Receiving Office',
            'Receiving Date',
            'Supervisor',
            'Docket',
            'Gatepass No.',
            'Receiving Qty',
            'Pending Qty',
            'Remark',
           
          
         ];
    }

}