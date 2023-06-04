<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoremultipleDocketTrackingRequest;
use App\Http\Requests\UpdatemultipleDocketTrackingRequest;
use App\Models\Operation\multipleDocketTracking;

class MultipleDocketTrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
           return view('Operation.stockTracking', [
             'title'=>'MULTIPLE DOCKET TRACKING']);
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
     * @param  \App\Http\Requests\StoremultipleDocketTrackingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoremultipleDocketTrackingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\multipleDocketTracking  $multipleDocketTracking
     * @return \Illuminate\Http\Response
     */
    public function show(multipleDocketTracking $multipleDocketTracking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\multipleDocketTracking  $multipleDocketTracking
     * @return \Illuminate\Http\Response
     */
    public function edit(multipleDocketTracking $multipleDocketTracking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatemultipleDocketTrackingRequest  $request
     * @param  \App\Models\Operation\multipleDocketTracking  $multipleDocketTracking
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatemultipleDocketTrackingRequest $request, multipleDocketTracking $multipleDocketTracking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\multipleDocketTracking  $multipleDocketTracking
     * @return \Illuminate\Http\Response
     */
    public function destroy(multipleDocketTracking $multipleDocketTracking)
    {
        //
    }
}
