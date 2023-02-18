<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDocketMasterRequest;
use App\Http\Requests\UpdateDocketMasterRequest;
use App\Models\Operation\DocketMaster;

class DocketMasterController extends Controller
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
     * @param  \App\Http\Requests\StoreDocketMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocketMasterRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\DocketMaster  $docketMaster
     * @return \Illuminate\Http\Response
     */
    public function show(DocketMaster $docketMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\DocketMaster  $docketMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(DocketMaster $docketMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocketMasterRequest  $request
     * @param  \App\Models\Operation\DocketMaster  $docketMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocketMasterRequest $request, DocketMaster $docketMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\DocketMaster  $docketMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocketMaster $docketMaster)
    {
        //
    }
}
