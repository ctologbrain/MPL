<?php

namespace App\Http\Controllers\Cash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreexpenseCancelRequest;
use App\Http\Requests\UpdateexpenseCancelRequest;
use App\Models\Cash\expenseCancel;

class ExpenseCancelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return  view("Cash.expenseCancel",[
          "title" => "Expense Cancel"
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
     * @param  \App\Http\Requests\StoreexpenseCancelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreexpenseCancelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cash\expenseCancel  $expenseCancel
     * @return \Illuminate\Http\Response
     */
    public function show(expenseCancel $expenseCancel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cash\expenseCancel  $expenseCancel
     * @return \Illuminate\Http\Response
     */
    public function edit(expenseCancel $expenseCancel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateexpenseCancelRequest  $request
     * @param  \App\Models\Cash\expenseCancel  $expenseCancel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateexpenseCancelRequest $request, expenseCancel $expenseCancel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cash\expenseCancel  $expenseCancel
     * @return \Illuminate\Http\Response
     */
    public function destroy(expenseCancel $expenseCancel)
    {
        //
    }
}
