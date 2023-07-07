<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreGatePassTransferRequest;
use App\Http\Requests\UpdateGatePassTransferRequest;
use App\Models\Operation\GatePassTransfer;
use App\Models\Operation\VehicleGatepass;
use App\Models\Operation\DocketAllocation;
use App\Models\OfficeSetup\OfficeMaster;
use App\Models\Operation\GatePassWithDocket;
use Illuminate\Http\Request;
use Auth;
use App\Models\Operation\DocketMaster;
class GatePassTransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $office = OfficeMaster::get();
         return view('Operation.gatepassTransfer', [
             'title'=>'GATEPASS TRANSFER',
             'office'=>$office]);
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
     * @param  \App\Http\Requests\StoreGatePassTransferRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGatePassTransferRequest $request)
    { 
        $UserId = Auth::id();  
        date_default_timezone_set('Asia/Kolkata');
        if(!empty($request->Docket)){
       for($i=0; $i < count($request->Docket);  $i++){
           $avilable= GatePassTransfer::where("Docket_Id",$request->Docket[$i])->first();
          // if($avilable){
          //   $Arr[] =1;
          // }
          // else{

          // } 
            $DockId=   DocketMaster::where("Docket_No",$request->Docket[$i])->first();
           $bulkdata = array("GP_Id"=>$request->GP_id,"Old_Ofc_Id"=>$request->destination_office,"New_Ofc_Id"=>$request->transferToOffice,"Docket_Id"=>$DockId->id,"Created_By"=>$UserId,"Created_At"=>date('Y-m-d H:i:s'));
           GatePassTransfer::insert($bulkdata);
           GatePassWithDocket::where("destinationOffice",$request->destination_office)->where("Docket",$request->Docket[$i])->update(['destinationOffice'=>$request->transferToOffice,"UpdatedBy"=>$UserId,"Update_At"=>date('Y-m-d H:i:s')]);
         }
            echo json_encode(array("success"=>"true"));
     }
     else{
        echo json_encode(array("success"=>"false"));
     }
          
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\GatePassTransfer  $gatePassTransfer
     * @return \Illuminate\Http\Response
     */
    public function show(GatePassTransfer $gatePassTransfer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\GatePassTransfer  $gatePassTransfer
     * @return \Illuminate\Http\Response
     */
    public function edit(GatePassTransfer $gatePassTransfer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGatePassTransferRequest  $request
     * @param  \App\Models\Operation\GatePassTransfer  $gatePassTransfer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGatePassTransferRequest $request, GatePassTransfer $gatePassTransfer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\GatePassTransfer  $gatePassTransfer
     * @return \Illuminate\Http\Response
     */
    public function destroy(GatePassTransfer $gatePassTransfer)
    {
        //
    }

    public function getGatePassWithDocInfo(Request $request){
        $gatePassDetails=VehicleGatepass::with('fpmDetails','VendorDetails','VehicleTypeDetails','VehicleDetails','DriverDetails','RouteMasterDetails','getPassDocketDetails','getPassDocketDataDetails')->withCount('getPassDocketDataDetails as TotalDocket')->where("GP_Number", $request->gatepass_number)
        ->first(); 
        $gatepassId ='';
        if(isset($gatePassDetails->id)) {
         $gatepassId =   $gatePassDetails->id;
        }
         $office= GatePassWithDocket::leftjoin("office_masters","office_masters.id","gate_pass_with_dockets.destinationOffice")->where("gate_pass_with_dockets.GatePassId",$gatepassId)->groupBy('office_masters.OfficeName')->get();
         if(empty($office)){
            $office=[];
         }
        if(!empty($gatePassDetails)){
            $data=  array( "status"=>"true", "datas"=>$gatePassDetails,"office"=>$office);
        }
        else{
            $data=  array( "status"=>"false", "datas"=>$gatePassDetails,"office"=>$office);
        }
     echo json_encode($data);
    }

    public function getMutiDocketOnGate(Request $request){
         //->whereRelation("RouteMasterDetails.EndPointDetails", $request->destination_office )
        //->whereRelation("getAllocationDetail","Status",5)
        $office = '';
        if($request->destination_office!=''){
        $office = $request->destination_office;
        }

        $gatePassDetailsResult=VehicleGatepass::with('getPassDocketDetails','RouteMasterDetails')->where("GP_Number", $request->gatepass_number )->where(function($query) use($office){
                if($office!=''){
                     $query->whereRelation("getPassDocketDetails","destinationOffice",$office );
                    }
             })->get();
       
        if(!empty($gatePassDetailsResult)){
            $data=  array( "status"=>"true", "datas"=>$gatePassDetailsResult);
        }
        else{
            $data=  array( "status"=>"false", "datas"=>$gatePassDetailsResult);
        }
      echo json_encode($data);
    }
}
