<?php
namespace App\Http\Controllers\Operation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePickupScanAndDocketRequest;
use App\Http\Requests\UpdatePickupScanAndDocketRequest;
use App\Models\Operation\PickupScanAndDocket;

class PickupScanAndDocketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Operation.pickupSacnReport', [
            'title'=>'PICKUP SCAN',
            
            
            
        ]);
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
     * @param  \App\Http\Requests\StorePickupScanAndDocketRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePickupScanAndDocketRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\PickupScanAndDocket  $pickupScanAndDocket
     * @return \Illuminate\Http\Response
     */
    public function show(PickupScanAndDocket $pickupScanAndDocket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\PickupScanAndDocket  $pickupScanAndDocket
     * @return \Illuminate\Http\Response
     */
    public function edit(PickupScanAndDocket $pickupScanAndDocket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePickupScanAndDocketRequest  $request
     * @param  \App\Models\Operation\PickupScanAndDocket  $pickupScanAndDocket
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePickupScanAndDocketRequest $request, PickupScanAndDocket $pickupScanAndDocket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\PickupScanAndDocket  $pickupScanAndDocket
     * @return \Illuminate\Http\Response
     */
    public function destroy(PickupScanAndDocket $pickupScanAndDocket)
    {
        //
    }
}
