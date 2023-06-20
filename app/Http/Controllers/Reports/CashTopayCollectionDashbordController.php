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
     
        $allTopay= Topaycollection::with('DocketMasterInfo','DocketcalBankInfo','CollectionUserInfo')
        ->where(function($query) use($Booktype){
            $query->whereRelation("DocketMasterInfo","Booking_Type","=",$Booktype);
        })
        ->groupBy("Docket_Collection_Trans.Docket_Id")
        ->paginate(10);
        $DocketTotals=Topaycollection::join("docket_masters","Docket_Collection_Trans.Docket_Id","docket_masters.id")
        ->leftjoin('docket_product_details','docket_masters.id','docket_product_details.Docket_Id')
        ->select(DB::raw("SUM(DISTINCT CASE WHEN Docket_Collection_Trans.Docket_Id!='' THEN docket_product_details.Qty END) as TotPiece"),DB::raw("SUM(docket_product_details.Actual_Weight) as TotActual_Weight"),DB::raw("SUM(docket_product_details.Charged_Weight) as TotCharged_Weight"),
        DB::raw("SUM(DISTINCT CASE WHEN Docket_Collection_Trans.Docket_Id!='' THEN  Docket_Collection_Trans.Amt END) as TotAmount") )
        ->where(function($query) use($Booktype){
            $query->where("docket_masters.Booking_Type","=",$Booktype);
            })
        ->first();    //echo '<pre>'; print_r(        $DocketTotals); die;
          return view('Operation.dashboardDetailPendingTodayList', [
             'title'=>'CASH To Pay Collection Report',
             'AllTopay'=>$allTopay,
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
