<?php
namespace App\Exports;
use App\Models\Operation\PickupScanAndDocket;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
class DocketReport implements FromCollection, WithHeadings
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
            'Date',
            'Sale Type',
            'Delivery Type',
            'Origin State',
            'Origin City',
            'Org. Pincode',
            'Dest. State',
            'Dest. City',
            'Dest. Pincode',
            'Zone',
            'Mode',
            'Product',
            'Docket No.',
            'Reference No',
            'PO Number',
            'Vendor Name',
            'Vehicle No.',
            'Gatepass No.',
            'FPM No.',
            'Client Category',
            'CS Person',
            'Client Code',
            'Client Name',
            'Consignor Name',
            'Dimension',
            'Pcs.',
            'Act. Wt.',
            'Chrg. Wt.',
            'Delivery Agent',
            'Delivery Agent Date',
            'Vehicle Arrival Date',
            'Invoice No',
            'Invoice Date',
            'Goods Value',
            'eWayBill No',
            'EWB Date',
            'Contents',
            'Amount',
            'DOD Amount',
            'DACC',
            'Booked By',
            'Booked At',
            'Booking Remark',
            'Last Status',
            'Current Location',
            'RTO Status',
            'Offload Status',
            'NDR Reason',
            'Delivery Status',
            'Delivery Date',
            'EDD',
            'TAT Status',
            'DRS Date',
            'DRS Vehicle',
            'DRS Number',
            'Billing Status',
            'Category',
            'Scan Image Status',
          
        ];
    }

}