<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDocketInvoiceDetailsRequest;
use App\Http\Requests\UpdateDocketInvoiceDetailsRequest;
use App\Models\Operation\DocketInvoiceDetails;

class DocketInvoiceDetailsController extends Controller
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
     * @param  \App\Http\Requests\StoreDocketInvoiceDetailsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocketInvoiceDetailsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\DocketInvoiceDetails  $docketInvoiceDetails
     * @return \Illuminate\Http\Response
     */
    public function show(DocketInvoiceDetails $docketInvoiceDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\DocketInvoiceDetails  $docketInvoiceDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(DocketInvoiceDetails $docketInvoiceDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocketInvoiceDetailsRequest  $request
     * @param  \App\Models\Operation\DocketInvoiceDetails  $docketInvoiceDetails
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocketInvoiceDetailsRequest $request, DocketInvoiceDetails $docketInvoiceDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\DocketInvoiceDetails  $docketInvoiceDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocketInvoiceDetails $docketInvoiceDetails)
    {
        //
    }
}
