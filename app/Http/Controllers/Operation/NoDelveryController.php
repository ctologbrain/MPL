<?php

namespace App\Http\Controllers\Operation;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\StoreNoDelveryRequest;
use App\Http\Requests\UpdateNoDelveryRequest;
use App\Models\Operation\NoDelvery;
use App\Models\OfficeSetup\OfficeMaster;
use App\Models\OfficeSetup\NdrMaster;

use App\Models\Operation\DocketAllocation;

use App\Http\Requests\UpdateDocketAllocationRequest;
use App\Models\Operation\DocketMaster;
use App\Models\OfficeSetup\employee;

use Auth;



class NoDelveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $UserId=Auth::id();
        $NDR_Master= NdrMaster::get();
           $offcie=OfficeMaster::get();
           $OffcieSalacted=employee::select('office_masters.id','office_masters.OfficeCode','office_masters.OfficeName','office_masters.City_id','office_masters.Pincode','employees.id as EmpId')
        ->leftjoin('office_masters','office_masters.id','=','employees.OfficeName')
        ->where('employees.user_id',$UserId)->first();
         return view('Operation.nondelivery', [
            'title'=>'No DELIVERY',
            'offcie'=>$offcie,
            'OffcieSalacted'=> $OffcieSalacted,
            'NDR_Master'=>$NDR_Master]);
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
     * @param  \App\Http\Requests\StoreNoDelveryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNoDelveryRequest $request)
    {
        //
         $UserId=Auth::id();
        
         NoDelvery::insert(['Dest_Office'=>$request->desination_office,'Docket_No'=>$request->Docket_No,'NDR_Date'=>$request->NDR_Date,'NDR_Reason'=>$request->NDR_Reason,'Remark'=>$request->Remark,'Created_By'=>$UserId]);
                $successData ="true";
         
         echo  json_encode(array("success"=>$successData));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\NoDelvery  $noDelvery
     * @return \Illuminate\Http\Response
     */
    public function show(NoDelvery $noDelvery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\NoDelvery  $noDelvery
     * @return \Illuminate\Http\Response
     */
    public function edit(NoDelvery $noDelvery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNoDelveryRequest  $request
     * @param  \App\Models\Operation\NoDelvery  $noDelvery
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNoDelveryRequest $request, NoDelvery $noDelvery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\NoDelvery  $noDelvery
     * @return \Illuminate\Http\Response
     */
    public function destroy(NoDelvery $noDelvery)
    {
        //
    }

     public function CheckDocketNo(Request $request)
    { 
        $status= DocketAllocation::where("Docket_No",$request->Docket_No)->first();
         if(!empty($status) && ($status->Status==5 || $status->Status==6 || $status->Status==7)){

            $DocketData=  DocketMaster::with('customerDetails')->where("Docket_No",$request->Docket_No)->first();
            // print_r($DocketData); die;
            if(!empty($DocketData)){
            $successData ="true";
            $getDD = array("CCode"=>  $DocketData->customerDetails->CustomerCode, "CName" =>$DocketData->customerDetails->CustomerName);
            }
            else{
                 echo  json_encode(array("success"=>"false" ,"bodyPart"=>[]));
            }

         }

         else{
                 $successData ="false";
                 $getDD =array();
         }
        echo  json_encode(array("success"=>$successData ,"bodyPart"=>$getDD));
    }

   public function  DeliveryOrderDelay(){
        return view('Operation.deliveryorder', [
            'title'=>'DELIVERY ORDER']);
   }

   public function  DeliveryOrderDelayPost(UpdateDocketAllocationRequest $request){
     $UserId=Auth::id();
     $status= DocketAllocation::where("Docket_No",$request->docket_no)->first();
     if(!empty($status)){
        DocketAllocation::where("Docket_No",$request->docket_no)->update(['DeliveryDate'=>$request->delivery_date,'Deliveryremark'=>$request->remark,'DelUpdated_By'=>$UserId]);
                $successData ="true";
         
         echo  json_encode(array("success"=>$successData));
     }
     else{
         echo  json_encode(array("success"=>"false"));
     }
   }

}