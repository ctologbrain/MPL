<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVendorBillingDetailsRequest;
use App\Http\Requests\UpdateVendorBillingDetailsRequest;
use App\Models\Purchase\VendorBillingDetails;

class VendorBillingDetailsController extends Controller
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
     * @param  \App\Http\Requests\StoreVendorBillingDetailsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVendorBillingDetailsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase\VendorBillingDetails  $vendorBillingDetails
     * @return \Illuminate\Http\Response
     */
    public function show(VendorBillingDetails $vendorBillingDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase\VendorBillingDetails  $vendorBillingDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(VendorBillingDetails $vendorBillingDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVendorBillingDetailsRequest  $request
     * @param  \App\Models\Purchase\VendorBillingDetails  $vendorBillingDetails
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVendorBillingDetailsRequest $request, VendorBillingDetails $vendorBillingDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase\VendorBillingDetails  $vendorBillingDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(VendorBillingDetails $vendorBillingDetails)
    {
        //
    }
}
