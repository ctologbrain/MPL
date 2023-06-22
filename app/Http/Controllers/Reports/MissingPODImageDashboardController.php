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
        $Images = DocketMaster::leftjoin("UploadDocketImage","UploadDocketImage.DocketNo","docket_masters.Docket_No")
        ->leftjoin("customer_masters","customer_masters.id","docket_masters.Cust_Id")
        ->leftjoin("Regular_Deliveries","Regular_Deliveries.Docket_ID","docket_masters.Docket_No")
        ->leftjoin("pincode_masters as OrgPIN","OrgPIN.id","docket_masters.Origin_Pin")
        ->leftjoin("pincode_masters as DestPIN","DestPIN.id","docket_masters.Dest_Pin")
        ->leftjoin("cities as OrgCity","OrgCity.id","OrgPIN.city")
        ->leftjoin("cities as DestCity","DestCity.id","DestPIN.city")

        ->leftjoin("states as OrgState","OrgState.id","OrgPIN.State")
        ->leftjoin("states as DestState","DestState.id","DestPIN.State")
        ->select("Regular_Deliveries.Time","customer_masters.CustomerName","customer_masters.CustomerCode",
        "docket_masters.Docket_No","docket_masters.Booking_Date",
        "OrgCity.CityName as orgCityName","OrgCity.Code as orgCityCode" ,
        "DestCity.CityName as DestCityName","DestCity.Code as DestCityCode",
        "OrgState.StateCode as OrgStateCode", "OrgState.name as OrgStatename",
        "DestState.StateCode as DestStateCode", "DestState.name as DestStatename" )
        //with("customerDetails","DocketImagesDet","PincodeDetails","DestPincodeDetails")
        ->whereNull("UploadDocketImage.file")
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
