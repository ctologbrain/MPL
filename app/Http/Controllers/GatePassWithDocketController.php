<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGatePassWithDocketRequest;
use App\Http\Requests\UpdateGatePassWithDocketRequest;
use App\Models\Operation\GatePassWithDocket;

class GatePassWithDocketController extends Controller
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
     * @param  \App\Http\Requests\StoreGatePassWithDocketRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGatePassWithDocketRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\GatePassWithDocket  $gatePassWithDocket
     * @return \Illuminate\Http\Response
     */
    public function show(GatePassWithDocket $gatePassWithDocket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\GatePassWithDocket  $gatePassWithDocket
     * @return \Illuminate\Http\Response
     */
    public function edit(GatePassWithDocket $gatePassWithDocket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGatePassWithDocketRequest  $request
     * @param  \App\Models\Operation\GatePassWithDocket  $gatePassWithDocket
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGatePassWithDocketRequest $request, GatePassWithDocket $gatePassWithDocket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\GatePassWithDocket  $gatePassWithDocket
     * @return \Illuminate\Http\Response
     */
    public function destroy(GatePassWithDocket $gatePassWithDocket)
    {
        //
    }
}
