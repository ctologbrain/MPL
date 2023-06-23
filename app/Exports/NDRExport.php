<?php
namespace App\Exports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Models\Operation\DocketMaster;
use App\Models\Operation\VehicleTripSheetTransaction;
use App\Models\Operation\NoDelvery;
use DB;
class NDRExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct($date) {
       
        $this->date = $date;
    }
        

    public function collection()
    {
       return NoDelvery::
        leftjoin('docket_masters','docket_masters.Docket_No','=','NDR_Trans.Docket_No')
        ->leftjoin('customer_masters','docket_masters.Cust_Id','=','customer_masters.id')
        ->leftjoin('office_masters as MainOff','MainOff.id','=','docket_masters.Office_ID')
        ->leftjoin('consignees','consignees.id','=','docket_masters.Consignee_Id')
        ->leftjoin('consignor_masters','consignor_masters.id','=','docket_masters.Consigner_Id')
        ->leftjoin('docket_allocations','docket_allocations.Docket_No','=','docket_masters.Docket_No')
        ->leftjoin('docket_statuses','docket_allocations.Status','=','docket_statuses.id')
        ->leftJoin('pincode_masters as ScourcePinCode', 'ScourcePinCode.id', '=', 'docket_masters.Origin_Pin')
        ->leftJoin('pincode_masters as DestPinCode', 'DestPinCode.id', '=', 'docket_masters.Dest_Pin')
        ->leftJoin('cities as ScourceCity', 'ScourceCity.id', '=', 'ScourcePinCode.city')
        ->leftJoin('cities as DestCity', 'DestCity.id', '=', 'DestPinCode.city')
        ->leftJoin('states as Deststat', 'Deststat.id', '=', 'DestPinCode.State')
        ->leftjoin('docket_product_details','docket_masters.id','docket_product_details.Docket_Id')
        ->leftjoin("docket_booking_types","docket_booking_types.id","docket_masters.Booking_Type")

        ->Select("docket_masters.Docket_No",DB::raw("DATE_FORMAT(docket_masters.Booking_Date,'%d-%m-%Y') as BookingDatte")
        ,'ScourceCity.CityName as SourceCity','ScourcePinCode.PinCode as SrcPin','DestCity.CityName as DestCity','DestPinCode.PinCode as DestPin',
        'Deststat.name as DestNameSt',
        "customer_masters.CustomerName","consignor_masters.ConsignorName",  "consignees.ConsigneeName",
        "docket_product_details.Qty","docket_product_details.Actual_Weight","docket_product_details.Charged_Weight",
        "docket_statuses.title","docket_allocations.BookDate","MainOff.OfficeName"
        
        )
        ->where(function($query) {
            if(isset($this->date['from']) && isset($this->date['to'])){
                $query->whereBetween("Date" ,[$this->date['from'],$this->date['to']]);
            }
        })
        ->orderBy('NDR_Trans.id','DESC')
        ->get();
       
    }

    public function headings(): array
    {
        return [
            'Docket Number',
            'Booking Date',
            'Origin City',
            'Destination City',
            'Customer Name',
            'Consignor Name',
            'Consignee Name',
            'Pcs.',
            'Act. Wt.',
            'Chg. Wt.',
            'Activity',
            'Activity Date',
            'Branch Name',
            '1st Attempted Remarks',
            '1st Attempted Date',
            '2end Attempted Remarks',
            '2end Attempted Date',
            '3rd Attempted Remarks',
            '3rd Attempted Date',
          
         ];
    }
}