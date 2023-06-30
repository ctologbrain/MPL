<?php
namespace App\Exports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Operation\VehicleGatepass;
use DB;
class VehicleArrivalExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct($office,$date,$status) {
        $this->office = $office;
        $this->date=$date;
        $this->status=$status;
        
      
        
 }
    public function collection()
    {
       return   $Report = VehicleGatepass::leftjoin("gate_pass_receivings","gate_pass_receivings.Gp_Id","vehicle_gatepasses.id")
       ->leftjoin("vehicle_masters","gate_pass_receivings.Gp_Id","vehicle_masters.id")
       ->leftjoin("vehicle_types","vehicle_types.id","vehicle_masters.VehicleModel")

       ->leftjoin("employees","employees.user_id","vehicle_gatepasses.Created_By")
       ->leftjoin("office_masters","office_masters.id","employees.OfficeName")
       ->leftjoin("route_masters","route_masters.id","vehicle_gatepasses.Route_ID")
       ->leftjoin("touch_points","route_masters.id","touch_points.RouteId")
       ->leftJoin('cities as ScourceCity', 'ScourceCity.id', '=', 'route_masters.Source')
       ->leftJoin('cities as DestCity', 'DestCity.id', '=', 'route_masters.Destination')
       ->leftJoin('cities as TocuPoint', 'TocuPoint.id', '=', 'touch_points.CityId')
       ->leftjoin('vehicle_trip_sheet_transactions','vehicle_trip_sheet_transactions.id','vehicle_gatepasses.Fpm_Number')
       ->select( DB::raw("CONCAT(office_masters.OfficeCode,'~',office_masters.OfficeName) as Hub"),"ScourceCity.CityName as Location",
       "vehicle_trip_sheet_transactions.Reporting_Time", "vehicle_gatepasses.GP_TIME",
       DB::raw("GROUP_CONCAT(DISTINCT TocuPoint.CityName ORDER BY touch_points.RouteOrder SEPARATOR '-' ) as TouchCity")
      ,"vehicle_types.Capacity" )
      //"DestCity.CityName as DCity"
       ->where(function($query){
        if($this->office!=''){
            $query->where("office_masters.id",$this->office);
        }
       })
       ->where(function($query){
        if(isset($this->date['formDate']) &&  isset($this->date['todate'])){
            $query->whereBetween(DB::raw("DATE_FORMAT(vehicle_gatepasses.GP_TIME,'%Y-%m-%d')"),[$this->date['formDate'],$this->date['todate']]);
        }
       })
       ->where(function($query){
        if($this->status=='DEPARTURE'){
            $query->whereNull("gate_pass_receivings.Rcv_Date");
        }
        elseif($this->status=='ARRIVAL'){
            $query->whereNotNull("gate_pass_receivings.Rcv_Date");
        }
    })
    ->get();
    }
    public function headings(): array
    {
        return [
            'HUB Name',
            'Location name',
            'Scheduled',
            'Actual',
            'Route',
            'Vehicle Capacity',
            'Ideal Capacity',
            'Percentage Of Ontime Vehicle'
        ];
    }

}