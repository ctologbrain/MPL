<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDocketCategoryRequest;
use App\Http\Requests\UpdateDocketCategoryRequest;
use App\Models\Stock\DocketCategory;

class DocketCategoryController extends Controller
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
     * @param  \App\Http\Requests\StoreDocketCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocketCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock\DocketCategory  $docketCategory
     * @return \Illuminate\Http\Response
     */
    public function show(DocketCategory $docketCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock\DocketCategory  $docketCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(DocketCategory $docketCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocketCategoryRequest  $request
     * @param  \App\Models\Stock\DocketCategory  $docketCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocketCategoryRequest $request, DocketCategory $docketCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock\DocketCategory  $docketCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocketCategory $docketCategory)
    {
        //
    }
}
