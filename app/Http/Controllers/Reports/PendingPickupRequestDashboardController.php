<?php

namespace App\Http\Controllers\Reports;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePendingPickupRequestDashboardRequest;
use App\Http\Requests\UpdatePendingPickupRequestDashboardRequest;
use App\Models\Reports\PendingPickupRequestDashboard;

class PendingPickupRequestDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $pickupRequest= PickupRequest::with("CustomerDetails","contentDetails","PincodeOriginDetails","PincodeDestDetails","userDetails")
        ->paginate(10);
        return view('Operation.PendingPickupRequestDashBoard', [
            'title'=>'PICKUP REQUEST DASHBOARD',
            'pickupRequest'=>$pickupRequest
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
     * @param  \App\Http\Requests\StorePendingPickupRequestDashboardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePendingPickupRequestDashboardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SalesReport\PendingPickupRequestDashboard  $pendingPickupRequestDashboard
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request ,PendingPickupRequestDashboard $pendingPickupRequestDashboard)
    { 
        //
        $pickupRequest= PickupRequest::with("CustomerDetails","contentDetails","PincodeOriginDetails","PincodeDestDetails","userDetails")
        ->where("id",$request->GetRequestId)->first();
        return view('Operation.pickupDetailOrderModel', [
            'title'=>'PICKUP REQUEST Model',
            'pickupRequest'=>$pickupRequest
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SalesReport\PendingPickupRequestDashboard  $pendingPickupRequestDashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(PendingPickupRequestDashboard $pendingPickupRequestDashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePendingPickupRequestDashboardRequest  $request
     * @param  \App\Models\SalesReport\PendingPickupRequestDashboard  $pendingPickupRequestDashboard
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePendingPickupRequestDashboardRequest $request, PendingPickupRequestDashboard $pendingPickupRequestDashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SalesReport\PendingPickupRequestDashboard  $pendingPickupRequestDashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(PendingPickupRequestDashboard $pendingPickupRequestDashboard)
    {
        //
    }
}
