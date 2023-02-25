<?php

namespace App\Http\Controllers\Operation;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreVehicleTripSheetTransactionRequest;
use App\Http\Requests\UpdateVehicleTripSheetTransactionRequest;
use App\Models\Operation\VehicleTripSheetTransaction;
use App\Models\Operation\TripType;
use App\Models\Operation\RouteMaster;
use App\Models\Operation\TouchPoints;
class VehicleTripSheetTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $route=RouteMaster::
         leftJoin('cities', 'cities.id', '=', 'touch_points.CityId')
       ->select('touch_points.RouteOrder','touch_points.Time as Time','cities.CityName','cities.Code')
       ->where('touch_points.RouteId',$request->routeId)->get();
        $TripType=TripType::get();
        return view('Operation.fpmGenrate', [
            'title'=>'FPM - GENERATE',
            'TripType'=>$TripType
            
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
     * @param  \App\Http\Requests\StoreVehicleTripSheetTransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVehicleTripSheetTransactionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\VehicleTripSheetTransaction  $vehicleTripSheetTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleTripSheetTransaction $vehicleTripSheetTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\VehicleTripSheetTransaction  $vehicleTripSheetTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(VehicleTripSheetTransaction $vehicleTripSheetTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVehicleTripSheetTransactionRequest  $request
     * @param  \App\Models\Operation\VehicleTripSheetTransaction  $vehicleTripSheetTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVehicleTripSheetTransactionRequest $request, VehicleTripSheetTransaction $vehicleTripSheetTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\VehicleTripSheetTransaction  $vehicleTripSheetTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(VehicleTripSheetTransaction $vehicleTripSheetTransaction)
    {
        //
    }
}
