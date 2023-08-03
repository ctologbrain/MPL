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
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\NDRExport;
use Illuminate\Support\Facades\Storage;
use Auth;
use DB;



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
        $NDR_Master= NdrMaster::where("NDRReason","Yes")->get();
           $offcie=OfficeMaster::where("Is_Active","Yes")->get();
           $OffcieSalacted=employee::select('office_masters.id','office_masters.OfficeCode','office_masters.OfficeName','office_masters.City_id','office_masters.Pincode','employees.id as EmpId')
        ->leftjoin('office_masters','office_masters.id','=','employees.OfficeName')
        ->where('employees.user_id',$UserId)->where("office_masters.Is_Active","Yes")->first();
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
        date_default_timezone_set('Asia/Kolkata');
         $UserId=Auth::id();

         NoDelvery::insert(['Dest_Office'=>$request->desination_office,'Docket_No'=>$request->Docket_No,'NDR_Date'=>date("Y-m-d",strtotime($request->NDR_Date)),'NDR_Reason'=>$request->NDR_Reason,'Remark'=>$request->Remark,'Created_By'=>$UserId]);
         DocketAllocation::where("Docket_No", $request->Docket_No)->update(['Status' =>9,'BookDate'=>date("Y-m-d", strtotime($request->NDR_Date)), 'Updated_By'=>$UserId]);
         $docketFile=NoDelvery::
          leftjoin('docket_masters','docket_masters.Docket_No','=','NDR_Trans.Docket_No')
         ->leftjoin('docket_product_details','docket_product_details.Docket_Id','=','docket_masters.id')
         ->leftjoin('ndr_masters','ndr_masters.id','=','NDR_Trans.NDR_Reason')
         ->leftjoin('users','users.id','=','NDR_Trans.Created_By')
         ->leftjoin('employees','employees.user_id','=','users.id')
         ->leftjoin('office_masters','employees.OfficeName','=','office_masters.id')
         ->select('ndr_masters.ReasonDetail','docket_product_details.Qty','docket_product_details.Actual_Weight','employees.EmployeeName','NDR_Trans.NDR_Date','NDR_Trans.Remark','office_masters.OfficeCode','office_masters.OfficeName')
         ->where('NDR_Trans.Docket_No',$request->Docket_No)
         ->first();
         $string = "<tr><td>NDR</td><td>".date("d-m-Y",strtotime($docketFile->NDR_Date))."</td><td><strong>NDR DATE: </strong>".date("d-m-Y",strtotime($docketFile->NDR_Date))."<br><strong>REASON: </strong>$docketFile->ReasonDetail<br><strong> PIECES: </strong>$docketFile->Qty <strong>WEIGHT: </strong>$docketFile->Actual_Weight <br><strong>REMARKS: </strong>$docketFile->Remark</td><td>".date('d-m-Y H:i:s')."</td><td>".$docketFile->EmployeeName." <br>(".$docketFile->OfficeCode.'~'.$docketFile->OfficeName.")</td></tr>"; 
         Storage::disk('local')->append($request->Docket_No, $string);     
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
         if(!empty($status) && ($status->Status==5 || $status->Status==6 || $status->Status==7 || $status->Status==10 || $status->Status==9)){

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
        DocketAllocation::where("Docket_No",$request->docket_no)->update(['DeliveryDate'=>date("Y-m-d",strtotime($request->delivery_date)),'Deliveryremark'=>$request->remark,'DelUpdated_By'=>$UserId]);
                $successData ="true";
         
         echo  json_encode(array("success"=>$successData));
     }
     else{
         echo  json_encode(array("success"=>"false"));
     }
   }

   Public function NoDeliveryReport(Request $request){
        $date =[];
        if($request->dateFrom!=''){
            $date['from'] =$request->dateFrom;
        }

        if($request->dateto!=''){
            $date['to'] =$request->dateto;
        }


      $NdrReport=   NoDelvery::
      leftjoin('docket_masters','docket_masters.Docket_No','=','NDR_Trans.Docket_No')
      ->leftjoin('customer_masters','docket_masters.Cust_Id','=','customer_masters.id')
      ->leftjoin('office_masters as MainOff','MainOff.id','=','docket_masters.Office_ID')
      ->leftjoin('consignees','consignees.id','=','docket_masters.Consignee_Id')
      ->leftjoin('consignor_masters','consignor_masters.id','=','docket_masters.Consigner_Id')
      ->leftjoin('docket_allocations','docket_allocations.Docket_No','=','docket_masters.Docket_No')
      ->leftjoin('docket_statuses','docket_allocations.Status','=','docket_statuses.id')
      ->leftJoin('pincode_masters as ScourcePinCode', 'ScourcePinCode.id', '=', 'docket_masters.Origin_Pin')
      ->leftJoin('pincode_masters as DestPinCode', 'DestPinCode.id', '=', 'docket_masters.Dest_Pin')
      ->leftJoin('cities as ScourceCity', 'ScourceCity.id', '=', 'ScourcePinCode.city')
      ->leftJoin('cities as DestCity', 'DestCity.id', '=', 'DestPinCode.city')
      ->leftJoin('states as Deststat', 'Deststat.id', '=', 'DestPinCode.State')
      ->leftjoin('docket_product_details','docket_masters.id','docket_product_details.Docket_Id')
      ->leftjoin("docket_booking_types","docket_booking_types.id","docket_masters.Booking_Type")

      ->leftjoin("ndr_masters","ndr_masters.id","NDR_Trans.NDR_Reason")
      
      
      ->Select("docket_masters.Docket_No",DB::raw("DATE_FORMAT(docket_masters.Booking_Date,'%d-%m-%Y') as BookingDatte")
      ,'ScourceCity.CityName as SourceCity','ScourcePinCode.PinCode as SrcPin','DestCity.CityName as DestCity','DestPinCode.PinCode as DestPin',
      'Deststat.name as DestNameSt',
      "customer_masters.CustomerName","consignor_masters.ConsignorName",  "consignees.ConsigneeName",
      "docket_product_details.Qty","docket_product_details.Actual_Weight","docket_product_details.Charged_Weight",
      "docket_statuses.title","docket_allocations.BookDate","MainOff.OfficeName","customer_masters.CustomerCode","MainOff.OfficeCode",
      DB::raw("GROUP_CONCAT(NDR_Trans.Remark SEPARATOR ',') as attemptsRemark"),
      DB::raw("GROUP_CONCAT(NDR_Trans.NDR_Date SEPARATOR ',') as attemptsDate"),
      DB::raw("GROUP_CONCAT(ndr_masters.ReasonDetail SEPARATOR ',') as attemptsReason")
      )

        ->where(function($query) use($date){
            if(isset($date['from']) && isset($date['to'])){
                $query->whereBetween("NDR_Date",[$date['from'],$date['to']]);
            }
        })
        ->groupBy("NDR_Trans.Docket_No")
        ->paginate(10);
        if($request->submit=="Download"){
            return  Excel::download(new NDRExport($date), 'NDRExport.xlsx');
              
        }  
        return  view('Operation.ndrReportList'
                ,["title"=>"No DELIVERY REPORT",
                "NdrReport" => $NdrReport ]);
       

   }

}
