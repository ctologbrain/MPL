<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Requests\StoreMissGatepassRequest;
use App\Http\Requests\UpdateMissGatepassRequest;
use App\Models\AdminDashboard\MissGatepass;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Operation\DocketMaster;
use DB;
class MissGatepassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        date_default_timezone_set('Asia/Kolkata');
        $previousThree= date("Y-m-d", strtotime("-3 day"));
        $previousTwo= date("Y-m-d", strtotime("-2 day"));
        $previousOne = date("Y-m-d", strtotime("-1 day"));
        $cd =date("Y-m-d");
        // \DB::enableQueryLog();
        $Timing24 = DocketMaster::leftjoin('docket_allocations','docket_allocations.Docket_No','docket_masters.Docket_No')->select(DB::raw("COUNT('docket_masters.Docket_No') as TotalDock"))->whereIn('docket_allocations.Status',[3,4])->whereDate("docket_masters.Booking_Date",$cd)->first();
       // dd(\DB::getQueryLog());
        $Timing48 = DocketMaster::leftjoin('docket_allocations','docket_allocations.Docket_No','docket_masters.Docket_No')->select(DB::raw("COUNT('docket_masters.Docket_No') as TotalDock"))->whereIn('docket_allocations.Status',[3,4])->whereDate("docket_masters.Booking_Date",'=',$previousOne)->first();
        $Timing72 = DocketMaster::leftjoin('docket_allocations','docket_allocations.Docket_No','docket_masters.Docket_No')->select(DB::raw("COUNT('docket_masters.Docket_No') as TotalDock"))->whereIn('docket_allocations.Status',[3,4])->whereDate("docket_masters.Booking_Date",'=',$previousTwo)->first();

        $Time72Pluse = DocketMaster::leftjoin('docket_allocations','docket_allocations.Docket_No','docket_masters.Docket_No')->select(DB::raw("COUNT('docket_masters.Docket_No') as TotalDock"))->whereIn('docket_allocations.Status',[3,4])->whereDate("docket_masters.Booking_Date",'<=',$previousThree)->first();

        $MissingDocket = DocketMaster::with('DocketAllocationDetail','PincodeDetails','DocketProductDetails','customerDetails','DestPincodeDetails','offcieDetails')->whereRelation('DocketAllocationDetail','Status','=',3)->orWhereRelation('DocketAllocationDetail','Status','=',4)->paginate(10);

      $SumDocketStuff =  DocketMaster::leftjoin('docket_allocations',"docket_masters.Docket_No","docket_allocations.Docket_No")->leftjoin('docket_product_details',"docket_masters.id","docket_product_details.Docket_Id")->select(DB::raw('SUM(Actual_Weight) as actW'),DB::raw('SUM(Charged_Weight) as chgW'),DB::raw('SUM(Qty) as qty'))->whereIn('docket_allocations.Status',[3,4])->first();
        return view('AdminDashboard.missingGatepassDashboard', [
             'title'=>'MISSING GATEPASS',
             'MissingDocket'=>$MissingDocket,
             'TimingTweentyFourCount'=>$Timing24,
             'TimingFortyEightCount'=>$Timing48,
             'TimingSeventyTwoCount'=>$Timing72,
             'Time72Pluse'=>  $Time72Pluse,
             'SumDocketStuff'=>$SumDocketStuff]);
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
     * @param  \App\Http\Requests\StoreMissGatepassRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMissGatepassRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminDashboard\MissGatepass  $missGatepass
     * @return \Illuminate\Http\Response
     */
    public function show(MissGatepass $missGatepass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminDashboard\MissGatepass  $missGatepass
     * @return \Illuminate\Http\Response
     */
    public function edit(MissGatepass $missGatepass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMissGatepassRequest  $request
     * @param  \App\Models\AdminDashboard\MissGatepass  $missGatepass
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMissGatepassRequest $request, MissGatepass $missGatepass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminDashboard\MissGatepass  $missGatepass
     * @return \Illuminate\Http\Response
     */
    public function destroy(MissGatepass $missGatepass)
    {
        //
    }
}
