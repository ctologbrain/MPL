<?php
namespace App\Exports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Models\Operation\DocketMaster;
use App\Models\Operation\VehicleTripSheetTransaction;
use App\Models\Operation\ExcessReceiving;
use DB;
class ExcessReceivingExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct($office,$date) {
        $this->office         = $office;
        $this->date = $date;
     
    }
        

    public function collection()
    {
       return  $DsrData=  ExcessReceiving::leftjoin('vehicle_gatepasses','Excess_Receiving.GatepassId','=','vehicle_gatepasses.id')
       ->leftjoin('office_masters','Excess_Receiving.Receiving_office','=','office_masters.id')
       ->leftjoin('employees','Excess_Receiving.Created_By','=','employees.user_id')
        ->select(
            "Excess_Receiving.DocketNo","vehicle_gatepasses.GP_Number", 
            DB::raw("DATE_FORMAT(Excess_Receiving.Receiving_date,'%d-%m-%Y') as Datee"),"office_masters.OfficeName",
            "Excess_Receiving.Remark"
        )
        ->where(function($query) {
            if(isset($this->date['fromDate']) && isset( $this->date['todate'])){
                $query->whereBetween("Excess_Receiving.Receiving_date",[$this->date['fromDate'],$this->date['todate']]);
            }
        })
        ->where(function($query) {
            if(  $this->office  !=''){
              $query->where("Excess_Receiving.Receiving_office",'=',  $this->office  );
            }
        })
        ->groupby('Excess_Receiving.id')
        ->orderBy('Excess_Receiving.id','DESC')
        ->get();
       //
    }

    public function headings(): array
    {
        return [
            'Docket No',
            'GatePass No.',
            'Receiving Date',
            'Receiving Office',
            'Remark'
          
         ];
    }
}