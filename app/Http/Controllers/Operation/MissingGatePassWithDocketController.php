<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreMissingGatePassWithDocketRequest;
use App\Http\Requests\UpdateMissingGatePassWithDocketRequest;
use App\Models\Operation\MissingGatePassWithDocket;
use App\Models\Operation\DocketMaster;
use DB;

class MissingGatePassWithDocketController extends Controller
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

        $Timing24 = DocketMaster::leftjoin('docket_allocations','docket_allocations.Docket_No','docket_masters.Docket_No')->select(DB::raw("COUNT('docket_masters.Docket_No') as TotalDock"))->where('docket_allocations.Status','=',4)->orwhere('docket_allocations.Status','=',3)->where(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),'=',$cd)->first();

        $Timing48 = DocketMaster::leftjoin('docket_allocations','docket_allocations.Docket_No','docket_masters.Docket_No')->select(DB::raw("COUNT('docket_masters.Docket_No') as TotalDock"))->where('docket_allocations.Status','=',4)->orwhere('docket_allocations.Status','=',3)->where(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),'=',$previousOne)->first();
        $Timing72 = DocketMaster::leftjoin('docket_allocations','docket_allocations.Docket_No','docket_masters.Docket_No')->select(DB::raw("COUNT('docket_masters.Docket_No') as TotalDock"))->where('docket_allocations.Status','=',4)->orwhere('docket_allocations.Status','=',3)->where(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),'=',$previousTwo)->first();

        $Time72Pluse = DocketMaster::leftjoin('docket_allocations','docket_allocations.Docket_No','docket_masters.Docket_No')->select(DB::raw("COUNT('docket_masters.Docket_No') as TotalDock"))->where('docket_allocations.Status','=',4)->orwhere('docket_allocations.Status','=',3)->where(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),'<=',$previousThree)->first();

        $MissingDocket = DocketMaster::with('DocketAllocationDetail','PincodeDetails','DocketProductDetails','customerDetails','DestPincodeDetails','offcieDetails')->whereRelation('DocketAllocationDetail','Status','=',3)->orWhereRelation('DocketAllocationDetail','Status','=',4)->paginate(10);
        return view('Operation.missingGatepass', [
             'title'=>'MISSING GATEPASS',
             'MissingDocket'=>$MissingDocket,
             'TimingTweentyFourCount'=>$Timing24,
             'TimingFortyEightCount'=>$Timing48,
             'TimingSeventyTwoCount'=>$Timing72,
             'Time72Pluse'=>  $Time72Pluse]);
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
     * @param  \App\Http\Requests\StoreMissingGatePassWithDocketRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMissingGatePassWithDocketRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\MissingGatePassWithDocket  $missingGatePassWithDocket
     * @return \Illuminate\Http\Response
     */
    public function show(MissingGatePassWithDocket $missingGatePassWithDocket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\MissingGatePassWithDocket  $missingGatePassWithDocket
     * @return \Illuminate\Http\Response
     */
    public function edit(MissingGatePassWithDocket $missingGatePassWithDocket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMissingGatePassWithDocketRequest  $request
     * @param  \App\Models\Operation\MissingGatePassWithDocket  $missingGatePassWithDocket
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMissingGatePassWithDocketRequest $request, MissingGatePassWithDocket $missingGatePassWithDocket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\MissingGatePassWithDocket  $missingGatePassWithDocket
     * @return \Illuminate\Http\Response
     */
    public function destroy(MissingGatePassWithDocket $missingGatePassWithDocket)
    {
        //
    }
}
