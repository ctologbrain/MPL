<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingModeRequest;
use App\Http\Requests\UpdateBookingModeRequest;
use App\Models\Operation\BookingMode;

class BookingModeController extends Controller
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
     * @param  \App\Http\Requests\StoreBookingModeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookingModeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\BookingMode  $bookingMode
     * @return \Illuminate\Http\Response
     */
    public function show(BookingMode $bookingMode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\BookingMode  $bookingMode
     * @return \Illuminate\Http\Response
     */
    public function edit(BookingMode $bookingMode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookingModeRequest  $request
     * @param  \App\Models\Operation\BookingMode  $bookingMode
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookingModeRequest $request, BookingMode $bookingMode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\BookingMode  $bookingMode
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookingMode $bookingMode)
    {
        //
    }
}
