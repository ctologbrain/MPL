<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChargeRangeRequest;
use App\Http\Requests\UpdateChargeRangeRequest;
use App\Models\Account\ChargeRange;

class ChargeRangeController extends Controller
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
     * @param  \App\Http\Requests\StoreChargeRangeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChargeRangeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account\ChargeRange  $chargeRange
     * @return \Illuminate\Http\Response
     */
    public function show(ChargeRange $chargeRange)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account\ChargeRange  $chargeRange
     * @return \Illuminate\Http\Response
     */
    public function edit(ChargeRange $chargeRange)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChargeRangeRequest  $request
     * @param  \App\Models\Account\ChargeRange  $chargeRange
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChargeRangeRequest $request, ChargeRange $chargeRange)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account\ChargeRange  $chargeRange
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChargeRange $chargeRange)
    {
        //
    }
}
