<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDocketOriginDestRequest;
use App\Http\Requests\UpdateDocketOriginDestRequest;
use App\Models\Account\DocketOriginDest;

class DocketOriginDestController extends Controller
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
     * @param  \App\Http\Requests\StoreDocketOriginDestRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocketOriginDestRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account\DocketOriginDest  $docketOriginDest
     * @return \Illuminate\Http\Response
     */
    public function show(DocketOriginDest $docketOriginDest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account\DocketOriginDest  $docketOriginDest
     * @return \Illuminate\Http\Response
     */
    public function edit(DocketOriginDest $docketOriginDest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocketOriginDestRequest  $request
     * @param  \App\Models\Account\DocketOriginDest  $docketOriginDest
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocketOriginDestRequest $request, DocketOriginDest $docketOriginDest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account\DocketOriginDest  $docketOriginDest
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocketOriginDest $docketOriginDest)
    {
        //
    }
}
