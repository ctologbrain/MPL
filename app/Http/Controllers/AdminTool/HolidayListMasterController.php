<?php

namespace App\Http\Controllers\AdminTool;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreHolidayListMasterRequest;
use App\Http\Requests\UpdateHolidayListMasterRequest;
use App\Models\ToolAdmin\HolidayListMaster;

class HolidayListMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("AdminTool.holidayMasterList",
        ["title" =>"Holiday Master List" ]);
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
     * @param  \App\Http\Requests\StoreHolidayListMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHolidayListMasterRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ToolAdmin\HolidayListMaster  $holidayListMaster
     * @return \Illuminate\Http\Response
     */
    public function show(HolidayListMaster $holidayListMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ToolAdmin\HolidayListMaster  $holidayListMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(HolidayListMaster $holidayListMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHolidayListMasterRequest  $request
     * @param  \App\Models\ToolAdmin\HolidayListMaster  $holidayListMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHolidayListMasterRequest $request, HolidayListMaster $holidayListMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ToolAdmin\HolidayListMaster  $holidayListMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(HolidayListMaster $holidayListMaster)
    {
        //
    }
}
