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
        $CustomerDetails = CustomerMaster::get();
        $CustomerOtherCharges =CustomerOtherCharges::get();
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
        //
        date_default_timezone_set('Asia/Kolkata');
        $UserId = Auth::id();
        if($request->cust_map_id){
            CustomerChargesMapWithCustomer::where('Id',$request->cust_map_id)->update(['Date_From'=> $request->wef,'Date_To'=>$request->wef_date,'Min_Amt'=>$request->minimum_amount,'Process'=>$request->process_by,'Updated_At'=>date('Y-m-d H:i:s'),'Updated_By'=>$UserId,'Origin'=>$request->origin_city,
            'Destination'=>$request->destination_city,'Range_Id'=>$request->Range_Id,'Charge_Type'=>$request->Charge_Type,'Charge_Amt'=>$request->Charge_Amt,'Range_From'=>$request->Range_From,'Range_To'=>$request->Range_To
]);
            echo 'Edit Successfully';
        }
        else{
            array('Customer_Id'=>$request->cust_id);
           CustomerChargesMapWithCustomer::insert(['Customer_Id'=>$request->cust_id,'Charge_Id'=>$request->chrg_id, 'Date_From'=> $request->wef,'Date_To'=>$request->wef_date,'Min_Amt'=>$request->minimum_amount,'Process'=>$request->process_by,'Created_By'=>$UserId,'Origin'=>$request->origin_city,'Destination'=>$request->destination_city,'Charge_Type'=>$request->Charge_Type,'Charge_Amt'=>$request->Charge_Amt,'Range_From'=>$request->Range_From,'Range_To'=>$request->Range_To]);
            echo 'Add Successfully';
        }
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
}
