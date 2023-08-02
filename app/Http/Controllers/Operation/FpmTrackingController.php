<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;

use App\Http\Requests\StorefpmTrackingRequest;
use App\Http\Requests\UpdatefpmTrackingRequest;
use App\Models\Operation\fpmTracking;
use App\Models\Operation\VehicleTripSheetTransaction;
use App\Models\Operation\VehicleGatepass;
use Illuminate\Http\Request; 
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FPMTrackingExport;
class FpmTrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Operation.fpmTracking', [
             'title'=>'FPM TRACKING']);
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
     * @param  \App\Http\Requests\StorefpmTrackingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorefpmTrackingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\fpmTracking  $fpmTracking
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, fpmTracking $fpmTracking)
    {
        //
      $FPM=  $request->fpmNumber;
      $fpmDetails =VehicleTripSheetTransaction::with('VendorDetails','VehicleDetails','DriverDetails','RouteMasterDetails','VehicleModelDetails')->where("FPMNo",$FPM)->first();

      if(!empty($fpmDetails)){
      $vehicleGatepass = VehicleGatepass::with('VehicleTypeDetails','VendorDetails','VehicleDetails','RouteMasterDetails')->where("Fpm_Number", $fpmDetails->id)->get();
            if(!empty($vehicleGatepass)){
               echo json_encode(array('status'=>1,'Fpmdatas'=>$fpmDetails,'vehicleGatepass'=>$vehicleGatepass));
            }
            else{
                echo json_encode(array('status'=>1,'Fpmdatas'=>$fpmDetails,'vehicleGatepass'=>[]));
            }
        }
        else{
            echo json_encode(array('status'=>0,'Fpmdatas'=>[]));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\fpmTracking  $fpmTracking
     * @return \Illuminate\Http\Response
     */
    public function edit(fpmTracking $fpmTracking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatefpmTrackingRequest  $request
     * @param  \App\Models\Operation\fpmTracking  $fpmTracking
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatefpmTrackingRequest $request, fpmTracking $fpmTracking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\fpmTracking  $fpmTracking
     * @return \Illuminate\Http\Response
     */
    public function destroy(fpmTracking $fpmTracking)
    {
        //
    }

    public function FPMTrackExport(Request $request){
      $fpmId =  $request->get("fpmId");
      if($fpmId){
           return  Excel::download(new FPMTrackingExport($fpmId),'FPMTrackingExport.xlsx');
      }

    }
}
