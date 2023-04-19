<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKeyOfficeRequest;
use App\Http\Requests\UpdateKeyOfficeRequest;
use App\Models\OfficeSetup\KeyOffice;

class KeyOfficeController extends Controller
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
     * @param  \App\Http\Requests\StoreKeyOfficeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKeyOfficeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OfficeSetup\KeyOffice  $keyOffice
     * @return \Illuminate\Http\Response
     */
    public function show(KeyOffice $keyOffice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OfficeSetup\KeyOffice  $keyOffice
     * @return \Illuminate\Http\Response
     */
    public function edit(KeyOffice $keyOffice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKeyOfficeRequest  $request
     * @param  \App\Models\OfficeSetup\KeyOffice  $keyOffice
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKeyOfficeRequest $request, KeyOffice $keyOffice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OfficeSetup\KeyOffice  $keyOffice
     * @return \Illuminate\Http\Response
     */
    public function destroy(KeyOffice $keyOffice)
    {
        //
    }
}
