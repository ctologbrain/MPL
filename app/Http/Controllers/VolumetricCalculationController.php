<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVolumetricCalculationRequest;
use App\Http\Requests\UpdateVolumetricCalculationRequest;
use App\Models\Operation\VolumetricCalculation;

class VolumetricCalculationController extends Controller
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
     * @param  \App\Http\Requests\StoreVolumetricCalculationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVolumetricCalculationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\VolumetricCalculation  $volumetricCalculation
     * @return \Illuminate\Http\Response
     */
    public function show(VolumetricCalculation $volumetricCalculation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\VolumetricCalculation  $volumetricCalculation
     * @return \Illuminate\Http\Response
     */
    public function edit(VolumetricCalculation $volumetricCalculation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVolumetricCalculationRequest  $request
     * @param  \App\Models\Operation\VolumetricCalculation  $volumetricCalculation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVolumetricCalculationRequest $request, VolumetricCalculation $volumetricCalculation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\VolumetricCalculation  $volumetricCalculation
     * @return \Illuminate\Http\Response
     */
    public function destroy(VolumetricCalculation $volumetricCalculation)
    {
        //
    }
}
