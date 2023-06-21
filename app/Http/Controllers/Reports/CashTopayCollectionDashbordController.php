<?php

namespace App\Http\Controllers\Reports;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCashTopayCollectionDashbordRequest;
use App\Http\Requests\UpdateCashTopayCollectionDashbordRequest;
use App\Models\Reports\CashTopayCollectionDashbord;
use App\Models\Operation\Topaycollection;
use App\Models\Operation\DocketMaster;
use DB;
class CashTopayCollectionDashbordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Booktype = '';  
        if($request->get("type")){
        $Booktype = $request->get("type");
        }
     
        $allTopay= DocketMaster::
         leftjoin("office_masters","office_masters.id","docket_masters.Office_ID")
        ->leftjoin("docket_booking_types","docket_booking_types.id","docket_masters.Booking_Type")
        ->leftJoin('pincode_masters as ScourcePinCode', 'ScourcePinCode.id', '=', 'docket_masters.Origin_Pin')
        ->leftJoin('pincode_masters as DestPinCode', 'DestPinCode.id', '=', 'docket_masters.Dest_Pin')
        ->leftJoin('cities as ScourceCity', 'ScourceCity.id', '=', 'ScourcePinCode.city')
       ->leftJoin('cities as DestCity', 'DestCity.id', '=', 'DestPinCode.city')
        ->leftjoin("Docket_Collection_Trans","Docket_Collection_Trans.Docket_Id","docket_masters.id")
        ->leftjoin('docket_product_details','docket_masters.id','docket_product_details.Docket_Id')
        ->leftjoin('tariff_types','tariff_types.Docket_Id','docket_masters.id')
        ->leftjoin('customer_masters','customer_masters.id','docket_masters.Cust_Id')
        ->leftjoin('employees','employees.user_id','Docket_Collection_Trans.Created_By')
        ->leftjoin("office_masters as CollectionOffice","CollectionOffice.id","docket_masters.Office_ID")
        ->select('docket_masters.Docket_No','office_masters.OfficeName','docket_masters.Booking_Date','ScourceCity.CityName as SourceCity','DestCity.CityName as DestCity','docket_booking_types.BookingType','docket_product_details.Qty','docket_product_details.Actual_Weight','docket_product_details.Charged_Weight','tariff_types.Freight','Docket_Collection_Trans.Amt','CollectionOffice.OfficeName as CollectionOffice','customer_masters.CustomerName')
         ->whereIn('docket_masters.Booking_Type',[3,4])
         ->where('Docket_Collection_Trans.Amt',NULL)
         ->orderBy('CollectionOffice.OfficeName','ASC')
        ->get();
        $office= DocketMaster::
         leftjoin("office_masters as CollectionOffice","CollectionOffice.id","docket_masters.Office_ID")
       ->select('CollectionOffice.OfficeName as CollectionOffice')
        ->whereIn('docket_masters.Booking_Type',[3,4])
         ->orderBy('CollectionOffice.OfficeName','ASC')
        ->groupBy('CollectionOffice.OfficeName')
       ->get();
       
        
        $DocketTotals=DocketMaster::
        leftjoin("office_masters","office_masters.id","docket_masters.Office_ID")
       ->leftjoin("docket_booking_types","docket_booking_types.id","docket_masters.Booking_Type")
       ->leftJoin('pincode_masters as ScourcePinCode', 'ScourcePinCode.id', '=', 'docket_masters.Origin_Pin')
       ->leftJoin('pincode_masters as DestPinCode', 'DestPinCode.id', '=', 'docket_masters.Dest_Pin')
       ->leftJoin('cities as ScourceCity', 'ScourceCity.id', '=', 'ScourcePinCode.city')
       ->leftJoin('cities as DestCity', 'DestCity.id', '=', 'DestPinCode.city')
       ->leftjoin("Docket_Collection_Trans","Docket_Collection_Trans.Docket_Id","docket_masters.id")
       ->leftjoin('docket_product_details','docket_masters.id','docket_product_details.Docket_Id')
       ->leftjoin('tariff_types','tariff_types.Docket_Id','docket_masters.id')
       ->leftjoin('customer_masters','customer_masters.id','docket_masters.Cust_Id')
       ->leftjoin('employees','employees.user_id','Docket_Collection_Trans.Created_By')
       ->leftjoin("office_masters as CollectionOffice","CollectionOffice.id","docket_masters.Office_ID")
       ->select(DB::raw("SUM(DISTINCT CASE WHEN Docket_Collection_Trans.Docket_Id!='' THEN docket_product_details.Qty END) as TotPiece"),DB::raw("COUNT(DISTINCT  docket_masters.id) as TotatlDocket")
       ,DB::raw("SUM(DISTINCT CASE WHEN Docket_Collection_Trans.Docket_Id!='' THEN docket_product_details.Actual_Weight END) as TotActual_Weight")
       ,DB::raw("SUM(DISTINCT CASE WHEN Docket_Collection_Trans.Docket_Id!='' THEN docket_product_details.Charged_Weight END) as TotCharged_Weight"),
       DB::raw("SUM(DISTINCT CASE WHEN Docket_Collection_Trans.Docket_Id!='' THEN  Docket_Collection_Trans.Amt END) as TotAmount") )
        ->whereIn('docket_masters.Booking_Type',[3,4])
       
        ->orderBy('CollectionOffice.OfficeName','ASC')
       ->first();
      
       return view('Operation.dashboardDetailPendingTodayList', [
             'title'=>'CASH To Pay Collection Report',
             'AllTopay'=>$allTopay,
             'office'=>$office,
              'DocketTotals'=>$DocketTotals
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
     * @param  \App\Http\Requests\StoreCashTopayCollectionDashbordRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCashTopayCollectionDashbordRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reports\CashTopayCollectionDashbord  $cashTopayCollectionDashbord
     * @return \Illuminate\Http\Response
     */
    public function show(CashTopayCollectionDashbord $cashTopayCollectionDashbord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reports\CashTopayCollectionDashbord  $cashTopayCollectionDashbord
     * @return \Illuminate\Http\Response
     */
    public function edit(CashTopayCollectionDashbord $cashTopayCollectionDashbord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCashTopayCollectionDashbordRequest  $request
     * @param  \App\Models\Reports\CashTopayCollectionDashbord  $cashTopayCollectionDashbord
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCashTopayCollectionDashbordRequest $request, CashTopayCollectionDashbord $cashTopayCollectionDashbord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reports\CashTopayCollectionDashbord  $cashTopayCollectionDashbord
     * @return \Illuminate\Http\Response
     */
    public function destroy(CashTopayCollectionDashbord $cashTopayCollectionDashbord)
    {
        //
    }
}
