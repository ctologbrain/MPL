<?php

namespace App\Http\Controllers\tooladmin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEditPickupScanRequest;
use App\Http\Requests\UpdateEditPickupScanRequest;
use App\Models\Operation\EditPickupScan;

use App\Models\Operation\PickupScan;
use App\Models\Operation\PickupScanAndDocket;
use App\Models\Vendor\VehicleMaster;
use App\Models\Vendor\VendorMaster;
use App\Models\Vendor\DriverMaster;
use App\Models\Stock\DocketAllocation;
use App\Models\OfficeSetup\employee;
use App\Models\OfficeSetup\OfficeMaster;
use Auth;

class EditPickupScanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $vendor=VendorMaster::get();
        $driver=DriverMaster::get();
        return view('Tooladmin.EditpickupSacn', [
            'title'=>'Edit PICKUP SCAN',
            'vendor'=>$vendor,
            'driver'=>$driver
            
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
     * @param  \App\Http\Requests\StoreEditPickupScanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEditPickupScanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\EditPickupScan  $editPickupScan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req, EditPickupScan $editPickupScan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\EditPickupScan  $editPickupScan
     * @return \Illuminate\Http\Response
     */
    public function edit(EditPickupScan $editPickupScan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEditPickupScanRequest  $request
     * @param  \App\Models\Operation\EditPickupScan  $editPickupScan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEditPickupScanRequest $request, EditPickupScan $editPickupScan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\EditPickupScan  $editPickupScan
     * @return \Illuminate\Http\Response
     */
    public function destroy(EditPickupScan $editPickupScan)
    {
        //
    }
}
