<?php

namespace App\Http\Controllers\Reports;

use App\Http\Requests\StoreBookingDashboardReportRequest;
use App\Http\Requests\UpdateBookingDashboardReportRequest;
use App\Models\Reports\BookingDashboardReport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Operation\DocketMaster;
use DB;

class BookingDashboardReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $DocketBookingData = DocketMaster::with('offcieDetails','BookignTypeDetails','DevileryTypeDet','customerDetails','consignor','consignoeeDetails','DocketProductDetails','PincodeDetails','DestPincodeDetails','DocketAllocationDetail','getpassDataDetails','DocketImagesDet','DocketDetailUser')->where(function($query){
        $query->whereIn("Booking_Type",[1,2]);
        })->paginate(10);
        $DocketTotals=DocketMaster::leftjoin('docket_product_details','docket_masters.id','docket_product_details.Docket_Id')->select(DB::raw("SUM(docket_product_details.Qty) as TotPiece"),DB::raw("SUM(docket_product_details.Actual_Weight) as TotActual_Weight"),DB::raw("SUM(docket_product_details.Charged_Weight) as TotCharged_Weight"))->where(function($query){
            $query->whereIn("Booking_Type",[1,2]);
           
           })->first();
        return view("Operation.BookingDashbordReport",["title" =>"Dashboard Booking Report",
            "DocketBookingData"=>$DocketBookingData,
            "DocketTotals" => $DocketTotals]);
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
     * @param  \App\Http\Requests\StoreBookingDashboardReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookingDashboardReportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reports\BookingDashboardReport  $bookingDashboardReport
     * @return \Illuminate\Http\Response
     */
    public function show(BookingDashboardReport $bookingDashboardReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reports\BookingDashboardReport  $bookingDashboardReport
     * @return \Illuminate\Http\Response
     */
    public function edit(BookingDashboardReport $bookingDashboardReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookingDashboardReportRequest  $request
     * @param  \App\Models\Reports\BookingDashboardReport  $bookingDashboardReport
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookingDashboardReportRequest $request, BookingDashboardReport $bookingDashboardReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reports\BookingDashboardReport  $bookingDashboardReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookingDashboardReport $bookingDashboardReport)
    {
        //
    }
    

    public function CashDashbord(Request $request){
        $DocketBookingData=   DocketMaster::with('offcieDetails','BookignTypeDetails','DevileryTypeDet','customerDetails','consignor','consignoeeDetails','DocketProductDetails','PincodeDetails','DestPincodeDetails','DocketAllocationDetail','getpassDataDetails','DocketImagesDet','DocketDetailUser')->where(function($query) {
            $query->whereIn("Booking_Type",[3,4]);
            })->paginate(10);
        $DocketTotals=DocketMaster::leftjoin('docket_product_details','docket_masters.id','docket_product_details.Docket_Id')->select(DB::raw("SUM(docket_product_details.Qty) as TotPiece"),DB::raw("SUM(docket_product_details.Actual_Weight) as TotActual_Weight"),DB::raw("SUM(docket_product_details.Charged_Weight) as TotCharged_Weight"))->where(function($query){
            $query->whereIn("Booking_Type",[3,4]);
            
            })->first();
        return view("Operation.BookingDashbordReport",["title" =>"Dashboard Booking Report",
        "DocketBookingData"=>$DocketBookingData,
        "DocketTotals" => $DocketTotals]);
    }
}
