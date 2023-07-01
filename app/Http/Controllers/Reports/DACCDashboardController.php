<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDACCDashboardRequest;
use App\Http\Requests\UpdateDACCDashboardRequest;
use App\Models\Reports\DACCDashboard;
use App\Models\Operation\DocketMaster;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BookingDashboardExport;
class DACCDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Docket=DocketMaster::with('offcieDetails','customerDetails','DocketProductDetails','PincodeDetails','DestPincodeDetails','DocketAllocationDetail')
        ->where("Is_DACC","YES")->paginate(10);
        if($request->submit=="Download"){
            return   Excel::download(new BookingDashboardExport('DACC'), ' BookingDashboardExport.xlsx');
        }
       return  view("Operation.DaccDashbord",
        ["title"=> "DACC - Dashboard",
        "DocketBooking"=>   $Docket ]);
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
     * @param  \App\Http\Requests\StoreDACCDashboardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDACCDashboardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reports\DACCDashboard  $dACCDashboard
     * @return \Illuminate\Http\Response
     */
    public function show(DACCDashboard $dACCDashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reports\DACCDashboard  $dACCDashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(DACCDashboard $dACCDashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDACCDashboardRequest  $request
     * @param  \App\Models\Reports\DACCDashboard  $dACCDashboard
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDACCDashboardRequest $request, DACCDashboard $dACCDashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reports\DACCDashboard  $dACCDashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(DACCDashboard $dACCDashboard)
    {
        //
    }
}
