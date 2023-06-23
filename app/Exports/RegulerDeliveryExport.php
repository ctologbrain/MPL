<?php
namespace App\Exports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Models\Operation\DocketMaster;
use App\Models\Operation\VehicleTripSheetTransaction;
use App\Models\Operation\RegularDelivery;
use DB;
class RegulerDeliveryExport implements FromCollection, WithHeadings
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
       return RegularDelivery::
        leftjoin('docket_masters','docket_masters.Docket_No','=','Regular_Deliveries.Docket_ID')
        ->leftjoin('customer_masters','docket_masters.Cust_Id','=','customer_masters.id')
        ->leftjoin('office_masters as BookingBranch','BookingBranch.id','=','docket_masters.Office_ID')
        ->leftjoin('office_masters as DelvOffice','DelvOffice.id','=','Regular_Deliveries.Dest_Office_Id')
        ->leftjoin('consignees','consignees.id','=','docket_masters.Consignee_Id')
        ->leftjoin('consignor_masters','consignor_masters.id','=','docket_masters.Consigner_Id')
        ->leftjoin('docket_allocations','docket_allocations.Docket_No','=','docket_masters.Docket_No')
        ->leftjoin('docket_statuses','docket_allocations.Status','=','docket_statuses.id')
        ->leftJoin('pincode_masters as ScourcePinCode', 'ScourcePinCode.id', '=', 'docket_masters.Origin_Pin')
        ->leftJoin('pincode_masters as DestPinCode', 'DestPinCode.id', '=', 'docket_masters.Dest_Pin')
        ->leftJoin('cities as ScourceCity', 'ScourceCity.id', '=', 'ScourcePinCode.city')
        ->leftJoin('cities as DestCity', 'DestCity.id', '=', 'DestPinCode.city')

        ->leftJoin('zone_masters as ZoneM', 'ZoneM.id', '=', 'ScourceCity.ZoneName')
        ->leftJoin('zone_masters as ZoneDs', 'ZoneDs.id', '=', 'DestCity.ZoneName')
        ->leftjoin("devilery_types","devilery_types.id","docket_masters.Delivery_Type")
        ->leftJoin('states as Deststat', 'Deststat.id', '=', 'DestPinCode.State')
        ->leftJoin('states as Orgstat', 'Orgstat.id', '=', 'ScourcePinCode.State')

        ->leftjoin('docket_product_details','docket_masters.id','docket_product_details.Docket_Id')
        ->leftjoin('docket_products','docket_products.id','docket_product_details.D_Product')
        ->leftjoin("docket_booking_types","docket_booking_types.id","docket_masters.Booking_Type")
          ->leftjoin("gate_pass_with_dockets","gate_pass_with_dockets.Docket","docket_masters.Docket_No")
          ->leftjoin("vehicle_gatepasses","vehicle_gatepasses.id","gate_pass_with_dockets.GatePassId")
          ->leftjoin("route_masters","route_masters.id","vehicle_gatepasses.Route_ID")

        ->Select(DB::raw("DATE_FORMAT(Regular_Deliveries.Delivery_date,'%d-%m-%Y') as DelvDate"),"DelvOffice.OfficeName","Regular_Deliveries.Docket_ID","BookingBranch.OfficeName as MainOff",
        DB::raw("DATE_FORMAT(docket_masters.Booking_Date,'%d-%m-%Y') as BookingDatte"),"customer_masters.CustomerName",
        "Orgstat.name as StName",'ScourceCity.CityName as SourceCity','ScourcePinCode.PinCode as SrcPin', 'Deststat.name as DestNameSt',
        'DestCity.CityName as DestCity','DestPinCode.PinCode as DestPin',
          DB::raw("CONCAT(ZoneM.ZoneName,'-',ZoneDs.ZoneName)"),
        "docket_masters.Mode","docket_products.Title as ProductTitle",
        "docket_product_details.Qty","docket_product_details.Actual_Weight","docket_product_details.Charged_Weight",
        "consignees.ConsigneeName", "docket_statuses.title", "devilery_types.Title as DelvType", 
        DB::raw("DATE_FORMAT(docket_masters.Booking_Date + INTERVAL (CASE WHEN route_masters.TransitDays!='' THEN route_masters.TransitDays ELSE 0 END)  DAY,'%d-%m-%Y')  as EDd")
        )
        ->where(function($query) {
            if(isset($this->date['from']) && isset($this->date['to'])){
                $query->whereBetween("Date" ,[$this->date['from'],$this->date['to']]);
            }
        })
        ->where(function($query) {
            if(  $this->office  !=''){
              $query->where('Dest_Office_Id','=',  $this->office  );
            }
        })
        ->orderBy('Regular_Deliveries.id','DESC')
        ->get();
       //
    }

    public function headings(): array
    {
        return [
            'Delivery Date',
            'Delivery Office',
            'Docket Number',
            'Booking Branch',
            'Booking Date',
            'Client Name',
            'Origin State',
            'Origin City',
            'Origin Pincode',
            'Destination State',
            'Destination City',
            'Destination Pincode',
            'Zone',
            'Mode',
            'Product',
            'Pcs.',
            'Act. Wt.',
            'Chg. Wt.',
            'Consignee Name',
            'Last Status',
            'Delivery Type',
            'EDD',
            'TAT Status',
          
         ];
    }
}