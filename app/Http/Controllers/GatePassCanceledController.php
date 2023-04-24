<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGatePassCanceledRequest;
use App\Http\Requests\UpdateGatePassCanceledRequest;
use App\Models\Operation\GatePassCanceled;

class GatePassCanceledController extends Controller
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
     * @param  \App\Http\Requests\StoreGatePassCanceledRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGatePassCanceledRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\GatePassCanceled  $gatePassCanceled
     * @return \Illuminate\Http\Response
     */
    public function show(GatePassCanceled $gatePassCanceled)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\GatePassCanceled  $gatePassCanceled
     * @return \Illuminate\Http\Response
     */
    public function edit(GatePassCanceled $gatePassCanceled)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGatePassCanceledRequest  $request
     * @param  \App\Models\Operation\GatePassCanceled  $gatePassCanceled
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGatePassCanceledRequest $request, GatePassCanceled $gatePassCanceled)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\GatePassCanceled  $gatePassCanceled
     * @return \Illuminate\Http\Response
     */
    public function destroy(GatePassCanceled $gatePassCanceled)
    {
        //
    }
}
