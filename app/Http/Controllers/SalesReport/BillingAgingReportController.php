<?php

namespace App\Http\Controllers\SalesReport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBillingAgingReportRequest;
use App\Http\Requests\UpdateBillingAgingReportRequest;
use App\Models\SalesReport\BillingAgingReport;
use App\Models\Account\CustomerInvoice;
use DB;
class BillingAgingReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $Customer =  $request->get("Customer");
      $getCustInvOne=CustomerInvoice::leftjoin("InvoiceDetails","InvoiceDetails.InvId","InvoiceMaster.id")
      ->leftjoin("customer_masters","InvoiceMaster.Cust_Id","customer_masters.id")
      ->where('Cust_Id',$Customer)
      ->select("InvoiceMaster.InvNo","customer_masters.CustomerName","customer_masters.CustomerCode","InvoiceMaster.InvDate",
      "InvoiceDetails.Charge", "InvoiceDetails.Scst", "InvoiceDetails.Cgst", "InvoiceDetails.Igst" , "InvoiceDetails.Total",
      DB::raw("DATEDIFF(NOW(),InvoiceMaster.InvDate) AS DateDiff")
       )
      ->paginate(10);
      return view("SalesReport.BillingAgingReport",[
          "title" => "Billing Aging Report",
          "data" =>$getCustInvOne
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
     * @param  \App\Http\Requests\StoreBillingAgingReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBillingAgingReportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SalesReport\BillingAgingReport  $billingAgingReport
     * @return \Illuminate\Http\Response
     */
    public function show(BillingAgingReport $billingAgingReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SalesReport\BillingAgingReport  $billingAgingReport
     * @return \Illuminate\Http\Response
     */
    public function edit(BillingAgingReport $billingAgingReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBillingAgingReportRequest  $request
     * @param  \App\Models\SalesReport\BillingAgingReport  $billingAgingReport
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBillingAgingReportRequest $request, BillingAgingReport $billingAgingReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SalesReport\BillingAgingReport  $billingAgingReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(BillingAgingReport $billingAgingReport)
    {
        //
    }
}
