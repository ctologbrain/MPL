<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePackingMethodRequest;
use App\Http\Requests\UpdatePackingMethodRequest;
use App\Models\Operation\PackingMethod;

class PackingMethodController extends Controller
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
     * @param  \App\Http\Requests\StorePackingMethodRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePackingMethodRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\PackingMethod  $packingMethod
     * @return \Illuminate\Http\Response
     */
    public function show(PackingMethod $packingMethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\PackingMethod  $packingMethod
     * @return \Illuminate\Http\Response
     */
    public function edit(PackingMethod $packingMethod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePackingMethodRequest  $request
     * @param  \App\Models\Operation\PackingMethod  $packingMethod
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePackingMethodRequest $request, PackingMethod $packingMethod)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\PackingMethod  $packingMethod
     * @return \Illuminate\Http\Response
     */
    public function destroy(PackingMethod $packingMethod)
    {
        //
    }
}
