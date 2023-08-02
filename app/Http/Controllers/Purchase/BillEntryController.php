<?php

namespace App\Http\Controllers\Purchase;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBillEntryRequest;
use App\Http\Requests\UpdateBillEntryRequest;
use App\Models\Purchase\BillEntry;

class BillEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Purchase.vendorBillEntry",
        ["title"=>"Vendor -Bill Entry"]);
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
     * @param  \App\Http\Requests\StoreBillEntryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBillEntryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase\BillEntry  $billEntry
     * @return \Illuminate\Http\Response
     */
    public function show(BillEntry $billEntry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase\BillEntry  $billEntry
     * @return \Illuminate\Http\Response
     */
    public function edit(BillEntry $billEntry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBillEntryRequest  $request
     * @param  \App\Models\Purchase\BillEntry  $billEntry
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBillEntryRequest $request, BillEntry $billEntry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase\BillEntry  $billEntry
     * @return \Illuminate\Http\Response
     */
    public function destroy(BillEntry $billEntry)
    {
        //
    }
}
