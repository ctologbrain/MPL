<?php
namespace App\Exports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Models\Operation\DocketMaster;
use App\Models\Operation\VehicleTripSheetTransaction;
use App\Models\Operation\DRSEntry;
use DB;
class DRSDeliveryExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct($office,$fromDate, $toDate) {
        $this->office         = $office;
        $this->fromDate = $fromDate;
        $this->toDate = $toDate;
    }
        

    public function collection()
    {
       return  $DsrData=  DRSEntry::leftjoin('DRS_Transactions','DRS_Transactions.DRS_No','=','DRS_Masters.ID')
       ->leftjoin('employees','DRS_Masters.D_Boy','=','employees.id')
       ->leftjoin('vehicle_masters','DRS_Masters.Vehicle_No','=','vehicle_masters.id')
       ->leftjoin('docket_masters','DRS_Transactions.Docket_No','=','docket_masters.Docket_No')
       ->leftjoin('docket_product_details','docket_product_details.Docket_Id','=','docket_masters.id')
       ->leftjoin('office_masters','DRS_Masters.D_Office_Id','=','office_masters.id')
       ->leftjoin('docket_allocations','docket_allocations.Docket_No','=','docket_masters.Docket_No')
        
       ->leftjoin('NDR_Trans','NDR_Trans.Docket_No','DRS_Transactions.Docket_No')
       ->leftjoin('RTO_Trans','RTO_Trans.Initial_Docket','DRS_Transactions.Docket_No')
        ->leftjoin('drs_delivery_transactions','drs_delivery_transactions.Docket','DRS_Transactions.Docket_No')
        ->select("DRS_Masters.DRS_No", DB::raw("CONCAT(office_masters.OfficeCode,'~','office_masters.OfficeName')"), 
        DB::raw("DATE_FORMAT(DRS_Masters.Delivery_Date,'%d-%m-%Y')"),
        DB::raw("CONCAT(vehicle_masters.VehicleNo,'(', DRS_Masters.Vehcile_Type ,')')"),
        DB::raw("CONCAT(employees.EmployeeCode, '~', employees.EmployeeName ,'(',DRS_Masters.Mob,')' )"),
        "DRS_Masters.RFQ_Number", "DRS_Masters.Market_Hire_Amount",
        "DRS_Masters.DriverName", "DRS_Masters.OpenKm",
        "employees.OfficeMobileNo",  "DRS_Masters.Supervisor",
        DB::raw("COUNT(DISTINCT DRS_Transactions.DRS_No) as TotalDRS"),
        DB::raw("SUM(docket_product_details.Actual_Weight) as TotActWt"),
        DB::raw("SUM(docket_product_details.Charged_Weight) as TotChrgWt "), 
        DB::raw("COUNT(DISTINCT NDR_Trans.Docket_No) as TotNDR"),
        DB::raw("COUNT(DISTINCT RTO_Trans.Initial_Docket) as TotRTO"),
         DB::raw("COUNT(DISTINCT CASE WHEN drs_delivery_transactions.Type='DELIVERED' THEN drs_delivery_transactions.Docket END) as TotalDel") ,
         DB::raw("COUNT(DISTINCT DRS_Transactions.DRS_No) -COUNT(DISTINCT CASE WHEN drs_delivery_transactions.Type='DELIVERED' THEN drs_delivery_transactions.Docket END)  as pending"),
      //  DB::raw("SUM(CASE WHEN drs_delivery_transactions.Type='DELIVERED' THEN 1 else 0 END) as TotalDel"),
       )
        ->where(function($query) {
            if($this->fromDate!='' &&  $this->toDate!=''){
                $query->whereBetween(DB::raw("DATE_FORMAT(DRS_Masters.Delivery_Date,'%d-%m-%Y')") ,[$this->fromDate,$this->toDate]);
            }
        })
        ->where(function($query) {
            if(  $this->office  !=''){
              $query->where('DRS_Masters.D_Office_Id','=',  $this->office  );
            }
        })
        ->groupby('DRS_Masters.ID')
        ->orderBy('DRS_Masters.ID','DESC')
        ->get();
       //
    }

    public function headings(): array
    {
        return [
            'DSR No',
            'Office',
            'Delivery Date',
            'Vehcile Details',
            'Delivery Boy Name & Phone',
            'RFQ Number',
            'Market Hire Amount',
            'Driver Name',
            'Open Km',
            'Mobile No.',
            'Supervisor',
            'DRS',
            'Act Wt',
            'Chrg Wt.',
            'NDR',
            'RTO',
            'Deliverd',
            'Panding',
          
         ];
    }
}