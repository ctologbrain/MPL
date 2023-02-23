<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDocketProductRequest;
use App\Http\Requests\UpdateDocketProductRequest;
use App\Models\Operation\DocketProduct;

class DocketProductController extends Controller
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
     * @param  \App\Http\Requests\StoreDocketProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocketProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\DocketProduct  $docketProduct
     * @return \Illuminate\Http\Response
     */
    public function show(DocketProduct $docketProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\DocketProduct  $docketProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(DocketProduct $docketProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocketProductRequest  $request
     * @param  \App\Models\Operation\DocketProduct  $docketProduct
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocketProductRequest $request, DocketProduct $docketProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\DocketProduct  $docketProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocketProduct $docketProduct)
    {
        //
    }
}
