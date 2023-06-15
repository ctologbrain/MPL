<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoutePlanningRequest;
use App\Http\Requests\UpdateRoutePlanningRequest;
use App\Models\Operation\RoutePlanning;

class RoutePlanningController extends Controller
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
     * @param  \App\Http\Requests\StoreRoutePlanningRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoutePlanningRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\RoutePlanning  $routePlanning
     * @return \Illuminate\Http\Response
     */
    public function show(RoutePlanning $routePlanning)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\RoutePlanning  $routePlanning
     * @return \Illuminate\Http\Response
     */
    public function edit(RoutePlanning $routePlanning)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoutePlanningRequest  $request
     * @param  \App\Models\Operation\RoutePlanning  $routePlanning
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoutePlanningRequest $request, RoutePlanning $routePlanning)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\RoutePlanning  $routePlanning
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoutePlanning $routePlanning)
    {
        //
    }
}
