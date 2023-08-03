<?php

namespace App\Http\Controllers\Purchase;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreVendorDocketMappingRequest;
use App\Http\Requests\UpdateVendorDocketMappingRequest;
use App\Models\Purchase\VendorDocketMapping;

class VendorDocketMappingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Purchase.vendorDocketMapping",
        ["title"=>"Vendor Docket Mapping"]);
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
     * @param  \App\Http\Requests\StoreVendorDocketMappingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVendorDocketMappingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase\VendorDocketMapping  $vendorDocketMapping
     * @return \Illuminate\Http\Response
     */
    public function show(VendorDocketMapping $vendorDocketMapping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase\VendorDocketMapping  $vendorDocketMapping
     * @return \Illuminate\Http\Response
     */
    public function edit(VendorDocketMapping $vendorDocketMapping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVendorDocketMappingRequest  $request
     * @param  \App\Models\Purchase\VendorDocketMapping  $vendorDocketMapping
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVendorDocketMappingRequest $request, VendorDocketMapping $vendorDocketMapping)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase\VendorDocketMapping  $vendorDocketMapping
     * @return \Illuminate\Http\Response
     */
    public function destroy(VendorDocketMapping $vendorDocketMapping)
    {
        //
    }
}
