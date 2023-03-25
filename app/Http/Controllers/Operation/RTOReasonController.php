<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRTO_ReasonRequest;
use App\Http\Requests\UpdateRTO_ReasonRequest;
use App\Models\Operation\RTO_Reason;

class RTOReasonController extends Controller
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
     * @param  \App\Http\Requests\StoreRTO_ReasonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRTO_ReasonRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\RTO_Reason  $rTO_Reason
     * @return \Illuminate\Http\Response
     */
    public function show(RTO_Reason $rTO_Reason)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\RTO_Reason  $rTO_Reason
     * @return \Illuminate\Http\Response
     */
    public function edit(RTO_Reason $rTO_Reason)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRTO_ReasonRequest  $request
     * @param  \App\Models\Operation\RTO_Reason  $rTO_Reason
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRTO_ReasonRequest $request, RTO_Reason $rTO_Reason)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\RTO_Reason  $rTO_Reason
     * @return \Illuminate\Http\Response
     */
    public function destroy(RTO_Reason $rTO_Reason)
    {
        //
    }
}
