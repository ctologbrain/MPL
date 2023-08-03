<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDocketProductDetailsRequest;
use App\Http\Requests\UpdateDocketProductDetailsRequest;
use App\Models\Operation\DocketProductDetails;

class DocketProductDetailsController extends Controller
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
     * @param  \App\Http\Requests\StoreDocketProductDetailsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocketProductDetailsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\DocketProductDetails  $docketProductDetails
     * @return \Illuminate\Http\Response
     */
    public function show(DocketProductDetails $docketProductDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\DocketProductDetails  $docketProductDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(DocketProductDetails $docketProductDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocketProductDetailsRequest  $request
     * @param  \App\Models\Operation\DocketProductDetails  $docketProductDetails
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocketProductDetailsRequest $request, DocketProductDetails $docketProductDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\DocketProductDetails  $docketProductDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocketProductDetails $docketProductDetails)
    {
        //
    }
}
