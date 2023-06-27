<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Requests\StoreBookingDetailsReportRequest;
use App\Http\Requests\UpdateBookingDetailsReportRequest;
use App\Models\AdminDashboard\BookingDetailsReport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Operation\DocketMaster;
use DB;
class BookingDetailsReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $DocketBookingData = DocketMaster::with('offcieDetails','BookignTypeDetails','DevileryTypeDet','customerDetails','consignor','consignoeeDetails','DocketProductDetails','PincodeDetails','DestPincodeDetails','DocketAllocationDetail','getpassDataDetails','DocketImagesDet','DocketDetailUser')
        //->whereRelation("DocketAllocationDetail",fn($q) => $q->whereIn("Status",[3,4]))
        ->paginate(10);
         $DocketTotals=DocketMaster::leftjoin("docket_allocations","docket_masters.Docket_No","docket_allocations.Docket_No")
         ->leftjoin('docket_product_details','docket_masters.id','docket_product_details.Docket_Id')->select(DB::raw("SUM(docket_product_details.Qty) as TotPiece"),DB::raw("SUM(docket_product_details.Actual_Weight) as TotActual_Weight"),DB::raw("SUM(docket_product_details.Charged_Weight) as TotCharged_Weight"))
         //->whereIn("docket_allocations.Status",[3,4])
         ->first();
         return view("AdminDashboard.BookingDashbordReportDashbord",["title" =>"Dashboard Booking Report",
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
     * @param  \App\Http\Requests\StoreBookingDetailsReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookingDetailsReportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminDashboard\BookingDetailsReport  $bookingDetailsReport
     * @return \Illuminate\Http\Response
     */
    public function show(BookingDetailsReport $bookingDetailsReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminDashboard\BookingDetailsReport  $bookingDetailsReport
     * @return \Illuminate\Http\Response
     */
    public function edit(BookingDetailsReport $bookingDetailsReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookingDetailsReportRequest  $request
     * @param  \App\Models\AdminDashboard\BookingDetailsReport  $bookingDetailsReport
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookingDetailsReportRequest $request, BookingDetailsReport $bookingDetailsReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminDashboard\BookingDetailsReport  $bookingDetailsReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookingDetailsReport $bookingDetailsReport)
    {
        //
    }
}
