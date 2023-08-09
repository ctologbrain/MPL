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
        $employee =employee::get();
        return view('Tooladmin.EditpickupSacn', [
            'title'=>'Edit PICKUP SCAN',
            'vendor'=>$vendor,
            'driver'=>$driver,
            'employee' =>$employee
            
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
        if($request->vehicleType=="Market Vehicle"){
            $check  = VehicleMaster::where("VehicleNo",$request->vehicleNo)->first();
            if(!empty($check)){
              $vhclNumber = $check->id;
            }
            else{
              $vhclNumber=VehicleMaster::insertGetId(["VehicleNo"=> $request->vehicleNo]);
             
            }
  
             
           }
           else{
              $vhclNumber =$request->vehicleNo;
           }
        $pickupLastId=PickupScan::where('id',$pickupId)->update(
            ['scanDate' => date("Y-m-d", strtotime($request->scanDate)),'vehicleType'=>$request->vehicleType,'vendorName'=>$request->vendorName,'vehicleNo'=>$vhclNumber,'driverName'=>$request->driverName,'startkm'=>$request->startkm,'endkm'=>$request->endkm,'marketHireAmount'=>$request->marketHireAmount,'unloadingSupervisorName'=>$request->unloadingSupervisorName,'pickupPersonName'=>$request->pickupPersonName,'remark'=>$request->remark,'advanceToBePaid'=>$request->advanceToBePaid,'paymentMode'=>$request->paymentMode,'advanceType'=>$request->advanceType,'UpdatedBy'=>$UserId,'updated_at'=>date('Y-m-d H:i:s')]
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
       $htmldata = PickupScanAndDocket::leftjoin("docket_masters","docket_masters.Docket_No","pickup_scan_and_dockets.Docket")
       ->leftjoin("docket_product_details","docket_product_details.Docket_Id","docket_masters.id")
       ->select("pickup_scan_and_dockets.Docket","docket_product_details.Qty","docket_product_details.Charged_Weight")
       ->where("pickup_scan_and_dockets.Pickup_id",$datas->id)->get();
       $htmltable ='';
        if(!empty($htmldata)){
            $htmltable .= "<table class='table table-bordered table-centered mb-1 mt-1'>
            <thead>
            <tr class='main-title text-dark'>
            <th>SN</th>
            <th>DOCKET NO</th>
            <th>PIECES</th>
            <th>WEIGHT</th>
            </tr></thead></tbody>";
            $i=0;
            foreach($htmldata as $key){
                $i++;
             $htmltable .=   " <tr>
                <td>".$i."</td>
                <td>".$key->Docket."</td>
                <td>".$key->Qty."</td>
                <td>".$key->Charged_Weight."</td>
                </tr>";

            }
            $htmltable .= "</tbody></table>";

        }
     

       if(!empty($datas)){
        echo json_encode(array("status"=>1,"datas"=>$datas,"htmltable"=>$htmltable));
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
