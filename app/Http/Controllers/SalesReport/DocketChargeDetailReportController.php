<?php

namespace App\Http\Controllers\SalesReport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDocketChargeDetailReportRequest;
use App\Http\Requests\UpdateDocketChargeDetailReportRequest;
use App\Models\Account\DocketChargeDetailReport;
use App\Models\Operation\DocketMaster;
use App\Models\Account\CustomerMaster;
use App\Models\CompanySetup\PincodeMaster;
use App\Models\OfficeSetup\OfficeMaster;
use App\Models\Operation\DocketBookingType;
class DocketChargeDetailReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $date =[];
        $SaleType= '';
        $CustomerData = '';
        $ParentCustomerData = '';
        $originCityData='';
        $DestCityData='';
        if($request->DocketNo){
            $DocketNo =  $request->DocketNo;
        }
        else{
             $DocketNo = '';
        }

        if($request->office){
            $office =  $request->office;
        }
        else{
             $office = '';
        }

        if($request->formDate){
            $date['formDate']=  date("Y-m-d",strtotime($request->formDate));
        }
        
        if($request->todate){
           $date['todate']=  date("Y-m-d",strtotime($request->todate));
        }

        if($request->SaleType){
            $SaleType =  $request->SaleType;
        }
        if(isset($request->Customer)){
            $CustomerData =  $request->Customer;
        }
        

        if(isset($request->ParentCustomer)){
            $ParentCustomerData =  $request->ParentCustomer;
        }

        if($request->originCity){
            $originCityData =  $request->originCity;
        }
        if($request->DestCity){
            $DestCityData =  $request->DestCity;
        }
        //
        $originCity= PincodeMaster::leftjoin('cities','pincode_masters.city','cities.id')->select('cities.*','pincode_masters.PinCode','pincode_masters.id as PID')->get();
        $DestCity= '';
        $customer=CustomerMaster::select('customer_masters.*')->get();
        $ParentCustomer = CustomerMaster::join('customer_masters as PCust','PCust.ParentCustomer','customer_masters.id')->select('PCust.CustomerCode as PCustomerCode','PCust.CustomerName as  PCN','PCust.id')->get(); 
        $Saletype=DocketBookingType::get();
       $Offcie=OfficeMaster::select('office_masters.*')->get();
      $docket = DocketMaster::with('BookignTypeDetails','DevileryTypeDet','customerDetails','consignor','consignoeeDetails','DocketProductDetails','PincodeDetails','DestPincodeDetails','DocketInvoiceDetails','DocketAllocationDetail','getpassDataDetails','DocketManyInvoiceDetails','DocketDetailUser')->where(function($query) use($DocketNo){
        if($DocketNo!=''){
            $query->where("docket_masters.Docket_No",$DocketNo);
        }
       })->where(function($query) use($office){
        if($office!=''){
            $query->where("docket_masters.Office_ID",$office);
        }
       })
       ->where(function($query) use($SaleType){
        if($SaleType!=''){
            $query->where("docket_masters.Booking_Type",$SaleType);
        }
       })
       ->where(function($query) use($CustomerData){
        if($CustomerData!=''){
           $query->where("docket_masters.Cust_Id",$CustomerData);
        }
       })
       ->where(function($query) use($ParentCustomerData){
        if($ParentCustomerData!=''){
            $query->where("docket_masters.Cust_Id",$ParentCustomerData);
        }
       })
       ->where(function($query) use($originCityData){
        if($originCityData!=''){
            $query->where("docket_masters.Origin_Pin",$originCityData);
        }
       })
       ->where(function($query) use($DestCityData){
        if($DestCityData!=''){
            $query->where("docket_masters.Dest_Pin",$DestCityData);
        }
       })
       ->where(function($query) use($date){
        if(isset($date['formDate']) &&  isset($date['todate'])){
            $query->whereBetween(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),[$date['formDate'],$date['todate']]);
        }
       })
       ->paginate(10);
        return view('SalesReport.DocketChargeReport', [
            'title'=>'Docket Charge  Details',
            'docketCharge'=>$docket,
            'customer'=>$customer,
            'OfficeMaster'=>$Offcie,
            'Saletype'=> $Saletype,
            'ParentCustomer'=>$ParentCustomer,
            'originCity'=>$originCity,
            'DestCity'=>$DestCity
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
     * @param  \App\Http\Requests\StoreDocketChargeDetailReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocketChargeDetailReportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account\DocketChargeDetailReport  $docketChargeDetailReport
     * @return \Illuminate\Http\Response
     */
    public function show(DocketChargeDetailReport $docketChargeDetailReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account\DocketChargeDetailReport  $docketChargeDetailReport
     * @return \Illuminate\Http\Response
     */
    public function edit(DocketChargeDetailReport $docketChargeDetailReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocketChargeDetailReportRequest  $request
     * @param  \App\Models\Account\DocketChargeDetailReport  $docketChargeDetailReport
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocketChargeDetailReportRequest $request, DocketChargeDetailReport $docketChargeDetailReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account\DocketChargeDetailReport  $docketChargeDetailReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocketChargeDetailReport $docketChargeDetailReport)
    {
        //
    }
}
