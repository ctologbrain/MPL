<?php

namespace App\Http\Controllers\Account;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

use App\Http\Requests\StoreCustomerOtherChargesRequest;
use App\Http\Requests\UpdateCustomerOtherChargesRequest;
use App\Models\Account\CustomerOtherCharges;
use App\Models\Account\ChargeRange;
class CustomerOtherChargesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $OtherCharges= CustomerOtherCharges::with('ChargeTypeDeatils')->paginate(10);
     //  echo '<pre>';print_r($OtherCharges[0]->ChargeTypeDeatils) ; die;
       
       $ChargesRange= ChargeRange::get();
         return view('Account.customerVendorOtherCharge', [
            'title'=>'CUSTOMER OTHER CHARGES',
            'OtherCharges'=>$OtherCharges,
            'ChargesRange'=>$ChargesRange]);

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
     * @param  \App\Http\Requests\StoreCustomerOtherChargesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerOtherChargesRequest $request)
    {
        //
        $userID= Auth::id();
        if($request->ID==''){
        CustomerOtherCharges::insert(['Action'=>$request->chrg_actions,'Title'=>$request->chrg_name,'Type'=>$request->chrg_type,'Amount'=>$request->charges,'Range_Type'=>$request->range_type,'Range_From'=>$request->range_from,'Range_To'=>$request->range_to,"Created_By"=>$userID]);
        echo "Add Successfully";
        }
        else{
            CustomerOtherCharges::where("Id",$request->ID)->update(['Action'=>$request->chrg_actions,'Title'=>$request->chrg_name,'Type'=>$request->chrg_type,'Amount'=>$request->charges,'Range_Type'=>$request->range_type,'Range_From'=>$request->range_from,'Range_To'=>$request->range_to]);
             echo "Edit Successfully";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\CustomerOtherCharges  $customerOtherCharges
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req,CustomerOtherCharges $customerOtherCharges)
    {
        //
       $data= CustomerOtherCharges::where("Id",$req->ID)->first();
       echo json_encode(array("datas"=>$data,"status"=>1));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\CustomerOtherCharges  $customerOtherCharges
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerOtherCharges $customerOtherCharges)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerOtherChargesRequest  $request
     * @param  \App\Models\Operation\CustomerOtherCharges  $customerOtherCharges
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerOtherChargesRequest $request, CustomerOtherCharges $customerOtherCharges)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\CustomerOtherCharges  $customerOtherCharges
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerOtherCharges $customerOtherCharges)
    {
        //
    }

     public function getCustomerActive(Request $req){
      if($req->btn=="Activate"){
            $btn=1;
        }
        else{
           $btn=0; 
        }
       CustomerOtherCharges::where("Id",$req->ID)->update(['is_active'=>$btn]);
       echo json_encode(['Status'=>1]);
    }
}
