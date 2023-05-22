<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTopaycollectionRequest;
use App\Http\Requests\StoreDocketDepositTransRequest;
use App\Http\Requests\UpdateTopaycollectionRequest;
use App\Models\Operation\Topaycollection;
use App\Models\Operation\DocketDepositTrans;

use App\Models\CompanySetup\BankMaster;
use App\Models\OfficeSetup\OfficeMaster;

use Illuminate\Http\Request;
use App\Models\Operation\DocketMaster;
use App\Models\OfficeSetup\employee;
use Auth;

class TopaycollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bank = BankMaster::get();
        $office = OfficeMaster::get();
        return view('Operation.topay', [
             'title'=>'To Pay Collection',
             'bank'=>$bank,
             'office' =>$office]);

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
     * @param  \App\Http\Requests\StoreTopaycollectionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTopaycollectionRequest $request)
    {
        //
       $EmpUserId = Auth::id(); 
       $UserId=   employee::where("user_id",$EmpUserId)->first()->id;
        $inserData =array("Docket_Id"=>$request->docketId,
                "Date"=>date("Y-m-d",strtotime($request->collection_date)),
                "Type"=>$request->collection_type,
                "Amt"=>$request->collection_amount,
                "Bank"=>$request->bank_name,
                "Remark"=>$request->collection_remarks,
                "Created_By"=>$UserId
                );
       $lastId= Topaycollection::insertGetId($inserData);
       $file = $request->file('file');
       if(isset($file) && $file!=''){
        $destinationPath = public_path('Topaycollection_doc');
        $file->move($destinationPath, date('YmdHis').$file->getClientOriginalName());
          $link = 'public/Topaycollection_doc/'. date('YmdHis').$file->getClientOriginalName();
       }
       else{
        $link = '';
       }
        $inserDataTwo = array("Docket_Id"=>$request->docketId,
                        "Date"=>date("Y-m-d",strtotime($request->deposite_date )),
                        "DepositAt"=>$request->deposite_at,
                        "Amt"=>$request->deposite_amount,
                        "Bank"=>$request->depositeInBank,
                        "Account_Number"=>$request->depositeAccNo,
                        "Remark"=>$request->deposite_remarks,
                        "Branch"=>$request->BRANCH,
                        "Attachment"=>$link,
                        "Created_By"=>$UserId);
        //Branch
        $lastId= DocketDepositTrans::insertGetId($inserDataTwo);
        echo json_encode(array("status"=>"true"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\Topaycollection  $topaycollection
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Topaycollection $topaycollection)
    {
        //
        $date= [];
        $Office ='';
        if($request->formDate){
            $date['from'] = date("Y-m-d",strtotime($request->formDate));
        }
    
        if($request->todate){
            $date['to'] = date("Y-m-d",strtotime($request->todate));
        }

        if($request->office){
            $Office = $request->office;
        }
        $OfficeMaster =OfficeMaster::get();
       $allTopay= Topaycollection::with('DocketMasterInfo','DocketcalBankInfo')->where(function($query) use($date){
           if(isset($date['from']) && isset($date['to'])){
               $query->whereBetween("Date" ,[$date['from'],$date['to']]);
           }
       })->where(function($query) use($Office){
        if($Office!=''){
            $query->whereRelation("DocketMasterInfo", "Office_ID" ,$Office);
        }
       })->paginate(10);
      //echo '<pre>'; print_r($allTopay[0]->DocketMasterInfo); die; 'DocketDepositInfo'
          return view('Operation.topayReport', [
             'title'=>'CASH To Pay Collection Report',
             'AllTopay'=>$allTopay,
             'OfficeMaster'=>$OfficeMaster]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\Topaycollection  $topaycollection
     * @return \Illuminate\Http\Response
     */
    public function edit(Topaycollection $topaycollection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTopaycollectionRequest  $request
     * @param  \App\Models\Operation\Topaycollection  $topaycollection
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTopaycollectionRequest $request, Topaycollection $topaycollection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\Topaycollection  $topaycollection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topaycollection $topaycollection)
    {
        //
    }

    public function getDocketInformation(Request $request){
        $dockInfo=  DocketMaster::with('customerDetails','DestPincodeDetails','PincodeDetails','DocketProductDetails','BookignTypeDetails')->where("Docket_No",$request->Docket)
        ->where(function($query) {
            $query->where('Booking_Type','!=',1)
                 ->Where('Booking_Type','!=',2);
            })
        ->first();

        if(!empty($dockInfo)){
            echo json_encode(array("status"=>'true', "bodyInfo"=>$dockInfo));
        }
        else{
            echo json_encode(array("status"=>'false', "bodyInfo"=>[]));
        }
    }

    public function DepositDocketReport(Request $request)
    {
        $date= [];
        $Office ='';
        if($request->formDate){
            $date['from'] = date("Y-m-d",strtotime($request->formDate));
        }
    
        if($request->todate){
            $date['to'] = date("Y-m-d",strtotime($request->todate));
        }

        if($request->office){
            $Office = $request->office;
        }

        $OfficeMaster =OfficeMaster::get();
        $allTopay= DocketDepositTrans::with('DocketMasterInfo','BankDetails')->where(function($query) use($date){
            if(isset($date['from']) && isset($date['to'])){
                $query->whereBetween("Date" ,[$date['from'],$date['to']]);
            }
        })->where(function($query) use($Office){
            if($Office!=''){
                $query->whereRelation("DocketMasterInfo", "Office_ID" ,$Office);
            }
        })->paginate(10);
        return view('Operation.topayDepositReport', [
            'title'=>'CASH To Pay Deposit Report',
            'AllTopay'=>$allTopay,
            'OfficeMaster'=>$OfficeMaster]);
    }
}
