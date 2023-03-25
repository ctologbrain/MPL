<?php

namespace App\Http\Controllers\Operation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\StoreRTORequest;
use App\Http\Requests\UpdateRTORequest;
use App\Models\Operation\RTO;
use App\Models\OfficeSetup\OfficeMaster;
use App\Models\Operation\DocketAllocation;
use App\Models\Operation\DocketMaster;
use App\Models\Operation\RTO_Reason;
class RTOController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rtoRes=RTO_Reason::get();
        $office=OfficeMaster::select('id','OfficeCode','OfficeName')->get();
        return view('Operation.RTO', [
            'title'=>'RTO',
            'office'=>$office,
            'rtoRes'=>$rtoRes
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
     * @param  \App\Http\Requests\StoreRTORequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRTORequest $request)
    {
        $UserId=Auth::id();
        $file=$request->file;
        if($file !='')
        {
            $destinationPath = public_path('RTO'); 
            $new_file_name = date('ymdHis').$file->getClientOriginalName();
            $file->move($destinationPath,$new_file_name);
            $moved = 'public/RTO/'.$new_file_name;
        }
        else{
            $moved='';  
        }
       
        $lastId=RTO::insertGetId(
            ['OffciceId'=>$request->destination_office,'Initial_Docket' =>$request->docket_no,'Pieces'=>$request->pieces,'Weight'=>$request->weight,'RTO_Date'=>$request->rto_date,'Reason'=>$request->rto_reason,'Remark'=>$request->remark,'Attachment'=>$moved,'Created_By'=>$UserId]
        );

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\RTO  $rTO
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
       $docket=DocketAllocation::where('Branch_ID',$request->destination_office)->where('Docket_No',$request->Docket)->first();
      if(empty($docket))
      {
        $datas=array('status'=>'false','message'=>'Docket Not found');
      }
      elseif($docket->Status==1)
      {
       $datas=array('status'=>'false','message'=>'Docket is cancled');
      }
      elseif($docket->Status==0)
      {
       $datas=array('status'=>'false','message'=>'Docket is not used');
      }
      elseif($docket->Status==0)
      {
       $datas=array('status'=>'false','message'=>'Docket is Only picku and scan');
      }
      elseif($request->destination_office !=$docket->Branch_ID)
      {
       $datas=array('status'=>'false','message'=>'Docket Assgin Another Branch');
      }
      else{
        $docketdetails=DocketMaster::
         leftjoin('docket_product_details','docket_product_details.Docket_Id','=','docket_masters.id')
        ->leftjoin('customer_masters','customer_masters.id','=','docket_masters.Cust_Id')
        ->leftjoin('NDR_Trans','NDR_Trans.Docket_No','=','docket_masters.Docket_No')
        ->leftjoin('ndr_masters','ndr_masters.id','=','NDR_Trans.NDR_Reason')
        ->leftjoin('docket_booking_types','docket_booking_types.id','=','docket_masters.Booking_Type')
        ->select('customer_masters.CustomerName','docket_masters.Booking_Date','docket_product_details.Qty','docket_product_details.Actual_Weight','docket_booking_types.BookingType','docket_booking_types.BookingType','NDR_Trans.NDR_Date','NDR_Trans.Remark','ndr_masters.ReasonDetail')
        ->where('docket_masters.Docket_No',$request->Docket)
         ->first();
         $datas=array('status'=>'true','message'=>'success','records'=>$docketdetails);
      }
      echo  json_encode($datas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\RTO  $rTO
     * @return \Illuminate\Http\Response
     */
    public function edit(RTO $rTO)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRTORequest  $request
     * @param  \App\Models\Operation\RTO  $rTO
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRTORequest $request, RTO $rTO)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\RTO  $rTO
     * @return \Illuminate\Http\Response
     */
    public function destroy(RTO $rTO)
    {
        //
    }
}
