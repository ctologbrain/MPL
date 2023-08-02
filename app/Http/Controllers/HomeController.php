<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Operation\DocketMaster;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $TotalBookingCredit = DocketMaster::leftjoin("docket_allocations","docket_masters.Docket_No","docket_allocations.Docket_No")
        ->whereIn("docket_masters.Booking_Type",[1,2])
       // ->where("docket_allocations.Status","=",3)
        ->Select(DB::raw("COUNT(docket_masters.id) as Total"))->first();
        $TotalBookingCash = DocketMaster::leftjoin("docket_allocations","docket_masters.Docket_No","docket_allocations.Docket_No")
        ->where("Booking_Type",[3,4])
       // ->where("docket_allocations.Status","=",4)
        ->Select(DB::raw("COUNT(docket_masters.id) as Total"))->first();

        $MissingGatePass =DocketMaster::with('DocketAllocationDetail')
        ->whereRelation('DocketAllocationDetail','Status','=',3)
        ->orWhereRelation('DocketAllocationDetail','Status','=',4)
        ->Select(DB::raw("COUNT(docket_masters.Docket_No) as Total"))->first();
        return view('AdminDashboard.adminDashboard', [
            'title'=>'DASHBOARD',
           'TotalBookingCredit'=>$TotalBookingCredit,
           'TotalBookingCash'=>$TotalBookingCash,
           'MissingGatePass'=>$MissingGatePass
         ]);
    }
}
