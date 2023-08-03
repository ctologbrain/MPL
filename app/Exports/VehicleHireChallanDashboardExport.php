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
class VehicleHireChallanDashboardExport implements FromCollection, WithHeadings, WithEvents,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct() {
     
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
           "SecOff.OfficeName as OrrOffice",
            "ThirdOff.OfficeName as DestOff",  
           "vendor_masters.VendorName",
            "vehicle_types.VehicleType", "vehicle_masters.VehicleNo",
            "Vehicle_Hire_Challan.TotalAmount",
          "Vehicle_Hire_Challan.Balance", "BalOff.OfficeName as BalOffice"
        )
        ->where(function($query) {
            if(isset($this->date['fromDate']) && isset( $this->date['todate'])){
                $query->whereBetween("Vehicle_Hire_Challan.Challan_Date",[$this->date['fromDate'],$this->date['todate']]);
            }
        })
        ->orderBy('Vehicle_Hire_Challan.id','DESC')
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
            'Origin Office',
            'Destination',
            'Vendor Name',
            'Vehicle Model',
            'Vehicle Number',
            'TotalAmount',
            'Balance',
            'Bal PaidByOffice'
          
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

                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(100);
                $event->sheet->getDelegate()->getColumnDimension('G')->setWidth(100);
                $event->sheet->getDelegate()->getColumnDimension('H')->setWidth(100);
                $event->sheet->getDelegate()->getColumnDimension('I')->setWidth(100);
                $event->sheet->getDelegate()->getColumnDimension('J')->setWidth(100);

                $event->sheet->getDelegate()->getColumnDimension('K')->setWidth(100);
                $event->sheet->getDelegate()->getColumnDimension('L')->setWidth(100);
                $event->sheet->getDelegate()->getColumnDimension('M')->setWidth(100);
                $event->sheet->getDelegate()->getColumnDimension('N')->setWidth(100);
                $event->sheet->getDelegate()->getColumnDimension('O')->setWidth(100);
                $event->sheet->getDelegate()->getColumnDimension('P')->setWidth(100);
                $event->sheet->getDelegate()->getColumnDimension('Q')->setWidth(100);
                $event->sheet->getDelegate()->getColumnDimension('R')->setWidth(100);
                $event->sheet->getDelegate()->getColumnDimension('S')->setWidth(100);
                $event->sheet->getDelegate()->getColumnDimension('T')->setWidth(100);
                $event->sheet->getDelegate()->getColumnDimension('U')->setWidth(100);
                $event->sheet->getDelegate()->getColumnDimension('V')->setWidth(100);
     
            },
        ];
    }
}