<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegularDeliveryRequest;
use App\Http\Requests\UpdateRegularDeliveryRequest;
use App\Models\Operation\RegularDelivery;

class RegularDeliveryController extends Controller
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
     * @param  \App\Http\Requests\StoreRegularDeliveryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRegularDeliveryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\RegularDelivery  $regularDelivery
     * @return \Illuminate\Http\Response
     */
    public function show(RegularDelivery $regularDelivery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\RegularDelivery  $regularDelivery
     * @return \Illuminate\Http\Response
     */
    public function edit(RegularDelivery $regularDelivery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRegularDeliveryRequest  $request
     * @param  \App\Models\Operation\RegularDelivery  $regularDelivery
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRegularDeliveryRequest $request, RegularDelivery $regularDelivery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\RegularDelivery  $regularDelivery
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegularDelivery $regularDelivery)
    {
        //
    }
}
