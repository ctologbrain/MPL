<?php

namespace App\Http\Controllers\SalesReport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\StoreCustomerPerformanceAnalysisRequest;
use App\Http\Requests\UpdateCustomerPerformanceAnalysisRequest;
use App\Models\SalesReport\CustomerPerformanceAnalysis;
use App\Models\Account\CustomerMaster;
use App\Models\OfficeSetup\OfficeMaster;
use App\Models\Operation\DocketMaster;
use DB;
use App\Models\Account\CustomerInvoice;
use Helper;
use DateTime;
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
        $foromMonth='';
        $foromYear='';
        $ToMonth='';
        $ToYear='';
        if($req->get('formDate'))
        {
            $foromMonth=$req->get('formDate');  
        }
        else{
            $foromMonth=date('m');  
        }
        if($req->get('formYear'))
        {
             $foromYear=$req->get('formYear');  
           
        }
        else{
            $foromYear=date('Y');  
        }
       
        if($req->get('todate'))
        {
            $ToMonth=$req->get('todate');  
        }
        else{
            $ToMonth=date('m');  
        }
        if($req->get('toYear'))
        {
            $ToYear=$req->get('toYear');  
        }
        else{
            $ToYear=date('Y');  
        }
      $Customer=CustomerMaster::select('customer_masters.*')->where("customer_masters.Active","Yes")->get();
       $ParentCustomer = CustomerMaster::join('customer_masters as PCust','PCust.ParentCustomer','customer_masters.id')->select('PCust.CustomerCode as PCustomerCode','PCust.CustomerName as  PCN','PCust.id')->where("customer_masters.Active","Yes")->get(); 
       $CustomerAnalysis=DocketMaster::
       join('customer_masters','docket_masters.Cust_Id','customer_masters.id')
       ->where(function($query) use($CustomerData){
        if($CustomerData!=''){
           $query->where("docket_masters.Cust_Id",$CustomerData);
        }
       })
       ->where(function($query) use($ParentCustomerData){
        if($ParentCustomerData!=''){
           $query->where("customer_masters.ParentCustomer",$ParentCustomerData);
        }
       })
      ->groupBy('Cust_Id')
       ->paginate(10);
      
        $filterArray=array(
         'FromDate'=>$foromMonth,
         'FromYear'=>$foromYear,
         'ToMonth'=>$ToMonth,
         'ToYear'=>$ToYear,
        );

        if($req->submit=="Download"){
            return  $this->CustomerPerformanceAnalysisDownload($CustomerData,$ParentCustomerData ,$foromMonth , $foromYear, $ToMonth,$ToYear,$filterArray);
        }
       
        
       return view('SalesReport.CustomerPerformanceReport', [
        'title'=>'Customer Performance Report',
        'Customer'=>$Customer,
        'ParentCustomer'=>$ParentCustomer,
        'CustomerAnalysis'=>$CustomerAnalysis,
        'filterArray'=>$filterArray
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

    public function  CustomerPerformanceAnalysisDownload($CustomerData,$ParentCustomerData ,$foromMonth , $foromYear, $ToMonth,$ToYear,$filterArray)
    {
        $timestamp = date('Y-m-d');
        $filename = 'CustomerPerformanceAnalysisReport' . $timestamp . '.xls';
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$filename\"");

        $Customer=CustomerMaster::select('customer_masters.*')->where("customer_masters.Active","Yes")->get();
       $ParentCustomer = CustomerMaster::join('customer_masters as PCust','PCust.ParentCustomer','customer_masters.id')->select('PCust.CustomerCode as PCustomerCode','PCust.CustomerName as  PCN','PCust.id')->where("customer_masters.Active","Yes")->get(); 
       $CustomerAnalysis=DocketMaster::
       join('customer_masters','docket_masters.Cust_Id','customer_masters.id')
       ->where(function($query) use($CustomerData){
        if($CustomerData!=''){
           $query->where("docket_masters.Cust_Id",$CustomerData);
        }
       })
       ->where(function($query) use($ParentCustomerData){
        if($ParentCustomerData!=''){
           $query->where("customer_masters.ParentCustomer",$ParentCustomerData);
        }
       })
      ->groupBy('Cust_Id')
       ->get();

      echo '<table class="table table-bordered table-centered mb-1 mt-1">
       <thead>
       <tr class="main-title">
       <th style="min-width:100px;" class="p-1">SL#</th>
       <th style="min-width:220px;" class="p-1">Customer</th>';

       $s=$filterArray['FromDate'];
       $t=$filterArray['ToMonth'];
       for($s; $s <=$t; $s++){
        $dateObj   = DateTime::createFromFormat('!m', $s);
                  $monthName = $dateObj->format('F'); // March
       echo ' <th style="min-width:220px;" class="p-1">'.$monthName .'</th>';
       }
       echo '<th style="min-width:150px;" class="p-1">Sales Avg</th>
       <th style="min-width:160px;" class="p-1">Diffrance</th>
       </tr><tbody>';
       $i=0; 
       foreach($CustomerAnalysis as $DockBookData){
        $u=$filterArray['FromDate'];
        $v=$filterArray['ToMonth'];
        $i++;
        $itrator = $i-1;
        $totalAmount = 0;
        $monthWiseFixed = array();
        if(isset($DockBookData->CustomerCode)) {
            $custCode=   $DockBookData->CustomerCode;
        }
        else{
            $custCode='';
        }
        if(isset($DockBookData->CustomerName)){
            $CustName=  $DockBookData->CustomerName;
        }
        else{
            $CustName= '';
        }
    echo '<tr>
    <td class="p-1">'.$i.'</td>
    <td class="p-1">'.$custCode.' ~ '.$CustName.'</td>';    
        $i=0;
        $totalSum=0;
        for($u; $u <=$v; $u++){
            $i++;
            $CustRate=Helper::CustRateanaylis($DockBookData->Cust_Id,$u,$filterArray['ToYear']);
            echo ' <td  class="p-1">'.$CustRate.'</td>';
            $totalSum+=$CustRate;
        }

        echo '<td>'.($totalSum/$i).'</td>
        <td>'.($totalSum/$i).'</td> </tr> ';

       }

       echo '</tbody> </table>';

    }
}
