<?php

namespace App\Http\Controllers\Reports;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePendingDeliveryDashboardRequest;
use App\Http\Requests\UpdatePendingDeliveryDashboardRequest;
use App\Models\Reports\PendingDeliveryDashboard;
use App\Models\Operation\DocketMaster;

class PendingDeliveryDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $delivery = DocketMaster::with('offcieDetails','BookignTypeDetails','DevileryTypeDet','customerDetails','consignor','consignoeeDetails','DocketProductDetails','PincodeDetails','DestPincodeDetails','DocketAllocationDetail','NDRTransDetails','getpassDataDetails','DocketDetailUser')
        ->whereRelation("DocketAllocationDetail","Status","!=",8)
        ->paginate(10);
       return view("Operation.PendingDeliveryDashboard",
       ["title"=>"Pending Deliviry Dashboard",
        "DocketBookingData"=> $delivery]);
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
     * @param  \App\Http\Requests\StorePendingDeliveryDashboardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePendingDeliveryDashboardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reports\PendingDeliveryDashboard  $pendingDeliveryDashboard
     * @return \Illuminate\Http\Response
     */
    public function show(PendingDeliveryDashboard $pendingDeliveryDashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reports\PendingDeliveryDashboard  $pendingDeliveryDashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(PendingDeliveryDashboard $pendingDeliveryDashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePendingDeliveryDashboardRequest  $request
     * @param  \App\Models\Reports\PendingDeliveryDashboard  $pendingDeliveryDashboard
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePendingDeliveryDashboardRequest $request, PendingDeliveryDashboard $pendingDeliveryDashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reports\PendingDeliveryDashboard  $pendingDeliveryDashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(PendingDeliveryDashboard $pendingDeliveryDashboard)
    {
        //
    }
}
