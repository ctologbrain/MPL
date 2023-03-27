<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVehicleReplacementRequest;
use App\Http\Requests\UpdateVehicleReplacementRequest;
use App\Models\Operation\VehicleReplacement;

class VehicleReplacementController extends Controller
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
     * @param  \App\Http\Requests\StoreVehicleReplacementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVehicleReplacementRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\VehicleReplacement  $vehicleReplacement
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleReplacement $vehicleReplacement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\VehicleReplacement  $vehicleReplacement
     * @return \Illuminate\Http\Response
     */
    public function edit(VehicleReplacement $vehicleReplacement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVehicleReplacementRequest  $request
     * @param  \App\Models\Operation\VehicleReplacement  $vehicleReplacement
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVehicleReplacementRequest $request, VehicleReplacement $vehicleReplacement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\VehicleReplacement  $vehicleReplacement
     * @return \Illuminate\Http\Response
     */
    public function destroy(VehicleReplacement $vehicleReplacement)
    {
        //
    }
}
