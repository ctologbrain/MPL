<?php
namespace App\Http\Controllers\Reports;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreCustomeReportsRequest;
use App\Http\Requests\UpdateCustomeReportsRequest;
use App\Models\Reports\CustomeReports;

class CustomeReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo 'sachion';
        die;
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
     * @param  \App\Http\Requests\StoreCustomeReportsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomeReportsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reports\CustomeReports  $customeReports
     * @return \Illuminate\Http\Response
     */
    public function show(CustomeReports $customeReports)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reports\CustomeReports  $customeReports
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomeReports $customeReports)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomeReportsRequest  $request
     * @param  \App\Models\Reports\CustomeReports  $customeReports
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomeReportsRequest $request, CustomeReports $customeReports)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reports\CustomeReports  $customeReports
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomeReports $customeReports)
    {
        //
    }
}
