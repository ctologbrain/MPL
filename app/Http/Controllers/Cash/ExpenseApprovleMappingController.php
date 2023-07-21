<?php

namespace App\Http\Controllers\Cash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreexpenseApprovleMappingRequest;
use App\Http\Requests\UpdateexpenseApprovleMappingRequest;
use App\Models\Cash\expenseApprovleMapping;

class ExpenseApprovleMappingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  view("Cash.cashExpenseBudget",[
            "title" => "Expense Budget"
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
     * @param  \App\Http\Requests\StoreexpenseApprovleMappingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreexpenseApprovleMappingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cash\expenseApprovleMapping  $expenseApprovleMapping
     * @return \Illuminate\Http\Response
     */
    public function show(expenseApprovleMapping $expenseApprovleMapping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cash\expenseApprovleMapping  $expenseApprovleMapping
     * @return \Illuminate\Http\Response
     */
    public function edit(expenseApprovleMapping $expenseApprovleMapping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateexpenseApprovleMappingRequest  $request
     * @param  \App\Models\Cash\expenseApprovleMapping  $expenseApprovleMapping
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateexpenseApprovleMappingRequest $request, expenseApprovleMapping $expenseApprovleMapping)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cash\expenseApprovleMapping  $expenseApprovleMapping
     * @return \Illuminate\Http\Response
     */
    public function destroy(expenseApprovleMapping $expenseApprovleMapping)
    {
        //
    }


    public function ApprovalMapping(){
        
    }
}
