<?php

namespace App\Http\Controllers\AdminTool;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreHolidayMasterRequest;
use App\Http\Requests\UpdateHolidayMasterRequest;
use App\Models\ToolAdmin\HolidayMaster;

class HolidayMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("AdminTool.holidayMaster",
        ["title" =>"Holiday Master" ]);
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
     * @param  \App\Http\Requests\StoreHolidayMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHolidayMasterRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ToolAdmin\HolidayMaster  $holidayMaster
     * @return \Illuminate\Http\Response
     */
    public function show(HolidayMaster $holidayMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ToolAdmin\HolidayMaster  $holidayMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(HolidayMaster $holidayMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHolidayMasterRequest  $request
     * @param  \App\Models\ToolAdmin\HolidayMaster  $holidayMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHolidayMasterRequest $request, HolidayMaster $holidayMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ToolAdmin\HolidayMaster  $holidayMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(HolidayMaster $holidayMaster)
    {
        //
    }
}
