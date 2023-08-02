<?php

namespace App\Http\Controllers\Reports;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreShortDocketReportRequest;
use App\Http\Requests\UpdateShortDocketReportRequest;
use App\Models\Reports\ShortDocketReport;
use App\Models\Operation\GatePassRecvTrans;
use App\Models\OfficeSetup\OfficeMaster;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ShortDocketBookingExport;
class ShortDocketReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $date=[];
        $officeData = '';

        if($request->formDate){
            $date['formDate'] =date("Y-m-d",strtotime($request->formDate));
        }
        if($request->todate){
            $date['todate'] = date("Y-m-d",strtotime($request->todate));
        }

        if($request->office){ 
            $officeData =  $request->office;
        }
        $office =OfficeMaster::where("Is_Active","Yes")->get();
        $docket = GatePassRecvTrans::with("DocketGPDataDetails","GetPassRecivingDetails")
        ->where(function($query) use($officeData){
            if($officeData!=''){
                $query->whereRelation("GetPassRecivingDetails","Rcv_Office","=",$officeData);
            }
           })
        ->where(function($query) use($date){  
            if(isset($date['formDate']) &&  isset($date['todate'])){
                $query->whereBetween(DB::raw("DATE_FORMAT(Created_At, '%Y-%m-%d')"),[$date['formDate'],$date['todate']]);
            }
         })
         ->where("ShotBox","=","YES")
         ->orWhere("ShotPices","=","YES")
         ->groupBy("Docket_No")
        ->paginate(10);
         //  echo '<pre>'; print_r($docket[0]->GetPassRecivingDetails); die;
        if($request->get('submit')=='Download')
        {
            return  Excel::download(new ShortDocketBookingExport($officeData,$date), 'ShortDocketBookingReport.xlsx');
        }
        return view('Operation.ShortDocketReport',
        [
        'title'=>'Short Docket Report',
        'office'=>$office,
        'docket'=>$docket
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
     * @param  \App\Http\Requests\StoreShortDocketReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShortDocketReportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report\ShortDocketReport  $shortDocketReport
     * @return \Illuminate\Http\Response
     */
    public function show(ShortDocketReport $shortDocketReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report\ShortDocketReport  $shortDocketReport
     * @return \Illuminate\Http\Response
     */
    public function edit(ShortDocketReport $shortDocketReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShortDocketReportRequest  $request
     * @param  \App\Models\Report\ShortDocketReport  $shortDocketReport
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShortDocketReportRequest $request, ShortDocketReport $shortDocketReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report\ShortDocketReport  $shortDocketReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShortDocketReport $shortDocketReport)
    {
        //
    }
}
