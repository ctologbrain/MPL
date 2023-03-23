<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTatCalculatorRequest;
use App\Http\Requests\UpdateTatCalculatorRequest;
use App\Models\Operation\TatCalculator;

class TatCalculatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Operation.tatCalculator', [
             'title'=>'TAT CALCULATOR']);
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
     * @param  \App\Http\Requests\StoreTatCalculatorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTatCalculatorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\TatCalculator  $tatCalculator
     * @return \Illuminate\Http\Response
     */
    public function show(TatCalculator $tatCalculator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\TatCalculator  $tatCalculator
     * @return \Illuminate\Http\Response
     */
    public function edit(TatCalculator $tatCalculator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTatCalculatorRequest  $request
     * @param  \App\Models\Operation\TatCalculator  $tatCalculator
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTatCalculatorRequest $request, TatCalculator $tatCalculator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\TatCalculator  $tatCalculator
     * @return \Illuminate\Http\Response
     */
    public function destroy(TatCalculator $tatCalculator)
    {
        //
    }
}
