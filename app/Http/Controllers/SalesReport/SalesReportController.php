<?php

namespace App\Http\Controllers\SalesReport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoresalesReportRequest;
use App\Http\Requests\UpdatesalesReportRequest;
use App\Models\SalesReport\salesReport;

use App\Models\Account\CustomerMaster;
use App\Models\OfficeSetup\OfficeMaster;
use App\Models\Operation\DocketMaster;
use App\Models\OfficeSetup\city;
use App\Models\Operation\DocketBookingType;
use DB;

class SalesReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $date =[];
        $CustomerData = '';
        $ParentCustomerData = '';
        $originCityData='';
        $DestCityData='';
        $SaleType = '';
       
        if($req->DocketNo){
            $DocketNo =  $req->DocketNo;
        }
        else{
             $DocketNo = '';
        }

        if($req->office){
            $office =  $req->office;
        }
        else{
             $office = '';
        }

        if($req->formDate){
            $date['formDate']=  date("Y-m-d",strtotime($req->formDate));
        }
        
        if($req->todate){
           $date['todate']=  date("Y-m-d",strtotime($req->todate));
        }
       
        if(isset($req->Customer)){
            $CustomerData =  $req->Customer;
        }
        

        if(isset($req->ParentCustomer)){
            $ParentCustomerData =  $req->ParentCustomer;
        }

        if($req->originCity){
            $originCityData =  $req->originCity;
        }
        if($req->DestCity){
            $DestCityData =  $req->DestCity;
        }

        if($req->saleType){
            $SaleType=  $req->saleType;
        }
        $DocketSale = DocketBookingType::get();
        $originCity= city::get();
        $DestCity= '';
       $Offcie=OfficeMaster::select('office_masters.*')->get();
       $Customer=CustomerMaster::select('customer_masters.*')->get();
       $ParentCustomer = CustomerMaster::join('customer_masters as PCust','PCust.ParentCustomer','customer_masters.id')->select('PCust.CustomerCode as PCustomerCode','PCust.CustomerName as  PCN','PCust.id')->get(); 
       $Docket=DocketMaster::with('offcieDetails','BookignTypeDetails','DevileryTypeDet','customerDetails','consignor','consignoeeDetails','DocketProductDetails','PincodeDetails','DestPincodeDetails','DocketInvoiceDetails','DocketAllocationDetail','NDRTransDetails','DrsTransDetails','offEntDetails','RTODataDetails','RegulerDeliveryDataDetails','getpassDataDetails','DocketManyInvoiceDetails','DocketImagesDet','DocketDetailUser')->where(function($query) use($DocketNo){
        if($DocketNo!=''){
            $query->where("docket_masters.Docket_No",$DocketNo);
        }
       })->where(function($query) use($office){
        if($office!=''){
            $query->where("docket_masters.Office_ID",$office);
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
            $query->whereRelation("PincodeDetails","city","=",$originCityData);
        }
       })
       ->where(function($query) use($DestCityData){
        if($DestCityData!=''){
            $query->whereRelation("DestPincodeDetails","city","=",$DestCityData);
        }
       })
       ->where(function($query) use($SaleType){
        if($SaleType!=''){
            $query->where("Booking_Type","=",$SaleType);
        }
       })
       ->where(function($query) use($date){
        if(isset($date['formDate']) &&  isset($date['todate'])){
            $query->whereBetween(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),[$date['formDate'],$date['todate']]);
        }
       })
       ->paginate(10);
        return view('SalesReport.salesReport', [
            'title'=>'Sales Report',
            'DocketBookingData'=>$Docket,
            'OfficeMaster'=>$Offcie,
            'Customer'=>$Customer,
            'ParentCustomer'=>$ParentCustomer,
            'originCity'=>$originCity,
            'DestCity'=>$DestCity,
            'DocketSale'=>$DocketSale
          
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
     * @param  \App\Http\Requests\StoresalesReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresalesReportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SalesReport\salesReport  $salesReport
     * @return \Illuminate\Http\Response
     */
    public function show(salesReport $salesReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SalesReport\salesReport  $salesReport
     * @return \Illuminate\Http\Response
     */
    public function edit(salesReport $salesReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesalesReportRequest  $request
     * @param  \App\Models\SalesReport\salesReport  $salesReport
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesalesReportRequest $request, salesReport $salesReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SalesReport\salesReport  $salesReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(salesReport $salesReport)
    {
        //
    }
}
