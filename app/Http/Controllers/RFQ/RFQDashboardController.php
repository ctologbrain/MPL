<?php

namespace App\Http\Controllers\RFQ;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRFQDashboardRequest;
use App\Http\Requests\UpdateRFQDashboardRequest;
use App\Models\RFQ\RFQDashboard;

class RFQDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view("RFQ.RFQDashboard",
       ["title" =>" RFQ Dashboard" ]);
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
     * @param  \App\Http\Requests\StoreRFQDashboardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRFQDashboardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RFQ\RFQDashboard  $rFQDashboard
     * @return \Illuminate\Http\Response
     */
    public function show(RFQDashboard $rFQDashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RFQ\RFQDashboard  $rFQDashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(RFQDashboard $rFQDashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRFQDashboardRequest  $request
     * @param  \App\Models\RFQ\RFQDashboard  $rFQDashboard
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRFQDashboardRequest $request, RFQDashboard $rFQDashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RFQ\RFQDashboard  $rFQDashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(RFQDashboard $rFQDashboard)
    {
        //
    }
}
