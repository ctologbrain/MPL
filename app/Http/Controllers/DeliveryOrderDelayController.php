<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDeliveryOrderDelayRequest;
use App\Http\Requests\UpdateDeliveryOrderDelayRequest;
use App\Models\Operation\DeliveryOrderDelay;

class DeliveryOrderDelayController extends Controller
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
     * @param  \App\Http\Requests\StoreDeliveryOrderDelayRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeliveryOrderDelayRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\DeliveryOrderDelay  $deliveryOrderDelay
     * @return \Illuminate\Http\Response
     */
    public function show(DeliveryOrderDelay $deliveryOrderDelay)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\DeliveryOrderDelay  $deliveryOrderDelay
     * @return \Illuminate\Http\Response
     */
    public function edit(DeliveryOrderDelay $deliveryOrderDelay)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDeliveryOrderDelayRequest  $request
     * @param  \App\Models\Operation\DeliveryOrderDelay  $deliveryOrderDelay
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeliveryOrderDelayRequest $request, DeliveryOrderDelay $deliveryOrderDelay)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\DeliveryOrderDelay  $deliveryOrderDelay
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeliveryOrderDelay $deliveryOrderDelay)
    {
        //
    }
}
