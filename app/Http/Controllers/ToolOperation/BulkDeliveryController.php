<?php

namespace App\Http\Controllers\ToolOperation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBulkDeliveryRequest;
use App\Http\Requests\UpdateBulkDeliveryRequest;
use App\Models\ToolOperation\BulkDelivery;

class BulkDeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("ToolOperation.bulkDelivery",
        ["title" =>"Bulk Delivery" ]);
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
     * @param  \App\Http\Requests\StoreBulkDeliveryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBulkDeliveryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ToolOperation\BulkDelivery  $bulkDelivery
     * @return \Illuminate\Http\Response
     */
    public function show(BulkDelivery $bulkDelivery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ToolOperation\BulkDelivery  $bulkDelivery
     * @return \Illuminate\Http\Response
     */
    public function edit(BulkDelivery $bulkDelivery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBulkDeliveryRequest  $request
     * @param  \App\Models\ToolOperation\BulkDelivery  $bulkDelivery
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBulkDeliveryRequest $request, BulkDelivery $bulkDelivery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ToolOperation\BulkDelivery  $bulkDelivery
     * @return \Illuminate\Http\Response
     */
    public function destroy(BulkDelivery $bulkDelivery)
    {
        //
    }
}
