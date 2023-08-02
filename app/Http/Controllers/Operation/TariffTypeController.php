<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTariffTypeRequest;
use App\Http\Requests\UpdateTariffTypeRequest;
use App\Models\Operation\TariffType;

class TariffTypeController extends Controller
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
     * @param  \App\Http\Requests\StoreTariffTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTariffTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\TariffType  $tariffType
     * @return \Illuminate\Http\Response
     */
    public function show(TariffType $tariffType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\TariffType  $tariffType
     * @return \Illuminate\Http\Response
     */
    public function edit(TariffType $tariffType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTariffTypeRequest  $request
     * @param  \App\Models\Operation\TariffType  $tariffType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTariffTypeRequest $request, TariffType $tariffType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\TariffType  $tariffType
     * @return \Illuminate\Http\Response
     */
    public function destroy(TariffType $tariffType)
    {
        //
    }
}
