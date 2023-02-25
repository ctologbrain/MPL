<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTripTypeRequest;
use App\Http\Requests\UpdateTripTypeRequest;
use App\Models\Operation\TripType;

class TripTypeController extends Controller
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
     * @param  \App\Http\Requests\StoreTripTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTripTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\TripType  $tripType
     * @return \Illuminate\Http\Response
     */
    public function show(TripType $tripType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\TripType  $tripType
     * @return \Illuminate\Http\Response
     */
    public function edit(TripType $tripType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTripTypeRequest  $request
     * @param  \App\Models\Operation\TripType  $tripType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTripTypeRequest $request, TripType $tripType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\TripType  $tripType
     * @return \Illuminate\Http\Response
     */
    public function destroy(TripType $tripType)
    {
        //
    }
}
