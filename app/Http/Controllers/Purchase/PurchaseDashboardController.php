<?php

namespace App\Http\Controllers\Purchase;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePurchaseDashboardRequest;
use App\Http\Requests\UpdatePurchaseDashboardRequest;
use App\Models\Purchase\PurchaseDashboard;

class PurchaseDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('Purchase.PurchaseDashboard', [
            'title'=>'CASH BOOKING',
          
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
     * @param  \App\Http\Requests\StorePurchaseDashboardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePurchaseDashboardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase\PurchaseDashboard  $purchaseDashboard
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseDashboard $purchaseDashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase\PurchaseDashboard  $purchaseDashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(PurchaseDashboard $purchaseDashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePurchaseDashboardRequest  $request
     * @param  \App\Models\Purchase\PurchaseDashboard  $purchaseDashboard
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePurchaseDashboardRequest $request, PurchaseDashboard $purchaseDashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase\PurchaseDashboard  $purchaseDashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseDashboard $purchaseDashboard)
    {
        //
    }
}
