<?php

namespace App\Http\Controllers\Reports;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMissingPODImageDashboardRequest;
use App\Http\Requests\UpdateMissingPODImageDashboardRequest;
use App\Models\Reports\MissingPODImageDashboard;
use App\Models\Operation\DocketMaster;

class MissingPODImageDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Images = DocketMaster::with("customerDetails","DocketImagesDet","PincodeDetails","DestPincodeDetails")
        ->whereRelation("DocketImagesDet","file","=",null)
        ->paginate(10);
       return view("Operation.MissingPODDashboard",
       ["title"=>"MISSING POD IMAGES - DASHBOARD",
       "Images" =>$Images]);
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
     * @param  \App\Http\Requests\StoreMissingPODImageDashboardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMissingPODImageDashboardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reports\MissingPODImageDashboard  $missingPODImageDashboard
     * @return \Illuminate\Http\Response
     */
    public function show(MissingPODImageDashboard $missingPODImageDashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reports\MissingPODImageDashboard  $missingPODImageDashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(MissingPODImageDashboard $missingPODImageDashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMissingPODImageDashboardRequest  $request
     * @param  \App\Models\Reports\MissingPODImageDashboard  $missingPODImageDashboard
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMissingPODImageDashboardRequest $request, MissingPODImageDashboard $missingPODImageDashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reports\MissingPODImageDashboard  $missingPODImageDashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(MissingPODImageDashboard $missingPODImageDashboard)
    {
        //
    }
}
