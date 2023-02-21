<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDocketSeriesMasterRequest;
use App\Http\Requests\UpdateDocketSeriesMasterRequest;
use App\Models\Stock\DocketSeriesMaster;

class DocketSeriesMasterController extends Controller
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
     * @param  \App\Http\Requests\StoreDocketSeriesMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocketSeriesMasterRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock\DocketSeriesMaster  $docketSeriesMaster
     * @return \Illuminate\Http\Response
     */
    public function show(DocketSeriesMaster $docketSeriesMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock\DocketSeriesMaster  $docketSeriesMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(DocketSeriesMaster $docketSeriesMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocketSeriesMasterRequest  $request
     * @param  \App\Models\Stock\DocketSeriesMaster  $docketSeriesMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocketSeriesMasterRequest $request, DocketSeriesMaster $docketSeriesMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock\DocketSeriesMaster  $docketSeriesMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocketSeriesMaster $docketSeriesMaster)
    {
        //
    }
}
