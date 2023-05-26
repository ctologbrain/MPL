<?php

namespace App\Http\Controllers\Reports;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDelayConnectionReportRequest;
use App\Http\Requests\UpdateDelayConnectionReportRequest;
use App\Models\Reports\DelayConnectionReport;
use App\Models\OfficeSetup\OfficeMaster;
use App\Models\Operation\DocketMaster;

class DelayConnectionReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $office = OfficeMaster::get();
        $docketData =   $docket = DocketMaster::with('DocketProductDetails','DocketAllocationDetail','getpassDataDetails','DocketDetailUser','NDRTransDetails','offEntDetails','getpassDataManyDetails')
        ->where(function($query) use($office){
            if($office!=''){
                $query->where("docket_masters.Office_ID",$office);
            }
           })
        ->paginate(10);
      echo '<pre>';  print_r( $docketData[147]->getpassDataManyDetails); die;
        return view('Operation.DelayConnectionReport', [
            'title'=>'DELAY CONNECTION REPORT',
            'docketData'=>$docketData,
            'office'=> $office]);
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
     * @param  \App\Http\Requests\StoreDelayConnectionReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDelayConnectionReportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reports\DelayConnectionReport  $delayConnectionReport
     * @return \Illuminate\Http\Response
     */
    public function show(DelayConnectionReport $delayConnectionReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reports\DelayConnectionReport  $delayConnectionReport
     * @return \Illuminate\Http\Response
     */
    public function edit(DelayConnectionReport $delayConnectionReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDelayConnectionReportRequest  $request
     * @param  \App\Models\Reports\DelayConnectionReport  $delayConnectionReport
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDelayConnectionReportRequest $request, DelayConnectionReport $delayConnectionReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reports\DelayConnectionReport  $delayConnectionReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(DelayConnectionReport $delayConnectionReport)
    {
        //
    }
}
