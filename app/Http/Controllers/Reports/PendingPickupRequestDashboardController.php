<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePendingPickupRequestDashboardRequest;
use App\Http\Requests\UpdatePendingPickupRequestDashboardRequest;
use App\Models\SalesReport\PendingPickupRequestDashboard;

class PendingPickupRequestDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function show(PendingPickupRequestDashboard $pendingPickupRequestDashboard)
    {
        //
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
