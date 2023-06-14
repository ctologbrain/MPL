<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoremultipleDocketTrackingRequest;
use App\Http\Requests\UpdatemultipleDocketTrackingRequest;
use App\Models\Operation\multipleDocketTracking;
use Illuminate\Http\Request;
use App\Models\Operation\DocketMaster;
use App\Models\Stock\DocketAllocation;
use Illuminate\Support\Facades\Storage;


class MultipleDocketTrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
           return view('Operation.multipleDocketTracking', [
             'title'=>'MULTIPLE DOCKET TRACKING']);
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
     * @param  \App\Http\Requests\StoremultipleDocketTrackingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoremultipleDocketTrackingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\multipleDocketTracking  $multipleDocketTracking
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request ,multipleDocketTracking $multipleDocketTracking)
    {
        //
        $DocketNo = explode(",",$request->DocketNo);
        $DocketDataResult = array();
        $DocketDataBody ='
        <table class="table table-bordered table-centered mb-1 mt-1 table-responsive">
        <thead id="Head">
        <th style="min-width:40px;" class="p-1">SR NO. </th>
        <th style="min-width:130px;" class="p-1">DocketNo </th>
        <th style="min-width:130px;" class="p-1">Activity </th>
        <th style="min-width:130px;" class="p-1">Client Name</th>
        <th style="min-width:130px;" class="p-1">Consignor Name</th>
        <th style="min-width:130px;" class="p-1">Consignee Name</th>

        <th style="min-width:130px;" class="p-1">Pcs.</th>
        <th style="min-width:130px;" class="p-1">Act. Wt.</th>
        <th style="min-width:130px;" class="p-1"> Chrg. Wt.</th>
        <th style="min-width:130px;" class="p-1">Activity Date </th>
        <th style="min-width:190px;" class="p-1">Gatepass No.</th>
        <th style="min-width:190px;" class="p-1">BAG Status</th>
        <th style="min-width:170px;" class="p-1">Booking Office </th>
        <th style="min-width:150px;" class="p-1">Booking Date</th>

        <th style="min-width:130px;" class="p-1">Delivery Agent</th>
        <th style="min-width:130px;" class="p-1">Delivery Date</th>
        <th style="min-width:130px;" class="p-1">Scan Image Status</th>
        <th style="min-width:130px;" class="p-1"> View Scan Image</th>

        <th style="min-width:250px;" class="p-1">Description</th>
        <th style="min-width:130px;" class="p-1"> Entry Date </th>
        <th style="min-width:130px;" class="p-1">Entry Details </th>
        </thead>
        <tbody id="Body">
        ';
        $i =0;
        if(count($DocketNo)>0 && isset($request->DocketNo)){
        foreach($DocketNo as $keyDocket){ 
        $i++;
        $DocketData =DocketMaster::with('offcieDetails','BookignTypeDetails','DevileryTypeDet','customerDetails','consignor','consignoeeDetails','DocketProductDetails','PincodeDetails','DestPincodeDetails','DocketInvoiceDetails','DocketAllocationDetail','getpassDataDetails','RegulerDeliveryDataDetails','DrsTransDetails','DrsTransDeliveryDetails','NDRTransDetails')->withCount('DocketInvoiceDetails as Total')->withSum('DocketInvoiceDetails','Amount')->where('docket_masters.Docket_No',$keyDocket)->first();
        if(!empty($DocketData)){
            if(isset($DocketData->DocketAllocationDetail->GetStatusWithAllocateDett->title)){
           $activity = $DocketData->DocketAllocationDetail->GetStatusWithAllocateDett->title;
            }
            else{
            $activity ='';
            }

            if(isset($DocketData->customerDetails->CustomerName)){
                $Customer = $DocketData->customerDetails->CustomerName;
                 }
            else{
                 $Customer ='';
            }

            if(isset($DocketData->consignor->ConsignorName)){
                $Consiner = $DocketData->consignor->ConsignorName;
                 }
            else{
                 $Consiner ='';
            }

            if(isset($DocketData->consignoeeDetails->ConsigneeName)){
                $consignee = $DocketData->consignoeeDetails->ConsigneeName;
                 }
            else{
                 $consignee ='';
            }


            if(isset($DocketData->DocketProductDetails->Qty)){
                $Qty = $DocketData->DocketProductDetails->Qty;
                 }
            else{
                 $Qty ='';
            }

            if(isset($DocketData->DocketProductDetails->Actual_Weight)){
                $ActualWeight = $DocketData->DocketProductDetails->Actual_Weight;
                 }
            else{
                 $ActualWeight ='';
            }

            if(isset($DocketData->DocketProductDetails->Charged_Weight)){
                $ChargedWeight = $DocketData->DocketProductDetails->Charged_Weight;
                 }
            else{
                 $ChargedWeight ='';
            }

            

            if(isset($DocketData->DocketAllocationDetail->BookDate)){
                $activityDate = $DocketData->DocketAllocationDetail->BookDate;
                 }
            else{
                 $activityDate ='';
            }

            if(isset($DocketData->getpassDataDetails->DocketDetailGPData->GP_Number) && $DocketData->DocketAllocationDetail->Status==5){
                $FPM = isset($DocketData->getpassDataDetails->DocketDetailGPData->fpmDetails->FPMNo)?$DocketData->getpassDataDetails->DocketDetailGPData->fpmDetails->FPMNo:'';
                $Route = isset($DocketData->getpassDataDetails->DocketDetailGPData->RouteMasterDetails->RouteName)?$DocketData->getpassDataDetails->DocketDetailGPData->RouteMasterDetails->RouteName:'';
                $vehicle = isset($DocketData->getpassDataDetails->DocketDetailGPData->VehicleDetails->VehicleNo)?$DocketData->getpassDataDetails->DocketDetailGPData->VehicleDetails->VehicleNo:'';
                $vendor = isset($DocketData->getpassDataDetails->DocketDetailGPData->VendorDetails->VendorName)?$DocketData->getpassDataDetails->DocketDetailGPData->VendorDetails->VendorName:'';
                $destination = isset($DocketData->getpassDataDetails->DockEndPoint->CityName)?$DocketData->getpassDataDetails->DockEndPoint->CityName:'';
                $origin = isset($DocketData->PincodeDetails->CityDetails->CityName)?$DocketData->PincodeDetails->CityDetails->CityName:'';
                $dest = isset($DocketData->DestPincodeDetails->CityDetails->CityName)?$DocketData->PincodeDetails->CityDetails->CityName:'';
                $vendorCode = isset($DocketData->getpassDataDetails->DocketDetailGPData->VendorDetails->VendorCode)?$DocketData->getpassDataDetails->DocketDetailGPData->VendorDetails->VendorCode:'';
                $url = url("print_gate_Number").'/'.$DocketData->getpassDataDetails->DocketDetailGPData->GP_Number;
                $GPNo = '<a href="'. $url.'">'.$DocketData->getpassDataDetails->DocketDetailGPData->GP_Number;
                $Description="<strong>GatePass No.</strong>".$DocketData->getpassDataDetails->DocketDetailGPData->GP_Number.' <strong>GP Date: </strong>'.date("d-m-Y H:i:s", strtotime($DocketData->getpassDataDetails->DocketDetailGPData->GP_TIME)).'<br><strong>Vendor Name.</strong>'
                .$vendor.'~'.$vendorCode.'<br><strong>Vehicle No:</strong>'.
                $vehicle.'<br><strong>Origin City :</strong>'.
                $origin.'<br><strong>Dest City :</strong>'.
                $dest.'<br><strong>FPMNo :</strong>'.
                $FPM.'<br><strong>Supervisor :</strong>'.
                $DocketData->getpassDataDetails->DocketDetailGPData->Supervisor.'<br><strong>RouteName :</strong>'.
                $Route.'<br><strong>pieces:</strong>'.
                $DocketData->getpassDataDetails->pieces.'<br><strong>weight :</strong>'.
                $DocketData->getpassDataDetails->weight.'<br><strong>Destination Office:</strong>'.
                $destination.'<br>';
               
                 }
                 elseif(isset($DocketData->getpassDataDetails->DocketDetailGPData->GP_Number) && $DocketData->DocketAllocationDetail->Status==6){
                    $url = url("print_gate_Number").'/'.$DocketData->getpassDataDetails->DocketDetailGPData->GP_Number;
                    $GPNo = '<a href="'. $url.'">'.$DocketData->getpassDataDetails->DocketDetailGPData->GP_Number;

                     $RecivingOffice = isset($DocketData->getpassDataDetails->DocketDetailGPData->GPReceiveDetails->GetPassReciveDet->OfficeName)?$DocketData->getpassDataDetails->DocketDetailGPData->GPReceiveDetails->GetPassReciveDet->OfficeName:'';
                     $SuperVisor = isset($DocketData->getpassDataDetails->DocketDetailGPData->GPReceiveDetails->Supervisor)?$DocketData->getpassDataDetails->DocketDetailGPData->GPReceiveDetails->Supervisor:'';
                     $Date=  isset($DocketData->getpassDataDetails->DocketDetailGPData->GPReceiveDetails->Rcv_Date)?$DocketData->getpassDataDetails->DocketDetailGPData->GPReceiveDetails->Rcv_Date:'';
                    $Description="<strong>GatePass No.</strong>".$DocketData->getpassDataDetails->DocketDetailGPData->GP_Number.' <strong>Receiving Date: </strong>'.date("d-m-Y", strtotime($Date)).'<br><strong>Receiving Office :</strong>'
                    .$RecivingOffice.'<br><strong>Supervisor Name:</strong>'.$SuperVisor;
                 }
                 elseif($DocketData->DocketAllocationDetail->Status==7){
                    $url = url("print_gate_Number").'/'.$DocketData->getpassDataDetails->DocketDetailGPData->GP_Number;
                    $GPNo = '<a href="'. $url.'">'.$DocketData->getpassDataDetails->DocketDetailGPData->GP_Number;
                 $DrsDate = isset($DocketData->DrsTransDetails->DRSDatasDetails->Delivery_Date)?$DocketData->DrsTransDetails->DRSDatasDetails->Delivery_Date:'';
                 $vehicleNO = isset($DocketData->DrsTransDetails->DRSDatasDetails->getVehicleNoDett->VehicleNo)?$DocketData->DrsTransDetails->DRSDatasDetails->getVehicleNoDett->VehicleNo:'';
                 $Driver = isset($DocketData->DrsTransDetails->DRSDatasDetails->DriverName)?$DocketData->DrsTransDetails->DRSDatasDetails->DriverName:'';
                 $DRS_No = isset($DocketData->DrsTransDetails->DRSDatasDetails->DRS_No)?$DocketData->DrsTransDetails->DRSDatasDetails->DRS_No:'';

                 $OpenKm = isset($DocketData->DrsTransDetails->DRSDatasDetails->OpenKm)?$DocketData->DrsTransDetails->DRSDatasDetails->OpenKm:'';
                 $Mob = isset($DocketData->DrsTransDetails->DRSDatasDetails->Mob)?$DocketData->DrsTransDetails->DRSDatasDetails->Mob:'';
                 $Office = isset($DocketData->DrsTransDetails->DRSDatasDetails->GetOfficeCodeNameDett->OfficeName)?$DocketData->DrsTransDetails->DRSDatasDetails->GetOfficeCodeNameDett->OfficeName:'';
                 $DeliveryBoy = isset($DocketData->DrsTransDetails->DRSDatasDetails->getDeliveryBoyNameDett->VehicleNo)?$DocketData->DrsTransDetails->DRSDatasDetails->getDeliveryBoyNameDett->EmployeeName:'';

                 $Supervisor = isset($DocketData->DrsTransDetails->DRSDatasDetails->Supervisor)?$DocketData->DrsTransDetails->DRSDatasDetails->Supervisor:'';
                 $Market_Hire_Amount = isset($DocketData->DrsTransDetails->DRSDatasDetails->Market_Hire_Amount)?$DocketData->DrsTransDetails->DRSDatasDetails->Market_Hire_Amount:'';
                 $piece = isset($DocketData->DrsTransDetails->pieces)?$DocketData->DrsTransDetails->pieces:'';
                 $Weight = isset($DocketData->DrsTransDetails->weight)?$DocketData->DrsTransDetails->weight:'';

                    $Description= '<strong>DELIVERY: READY</strong><br><strong>ON DATED: </strong>'.date("d-m-Y",strtotime($DrsDate)).'<br><strong>VEHICLE NO: </strong>'.
                    $vehicleNO.'<br><strong>DRVIER NAME: </strong>'. $Driver .'<br><strong>OPENING  KM: </strong>'.$OpenKm.'<br><strong>PIECES: </strong>'.
                    $piece.'<br><strong>WEIGHT: </strong>'.$Weight .'<br><strong>MENIFEST NO: </strong>'.$DRS_No.' <br><strong>BOY NAME/ PHONE NO: </strong>'.
                    $DeliveryBoy .'/'. $Mob .'<br><strong>MARKET HIRE AMOUNT: </strong>'.$Market_Hire_Amount.' <br><strong>LOADING SUPERVISIOR NAME: </strong>'.$Supervisor ;
                 }
                 elseif($DocketData->DocketAllocationDetail->Status==8){
                    $url = url("print_gate_Number").'/'.$DocketData->getpassDataDetails->DocketDetailGPData->GP_Number;
                    $GPNo = '<a href="'. $url.'">'.$DocketData->getpassDataDetails->DocketDetailGPData->GP_Number;
                    if(isset($DocketData->DrsTransDeliveryDetails->Docket)){

                      
                        if($DocketData->DrsTransDeliveryDetails->Type=='DELIVERED'){
                            $Date = isset($DocketData->DrsTransDeliveryDetails->DRSDelDetails->D_Date)?$DocketData->DrsTransDeliveryDetails->DRSDelDetails->D_Date:'';
                            $DRSNO = isset($DocketData->DrsTransDeliveryDetails->DRSDelDetails->D_Number)?$DocketData->DrsTransDeliveryDetails->DRSDelDetails->D_Number:'';
                            $proof = isset($DocketData->DrsTransDeliveryDetails->ProofMasterDett->ProofCode)?$DocketData->DrsTransDeliveryDetails->ProofMasterDett->ProofCode.'~'.$DocketData->DrsTransDeliveryDetails->ProofName:'';
                            $Description= "<strong>DELIVERED NO:". $DRSNO ."</strong><br><strong>ON DATED: </strong>".date("d-m-Y",strtotime($Date))
                           ."<br>(PROOF NAME SIGNATURE):".$proof;
                        }
                        if($DocketData->DrsTransDeliveryDetails->Type=='NDR'){
                            $Date = isset($DocketData->DrsTransDeliveryDetails->DRSDelDetails->D_Date)?$DocketData->DrsTransDeliveryDetails->DRSDelDetails->D_Date:'';

                            $Reason = isset($DocketData->DrsTransDeliveryDetails->DRSReasonDet->ReasonDetail)?$DocketData->DrsTransDeliveryDetails->DRSDelDetails->ReasonDetail:'';
                            $Ndr_remark = isset($DocketData->DrsTransDeliveryDetails->Ndr_remark)?$DocketData->DrsTransDeliveryDetails->Ndr_remark:'';
                            $DelieveryPieces = isset($DocketData->DrsTransDeliveryDetails->DelieveryPieces)?$DocketData->DrsTransDeliveryDetails->DelieveryPieces:'';
                            $Weight = isset($DocketData->DrsTransDeliveryDetails->Weight)?$DocketData->DrsTransDeliveryDetails->Weight:'';
                            $Description= "<strong>NDR DATE: ".date("d-m-Y",strtotime($Date))."</strong><br><strong>NDR  REASON: </strong>".
                            $Reason."<br><strong>NDR REMARK</strong>: ".$Ndr_remark." <br><strong>PIECES</strong>:".
                            $DelieveryPieces ."<br><strong>WEIGHT</strong>: ".$Weight;
                        }
                    }
                    elseif(isset($DocketData->RegulerDeliveryDataDetails->Docket_ID)){
                        $DelProofName = isset($DocketData->RegulerDeliveryDataDetails->ProofMasterDett->ProofName)?$DocketData->RegulerDeliveryDataDetails->ProofMasterDett->ProofName:'';
                        $DelProofCode =  isset($DocketData->RegulerDeliveryDataDetails->ProofMasterDett->ProofCode)?$DocketData->RegulerDeliveryDataDetails->ProofMasterDett->ProofCode:'';
                        $DelProofDet = isset($DocketData->RegulerDeliveryDataDetails->Proof_Detail)?$DocketData->RegulerDeliveryDataDetails->Proof_Detail:'';
                        $Description= "<strong>DELIVERED TO: SELF</strong><br><strong>ON DATED: </strong>".date("d-m-Y H:i:s", strtotime($DocketData->RegulerDeliveryDataDetails->Delivery_date)).
                        "<br>(PROOF NAME: ". $DelProofCode.'~'.$DelProofName.") <br>(PROOF DETAIL: ". $DelProofDet.")";
                    }
                 }
                elseif($DocketData->DocketAllocationDetail->Status==3 || $DocketData->DocketAllocationDetail->Status==4){
                    $GPNo = '';
                    $Description= "<strong>BOOKING DATE: </strong>".date("d-m-Y",strtotime($DocketData->Booked_At))."<br><strong>CUSTOMER NAME: </strong>".
                    $Customer."<br><strong>CONSIGNEE NAME: </strong>".$consignee;
                }
               
                elseif($DocketData->DocketAllocationDetail->Status==1){
                    $Description= '';
                    $GPNo = '';
                }
                elseif($DocketData->DocketAllocationDetail->Status==9){
                    if(isset($DocketData->getpassDataDetails->DocketDetailGPData->GP_Number)){
                    $url = url("print_gate_Number").'/'.$DocketData->getpassDataDetails->DocketDetailGPData->GP_Number;
                    $GPNo = '<a href="'. $url.'">'.$DocketData->getpassDataDetails->DocketDetailGPData->GP_Number;
                    }
                    else{
                    $GPNO ='';
                    }
                    $NDRRES = isset( $DocketData->NDRTransDetails->NDrMasterDetails->ReasonDetail)? $DocketData->NDRTransDetails->NDrMasterDetails->ReasonDetail:'';
                    $PIECE =isset( $DocketData->DocketProductDetails->Qty)?$DocketData->DocketProductDetails->Qty:'';
                    $Weight =isset( $DocketData->DocketProductDetails->Actual_Weight)?$DocketData->DocketProductDetails->Actual_Weight:'';
                    
                    $Description= "<strong>NDR DATE: </strong>".date("d-m-Y",strtotime($DocketData->NDRTransDetails->NDR_Date))."<br><strong>REASON: </strong>".
                   $NDRRES."<br><strong> PIECES: </strong>".$PIECE ."<strong>WEIGHT: </strong>".$Weight .
                    "<br><strong>REMARKS: </strong>".$DocketData->NDRTransDetails->Remark;
                }
            else{
                 $GPNo ='';
                 $Description='';
              
            }

            if(isset($DocketData->offcieDetails->OfficeCode)){
                $offCode = $DocketData->offcieDetails->OfficeCode;
                $offName = $DocketData->offcieDetails->OfficeName;
                 }
            else{
                $offCode ='';
                $offName ='';
            }

            if(isset($DocketData->DocketImagesDet->DocketNo))  {
            $urlIm = url('').'/'.$DocketData->DocketImagesDet->file;
            $Image ='<a target="_blank" href="'.$urlIm.'">View File</a>';
            $Status = 'YES';
            }
            else {
            $Image =' <a  href="javascript:void(0)">No File</a> ';
            $Status = 'NO';
            }

          

            if(isset($DocketData->DocketDetailUser->EmployeeCode)){
                $info =    $DocketData->DocketDetailUser->EmployeeName;
                $Office = '<br>'.$DocketData->DocketDetailUser->OfficeMasterParent->OfficeName;
               $EnteryName = $info.$Office;
            }
            else{
                $EnteryName ='';
            }
            if(isset($DocketData->RegulerDeliveryDataDetails->Time)){
            $deliveryDate = date("d-m-Y H:i:s",strtotime($DocketData->RegulerDeliveryDataDetails->Time));
            }
            else{
                $deliveryDate ='';   
            }

            if( isset($DocketData->DocketAllocationDetail->Status) && $DocketData->DocketAllocationDetail->Status==5 ){
                $activityGP= "GatePass Out";
            }
            elseif( isset($DocketData->DocketAllocationDetail->Status) && $DocketData->DocketAllocationDetail->Status==6){
                $activityGP='Docket InScan';
            }
            else{
                $activityGP='';
            }

          
            $DocketDataBody  .= ' <tr>
            <td class="p-1"> '.$i.'  </td>
            <td class="p-1"><a onclick="OpenTracking(this.text);" id="'.$DocketData->Docket_No.'" href="javascript:void(0);">'.$DocketData->Docket_No.'</a></td>
            <td class="p-1"> '.$activity.'  </td>

            <td class="p-1">'.$Customer.'</td> 
            
            <td class="p-1">'.$Consiner.'</td>
             <td class="p-1">'.$consignee.'</td>

            <td class="p-1" >'.$Qty.'</td>
            <td class="p-1" >'.$ActualWeight.'</td>
            <td class="p-1" >'.$ChargedWeight.'</td>
            <td class="p-1" >'.$activityDate.'</td>
            <td class="p-1" >'.$GPNo .'</td>
            <td class="p-1"> '.$activityGP.'  </td>
            <td class="p-1" >'.$offCode.'~'. $offName .'</td>
            <td class="p-1">'.date("d-m-Y H:i:s",strtotime($DocketData->Booking_Date)).'</td>
            <td class="p-1" ></td>
            <td class="p-1" >'.$deliveryDate .'</td>

            <td class="p-1" >'. $Status.'</td>
            <td class="p-1" >'.$Image.'</td>


            <td class="p-1" >'.$Description.'</td>
            <td class="p-1" >'.date("d-m-Y h:i A",strtotime($DocketData->Booked_At)).'</td>
            <td class="p-1" >'.$EnteryName.'</td>
            </tr>
            ';
        }
        else{
            $DocketDataBody  .= '<tr>  <td class="p-1">'.$i.' </td>
            <td class="p-1"> <a onclick="OpenTracking(this.text);" id="'.$keyDocket.'" href="javascript:void(0);">'.$keyDocket.' </a> </td>

            <td class="p-1"> Status Not Found</td> 
            
            <td class="p-1"></td>
            <td class="p-1"></td>

            <td class="p-1"></td>
            <td class="p-1"></td>
            <td class="p-1"></td>
            <td class="p-1"></td>

            <td class="p-1"></td>
            <td class="p-1"></td>
            <td class="p-1" ></td>
            <td class="p-1"></td>
            <td class="p-1"></td>

            <td class="p-1"></td>
            <td class="p-1"></td>
            <td class="p-1" ></td>
            </tr>
         
            ';
        }
      
        }
        $DocketDataBody  .= ' </tbody>
        </table>';
        }
        else{
        $DocketDataBody ='';
        }
        echo $DocketDataBody;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\multipleDocketTracking  $multipleDocketTracking
     * @return \Illuminate\Http\Response
     */
    public function edit(multipleDocketTracking $multipleDocketTracking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatemultipleDocketTrackingRequest  $request
     * @param  \App\Models\Operation\multipleDocketTracking  $multipleDocketTracking
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatemultipleDocketTrackingRequest $request, multipleDocketTracking $multipleDocketTracking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\multipleDocketTracking  $multipleDocketTracking
     * @return \Illuminate\Http\Response
     */
    public function destroy(multipleDocketTracking $multipleDocketTracking)
    {
        //
    }

    public function DocketMultiTrackingModel(Request $request){
        $docket= $request->Docket;
       if(isset($docket)){
        $storagePath = Storage::disk('local')->path($docket);
        if (is_writable($storagePath)) 
        {
            $docket=$request->Docket;
            $data=Storage::disk('local')->get($docket);
            $datas=array_reverse(explode("</tr>",$data));
           
           
        }
        else{
            $Docket=[];
            $datas[]='<tr><td class="text-center error" colspan="5">No Record Found</td></tr>';
       }
       }
       else
       {
            $Docket=[];
            $datas=[];   
        }
        return view('Operation.DocketMultiTrackingModel',
        ['title'=>'Docket Enquiry Detail Of',
        'DocketName'=>$request->Docket,
        'data'=>$datas
        ]);
    }
}
