<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVendorDetailsRequest;
use App\Http\Requests\UpdateVendorDetailsRequest;
use App\Models\Vendor\VendorDetails;

class VendorDetailsController extends Controller
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
     * @param  \App\Http\Requests\StoreVendorDetailsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVendorDetailsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vendor\VendorDetails  $vendorDetails
     * @return \Illuminate\Http\Response
     */
    public function show(VendorDetails $vendorDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vendor\VendorDetails  $vendorDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(VendorDetails $vendorDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVendorDetailsRequest  $request
     * @param  \App\Models\Vendor\VendorDetails  $vendorDetails
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVendorDetailsRequest $request, VendorDetails $vendorDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendor\VendorDetails  $vendorDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(VendorDetails $vendorDetails)
    {
        //
    }
}
