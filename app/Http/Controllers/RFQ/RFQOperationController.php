<?php

namespace App\Http\Controllers\RFQ;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRFQOperationRequest;
use App\Http\Requests\UpdateRFQOperationRequest;
use App\Models\RFQ\RFQOperation;

class RFQOperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("RFQ.RFQDashboard",
        ["title" =>"RFQ Dashboard" ]);
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
     * @param  \App\Http\Requests\StoreRFQOperationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRFQOperationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RFQ\RFQOperation  $rFQOperation
     * @return \Illuminate\Http\Response
     */
    public function show(RFQOperation $rFQOperation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RFQ\RFQOperation  $rFQOperation
     * @return \Illuminate\Http\Response
     */
    public function edit(RFQOperation $rFQOperation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRFQOperationRequest  $request
     * @param  \App\Models\RFQ\RFQOperation  $rFQOperation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRFQOperationRequest $request, RFQOperation $rFQOperation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RFQ\RFQOperation  $rFQOperation
     * @return \Illuminate\Http\Response
     */
    public function destroy(RFQOperation $rFQOperation)
    {
        //
    }
}
