<?php

namespace App\Http\Controllers\Operation;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCreditBookingRequest;
use App\Http\Requests\UpdateCreditBookingRequest;
use App\Models\Operation\CreditBooking;
use Illuminate\Http\Request;
use Auth;
use App\Models\Account\ConsignorMaster;
use App\Models\Account\CustomerMaster;
use App\Models\CompanySetup\PincodeMaster;
use App\Models\OfficeSetup\employee;
use App\Models\Stock\DocketAllocation;
use App\Models\Operation\DocketProductDetails;
use App\Models\Operation\DocketInvoiceDetails;
use App\Models\Operation\DocketMaster;
use App\Models\Operation\DocketBookingType;
use App\Models\Operation\DevileryType;
use App\Models\Operation\PackingMethod;
use App\Models\Operation\DocketInvoiceType;
use App\Models\OfficeSetup\OfficeMaster;
class DocketMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $UserId=Auth::id();
        //$req
        $date =[];
        $OffcieData='';
        if($req->office!=''){
            $OffcieData .=$req->office;
        }

        if($req->formDate!='' && $req->todate!=''){
            $date= array("from"=> $req->formDate,"to" =>$req->todate);
        }
        $Offcie=OfficeMaster::select('office_masters.*')->get();
        $query= DocketMaster::
           select('docket_masters.*','docket_product_details.D_Product','docket_product_details.Packing_M','docket_product_details.Qty','docket_product_details.Is_Volume','docket_product_details.Actual_Weight','docket_product_details.Charged_Weight','docket_invoice_details.Type','docket_invoice_details.Invoice_No','docket_invoice_details.Invoice_Date','docket_invoice_details.Description','docket_invoice_details.Amount','docket_invoice_details.EWB_No','docket_invoice_details.EWB_Date','docket_invoice_details.Docket_Id','customer_masters.CustomerName','customer_masters.CustomerCode'
           ,'consignor_masters.ConsignorName','consignees.ConsignorName as consignee','devilery_types.Title','docket_booking_types.BookingType','office_masters.OfficeName','docket_invoice_types.Title as InvTitle','employees.EmployeeName','pincode_masters.PinCode','states.name','cities.CityName','cities.Code','DestPin.PinCode as DestNPin','DestState.name as DestSName','DestCity.CityName as DestCityName','DestCity.Code as DestCityCode')
        ->leftjoin('docket_product_details','docket_product_details.Docket_Id','=','docket_masters.id')
        ->leftjoin('docket_invoice_details','docket_invoice_details.Docket_Id','=','docket_masters.id')
        ->leftjoin('customer_masters','customer_masters.id','=','docket_masters.Cust_Id')
        ->leftjoin('consignor_masters','consignor_masters.id','=','docket_masters.Consigner_Id')
        ->leftjoin('consignees','consignees.id','=','docket_masters.Consignee_Id')
        ->leftjoin('devilery_types','devilery_types.id','=','docket_masters.Delivery_Type')
        ->leftjoin('docket_booking_types','docket_booking_types.id','=','docket_masters.Booking_Type')

         ->leftjoin('office_masters','office_masters.id','=','docket_masters.Office_ID')
         ->leftjoin('employees','employees.id','=','docket_masters.Booked_By')
         ->leftjoin('docket_invoice_types','docket_invoice_types.id','=','docket_invoice_details.Type')
         ->leftjoin('pincode_masters','pincode_masters.id','=','docket_masters.Origin_Pin')
         ->leftjoin('states','states.id','=','pincode_masters.State')
         ->leftjoin('cities','cities.id','=','pincode_masters.city')
         ->leftjoin('pincode_masters as DestPin','DestPin.id','=','docket_masters.Dest_Pin')
         ->leftjoin('states as DestState','DestState.id','=','DestPin.State')
         ->leftjoin('cities as DestCity','DestCity.id','=','DestPin.city')

         ->groupBy("docket_masters.Docket_No")
        

        // ->where('employees.user_id',$UserId)
         ->where(function($query) use($OffcieData){
            if($OffcieData!=''){
                $query->where("office_masters.id",$OffcieData);
            }

         })
         ->where(function($query) use($date){
             if(!empty($date)){
                 $query->whereBetween("docket_masters.Booked_At",[$date['from'], $date['to']]);
            }
           
         })
        ->paginate(10);

        return view('Operation.docketBookingReport', [
            'title'=>'DOCKET BOOKING REPORT',
            'DocketBookingData'=>$query,
            'OfficeMaster'=>$Offcie]);
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
     * @param  \App\Http\Requests\StoreDocketMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocketMasterRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\DocketMaster  $docketMaster
     * @return \Illuminate\Http\Response
     */
    public function show(DocketMaster $docketMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\DocketMaster  $docketMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(DocketMaster $docketMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocketMasterRequest  $request
     * @param  \App\Models\Operation\DocketMaster  $docketMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocketMasterRequest $request, DocketMaster $docketMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\DocketMaster  $docketMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocketMaster $docketMaster)
    {
        //
    }
}
