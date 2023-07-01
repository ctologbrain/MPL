<?php
namespace App\Exports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Operation\DRSEntry;
use DB;
class OpenDRSDashboardExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct($typeDecc='') {
        $this->typeDecc = $typeDecc;
     }
    public function collection()
    {
       return DRSEntry::leftjoin('DRS_Transactions','DRS_Transactions.DRS_No','=','DRS_Masters.ID')
       ->leftjoin('employees','DRS_Masters.D_Boy','=','employees.id')
       ->leftjoin('vehicle_masters','DRS_Masters.Vehicle_No','=','vehicle_masters.id')
       ->leftjoin('docket_masters','DRS_Transactions.Docket_No','=','docket_masters.Docket_No')
       ->leftjoin('docket_product_details','docket_product_details.Docket_Id','=','docket_masters.id')
       ->leftjoin('office_masters','DRS_Masters.D_Office_Id','=','office_masters.id')
       ->leftjoin('docket_allocations','docket_allocations.Docket_No','=','docket_masters.Docket_No')
       ->where("docket_allocations.Status","=",7)
       ->select( DB::raw("DATE_FORMAT(DRS_Masters.Delivery_Date,'%d-%m-%Y') as dattes)"),
    //   DB::raw("CONCAT(office_masters.OfficeCode,'~',office_masters.OfficeName) as Offc"),
       "DRS_Masters.DRS_No"  ,DB::raw("CONCAT(employees.EmployeeCode,'',employees.EmployeeName) as emp")
       ,"DRS_Transactions.Docket_No",DB::raw("CONCAT(DRS_Masters.DriverName, '(' , DRS_Masters.Mob ,')' ) as Drver"),
       "DRS_Masters.Vehcile_Type",
       "vehicle_masters.VehicleNo",
       "DRS_Masters.Supervisor")
       ->get();
    }
    public function headings(): array
    {
        return [
            'DRS DATE',
           // 'Delivery  Office',
            'Manifest Number',
            'Delivery Boy',
            'Docket No',
            'Driver Name',
            'Vehicle Type',
            'Vehicle No',
           // 'EWB Date',
            'Supervisor Name'
        ];
    }

}