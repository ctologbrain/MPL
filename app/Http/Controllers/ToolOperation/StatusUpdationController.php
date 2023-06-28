<?php

namespace App\Http\Controllers\ToolOperation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStatusUpdationRequest;
use App\Http\Requests\UpdateStatusUpdationRequest;
use App\Models\ToolOperation\StatusUpdation;

class StatusUpdationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("ToolOperation.statusUpdation",
        ["title" =>"Status Updation" ]);
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
     * @param  \App\Http\Requests\StoreStatusUpdationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStatusUpdationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ToolOperation\StatusUpdation  $statusUpdation
     * @return \Illuminate\Http\Response
     */
    public function show(StatusUpdation $statusUpdation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ToolOperation\StatusUpdation  $statusUpdation
     * @return \Illuminate\Http\Response
     */
    public function edit(StatusUpdation $statusUpdation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStatusUpdationRequest  $request
     * @param  \App\Models\ToolOperation\StatusUpdation  $statusUpdation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStatusUpdationRequest $request, StatusUpdation $statusUpdation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ToolOperation\StatusUpdation  $statusUpdation
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatusUpdation $statusUpdation)
    {
        //
    }
}
