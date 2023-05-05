<?php

namespace App\Http\Controllers\Operation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRegularDeliveryRequest;
use App\Http\Requests\UpdateRegularDeliveryRequest;
use App\Models\Operation\RegularDelivery;
use App\Models\Stock\DocketAllocation;
use App\Models\Operation\DocketMaster;
use Illuminate\Support\Facades\Storage;
use Auth;
class RegularDeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Operation.RegularDelivery', [
            'title'=>'Regular Delivery',
              
        ]);
    }
    public function GetDocketForDelivery(Request $request)
    {
        $docket=DocketAllocation::
        leftjoin('docket_statuses','docket_statuses.id','=','docket_allocations.Status')
        ->leftjoin('Gp_Recv_Trans','Gp_Recv_Trans.Docket_No','=','docket_allocations.Docket_No')
        ->leftjoin('Regular_Deliveries','Regular_Deliveries.Docket_ID','=','docket_allocations.Docket_No')
        ->select('docket_allocations.Status','docket_statuses.title','Gp_Recv_Trans.GP_Recv_Id','Regular_Deliveries.Docket_ID')
        ->where('docket_allocations.Docket_No',$request->Docket)->first();
        if(empty($docket))
        {
         $datas=array('status'=>'false','message'=>'Docket not found');
        }
        elseif($docket->Status!=6)
        {
         $datas=array('status'=>'false','message'=>'Docket Status- '.$docket->title);
        }
        elseif($docket->Docket_ID!='')
        {
         $datas=array('status'=>'false','message'=>'Docket alredy delevred ');
        }
        else{
           $docketDetails=DocketMaster::with('offcieDetails','BookignTypeDetails','DevileryTypeDet','customerDetails','consignor','consignoeeDetails','DocketProductDetails','PincodeDetails','DestPincodeDetails','DocketInvoiceDetails')->where('Docket_No',$request->Docket)->first();
           $datas=array('status'=>'true','data'=>$docketDetails,'recId'=>$docket->GP_Recv_Id);
        
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
     * @param  \App\Http\Requests\StoreRegularDeliveryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRegularDeliveryRequest $request)
    {
        $file=$request->file;
        if($file !='')
        {
            $destinationPath = public_path('RegularDelDoc'); 
            $new_file_name = date('ymdHis').$file->getClientOriginalName();
            $file->move($destinationPath,$new_file_name);
            $moved = 'public/RegularDelDoc/'.$new_file_name;
        }
        else{
            $moved='';  
        }
        $UserId=Auth::id();
        DocketAllocation::where("Docket_No", $request->docket_number)->update(['Status' =>8,'BookDate'=>$request->delivery_date]);
        $lastId=RegularDelivery::insertGetId(
            ['Delivery_date' =>$request->delivery_date,'GP_ID'=>$request->RecId,'Docket_ID'=>$request->docket_number,'Delivery_Qty'=>$request->pieces,'Doc_Proof'=>$request->proof_name,'Recv_Name'=>$request->reciver_name,'Recv_Ph'=>$request->reciver_phn ,'Proof_Detail'=>$request->proof_detail,'Dest_Office_Id'=>$request->destination_office,'Time'=>$request->time,'Doc_Link'=>$moved,'Created_By'=>$UserId]
        );

        
        $docketFile=RegularDelivery::
         leftjoin('users','users.id','=','Regular_Deliveries.Created_By')
        ->leftjoin('employees','employees.user_id','=','users.id')
        ->select('Regular_Deliveries.*','employees.EmployeeName')
        ->where('Docket_ID',$request->docket_number)
        
       ->first();
         $string = "<tr><td>DELIVERED</td><td>$docketFile->Delivery_date</td><td><strong>DELIVERED TO: SELF</strong><br><strong>ON DATED: </strong>$docketFile->Delivery_date<br>(PROOF NAME SIGNATURE)</td><td>".date('Y-m-d H:i:s')."</td><td>$docketFile->EmployeeName</td></tr>"; 
            Storage::disk('local')->append($request->docket_number, $string);




        $getGatePass=RegularDelivery::
        leftjoin('office_masters','office_masters.id','=','Regular_Deliveries.Dest_Office_Id')
        ->select('office_masters.OfficeName','office_masters.OfficeCode','Regular_Deliveries.*')
        ->where('Regular_Deliveries.GP_ID',$request->RecId)->get();
        $html='';
        $html.='<table class="table-responsive table-bordered" width="100%"><thead><tr class="main-title text-dark"><th>Docket</th><th>Destination Office</th><th>Pieces</th><th>Time</th><th>Proof Name</th><th>Reciever Name</th><th>Rec. Phone</th><th>Proof Details</th><tr></thead><tbody>';
        foreach($getGatePass as $getGate)
        {
            $html.='<tr><td>'.$getGate->Docket_ID.'</td><td>'.$getGate->OfficeName.'</td><td>'.$getGate->Delivery_Qty.'</td><td>'.$getGate->Time.'</td><td>'.$getGate->Doc_Proof.'</td><td>'.$getGate->Recv_Name.'</td><td>'.$getGate->Recv_Ph.'</td><td>'.$getGate->Proof_Detail.'</td></tr>'; 
            
        }
        $html.='<tbody></table>';
        $datas=array('status'=>'true','message'=>'success','datas'=>$html);
        echo  json_encode($datas);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\RegularDelivery  $regularDelivery
     * @return \Illuminate\Http\Response
     */
    public function show(RegularDelivery $regularDelivery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\RegularDelivery  $regularDelivery
     * @return \Illuminate\Http\Response
     */
    public function edit(RegularDelivery $regularDelivery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRegularDeliveryRequest  $request
     * @param  \App\Models\Operation\RegularDelivery  $regularDelivery
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRegularDeliveryRequest $request, RegularDelivery $regularDelivery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\RegularDelivery  $regularDelivery
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegularDelivery $regularDelivery)
    {
        //
    }
}
