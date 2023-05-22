<?php

namespace App\Http\Controllers\SalesReport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDocketChargeDetailReportRequest;
use App\Http\Requests\UpdateDocketChargeDetailReportRequest;
use App\Models\Account\DocketChargeDetailReport;
use App\Models\Operation\DocketMaster;
use App\Models\Account\CustomerMaster;
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
        if($request->formDate){
            $date['formDate']=  date("Y-m-d",strtotime($request->formDate));
        }
        
        if($request->todate){
           $date['todate']=  date("Y-m-d",strtotime($request->todate));
        }
        //
        $customer=CustomerMaster::get();
      $docket = DocketMaster::with('BookignTypeDetails','DevileryTypeDet','customerDetails','consignor','consignoeeDetails','DocketProductDetails','PincodeDetails','DestPincodeDetails','DocketInvoiceDetails','DocketAllocationDetail','getpassDataDetails','DocketManyInvoiceDetails','DocketDetailUser')->where(function($query) use($date){
        if(isset($date['formDate']) &&  isset($date['todate'])){
            $query->whereBetween(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),[$date['formDate'],$date['todate']]);
        }
       })
       ->paginate(10);
        return view('SalesReport.DocketChargeReport', [
            'title'=>'Docket Charge  Details',
            'docketCharge'=>$docket,
            'customer'=>$customer
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
