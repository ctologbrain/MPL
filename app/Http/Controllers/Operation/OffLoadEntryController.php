<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOffLoadEntryRequest;
use App\Http\Requests\UpdateOffLoadEntryRequest;
use App\Models\Operation\OffLoadEntry;
use App\Models\Operation\OffloadReason;
use App\Models\Operation\DocketMaster;
use App\Models\Operation\DocketProductDetails;
use Illuminate\Http\Request;
use Auth;
use App\Models\OfficeSetup\NdrMaster;
use Illuminate\Support\Facades\Storage;
class OffLoadEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        $offloadreason = NdrMaster::where('OffloadReason','Yes')->get();
        return view('Operation.offloadEntry', [
            'title'=>'OFFLOAD ENTRY',
            'offloadreason'=>$offloadreason] );

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
     * @param  \App\Http\Requests\StoreOffLoadEntryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOffLoadEntryRequest $request)
    {
        //
         date_default_timezone_set('Asia/Kolkata');
        $UserId=Auth::id();
      $OffloadDate = date("Y-m-d",strtotime($request->offload_date));
       $dataArr= array("Remark"=>$request->remark,
       "Docket_NO"=> $request->docket_no,
       "Offload_Date"=> $OffloadDate,
       "Offload_Reason"=> $request->offload_reason,
       "Created_By" => $UserId);
       OffLoadEntry::insert($dataArr);
       $docketFile=OffLoadEntry::
       leftjoin('ndr_masters','ndr_masters.id','=','Offload_Transactions.Offload_Reason')
       ->leftjoin('users','users.id','=','Offload_Transactions.Created_By')
       ->leftjoin('employees','employees.user_id','=','users.id')
        ->leftjoin('office_masters','employees.OfficeName','=','office_masters.id')
       ->select('Offload_Transactions.*','ndr_masters.ReasonCode','employees.EmployeeName','ndr_masters.ReasonDetail','office_masters.OfficeCode','office_masters.OfficeName')
      ->where('Offload_Transactions.Docket_NO',$request->docket_no)
      ->first();
      $string = "<tr><td>OFFLOAD</td><td>".date("d-m-Y",strtotime($docketFile->Offload_Date)) ."</td><td><strong>OFFLOAD DATE: </strong>".date("d-m-Y",strtotime($docketFile->Offload_Date)) ."<br><strong>REASON: </strong>$docketFile->ReasonCode~$docketFile->ReasonDetail <td>".date('Y-m-d h:i A')."</td><td>".$docketFile->EmployeeName."(".$docketFile->OfficeCode.'~'.$docketFile->OfficeName.")</td></tr>"; 
      Storage::disk('local')->append($request->docket_no, $string);
       echo json_encode(array("success"=>1));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\OffLoadEntry  $offLoadEntry
     * @return \Illuminate\Http\Response
     */
    public function show(OffLoadEntry $offLoadEntry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\OffLoadEntry  $offLoadEntry
     * @return \Illuminate\Http\Response
     */
    public function edit(OffLoadEntry $offLoadEntry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOffLoadEntryRequest  $request
     * @param  \App\Models\Operation\OffLoadEntry  $offLoadEntry
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOffLoadEntryRequest $request, OffLoadEntry $offLoadEntry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\OffLoadEntry  $offLoadEntry
     * @return \Illuminate\Http\Response
     */
    public function destroy(OffLoadEntry $offLoadEntry)
    {
        //
    }

    public function GetDocketOffLoadPost(Request $req){
      $DocketData=  DocketMaster::with('customerDetails','DocketProductDetails')->where("Docket_No",$req->Docket)->first();
           
      if(!empty($DocketData)){
      $getDD = array("CCode"=>  $DocketData->customerDetails->CustomerCode, "CName" =>$DocketData->customerDetails->CustomerName,"load"=> $DocketData->DocketProductDetails->Packing_M);
      echo  json_encode(array("success"=>1 ,"bodyPart"=>$getDD));
      }
      else{
           echo  json_encode(array("success"=>0 ,"bodyPart"=>[]));
      }    
    }
}
