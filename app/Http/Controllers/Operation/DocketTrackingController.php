<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoredocketTrackingRequest;
use App\Http\Requests\UpdatedocketTrackingRequest;
use App\Models\Operation\docketTracking;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Account\Consignee;
use App\Models\Account\ConsignorMaster;
use App\Models\Account\CustomerMaster;
use App\Models\CompanySetup\PincodeMaster;
use App\Models\OfficeSetup\employee;
use App\Models\Stock\DocketAllocation;
use App\Models\Operation\DocketProductDetails;
use App\Models\Operation\DocketInvoiceDetails;
use App\Models\Operation\DocketMaster;
use App\Models\Operation\DocketBookingType;
use App\Models\Operation\DevileryType;
use App\Models\Operation\PackingMethod;
use App\Models\Operation\DocketInvoiceType;
use App\Models\OfficeSetup\OfficeMaster;
use App\Models\Operation\UploadDocket;
use App\Models\Operation\DocketCase;
use App\Models\Operation\Comments;
use App\Models\Operation\VolumetricCalculation; 
use Auth;
use App\Models\OfficeSetup\city;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\OfficeSetup\ComplaintType;
use App\Exports\InvoiceModelExport;
class DocketTrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $docket=$request->get('docket');
        if(isset($docket)){
        $storagePath = Storage::disk('local')->path($docket);
        if (is_writable($storagePath)) 
        {
            $docket=$request->get('docket');
            $data=Storage::disk('local')->get($docket);
          
            $Docket=DocketMaster::with('offcieDetails','BookignTypeDetails','DevileryTypeDet','customerDetails','consignor','consignoeeDetails','DocketProductDetails','PincodeDetails','DestPincodeDetails','DocketInvoiceDetails','DocketAllocationDetail','getpassDataDetails','DocketImagesDet','RTODataDetails','DocketCaseDetails','InvoiceMasterMainDetails')->withCount('DocketInvoiceDetails as Total')->withSum('DocketInvoiceDetails','Amount')->where('docket_masters.Docket_No',$docket)->first();
            $datas=array_reverse(explode("</tr>",$data));
           
            $Case = DocketCase::with("EmployeeDetail","EmployeeUpdateDetail")->where("Docket_Number",$docket)->first();
           
        }
        else{
            $Docket=[];
            $datas[]='<tr><td class="text-center error" colspan="5">No Record Found</td></tr>';
            $Case =[];
        }
    }
        else
        {
            $Docket=[];
            $datas=[]; 
            $Case =[];  
        }
      
       
       
         return view('Operation.docketTracking', [
             'title'=>'DOCKET TRACKING',
             'data'=>$datas,
             'Docket'=>$Docket,
             'Case'=>$Case
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
     * @param  \App\Http\Requests\StoredocketTrackingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredocketTrackingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\docketTracking  $docketTracking
     * @return \Illuminate\Http\Response
     */
    public function show(docketTracking $docketTracking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\docketTracking  $docketTracking
     * @return \Illuminate\Http\Response
     */
    public function edit(docketTracking $docketTracking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedocketTrackingRequest  $request
     * @param  \App\Models\Operation\docketTracking  $docketTracking
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedocketTrackingRequest $request, docketTracking $docketTracking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\docketTracking  $docketTracking
     * @return \Illuminate\Http\Response
     */
    public function destroy(docketTracking $docketTracking)
    {
        //
    }

    public function GetDocketInvoiceDetail(Request $request){
      $RequestId = $request->id;
      $data =DocketInvoiceDetails::where("Docket_Id",$RequestId)->get();

      return view('Operation.DocketInvoiceModal',
        ['title'=>'Docket Invoice',
        'datas'=>$data,
        'Docket' => $request->docket,
        'DocketId'=> $RequestId ]);
    }

    public function UploadImageDocketTracking(Request $request){
        $docket = $request->docket;
        $Images =  UploadDocket::get();
        return view('Operation.UploadImageDocketTracking', [
            'title'=>'Upload Docket POD Image',
            'Images'=>$Images,
            "docket"=>$docket]);
    }

    public function OpenCaseDocketTracking(Request $request){
        $UserId =Auth::id();
        $employee = employee::where("Is_Active","Yes")->get();
        $Office = OfficeMaster::where("Is_Active","Yes")->get();
        $docket = $request->docket;
        $ComplainType = ComplaintType::where("CaseOpen","Yes")->get();
        $City = city::get();
        
        if(isset($request->CaseId)){
            $allCase =  DocketCase::with("EmployeeDetail","StatusDetail")->where("id",$request->CaseId)->get();
            $OpenCaseView = $request->ViewCase;
            $CaseId = $request->CaseId;
            $CaseDetails = DocketCase::with("EmployeeDetail")->where("id",$request->CaseId)->first();
        }
        else{
            $OpenCaseView = ""; 
            $CaseDetails = [];
            $allCase =  [];
        }
        return view('Operation.OpenCaseDocketTracking', [
            'title'=>$request->title,
            "employee" =>  $employee,
            "UserId" => $UserId,
            "Office" => $Office,
            "docket"=> $docket,
            "City"=> $City,
            "CaseDetails"=>$CaseDetails,
            "ComplainType"=> $ComplainType,
            "allCase"=>$allCase]);
    }

    public function CaseSubmit(Request $request){
      //  CaseSubmit
      date_default_timezone_set('Asia/Kolkata');
     $User = Auth::id();
      $case = DocketCase::orderBy("id","DESC")->first();
      if(isset($case->id)){
      $GeneratedCaseNO = intval($case->id+1);
      }
      else{
        $GeneratedCaseNO = '1';  
      }
      if($request->CaseOpenId){
        $getResult= DocketCase::where("id",$request->CaseOpenId)->update([ "updated_at"=>date("Y-m-d",strtotime($request->CaseClosingDate)),
        "Updated_Remark"=>$request->remarks,"Case_Status"=>$request->case_status,
        "updated_by"=>$User]);

        $docketFile= DocketCase::leftjoin("employees","employees.user_id","Docket_Case.updated_by")
        ->leftjoin("office_masters","office_masters.id","Docket_Case.Case_Office")
        ->where("Docket_Case.id",$request->CaseOpenId)
        ->select("Docket_Case.*","employees.EmployeeName","employees.EmployeeCode" ,"office_masters.OfficeCode",
        "office_masters.OfficeName" )->first();
        $string = "<tr><td>CASE CLOSED </td><td>".date("d-m-Y",strtotime($request->CaseClosingDate))."</td><td><strong>CASE STATUS: </strong>CLOSED"."<br><strong>DATE: </strong>".date("d-m-Y",strtotime($docketFile->updated_at))."<br><strong>REMARK: </strong> $docketFile->Remark </td><td>".date('d-m-Y h:i A')."</td><td>".$docketFile->EmployeeName."<br> (".$docketFile->OfficeCode.'~'.$docketFile->OfficeName.")</td></tr>"; 
        Storage::disk('local')->append($docketFile->Docket_Number, $string);

        if($getResult){
            echo "Case Close Successfully";
        }
      }
      else{
        $getResult= DocketCase::insertGetId(["Case_number" =>$GeneratedCaseNO,
        "Case_OpenBy" =>$request->case_open_by,
        "Docket_Number"=>$request->docket_no,
        "Case_OpenDate"=> date("Y-m-d",strtotime($request->case_open_date)),
        "Case_Status"=>$request->case_status,
        "Case_Office"=>$request->case_open_office,
        "Complaint_Type"=>$request->complaint_type,
        "Caller_Type"=>$request->caller_type,
        "Caller_Name"=>$request->caller_name,
        "Contact_Number"=>$request->contact_no,
        "Caller_City"=>$request->caller_city,
        "Email"=>$request->email,
        "Remark"=>$request->remarks
        ]);
        $docket = $request->docket_no;
        $docketFile= DocketCase::leftjoin("employees","employees.id","Docket_Case.Case_OpenBy")
        ->leftjoin("office_masters","office_masters.id","Docket_Case.Case_Office")
        ->where("Docket_Case.id",$getResult)->first();
        $string = "<tr><td>CASE OPEN </td><td>".date("d-m-Y",strtotime($docketFile->Case_OpenDate))."</td><td><strong>CASE NO: </strong>".$docketFile->Case_number."<br><strong>COMPLAINT TYPE: </strong>$docketFile->Complaint_Type<br><strong>CALLER TYPE: </strong>$docketFile->Caller_Type <br><strong>CALLER NAME: </strong>$docketFile->Caller_Name <br><strong>REMARK: </strong> $docketFile->Remark </td><td>".date('d-m-Y h:i A')."</td><td>".$docketFile->EmployeeName."<br> (".$docketFile->OfficeCode.'~'.$docketFile->OfficeName.")</td></tr>"; 
        Storage::disk('local')->append($docket, $string);

        if($getResult){
            echo "Case Submit Successfully";
        }
     }
    }

    public function ViewCaseDocketTracking(Request $request){
      
        $docket =$request->docket;
        $Case = DocketCase::with("EmployeeDetail")->where("Docket_Number",$docket)->first();
        if(!empty($Case)){
            if(isset($Case->Case_Status) && $Case->Case_Status==1){
                $Status ="Open";
            }
            elseif($Case->Case_Status==2){
                $Status ="Close";
            }
            else{
                $Status ="";
            }
            if(isset($Case->EmployeeDetail->EmployeeName)){
                $user = $Case->EmployeeDetail->EmployeeName;
            }
            else{
                $user ="";
            }
                echo "<table style='width:100%;'><body>
                <tr  style='background-color:#888888;'><td class='p-1' colspan='8' style='color:#fff;' ><b>CASE DETAILS</b></td></tr>
                <tr>
                <td class='back-color d11 p-1' style='width:100px;'> Case No</td>
                <td class='p-1' style='width:50px;'>".$Case->Case_number."</td>
                <td class='back-color d11 p-1'  style='width:100px;'> Case Open Date</td>
                    <td class='p-1'  style='width:100px;'>".$Case->Case_OpenDate."</td>
                <td class='back-color d11 p-1'  style='width:100px;'>Case Status</td>
                    <td class='p-1'  style='width:100px;'>".$Status."</td>
                <td class='back-color d11 p-1'  style='width:100px;'>User Name</td>
                    <td class='p-1'  style='width:100px;'>".$user."</td>
                </tr> </body>  </table>";
        }
        else{
            echo "false";
        }
    }

   public function GetdeliveryAddressTracking(Request $request){
    $docket = $request->ID;
    $data =  DocketMaster::with('consignor','consignoeeDetails')->where("id",$docket)->first();
    return view("Operation.DeliveryDetailTrackingModal",
    ["title"=> "Delivery Address",
    "data" =>$data]);
   }

   public function GetOpenedTrackingComment(Request $requset){
       $dockNo = $requset->DocketNo;
       $comments = Comments::where("Docket",$dockNo)->get();
       return view("Operation.trackinCommentsModal",
       ["title"=> "Comment Opened",
       "dockNo" =>$dockNo,
       "comments"=>$comments]);
   }

   public function GetOpenedTrackingCommentPost(Request $requset){
    $UserId =Auth::id();
    $docket= $requset->Docket;
    $Comment= $requset->Comment;
     $data =  Comments::insertGetId(["docket"=>$docket,"Comments"=> $Comment,"CreatedBy"=>$UserId]);
   }

   public function ModalItemExport(Request $requset){
        $docket = $requset->get("docketId");
       if(isset($docket))
       {
          return  Excel::download(new InvoiceModelExport($docket), 'InvoiceModelReport.xlsx');
       }
   }

   public function DocketTrackExport(Request $requset){
    $docket = $requset->get("docketId");
    if(isset($docket))
    {
        $data=Storage::disk('local')->get($docket);
        $datasDocket=array_reverse(explode("</tr>",$data));

        $packet=array();
        $i=0;
      foreach( $datasDocket as $key =>$value){
        $packet[$i] = explode("</td>",$value);
        $i++;
      }

      $timestamp = date('Y-m-d');
          $filename = 'DocketTracking' . $timestamp . '.xls';
          header("Content-Type: application/vnd.ms-excel");
          header("Content-Disposition: attachment; filename=\"$filename\"");
          echo '<body style="border: 0.1pt solid #000"> ';
          echo '<table class="table table-bordered table-striped table-actions">
                   <thead>
                <tr class="main-title text-dark">                                     
                <th class="p-1 td2" style="min-width:150px;">Activity</th>
                <th class="p-1 td2"></th>
                <th class="p-1 td3" style="min-width:150px;">Activity Date</th>
                <th class="p-1 td2"></th>
                <th class="p-1 td4" style="min-width:290px;">Description</th>
                <th class="p-1 td2"></th>
                <th class="p-1 td5" style="min-width:150px;">Entry Date</th>
                <th class="p-1 td2"></th>
                <th class="p-1 td6" style="min-width:190px;">Entry Detail</th>
               </tr>
                 </thead> <tbody>';    
                   $i=1;    
                foreach($packet as $key =>$value){
                    echo '<tr>'; 
                    foreach($value as $item){
                        echo   '<td>'.$item.'</td>';
                    }
                    echo '</tr>';
                }
                 echo   '</tbody>
                    </table>';
                   exit(); 
      //  Excel::download(new DocketTrackingExport($datasDocket), 'DocketTrackingExport.xlsx');
    }
    
   }

   function GetVolumentrictracking(Request $request){
    $docket =  $request->ID;
    $docketNumber = $request->docket;
    $data = VolumetricCalculation::where("Docket_Id",$docket)->get();
    $Wight = DocketProductDetails::where("Docket_Id",$docket)->first();
    if(!empty($Wight)){
        $finalWeight =  $Wight->VolumetricWeight;
        $ChargeWeight =  $Wight->Charged_Weight;
    }
    else{
        $finalWeight = '';
        $ChargeWeight = '';
    }
    return view("Operation.volumetricDetailsModel",
    ["title"=> "Delivery Address",
    "data" =>$data,
    "finalWeight"=>$finalWeight,
    "Weight" => $ChargeWeight,
    "docketNumber"=>$docketNumber]);
    
   }


}
