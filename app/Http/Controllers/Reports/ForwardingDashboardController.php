<?php

namespace App\Http\Controllers\Reports;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreForwardingDashboardRequest;
use App\Http\Requests\UpdateForwardingDashboardRequest;
use App\Models\Reports\ForwardingDashboard;
use App\Models\Operation\Forwarding;
use DB;
class ForwardingDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { date_default_timezone_set('Asia/Kolkata');
        $Currentdate = date("Y-m-d");
        $two =   date("Y-m-d",strtotime("-2 days"));
        $Three =   date("Y-m-d",strtotime("-3 days"));
        $Five =   date("Y-m-d",strtotime("-5 days"));
        $Six =   date("Y-m-d",strtotime("-6 days"));
        $ten =   date("Y-m-d",strtotime("-10 days"));
  
        $DaysZeroToTwo = Forwarding::leftjoin("docket_allocations","forwarding.DocketNo","=","docket_allocations.Docket_No")
        ->Select(DB::raw("COUNT(forwarding.DocketNo) as Total"))
        ->where("docket_allocations.Status","=",10)
        ->whereBetween("Forwarding_Date",[$Currentdate ,$two])->first();

        $DaysThreeToFive =Forwarding::leftjoin("docket_allocations","forwarding.DocketNo","=","docket_allocations.Docket_No")
        ->Select(DB::raw("COUNT(forwarding.DocketNo) as Total"))->where("docket_allocations.Status","=",10)
        ->whereBetween("Forwarding_Date",[$Three ,$Five])->first();

        $DaysSixToTen =Forwarding::leftjoin("docket_allocations","forwarding.DocketNo","=","docket_allocations.Docket_No")
        ->Select(DB::raw("COUNT(forwarding.DocketNo) as Total"))->where("docket_allocations.Status","=",10)
        ->whereBetween("Forwarding_Date",[$Six ,$ten])->first();
        
        $DaysTenPlus =Forwarding::leftjoin("docket_allocations","forwarding.DocketNo","=","docket_allocations.Docket_No")
        ->Select(DB::raw("COUNT(forwarding.DocketNo) as Total"))->where("docket_allocations.Status","=",10)
        ->where("Forwarding_Date", "<",$ten)->first();

       $forwarding = Forwarding::leftjoin("vendor_masters","vendor_masters.id","=","forwarding.Forwarding_Vendor")
        ->leftjoin("docket_masters","docket_masters.Docket_No","=","forwarding.DocketNo")
        ->leftjoin("docket_allocations","docket_masters.Docket_No","=","docket_allocations.Docket_No")
        ->leftjoin('employees','employees.user_id','=','forwarding.CreatedBy')
        ->leftjoin('office_masters','employees.OfficeName','=','office_masters.id')
        ->leftjoin('docket_booking_types','docket_booking_types.Booking_Type','=','docket_booking_types.id')
        ->leftjoin('customer_masters','docket_masters.Cust_Id','=','customer_masters.id')
        ->leftjoin("pincode_masters as OrgPIN","OrgPIN.id","docket_masters.Origin_Pin")
        ->leftjoin("pincode_masters as DestPIN","DestPIN.id","docket_masters.Dest_Pin")
        ->leftjoin("cities as OrgCity","OrgCity.id","OrgPIN.city")
        ->leftjoin("cities as DestCity","DestCity.id","DestPIN.city")

        ->leftjoin("states as OrgState","OrgState.id","OrgPIN.State")
        ->leftjoin("states as DestState","DestState.id","DestPIN.State")
        ->leftjoin("docket_product_details","docket_product_details.Docket_Id","docket_masters.id")

        ->Select("OrgCity.CityName as orgCityName","OrgCity.Code as orgCityCode" ,
        "DestCity.CityName as DestCityName","DestCity.Code as DestCityCode",
        "OrgState.StateCode as OrgStateCode", "OrgState.name as OrgStatename",
        "DestState.StateCode as DestStateCode", "DestState.name as DestStatename",
        "customer_masters.CustomerCode","customer_masters.CustomerName",
        "office_masters.OfficeCode","office_masters.OfficeName","office_masters.id as OFID",
        "forwarding.Forwarding_Date", "forwarding.ForwardingNo","vendor_masters.VendorCode"
        ,"vendor_masters.VendorName","docket_product_details.Qty","docket_product_details.Actual_Weight",
        "docket_product_details.Charged_Weight","forwarding.DocketNo","docket_booking_types.BookingType"
        )
        ->where("docket_allocations.Status","=",10)
        ->paginate(10);

        $forwardingCalculation = Forwarding::join("docket_masters","docket_masters.Docket_No","=","forwarding.DocketNo")
        ->leftjoin('docket_product_details','docket_masters.id','docket_product_details.Docket_Id')
        ->leftjoin("docket_allocations","docket_masters.Docket_No","=","docket_allocations.Docket_No")
        
        ->select(DB::raw("SUM(docket_product_details.Qty) as TotPiece"),DB::raw("SUM(docket_product_details.Actual_Weight) as TotActual_Weight"),DB::raw("SUM(docket_product_details.Charged_Weight) as TotCharged_Weight"))
          ->where("docket_allocations.Status","=",10)
        ->first();
      
        return view("Operation.ForwardingDashboard",
        ["title"=>"DASHBOARD DETAIL -3PL FORWARDING",
        "forwarding" => $forwarding,
        "forwardingCalculation" => $forwardingCalculation,
        "DaysZeroToTwo" => $DaysZeroToTwo,
        "DaysThreeToFive" => $DaysThreeToFive,
        "DaysSixToTen" => $DaysSixToTen,
        "DaysTenPlus" => $DaysTenPlus]);

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
     * @param  \App\Http\Requests\StoreForwardingDashboardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreForwardingDashboardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reports\ForwardingDashboard  $forwardingDashboard
     * @return \Illuminate\Http\Response
     */
    public function show(ForwardingDashboard $forwardingDashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reports\ForwardingDashboard  $forwardingDashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(ForwardingDashboard $forwardingDashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateForwardingDashboardRequest  $request
     * @param  \App\Models\Reports\ForwardingDashboard  $forwardingDashboard
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateForwardingDashboardRequest $request, ForwardingDashboard $forwardingDashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reports\ForwardingDashboard  $forwardingDashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(ForwardingDashboard $forwardingDashboard)
    {
        //
    }
}
