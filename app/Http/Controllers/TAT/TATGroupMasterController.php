<?php

namespace App\Http\Controllers\TAT;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTATGroupMasterRequest;
use App\Http\Requests\UpdateTATGroupMasterRequest;
use App\Models\TAT\TATGroupMaster;

class TATGroupMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("TAT.TATGROUPMASTER",
        ["title" =>"TAT GROUP MASTER" ]);
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
     * @param  \App\Http\Requests\StoreTATGroupMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTATGroupMasterRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TAT\TATGroupMaster  $tATGroupMaster
     * @return \Illuminate\Http\Response
     */
    public function show(TATGroupMaster $tATGroupMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TAT\TATGroupMaster  $tATGroupMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(TATGroupMaster $tATGroupMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTATGroupMasterRequest  $request
     * @param  \App\Models\TAT\TATGroupMaster  $tATGroupMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTATGroupMasterRequest $request, TATGroupMaster $tATGroupMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TAT\TATGroupMaster  $tATGroupMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(TATGroupMaster $tATGroupMaster)
    {
        //
    }
}
