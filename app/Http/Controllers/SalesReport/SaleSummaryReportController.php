<?php

namespace App\Http\Controllers\SalesReport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSaleSummaryReportRequest;
use App\Http\Requests\UpdateSaleSummaryReportRequest;
use App\Models\SalesReport\SaleSummaryReport;
use App\Models\Account\CustomerMaster;
use App\Models\OfficeSetup\OfficeMaster;
use App\Models\Operation\DocketMaster;
use DB;
class SaleSummaryReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $date =[];
            $CustomerData = '';
            $SaleType = '';
            if($request->SaleType){
                $SaleType =  $request->SaleType;
            }
            
    
            if($request->office){
                $office =  $request->office;
            }
            else{
                 $office = '';
            }
    
            if($request->formDate){
                $date['formDate']=  date("Y-m-d",strtotime($request->formDate));
            }
            
            if($request->todate){
               $date['todate']=  date("Y-m-d",strtotime($request->todate));
            }
    
           
            if(isset($request->Customer)){
                $CustomerData =  $request->Customer;
            }
            $OfficeMaster=OfficeMaster::select('office_masters.*')->where("Is_Active","Yes")->get();
            $sales = OfficeMaster::join('docket_masters','docket_masters.Office_ID','office_masters.id')
            ->select('office_masters.*')
            ->where(function($query) use($office){
                if($office!=''){
                    $query->where("docket_masters.Office_ID",$office);
                }
               })
               ->where(function($query) use($date){
                if(isset($date['formDate']) &&  isset($date['todate'])){
                    $query->whereBetween(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),[$date['formDate'],$date['todate']]);
                }
               })
            ->groupBy('office_masters.id')
            ->paginate(10);
                return view('SalesReport.SaleSummeryReport', [
                    'title'=>'Sale Summery Report',
                    'sales'=>  $sales,
                    'OfficeMaster'=>$OfficeMaster]);

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
     * @param  \App\Http\Requests\StoreSaleSummaryReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSaleSummaryReportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SalesReport\SaleSummaryReport  $saleSummaryReport
     * @return \Illuminate\Http\Response
     */
    public function show(SaleSummaryReport $saleSummaryReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SalesReport\SaleSummaryReport  $saleSummaryReport
     * @return \Illuminate\Http\Response
     */
    public function edit(SaleSummaryReport $saleSummaryReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSaleSummaryReportRequest  $request
     * @param  \App\Models\SalesReport\SaleSummaryReport  $saleSummaryReport
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSaleSummaryReportRequest $request, SaleSummaryReport $saleSummaryReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SalesReport\SaleSummaryReport  $saleSummaryReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(SaleSummaryReport $saleSummaryReport)
    {
        //
    }

    public function saleSummeryDetailed($OffId,$type, Request $req){ 
       // $DocketId
       $TypeKey = array();
       $allocation = 0;
       if($type=='Booking'){
        $TypeKey =[];
       }
       if($type=='BookingDoor'){
        $TypeKey =[1,3];
       }

       if($type=='BookingHub'){
        $TypeKey =[2,4];
       }
       if($type=='Delivery'){
        $TypeKey =[];
        $allocation =8;
       }
       if($type=='DeliveryDoor'){
        $TypeKey =[1,3];
          $allocation =8;
       }
       if($type=='DeliveryHUb'){
        $TypeKey =[2,4];
          $allocation =8;
       }

        $DF = $req->get('DF');
       $DT =$req->get('DT');

       $sales = DocketMaster::with('DevileryTypeDet','DocketProductDetails','DocketAllocationDetail','offcieDetails')
       ->where(function($query) use($OffId){
        if($OffId!='' && $OffId!=0){
            $query->where("Office_ID",$OffId);
        }
       })
       ->where(function($query) use($TypeKey){
        if(!empty($TypeKey)){
            $query->whereIn("Delivery_Type",$TypeKey);
        }
       })
       ->where(function($query) use($allocation){
        if($allocation!=''){
            $query->whereRelation("DocketAllocationDetail","Status","=",$allocation);
        }
       })
       ->where(function($query) use($DF, $DT){
        if(isset($DF) && $DF!='' &&  isset($DT) && $DT!=''){
            $query->whereBetween(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),[$DF,$DT]);
        }
       })
       ->paginate(10);
       return view('SalesReport.saleSummeryDetailedReport', [
        'title'=>'Sale Summery Detailed -Report',
        'sales'=>  $sales]);
       
    }
}
