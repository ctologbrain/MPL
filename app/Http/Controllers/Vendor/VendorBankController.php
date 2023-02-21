<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVendorBankRequest;
use App\Http\Requests\UpdateVendorBankRequest;
use App\Models\Vendor\VendorBank;

class VendorBankController extends Controller
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
     * @param  \App\Http\Requests\StoreVendorBankRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVendorBankRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vendor\VendorBank  $vendorBank
     * @return \Illuminate\Http\Response
     */
    public function show(VendorBank $vendorBank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vendor\VendorBank  $vendorBank
     * @return \Illuminate\Http\Response
     */
    public function edit(VendorBank $vendorBank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVendorBankRequest  $request
     * @param  \App\Models\Vendor\VendorBank  $vendorBank
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVendorBankRequest $request, VendorBank $vendorBank)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendor\VendorBank  $vendorBank
     * @return \Illuminate\Http\Response
     */
    public function destroy(VendorBank $vendorBank)
    {
        //
    }
}
