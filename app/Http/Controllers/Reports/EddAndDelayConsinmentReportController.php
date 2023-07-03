<?php

namespace App\Http\Controllers\Reports;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEddAndDelayConsinmentReportRequest;
use App\Http\Requests\UpdateEddAndDelayConsinmentReportRequest;
use App\Models\Reports\EddAndDelayConsinmentReport;
use App\Models\Operation\DocketMaster;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DelayAndTodayEddExport;
class EddAndDelayConsinmentReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        date_default_timezone_set('Asia/Kolkata');
        $Edd =4;
        $CurrentDate = date("Y-m-d");
        $DocketBooking=DocketMaster::with('offcieDetails','BookignTypeDetails','DevileryTypeDet','customerDetails','consignor','consignoeeDetails','DocketProductDetails','PincodeDetails','DestPincodeDetails','DocketAllocationDetail','NDRTransDetails','getpassDataDetails','DocketDetailUser')
        ->whereRelation("DocketAllocationDetail",fn($q) => $q->whereIn("Status",[3,4,5,6]))
        ->where(DB::raw("DATE_FORMAT(Booking_Date + INTERVAL 4 DAY ,'%Y-%m-%d')"),"=",$CurrentDate)
        ->paginate(10);
        if($request->get('submit')=='Download')
        {
            return  Excel::download(new DelayAndTodayEddExport('Today'), 'TodayEddExport.xlsx');
        }
        return view("Operation.EddAndDelayDashboard",
            ["title"=>"	DASHBOARD DETAIL - TODAY'S EDD",
            "DocketBookingData"=>$DocketBooking]);
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
     * @param  \App\Http\Requests\StoreEddAndDelayConsinmentReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEddAndDelayConsinmentReportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reports\EddAndDelayConsinmentReport  $eddAndDelayConsinmentReport
     * @return \Illuminate\Http\Response
     */
    public function show(EddAndDelayConsinmentReport $eddAndDelayConsinmentReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reports\EddAndDelayConsinmentReport  $eddAndDelayConsinmentReport
     * @return \Illuminate\Http\Response
     */
    public function edit(EddAndDelayConsinmentReport $eddAndDelayConsinmentReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEddAndDelayConsinmentReportRequest  $request
     * @param  \App\Models\Reports\EddAndDelayConsinmentReport  $eddAndDelayConsinmentReport
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEddAndDelayConsinmentReportRequest $request, EddAndDelayConsinmentReport $eddAndDelayConsinmentReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reports\EddAndDelayConsinmentReport  $eddAndDelayConsinmentReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(EddAndDelayConsinmentReport $eddAndDelayConsinmentReport)
    {
        //
    }

    public function  DelayConsignmentreport(Request $request){
        date_default_timezone_set('Asia/Kolkata');
        $Edd =4;
        $CurrentDate = date("Y-m-d"); 
    
        $DocketBooking=DocketMaster::with('offcieDetails','BookignTypeDetails','DevileryTypeDet','customerDetails','consignor','consignoeeDetails','DocketProductDetails','PincodeDetails','DestPincodeDetails','DocketAllocationDetail','NDRTransDetails','getpassDataDetails','DocketDetailUser')
        ->whereRelation("DocketAllocationDetail",fn($q) => $q->whereIn("Status",[3,4,5,6]))
        ->where(DB::raw("DATE_FORMAT(Booking_Date + INTERVAL 4 DAY ,'%Y-%m-%d')"),"<",$CurrentDate)
        ->paginate(10);
        if($request->get('submit')=='Download')
        {
            return  Excel::download(new DelayAndTodayEddExport(), 'DelayEddExport.xlsx');
        }
        return view("Operation.EddAndDelayDashboard",
            ["title"=>"DASHBOARD DETAIL - DELAY CONSIGNMENTS",
            "DocketBookingData"=>$DocketBooking]);
    }
}
