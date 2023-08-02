<?php

namespace App\Http\Controllers\Cash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreExpenceLedgerRequest;
use App\Http\Requests\UpdateExpenceLedgerRequest;
use App\Models\Cash\ExpenceLedger;

class ExpenceLedgerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  view("Cash.expenseLedger",[
            "title" => "Expense Ledger"
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
     * @param  \App\Http\Requests\StoreExpenceLedgerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExpenceLedgerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cash\ExpenceLedger  $expenceLedger
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenceLedger $expenceLedger)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cash\ExpenceLedger  $expenceLedger
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpenceLedger $expenceLedger)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExpenceLedgerRequest  $request
     * @param  \App\Models\Cash\ExpenceLedger  $expenceLedger
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExpenceLedgerRequest $request, ExpenceLedger $expenceLedger)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cash\ExpenceLedger  $expenceLedger
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpenceLedger $expenceLedger)
    {
        //
    }
}
