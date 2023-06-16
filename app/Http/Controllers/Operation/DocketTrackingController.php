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
use Auth;
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
            $Docket=DocketMaster::with('offcieDetails','BookignTypeDetails','DevileryTypeDet','customerDetails','consignor','consignoeeDetails','DocketProductDetails','PincodeDetails','DestPincodeDetails','DocketInvoiceDetails','DocketAllocationDetail','getpassDataDetails','DocketImagesDet','RTODataDetails')->withCount('DocketInvoiceDetails as Total')->withSum('DocketInvoiceDetails','Amount')->where('docket_masters.Docket_No',$docket)->first();
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
        return view('Operation.OpenCaseDocketTracking', [
            'title'=>'Open Case Docket Tracking',
            "employee" =>  $employee,
            "UserId" => $UserId,
            "Office" => $Office,
            "docket"=> $docket
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
      "Case_OpenBy" =>$request->Docket_Number,
      "Docket_Number"=>$request->Docket_Number,
      "Case_OpenDate"=>$request->Docket_Number,
      "Case_Status"=>$request->Docket_Number,
      "Case_Office"=>$request->Docket_Number,
      "Complaint_Type"=>$request->Docket_Number,
      "Caller_Type"=>$request->Docket_Number,
      "Caller_Name"=>$request->Docket_Number,
      "Contact_Number"=>$request->Docket_Number,
      "Caller_City"=>$request->Docket_Number,
      "Email"=>$request->Docket_Number,
      "Remark"=>$request->Docket_Number
      ]);
      if($getResult){
          echo "Case Submit Successfully";
      }
    }

    public function ViewCaseDocketTracking(Request $request){
        // $UserId =Auth::id();
        // $employee = employee::get();
        // $Office = OfficeMaster::get();
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
                echo "<table><body>
                <tr><td class='p-1' colspan='8'><b>CASE DETAILS</b></td></tr>
                <tr>
                <td class='back-color d11 p-1'> Case No</td>
                <td class='p-1'>".$Case->Case_number."</td>
                <td class='back-color d11 p-1'> Case Open Date</td>
                    <td class='p-1'>".$Case->Case_OpenDate."</td>
                <td class='back-color d11 p-1'>Case Status</td>
                    <td class='p-1'>".$Status."</td>
                <td class='back-color d11 p-1'>User Name</td>
                    <td class='p-1'>'".$user."</td>
                </tr> </body>  </table>";
        }
        else{
            echo "false";
        }
    }
}
