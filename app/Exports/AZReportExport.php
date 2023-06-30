<?php
namespace App\Exports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Operation\DocketMaster;
use DB;
class AZReportExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct($originCityData,$date) {
        $this->originCityData = $originCityData;
        $this->date=$date;
      
        
 }
    public function collection()
    {
       return DocketMaster:: leftjoin('docket_booking_types','docket_booking_types.id','=','docket_masters.Booking_Type')
      ->leftjoin('pincode_masters','pincode_masters.id','=','docket_masters.Origin_Pin')
       ->leftjoin('cities','cities.id','=','pincode_masters.city')
       ->leftjoin('docket_allocations','docket_masters.Docket_No','=','docket_allocations.Docket_No')
       ->where(function($query){
        if($this->originCityData!=''){
            $query->where("cities.id",$this->originCityData);
        }
       })
       ->where(function($query){
        if(isset($this->date['formDate']) &&  isset($this->date['todate'])){
            $query->whereBetween(DB::raw("DATE_FORMAT(pickup_date,'%Y-%m-%d')"),[$this->date['formDate'],$this->date['todate']]);
        }
       })
       ->select(
           "cities.CityName","docket_booking_types.BookingType",
           DB::raw("COUNT(docket_masters.id) as TotalBooking"),
           DB::raw("SUM(CASE WHEN docket_allocations.Status!=8  THEN 1 ELSE 0  END ) as TotaNotDel"),
           DB::raw("SUM(CASE WHEN docket_allocations.Status=9  THEN 1 ELSE 0  END ) as TotNDR"))
       ->groupBy(['cities.id','docket_masters.Booking_Type'])
       ->get();
    }
    public function headings(): array
    {
        return [
            'Origin',
            'Booking Type',
            'Total Booking',
            'Not Delivered',
            'NDR'
        ];
    }

}