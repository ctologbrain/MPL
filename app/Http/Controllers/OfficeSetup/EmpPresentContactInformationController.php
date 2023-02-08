<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreempPresentContactInformationRequest;
use App\Http\Requests\UpdateempPresentContactInformationRequest;
use App\Models\OfficeSetup\empPresentContactInformation;

class EmpPresentContactInformationController extends Controller
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
     * @param  \App\Http\Requests\StoreempPresentContactInformationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreempPresentContactInformationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OfficeSetup\empPresentContactInformation  $empPresentContactInformation
     * @return \Illuminate\Http\Response
     */
    public function show(empPresentContactInformation $empPresentContactInformation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OfficeSetup\empPresentContactInformation  $empPresentContactInformation
     * @return \Illuminate\Http\Response
     */
    public function edit(empPresentContactInformation $empPresentContactInformation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateempPresentContactInformationRequest  $request
     * @param  \App\Models\OfficeSetup\empPresentContactInformation  $empPresentContactInformation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateempPresentContactInformationRequest $request, empPresentContactInformation $empPresentContactInformation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OfficeSetup\empPresentContactInformation  $empPresentContactInformation
     * @return \Illuminate\Http\Response
     */
    public function destroy(empPresentContactInformation $empPresentContactInformation)
    {
        //
    }
}
