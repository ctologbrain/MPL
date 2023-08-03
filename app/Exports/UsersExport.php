<?php
namespace App\Exports;
use App\Models\Operation\PickupScanAndDocket;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class UsersExport implements FromCollection, WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct($offcie,$date) {
        $this->offcie = $offcie;
        $this->date=$date;
        
 }
    public function collection()
    {
      return  PickupScanAndDocket::
       select('pickup_scans.ScanDate','office_masters.OfficeName','pickup_scans.vehicleType','pickup_scans.marketHireAmount','vendor_masters.VendorName','vehicle_masters.VehicleNo','driver_masters.DriverName','pickup_scan_and_dockets.Docket','pickup_scans.PickupNo','pickup_scans.startkm','pickup_scans.endkm','pickup_scans.remark')
     ->leftjoin('pickup_scans','pickup_scans.id','=','pickup_scan_and_dockets.Pickup_id')
     ->leftjoin('docket_allocations','docket_allocations.Docket_No','=','pickup_scan_and_dockets.Docket')
     ->leftjoin('office_masters','office_masters.id','=','docket_allocations.Branch_ID')
     ->leftjoin('vendor_masters','vendor_masters.id','=','pickup_scans.vendorName')
     ->leftjoin('vehicle_masters','vehicle_masters.id','=','pickup_scans.vehicleNo')
     ->leftjoin('driver_masters','driver_masters.id','=','pickup_scans.driverName')
     ->leftjoin('employees as emp','emp.id','=','pickup_scans.unloadingSupervisorName')
     ->orderBy('pickup_scan_and_dockets.id')
     ->Where(function ($query){ 
            if($this->offcie !='')
           {
               $query ->orWhere('docket_allocations.Branch_ID',$this->offcie);
           }
        })
        ->where(function ($query){
           
            if(isset($this->date['from']) && isset($this->date['to']))
            {
             $query->whereBetween('pickup_scans.ScanDate',[$this->date['from'],$this->date['to']]);
            }
           }) 
   
      ->get();
    }
    public function headings(): array
    {
        return [
            'Scan Date',
            'Branch Name',
            'Vehicle Type',
            'Amount',
            'Vendor Name',
            'Vehicle No',
            'Driver Name',
            'Docket No',
            'Pickup No',
            'Start Km',
            'End Km',
            'Unloading Supervisor Name',
            'Remarks'
        ];
    }

}