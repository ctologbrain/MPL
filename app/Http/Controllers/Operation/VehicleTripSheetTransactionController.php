<?php

namespace App\Http\Controllers\Operation;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreVehicleTripSheetTransactionRequest;
use App\Http\Requests\UpdateVehicleTripSheetTransactionRequest;
use App\Models\Operation\VehicleTripSheetTransaction;
use App\Models\Operation\TripType;
use App\Models\Operation\RouteMaster;
use Illuminate\Http\Request;
use App\Models\Operation\TouchPoints;
use App\Models\Vendor\VehicleMaster;
use App\Models\Vendor\VendorMaster;
use App\Models\Vendor\VehicleType;
use App\Models\Vendor\DriverMaster;
use DB;
use Auth;
class VehicleTripSheetTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $route=RouteMaster::
          leftJoin('cities as ScourceCity', 'ScourceCity.id', '=', 'route_masters.Source')
         ->leftJoin('cities as DestCity', 'DestCity.id', '=', 'route_masters.Destination')
         ->leftJoin('touch_points', 'touch_points.RouteId', '=', 'route_masters.id')
         ->leftJoin('cities as TocuPoint', 'TocuPoint.id', '=', 'touch_points.CityId')
         ->select('route_masters.id','ScourceCity.CityName as SourceCity','DestCity.CityName as DestCity',DB::raw("GROUP_CONCAT(TocuPoint.CityName SEPARATOR '-') as `TouchPointCity`"))
         ->groupBy('route_masters.id')
         ->get();
       $VehicleMaster=VehicleMaster::select('id','VehicleNo')->get();
        $TripType=TripType::get();
        $VendorMaster=VendorMaster::select('id','VendorName','VendorCode')->get();
        $VehicleType=VehicleType::select('id','VehicleType')->get();
        $DriverMaster=DriverMaster::select('id','License','DriverName')->get();
        return view('Operation.fpmGenrate', [
            'title'=>'FPM - GENERATE',
            'TripType'=>$TripType,
            'route'=>$route,
            'VehicleMaster'=>$VehicleMaster,
            'VendorMaster'=>$VendorMaster,
            'VehicleType'=>$VehicleType,
            'DriverMaster'=>$DriverMaster
            
         ]);
    }
    public function getSourceAndDest(Request $request)
    {
        $route=RouteMaster::with('StatrtPointDetails','EndPointDetails')->where('route_masters.id',$request->routeId)->first();
        echo json_encode($route);
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
     * @param  \App\Http\Requests\StoreVehicleTripSheetTransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVehicleTripSheetTransactionRequest $request)
    {
        $UserId=Auth::id();
        VehicleTripSheetTransaction::insert(['Route_Id' => $request->Route,'Fpm_Date'=> $request->fpm_date,'Trip_Type'=>$request->trip_type,'Vehicle_Type'=>$request->vehicle_type,'Vehicle_Provider'=>$request->vendor_name,'Vehicle_No'=>$request->vehicle_name,'Vehicle_Model'=>$request->vehicle_model,'Driver_Id'=>$request->driver_name,'Reporting_Time'=>$request->vec_report_date,'Weight'=>$request->weight,'vehcile_Load_Date'=>$request->vec_load_date,'Remark'=>$request->remark,'CreatedBy'=>$UserId]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\VehicleTripSheetTransaction  $vehicleTripSheetTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleTripSheetTransaction $vehicleTripSheetTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\VehicleTripSheetTransaction  $vehicleTripSheetTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(VehicleTripSheetTransaction $vehicleTripSheetTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVehicleTripSheetTransactionRequest  $request
     * @param  \App\Models\Operation\VehicleTripSheetTransaction  $vehicleTripSheetTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVehicleTripSheetTransactionRequest $request, VehicleTripSheetTransaction $vehicleTripSheetTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\VehicleTripSheetTransaction  $vehicleTripSheetTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(VehicleTripSheetTransaction $vehicleTripSheetTransaction)
    {
        //
    }
}
