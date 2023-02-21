<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDocketStatusRequest;
use App\Http\Requests\UpdateDocketStatusRequest;
use App\Models\Stock\DocketStatus;

class DocketStatusController extends Controller
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
     * @param  \App\Http\Requests\StoreDocketStatusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocketStatusRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock\DocketStatus  $docketStatus
     * @return \Illuminate\Http\Response
     */
    public function show(DocketStatus $docketStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock\DocketStatus  $docketStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(DocketStatus $docketStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocketStatusRequest  $request
     * @param  \App\Models\Stock\DocketStatus  $docketStatus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocketStatusRequest $request, DocketStatus $docketStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock\DocketStatus  $docketStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocketStatus $docketStatus)
    {
        //
    }
}
