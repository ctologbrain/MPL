<?php

namespace App\Http\Controllers\TAT;

use App\Http\Requests\StoreTATDefineingMasterRequest;
use App\Http\Requests\UpdateTATDefineingMasterRequest;
use App\Models\TAT\TATDefineingMaster;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class TATDefineingMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("TAT.TATDEFINEINGMASTER",
        ["title" =>"TAT DEFINEING MASTER" ]);
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
     * @param  \App\Http\Requests\StoreTATDefineingMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTATDefineingMasterRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TAT\TATDefineingMaster  $tATDefineingMaster
     * @return \Illuminate\Http\Response
     */
    public function show(TATDefineingMaster $tATDefineingMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TAT\TATDefineingMaster  $tATDefineingMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(TATDefineingMaster $tATDefineingMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTATDefineingMasterRequest  $request
     * @param  \App\Models\TAT\TATDefineingMaster  $tATDefineingMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTATDefineingMasterRequest $request, TATDefineingMaster $tATDefineingMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TAT\TATDefineingMaster  $tATDefineingMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(TATDefineingMaster $tATDefineingMaster)
    {
        //
    }
}
