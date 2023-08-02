<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDocketDepositTransRequest;
use App\Http\Requests\UpdateDocketDepositTransRequest;
use App\Models\Operation\DocketDepositTrans;

class DocketDepositTransController extends Controller
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
     * @param  \App\Http\Requests\StoreDocketDepositTransRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocketDepositTransRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\DocketDepositTrans  $docketDepositTrans
     * @return \Illuminate\Http\Response
     */
    public function show(DocketDepositTrans $docketDepositTrans)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\DocketDepositTrans  $docketDepositTrans
     * @return \Illuminate\Http\Response
     */
    public function edit(DocketDepositTrans $docketDepositTrans)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocketDepositTransRequest  $request
     * @param  \App\Models\Operation\DocketDepositTrans  $docketDepositTrans
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocketDepositTransRequest $request, DocketDepositTrans $docketDepositTrans)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\DocketDepositTrans  $docketDepositTrans
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocketDepositTrans $docketDepositTrans)
    {
        //
    }
}
