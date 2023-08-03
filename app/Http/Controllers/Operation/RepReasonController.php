<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRepReasonRequest;
use App\Http\Requests\UpdateRepReasonRequest;
use App\Models\Operation\RepReason;

class RepReasonController extends Controller
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
     * @param  \App\Http\Requests\StoreRepReasonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRepReasonRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\RepReason  $repReason
     * @return \Illuminate\Http\Response
     */
    public function show(RepReason $repReason)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\RepReason  $repReason
     * @return \Illuminate\Http\Response
     */
    public function edit(RepReason $repReason)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRepReasonRequest  $request
     * @param  \App\Models\Operation\RepReason  $repReason
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRepReasonRequest $request, RepReason $repReason)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\RepReason  $repReason
     * @return \Illuminate\Http\Response
     */
    public function destroy(RepReason $repReason)
    {
        //
    }
}
