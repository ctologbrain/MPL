<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDevileryTypeRequest;
use App\Http\Requests\UpdateDevileryTypeRequest;
use App\Models\Operation\DevileryType;

class DevileryTypeController extends Controller
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
     * @param  \App\Http\Requests\StoreDevileryTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDevileryTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\DevileryType  $devileryType
     * @return \Illuminate\Http\Response
     */
    public function show(DevileryType $devileryType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\DevileryType  $devileryType
     * @return \Illuminate\Http\Response
     */
    public function edit(DevileryType $devileryType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDevileryTypeRequest  $request
     * @param  \App\Models\Operation\DevileryType  $devileryType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDevileryTypeRequest $request, DevileryType $devileryType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\DevileryType  $devileryType
     * @return \Illuminate\Http\Response
     */
    public function destroy(DevileryType $devileryType)
    {
        //
    }
}
