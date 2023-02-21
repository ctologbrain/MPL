<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerPaymentRequest;
use App\Http\Requests\UpdateCustomerPaymentRequest;
use App\Models\Account\CustomerPayment;

class CustomerPaymentController extends Controller
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
     * @param  \App\Http\Requests\StoreCustomerPaymentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerPaymentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account\CustomerPayment  $customerPayment
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerPayment $customerPayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account\CustomerPayment  $customerPayment
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerPayment $customerPayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerPaymentRequest  $request
     * @param  \App\Models\Account\CustomerPayment  $customerPayment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerPaymentRequest $request, CustomerPayment $customerPayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account\CustomerPayment  $customerPayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerPayment $customerPayment)
    {
        //
    }
}
