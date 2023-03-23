<?php

namespace App\Http\Controllers\Operation;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreGatePassReceivingRequest;
use App\Http\Requests\UpdateGatePassReceivingRequest;
use App\Models\Operation\GatePassReceiving;
use Illuminate\Http\Request;
use App\Models\OfficeSetup\OfficeMaster;
use App\Models\Operation\GatePassWithDocket;
use App\Models\Operation\VehicleGatepass;
use App\Models\Operation\GatePassRecvTrans;
use App\Models\Operation\GatePassRecvDoc;
use App\Models\Stock\DocketAllocation;
use App\Models\Operation\GatePassCanceled;
use App\Models\Operation\DRSEntry;
use App\Models\Operation\ActivityType;


use Auth;
class GatePassReceivingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offcie=OfficeMaster::get();
        return view('Operation.gatepassreceiving', [
            'title'=>'GATEPASS - RECEIVING',
            'offcie'=>$offcie
            ]);
        
    }
    public function getGatePassDetails(Request $request)
    {
        $gatePassDetails=VehicleGatepass::with('fpmDetails','VendorDetails','VehicleTypeDetails','VehicleDetails','DriverDetails','RouteMasterDetails','getPassDocketDetails')
        ->where('vehicle_gatepasses.GP_Number',$request->getPass)->first();
        if(empty($gatePassDetails))
        {
            $datas=array('status'=>'false','message'=>'Gatepass not found');
        }
        else{
            $datas=array('status'=>'true','message'=>'success','datas'=>$gatePassDetails);
        }
        echo  json_encode($datas);
    }
    public function GetDocketWithGatePass(Request $request)
    {
      $checkDocket=GatePassWithDocket::where('Docket',$request->Docket)->where('GatePassId',$request->gatePassId)->first();
      if(empty($checkDocket))
      {
        $datas=array('status'=>'false','message'=>'Docket not found');
      }
      else{
        $datas=array('status'=>'true','message'=>'success','datas'=>$checkDocket);
      }
      echo  json_encode($datas);
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
     * @param  \App\Http\Requests\StoreGatePassReceivingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGatePassReceivingRequest $request)
    {
        $file=$request->file;
        $UserId=Auth::id();
         $checkDocket=GatePassReceiving::leftjoin('Gp_Recv_Trans','gate_pass_receivings.id','Gp_Recv_Trans.GP_Recv_Id')->where('Gp_Recv_Trans.Docket_No',$request->DocketNumber)->where('gate_pass_receivings.GP_Id',$request->gpNumber)->first();
       if($request->ReceivingType==2 || ($request->ReceivingType==1 && empty($checkDocket))){
            $lastid=GatePassReceiving::insertGetId(['Gp_Rcv_Type'=>$request->ReceivingType,'Rcv_Office' => $request->office,'Rcv_Date'=>$request->rdate,'Supervisor'=>$request->supervisorName,'Gp_Id'=>$request->gpNumber,'Remark'=>$request->Remark,'Recieved_By'=>$UserId]);
            }
            if($request->ReceivingType==1){

                if(empty($checkDocket))
                { 
                    GatePassRecvTrans::insertGetId(['GP_Recv_Id'=>$lastid,'Docket_No'=>$request->DocketNumber,'Recv_Qty'=>$request->ReceivedQty,'Balance_Qty'=>$request->ActualQty-$request->ReceivedQty]);
                    DocketAllocation::where("Docket_No", $request->DocketNumber)->update(['Status' =>6,'BookDate'=>$request->rdate]);
                    $getGatePass=GatePassReceiving::
                    leftjoin('office_masters','office_masters.id','=','gate_pass_receivings.Gp_Id')
                    ->join('Gp_Recv_Trans','gate_pass_receivings.id','Gp_Recv_Trans.GP_Recv_Id')
                    ->select('office_masters.OfficeName','office_masters.OfficeCode','gate_pass_receivings.*','Gp_Recv_Trans.*')
                    ->where('Gp_Id',$request->gpNumber)->get();
                    $html='';
                    $html.='<table class="table-responsive table-bordered" width="100%"><thead><tr class="main-title text-dark"><th>Docket</th><th>Destination Office</th><th>Pieces</th><th>Balance Pieces</th><th>Date</th><tr></thead><tbody>';
                    foreach($getGatePass as $getGate)
                    {
                        $html.='<tr><td>'.$getGate->Docket_No.'</td><td>'.$getGate->OfficeName.'</td><td>'.$getGate->Recv_Qty.'</td><td>'.$getGate->Balance_Qty.'</td><td>'.$getGate->Rcv_Date.'</td></tr>'; 
                        
                    }
                    $html.='<tbody></table>';
                    $datas=array('status'=>'true','message'=>'success','datas'=>$html);
                }
                else{
                   $getGatePass=GatePassReceiving::
                    leftjoin('office_masters','office_masters.id','=','gate_pass_receivings.Gp_Id')
                    ->join('Gp_Recv_Trans','gate_pass_receivings.id','Gp_Recv_Trans.GP_Recv_Id')
                    ->select('office_masters.OfficeName','office_masters.OfficeCode','gate_pass_receivings.*','Gp_Recv_Trans.*')
                    ->where('Gp_Id',$request->gpNumber)->get();
                   
                    $html='';
                    $html.='<table class="table-responsive table-bordered" width="100%"><thead><tr class="main-title text-dark"><th>Docket</th><th>Destination Office</th><th>Pieces</th><th>Balance Pieces</th><th>Date</th><tr></thead><tbody>';
                    foreach($getGatePass as $getGate)
                    {
                        $html.='<tr><td>'.$getGate->Docket_No.'</td><td>'.$getGate->OfficeName.'</td><td>'.$getGate->Recv_Qty.'</td><td>'.$getGate->Balance_Qty.'</td><td>'.$getGate->Rcv_Date.'</td></tr>'; 
                        
                    }
                    $html.='<tbody></table>';
                    $datas=array('status'=>'false','message'=>'success','datas'=>$html);
                }
            }
            else{
                        $destinationPath = public_path('document'); 
                        $new_file_name = date('ymdHis').$file->getClientOriginalName();
                        $file->move($destinationPath,$new_file_name);
                        $moved = 'public/document/'.$new_file_name;
                GatePassRecvDoc::insertGetId(['GP_Recv_Id'=>$lastid,'document'=>$moved,'created_at'=>date('Y-m-d')]);
                $getGatePass=GatePassReceiving::join('Gp_Rcv_Doc','gate_pass_receivings.id','Gp_Rcv_Doc.GP_Recv_Id')
                ->leftjoin('vehicle_gatepasses','gate_pass_receivings.Gp_Id','vehicle_gatepasses.id')->get();
                    $html='';
                    $html.='<table class="table-responsive table-bordered" width="100%"><thead><tr class="main-title text-dark"><th>Document Name</th><th>Gatepass Number</th><th>Date</th><tr></thead><tbody>';
                    foreach($getGatePass as $getGate)
                    {
                        $html.='<tr><td>'.$getGate->document.'</td><td>'.$getGate->GP_Number.'</td><td>'.$getGate->created_at.'</td></tr>'; 
                        
                    }
                    $html.='<tbody></table>';
                    $datas=array('status'=>'true','message'=>'success','datas'=>$html);
            }
            
        echo  json_encode($datas);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\GatePassReceiving  $gatePassReceiving
     * @return \Illuminate\Http\Response
     */
    public function show(GatePassReceiving $gatePassReceiving ,Request $request)
    {
    $search='';
    $formDate='';
     $todate='';
    if($request->formDate){
        $formDate .= $request->formDate;
    }
    if($request->todate){
        $todate .= $request->todate;
    }
     if($request->search){
        $search .= $request->search;
    }
        $GatePassReceive= GatePassReceiving::with('GetPassReciveDet','GetVehicleGatepassDet')->where(function($query) use($formDate,$todate){
            if($formDate!='' && $todate!=''){
                $query->whereBetween("gate_pass_receivings.Rcv_Date",[$formDate,$todate]);
            }
        })
         ->where( function ( $query) use($search){
                if($search!=''){
             $query->whereRelation('GetVehicleGatepassDet','GP_Number', 'like', '%'.$search.'%');
                }
         })
         ->withCount('GetDocketDataDet as TotDock')
        // ->withSum('GetDocketDataDet as total_dock', 'Recv_Qty' )

        // ->withSum('GetDocketDataDet as total_dockPending', 'Balance_Qty' )
      
        // ->where(function($query) use($search){
        //     if($search!=''){
        //         $query->where("vehicle_gatepasses.GP_Number","like","%".$search."%");
        //     }
        // })
        //->groupBy('Gp_Id')
        ->paginate(10);
       //echo '<pre>'; print_r($GatePassReceive[0]->total_dock); die;
        return view('Operation.gatepassreceivingReport', [
            'title'=>'GATEPASS - RECEIVING REPORT',
            'gatepassReceived'=>$GatePassReceive
            ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\GatePassReceiving  $gatePassReceiving
     * @return \Illuminate\Http\Response
     */
    public function edit(GatePassReceiving $gatePassReceiving)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGatePassReceivingRequest  $request
     * @param  \App\Models\Operation\GatePassReceiving  $gatePassReceiving
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGatePassReceivingRequest $request, GatePassReceiving $gatePassReceiving)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\GatePassReceiving  $gatePassReceiving
     * @return \Illuminate\Http\Response
     */
    public function destroy(GatePassReceiving $gatePassReceiving)
    {
        //
    }

    public function GatePassCanceled(){
       $GetActivityType= ActivityType::get();
        return view('Operation.gatepasscancel', [
            'title'=>'GATEPASS - CANCEL',
            'GetActivityType'=>$GetActivityType
            ]);
    }

    public function GatePassCanceledPost(GatePassCanceled $GatePassCanceled,Request $req){

        //validate  'Number'=>'' ,
        $Checkvalidate= GatePassCanceled::where('Activity_Id',$req->activityId)->where('Actvity_Type',$req->ReceivingType)->first();
        $UserId=Auth::id();
        if(empty($Checkvalidate)){
             GatePassCanceled::insert([ 'Activity_Id'=>$req->activityId,'Remark'=> $req->Remarks, 'Actvity_Type'=>$req->ReceivingType,'Created_by'=>$UserId,'Status' =>1]);
             $successData= 'true';
        }
        else{
                $successData= 'false';
        }

        echo json_encode(array("success"=>$successData));
    }


    public function GatePassAllInfomation( Request $req){ 

        if($req->ActivityType==2){
            $getDRSData=DRSEntry::with('GetOfficeCodeNameDett','getDeliveryBoyNameDett','getVehicleNoDett','getVehicleTypeDett')->where("DRS_No",$req->Number)->first();
            $vclType ='';
            $OfficeName ='';
            $DeliveryBoy ='';
            $vclNo='';
            if(isset($getDRSData->getVehicleTypeDett->VehicleType)){
             $vclType=   $getDRSData->getVehicleTypeDett->VehicleType;
            }

             if(isset($getDRSData->GetOfficeCodeNameDett->OfficeCode) && isset($getDRSData->GetOfficeCodeNameDett->OfficeName)){
             $OfficeName=  $getDRSData->GetOfficeCodeNameDett->OfficeCode.'~'.$getDRSData->GetOfficeCodeNameDett->OfficeName;
            }
             if(isset($getDRSData->getDeliveryBoyNameDett->EmployeeCode) && isset($getDRSData->getDeliveryBoyNameDett->EmployeeName)){
             $DeliveryBoy=   $getDRSData->getDeliveryBoyNameDett->EmployeeCode.'~'.$getDRSData->getDeliveryBoyNameDett->EmployeeName;
            }
            if(isset($getDRSData->getVehicleNoDett->VehicleNo)){
                $vclNo=$getDRSData->getVehicleNoDett->VehicleNo;
            }
            if(!empty($getDRSData)){
        $html= '<tr class="back-color">
                 <td align="left" class="lblMediumBold text-center" nowrap="nowrap" colspan="4">DRS Details <input id="activityId" Type="hidden" name="activityId" value="'.$getDRSData->ID.'">
                </td>
                                                               
            </tr>
            <tr>
            <td align="left" class="lblMediumBold back-color">DRS Date
                                                                </td>
            <td align="left" class="drs_date">
            <span id="drs_date">'.$getDRSData->Delivery_Date.'</span>
            </td>
            <td align="left" class="lblMediumBold drs_number back-color">DRS Number
            </td>
            <td align="left" class="">
            <span id="drs_number">'.$getDRSData->DRS_No.'</span>
            </td>
        </tr>
        <tr>
        <td align="left" class="lblMediumBold back-color">Delivery Office
         </td>
        <td align="left" class="" colspan="3">
        <span id="delivery_office">'.$OfficeName.'</span>
            </td>
                                                               
        </tr>
        <tr>
        <td align="left" class="lblMediumBold delivery_boy back-color">Delivery Boy
        </td>
        <td align="left" class="" colspan="3">
            <span id="delivery_boy">'.$DeliveryBoy.'</span>
            </td>
            </tr>                                             
        <tr>
        <td align="left" class="lblMediumBold back-color" valign="top">Vechile Type
       </td>
        <td align="left" class="">
            <span id="vechile_type">'.$vclType.'</span>
             </td>
        <td align="left" class="lblMediumBold back-color">Market Hire Amount
          </td>
        <td align="left" class="">
                <span id="marketHireAmount">'.$getDRSData->Market_Hire_Amount.'</span>
         </td>                                                   
         </tr>                                               
        <tr>
        <td align="left" class="lblMediumBold back-color">Vechile Number
       </td>
        <td align="left" class="">
                <span id="vechile_number">'.$vclNo.'</span>
        </td>
        <td align="left" class="lblMediumBold back-color" valign="top">Opening Km
       </td>
        <td align="left" class="opening_km">
                <span id="opening_km">'.$getDRSData->OpenKm.'</span>
        </td>
        </tr>
        <tr>
        <td align="left" class="lblMediumBold driver_name back-color">Driver Name
        </td>
        <td align="left" class="" >
        <span id="driver_name">'.$getDRSData->DriverName.'</span>
        </td>
        <td align="left" class="lblMediumBold back-color" valign="top">Mobile Number
        </td>
        <td align="left" class="mobile_number">
                <span id="mobile_number">'.$getDRSData->Mob.'</span>
       </td>                                                       
        </tr>
        <tr>
        <td align="left" class="lblMediumBold back-color" valign="top">Supervisor Name
        </td>
        <td align="left" class="" colspan="3">
            <span id="supervisor_name">'.$getDRSData->Supervisor.'</span>
       </td>
       </tr>
';
 echo json_encode(array("body"=>$html,"status"=>2));
}
else{
  echo json_encode(array("status"=>0));
}
}
elseif($req->ActivityType==1){ 
    $getGetPassData=VehicleGatepass::with('fpmDetails','VendorDetails','VehicleTypeDetails','VehicleDetails','DriverDetails','RouteMasterDetails','getPassDocketDetails')->where("vehicle_gatepasses.GP_Number",$req->Number)->first();
    if(!empty($getGetPassData)){
        $driverName='';
        $vclNo='';
        $vandrName="";
        $origan="";
        $destination="";
        if(isset($getGetPassData->DriverDetails->DriverName)){
                $driverName=$getGetPassData->DriverDetails->DriverName;
            }
            if(isset($getGetPassData->VehicleDetails->VehicleNo)){
                $vclNo=$getGetPassData->VehicleDetails->VehicleNo;
            }
            if(isset($getGetPassData->VendorDetails->VendorName)){
                $vandrName=$getGetPassData->VendorDetails->VendorName;
            }
            if(isset($getGetPassData->RouteMasterDetails->StatrtPointDetails->CityName)){
                $origan=$getGetPassData->RouteMasterDetails->StatrtPointDetails->CityName;
            }
              if(isset($getGetPassData->RouteMasterDetails->EndPointDetails->CityName)){
                $destination=$getGetPassData->RouteMasterDetails->EndPointDetails->CityName;
            }
    $html =' <tr class="back-color">
            <td align="left" class="lblMediumBold text-center" nowrap="nowrap" colspan="4">Gatepass Details <input Type="hidden" id="activityId" name="activityId" value="'.$getGetPassData->id.'">
            </td>
                                                               
            </tr>
            <tr>
            <td align="left" class="lblMediumBold back-color">GP Date
                                                                </td>
            <td align="left" class="gp_date">
         <span id="gp_date">'.$getGetPassData->GP_TIME.'</span>
                                                                </td>
        <td align="left" class="lblMediumBold gp_number back-color">GP Number
        </td>
        <td align="left" class="possition">
        <span id="gp_number">'.$getGetPassData->GP_Number.'</span>
            </td>
        </tr>
        <tr>
        <td align="left" class="lblMediumBold back-color">Origin
        </td>
        <td align="left" class="possition" colspan="3">
        <span id="origin">'.$origan.'</span>
         </td>
        </tr>
        <tr>
       <td align="left" class="lblMediumBold destination back-color">Destination
        </td>
        <td align="left" class="possition" colspan="3">
        <span id="destination">'.$destination.'</span>
        </td>
         </tr>
        <tr>
        <td align="left" class="lblMediumBold back-color" valign="top">Customer Name
        </td>
        <td align="left" class="possition">
        <span id="CustomerName">-</span>
        </td>

        <td align="left" class="lblMediumBold back-color">Vendor Name
        </td>
        <td align="left" class="possition">
            <span id="VendorName">'.$vandrName.'</span>
        </td>
                                                                
        </tr>
                                                          
        <tr>
        <td align="left" class="lblMediumBold back-color">Vechile Number
        </td>
        <td align="left" class="possition">
        <span id="vechile_number">'.$vclNo.'</span>
        </td>
        <td align="left" class="lblMediumBold back-color" valign="top">Seal Number
                                                                </td>
        <td align="left" class="seal_number">
        <span id="seal_number">'.$getGetPassData->Seal.'</span>
                                                                </td>
        </tr>

        <tr>
         <td align="left" class="lblMediumBold driver_name back-color">Driver Name
        </td>
        <td align="left" class="" colspan="3">
        <span id="driver_name">'.$driverName.'</span>
        </td>
        </tr>
        <tr>
        <td align="left" class="lblMediumBold advance_to_drive back-color" valign="top">Advance to Drive
        </td>
        <td align="left" class="advance_to_drive">
        <span id="advance_to_drive">'.$getGetPassData->Driver_Adv.'</span>
                                                                    
    </td>
     <td align="left" class="lblMediumBold back-color" valign="top">Start Km
    </td>
    <td align="left" class="">
    <span id="StartKm">'.$getGetPassData->Start_Km.'</span>
    </td>
                                                               
    </tr>
    <tr>
    <td align="left" class="lblMediumBold back-color" valign="top">Remarks
    </td>
    <td align="left" class="possition" colspan="3">
    <span id="RemarksgatePass">'.$getGetPassData->Remark.'</span>
     </td>
    </tr>';
    echo json_encode(array("body"=>$html,"status"=>1));
}
else{
    echo json_encode(array("status"=>0));
}
}
else{
    echo json_encode(array("status"=>0));
}
    

    }
}
