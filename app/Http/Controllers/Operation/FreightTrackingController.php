<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorefreightTrackingRequest;
use App\Http\Requests\UpdatefreightTrackingRequest;
use App\Models\Operation\freightTracking;

class FreightTrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Operation.freightTracking', [
             'title'=>'GATEPASS TRANSFER']);
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
     * @param  \App\Http\Requests\StorefreightTrackingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorefreightTrackingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\freightTracking  $freightTracking
     * @return \Illuminate\Http\Response
     */
    public function show(freightTracking $freightTracking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\freightTracking  $freightTracking
     * @return \Illuminate\Http\Response
     */
    public function edit(freightTracking $freightTracking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatefreightTrackingRequest  $request
     * @param  \App\Models\Operation\freightTracking  $freightTracking
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatefreightTrackingRequest $request, freightTracking $freightTracking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\freightTracking  $freightTracking
     * @return \Illuminate\Http\Response
     */
    public function destroy(freightTracking $freightTracking)
    {
        //
    }
}
