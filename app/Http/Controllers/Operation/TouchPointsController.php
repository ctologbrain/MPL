<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTouchPointsRequest;
use App\Http\Requests\UpdateTouchPointsRequest;
use App\Models\Operation\TouchPoints;

class TouchPointsController extends Controller
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
     * @param  \App\Http\Requests\StoreTouchPointsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTouchPointsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\TouchPoints  $touchPoints
     * @return \Illuminate\Http\Response
     */
    public function show(TouchPoints $touchPoints)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\TouchPoints  $touchPoints
     * @return \Illuminate\Http\Response
     */
    public function edit(TouchPoints $touchPoints)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTouchPointsRequest  $request
     * @param  \App\Models\Operation\TouchPoints  $touchPoints
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTouchPointsRequest $request, TouchPoints $touchPoints)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\TouchPoints  $touchPoints
     * @return \Illuminate\Http\Response
     */
    public function destroy(TouchPoints $touchPoints)
    {
        //
    }
}
