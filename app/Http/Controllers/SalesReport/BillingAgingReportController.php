<?php

namespace App\Http\Controllers\SalesReport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBillingAgingReportRequest;
use App\Http\Requests\UpdateBillingAgingReportRequest;
use App\Models\SalesReport\BillingAgingReport;
use App\Models\Account\CustomerInvoice;
use DB;
use App\Models\Account\CustomerMaster;
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
          "title" => "INVOICE AGEING DETAIL REPORT",
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

    public function CustomerBillingAgingReport(Request $request){
        $Customer = $request->get("Customer");
        $ParentCust = $request->get("ParentCust");
       $parent= CustomerMaster::where("Active","Yes")->where('ParentCustomer','!=',NULL)->get();
       $Cust = CustomerMaster::where("Active","Yes")->get();

       $getCustInvOne=CustomerInvoice::leftjoin("InvoiceDetails","InvoiceDetails.InvId","InvoiceMaster.id")
       ->leftjoin("customer_masters","customer_masters.id","InvoiceMaster.Cust_Id")
       ->select(DB::raw("SUM(CASE WHEN  ( InvoiceMaster.InvDate >=  DATE_SUB(CURDATE() ,INTERVAL 15 Day))   AND CURDATE() THEN  InvoiceDetails.Total END ) as lessthen15"),
       DB::raw("SUM(CASE WHEN  ( InvoiceMaster.InvDate >=  DATE_SUB(CURDATE() ,INTERVAL 31 Day))  AND ( InvoiceMaster.InvDate <=  DATE_SUB(CURDATE() ,INTERVAL 16 Day))   THEN  InvoiceDetails.Total END )  as SixteentoThirtyOne"),
       DB::raw("SUM(CASE WHEN  ( InvoiceMaster.InvDate >= DATE_SUB(CURDATE() ,INTERVAL 45 Day))     AND  ( InvoiceMaster.InvDate <= DATE_SUB(CURDATE() ,INTERVAL 31 Day))   THEN  InvoiceDetails.Total END ) as ThirtyOneto45"),
       DB::raw("SUM(CASE WHEN  ( InvoiceMaster.InvDate >=   DATE_SUB(CURDATE() ,INTERVAL 60 Day))   AND ( InvoiceMaster.InvDate <= DATE_SUB(CURDATE() ,INTERVAL 45 Day)) THEN  InvoiceDetails.Total END )    as FourtyFiveto60"),
       DB::raw("SUM(CASE WHEN  ( InvoiceMaster.InvDate  >=  DATE_SUB(CURDATE() ,INTERVAL 90 Day))    AND  ( InvoiceMaster.InvDate <= DATE_SUB(CURDATE() ,INTERVAL 60 Day))  THEN  InvoiceDetails.Total END ) as Nintyto61"),
       DB::raw("SUM(CASE WHEN  ( InvoiceMaster.InvDate  <=  DATE_SUB(CURDATE() ,INTERVAL 90 Day))      THEN  InvoiceDetails.Total END ) as greatedThennin"), "InvoiceMaster.Cust_Id"
        ,"customer_masters.CustomerCode","customer_masters.CustomerName"
       )
       ->where(function($query) use($Customer){
           if($Customer!=""){
                $query->where('Cust_Id', $Customer);
           }
       })
       ->where(function($query) use($ParentCust){
        if($ParentCust!=""){
             $query->orWhere('Cust_Id', $ParentCust);
        }
        })
       ->groupBy('InvoiceMaster.Cust_Id')
       ->paginate(10);

       return view("SalesReport.CustomerBillingAgingReport",[
        "title" => "INVOICE AGEING REPORT",
        "data" =>$getCustInvOne,
        "ParentCustomer"=> $parent,
        "Cust"=>$Cust
       ]);
    }
}
