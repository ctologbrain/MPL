<?php
namespace App\Exports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Operation\DocketMaster;
use App\Models\Operation\VehicleTripSheetTransaction;
use App\Models\Operation\VehicleHireChallan;
use DB;
class VehicleHireChallanExport implements FromCollection, WithHeadings, WithEvents,ShouldAutoSize
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
       return  $DsrData=  VehicleHireChallan::leftjoin('vehicle_masters','Vehicle_Hire_Challan.Vehicle_Number','=','vehicle_masters.id')
       ->leftjoin('vehicle_types','Vehicle_Hire_Challan.Vehicle_Model','=','vehicle_types.id')
       ->leftjoin('vendor_masters','Vehicle_Hire_Challan.Vendor_Name','=','vendor_masters.id')
       ->leftjoin('office_masters as MainOff','Vehicle_Hire_Challan.Adv_PaidByOffice','=','MainOff.id')
       ->leftjoin('office_masters as SecOff','Vehicle_Hire_Challan.Origin_Office','=','SecOff.id')
       ->leftjoin('office_masters as ThirdOff','Vehicle_Hire_Challan.Destination','=','ThirdOff.id')
       ->leftjoin('office_masters as BalOff','Vehicle_Hire_Challan.Bal_PaidByOffice','=','BalOff.id')
        ->select(
            DB::raw("DATE_FORMAT(Vehicle_Hire_Challan.Challan_Date,'%d-%m-%Y') as Datee"),"Vehicle_Hire_Challan.Challan_No", 
            "Vehicle_Hire_Challan.Challan_Type", "Vehicle_Hire_Challan.Purpose",
            "Vehicle_Hire_Challan.Paid_For", "SecOff.OfficeName as OrrOffice",
            "ThirdOff.OfficeName as DestOff",  "Vehicle_Hire_Challan.Destination ",

            "Vehicle_Hire_Challan.Route", "Vehicle_Hire_Challan.Account_Number",
            "Vehicle_Hire_Challan.Number",  "vendor_masters.VendorName",
            "vehicle_types.VehicleType", "vehicle_masters.VehicleNo",
            "Vehicle_Hire_Challan.TotalAmount",
            "Vehicle_Hire_Challan.AdvancePaid","Vehicle_Hire_Challan.Balance",
          "Vehicle_Hire_Challan.Adv_PaymentMode",   "Vehicle_Hire_Challan.Adv_PaymentNumber",
          "Vehicle_Hire_Challan.Bal_PaymentMode","Vehicle_Hire_Challan.Bal_PaymentNumber"
          ,"Vehicle_Hire_Challan.Adv_PaidByOffice" ,"Vehicle_Hire_Challan.Bal_PaidByOffice"
         
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
            'Challan Date',
            'Challan No.',
            'Challan Type',
            'Purpose',
            'Paid For',
            'Origin Office',
            'Destination',
            'Route',
            'Account Number',
            'Number',
            'Vendor Name',
            'Vehicle Model',
            'Vehicle Number',
            'TotalAmount',
            'AdvancePaid',
            'Balance',
            'Adv PaymentMode',
            'Adv PaymentNumber',
            'Adv PaidByOffice',
            'Bal PaymentMode	',
            'Bal PaymentNumber',
            'Bal PaidByOffice',
          
         ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
   
                $event->sheet->getDelegate()->getRowDimension('1')->setRowHeight(40);
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(100);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(100);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(100);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(100);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(100);
     
            },
        ];
    }
}