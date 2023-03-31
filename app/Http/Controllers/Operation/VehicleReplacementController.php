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
use App\Models\Vendor\VehicleMaster;
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
        $RepReason=RepReason::get();
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
        $UserId=Auth::id();
        $lastid=VehicleReplacement::insertGetId(['Incidence'=>$request->Incidence,'Change_City' => $request->vechile_change_city,'Old_Vehicle'=>$request->new_vechile_number,'New_Vehicle'=>$request->Vehicle,'Old_Driver'=>$request->new_driver_name,'New_Driver'=>$request->new_driver_name,'Reason'=>$request->reason,'Remark'=>$request->remark,'Created_At'=>$UserId]);
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
