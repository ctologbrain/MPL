<?php

namespace App\Http\Controllers\Purchase;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreVendorTariffRequest;
use App\Http\Requests\UpdateVendorTariffRequest;
use App\Models\Purchase\VendorTariff;

class VendorTariffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Purchase.3PLVendorTariff",
        ["title"=>"3PL Vendor Tariff"]);
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
     * @param  \App\Http\Requests\StoreVendorTariffRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVendorTariffRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase\VendorTariff  $vendorTariff
     * @return \Illuminate\Http\Response
     */
    public function show(VendorTariff $vendorTariff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase\VendorTariff  $vendorTariff
     * @return \Illuminate\Http\Response
     */
    public function edit(VendorTariff $vendorTariff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVendorTariffRequest  $request
     * @param  \App\Models\Purchase\VendorTariff  $vendorTariff
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVendorTariffRequest $request, VendorTariff $vendorTariff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase\VendorTariff  $vendorTariff
     * @return \Illuminate\Http\Response
     */
    public function destroy(VendorTariff $vendorTariff)
    {
        //
    }
}
