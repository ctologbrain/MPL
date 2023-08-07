<?php

namespace App\Http\Controllers\SalesReport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBookingCostAnalysisRequest;
use App\Http\Requests\UpdateBookingCostAnalysisRequest;
use App\Models\SalesReport\BookingCostAnalysis;
use App\Models\Operation\DocketMaster;
use App\Models\Operation\DocketBookingType;

use App\Models\Account\CustomerMaster;
use DB;

class BookingCostAnalysisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        //

        $date =[];
        $CustomerData = '';
        $saleType ='';
        $SaleDiff= '';

        if($req->formDate){
            $date['formDate']=  date("Y-m-d",strtotime($req->formDate));
        }
        else{
            $date['formDate']=date('Y-m-d', strtotime('-2 day'));
        }
        
        if($req->todate){
           $date['todate']=  date("Y-m-d",strtotime($req->todate));
        }
        else{
            $date['todate']=  date("Y-m-d");
        }
        
       
        if(isset($req->Customer)){
            $CustomerData =  $req->Customer;
        }

        if(isset($req->saleType)){
            $saleType =  $req->saleType;
        }

        if(isset($req->saleDiff)){
            $saleDiff =  $req->saleDiff;
        }
        
        $Customer=CustomerMaster::select('customer_masters.*')->where("Active","Yes")->get();
        $sale = DocketBookingType::groupBy("Type")->get();
        $Booking=DocketMaster::with('customerNewDetails')
        ->where(function($query) use($CustomerData){
            if($CustomerData!=''){
               $query->where("docket_masters.Cust_Id",$CustomerData);
            }
           })
           ->where(function($query) use($saleType){
            if($saleType!=''){
                
               $query->whereRelation("BookignTypeDetails","Type","=",$saleType);
              
            }
           
          
           })
        ->where(function($query) use($date){
            if(isset($date['formDate']) &&  isset($date['todate'])){
                $query->whereBetween(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),[$date['formDate'],$date['todate']]);
            }
        })
        ->groupBy('Cust_Id')
        ->paginate(10);
      
        return view('SalesReport.BookingCostAnalysis', [
            'title'=>'Booking Cost Analysis Report',
            'Booking'=> $Booking,
            'Customer' => $Customer,
            'sale'=> $sale]);

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
     * @param  \App\Http\Requests\StoreBookingCostAnalysisRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookingCostAnalysisRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SalesReport\BookingCostAnalysis  $bookingCostAnalysis
     * @return \Illuminate\Http\Response
     */
    public function show(BookingCostAnalysis $bookingCostAnalysis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SalesReport\BookingCostAnalysis  $bookingCostAnalysis
     * @return \Illuminate\Http\Response
     */
    public function edit(BookingCostAnalysis $bookingCostAnalysis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookingCostAnalysisRequest  $request
     * @param  \App\Models\SalesReport\BookingCostAnalysis  $bookingCostAnalysis
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookingCostAnalysisRequest $request, BookingCostAnalysis $bookingCostAnalysis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SalesReport\BookingCostAnalysis  $bookingCostAnalysis
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookingCostAnalysis $bookingCostAnalysis)
    {
        //
    }
}
