<?php

namespace App\Http\Controllers\Reports;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDeliveryChargeRequest;
use App\Http\Requests\UpdateDeliveryChargeRequest;
use App\Models\Reports\DeliveryCharge;
use App\Models\OfficeSetup\OfficeMaster;
use App\Models\Account\CustomerMaster;
use App\Models\Account\CustomerDocketOtherCharges;
use App\Models\Account\CustomerOtherCharges;
use App\Models\Operation\DocketMaster;
use DB;
class DeliveryChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $date=[];
        $CustomerData='';
        $officeData =  $request->office;
        if(isset($request->Customer)){
            $CustomerData =  $request->Customer;
        }

        if($request->formDate){
            $date['formDate']=  date("Y-m-d",strtotime($request->formDate));
        }
        
        if($request->todate){
           $date['todate']=  date("Y-m-d",strtotime($request->todate));
        }
        $office = OfficeMaster::get();
        $Customer=CustomerMaster::select('customer_masters.*')->get();
        $docket = DocketMaster::join("docket_product_details","docket_product_details.Docket_Id","=","docket_masters.id")
         ->leftjoin("customer_masters","customer_masters.id","=","docket_masters.Cust_Id")
         ->leftjoin("Cust_Other_Charge","Cust_Other_Charge.Id","=","docket_product_details.cahrge_id")
         ->select("customer_masters.CustomerCode","customer_masters.CustomerName"
         ,"Cust_Other_Charge.Title", "docket_product_details.charge",
          "docket_masters.Booking_Date","docket_masters.Docket_No")
         ->where(function($query) use($officeData){
            if($officeData!=''){
                $query->where("docket_masters.Office_ID",$officeData);
            }
         })
         ->where(function($query) use($date){
            if(isset($date['formDate']) &&  isset($date['todate'])){
                $query->whereBetween(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),[$date['formDate'],$date['todate']]);
            }
        })
        ->where(function($query) use($CustomerData){
            if($CustomerData!=''){
               $query->where("docket_masters.Cust_Id",$CustomerData);
            }
        })->where("docket_product_details.cahrge_id","!=",null)
        ->paginate(10);
            return view('Operation.DeliveryChargeReport', [
            'title'=>'DELIVERY CHARGE REPORT',
            'docketData'=>$docket,
            'office'=>$office,
           'Customer' =>$Customer]);
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
     * @param  \App\Http\Requests\StoreDeliveryChargeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeliveryChargeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reports\DeliveryCharge  $deliveryCharge
     * @return \Illuminate\Http\Response
     */
    public function show(DeliveryCharge $deliveryCharge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reports\DeliveryCharge  $deliveryCharge
     * @return \Illuminate\Http\Response
     */
    public function edit(DeliveryCharge $deliveryCharge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDeliveryChargeRequest  $request
     * @param  \App\Models\Reports\DeliveryCharge  $deliveryCharge
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeliveryChargeRequest $request, DeliveryCharge $deliveryCharge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reports\DeliveryCharge  $deliveryCharge
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeliveryCharge $deliveryCharge)
    {
        //
    }
}
