<?php

namespace App\Http\Controllers\Operation;
use App\Http\Controllers\Controller;

use App\Models\Operation\Forwarding;
use App\Http\Requests\StoreForwardingRequest;
use App\Http\Requests\UpdateForwardingRequest;
use App\Models\OfficeSetup\OfficeMaster;
use App\Models\OfficeSetup\employee;
use App\Models\Vendor\VendorMaster;
use App\Models\Operation\DocketMaster;
use App\Models\Stock\DocketAllocation;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Storage;
use DB;

class ForwardingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $vandor = VendorMaster::get();
        return view('Operation.Forwarding', [
            'title'=>'3D Forwarding',
            'vendor'=>  $vandor]);
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
     * @param  \App\Http\Requests\StoreForwardingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreForwardingRequest $request)
    {
        //
        $UserId = Auth::id();

       $getLastId = Forwarding::orderBy("id","DESC")->first();
       if(isset($getLastId->id)){
        $Office = employee::leftjoin("office_masters","employees.OfficeName","=","office_masters.id")->where("user_id",$UserId)->first();
        $ForwardingNo = $Office->OfficeCode.'/000'.($getLastId->id+1);
       }
       else{
        $ForwardingNo ='0001';
       }

        Forwarding::insert(["Forwarding_Date" =>date("Y-m-d",strtotime($request->forwarding_date)),
        "DocketNo"=> $request->docketNo,
        "ForwardingNo"=> $ForwardingNo,
        "Forwarding_Vendor"=> $request->forwarding_vendor_name,
        "Forwarding_Weight"=> $request->forwarding_weight,
        "CreatedBy"=> $UserId]);
        DocketAllocation::where("Docket_No",$request->docketNo)->update(['Status' =>10,'BookDate'=>date("Y-m-d",strtotime($request->forwarding_date))]);
        $docketFile=DocketMaster::leftjoin('forwarding','forwarding.DocketNo','=','docket_masters.Docket_No')
        ->leftjoin('vendor_masters','vendor_masters.id','=','forwarding.Forwarding_Vendor')
        ->leftjoin('users','users.id','=','forwarding.CreatedBy')
        ->leftjoin('employees','employees.user_id','=','users.id')
        ->leftjoin('office_masters','employees.OfficeName','=','office_masters.id')
        ->select('forwarding.ForwardingNo','forwarding.Forwarding_Weight','forwarding.Forwarding_Date','employees.EmployeeName','vendor_masters.VendorName','vendor_masters.VendorCode', 'office_masters.OfficeCode','office_masters.OfficeName')
        ->where('docket_masters.Docket_No',$request->docketNo)
        ->first();
         $string = "<tr><td>3PL FORWARDING</td><td>".date("d-m-Y",strtotime($docketFile->Forwarding_Date))."</td><td><strong>FORWARDING DATE: </strong>".date("d-m-Y",strtotime($docketFile->Forwarding_Date))."<br><strong>FORWARDING NO: </strong>$docketFile->ForwardingNo<br><strong>VENDOR NAME: </strong>$docketFile->VendorCode ~ $docketFile->VendorName <br><strong> FORWARDING WEIGHT:</strong>$docketFile->Forwarding_Weight</td><td>".date('d-m-Y h:i A')."</td><td>".$docketFile->EmployeeName."<br> (".$docketFile->OfficeCode.'~'.$docketFile->OfficeName.")</td></tr>"; 
           Storage::disk('local')->append($request->docketNo, $string);

        echo "Forward successfully";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\Forwarding  $forwarding
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request ,Forwarding $forwarding)
    { 
        //
        $date =[];
        $office = '';
        $OfficeData ='';
        if($request->office){
        $OfficeData = $request->office;
        }
        if($request->formDate){
            $date['formDate']=  date("Y-m-d",strtotime($request->formDate));
        }
        
        if($request->todate){
           $date['todate']=  date("Y-m-d",strtotime($request->todate));
        }

        $Office = OfficeMaster::get();
        $forwardingOffice =  Forwarding::with("vendorDetails","DocketDetails")->withCount("DocketDetails as TotDock")
        ->where(function($query) use($OfficeData){
            if($OfficeData!=''){
                $query->whereRelation("DocketDetails","Office_ID",$OfficeData);
            }
        })
        ->where(function($query) use($date){
            if(isset($date['formDate']) &&  isset($date['todate'])){
                $query->whereBetween("Forwarding_Date",[$date['formDate'],$date['todate']]);
            }
           })    
        ->paginate(10);
        return view('Operation.forwarding_register', [
            'title'=>'3D Forwarding',
            'forwardingOffice'=>  $forwardingOffice,
            "Office"=>$Office]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\Forwarding  $forwarding
     * @return \Illuminate\Http\Response
     */
    public function edit(Forwarding $forwarding)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateForwardingRequest  $request
     * @param  \App\Models\Operation\Forwarding  $forwarding
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateForwardingRequest $request, Forwarding $forwarding)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\Forwarding  $forwarding
     * @return \Illuminate\Http\Response
     */
    public function destroy(Forwarding $forwarding)
    {
        //
    }

    public function getDocketDetails(Request $request){
      $details =  DocketMaster::with("customerDetails","DocketProductDetails","DocketManyInvoiceDetails","DocketAllocationDetail")
      ->where("Docket_No", $request->Docket)->first();
      if(!empty($details)){
        echo json_encode(array("Status"=>"true","datas"=>$details));
      }
      else{
        echo json_encode(array("Status"=>"false","datas"=>[]));
      }
    }
}
