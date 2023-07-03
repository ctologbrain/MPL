<?php
namespace App\Exports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Operation\DocketMaster;
use DB;
class MissingPODImageExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct() {
      
     }
    public function collection()
    {
       return  DocketMaster::leftjoin('docket_booking_types','docket_booking_types.id','=','docket_masters.Booking_Type')
       ->leftjoin('office_masters','office_masters.id','=','docket_masters.Office_ID')
       ->leftjoin('devilery_types','devilery_types.id','=','docket_masters.Delivery_Type')
       ->leftjoin('pincode_masters','pincode_masters.id','=','docket_masters.Origin_Pin')
       ->leftjoin('cities','cities.id','=','pincode_masters.city')
       ->leftjoin('states','states.id','=','cities.stateId')
       ->leftjoin('pincode_masters as DestPin','DestPin.id','=','docket_masters.Dest_Pin')
       ->leftjoin('cities as DestCity','DestCity.id','=','DestPin.city')
       ->leftjoin('states as DestState','DestState.id','=','DestCity.stateId')
       ->leftjoin('customer_masters','customer_masters.id','=','docket_masters.Cust_Id')
       ->leftjoin('employees as BookBy','BookBy.id','=','docket_masters.Booked_By')
       ->leftjoin('docket_allocations','docket_allocations.Docket_No','=','docket_masters.Docket_No')
       ->leftjoin('docket_statuses','docket_statuses.id','=','docket_allocations.Status')
       ->leftjoin('Regular_Deliveries','Regular_Deliveries.Docket_ID','=','docket_masters.Docket_No')
       ->leftjoin('UploadDocketImage','UploadDocketImage.DocketNo','=','docket_masters.Docket_No')
       ->whereNull("UploadDocketImage.file")
       ->select('docket_masters.Docket_No',   \DB::raw("CONCAT(customer_masters.CustomerCode, '-', customer_masters.CustomerName) AS Cust"),
        DB::raw("DATE_FORMAT(docket_masters.Booking_Date,'%d-%m-%Y') as BD"),
        'states.name','cities.CityName',
        'DestState.name as Dstate','DestCity.CityName as DCity',   DB::raw("DATE_FORMAT(Regular_Deliveries.Delivery_date,'%d-%m-%Y') as delDate"))
       ->get();
    }
    public function headings(): array
    {
        return [
            'Docket No.',
            'Client Name',
            'Booking Date',
            'Origin State',
            'Origin City',
            'Dest. State',
            'Dest. City',
            'Delivery Date'
        ];
    }

}