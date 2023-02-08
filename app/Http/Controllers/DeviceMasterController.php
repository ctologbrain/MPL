<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDeviceMasterRequest;
use App\Http\Requests\UpdateDeviceMasterRequest;
use App\Models\OfficeSetup\DeviceMaster;

class DeviceMasterController extends Controller
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
     * @param  \App\Http\Requests\StoreDeviceMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeviceMasterRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OfficeSetup\DeviceMaster  $deviceMaster
     * @return \Illuminate\Http\Response
     */
    public function show(DeviceMaster $deviceMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OfficeSetup\DeviceMaster  $deviceMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(DeviceMaster $deviceMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDeviceMasterRequest  $request
     * @param  \App\Models\OfficeSetup\DeviceMaster  $deviceMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeviceMasterRequest $request, DeviceMaster $deviceMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OfficeSetup\DeviceMaster  $deviceMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeviceMaster $deviceMaster)
    {
        //
    }
}
