<?php

namespace App\Http\Controllers\Reports;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUnUsedEwayDashboardRequest;
use App\Http\Requests\UpdateUnUsedEwayDashboardRequest;
use App\Models\Reports\UnUsedEwayDashboard;
use App\Models\Operation\DocketMaster;
class UnUsedEwayDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Invoice=DocketMaster::join("docket_invoice_details","docket_masters.id","docket_invoice_details.Docket_Id")
        ->leftjoin("docket_allocations","docket_masters.Docket_No","docket_allocations.Docket_No")
        ->leftjoin("customer_masters","customer_masters.id","docket_masters.Cust_Id")
        ->leftjoin("customer_addresses","customer_addresses.cust_id","customer_masters.id")
        ->leftjoin("pincode_masters","pincode_masters.id","docket_masters.Dest_Pin")
        ->leftjoin("cities","cities.id","pincode_masters.city")
        ->leftjoin("states","states.id","pincode_masters.state")
        ->select("docket_invoice_details.EWB_Date","docket_invoice_details.EWB_No","customer_masters.CustomerName","customer_addresses.City",
        "cities.CityName","states.name","pincode_masters.PinCode")
        ->where("Is_DACC","YES")->paginate(10);
       return  view("Operation.UnUsedEwayDashboard",
        ["title"=> "UnUsed E-way - Dashbord",
        "DocketBooking"=>   $Invoice ]);
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
     * @param  \App\Http\Requests\StoreUnUsedEwayDashboardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUnUsedEwayDashboardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reports\UnUsedEwayDashboard  $unUsedEwayDashboard
     * @return \Illuminate\Http\Response
     */
    public function show(UnUsedEwayDashboard $unUsedEwayDashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reports\UnUsedEwayDashboard  $unUsedEwayDashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(UnUsedEwayDashboard $unUsedEwayDashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUnUsedEwayDashboardRequest  $request
     * @param  \App\Models\Reports\UnUsedEwayDashboard  $unUsedEwayDashboard
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUnUsedEwayDashboardRequest $request, UnUsedEwayDashboard $unUsedEwayDashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reports\UnUsedEwayDashboard  $unUsedEwayDashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnUsedEwayDashboard $unUsedEwayDashboard)
    {
        //
    }
}
