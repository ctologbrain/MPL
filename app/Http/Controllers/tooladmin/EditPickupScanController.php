<?php

namespace App\Http\Controllers\tooladmin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEditPickupScanRequest;
use App\Http\Requests\UpdateEditPickupScanRequest;
use App\Models\Operation\EditPickupScan;

use App\Models\Operation\PickupScan;
use App\Models\Operation\PickupScanAndDocket;
use App\Models\Vendor\VehicleMaster;
use App\Models\Vendor\VendorMaster;
use App\Models\Vendor\DriverMaster;
use App\Models\Stock\DocketAllocation;
use App\Models\OfficeSetup\employee;
use App\Models\OfficeSetup\OfficeMaster;
use Auth;

class EditPickupScanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $vendor=VendorMaster::get();
        $driver=DriverMaster::get();
        return view('Tooladmin.EditpickupSacn', [
            'title'=>'Edit PICKUP SCAN',
            'vendor'=>$vendor,
            'driver'=>$driver
            
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
     * @param  \App\Http\Requests\StoreEditPickupScanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEditPickupScanRequest $request)
    {
        //

        date_default_timezone_set('Asia/Kolkata');
       $UserId= Auth::id();
        $pickupId = $request->pickupId;
        $pickupLastId=PickupScan::where('id',$pickupId)->update(
            ['scanDate' => $request->scanDate,'vehicleType'=>$request->vehicleType,'vendorName'=>$request->vendorName,'vehicleNo'=>$request->vehicleNo,'driverName'=>$request->driverName,'startkm'=>$request->startkm,'endkm'=>$request->endkm,'marketHireAmount'=>$request->marketHireAmount,'unloadingSupervisorName'=>$request->unloadingSupervisorName,'pickupPersonName'=>$request->pickupPersonName,'remark'=>$request->remark,'advanceToBePaid'=>$request->advanceToBePaid,'paymentMode'=>$request->paymentMode,'advanceType'=>$request->advanceType,'UpdatedBy'=>$UserId,'updated_at'=>date('Y-m-d H:i:s')]
        );
        $arr = array('status' => 'true', 'message' =>'Pickup Scan Edit Sucessfully');
        echo json_encode($arr);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\EditPickupScan  $editPickupScan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req, EditPickupScan $editPickupScan)
    {
        //

        $pickUpNo = $req->PickupNo;
       $datas= PickupScan::where("PickupNo",$pickUpNo)->first();
       if(!empty($datas)){
        echo json_encode(array("status"=>1,"datas"=>$datas));
       }
       else{
         echo json_encode(array("status"=>0,"datas"=>[]));
       }
       


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\EditPickupScan  $editPickupScan
     * @return \Illuminate\Http\Response
     */
    public function edit(EditPickupScan $editPickupScan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEditPickupScanRequest  $request
     * @param  \App\Models\Operation\EditPickupScan  $editPickupScan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEditPickupScanRequest $request, EditPickupScan $editPickupScan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\EditPickupScan  $editPickupScan
     * @return \Illuminate\Http\Response
     */
    public function destroy(EditPickupScan $editPickupScan)
    {
        //
    }


    public function EditPickupScanPrint(Request $req){
        $pickUpNo = $req->PickupNo;
       $datas= PickupScan::with('DriverDetail','venderDetail','EmployeeDetailSuperwiser','EmployeeDetailPickupPerson','VehicleDetail','CreationDetail')->where("PickupNo",$pickUpNo)->first();

       if(!empty($datas)){
        $pickUpId =  $datas->id;
         $PickWithDocket = PickupScanAndDocket::where("Pickup_id",$pickUpId)->get();
        return view('Tooladmin.PrintpickupSacn', [
            'title'=>'Print PICKUP SCAN',
            'data'=>$datas,
            'PickWithDocket'=>$PickWithDocket]);

       }
       
    }

}
