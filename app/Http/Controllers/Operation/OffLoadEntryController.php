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
        $offloadreason = OffloadReason::get();
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
        $UserId=Auth::id();
       $dataArr= array("Remark"=>$request->remark,
       "Docket_NO"=> $request->docket_no,
       "Offload_Date"=> $request->offload_date,
       "Offload_Reason"=> $request->offload_reason,
       "Created_By" => $UserId);
       OffLoadEntry::insert($dataArr);
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
