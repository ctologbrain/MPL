<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreempPersonalInformationRequest;
use App\Http\Requests\UpdateempPersonalInformationRequest;
use App\Models\OfficeSetup\empPersonalInformation;

class EmpPersonalInformationController extends Controller
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
     * @param  \App\Http\Requests\StoreempPersonalInformationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreempPersonalInformationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OfficeSetup\empPersonalInformation  $empPersonalInformation
     * @return \Illuminate\Http\Response
     */
    public function show(empPersonalInformation $empPersonalInformation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OfficeSetup\empPersonalInformation  $empPersonalInformation
     * @return \Illuminate\Http\Response
     */
    public function edit(empPersonalInformation $empPersonalInformation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateempPersonalInformationRequest  $request
     * @param  \App\Models\OfficeSetup\empPersonalInformation  $empPersonalInformation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateempPersonalInformationRequest $request, empPersonalInformation $empPersonalInformation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OfficeSetup\empPersonalInformation  $empPersonalInformation
     * @return \Illuminate\Http\Response
     */
    public function destroy(empPersonalInformation $empPersonalInformation)
    {
        //
    }
}
