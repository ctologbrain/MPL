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
use Auth;
use App\Models\OfficeSetup\city;
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
      
       
       
         return view('Operation.docketTracking', [
             'title'=>'DOCKET TRACKING',
             'data'=>$datas,
             'Docket'=>$Docket
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
        'datas'=>$data]);
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
        $employee = employee::get();
        $Office = OfficeMaster::get();
        $docket = $request->docket;
        $City = city::get();
        return view('Operation.OpenCaseDocketTracking', [
            'title'=>'Open Case Docket Tracking',
            "employee" =>  $employee,
            "UserId" => $UserId,
            "Office" => $Office,
            "docket"=> $docket,
            "City"=> $City
           ]);
    }

    public function CaseSubmit(Request $request){
      //  CaseSubmit
     
      $case = DocketCase::orderBy("id","DESC")->first();
      if(isset($case->id)){
      $GeneratedCaseNO = intval($case->id+1);
      }
      else{
        $GeneratedCaseNO = '1';  
      }
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
      if($getResult){
          echo "Case Submit Successfully";
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
}
