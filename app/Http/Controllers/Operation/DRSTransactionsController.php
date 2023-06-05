<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDRSTransactionsRequest;
use App\Http\Requests\UpdateDRSTransactionsRequest;
use App\Models\Operation\DRSTransactions;

class DRSTransactionsController extends Controller
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
     * @param  \App\Http\Requests\StoreDRSTransactionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDRSTransactionsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\DRSTransactions  $dRSTransactions
     * @return \Illuminate\Http\Response
     */
    public function show(DRSTransactions $dRSTransactions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\DRSTransactions  $dRSTransactions
     * @return \Illuminate\Http\Response
     */
    public function edit(DRSTransactions $dRSTransactions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDRSTransactionsRequest  $request
     * @param  \App\Models\Operation\DRSTransactions  $dRSTransactions
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDRSTransactionsRequest $request, DRSTransactions $dRSTransactions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\DRSTransactions  $dRSTransactions
     * @return \Illuminate\Http\Response
     */
    public function destroy(DRSTransactions $dRSTransactions)
    {
        //
    }
}
