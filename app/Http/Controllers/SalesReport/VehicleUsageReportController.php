<?php

namespace App\Http\Controllers\SalesReport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\StoreVehicleUsageReportRequest;
use App\Http\Requests\UpdateVehicleUsageReportRequest;
use App\Models\SalesReport\VehicleUsageReport;
use App\Models\OfficeSetup\OfficeMaster;
use App\Models\Operation\DocketMaster;
use App\Models\OfficeSetup\city;
use App\Models\Vendor\VehicleMaster;
use App\Models\Vendor\VendorMaster;

use App\Models\Operation\VehicleGatepass;

use DB;

class VehicleUsageReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        //
        $date =[];
        $VehicleData = '';
        $VendorData = '';
        $originCityData='';
        $DestCityData='';
       
        if($req->office){
            $office =  $req->office;
        }
        else{
             $office = '';
        }

        if($req->formDate){
            $date['formDate']=  date("Y-m-d",strtotime($req->formDate));
        }
        
        if($req->todate){
           $date['todate']=  date("Y-m-d",strtotime($req->todate));
        }
       
        if(isset($req->Vendor)){
            $VendorData =  $req->Vendor;
        }
        

        if(isset($req->vehicle)){
            $VehicleData =  $req->vehicle;
        }

        if($req->originCity){
            $originCityData =  $req->originCity;
        }
        if($req->DestCity){
            $DestCityData =  $req->DestCity;
        }

        $originCity= city::where("is_active",1)->get();
        $DestCity= '';
       $vehicle =VehicleMaster::where("Is_Active","Yes")->get();
       $vendor =VendorMaster::where("Active","Yes")->get();


       $Docket= VehicleMaster::join('vehicle_gatepasses','vehicle_gatepasses.vehicle_id','vehicle_masters.id')
       ->leftjoin('gate_pass_with_dockets','gate_pass_with_dockets.GatePassId','vehicle_gatepasses.id')
       ->leftjoin('vehicle_trip_sheet_transactions','vehicle_gatepasses.Fpm_Number','vehicle_trip_sheet_transactions.id')
       ->join('docket_masters','gate_pass_with_dockets.Docket','docket_masters.Docket_No')
       ->leftjoin('docket_product_details','docket_masters.id','docket_product_details.Docket_Id')

       ->leftjoin('pincode_masters as OPM','docket_masters.Origin_Pin','OPM.id')
       ->leftjoin('cities as OrgCity','OPM.city','OrgCity.id')

       ->leftjoin('pincode_masters as PNM','docket_masters.Dest_Pin','PNM.id')
       ->leftjoin('cities as DESTCITY','PNM.city','DESTCITY.id')

       ->leftjoin('vendor_masters','vehicle_masters.VendorName','vendor_masters.id')
       ->leftjoin('vehicle_types','vehicle_types.id','vehicle_masters.VehicleModel')

       ->leftjoin('route_masters','route_masters.id','vehicle_gatepasses.Route_ID')
       ->leftjoin('touch_points','route_masters.id','touch_points.RouteId')
       ->leftjoin('cities','touch_points.CityId','cities.id')
       
       ->select('vehicle_trip_sheet_transactions.FPMNo','OrgCity.Code as OrgCode','OrgCity.CityName as OrgCityName',
       'vendor_masters.VendorName','vendor_masters.VendorCode','vehicle_masters.VehicleNo','vehicle_types.Capacity',
       'vehicle_types.VehicleType','vehicle_trip_sheet_transactions.Fpm_Date','vehicle_gatepasses.id as GPID',
       'vehicle_gatepasses.GP_Number','vehicle_gatepasses.GP_TIME',
       'DESTCITY.Code as DESTCode','DESTCITY.CityName as DESTCityName',
       DB::raw('COUNT(DISTINCT gate_pass_with_dockets.Docket) as TotalDocket'),
       DB::raw('SUM(docket_product_details.Actual_Weight) as TotalActualWT'),
       DB::raw('SUM(docket_product_details.Charged_Weight) as TotalChargeWT'),
       DB::raw('GROUP_CONCAT(DISTINCT cities.CityName SEPARATOR "-") as RoutLine')
       )
       ->where(function($query) use($date){
        if(isset($date['formDate']) &&  isset($date['todate'])){
            $query->whereBetween(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),[$date['formDate'],$date['todate']]);
        }
       })
       ->where(function($query) use($originCityData){
        if($originCityData!=''){
            $query->where("OrgCity.id","=",$originCityData);
        }
       })
       ->where(function($query) use($DestCityData){
        if($DestCityData!=''){
            $query->where("DESTCITY.id","=",$DestCityData);
        }
       })

       ->where(function($query) use($VehicleData){
        if($VehicleData!=''){
            $query->where("vehicle_masters.id","=",$VehicleData);
        }
       })
       ->where(function($query) use($VendorData){
        if($VendorData!=''){
            $query->where("vendor_masters.id","=",$VendorData);
        }
       })
       ->groupBy('vehicle_gatepasses.id')
       ->paginate(10);
       return view('SalesReport.VehicleUsage', [
        'title'=>'Vehicle Usage Report',
        'vehicleData'=>$Docket,
        'vendor'=>$vendor,
        'vehicle'=>$vehicle,
        'originCity'=>$originCity,
        'DestCity'=>$DestCity
    ]);
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
     * @param  \App\Http\Requests\StoreVehicleUsageReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVehicleUsageReportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SalesReport\VehicleUsageReport  $vehicleUsageReport
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleUsageReport $vehicleUsageReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SalesReport\VehicleUsageReport  $vehicleUsageReport
     * @return \Illuminate\Http\Response
     */
    public function edit(VehicleUsageReport $vehicleUsageReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVehicleUsageReportRequest  $request
     * @param  \App\Models\SalesReport\VehicleUsageReport  $vehicleUsageReport
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVehicleUsageReportRequest $request, VehicleUsageReport $vehicleUsageReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SalesReport\VehicleUsageReport  $vehicleUsageReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(VehicleUsageReport $vehicleUsageReport)
    {
        //
    }

    public function VehicleUsageInner(Request $req){
        $gpId =  $req->gpId;
        //  $req->vehicle;
        $formDate= date("Y-m-d", strtotime( $req->formDate));
        $todate=date("Y-m-d", strtotime( $req->todate));

        $GPDatials=    VehicleGatepass::leftjoin('vehicle_masters','vehicle_gatepasses.vehicle_id','vehicle_masters.id')
        ->leftjoin('vendor_masters','vehicle_masters.VendorName','vendor_masters.id')
        ->leftjoin('vehicle_types','vehicle_types.id','vehicle_masters.VehicleModel')
        ->where('vehicle_gatepasses.id',$gpId)->first();

        $DockVehicleDatials=    VehicleGatepass::leftjoin('gate_pass_with_dockets','gate_pass_with_dockets.GatePassId','vehicle_gatepasses.id')
        ->join('docket_masters','gate_pass_with_dockets.Docket','docket_masters.Docket_No')
        ->leftjoin('docket_product_details','docket_masters.id','docket_product_details.Docket_Id')
        ->leftjoin('customer_masters','customer_masters.id','docket_masters.Cust_Id')

        ->leftjoin('pincode_masters as OPM','docket_masters.Origin_Pin','OPM.id')
        ->leftjoin('cities as OrgCity','OPM.city','OrgCity.id')
       ->leftjoin('pincode_masters as PNM','docket_masters.Dest_Pin','PNM.id')
       ->leftjoin('cities as DESTCITY','PNM.city','DESTCITY.id')
       ->select('OrgCity.Code as OrgCode','OrgCity.CityName as OrgCityName',
        'DESTCITY.Code as DESTCode','DESTCITY.CityName as DESTCityName',
        'vehicle_gatepasses.GP_Number','vehicle_gatepasses.GP_TIME','customer_masters.CustomerCode',
        'customer_masters.CustomerName','docket_product_details.Qty','docket_product_details.Actual_Weight',
        'docket_masters.Docket_No','docket_masters.Booking_Date')
       ->where('vehicle_gatepasses.id',$gpId)
       ->where(function($query) use($formDate, $todate){
        if($formDate!='1970-01-01' &&  $todate!='1970-01-01'){
            $query->whereBetween(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),[$formDate,$todate]);
        }
       })
       ->groupBy('gate_pass_with_dockets.Docket')
       ->get();

        return view('SalesReport.VehicleUsageInner', [
            'GPDatials' =>$GPDatials,
            'DockVehicleDatials' => $DockVehicleDatials]);
    }
}
