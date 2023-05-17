<?php

namespace App\Http\Controllers\Operation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRegularDeliveryRequest;
use App\Http\Requests\UpdateRegularDeliveryRequest;
use App\Models\Operation\RegularDelivery;
use App\Models\Stock\DocketAllocation;
use App\Models\Operation\DocketMaster;
use App\Models\OfficeSetup\OfficeMaster;
use App\Models\OfficeSetup\DeliveryProofMaster;
use Illuminate\Support\Facades\Storage;
use Auth;
use DB;
class RegularDeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deliveryProof =DeliveryProofMaster::get();
        $DestOffice=  OfficeMaster::get();
        return view('Operation.RegularDelivery', [
            'title'=>'Regular Delivery',
            'DestOffice'=>$DestOffice,
            'deliveryProof'=>$deliveryProof
              
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
           $docketDetails=DocketMaster::with('offcieDetails','BookignTypeDetails','DevileryTypeDet','customerDetails','consignor','consignoeeDetails','DocketProductDetails','PincodeDetails','DestPincodeDetails','DocketInvoiceDetails')->withSum('PartLoadBalDetail','PartPicess')->where('Docket_No',$request->Docket)->first();
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
        date_default_timezone_set('Asia/Kolkata');
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
        DocketAllocation::where("Docket_No", $request->docket_number)->update(['Status' =>8,'BookDate'=>date("Y-m-d H:i:s", strtotime($request->delivery_date))]);
        $lastId=RegularDelivery::insertGetId(
            ['Delivery_date' =>date("Y-m-d H:i:s", strtotime($request->delivery_date)),'GP_ID'=>$request->RecId,'Docket_ID'=>$request->docket_number,'Delivery_Qty'=>$request->pieces,'Doc_Proof'=>$request->proof_name,'Recv_Name'=>$request->reciver_name,'Recv_Ph'=>$request->reciver_phn ,'Proof_Detail'=>$request->proof_detail,'Dest_Office_Id'=>$request->destination_office,'Time'=>$request->time,'Doc_Link'=>$moved,'Created_By'=>$UserId]
        );

        
        $docketFile=RegularDelivery::
         leftjoin('users','users.id','=','Regular_Deliveries.Created_By')
        ->leftjoin('employees','employees.user_id','=','users.id')
        ->leftjoin('office_masters','employees.OfficeName','=','office_masters.id')
        ->leftjoin('delivery_proof_masters','Regular_Deliveries.Doc_Proof','=','delivery_proof_masters.id','office_masters.OfficeCode','office_masters.OfficeName')
        ->select('Regular_Deliveries.*','employees.EmployeeName','delivery_proof_masters.ProofCode','delivery_proof_masters.ProofName')
        ->where('Docket_ID',$request->docket_number)
        
       ->first();
         $string = "<tr><td>DELIVERED</td><td>".date("d-m-Y", strtotime($docketFile->Delivery_date))."</td><td><strong>DELIVERED TO: SELF</strong><br><strong>ON DATED: </strong>".date("d-m-Y H:i:s", strtotime($docketFile->Delivery_date))."<br>(PROOF NAME: ".$docketFile->ProofCode.'~'.$docketFile->ProofName.") <br>(PROOF DETAIL: ".$docketFile->Proof_Detail.")</td><td>".date('d-m-Y h:i A')."</td><td>".$docketFile->EmployeeName." <br>(".$docketFile->OfficeCode.'~'.$docketFile->OfficeName.")</td></tr>"; 
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

    public function DeliveryReport(Request $request){
        $office='';
        $date=[];
        if($request->fromDate!=''){
            $date['from']= date("Y-m-d" ,strtotime($request->fromDate));
        }

        if($request->todate!=''){
            $date['to']= date("Y-m-d" ,strtotime($request->todate));
        }

        if($request->office!=''){
            $office= $request->office;
        }
        $OfficeMaster=  OfficeMaster::get();
        \DB::enableQueryLog(); 
      $delivery=  RegularDelivery::with('RagularGPDetails','RagularDocketDetails','RagularOfficeDetails')
      ->where( function($query) use($date){
        if(isset($date['from']) && isset($date['to'])){
            $query->whereDate('Regular_Deliveries.Delivery_date','>=',$date['from']);
            $query->whereDate('Regular_Deliveries.Delivery_date','<=',$date['to']);
            
        }
       })
      ->where(function($query) use($office){
          if($office!=''){
            $query->where('Dest_Office_Id','=',$office);
          }
      })
      ->paginate(10);
      dd(\DB::getQueryLog());
     // echo '<pre>'; print_r( $delivery); die;
        return view('Operation.DeliveryReport', [
            'title'=>'Delivery Report',
            'delivery'=>$delivery,
            'OfficeMaster'=>$OfficeMaster
              
        ]);
    }
}
