<?php

namespace App\Http\Controllers\Operation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGatePassWithDocketRequest;
use App\Http\Requests\UpdateGatePassWithDocketRequest;
use App\Models\Operation\GatePassWithDocket;

class GatePassWithDocketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreGatePassWithDocketRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGatePassWithDocketRequest $request)
    {
        GatePassWithDocket::insert(['Docket'=>$request->Docket,'GatePassId' => $request->id]);
        $getGatePass=GatePassWithDocket::where('GatePassId',$request->id)->get();
        $html='';
        $html.='<table class="table-responsive table-bordered"><thead><tr class="main-title text-dark"><th>Docket</th><tr></thead><tbody>';
        foreach($getGatePass as $getGate)
        {
            $html.='<tr><td>'.$getGate->Docket.'</td></tr>'; 
            
        }
        $html.='<tbody></table>';
        echo $html;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\GatePassWithDocket  $gatePassWithDocket
     * @return \Illuminate\Http\Response
     */
    public function show(GatePassWithDocket $gatePassWithDocket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\GatePassWithDocket  $gatePassWithDocket
     * @return \Illuminate\Http\Response
     */
    public function edit(GatePassWithDocket $gatePassWithDocket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGatePassWithDocketRequest  $request
     * @param  \App\Models\Operation\GatePassWithDocket  $gatePassWithDocket
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGatePassWithDocketRequest $request, GatePassWithDocket $gatePassWithDocket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\GatePassWithDocket  $gatePassWithDocket
     * @return \Illuminate\Http\Response
     */
    public function destroy(GatePassWithDocket $gatePassWithDocket)
    {
        //
    }
}
