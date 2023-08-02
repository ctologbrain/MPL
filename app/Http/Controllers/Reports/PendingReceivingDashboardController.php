<?php

namespace App\Http\Controllers\Reports;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePendingReceivingDashboardRequest;
use App\Http\Requests\UpdatePendingReceivingDashboardRequest;
use App\Models\Reports\PendingReceivingDashboard;
use App\Models\Operation\DocketMaster;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PendingReceivingDashboardExport;
class PendingReceivingDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
     $docketMaster =  DocketMaster::leftjoin("docket_allocations","docket_masters.Docket_No","docket_allocations.Docket_No")
     ->leftjoin("gate_pass_with_dockets","docket_masters.Docket_No","gate_pass_with_dockets.Docket")
     ->leftjoin("vehicle_gatepasses","vehicle_gatepasses.id","gate_pass_with_dockets.GatePassId")
     ->leftjoin("vehicle_masters","vehicle_masters.id","vehicle_gatepasses.vehicle_id")
     ->leftjoin("driver_masters","vehicle_gatepasses.DrvierId","driver_masters.id")

     ->leftjoin("office_masters","gate_pass_with_dockets.destinationOffice","office_masters.id")
        ->where("docket_allocations.Status","=",5)
        ->Select("vehicle_gatepasses.GP_TIME","docket_masters.Docket_No",
        "driver_masters.DriverName","vehicle_masters.VehicleNo","vehicle_gatepasses.GP_Number"
        ,"office_masters.OfficeCode","office_masters.OfficeName")
    ->paginate(10);
        if($request->get('submit')=="Download"){
        return   Excel::download(new PendingReceivingDashboardExport(), 'PendingReceivingDashboardExport.xlsx');
       }
        return view("Operation.PendingReceivingDashboard",["title" => "PENDING RECEIVING",
        "docketMaster" => $docketMaster
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
     * @param  \App\Http\Requests\StorePendingReceivingDashboardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePendingReceivingDashboardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reports\PendingReceivingDashboard  $pendingReceivingDashboard
     * @return \Illuminate\Http\Response
     */
    public function show(PendingReceivingDashboard $pendingReceivingDashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reports\PendingReceivingDashboard  $pendingReceivingDashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(PendingReceivingDashboard $pendingReceivingDashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePendingReceivingDashboardRequest  $request
     * @param  \App\Models\Reports\PendingReceivingDashboard  $pendingReceivingDashboard
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePendingReceivingDashboardRequest $request, PendingReceivingDashboard $pendingReceivingDashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reports\PendingReceivingDashboard  $pendingReceivingDashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(PendingReceivingDashboard $pendingReceivingDashboard)
    {
        //
    }
}
