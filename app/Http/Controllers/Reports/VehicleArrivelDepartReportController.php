<?php

namespace App\Http\Controllers\Reports;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\StoreVehicleArrivelDepartReportRequest;
use App\Http\Requests\UpdateVehicleArrivelDepartReportRequest;
use App\Models\Reports\VehicleArrivelDepartReport;
use App\Models\Operation\VehicleGatepass;
use DB;
use App\Models\OfficeSetup\OfficeMaster;
class VehicleArrivelDepartReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $date =[];
        $office ='';
        $status='';
        if($request->formDate){
            $date['from'] =date("Y-m-d",strtotime($request->formDate));
        }
        if($request->todate){
             $date['to'] =date("Y-m-d",strtotime($request->todate));
        }
        if($request->office){
            $office = $request->office;
       }

       if($request->status){
        $status = $request->status;
        }

        $Report = VehicleGatepass::leftjoin("gate_pass_receivings","gate_pass_receivings.Gp_Id","vehicle_gatepasses.id")
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
        ->select("office_masters.OfficeCode","office_masters.OfficeName",
        DB::raw("GROUP_CONCAT(DISTINCT TocuPoint.CityName ORDER BY touch_points.RouteOrder SEPARATOR '-' ) as TouchCity")
       ,"vehicle_types.Capacity","ScourceCity.CityName as Location","vehicle_gatepasses.GP_TIME" ,"DestCity.CityName as DCity","vehicle_trip_sheet_transactions.Reporting_Time")
        ->where(function($query) use($office){
            if($office!=""){
                $query->where("office_masters.id",$office);
            }
        })
        ->where(function($query) use($date){
            if(isset($date['from']) && isset($date['to'])){
            $query->whereBetween(DB::raw("DATE_FORMAT(vehicle_gatepasses.GP_TIME, '%Y-%m-%d')"), [$date['from'],$date['to']]);
            }
        })
        ->where(function($query) use($status){
            if($status=='DEPARTURE'){
                $query->whereNull("gate_pass_receivings.Rcv_Date");
            }
            elseif($status=='ARRIVAL'){
                $query->whereNotNull("gate_pass_receivings.Rcv_Date");
            }
        })
        ->groupBy("vehicle_masters.id")
        ->paginate(10);
       $office = OfficeMaster::get();
         return view("Operation.VehicleArrivelDepartReport",
        ["title"=>"Vehicle Arrivel Departure -Report",
        "Report"=>$Report,
        "OfficeMaster" => $office]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVehicleArrivelDepartReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVehicleArrivelDepartReportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reports\VehicleArrivelDepartReport  $vehicleArrivelDepartReport
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleArrivelDepartReport $vehicleArrivelDepartReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reports\VehicleArrivelDepartReport  $vehicleArrivelDepartReport
     * @return \Illuminate\Http\Response
     */
    public function edit(VehicleArrivelDepartReport $vehicleArrivelDepartReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVehicleArrivelDepartReportRequest  $request
     * @param  \App\Models\Reports\VehicleArrivelDepartReport  $vehicleArrivelDepartReport
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVehicleArrivelDepartReportRequest $request, VehicleArrivelDepartReport $vehicleArrivelDepartReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reports\VehicleArrivelDepartReport  $vehicleArrivelDepartReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(VehicleArrivelDepartReport $vehicleArrivelDepartReport)
    {
        //
    }
}
