<?php

namespace App\Http\Controllers;

use App\Models\Account\OfficeCustMapping;
use App\Http\Requests\StoreOfficeCustMappingRequest;
use App\Http\Requests\UpdateOfficeCustMappingRequest;

class OfficeCustMappingController extends Controller
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
     * @param  \App\Http\Requests\StoreOfficeCustMappingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOfficeCustMappingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account\OfficeCustMapping  $officeCustMapping
     * @return \Illuminate\Http\Response
     */
    public function show(OfficeCustMapping $officeCustMapping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account\OfficeCustMapping  $officeCustMapping
     * @return \Illuminate\Http\Response
     */
    public function edit(OfficeCustMapping $officeCustMapping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOfficeCustMappingRequest  $request
     * @param  \App\Models\Account\OfficeCustMapping  $officeCustMapping
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOfficeCustMappingRequest $request, OfficeCustMapping $officeCustMapping)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account\OfficeCustMapping  $officeCustMapping
     * @return \Illuminate\Http\Response
     */
    public function destroy(OfficeCustMapping $officeCustMapping)
    {
        //
    }
}
