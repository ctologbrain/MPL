<?php

namespace App\Http\Controllers\AdminTool;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDistanceCalculatorRequest;
use App\Http\Requests\UpdateDistanceCalculatorRequest;
use App\Models\ToolAdmin\DistanceCalculator;

class DistanceCalculatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("AdminTool.distanceCalculatorHub",
        ["title" =>"Distance Calculator" ]);
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
     * @param  \App\Http\Requests\StoreDistanceCalculatorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDistanceCalculatorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ToolAdmin\DistanceCalculator  $distanceCalculator
     * @return \Illuminate\Http\Response
     */
    public function show(DistanceCalculator $distanceCalculator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ToolAdmin\DistanceCalculator  $distanceCalculator
     * @return \Illuminate\Http\Response
     */
    public function edit(DistanceCalculator $distanceCalculator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDistanceCalculatorRequest  $request
     * @param  \App\Models\ToolAdmin\DistanceCalculator  $distanceCalculator
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDistanceCalculatorRequest $request, DistanceCalculator $distanceCalculator)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ToolAdmin\DistanceCalculator  $distanceCalculator
     * @return \Illuminate\Http\Response
     */
    public function destroy(DistanceCalculator $distanceCalculator)
    {
        //
    }
}
