<?php

namespace App\Http\Controllers\SalesReport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\StoreCustomerPerformanceAnalysisRequest;
use App\Http\Requests\UpdateCustomerPerformanceAnalysisRequest;
use App\Models\SalesReport\CustomerPerformanceAnalysis;
use App\Models\Account\CustomerMaster;
use App\Models\OfficeSetup\OfficeMaster;
use DB;
use App\Models\Account\CustomerInvoice;

class CustomerPerformanceAnalysisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        //
        $date =[];
        $CustomerData = '';
        $ParentCustomerData ='';
        if(isset($req->Customer)){
            $CustomerData =  $req->Customer;
        }

        if(isset($req->ParentCustomer)){
            $ParentCustomerData =  $req->ParentCustomer;
        }

        if($req->formDate){
            $date['formDate']= '2023-'.$req->formDate;
        }
        
        if($req->todate){
           $date['todate']=  '2023-'.$req->todate;
        }

       $Customer=CustomerMaster::select('customer_masters.*')->get();
       $ParentCustomer = CustomerMaster::join('customer_masters as PCust','PCust.ParentCustomer','customer_masters.id')->select('PCust.CustomerCode as PCustomerCode','PCust.CustomerName as  PCN','PCust.id')->get(); 

       $CustomerAnalysis = CustomerInvoice::join('customer_masters','InvoiceMaster.Cust_Id','customer_masters.id')
        ->select('customer_masters.CustomerCode','customer_masters.CustomerName','customer_masters.id as CID'
        )->where(function($query) use($CustomerData){
            if($CustomerData!=''){
               $query->where("InvoiceMaster.Cust_Id",$CustomerData);
            }
           })
        ->where(function($query) use($ParentCustomerData){
            if($ParentCustomerData!=''){
                $query->where("InvoiceMaster.Cust_Id",$ParentCustomerData);
            }
           })
        ->where(function($query) use($date){
            if(isset($date['formDate']) &&  isset($date['todate'])){
                $query->whereBetween(DB::raw("DATE_FORMAT(InvoiceMaster.InvDate, '%Y-%m')"),[$date['formDate'],$date['todate']]);
            }
        })
        ->groupBy("InvoiceMaster.Cust_Id")
        ->paginate(10);
        
       return view('SalesReport.CustomerPerformanceReport', [
        'title'=>'Customer Performance Report',
        'Customer'=>$Customer,
        'ParentCustomer'=>$ParentCustomer,
        'CustomerAnalysis'=>$CustomerAnalysis]);
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
     * @param  \App\Http\Requests\StoreCustomerPerformanceAnalysisRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerPerformanceAnalysisRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SalesReport\CustomerPerformanceAnalysis  $customerPerformanceAnalysis
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerPerformanceAnalysis $customerPerformanceAnalysis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SalesReport\CustomerPerformanceAnalysis  $customerPerformanceAnalysis
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerPerformanceAnalysis $customerPerformanceAnalysis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerPerformanceAnalysisRequest  $request
     * @param  \App\Models\SalesReport\CustomerPerformanceAnalysis  $customerPerformanceAnalysis
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerPerformanceAnalysisRequest $request, CustomerPerformanceAnalysis $customerPerformanceAnalysis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SalesReport\CustomerPerformanceAnalysis  $customerPerformanceAnalysis
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerPerformanceAnalysis $customerPerformanceAnalysis)
    {
        //
    }
}
