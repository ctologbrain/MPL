<?php
namespace App\Exports;
use App\Models\Operation\PickupScanAndDocket;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Operation\GenerateSticker;

use DB;
class ShortBookingDashboardExport implements FromCollection, WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct() {
    
    }

    public function collection()
    {
        return  GenerateSticker::leftjoin("docket_allocations","docket_allocations.Docket_No","Sticker.Docket")
        ->leftjoin("employees","employees.user_id","Sticker.CreatedBy")
        ->leftjoin("office_masters as empoff","empoff.id","employees.OfficeName")
        ->leftjoin("customer_masters","customer_masters.id","Sticker.CustId")
        ->leftjoin("cities as OrgCity","OrgCity.id","Sticker.Origin")
        ->leftjoin("office_masters as MainOffice","MainOffice.id","Sticker.BookingOffice")
        ->leftjoin("cities as DestCity","DestCity.id","Sticker.Destination")
        ->select(
            DB::raw("CONCAT(empoff.OfficeCode ,'~',empoff.OfficeName  ) as EmpOff"),DB::raw("CONCAT(MainOffice.OfficeCode ,'~',MainOffice.OfficeName  ) as MainOff"),
        "Sticker.Docket" ,   DB::raw("CONCAT(customer_masters.CustomerCode ,'~',customer_masters.CustomerName  ) as cust"),
        DB::raw("CONCAT(OrgCity.Code ,'~',OrgCity.CityName  ) as OrgC"),
        DB::raw("CONCAT(DestCity.Code ,'~',DestCity.CityName  ) as DestC"),
        "Sticker.Mode", "Sticker.Pices","Sticker.Width","Sticker.BookingDate")
        ->where("Sticker.Manual","=",1)
        ->where("Sticker.Status","=",0)
        ->whereIn("docket_allocations.Status",[0,1,2])->get();
        
    }
    public function headings(): array
    {
        return [
            'Entry Office',
            'Booking  Office',
            'Docket Number',
            'Customer Name',
            'Booking Date',
            'Orig. City',
            'Dest. City',
            'Mode',
            'Pcs',
            'Weight',
            'Remark'
         ];
    }

}