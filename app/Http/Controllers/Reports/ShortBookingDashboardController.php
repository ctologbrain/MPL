<?php

namespace App\Http\Controllers\Reports;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\StoreShortBookingDashboardRequest;
use App\Http\Requests\UpdateShortBookingDashboardRequest;
use App\Models\Reports\ShortBookingDashboard;
use DB;
use App\Models\Operation\PickupScanAndDocket;
use App\Models\Operation\GenerateSticker;

class ShortBookingDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ShortBooking = GenerateSticker::leftjoin("docket_allocations","docket_allocations.Docket_No","Sticker.Docket")
        ->leftjoin("employees","employees.user_id","Sticker.CreatedBy")
        ->leftjoin("office_masters as empoff","empoff.id","employees.OfficeName")
        ->leftjoin("customer_masters","customer_masters.id","Sticker.CustId")
        ->leftjoin("cities as OrgCity","OrgCity.id","Sticker.Origin")
        ->leftjoin("office_masters as MainOffice","MainOffice.id","Sticker.BookingOffice")
        ->leftjoin("cities as DestCity","DestCity.id","Sticker.Destination")
        ->select("empoff.OfficeCode as EntyOffCode","empoff.OfficeName as EntyOffName"
       ,"OrgCity.Code as OrgCityCode","OrgCity.CityName as OrgCityName",
       "DestCity.Code as DestCityCode","DestCity.CityName as DestCityName" ,
       "MainOffice.OfficeCode as MainOffCode","MainOffice.OfficeName as MainOffName",
       "customer_masters.CustomerName","customer_masters.CustomerCode",
       "Sticker.Pices","Sticker.Width","Sticker.Mode","Sticker.BookingDate","Sticker.Docket")
        ->where("Sticker.Manual","=",2)
        ->where("Sticker.Status","=",0)
        ->whereIn("docket_allocations.Status",[0,1,2])->paginate(10);
        $PickUpScan ='';
       // $PickUpScan =  PickupScanAndDocket::leftjoin("docket_allocations","docket_allocations.Docket_No","pickup_scan_and_dockets.Docket")->first();
        return view("Operation.ShortBookingDashboard"
        ,["title" => "PENDING MPPS DEASHBOARD",
            "ShortBooking" => $ShortBooking,
            "PickUpScan" => $PickUpScan]);
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
     * @param  \App\Http\Requests\StoreShortBookingDashboardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShortBookingDashboardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reports\ShortBookingDashboard  $shortBookingDashboard
     * @return \Illuminate\Http\Response
     */
    public function show(ShortBookingDashboard $shortBookingDashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reports\ShortBookingDashboard  $shortBookingDashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(ShortBookingDashboard $shortBookingDashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShortBookingDashboardRequest  $request
     * @param  \App\Models\Reports\ShortBookingDashboard  $shortBookingDashboard
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShortBookingDashboardRequest $request, ShortBookingDashboard $shortBookingDashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reports\ShortBookingDashboard  $shortBookingDashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShortBookingDashboard $shortBookingDashboard)
    {
        //
    }
}
