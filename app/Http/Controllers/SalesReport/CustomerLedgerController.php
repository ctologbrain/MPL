<?php

namespace App\Http\Controllers\SalesReport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCustomerLedgerRequest;
use App\Http\Requests\UpdateCustomerLedgerRequest;
use App\Models\SalesReport\CustomerLedger;
use App\Models\Account\CustomerMaster;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\SalesExport\CustomerLedgerExport;
class CustomerLedgerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $CustomerData='';
        $date =[];
        $cust=CustomerMaster::get();
        if($request->formDate){
            $date['formDate']=  date("Y-m-d",strtotime($request->formDate));
        }
        
        if($request->todate){
           $date['todate']=  date("Y-m-d",strtotime($request->todate));
        }

       
        if(isset($request->Customer)){
            $CustomerData =  $request->Customer;
        }
       $custla=CustomerLedger::with('customerDetails')
       ->where(function($query) use($CustomerData){
        if($CustomerData!=''){
           $query->where("CustomerLadger.CustId",$CustomerData);
        }
       })
       
       ->where(function($query) use($date){
        if(isset($date['formDate']) &&  isset($date['todate'])){
            $query->whereBetween(DB::raw("DATE_FORMAT(CustomerLadger.Date, '%Y-%m-%d')"),[$date['formDate'],$date['todate']]);
        }
       })
       ->paginate(10);
       if($req->get('submit')=='Download')
       {
          return  Excel::download(new CustomerLedgerExport($date,$CustomerData ), 'CustomerLedgerExport.xlsx');
       }
       return view("SalesReport.CustomerLadger",[
        "title" => "Customer Ledger",
        "data" =>$custla,
        'customer'=>$cust
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
     * @param  \App\Http\Requests\StoreCustomerLedgerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerLedgerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SalesReport\CustomerLedger  $customerLedger
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerLedger $customerLedger)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SalesReport\CustomerLedger  $customerLedger
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerLedger $customerLedger)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerLedgerRequest  $request
     * @param  \App\Models\SalesReport\CustomerLedger  $customerLedger
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerLedgerRequest $request, CustomerLedger $customerLedger)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SalesReport\CustomerLedger  $customerLedger
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerLedger $customerLedger)
    {
        //
    }
}
