<?php

namespace App\Http\Controllers\SalesReport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\StoreVehicleUsageAnalysReportRequest;
use App\Http\Requests\UpdateVehicleUsageAnalysReportRequest;
use App\Models\SalesReport\VehicleUsageAnalysReport;
use App\Models\OfficeSetup\OfficeMaster;
use App\Models\Operation\DocketMaster;
use App\Models\OfficeSetup\city;
use App\Models\Vendor\VehicleMaster;
use App\Models\Vendor\VendorMaster;

use App\Models\Operation\VehicleGatepass;

use DB;

class VehicleUsageAnalysReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
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

        $originCity= city::get();
        $DestCity= '';
       $vehicle =VehicleMaster::get();
       $vendor =VendorMaster::get();


       $Docket= VehicleMaster::join('vehicle_gatepasses','vehicle_gatepasses.vehicle_id','vehicle_masters.id')
       ->leftjoin('gate_pass_with_dockets','gate_pass_with_dockets.GatePassId','vehicle_gatepasses.id')
       ->leftjoin('vehicle_trip_sheet_transactions','vehicle_gatepasses.Fpm_Number','vehicle_trip_sheet_transactions.id')
       ->leftjoin('docket_masters','gate_pass_with_dockets.Docket','docket_masters.Docket_No')
       ->leftjoin('docket_product_details','docket_masters.id','docket_product_details.Docket_Id')

       ->leftjoin('pincode_masters as OPM','docket_masters.Origin_Pin','OPM.id')
       ->leftjoin('cities as OrgCity','OPM.city','OrgCity.id')

       ->leftjoin('pincode_masters as PNM','docket_masters.Dest_Pin','PNM.id')
       ->leftjoin('cities as DESTCITY','PNM.city','DESTCITY.id')

       ->leftjoin('vendor_masters','vehicle_masters.VendorName','vendor_masters.id')
       ->leftjoin('vehicle_types','vehicle_types.id','vehicle_masters.VehicleModel')
       ->select('vehicle_trip_sheet_transactions.FPMNo','OrgCity.Code as OrgCode','OrgCity.CityName as OrgCityName',
       'vendor_masters.VendorName','vendor_masters.VendorCode','vehicle_masters.VehicleNo','vehicle_types.Capacity',
       'vehicle_types.VehicleType','vehicle_trip_sheet_transactions.Fpm_Date','vehicle_gatepasses.vehicle_id as VID',
       DB::raw('COUNT(DISTINCT vehicle_gatepasses.id) as TotalGP'),
       DB::raw('COUNT(DISTINCT gate_pass_with_dockets.Docket) as TotalDocket'),
       DB::raw('SUM(docket_product_details.Actual_Weight) as TotalActualWT'),
       DB::raw('SUM(docket_product_details.Charged_Weight) as TotalChargeWT')
       )
       ->where(function($query) use($date){
        if(isset($date['formDate']) &&  isset($date['todate'])){
            $query->whereBetween(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),[$date['formDate'],$date['todate']]);
        }
       })
       ->where(function($query) use($originCityData){
        if($originCityData!=''){
            $query->where("cities.id","=",$originCityData);
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
       ->groupBy('vehicle_masters.id')
       ->paginate(10);
       return view('SalesReport.VehicleUsageAnalysis', [
        'title'=>'Vehicle Usage Analysis Report',
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
     * @param  \App\Http\Requests\StoreVehicleUsageAnalysReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVehicleUsageAnalysReportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SalesReport\VehicleUsageAnalysReport  $vehicleUsageAnalysReport
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleUsageAnalysReport $vehicleUsageAnalysReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SalesReport\VehicleUsageAnalysReport  $vehicleUsageAnalysReport
     * @return \Illuminate\Http\Response
     */
    public function edit(VehicleUsageAnalysReport $vehicleUsageAnalysReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVehicleUsageAnalysReportRequest  $request
     * @param  \App\Models\SalesReport\VehicleUsageAnalysReport  $vehicleUsageAnalysReport
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVehicleUsageAnalysReportRequest $request, VehicleUsageAnalysReport $vehicleUsageAnalysReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SalesReport\VehicleUsageAnalysReport  $vehicleUsageAnalysReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(VehicleUsageAnalysReport $vehicleUsageAnalysReport)
    {
        // 
    }

    public function VehicleUsageAnalysisInner(Request $req){
     $VehicleId =  $req->vehicle;
   //  $req->vehicle;
        $formDate= $req->formDate;
        $todate= $req->todate;
     $FPMDatials=   VehicleGatepass::leftjoin('vehicle_trip_sheet_transactions','vehicle_gatepasses.Fpm_Number','vehicle_trip_sheet_transactions.id')
        ->leftjoin('vehicle_masters','vehicle_gatepasses.vehicle_id','vehicle_masters.id')
        ->leftjoin('vendor_masters','vehicle_masters.VendorName','vendor_masters.id')
        ->leftjoin('vehicle_types','vehicle_types.id','vehicle_masters.VehicleModel')
        ->where('vehicle_gatepasses.vehicle_id',$VehicleId)->first();

        
        $GPVehicleDatials=    VehicleGatepass::leftjoin('gate_pass_with_dockets','gate_pass_with_dockets.GatePassId','vehicle_gatepasses.id')
        ->leftjoin('docket_masters','gate_pass_with_dockets.Docket','docket_masters.Docket_No')
        ->leftjoin('docket_product_details','docket_masters.id','docket_product_details.Docket_Id')

        ->leftjoin('pincode_masters as OPM','docket_masters.Origin_Pin','OPM.id')
        ->leftjoin('cities as OrgCity','OPM.city','OrgCity.id')
       ->leftjoin('pincode_masters as PNM','docket_masters.Dest_Pin','PNM.id')
       ->leftjoin('cities as DESTCITY','PNM.city','DESTCITY.id')

        ->leftjoin('route_masters','route_masters.id','vehicle_gatepasses.Route_ID')
        ->leftjoin('touch_points','route_masters.id','touch_points.RouteId')
        ->leftjoin('cities','touch_points.CityId','cities.id')
        ->select(DB::raw('COUNT(DISTINCT gate_pass_with_dockets.Docket) as TotalDocket'),
        DB::raw('SUM(docket_product_details.Actual_Weight) as TotalActualWT'),
        DB::raw('SUM(docket_product_details.Charged_Weight) as TotalChargeWT'),
        DB::raw('GROUP_CONCAT(DISTINCT cities.CityName SEPARATOR "-") as RoutLine'),
        'OrgCity.Code as OrgCode','OrgCity.CityName as OrgCityName',
        'DESTCITY.Code as DESTCode','DESTCITY.CityName as DESTCityName',
        'vehicle_gatepasses.GP_Number','vehicle_gatepasses.GP_TIME')
        ->where('vehicle_gatepasses.vehicle_id',$VehicleId)
        ->where(function($query) use($formDate, $todate){
            if($formDate!='' &&  $todate!=''){
                $query->whereBetween(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),[$formDate,$todate]);
            }
           })
        ->groupBy('vehicle_gatepasses.id')
        ->get();
        return view('SalesReport.VehicleUsageAnalysisInner', [
            'FPMDatials' =>$FPMDatials,
            'GPVehicleDatials' => $GPVehicleDatials]);
    }
}
