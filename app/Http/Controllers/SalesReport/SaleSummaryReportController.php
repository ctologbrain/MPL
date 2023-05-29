<?php

namespace App\Http\Controllers\SalesReport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSaleSummaryReportRequest;
use App\Http\Requests\UpdateSaleSummaryReportRequest;
use App\Models\SalesReport\SaleSummaryReport;
use App\Models\Account\CustomerMaster;
use App\Models\OfficeSetup\OfficeMaster;
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
            $OfficeMaster=OfficeMaster::select('office_masters.*')->get();
            $sales = OfficeMaster::select('office_masters.*')->paginate(10);
                return view('SalesReport.SaleSummeryReport', [
                    'title'=>'Sale Summery Report',
                    'sales'=>  $sales,
                    'OfficeMaster',$OfficeMaster]);

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
}
