<?php

namespace App\Http\Controllers\Account;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\StoreCustomerDocketOtherChargesRequest;
use App\Http\Requests\UpdateCustomerDocketOtherChargesRequest;
use App\Models\Account\CustomerDocketOtherCharges;
use App\Models\Account\CustomerOtherCharges;
use App\Models\Operation\DocketProductDetails;
use App\Models\Operation\DocketMaster;
use Auth;

class CustomerDocketOtherChargesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $CustomerOtherCharges = CustomerOtherCharges::where("is_active",0)->get();
        return view('Account.customerSpecialOtherCharge', [
            'title'=>'CUSTOMER SPEICIAL OTHER CHARGES',
            'CustomerOtherCharges'=>$CustomerOtherCharges
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
     * @param  \App\Http\Requests\StoreCustomerDocketOtherChargesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerDocketOtherChargesRequest $request)
    {
        //
        DocketProductDetails::where("Docket_Id",$request->Docket_ID)->update([ "cahrge_id"=>$request->charge_name, "charge"=>$request->amount]);
       echo "Save Successfully";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account\CustomerDocketOtherCharges  $customerDocketOtherCharges
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req, CustomerDocketOtherCharges $customerDocketOtherCharges)
    {
        //
        $data = DocketMaster::with('customerDetails','DocketProductDetails')->where("Docket_No",$req->Docket)->first();
        if(!empty($data)){
            echo json_encode(array("status"=>1, "datas"=>$data));
        }
        else{
            echo json_encode(array("status"=>0, "datas"=>[]));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account\CustomerDocketOtherCharges  $customerDocketOtherCharges
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerDocketOtherCharges $customerDocketOtherCharges)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerDocketOtherChargesRequest  $request
     * @param  \App\Models\Account\CustomerDocketOtherCharges  $customerDocketOtherCharges
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerDocketOtherChargesRequest $request, CustomerDocketOtherCharges $customerDocketOtherCharges)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account\CustomerDocketOtherCharges  $customerDocketOtherCharges
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerDocketOtherCharges $customerDocketOtherCharges)
    {
        //
    }
    
}
