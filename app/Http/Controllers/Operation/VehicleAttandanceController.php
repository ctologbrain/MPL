<?php

namespace App\Http\Controllers\Operation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreVehicleAttandanceRequest;
use App\Http\Requests\UpdateVehicleAttandanceRequest;
use App\Models\Operation\VehicleAttandance;
use App\Models\Vendor\VehicleMaster;
use App\Models\OfficeSetup\OfficeMaster;
 use App\Models\OfficeSetup\employee;
use Auth;
use DB;

class VehicleAttandanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicle = VehicleMaster::where("Is_Active","Yes")->get();
        return view('Operation.VehicleAttandance', [
            'title'=>'VEHICLE ATTENDANCE',
            'vehicle' => $vehicle
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
     * @param  \App\Http\Requests\StoreVehicleAttandanceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVehicleAttandanceRequest $request)
    {
        //rdate
         $UserId= Auth::id();
        VehicleAttandance::insert(['ReportingDate'=>date("Y-m-d",strtotime($request->rdate)),
        'ReportingTime'=>$request->ReportingTime,
        'ReportingType'=>$request->reporting_type,
        'Remark'=>$request->Remarks,
        'VehicleId'=>$request->vehicleId,
        'Created_By'=>$UserId]);
        echo 'Submit Sucessfully';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\VehicleAttandance  $vehicleAttandance
     * @return \Illuminate\Http\Response
     */
    public function show(request $request ,VehicleAttandance $vehicleAttandance)
    {
        //
     $vehicleId=  $request->vehicleId;
     $getData= VehicleMaster::with('VendorDetails','VehicleTypeDetails','officeDetails')->where("id",$vehicleId)->first();
     if(empty($getData)){
        echo json_encode(array("Status"=>0));
     }
     else{
        echo json_encode(array("datas"=>$getData,"Status"=>1));
     }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\VehicleAttandance  $vehicleAttandance
     * @return \Illuminate\Http\Response
     */
    public function edit(VehicleAttandance $vehicleAttandance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVehicleAttandanceRequest  $request
     * @param  \App\Models\Operation\VehicleAttandance  $vehicleAttandance
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVehicleAttandanceRequest $request, VehicleAttandance $vehicleAttandance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\VehicleAttandance  $vehicleAttandance
     * @return \Illuminate\Http\Response
     */
    public function destroy(VehicleAttandance $vehicleAttandance)
    {
        //
    }

    public function VehicleAttendenceReport(Request $request)
    {
        $date=[];
        $officeData = '';
        if($request->fromDate){
            $date['fromDate'] =date("Y-m-d",strtotime($request->fromDate));
        }
        if($request->todate){
            $date['todate'] = date("Y-m-d",strtotime($request->todate));
        }
        if($request->office){
            $officeData =  $request->office;
        }
        $office =OfficeMaster::where("Is_Active","Yes")->get();
      $vehicle=  VehicleAttandance::with('vehicleDetails','UserDetails')
        ->where(function($query) use($date){
            if(isset($date['fromDate']) && isset($date['todate'])){

                $query->whereBetween("ReportingDate",[$date['fromDate'],$date['todate']]);
            }
        })
        ->where(function($query) use($officeData){
            if($officeData!=''){
                $query->whereRelation("UserDetails","OfficeName",$officeData);
            }
        })
        ->paginate(10);
        return view('Operation.VehicleAttendanceReport', [
            'title'=>'VEHICLE ATTENDANCE',
            'vehicle'=>$vehicle,
             'office'=>  $office
        ]);
    }
}
