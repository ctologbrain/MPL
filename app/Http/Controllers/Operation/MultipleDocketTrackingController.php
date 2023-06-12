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
        $DocketData =DocketMaster::with('offcieDetails','BookignTypeDetails','DevileryTypeDet','customerDetails','consignor','consignoeeDetails','DocketProductDetails','PincodeDetails','DestPincodeDetails','DocketInvoiceDetails','DocketAllocationDetail','getpassDataDetails','RegulerDeliveryDataDetails')->withCount('DocketInvoiceDetails as Total')->withSum('DocketInvoiceDetails','Amount')->where('docket_masters.Docket_No',$keyDocket)->first();
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

            if(isset($DocketData->getpassDataDetails->DocketDetailGPData->GP_Number)){
                $url = url("print_gate_Number").'/'.$DocketData->getpassDataDetails->DocketDetailGPData->GP_Number;
                $GPNo = '<a href="'. $url.'">'.$DocketData->getpassDataDetails->DocketDetailGPData->GP_Number;
                $Description="<strong>GatePass No.</strong>".$DocketData->getpassDataDetails->DocketDetailGPData->GP_Number.' <strong>GP Date: </strong>'.date("d-m-Y H:i:s", strtotime($DocketData->getpassDataDetails->DocketDetailGPData->GP_TIME)).'<br><strong>Vendor Name.</strong>'
                .$DocketData->getpassDataDetails->DocketDetailGPData->VendorDetails->VendorName.'~'.$DocketData->getpassDataDetails->DocketDetailGPData->VendorDetails->VendorCode.'<br><strong>Vehicle No:</strong>'.
                $DocketData->getpassDataDetails->DocketDetailGPData->VehicleDetails->VehicleNo.'<br><strong>Origin City :</strong>'.
                $DocketData->PincodeDetails->CityDetails->CityName.'<br><strong>Dest City :</strong>'.
                $DocketData->DestPincodeDetails->CityDetails->CityName.'<br><strong>FPMNo :</strong>'.

                $DocketData->getpassDataDetails->DocketDetailGPData->fpmDetails->FPMNo.'<br><strong>Supervisor :</strong>'.
                $DocketData->getpassDataDetails->DocketDetailGPData->Supervisor.'<br><strong>RouteName :</strong>'.
                $DocketData->getpassDataDetails->DocketDetailGPData->RouteMasterDetails->RouteName.'<br><strong>pieces:</strong>'.
                $DocketData->getpassDataDetails->pieces.'<br><strong>weight :</strong>'.
                $DocketData->getpassDataDetails->weight.'<br><strong>Destination Office:</strong>'.
                $DocketData->getpassDataDetails->DockEndPoint->CityName.'<br>';
               
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
                $info =   $DocketData->DocketDetailUser->EmployeeCode.'~'. $DocketData->DocketDetailUser->EmployeeName;
                $Office = '<br>'.$DocketData->DocketDetailUser->OfficeMasterParent->OfficeCode.'~'.$DocketData->DocketDetailUser->OfficeMasterParent->OfficeName;
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
            <td class="p-1"> '.$activity.'  </td>
            <td class="p-1" >'.$offCode.'~'. $offName .'</td>
            <td class="p-1">'.date("d-m-Y H:i:s",strtotime($DocketData->Booking_Date)).'</td>
            <td class="p-1" ></td>
            <td class="p-1" >'.$deliveryDate .'</td>

            <td class="p-1" >'. $Status.'</td>
            <td class="p-1" >'.$Image.'</td>


            <td class="p-1" >'.$Description.'</td>
            <td class="p-1" >'.date("d-m-Y",strtotime($DocketData->Booked_At)).'</td>
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
