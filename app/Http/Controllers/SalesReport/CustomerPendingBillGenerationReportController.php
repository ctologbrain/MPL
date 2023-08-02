<?php

namespace App\Http\Controllers\SalesReport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCustomerPendingBillGenerationReportRequest;
use App\Http\Requests\UpdateCustomerPendingBillGenerationReportRequest;
use App\Models\SalesReport\CustomerPendingBillGenerationReport;
use App\Models\Account\CustomerMaster;
use App\Models\OfficeSetup\OfficeMaster;
use App\Models\Operation\DocketMaster;
use App\Models\Operation\DocketBookingType;
class CustomerPendingBillGenerationReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $date =[];
            $CustomerData = '';
            $SaleType = '';
            if($request->SaleType){
                $SaleType =  $request->SaleType;
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
    
           
            if(isset($request->Customer)){
                $CustomerData =  $request->Customer;
            }
            
            $customer=CustomerMaster::select('customer_masters.*')->where("customer_masters.Active","Yes")->get();
            $Saletype=DocketBookingType::get();
           $Offcie=OfficeMaster::select('office_masters.*')->where("Is_Active","Yes")->get();
          $docket = DocketMaster::with('BookignTypeDetails','DevileryTypeDet','customerDetails','consignor','consignoeeDetails','DocketProductDetails','PincodeDetails','DestPincodeDetails','DocketInvoiceDetails','DocketAllocationDetail','getpassDataDetails','DocketManyInvoiceDetails','DocketDetailUser')
          ->where(function($query) use($SaleType){
            if($SaleType!=''){
                $query->where("docket_masters.Booking_Type",$SaleType);
            }
           })
           ->where(function($query) use($office){
            if($office!=''){
                $query->where("docket_masters.Office_ID",$office);
            }
           })
           ->where(function($query) use($CustomerData){
            if($CustomerData!=''){
               $query->where("docket_masters.Cust_Id",$CustomerData);
            }
           })
           
           ->where(function($query) use($date){
            if(isset($date['formDate']) &&  isset($date['todate'])){
                $query->whereBetween(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),[$date['formDate'],$date['todate']]);
            }
           })
           ->where('docket_masters.Is_invoice',1)
           ->paginate(10);
            return view('SalesReport.CustomerPendingBillGeneration', [
                'title'=>'Customer Pending  Bill Generation',
                'docketCharge'=>$docket,
                'customer'=>$customer,
                'OfficeMaster'=>$Offcie,
                'Saletype'=>$Saletype
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
     * @param  \App\Http\Requests\StoreCustomerPendingBillGenerationReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerPendingBillGenerationReportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SalesReport\CustomerPendingBillGenerationReport  $customerPendingBillGenerationReport
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerPendingBillGenerationReport $customerPendingBillGenerationReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SalesReport\CustomerPendingBillGenerationReport  $customerPendingBillGenerationReport
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerPendingBillGenerationReport $customerPendingBillGenerationReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerPendingBillGenerationReportRequest  $request
     * @param  \App\Models\SalesReport\CustomerPendingBillGenerationReport  $customerPendingBillGenerationReport
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerPendingBillGenerationReportRequest $request, CustomerPendingBillGenerationReport $customerPendingBillGenerationReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SalesReport\CustomerPendingBillGenerationReport  $customerPendingBillGenerationReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerPendingBillGenerationReport $customerPendingBillGenerationReport)
    {
        //
    }
}
