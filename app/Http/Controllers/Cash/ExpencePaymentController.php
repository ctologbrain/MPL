<?php

namespace App\Http\Controllers\Cash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreExpencePaymentRequest;
use App\Http\Requests\UpdateExpencePaymentRequest;
use App\Models\Cash\ExpencePayment;

class ExpencePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  view("Cash.expensePayment",[
            "title" => "Expense Payment"
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
     * @param  \App\Http\Requests\StoreExpencePaymentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExpencePaymentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cash\ExpencePayment  $expencePayment
     * @return \Illuminate\Http\Response
     */
    public function show(ExpencePayment $expencePayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cash\ExpencePayment  $expencePayment
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpencePayment $expencePayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExpencePaymentRequest  $request
     * @param  \App\Models\Cash\ExpencePayment  $expencePayment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExpencePaymentRequest $request, ExpencePayment $expencePayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cash\ExpencePayment  $expencePayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpencePayment $expencePayment)
    {
        //
    }
}
