<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDrsDeliveryTransactionRequest;
use App\Http\Requests\UpdateDrsDeliveryTransactionRequest;
use App\Models\Operation\DrsDeliveryTransaction;

class DrsDeliveryTransactionController extends Controller
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
     * @param  \App\Http\Requests\StoreDrsDeliveryTransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDrsDeliveryTransactionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\DrsDeliveryTransaction  $drsDeliveryTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(DrsDeliveryTransaction $drsDeliveryTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\DrsDeliveryTransaction  $drsDeliveryTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(DrsDeliveryTransaction $drsDeliveryTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDrsDeliveryTransactionRequest  $request
     * @param  \App\Models\Operation\DrsDeliveryTransaction  $drsDeliveryTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDrsDeliveryTransactionRequest $request, DrsDeliveryTransaction $drsDeliveryTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\DrsDeliveryTransaction  $drsDeliveryTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(DrsDeliveryTransaction $drsDeliveryTransaction)
    {
        //
    }
}
