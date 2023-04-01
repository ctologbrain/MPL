<?php

namespace App\Http\Controllers\Operation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGatePassWithDocketRequest;
use App\Http\Requests\UpdateGatePassWithDocketRequest;
use App\Models\Operation\GatePassWithDocket;
use App\Models\Operation\PartTruckLoad;
use App\Models\Stock\DocketAllocation;
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
        GatePassWithDocket::insert(['Docket'=>$request->Docket,'GatePassId' => $request->id,'destinationOffice' => $request->destination_office,'pieces' => $request->pieces,'weight' => $request->weight]);
         PartTruckLoad::where("DocketNo", $request->Docket)->update(['gatePassId' =>$request->id]);
         DocketAllocation::where("Docket_No", $request->Docket)->update(['Status' =>5,'BookDate'=>date('Y-m-d')]);
        $docketFile=GatePassWithDocket::
        leftjoin('vehicle_gatepasses','vehicle_gatepasses.id','=','gate_pass_with_dockets.GatePassId')
        ->leftjoin('vehicle_trip_sheet_transactions','vehicle_trip_sheet_transactions.id','=','vehicle_gatepasses.Fpm_Number')
        ->leftjoin('route_masters','route_masters.id','=','vehicle_trip_sheet_transactions.Route_Id')
        ->leftjoin('cities as SourceCity','SourceCity.id','=','route_masters.Source')
        ->leftjoin('cities as DestCity','DestCity.id','=','route_masters.Destination')
         ->leftjoin('vendor_masters','vendor_masters.id','=','pickup_scans.vendorName')
        ->leftjoin('vehicle_masters','vehicle_masters.id','=','pickup_scans.vehicleNo')
        ->leftjoin('vehicle_types','vehicle_types.id','=','vehicle_masters.VehicleModel')
        ->leftjoin('driver_masters','driver_masters.id','=','pickup_scans.driverName')
        ->leftjoin('users','users.id','=','vehicle_trip_sheet_transactions.CreatedBy')
        ->leftjoin('employees','employees.user_id','=','users.id')
        ->where('gate_pass_with_dockets.Docket',$request->Docket)
        ->first();
         $getGatePass=GatePassWithDocket::
        leftjoin('office_masters','office_masters.id','=','gate_pass_with_dockets.destinationOffice')
        ->select('office_masters.OfficeName','office_masters.OfficeCode','gate_pass_with_dockets.*')
        ->where('GatePassId',$request->id)->get();
        $html='';
        $html.='<table class="table-responsive table-bordered" width="100%"><thead><tr class="main-title text-dark"><th>Docket</th><th>Destination Office</th><th>Pieces</th><th>Weight</th><tr></thead><tbody>';
        foreach($getGatePass as $getGate)
        {
            $html.='<tr><td>'.$getGate->Docket.'</td><td>'.$getGate->OfficeName.'</td><td>'.$getGate->pieces.'</td><td>'.$getGate->weight.'</td></tr>'; 
            
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
