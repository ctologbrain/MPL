<?php

namespace App\Http\Controllers\Account;

use App\Http\Requests\StoreCustomerMasterRequest;
use App\Http\Requests\UpdateCustomerMasterRequest;
use App\Models\Account\CustomerMaster;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account\CustomerAddress;
use App\Models\Account\CustomerPayment;
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
      $parentCust=CustomerMaster::with('children')->where('ParentCustomer','!=',NULL)->groupBy('ParentCustomer')->get();
      $CustomerMaster=CustomerMaster::with('PaymentDetails','CustAddress','children')
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
            'parentCust'=>$parentCust
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
      if(isset($request->Cid) && $request->Cid !='')
      {
           CustomerMaster::where("id", $request->Cid)->update(
            ['CompanyName' => $request->CompanyName,'Active'=>$Active,'ParentCustomer'=>$request->ParentCustomer,'CustomerCode'=>$request->CustomerCode,'CustomerName'=>$request->CustomerName,'GSTName' => $request->GSTName,'GSTNo'=>$request->GSTNo,'PANNo'=>$request->PANNo,'TinNo'=>$request->TinNo,'BillAt'=>$request->BillAt,'BillingCycle'=>$request->BillingCycle,'CutOffTime'=>$request->CutOffTime,'IndiaAccess'=>$IndiaAccess,'VirtualNumber'=>$VirtualNumber,'LoadImage'=>$LoadImage,'TDS'=>$request->TDS,'CRMExecutive' => $request->CRMExecutive,'BillingPerson'=>$request->BillingPerson,'ReferenceBy'=>$request->ReferenceBy,'CustomerCategory'=>$request->CustomerCategory,'CreditLimit' => $request->CreditLimit,'DepositAmount'=>$request->DepositAmount,'DepositBy'=>$request->DepositBy,'Discount'=>$request->Discount,'BillSubmission'=>$request->BillSubmission,'BillingCycle'=>$request->BillingCycle,'CustomerType'=>$request->CustomerType,'ServiceType'=>$request->ServiceType]
           );
           CustomerPayment::where("cust_id", $request->Cid)->update(
            ['PaymentMode' => $request->PaymentMode,'POD'=>$POD,'CreditPeriod'=>$request->CreditPeriod,'AllowRoundOff'=>$AllowRoundOff,'TariffType'=>$request->TariffType,'IncludeFlights' => $IncludeFlights,'ApplyTAT'=>$ApplyTAT,'AutoMIS'=>$AutoMIS,'IgnorePicku'=>$IgnorePicku,'IgnoreDelivery'=>$IgnoreDelivery,'InvoiceFormat'=>$request->InvoiceFormat,'SMSOnBilling'=>$SMSOnBilling,'RCM'=>$request->RCM,'RCMExempted'=>$request->RCMExempted,'GSTApp'=>$GSTApp ,'Air' => $request->Air,'Road'=>$request->Road,'Train'=>$request->Train,'Water'=>$request->Water,'GSTInclusive' => $GSTInclusive]
           );
           CustomerAddress::where("cust_id", $request->Cid)->update(
            ['Address1' => $request->Address1,'State'=>$request->State,'Address2'=>$request->Address2,'City'=>$request->City,'Pincode' => $request->Pincode]
           );
      }
      else{
        $lastId=CustomerMaster::insertGetId(
            ['CompanyName' => $request->CompanyName,'Active'=>$Active,'TDS'=>$request->TDS,'ParentCustomer'=>$request->ParentCustomer,'CustomerCode'=>$request->CustomerCode,'CustomerName'=>$request->CustomerName,'GSTName' => $request->GSTName,'GSTNo'=>$request->GSTNo,'PANNo'=>$request->PANNo,'TinNo'=>$request->TinNo,'BillAt'=>$request->BillAt,'BillingCycle'=>$request->BillingCycle,'CutOffTime'=>$request->CutOffTime,'IndiaAccess'=>$IndiaAccess,'VirtualNumber'=>$VirtualNumber,'LoadImage'=>$LoadImage,'CRMExecutive' => $request->CRMExecutive,'BillingPerson'=>$request->BillingPerson,'ReferenceBy'=>$request->ReferenceBy,'CustomerCategory'=>$request->CustomerCategory,'CreditLimit' => $request->CreditLimit,'DepositAmount'=>$request->DepositAmount,'DepositBy'=>$request->DepositBy,'Discount'=>$request->Discount,'BillSubmission'=>$request->BillSubmission,'BillingCycle'=>$request->BillingCycle,'CustomerType'=>$request->CustomerType,'ServiceType'=>$request->ServiceType]
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
        $search='';
        $page = $req->page;
        $resCount =10;
        $strt =($page-1)*$resCount;
        $end =$strt +$resCount;
        $search=$req->term;
        if($req->term=="?"){
          $perticulerData=  CustomerMaster::select("id","CustomerCode","CustomerName")->offset($strt)->limit($end)->get();
        }
        else{
            $perticulerData= CustomerMaster::select("id","CustomerCode","CustomerName")->where(function($query) use ($search){
                if(isset($search) && $search!=''){
                    $query->where("CustomerCode","like", '%'.$search.'%');
                    $query->orWhere("CustomerCode","like", '%'.$search.'%');
                }
            })->offset($strt)->limit($end)->get();
        }
      $tcount =count($perticulerData);
       $dataArr =[];
        foreach($perticulerData as $key){
            $customer = $key->CustomerCode.'~'.$key->CustomerName;
            $dataArr[] = array("id"=>$key->id,"col"=>$customer ,'total_count'=>$tcount);
        }
        echo json_encode($dataArr);
    }
}
