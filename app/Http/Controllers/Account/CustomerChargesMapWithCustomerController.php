<?php

namespace App\Http\Controllers\Account;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\StoreCustomerChargesMapWithCustomerRequest;
use App\Http\Requests\UpdateCustomerChargesMapWithCustomerRequest;
use App\Models\Account\CustomerChargesMapWithCustomer;
use App\Models\Account\CustomerOtherCharges;
use App\Models\Account\ChargeRange;
use App\Models\Account\CustomerMaster;
use App\Models\Account\DocketOriginDest;
use App\Models\Account\CustOtherChargeMultiSource;
use App\Models\OfficeSetup\city;
use Auth;

class CustomerChargesMapWithCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $CustOtherChargeWithCust=  CustomerChargesMapWithCustomer::with('ChargeDataDetails','CustomerDataDetails','OriginDataDetails','DestDataDetails','ChargeTypeDeatils')->paginate(10);
        $city = city::get();
      // echo '<pre>'; print_r( $CustOtherChargeWithCust[0]->CustomerDataDetails); die;
        $ChargesRange= ChargeRange::get();
        $CustomerDetails = CustomerMaster::where("Active","Yes")->get();
        $CustomerOtherCharges =CustomerOtherCharges::where("is_active",0)->get();
         return view('Account.customerMappingWithOtherCharges', [
            'title'=>'CUSTOMER MAPPING WITH OTHER CHARGES',
            'CustOtherChargeWithCust'=>$CustOtherChargeWithCust,
            'ChargesRange'=>$ChargesRange,
            'CustomerDetails'=>$CustomerDetails,
            'CustomerOtherCharges'=>$CustomerOtherCharges,
            'city'=>$city]);
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
     * @param  \App\Http\Requests\StoreCustomerChargesMapWithCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerChargesMapWithCustomerRequest $request)
    {
        date_default_timezone_set('Asia/Kolkata');
        $formDate=date("Y-m-d",strtotime($request->wef));
        $todate=date("Y-m-d",strtotime($request->wef_date));
        $checkDate=CustomerChargesMapWithCustomer::where(function($query) use($formDate,$todate) {
            $query->whereBetween('Date_From',[$formDate,$todate])
                 ->orwhereBetween('Date_To',[$formDate,$todate]);
            })
            ->where('Charge_Id',$request->chrg_id)
            ->first();
        $UserId = Auth::id();
       
        
        if($request->cust_map_id){
            CustomerChargesMapWithCustomer::where('Id',$request->cust_map_id)->update(['Date_From'=> date("Y-m-d",strtotime($request->wef)),'Date_To'=>date("Y-m-d",strtotime($request->wef_date)),'Min_Amt'=>$request->minimum_amount,'Updated_At'=>date('Y-m-d H:i:s'),'Updated_By'=>$UserId,'Origin'=>$request->origin_city,
            'Destination'=>$request->destination_city,'Range_Id'=>$request->Range_Id,'Charge_Type'=>$request->Charge_Type,'Charge_Amt'=>$request->Charge_Amt,'Range_From'=>$request->Range_From,'Range_To'=>$request->Range_To
          ]);
          if($request->AfterupdatePBy==3)
          {
            CustOtherChargeMultiSource::where('Charge_Id',$request->cust_map_id)->delete();
            foreach($request->multiSource as $secure)
            {
                foreach($request->multiDest as $dest)
                {
                    CustOtherChargeMultiSource::insert(['Charge_Id'=>$request->cust_map_id,'Source'=>$secure,'Dest'=>$dest]);
                }
            }
          }
          $datas=array('status'=>'true','message'=>'Charge Edit Sucessfully');
        }
        else
        {
          if(empty($checkDate))
          {
            array('Customer_Id'=>$request->cust_id);
           $charegId=CustomerChargesMapWithCustomer::insertGetId(['Customer_Id'=>$request->cust_id,'Range_Id'=>$request->Range_Id,'Charge_Id'=>$request->chrg_id, 'Date_From'=> date("Y-m-d",strtotime($request->wef)),'Date_To'=>date("Y-m-d",strtotime($request->wef_date)),'Min_Amt'=>$request->minimum_amount,'Process'=>$request->process_by,'Created_By'=>$UserId,'Origin'=>$request->origin_city,'Destination'=>$request->destination_city,'Charge_Type'=>$request->Charge_Type,'Charge_Amt'=>$request->Charge_Amt,'Range_From'=>$request->Range_From,'Range_To'=>$request->Range_To]);
            
            if($request->process_by==3)
            {
                foreach($request->multiSource as $secure)
                {
                    foreach($request->multiDest as $dest)
                    {
                        CustOtherChargeMultiSource::insert(['Charge_Id'=>$charegId,'Source'=>$secure,'Dest'=>$dest]);
                    }
                }
            }
            $datas=array('status'=>'true','message'=>'Charge Added Sucessfully');
          }
        else
        {
            $datas=array('status'=>'false','message'=>'You Can not add This Charge');
        }
        }
      echo json_encode($datas);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account\CustomerChargesMapWithCustomer  $customerChargesMapWithCustomer
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req,CustomerChargesMapWithCustomer $customerChargesMapWithCustomer)
    {
        //
         $data= CustomerOtherCharges::where("Id", $req->Name)->first();
         if(!empty($data)){
            echo json_encode(array("datas"=>$data,"status"=>1));
         }
         else{
            echo json_encode(array("datas"=>[],"status"=>0));
         }
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account\CustomerChargesMapWithCustomer  $customerChargesMapWithCustomer
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerChargesMapWithCustomer $customerChargesMapWithCustomer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerChargesMapWithCustomerRequest  $request
     * @param  \App\Models\Account\CustomerChargesMapWithCustomer  $customerChargesMapWithCustomer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerChargesMapWithCustomerRequest $request, CustomerChargesMapWithCustomer $customerChargesMapWithCustomer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account\CustomerChargesMapWithCustomer  $customerChargesMapWithCustomer
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerChargesMapWithCustomer $customerChargesMapWithCustomer)
    {
        //
    }

    public function getCustomerDetailsData(Request $req){
      $data = CustomerMaster::where("id",$req->Name)->orWhere("CustomerCode",$req->Name)->first();

        if(!empty($data)){
            echo json_encode(array("datas"=>$data,"status"=>1));
         }
         else{
            echo json_encode(array("datas"=>[],"status"=>0));
         }
    }

    public  function getCustomerMapWithCustomerData(Request $req){
    $data=  CustomerChargesMapWithCustomer::with('ChargeDataDetails')->where('Id',$req->Id)->first();
         echo json_encode(array("datas"=>$data,"status"=>1));
    }
    public function GetChargeAccCust(Request $request)
    {
        $CustOtherChargeWithCust= CustomerChargesMapWithCustomer::with('ChargeDataDetails','CustomerDataDetails','OriginDataDetails','DestDataDetails','ChargeTypeDeatils','UserUpdateDetail')->where('Customer_Id',$request->CustId)->where('Charge_Id',$request->Name)->get();
        $html='';
        $html='';
        $html.='<div class="table-responsive a"><table class="table-responsive table-bordered" width="100%"><thead><tr class="main-title text-dark"><th style="min-width:90px;">SL#</th><th style="min-width:100px;">ACTION</th><th style="min-width:130px;">Customer Name</th><th style="min-width:130px;">Load Type</th><th style="min-width:130px;">Origin City</th><th style="min-width:130px;">Destination City</th><th style="min-width:130px;">Charge Name</th><th style="min-width:130px;">W.E. From</th><th style="min-width:130px;">W.E. To</th><th style="min-width:130px;">Charge Type</th><th style="min-width:130px;">Minimum Amount</th><th style="min-width:130px;">Range Type</th><th style="min-width:130px;">Range From</th><th style="min-width:130px;">Range To</th><th style="min-width:130px;">FS On Freight</th><th style="min-width:130px;">FS On Charges</th><th style="min-width:130px;">Active</th><th style="min-width:130px;">Updated By</th><th style="min-width:130px;">Updated On
        </th><tr></thead><tbody>';
        $i=0;
        foreach($CustOtherChargeWithCust as $custOtherCharge)
        {
           
            if(isset($custOtherCharge->OriginDataDetails->CityName))
            {
               $origin=$custOtherCharge->OriginDataDetails->CityName; 
            }
            else{
                $origin=''; 
            }
            if(isset($custOtherCharge->DestDataDetails->CityName))
            {
               $dest=$custOtherCharge->DestDataDetails->CityName; 
            }
            else{
                $dest=''; 
            }
            if($custOtherCharge->Charge_Type==1)
            {
               $chargeTpe='%'; 
            }
            else{
                $chargeTpe='AMOUNT';   
            }
            if(isset($custOtherCharge->UserUpdateDetail->name)){
                $updatedUser=  $custOtherCharge->UserUpdateDetail->name;
            }
            else{
                $updatedUser= '';
            }
            if(isset($custOtherCharge->Updated_At)){
                $updatedDate=    date('d-m-Y H:i:s',strtotime($custOtherCharge->Updated_At));
            }
            else{
                $updatedDate= '';
            }
            $i++;
            $html.='<tr><td>'.$i.'</td><td><a href="javascript:void(0)" onclick="ViewCharges('.$custOtherCharge->Id.')">View</a> / <a href="javascript:void(0)" onclick="EditCharges('.$custOtherCharge->Id.')">Edit</a></td><td>'.$custOtherCharge->CustomerDataDetails->CustomerCode.'~'.$custOtherCharge->CustomerDataDetails->CustomerName.'</td><td>CONSOLE</td><td>'.$origin.'</td><td>'.$dest.'</td><td>'.$custOtherCharge->ChargeDataDetails->Title.'</td><td>'.date('d-m-Y',strtotime($custOtherCharge->Date_From)).'</td><td>'.date('d-m-Y',strtotime($custOtherCharge->Date_To)).'</td><td>'.$chargeTpe.'</td><td>'.$custOtherCharge->Min_Amt.'</td><td>'.$custOtherCharge->ChargeTypeDeatils->Title.'</td><td>'.$custOtherCharge->Range_From.'</td><td>'.$custOtherCharge->Range_To.'</td><td>'.$custOtherCharge->FS_Freight.'</td><td>'.$custOtherCharge->FS_Charge.'</td><td>YES</td><td>'.$updatedUser.'</td><td>'.$updatedDate.'</td></tr>'; 
        }
         $html.='<tbody></table></div>';
         echo $html;
    }
    public function getSourceAndDestForCust(Request $request)
    {
        if($request->LocationValue==2)
        {
          $city=city::get();
          $sourceHtml='';
          $sourceHtml.='<select class="from-control selectbox sourceOrigin" name="sourceOrigin">';
          $sourceHtml.='<option value="">select</option>';
          foreach($city as $sourceCity)
          {
            $sourceHtml.='<option value="'.$sourceCity->id.'">'.$sourceCity->Code.'~'.$sourceCity->CityName.'</option>';
          }
          $sourceHtml.='</select>';
          $destHtml='';
          $destHtml.='<select class="from-control selectbox DestOrigin" name="sourceOrigin">';
          $destHtml.='<option value="">select</option>';
          foreach($city as $destCity)
          {
            $destHtml.='<option value="'.$destCity->id.'">'.$destCity->Code.'~'.$destCity->CityName.'</option>';
          }
          $destHtml.='</select>';
        }
        if($request->LocationValue==3)
        {
         $docketSourceCity=DocketOriginDest::
         leftjoin('cities','cities.id','=','Docket_Origin_Destinations.Origin')
         ->select('cities.id','cities.CityName')
         ->where('Cust_Id',$request->customer_name)
         ->groupBy('Docket_Origin_Destinations.Origin')
         ->get();
         $docketDestCity=DocketOriginDest::
         leftjoin('cities','cities.id','=','Docket_Origin_Destinations.Destination')
         ->select('cities.id','cities.CityName')
         ->where('Cust_Id',$request->customer_name)
         ->groupBy('Docket_Origin_Destinations.Destination')
         ->get();
         $sourceHtml='';
         $sourceHtml.='<div class="mb-1"><input type="checkbox" class="mr-2 checkAllSource" id="checkAllSource"> SELECT ALL</div><div class="d-flex justify-content-between flex-wrap">';
         foreach($docketSourceCity as $dScource)
         {
            $sourceHtml.='<div class="d-flex align-items-center mb-1" style="width:30%;">';
            $sourceHtml.='<input type="checkbox" class="checkboxValueSource mr-2" value="'.$dScource->id.'"> '.$dScource->CityName;   
            $sourceHtml.='</div>';
         }
         $sourceHtml.='</div>';
         $destHtml='';
         $destHtml.='<div class="mb-1"><input type="checkbox" class="mr-2 checkAllDest" id="checkAllDest"> SELECT ALL</div><div  class="d-flex justify-content-between flex-wrap">';
         foreach($docketDestCity as $dDest)
         {
            $destHtml.='<div class="d-flex align-items-center mb-1" style="width:30%;">';
            $destHtml.='<input type="checkbox" class="checkboxValueDest mr-2" value="'.$dDest->id.'"> '.$dDest->CityName;   
            $destHtml.='</div>';
         }
         $destHtml.='</div>';
       
        }
        $datas=array('status'=>'true','Source'=>$sourceHtml,'dest'=>$destHtml);
        echo json_encode($datas);
    }
    public function ViewOtherChargesDetails(Request $request)
    {
        $CustOtherChargeWithCust= CustomerChargesMapWithCustomer::where('Id',$request->Id)->first();
        $sourceHtmlCust='';
        $destHtmlCust='';
        if($CustOtherChargeWithCust->Process==2)
        {
          $city=city::get();
          
          $sourceHtmlCust.='<select class="from-control selectbox sourceOrigin" name="sourceOrigin">';
         
           foreach($city as $sourceCity)
          {
             
              if($sourceCity->id==$CustOtherChargeWithCust->Origin)
              {
                $sourceHtmlCust.='<option value="'.$sourceCity->id.'" selected>'.$sourceCity->Code.'~'.$sourceCity->CityName.'</option>';
              }
              else{
               
                $sourceHtmlCust.='<option value="'.$sourceCity->id.'">'.$sourceCity->Code.'~'.$sourceCity->CityName.'</option>';
              }
            
          }
          $sourceHtmlCust.='</select>';
          $destHtmlCust='';
          $destHtmlCust.='<select class="from-control selectbox DestOrigin" name="sourceOrigin">';
       
          foreach($city as $destCity)
          {
           if($destCity->id==$CustOtherChargeWithCust->Destination)
           {
            $destHtmlCust.='<option value="'.$destCity->id.'" selected>'.$destCity->Code.'~'.$destCity->CityName.'</option>';
           }
           else{
            $destHtmlCust.='<option value="'.$destCity->id.'">'.$destCity->Code.'~'.$destCity->CityName.'</option>';
           }
            
          }
          $destHtmlCust.='</select>';
        }
       
        if($CustOtherChargeWithCust->Process==3)
        {
         
         $docketSourceCity=DocketOriginDest::
         leftjoin('cities','cities.id','=','Docket_Origin_Destinations.Origin')
         ->select('cities.id','cities.CityName')
         ->where('Cust_Id',$CustOtherChargeWithCust->Customer_Id)
         ->groupBy('Docket_Origin_Destinations.Origin')
         ->get();
         $docketDestCity=DocketOriginDest::
         leftjoin('cities','cities.id','=','Docket_Origin_Destinations.Destination')
         ->select('cities.id','cities.CityName')
         ->where('Cust_Id',$CustOtherChargeWithCust->Customer_Id)
         ->groupBy('Docket_Origin_Destinations.Destination')
         ->get();
         $sourceId=CustOtherChargeMultiSource::select('Source')->where('Charge_Id',$request->Id)->groupBy('Source')->get();
        $source=array();
        foreach($sourceId as $custSource)
        {
            array_push($source,$custSource->Source);
        }
        $DestId=CustOtherChargeMultiSource::select('Dest')->where('Charge_Id',$request->Id)->groupBy('Dest')->get();
        $dest=array();
        foreach($DestId as $custDest)
        {
            array_push($dest,$custDest->Dest);
        }
          $sourceHtmlCust='';
          $sourceHtmlCust.='<div class="mb-1"><input type="checkbox" class="mr-2"> SELECT ALL</div><div class="d-flex justify-content-between flex-wrap">';
          foreach($docketSourceCity as $dScource)
         {
             if(in_array($dScource->id, $source))
             {
                $sourceHtmlCust.='<div class="d-flex align-items-center mb-1" style="width:30%;">';
                $sourceHtmlCust.='<input type="checkbox" class="checkboxValueSource mr-2" value="'.$dScource->id.'" checked> '.$dScource->CityName;   
                $sourceHtmlCust.='</div>';
               
             }
             else{
                $sourceHtmlCust.='<div class="d-flex align-items-center mb-1" style="width:30%;">';
                $sourceHtmlCust.='<input type="checkbox" class="checkboxValueSource mr-2" value="'.$dScource->id.'"> '.$dScource->CityName;   
                $sourceHtmlCust.='</div>';
             }
            
         }
            $sourceHtmlCust.='</div>';
            $destHtmlCust.='<div class="mb-1"><input type="checkbox" class="mr-2"> SELECT ALL</div><div  class="d-flex justify-content-between flex-wrap">';
           foreach($docketDestCity as $dDest)
         {
            if(in_array($dDest->id, $dest))
            {
                $destHtmlCust.='<div class="d-flex align-items-center mb-1" style="width:30%;">';
                $destHtmlCust.='<input type="checkbox" class="checkboxValueDest mr-2" value="'.$dDest->id.'" checked> '.$dDest->CityName;   
                $destHtmlCust.='</div>';
               
            }
            else{
                $destHtmlCust.='<div class="d-flex align-items-center mb-1" style="width:30%;">';
                $destHtmlCust.='<input type="checkbox" class="checkboxValueDest mr-2" value="'.$dDest->id.'"> '.$dDest->CityName;   
                $destHtmlCust.='</div>';
            }
           
         }
          $destHtmlCust.='</div>';
       
        }
       
        $datas=array('status'=>'true','datas'=>$CustOtherChargeWithCust,'SourceDate'=>$sourceHtmlCust,'destDate'=>$destHtmlCust);
        echo json_encode($datas);
    }

   public function OtherChargeMapReport(Request $request){
    $date= [];
    if($request->formDate){
        $date['from'] = date("Y-m-d",strtotime($request->formDate));
    }

    if($request->todate){
        $date['to'] = date("Y-m-d",strtotime($request->todate));
    }

   $data= CustomerChargesMapWithCustomer::with('CustomerDataDetails','DestDataDetails','OriginDataDetails','ChargeTypeDeatils','ChargeDataDetails')->where(function($query) use($date){
    if(isset($date['from']) && isset($date['to'])){
        $query->where("Date_From",[$date['from'],$date['to']]);
    }
   })->paginate(10);

   return view('Account.OtherChargesMappingReport', [
            'title'=>'CUSTOMER MAPPING WITH OTHER CHARGES Report',
            'report'=>$data]);
   }
}
