<?php

namespace App\Http\Controllers\Stock;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStockDocketTrackingRequest;
use App\Http\Requests\UpdateStockDocketTrackingRequest;
use App\Models\Stock\StockDocketTracking;
use App\Models\Stock\DocketAllocation;
use App\Models\Stock\DocketSeriesMaster;
use App\Models\Stock\DocketSeriesDevision;

class StockDocketTrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Stock.stockTracking', [
            'title'=>'Stock Tracking']);
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
     * @param  \App\Http\Requests\StoreStockDocketTrackingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStockDocketTrackingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock\StockDocketTracking  $stockDocketTracking
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request ,StockDocketTracking $stockDocketTracking)
    {
        //
        $Docket = $request->Docket;
        $stockSeriesData = DocketSeriesMaster::leftjoin("employees","employees.user_id","docket_series_masters.Created_By")
        ->leftjoin("office_masters","office_masters.id","=","employees.OfficeName")
       ->select(
       "office_masters.OfficeCode",
       "office_masters.OfficeAddress",
       "office_masters.OfficeName",
        "docket_series_masters.Sr_From",
       "docket_series_masters.Sr_To",
        "docket_series_masters.Qty",
        "docket_series_masters.created_at",
       "employees.EmployeeName"
       )
       
        ->whereRaw('('.$Docket.' between Sr_From  and Sr_To )')
        ->first();
    
        $StockIssueDATA = DocketSeriesDevision::leftjoin("docket_series_masters","docket_series_masters.id","docket_series_devisions.Series_ID")
        ->leftjoin("users","users.id","docket_series_masters.Created_By")
        ->leftjoin("employees","employees.user_id","docket_series_masters.Created_By")
        ->leftjoin("office_masters as InitOffice","InitOffice.id","=","employees.OfficeName")
        ->leftjoin("office_masters as DestinationOffice","DestinationOffice.id","docket_series_devisions.Branch_ID")
        ->select("DestinationOffice.OfficeCode as DestOfficeCode","DestinationOffice.OfficeName as DestOfficeName",
        "InitOffice.OfficeCode as InitOfficeCode","InitOffice.OfficeName as InitOfficeName",
        "docket_series_devisions.IssueDate" ,"docket_series_devisions.Sr_From"
        ,"docket_series_devisions.Sr_To" ,"docket_series_devisions.Qty",
        "docket_series_devisions.created_at","employees.EmployeeName","employees.EmployeeCode",
        "InitOffice.OfficeAddress as InitOfficeAdd","DestinationOffice.OfficeAddress as DestOfficeAdd"
        )
        ->whereRaw('('.$Docket.' between docket_series_devisions.Sr_From  and docket_series_devisions.Sr_To )')
        ->first();
        if(!empty($stockSeriesData) ){

            if(!empty( $StockIssueDATA)){
                echo json_encode(array("status" =>"true","dataIssue"=>$StockIssueDATA,"dataGenrate"=>$stockSeriesData));
            }
            else{
                echo json_encode(array("status" =>"true","dataIssue"=>[],"dataGenrate"=>$stockSeriesData));
            }
           
        }
        else{
            echo json_encode(array("status" =>"false","msg"=>"Stock Not Found"));
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock\StockDocketTracking  $stockDocketTracking
     * @return \Illuminate\Http\Response
     */
    public function edit(StockDocketTracking $stockDocketTracking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStockDocketTrackingRequest  $request
     * @param  \App\Models\Stock\StockDocketTracking  $stockDocketTracking
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStockDocketTrackingRequest $request, StockDocketTracking $stockDocketTracking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock\StockDocketTracking  $stockDocketTracking
     * @return \Illuminate\Http\Response
     */
    public function destroy(StockDocketTracking $stockDocketTracking)
    {
        //
    }
}
