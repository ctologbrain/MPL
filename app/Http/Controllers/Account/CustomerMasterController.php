<?php

namespace App\Http\Controllers\Account;

use App\Http\Requests\StoreCustomerMasterRequest;
use App\Http\Requests\UpdateCustomerMasterRequest;
use App\Models\Account\CustomerMaster;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account\CustomerAddress;
use App\Models\Account\CustomerPayment;
use Auth;
use App\Models\OfficeSetup\employee;
use App\Models\OfficeSetup\state;
use App\Models\OfficeSetup\city;
use App\Models\CompanySetup\PincodeMaster;
use App\Models\OfficeSetup\OfficeMaster;
use App\Models\Operation\BookingMode;
class CustomerMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      if(isset($request->search) && $request->search !='')
      {
        $search=$request->search;
      }
      else{
        $search='';
      }
     // \DB::enableQueryLog(); 
     $BKM = BookingMode::get();
     $office=OfficeMaster::select('id','OfficeCode','OfficeName')->where("Is_Active","Yes")->get();
     $State = state::get();
     $Employee = employee::where("Is_Active","Yes")->get();
      $parentCust=CustomerMaster::with('children','userData','userUpdateData','billingPersonDetails','CRMDetails','refereByDetails')->where('ParentCustomer','!=',NULL)->groupBy('ParentCustomer')->get();
      $CustomerMaster=CustomerMaster::with('PaymentDetails','CustAddress','children','ModeDetails' ,'OfficeDetails')
      ->Where(function ($query) use($search){ 
        if($search !='')
       {
           $query ->orWhere('customer_masters.CustomerCode', 'like', '%' . $search . '%');
           $query ->orWhere('customer_masters.CustomerName', 'like', '%' . $search . '%');
           $query ->orWhere('customer_masters.GSTName', 'like', '%' . $search . '%');
       }
    })
      ->paginate(10);
       return view('Account.CustomerList', [
            'title'=>'CUSTOMER MASTER',
            'CustomerMaster'=>$CustomerMaster,
            'parentCust'=>$parentCust,
            'Employee' => $Employee,
            'State'=>$State,
            'office'=>$office,
            'BKM'=>$BKM
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
     * @param  \App\Http\Requests\StoreCustomerMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerMasterRequest $request)
    {
      if(isset($request->IndiaAccess))
      {
         $IndiaAccess='Yes';
      }
      else{
        $IndiaAccess='No';
      }
      if(isset($request->VirtualNumber))
      {
         $VirtualNumber='Yes';
      }
      else{
        $VirtualNumber='No';
      }
      if(isset($request->LoadImage))
      {
         $LoadImage='Yes';
      }
      else{
        $LoadImage='No';
      }
      if(isset($request->AllowRoundOff))
      {
         $AllowRoundOff='Yes';
      }
      else{
        $AllowRoundOff='No';
      }
      if(isset($request->IncludeFlights))
      {
         $IncludeFlights='Yes';
      }
      else{
        $IncludeFlights='No';
      }
      if(isset($request->ApplyTAT))
      {
         $ApplyTAT='Yes';
      }
      else{
        $ApplyTAT='No';
      }
      if(isset($request->AutoMIS))
      {
         $AutoMIS='Yes';
      }
      else{
        $AutoMIS='No';
      }
      if(isset($request->IgnorePicku))
      {
         $IgnorePicku='Yes';
      }
      else{
        $IgnorePicku='No';
      }
      if(isset($request->IgnoreDelivery))
      {
         $IgnoreDelivery='Yes';
      }
      else{
        $IgnoreDelivery='No';
      }
      if(isset($request->SMSOnBilling))
      {
         $SMSOnBilling='Yes';
      }
      else{
        $SMSOnBilling='No';
      }
      if(isset($request->GSTApp))
      {
         $GSTApp='Yes';
      }
      else{
        $GSTApp='No';
      }
      if(isset($request->GSTInclusive))
      {
         $GSTInclusive='Yes';
      }
      else{
        $GSTInclusive='No';
      }
      if(isset($request->POD))
      {
         $POD='Yes';
      }
      else{
        $POD='No';
      }
      if(isset($request->Active))
      {
         $Active='Yes';
      }
      else{
        $Active='No';
      }
      $userId = Auth::id();
      $lasttId =CustomerMaster::orderBy("id","DESC")->first();
       $check= CustomerMaster::where("CustomerCode",$request->CustomerCode)->first();
      if(isset($request->Cid) && $request->Cid !='')
      {
           CustomerMaster::where("id", $request->Cid)->update(
            ['CompanyName' => $request->CompanyName,'Active'=>$Active,'ParentCustomer'=>$request->ParentCustomer,'CustomerCode'=>$request->CustomerCode,'CustomerName'=>$request->CustomerName,'GSTName' => $request->GSTName,'GSTNo'=>$request->GSTNo,'PANNo'=>$request->PANNo,'TinNo'=>$request->TinNo,'BillAt'=>$request->BillAt,'BillingCycle'=>$request->BillingCycle,'CutOffTime'=>$request->CutOffTime,'IndiaAccess'=>$IndiaAccess,'VirtualNumber'=>$VirtualNumber,'LoadImage'=>$LoadImage,'TDS'=>$request->TDS,'CRMExecutive' => $request->CRMExecutive,'BillingPerson'=>$request->BillingPerson,'ReferenceBy'=>$request->ReferenceBy,'CustomerCategory'=>$request->CustomerCategory,'CreditLimit' => $request->CreditLimit,'DepositAmount'=>$request->DepositAmount,'DepositBy'=>$request->DepositBy,'Discount'=>$request->Discount,'BillSubmission'=>$request->BillSubmission,'BillingCycle'=>$request->BillingCycle,'CustomerType'=>$request->CustomerType,'ServiceType'=>$request->ServiceType,'UpdatedBy'=>$userId,'BillingOnDate'=>$request->BillingOnDate,'ODAPinCode'=>$request->ODAPinCode ,'Mode' =>$request->Mode,
            'office_id' => $request->Office]
           );
           CustomerPayment::where("cust_id", $request->Cid)->update(
            ['PaymentMode' => $request->PaymentMode,'POD'=>$POD,'CreditPeriod'=>$request->CreditPeriod,'AllowRoundOff'=>$AllowRoundOff,'TariffType'=>$request->TariffType,'IncludeFlights' => $IncludeFlights,'ApplyTAT'=>$ApplyTAT,'AutoMIS'=>$AutoMIS,'IgnorePicku'=>$IgnorePicku,'IgnoreDelivery'=>$IgnoreDelivery,'InvoiceFormat'=>$request->InvoiceFormat,'SMSOnBilling'=>$SMSOnBilling,'RCM'=>$request->RCM,'RCMExempted'=>$request->RCMExempted,'GSTApp'=>$GSTApp ,'Air' => $request->Air,'Road'=>$request->Road,'Train'=>$request->Train,'Water'=>$request->Water,'GSTInclusive' => $GSTInclusive]
           );
           CustomerAddress::where("cust_id", $request->Cid)->update(
            ['Address1' => $request->Address1,'State'=>$request->State,'Address2'=>$request->Address2,'City'=>$request->City,'Pincode' => $request->Pincode]
           );
           echo "Customer Edit Successfully";
      }
      else{
        if($request->CustomerCode==''){
                 $checkId= $lasttId->id+1;
                 $Custcode='C000'.$checkId;
            }
            else{
                
                if(!empty($check)){
                    $checkId= $lasttId->id+1;
                    $Custcode='C000'.$checkId;
                }
                else{
                    $Custcode=$request->CustomerCode;
                }
               
            }
        $lastId=CustomerMaster::insertGetId(
            ['CompanyName' => $request->CompanyName,'Active'=>$Active,'TDS'=>$request->TDS,'ParentCustomer'=>$request->ParentCustomer,'CustomerCode'=>$Custcode,'CustomerName'=>$request->CustomerName,'GSTName' => $request->GSTName,'GSTNo'=>$request->GSTNo,'PANNo'=>$request->PANNo,'TinNo'=>$request->TinNo,'BillAt'=>$request->BillAt,'BillingCycle'=>$request->BillingCycle,'CutOffTime'=>$request->CutOffTime,'IndiaAccess'=>$IndiaAccess,'VirtualNumber'=>$VirtualNumber,'LoadImage'=>$LoadImage,'CRMExecutive' => $request->CRMExecutive,'BillingPerson'=>$request->BillingPerson,'ReferenceBy'=>$request->ReferenceBy,'CustomerCategory'=>$request->CustomerCategory,'CreditLimit' => $request->CreditLimit,'DepositAmount'=>$request->DepositAmount,'DepositBy'=>$request->DepositBy,'Discount'=>$request->Discount,'BillSubmission'=>$request->BillSubmission,'BillingCycle'=>$request->BillingCycle,'CustomerType'=>$request->CustomerType,'ServiceType'=>$request->ServiceType,'CreatedBy'=>$userId,'BillingOnDate'=>$request->BillingOnDate,'ODAPinCode'=>$request->ODAPinCode,'Mode' =>$request->Mode, 'office_id' => $request->Office]
          );
          CustomerPayment::insert(
            ['cust_id'=>$lastId,'POD'=>$POD,'PaymentMode' => $request->PaymentMode,'CreditPeriod'=>$request->CreditPeriod,'AllowRoundOff'=>$AllowRoundOff,'TariffType'=>$request->TariffType,'IncludeFlights' => $IncludeFlights,'ApplyTAT'=>$ApplyTAT,'AutoMIS'=>$AutoMIS,'IgnorePicku'=>$IgnorePicku,'IgnoreDelivery'=>$IgnoreDelivery,'InvoiceFormat'=>$request->InvoiceFormat,'SMSOnBilling'=>$SMSOnBilling,'RCM'=>$request->RCM,'RCMExempted'=>$request->RCMExempted,'GSTApp'=>$GSTApp ,'Air' => $request->Air,'Road'=>$request->Road,'Train'=>$request->Train,'Water'=>$request->Water,'GSTInclusive' => $GSTInclusive]
          );
          CustomerAddress::insert(
            ['cust_id'=>$lastId,'Address1' => $request->Address1,'State'=>$request->State,'Address2'=>$request->Address2,'City'=>$request->City,'Pincode' => $request->Pincode]
          );
          if(!isset($request->ParentCustomer) && $request->ParentCustomer =='')
          {
           CustomerMaster::where("id", $lastId)->update(
              ['ParentCustomer' => $lastId]
             ); 
          }
          echo "Customer Add Successfully";
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account\CustomerMaster  $customerMaster
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
      $CustomerMaster=CustomerMaster::where('id',$request->id)->with('PaymentDetails','CustAddress')->first();
      echo json_encode($CustomerMaster);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account\CustomerMaster  $customerMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerMaster $customerMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerMasterRequest  $request
     * @param  \App\Models\Account\CustomerMaster  $customerMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerMasterRequest $request, CustomerMaster $customerMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account\CustomerMaster  $customerMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerMaster $customerMaster)
    {
        //
    }

    public function GetCustomerDetailsForSearch(Request $req){
      $userId = Auth::id();
      $Offcie=employee::select('office_masters.id','office_masters.OfficeCode','office_masters.OfficeName','office_masters.City_id','office_masters.Pincode','employees.id as EmpId')
      ->leftjoin('office_masters','office_masters.id','=','employees.OfficeName')
      ->where('employees.user_id',$UserId)->first();
        $search='';
        $page = $req->page;
        $resCount =10;
        $strt =($page-1)*$resCount;
        $end =$strt +$resCount;
        $search=$req->term;
        if($req->term=="?"){
          $perticulerData=  CustomerMaster::leftjoin("officecustmappping","officecustmappping.CustomerId","customer_masters.id")->select('customer_masters.id','customer_masters.CustomerCode','customer_masters.CustomerName')
          ->select("id","CustomerCode","CustomerName")
          ->where('officecustmappping.OfficeId', $Offcie->id)->where("Active","Yes")->offset($strt)->limit($end)->get();
        }
        else{
            $perticulerData= CustomerMaster::leftjoin("officecustmappping","officecustmappping.CustomerId","customer_masters.id")->select('customer_masters.id','customer_masters.CustomerCode','customer_masters.CustomerName')
            ->select("id","CustomerCode","CustomerName")
            ->where('officecustmappping.OfficeId', $Offcie->id)->where(function($query) use ($search){
                if(isset($search) && $search!=''){
                    $query->where("CustomerCode","like", '%'.$search.'%');
                    $query->orWhere("CustomerName","like", '%'.$search.'%');
                }
            })->where("Active","Yes")->offset($strt)->limit($end)->get();
        }
      $tcount =count($perticulerData);
       $dataArr =[];
        foreach($perticulerData as $key){
            $customer = $key->CustomerCode.'~'.$key->CustomerName;
            $dataArr[] = array("id"=>$key->id,"col"=>$customer ,'total_count'=>$tcount);
        }
        echo json_encode($dataArr);
    }


  function  getAllCity(Request $request){
    $StateId =  $request->id;
   $data = city::where("stateId",$StateId )->get();
   $option = "<option value=''>--Select--</option>";
   foreach($data as $key){
    if(isset($request->selectId) &&  $request->selectId==$key->id){
      $option .= "<option selected value='".$key->id."'>".$key->Code. "~".$key->CityName."</option>";
    }
    else{
     $option .= "<option value='".$key->id."'>".$key->Code. "~".$key->CityName."</option>";
    }
   }
   echo $option;
  }

  function  getAllPincode(Request $request){
    $CityId =  $request->id;
    $data = PincodeMaster::where("city",$CityId )->get();
    $option = "<option value=''>--Select--</option>";
    foreach($data as $key){
      if(isset($request->PinSelectId) &&  $request->PinSelectId==$key->id){
        $option .= "<option selected value='".$key->id."'>".$key->PinCode. "</option>";
      }
      else{
        $option .= "<option value='".$key->id."'>".$key->PinCode. "</option>";
      }
    }
    echo $option;
  }

}
