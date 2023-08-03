<?php
namespace App\Http\Controllers\MIS;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStockSummaryReportRequest;
use App\Http\Requests\UpdateStockSummaryReportRequest;
use App\Models\MIS\StockSummaryReport;
use App\Models\Stock\DocketSeriesDevision;
use App\Models\OfficeSetup\OfficeMaster;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StockSummeryExport;
class StockSummaryReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $office=OfficeMaster::get();
        $date =[];
        if($request->office_name)
        {
            $officefilter=$request->office_name;
        }
        else{
            $officefilter='';
        }
        if($request->from_date){
            $date['formDate']=$request->from_date;
        }
        
        if($request->to_date){
           $date['todate']=$request->to_date;
        }
       
       $DocketSeries=DocketSeriesDevision::
        leftjoin('docket_allocations','docket_allocations.devisions_id','=','docket_series_devisions.id')
      ->leftjoin('office_masters','office_masters.id','=','docket_series_devisions.Branch_ID')
        ->select('docket_series_devisions.Qty','docket_series_devisions.Sr_From','docket_series_devisions.Sr_To','office_masters.OfficeName','docket_series_devisions.id','docket_series_devisions.IssueDate',
        DB::raw(
                "SUM(CASE
          WHEN docket_allocations.Status = 0 
          THEN 1  ELSE 0 END) AS 'Unused'"
            ),
      
          DB::raw(
                "SUM(CASE
          WHEN docket_allocations.Status = 1
          THEN 1  ELSE 0 END) AS 'Cancel'"
            ),
            DB::raw(
                "SUM(CASE
          WHEN docket_allocations.Status >1 
          THEN 1 ELSE 0 END) AS 'Booked'"
            ))
            ->Where(function ($query) use($officefilter){ 
             if(isset($officefilter) && $officefilter !='')
             {
                $query->where('docket_series_devisions.Branch_ID',$officefilter);
             }
             })
            ->where(function($query) use($date){
            if(isset($date['formDate']) &&  isset($date['todate'])){
                $query->whereBetween("docket_series_devisions.IssueDate",[$date['formDate'],$date['todate']]);
            }
            })
           ->groupBy('docket_series_devisions.id')
           ->paginate(10);
           if($request->submit=="Download"){
                return Excel::download(new StockSummeryExport($officefilter,$date),"StockSummeryExport.xlsx");
           }
           return view('MIS.stockSummaryReport', [
            'title'=>'Stock Summary Report',
            'Data'=>$DocketSeries,
            'office'=>$office
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
     * @param  \App\Http\Requests\StoreStockSummaryReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStockSummaryReportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MIS\StockSummaryReport  $stockSummaryReport
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $status=$request->Status;
        $DocketSeriesDetails=DocketSeriesDevision::
        leftjoin('docket_allocations','docket_allocations.devisions_id','=','docket_series_devisions.id')
        ->leftjoin('docket_statuses','docket_statuses.id','=','docket_allocations.Status')
        ->leftjoin('office_masters','office_masters.id','=','docket_series_devisions.Branch_ID')
        ->select('docket_series_devisions.Qty','docket_series_devisions.Sr_From','docket_series_devisions.Sr_To','office_masters.OfficeName','docket_series_devisions.id','docket_series_devisions.IssueDate','docket_statuses.title','docket_allocations.Docket_No')
        ->where('docket_series_devisions.IssueDate',$request->IssueDate)
        ->where('docket_allocations.devisions_id',$request->Did)
        ->Where(function ($query) use($status){ 
            if(isset($status) && $status ==0)
            {
                $query->where('docket_allocations.Status',0);
            }
            if(isset($status) && $status ==1)
            {
                $query->where('docket_allocations.Status',1);
            }
            if(isset($status) && $status ==3)
            {
                $query->where('docket_allocations.Status','!=',0)
                ->where('docket_allocations.Status','!=',1);
            }
            })
      
        ->paginate(10);
         return view('MIS.stockSummaryDetails', [
            'title'=>'Stock Summary Details',
            'Data'=>$DocketSeriesDetails,
          
          ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MIS\StockSummaryReport  $stockSummaryReport
     * @return \Illuminate\Http\Response
     */
    public function edit(StockSummaryReport $stockSummaryReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStockSummaryReportRequest  $request
     * @param  \App\Models\MIS\StockSummaryReport  $stockSummaryReport
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStockSummaryReportRequest $request, StockSummaryReport $stockSummaryReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MIS\StockSummaryReport  $stockSummaryReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(StockSummaryReport $stockSummaryReport)
    {
        //
    }
}
