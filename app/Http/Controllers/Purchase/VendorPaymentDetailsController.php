<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVendorPaymentDetailsRequest;
use App\Http\Requests\UpdateVendorPaymentDetailsRequest;
use App\Models\Purchase\VendorPaymentDetails;

class VendorPaymentDetailsController extends Controller
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
     * @param  \App\Http\Requests\StoreVendorPaymentDetailsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVendorPaymentDetailsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase\VendorPaymentDetails  $vendorPaymentDetails
     * @return \Illuminate\Http\Response
     */
    public function show(VendorPaymentDetails $vendorPaymentDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase\VendorPaymentDetails  $vendorPaymentDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(VendorPaymentDetails $vendorPaymentDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVendorPaymentDetailsRequest  $request
     * @param  \App\Models\Purchase\VendorPaymentDetails  $vendorPaymentDetails
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVendorPaymentDetailsRequest $request, VendorPaymentDetails $vendorPaymentDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase\VendorPaymentDetails  $vendorPaymentDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(VendorPaymentDetails $vendorPaymentDetails)
    {
        //
    }
}
