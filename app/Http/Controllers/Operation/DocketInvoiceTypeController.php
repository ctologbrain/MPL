<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDocketInvoiceTypeRequest;
use App\Http\Requests\UpdateDocketInvoiceTypeRequest;
use App\Models\Operation\DocketInvoiceType;

class DocketInvoiceTypeController extends Controller
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
     * @param  \App\Http\Requests\StoreDocketInvoiceTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocketInvoiceTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\DocketInvoiceType  $docketInvoiceType
     * @return \Illuminate\Http\Response
     */
    public function show(DocketInvoiceType $docketInvoiceType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\DocketInvoiceType  $docketInvoiceType
     * @return \Illuminate\Http\Response
     */
    public function edit(DocketInvoiceType $docketInvoiceType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocketInvoiceTypeRequest  $request
     * @param  \App\Models\Operation\DocketInvoiceType  $docketInvoiceType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocketInvoiceTypeRequest $request, DocketInvoiceType $docketInvoiceType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\DocketInvoiceType  $docketInvoiceType
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocketInvoiceType $docketInvoiceType)
    {
        //
    }
}
