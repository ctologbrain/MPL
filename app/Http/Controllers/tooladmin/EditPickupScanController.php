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
use Illuminate\Support\Facades\Storage;
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

        $docpick=PickupScan::leftjoin("pickup_scan_and_dockets","pickup_scan_and_dockets.Pickup_id","pickup_scans.id")
        ->leftjoin('vendor_masters','vendor_masters.id','=','pickup_scans.vendorName')
       ->leftjoin('vehicle_masters','vehicle_masters.id','=','pickup_scans.vehicleNo')
       ->leftjoin('vehicle_types','vehicle_types.id','=','vehicle_masters.VehicleModel')
       ->leftjoin('driver_masters','driver_masters.id','=','pickup_scans.driverName')
       ->leftjoin('users','users.id','=','pickup_scans.CreatedBy')
       ->leftjoin('employees as UpSup','UpSup.id','=','pickup_scans.unloadingSupervisorName')
       ->leftjoin('employees as pickupPer','pickupPer.id','=','pickup_scans.pickupPersonName')
       ->leftjoin('employees','employees.user_id','=','users.id')
        ->leftjoin('office_masters','employees.OfficeName','=','office_masters.id')
       ->select('vendor_masters.VendorName','vehicle_masters.VehicleNo','driver_masters.DriverName','pickup_scans.vehicleType','vehicle_types.VehicleType as Vtype','pickup_scans.startkm','pickup_scans.endkm','pickup_scans.pickupPersonName','pickup_scans.unloadingSupervisorName','employees.EmployeeName','pickup_scans.ScanDate','pickup_scans.PickupNo','office_masters.OfficeCode','office_masters.OfficeName','UpSup.EmployeeCode as UpEcode','UpSup.EmployeeName as upEname','pickupPer.EmployeeCode as PEcode','pickupPer.EmployeeName as PEname','pickup_scan_and_dockets.Docket')
       ->where('pickup_scans.id', $pickupId)->get();
       foreach($docpick as $PickpSabdScanInv){
        $string = "<tr><td>PICKUP SCAN UPDATE</td><td>".date("d-m-Y",strtotime($PickpSabdScanInv->ScanDate))."</td><td><strong>PICKUP NUMBER: </strong>$PickpSabdScanInv->PickupNo<br><strong>SCAN DATE: </strong>".date("d-m-Y",strtotime($PickpSabdScanInv->ScanDate))."<br><strong>VEHICLE TYPE: </strong>$PickpSabdScanInv->vehicleType<br><strong>VENDOR NAME: </strong>$PickpSabdScanInv->VendorName<br><strong>VEHICLE NUMBER: </strong>$PickpSabdScanInv->VehicleNo ~ $PickpSabdScanInv->Vtype<br><strong>DRIVER NAME: </strong>$PickpSabdScanInv->DriverName<br><strong>START KM: </strong>$PickpSabdScanInv->startkm<br><strong>END KM: </strong>$PickpSabdScanInv->endkm<br><strong>UNLOADING SUPERVISOR NAME: </strong>$PickpSabdScanInv->UpEcode~ $PickpSabdScanInv->upEname<br><strong>PICKUP PERSON NAME: </strong>$PickpSabdScanInv->pickupPersonName</td><td>".date('d-m-Y h:i A')."</td><td>".$PickpSabdScanInv->EmployeeName." <br>(".$PickpSabdScanInv->OfficeCode.'~'.$PickpSabdScanInv->OfficeName.")</td></tr>"; 
        Storage::disk('local')->append($PickpSabdScanInv->Docket, $string);
       }
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
            <th>DOCKET NO.</th>
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
