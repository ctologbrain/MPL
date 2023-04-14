<?php

namespace App\Http\Controllers\Account;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerInvoiceRequest;
use App\Http\Requests\UpdateCustomerInvoiceRequest;
use App\Models\Account\CustomerInvoice;
use App\Models\Operation\DocketBookingType;
use Illuminate\Http\Request;
use Auth;
/**
 * Summary of CustomerInvoiceController
 */
class CustomerInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $DocketBookingType=DocketBookingType::get();
        return view('Account.customerinvoice', [
              'title'=>'CUSTOMER INVOICE',
              'DocketBookingType'=>$DocketBookingType,
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
     * @param  \App\Http\Requests\StoreCustomerInvoiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerInvoiceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account\CustomerInvoice  $customerInvoice
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerInvoice $customerInvoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account\CustomerInvoice  $customerInvoice
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerInvoice $customerInvoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerInvoiceRequest  $request
     * @param  \App\Models\Account\CustomerInvoice  $customerInvoice
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerInvoiceRequest $request, CustomerInvoice $customerInvoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account\CustomerInvoice  $customerInvoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerInvoice $customerInvoice)
    {
        //
    }
}
