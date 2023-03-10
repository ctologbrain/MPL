<?php

namespace App\Http\Controllers\Operation;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreGatePassReceivingRequest;
use App\Http\Requests\UpdateGatePassReceivingRequest;
use App\Models\Operation\GatePassReceiving;
use Illuminate\Http\Request;
use App\Models\OfficeSetup\OfficeMaster;
use App\Models\Operation\GatePassWithDocket;
use App\Models\Operation\VehicleGatepass;

use Auth;
class GatePassReceivingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offcie=OfficeMaster::get();
        return view('Operation.gatepassreceiving', [
            'title'=>'GATEPASS - RECEIVING',
            'offcie'=>$offcie
            ]);
        
    }
    public function getGatePassDetails(Request $request)
    {
        $gatePassDetails=VehicleGatepass::with('fpmDetails','VendorDetails','VehicleTypeDetails','VehicleDetails','DriverDetails','RouteMasterDetails','getPassDocketDetails')
        ->where('vehicle_gatepasses.GP_Number',$request->getPass)->first();
        if(empty($gatePassDetails))
        {
            $datas=array('status'=>'false','message'=>'Gatepass not found');
        }
        else{
            $datas=array('status'=>'true','message'=>'success','datas'=>$gatePassDetails);
        }
        echo  json_encode($datas);
    }
    public function GetDocketWithGatePass(Request $request)
    {
      $checkDocket=GatePassWithDocket::where('Docket',$request->Docket)->where('GatePassId',$request->gatePassId)->first();
      if(empty($checkDocket))
      {
        $datas=array('status'=>'false','message'=>'Docket not found');
      }
      else{
        $datas=array('status'=>'true','message'=>'success','datas'=>$checkDocket);
      }
      echo  json_encode($datas);
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
     * @param  \App\Http\Requests\StoreGatePassReceivingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGatePassReceivingRequest $request)
    {
        $file=$request->file;
        $UserId=Auth::id();
       
       if($file ==''){
        $checkDocket=GatePassReceiving::where('Docket',$request->DocketNumber)->where('Gp_Id',$request->gpNumber)->first();
        if(empty($checkDocket))
        {
            $lastid=GatePassReceiving::insertGetId(['Gp_Rcv_Type'=>$request->ReceivingType,'Rcv_Office' => $request->office,'Rcv_Date'=>$request->rdate,'Supervisor'=>$request->supervisorName,'Docket'=>$request->DocketNumber,'Gp_Id'=>$request->gpNumber,'Rcv_Qty'=>$request->ReceivedQty,'PendingQty'=>$request->ReceivedQty,'Remark'=>$request->Remark,'Recieved_By'=>$UserId]);
            $getGatePass=GatePassReceiving::
            leftjoin('office_masters','office_masters.id','=','gate_pass_receivings.Gp_Id')
            ->select('office_masters.OfficeName','office_masters.OfficeCode','gate_pass_receivings.*')
            ->where('Gp_Id',$request->gpNumber)->get();
            $html='';
            $html.='<table class="table-responsive table-bordered" width="100%"><thead><tr class="main-title text-dark"><th>Docket</th><th>Destination Office</th><th>Pieces</th><th>Date</th><tr></thead><tbody>';
            foreach($getGatePass as $getGate)
            {
                $html.='<tr><td>'.$getGate->Docket.'</td><td>'.$getGate->OfficeName.'</td><td>'.$getGate->Rcv_Qty.'</td><td>'.$getGate->Rcv_Date.'</td></tr>'; 
                
            }
            $html.='<tbody></table>';
            $datas=array('status'=>'true','message'=>'success','datas'=>$html);
        }
        else{
            $getGatePass=GatePassReceiving::
            leftjoin('office_masters','office_masters.id','=','gate_pass_receivings.Gp_Id')
            ->select('office_masters.OfficeName','office_masters.OfficeCode','gate_pass_receivings.*')
            ->where('Gp_Id',$request->gpNumber)->get();
            $html='';
            $html.='<table class="table-responsive table-bordered" width="100%"><thead><tr class="main-title text-dark"><th>Docket</th><th>Destination Office</th><th>Pieces</th><th>Date</th><tr></thead><tbody>';
            foreach($getGatePass as $getGate)
            {
                $html.='<tr><td>'.$getGate->Docket.'</td><td>'.$getGate->OfficeName.'</td><td>'.$getGate->Rcv_Qty.'</td><td>'.$getGate->Rcv_Date.'</td></tr>'; 
                
            }
            $html.='<tbody></table>';
            $datas=array('status'=>'false','message'=>'success','datas'=>$html);
        }
    }
    else{
        $destinationPath = 'public/document';
        $new_file_name = date('ymdHis').$file->getClientOriginalName();
        $moved = $file->move($destinationPath,$new_file_name);
        $lastid=GatePassReceiving::insertGetId(['Gp_Rcv_Type'=>$request->ReceivingType,'Rcv_Office' => $request->office,'Rcv_Date'=>$request->rdate,'Supervisor'=>$request->supervisorName,'Docket'=>'','Gp_Id'=>$request->gpNumber,'Rcv_Qty'=>'','PendingQty'=>'','Remark'=>$request->Remark,'Recieved_By'=>$UserId,'DocumentName'=>$moved]);
        $getGatePass=GatePassReceiving::
        leftjoin('office_masters','office_masters.id','=','gate_pass_receivings.Gp_Id')
        ->select('office_masters.OfficeName','office_masters.OfficeCode','gate_pass_receivings.*')
        ->where('Gp_Id',$request->gpNumber)->get();
        $html='';
        $html.='<table class="table-responsive table-bordered" width="100%"><thead><tr class="main-title text-dark"><th>Docket</th><th>Destination Office</th><th>Pieces</th><th>Date</th><tr></thead><tbody>';
        foreach($getGatePass as $getGate)
        {
            $html.='<tr><td>'.$getGate->Docket.'</td><td>'.$getGate->OfficeName.'</td><td>'.$getGate->Rcv_Qty.'</td><td>'.$getGate->Rcv_Date.'</td></tr>'; 
            
        }
        $html.='<tbody></table>';
        $datas=array('status'=>'true','message'=>'success','datas'=>$html);
    }
       
        echo  json_encode($datas);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\GatePassReceiving  $gatePassReceiving
     * @return \Illuminate\Http\Response
     */
    public function show(GatePassReceiving $gatePassReceiving)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\GatePassReceiving  $gatePassReceiving
     * @return \Illuminate\Http\Response
     */
    public function edit(GatePassReceiving $gatePassReceiving)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGatePassReceivingRequest  $request
     * @param  \App\Models\Operation\GatePassReceiving  $gatePassReceiving
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGatePassReceivingRequest $request, GatePassReceiving $gatePassReceiving)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\GatePassReceiving  $gatePassReceiving
     * @return \Illuminate\Http\Response
     */
    public function destroy(GatePassReceiving $gatePassReceiving)
    {
        //
    }
}
