<?php

namespace App\Http\Controllers\SalesReport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\StoreCancelInvoiceReportRequest;
use App\Http\Requests\UpdateCancelInvoiceReportRequest;
use App\Models\SalesReport\CancelInvoiceReport;
use App\Models\Account\CustomerInvoice;
use App\Models\Account\CustomerMaster;

class CancelInvoiceReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $cust=CustomerMaster::where("Active","Yes")->get();
        $customer='';
        if($request->customer)
        {
          $customer=$request->customer;  
        }
        $custInv=CustomerInvoice::with('customerDetails')->withsum('Sum','Qty')->withsum('Sum','Fright')->withsum('Sum','Scst')->withsum('Sum','Cgst')->withsum('Sum','Igst')->withsum('Sum','Total')
        ->where(function($query) use ($customer) {
           if($customer !=''){
           $query->where('Cust_Id',$customer);
            }
            })
        ->where("Cancel_Invoice",1)
        ->paginate(10);
        return view('SalesReport.CancelledInvoice', [
            'title'=>'CANCEL INVOICE -Register',
            'customer'=>$cust,
            'custInv'=>$custInv
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
     * @param  \App\Http\Requests\StoreCancelInvoiceReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCancelInvoiceReportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SalesReport\CancelInvoiceReport  $cancelInvoiceReport
     * @return \Illuminate\Http\Response
     */
    public function show(CancelInvoiceReport $cancelInvoiceReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SalesReport\CancelInvoiceReport  $cancelInvoiceReport
     * @return \Illuminate\Http\Response
     */
    public function edit(CancelInvoiceReport $cancelInvoiceReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCancelInvoiceReportRequest  $request
     * @param  \App\Models\SalesReport\CancelInvoiceReport  $cancelInvoiceReport
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCancelInvoiceReportRequest $request, CancelInvoiceReport $cancelInvoiceReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SalesReport\CancelInvoiceReport  $cancelInvoiceReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(CancelInvoiceReport $cancelInvoiceReport)
    {
        //
    }
}
