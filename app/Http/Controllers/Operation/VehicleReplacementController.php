<?php

namespace App\Http\Controllers\Operation;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVehicleReplacementRequest;
use App\Http\Requests\UpdateVehicleReplacementRequest;
use App\Models\Operation\VehicleReplacement;
use Illuminate\Http\Request;
use Auth;
use App\Models\Vendor\DriverMaster;
use App\Models\OfficeSetup\OfficeMaster;
use App\Models\Operation\VehicleGatepass;
use App\Models\Operation\RepReason;
use App\Models\OfficeSetup\NdrMaster;
use App\Models\Vendor\VehicleMaster;
use Illuminate\Support\Facades\Storage;
class VehicleReplacementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $OfficeMaster=OfficeMaster::get();
        $DriverMaster=DriverMaster::get();
        $RepReason=NdrMaster::where("vrr","Yes")->get();
        $VehicleMaster=VehicleMaster::get();
        return view('Operation.vehicleReplacment', [
            'title'=>'VEHICLE REPLACEMENT / BREAKDOWN',
            'OfficeMaster'=>$OfficeMaster,
            'DriverMaster'=>$DriverMaster,
            'RepReason'=>$RepReason,
            'VehicleMaster'=>$VehicleMaster
          ]);
    }
    public function getVehicleGateDetailsById(Request $request)
    {
        $gatePassDetails=VehicleGatepass::with('fpmDetails','VendorDetails','VehicleTypeDetails','VehicleDetails','DriverDetails','RouteMasterDetails','getPassDocketDetails')
        ->where('GP_Number',$request->gatePass)->first();
        if(!empty($gatePassDetails))
        {
        echo json_encode($gatePassDetails);
        }
        else{
            $datas=array('status'=>'false','message'=>'Gatepass number not found');
            echo json_encode($datas);
        }
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
     * @param  \App\Http\Requests\StoreVehicleReplacementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVehicleReplacementRequest $request)
    {
        date_default_timezone_set('Asia/Kolkata');
        $UserId=Auth::id();
        $lastid=VehicleReplacement::insertGetId(['Gp_id'=>$request->gp_id,'Incidence'=>$request->Incidence,'Change_City' => $request->vechile_change_city,'Old_Vehicle'=>$request->new_vechile_number,'New_Vehicle'=>$request->Vehicle,'Old_Driver'=>$request->new_driver_name,'New_Driver'=>$request->new_driver_name,'Reason'=>$request->reason,'Remark'=>$request->remark,'Created_By'=>$UserId]);
        $docketFiles=VehicleReplacement::
        leftjoin('gate_pass_with_dockets','gate_pass_with_dockets.GatePassId','=','vehicle_break_rep.Gp_id')
        ->leftjoin('ndr_masters','ndr_masters.id','=','vehicle_break_rep.Reason')
        ->leftjoin('docket_allocations','gate_pass_with_dockets.Docket','=','docket_allocations.Docket_No')
        ->leftjoin('users','users.id','=','vehicle_break_rep.Created_By')
       ->leftjoin('employees','employees.user_id','=','users.id')
       ->leftjoin('office_masters','employees.OfficeName','=','office_masters.id')
       ->select('vehicle_break_rep.*','employees.EmployeeName','ndr_masters.ReasonCode','ndr_masters.ReasonDetail','gate_pass_with_dockets.Docket','office_masters.OfficeCode','office_masters.OfficeName')
       ->where('vehicle_break_rep.Gp_id',$request->gp_id)
       ->where('docket_allocations.Status','!=',8)
       ->groupby('docket_allocations.Docket_No')
      ->get();
      foreach($docketFiles as $docketFile)
      {
          if($docketFile->Incidence==1)
          {
              $vehInst='VEHICLE REPLACEMENT';
          }
          if($docketFile->Incidence==2)
          {
              $vehInst='VEHICLE BREAKDOWN';
          }
          if($docketFile->Incidence==3)
          {
              $vehInst='VEHICLE INTRANSIT';
          }
        $string = "<tr><td>$vehInst</td><td>".date('d-m-Y')."</td><td><strong>GATEPASS NO: </strong>$request->gp_number<br><strong>REASON: </strong>$docketFile->ReasonCode ~ $docketFile->ReasonDetail<br><strong>REMARKS : </strong>$docketFile->Remark</td><td>".date('d-m-Y h:i A')."</td><td>".$docketFile->EmployeeName." <br>(".$docketFile->OfficeCode.'~'.$docketFile->OfficeName.")</td></tr>"; 
        Storage::disk('local')->append($docketFile->Docket, $string);
      }
      

     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\VehicleReplacement  $vehicleReplacement
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleReplacement $vehicleReplacement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\VehicleReplacement  $vehicleReplacement
     * @return \Illuminate\Http\Response
     */
    public function edit(VehicleReplacement $vehicleReplacement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVehicleReplacementRequest  $request
     * @param  \App\Models\Operation\VehicleReplacement  $vehicleReplacement
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVehicleReplacementRequest $request, VehicleReplacement $vehicleReplacement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\VehicleReplacement  $vehicleReplacement
     * @return \Illuminate\Http\Response
     */
    public function destroy(VehicleReplacement $vehicleReplacement)
    {
        //
    }
}
