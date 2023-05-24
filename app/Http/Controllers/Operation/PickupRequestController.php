<?php

namespace App\Http\Controllers\Operation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePickupRequestRequest;
use App\Http\Requests\UpdatePickupRequestRequest;
use App\Models\Operation\PickupRequest;
use Auth;

class PickupRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Operation.PickupRequest', [
            'title'=>'Pickup Request']);
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
     * @param  \App\Http\Requests\StorePickupRequestRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePickupRequestRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\PickupRequest  $pickupRequest
     * @return \Illuminate\Http\Response
     */
    public function show(PickupRequest $pickupRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\PickupRequest  $pickupRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(PickupRequest $pickupRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePickupRequestRequest  $request
     * @param  \App\Models\Operation\PickupRequest  $pickupRequest
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePickupRequestRequest $request, PickupRequest $pickupRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\PickupRequest  $pickupRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(PickupRequest $pickupRequest)
    {
        //
    }
}
