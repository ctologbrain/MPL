<?php

namespace App\Http\Controllers\ToolOperation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBulkBookingRequest;
use App\Http\Requests\UpdateBulkBookingRequest;
use App\Models\ToolOperation\BulkBooking;

class BulkBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("ToolOperation.bulkbooking",
        ["title" =>"Bulk Booking" ]);
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
     * @param  \App\Http\Requests\StoreBulkBookingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBulkBookingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ToolOperation\BulkBooking  $bulkBooking
     * @return \Illuminate\Http\Response
     */
    public function show(BulkBooking $bulkBooking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ToolOperation\BulkBooking  $bulkBooking
     * @return \Illuminate\Http\Response
     */
    public function edit(BulkBooking $bulkBooking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBulkBookingRequest  $request
     * @param  \App\Models\ToolOperation\BulkBooking  $bulkBooking
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBulkBookingRequest $request, BulkBooking $bulkBooking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ToolOperation\BulkBooking  $bulkBooking
     * @return \Illuminate\Http\Response
     */
    public function destroy(BulkBooking $bulkBooking)
    {
        //
    }
}
