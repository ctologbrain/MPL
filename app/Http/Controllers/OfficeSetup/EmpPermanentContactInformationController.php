<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreempPermanentContactInformationRequest;
use App\Http\Requests\UpdateempPermanentContactInformationRequest;
use App\Models\OfficeSetup\empPermanentContactInformation;

class EmpPermanentContactInformationController extends Controller
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
     * @param  \App\Http\Requests\StoreempPermanentContactInformationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreempPermanentContactInformationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OfficeSetup\empPermanentContactInformation  $empPermanentContactInformation
     * @return \Illuminate\Http\Response
     */
    public function show(empPermanentContactInformation $empPermanentContactInformation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OfficeSetup\empPermanentContactInformation  $empPermanentContactInformation
     * @return \Illuminate\Http\Response
     */
    public function edit(empPermanentContactInformation $empPermanentContactInformation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateempPermanentContactInformationRequest  $request
     * @param  \App\Models\OfficeSetup\empPermanentContactInformation  $empPermanentContactInformation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateempPermanentContactInformationRequest $request, empPermanentContactInformation $empPermanentContactInformation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OfficeSetup\empPermanentContactInformation  $empPermanentContactInformation
     * @return \Illuminate\Http\Response
     */
    public function destroy(empPermanentContactInformation $empPermanentContactInformation)
    {
        //
    }
}
