<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDocketBookingTypeRequest;
use App\Http\Requests\UpdateDocketBookingTypeRequest;
use App\Models\Operation\DocketBookingType;

class DocketBookingTypeController extends Controller
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
     * @param  \App\Http\Requests\StoreDocketBookingTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocketBookingTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\DocketBookingType  $docketBookingType
     * @return \Illuminate\Http\Response
     */
    public function show(DocketBookingType $docketBookingType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\DocketBookingType  $docketBookingType
     * @return \Illuminate\Http\Response
     */
    public function edit(DocketBookingType $docketBookingType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocketBookingTypeRequest  $request
     * @param  \App\Models\Operation\DocketBookingType  $docketBookingType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocketBookingTypeRequest $request, DocketBookingType $docketBookingType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\DocketBookingType  $docketBookingType
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocketBookingType $docketBookingType)
    {
        //
    }
}
