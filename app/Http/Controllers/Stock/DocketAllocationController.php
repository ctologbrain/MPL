<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDocketAllocationRequest;
use App\Http\Requests\UpdateDocketAllocationRequest;
use App\Models\Stock\DocketAllocation;

class DocketAllocationController extends Controller
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
     * @param  \App\Http\Requests\StoreDocketAllocationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocketAllocationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock\DocketAllocation  $docketAllocation
     * @return \Illuminate\Http\Response
     */
    public function show(DocketAllocation $docketAllocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock\DocketAllocation  $docketAllocation
     * @return \Illuminate\Http\Response
     */
    public function edit(DocketAllocation $docketAllocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocketAllocationRequest  $request
     * @param  \App\Models\Stock\DocketAllocation  $docketAllocation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocketAllocationRequest $request, DocketAllocation $docketAllocation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock\DocketAllocation  $docketAllocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocketAllocation $docketAllocation)
    {
        //
    }
}
