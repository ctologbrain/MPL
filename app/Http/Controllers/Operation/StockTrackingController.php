<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorestockTrackingRequest;
use App\Http\Requests\UpdatestockTrackingRequest;
use App\Models\Operation\stockTracking;

class StockTrackingController extends Controller
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
             'title'=>'STOCK TRACKING']);
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
     * @param  \App\Http\Requests\StorestockTrackingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorestockTrackingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\stockTracking  $stockTracking
     * @return \Illuminate\Http\Response
     */
    public function show(stockTracking $stockTracking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\stockTracking  $stockTracking
     * @return \Illuminate\Http\Response
     */
    public function edit(stockTracking $stockTracking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatestockTrackingRequest  $request
     * @param  \App\Models\Operation\stockTracking  $stockTracking
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatestockTrackingRequest $request, stockTracking $stockTracking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\stockTracking  $stockTracking
     * @return \Illuminate\Http\Response
     */
    public function destroy(stockTracking $stockTracking)
    {
        //
    }
}
