<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDocketCaseRequest;
use App\Http\Requests\UpdateDocketCaseRequest;
use App\Models\Operation\DocketCase;

class DocketCaseController extends Controller
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
     * @param  \App\Http\Requests\StoreDocketCaseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocketCaseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\DocketCase  $docketCase
     * @return \Illuminate\Http\Response
     */
    public function show(DocketCase $docketCase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\DocketCase  $docketCase
     * @return \Illuminate\Http\Response
     */
    public function edit(DocketCase $docketCase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocketCaseRequest  $request
     * @param  \App\Models\Operation\DocketCase  $docketCase
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocketCaseRequest $request, DocketCase $docketCase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\DocketCase  $docketCase
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocketCase $docketCase)
    {
        //
    }
}
