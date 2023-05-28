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
use Illuminate\Support\Facades\Storage;
use Auth;
use DB;
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

        $gatePassDetails=VehicleGatepass::with('fpmDetails','VendorDetails','VehicleTypeDetails','VehicleDetails','DriverDetails','RouteMasterDetails','getPassDocketDetails','getPassDocketDataDetails')->withCount('getPassDocketDataDetails as TotalDocket')
        ->where('vehicle_gatepasses.GP_Number',$request->getPass)->first();
       
        $html='';
        $i=0;
        if(empty($gatePassDetails))
        {
            $datas=array('status'=>'false','message'=>'Gatepass not found');
        }
        else{
          $check=  GatePassReceiving::where('Gp_Id',$gatePassDetails->id)->first();
            if(empty($check)){
            foreach($gatePassDetails->getPassDocketDetails as $Dockets)
            {
            
            $i++;
            $html.='<tr><td><input type="checkbox" class="docketFirstCheck" name="Docket['.$i.'][check]" value="'.$Dockets->Docket.'" id="check'.$Dockets->Docket.'"></td><td>'.$Dockets->Docket.'<input type="hidden" name="Docket['.$i.'][DocketNumber]" value="'.$Dockets->Docket.'"></td><td>'.$Dockets->pieces.'<input type="hidden" name="Docket['.$i.'][pices]" value="'.$Dockets->pieces.'"></td><td><input typ="text" class="form-control" id="receivedQty'.$Dockets->Docket.'" name="Docket['.$i.'][receivedQty]" onchange="getReceivedQty('.$Dockets->pieces.',this.value,'.$Dockets->Docket.','.$i.')"></td><td><input type="checkbox" id="ShotBox'.$Dockets->Docket.'" name="Docket['.$i.'][shotBox]"></td><td><input type="checkbox" id="ShotQty'.$i.'" name="Docket['.$i.'][ShotQty]"></td></tr>';    
            
            }

            $datas=array('status'=>'true','message'=>'success','datas'=>$gatePassDetails,'table'=>$html);
            }
            else{ 
                $datas=array('status'=>'false','message'=>'Gatepass Already Received');
            }
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
        
        date_default_timezone_set('Asia/Kolkata');
        $UserId=Auth::id();
        $lastid=GatePassReceiving::insertGetId(['Rcv_Office' => $request->office,'Rcv_Date'=>date("Y-m-d",strtotime($request->rdate)),'Supervisor'=>$request->supervisorName,'Gp_Id'=>$request->gatePassId,'Remark'=>$request->Remark,'Recieved_By'=>$UserId]);
        if(!empty($request->Docket))
        {
            foreach($request->Docket as $docketDetails)
            {
                if(isset($docketDetails['check']))
                {
                if(isset($docketDetails['shotBox']) && $docketDetails['shotBox']=='on')
                {
                    $shotBox='YES';
                }
                else{
                    $shotBox='NO'; 
                }
                if(isset($docketDetails['ShotQty']) && $docketDetails['ShotQty']=='on')
                {
                    $shotQty='YES';
                }
                else{
                    $shotQty='NO'; 
                }

                DocketAllocation::where("Docket_No", $docketDetails['DocketNumber'])->update(['Status' =>6,'BookDate'=>date("Y-m-d",strtotime($request->rdate))]);
                GatePassRecvTrans::insert(['GP_Recv_Id'=>$lastid,'Docket_No'=>$docketDetails['DocketNumber'],'Recv_Qty'=>$docketDetails['receivedQty'],'Balance_Qty'=>$docketDetails['pices'],'ShotBox'=>$shotBox,'ShotPices'=>$shotQty]);
               
               
                $docketFile=GatePassRecvTrans::
                leftjoin('gate_pass_receivings','gate_pass_receivings.id','=','Gp_Recv_Trans.GP_Recv_Id')
               ->leftjoin('office_masters','office_masters.id','=','gate_pass_receivings.Rcv_Office')
                ->leftjoin('docket_masters','docket_masters.Docket_No','=','gate_pass_receivings.Rcv_Office')
                ->leftjoin('docket_product_details','docket_product_details.Docket_Id','=','docket_masters.id')
                ->leftjoin('vehicle_gatepasses','vehicle_gatepasses.id','=','gate_pass_receivings.Gp_Id')
               ->leftjoin('vehicle_trip_sheet_transactions','vehicle_trip_sheet_transactions.id','=','vehicle_gatepasses.Fpm_Number')
               ->leftjoin('route_masters','route_masters.id','=','vehicle_trip_sheet_transactions.Route_Id')
               ->leftjoin('cities as SourceCity','SourceCity.id','=','route_masters.Source')
               ->leftjoin('cities as DestCity','DestCity.id','=','route_masters.Destination')
                ->leftjoin('vendor_masters','vendor_masters.id','=','vehicle_trip_sheet_transactions.Vehicle_Provider')
               ->leftjoin('vehicle_masters','vehicle_masters.id','=','vehicle_trip_sheet_transactions.Vehicle_No')
               ->leftjoin('vehicle_types','vehicle_types.id','=','vehicle_trip_sheet_transactions.Vehicle_Model')
               ->leftjoin('driver_masters','driver_masters.id','=','vehicle_trip_sheet_transactions.Driver_Id')
               ->leftjoin('users','users.id','=','gate_pass_receivings.Recieved_By')
               ->leftjoin('employees','employees.user_id','=','users.id')
               ->leftjoin('office_masters as OFM','employees.OfficeName','=','OFM.id')
               ->select('vehicle_masters.VehicleNo','Gp_Recv_Trans.Docket_No','vehicle_gatepasses.GP_Number','vehicle_gatepasses.GP_TIME','vehicle_trip_sheet_transactions.FPMNo','vehicle_trip_sheet_transactions.Fpm_Date','vehicle_trip_sheet_transactions.Trip_Type','vehicle_trip_sheet_transactions.Vehicle_Type','SourceCity.CityName as SourceCity','DestCity.CityName as DestCity','vendor_masters.VendorName','driver_masters.DriverName','vehicle_types.VehicleType as Vtype','vehicle_gatepasses.GP_TIME','employees.EmployeeName','docket_product_details.Qty','docket_product_details.Actual_Weight','gate_pass_receivings.Rcv_Date','gate_pass_receivings.Supervisor','OFM.OfficeName as OffName','OFM.OfficeCode as OffCode', 'office_masters.OfficeCode',
               'office_masters.OfficeName')
               ->where('Gp_Recv_Trans.Docket_No',$docketDetails['DocketNumber'])
               ->where('gate_pass_receivings.Gp_Id',$request->gatePassId)
               ->first();
               if($docketDetails['receivedQty']==$docketDetails['pices'])
               {
                 $title='DOCKET INSCAN';
               }
               else{
                $title='SHORT INSCAN';
               }
                $string = "<tr><td>$title</td><td>".date("d-m-Y",strtotime($docketFile->GP_TIME))."</td><td><strong>GATEPASS NUMBER: </strong>$docketFile->GP_Number<br><strong>RECEIVING DATE: </strong>".date("d-m-Y",strtotime($docketFile->Rcv_Date))."<br><strong> SUPERVISOR NAME: </strong>$docketFile->Supervisor<br><strong>RECEIVING OFFICE: </strong>$docketFile->OfficeCode ~ $docketFile->OfficeName</td><td>".date('d-m-Y h:i A')."</td><td>".$docketFile->EmployeeName." <br>(".$docketFile->OffName.'~'.$docketFile->OffCode.")</td></tr>"; 
                Storage::disk('local')->append($docketDetails['DocketNumber'], $string);  
            }
            }
            
        } 
        $request->session()->flash('status', 'Docket INSCAN Successfully');
    
        return redirect('GateReceiving');  
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
         ->withSum('GetDocketDataDet as dockRecvQty', 'Recv_Qty' )
         ->withSum('GetDocketDataDet as dockPendingQty', 'Balance_Qty' )
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
        <td align="left" class="" >vehicle_gatepasses
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
            if(isset($getGetPassData->RouteMasterDeta10ils->StatrtPointDetails->CityName)){
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
