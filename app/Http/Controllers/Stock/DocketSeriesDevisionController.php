<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDocketSeriesDevisionRequest;
use App\Http\Requests\UpdateDocketSeriesDevisionRequest;
use App\Models\Stock\DocketSeriesDevision;

class DocketSeriesDevisionController extends Controller
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
     * @param  \App\Http\Requests\StoreDocketSeriesDevisionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocketSeriesDevisionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock\DocketSeriesDevision  $docketSeriesDevision
     * @return \Illuminate\Http\Response
     */
    public function show(DocketSeriesDevision $docketSeriesDevision)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock\DocketSeriesDevision  $docketSeriesDevision
     * @return \Illuminate\Http\Response
     */
    public function edit(DocketSeriesDevision $docketSeriesDevision)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocketSeriesDevisionRequest  $request
     * @param  \App\Models\Stock\DocketSeriesDevision  $docketSeriesDevision
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocketSeriesDevisionRequest $request, DocketSeriesDevision $docketSeriesDevision)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock\DocketSeriesDevision  $docketSeriesDevision
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocketSeriesDevision $docketSeriesDevision)
    {
        //
    }
}
