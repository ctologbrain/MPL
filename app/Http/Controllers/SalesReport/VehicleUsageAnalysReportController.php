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
use DB;

class VehicleUsageAnalysReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date =[];
        $VehicleData = '';
        $VendorData = '';
        $originCityData='';
        $DestCityData='';
        $SaleType = '';
       
        if($req->DocketNo){
            $DocketNo =  $req->DocketNo;
        }
        else{
             $DocketNo = '';
        }

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

       ->leftjoin('pincode_masters','docket_masters.Origin_Pin','pincode_masters.id')
       ->leftjoin('cities','pincode_masters.city','cities.id')

       ->leftjoin('vendor_masters','vehicle_masters.VendorName','vendor_masters.id')
       ->leftjoin('vehicle_types','vehicle_types.id','vehicle_masters.VehicleModel')
       ->select('vehicle_trip_sheet_transactions.FPMNo','cities.Code','cities.CityName',
       'vendor_masters.VendorName','vendor_masters.VendorCode','vehicle_masters.VehicleNo','vehicle_types.Capacity',
       'vehicle_types.VehicleType','vehicle_trip_sheet_transactions.Fpm_Date',
       DB::raw('COUNT(vehicle_gatepasses.id as TotalGP)'),
       DB::raw('COUNT(gate_pass_with_dockets.Docket as TotalDocket)'),
       DB::raw('SUM(docket_product_details.Actual_Weight as TotalActualWT)'),
       DB::raw('SUM(docket_product_details.Charged_Weight as TotalChargeWT)')
       )
       ->groupBy('vehicle_masters.id')
       ->paginate(10);
       return view('SalesReport.VehicleUsageAnalysis', [
        'title'=>'Vehicle Usage Analysis Report',
        'vehicle'=>$Docket,
        // 'OfficeMaster'=>$Offcie,
        // 'Customer'=>$Customer,
        // 'ParentCustomer'=>$ParentCustomer,
        // 'originCity'=>$originCity,
        // 'DestCity'=>$DestCity,
        // 'DocketSale'=>$DocketSale
      
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
}
