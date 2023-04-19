<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorekeyVendorRequest;
use App\Http\Requests\UpdatekeyVendorRequest;
use App\Models\Vendor\keyVendor;

class KeyVendorController extends Controller
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
     * @param  \App\Http\Requests\StorekeyVendorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorekeyVendorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vendor\keyVendor  $keyVendor
     * @return \Illuminate\Http\Response
     */
    public function show(keyVendor $keyVendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vendor\keyVendor  $keyVendor
     * @return \Illuminate\Http\Response
     */
    public function edit(keyVendor $keyVendor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatekeyVendorRequest  $request
     * @param  \App\Models\Vendor\keyVendor  $keyVendor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatekeyVendorRequest $request, keyVendor $keyVendor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendor\keyVendor  $keyVendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(keyVendor $keyVendor)
    {
        //
    }
}
