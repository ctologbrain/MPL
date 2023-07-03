<?php

namespace App\Http\Controllers\Reports;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreNDRDashbordReportRequest;
use App\Http\Requests\UpdateNDRDashbordReportRequest;
use App\Models\Reports\NDRDashbordReport;
use App\Models\Operation\NoDelvery;

class NDRDashbordReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $date =[];
        if($request->dateFrom!=''){
            $date['from'] =$request->dateFrom;
        }

        if($request->dateto!=''){
            $date['to'] =$request->dateto;
        }


      $NdrReport=  NoDelvery::with('DocketMasterDet','NDrMasterDetails')
         ->where(function($query) use($date){
            if(isset($date['from']) && isset($date['to'])){
                $query->whereBetween("NDR_Date",[$date['from'],$date['to']]);
            }
        })
       // ->groupBy("Docket_No")
        ->paginate(10);

        return  view('Operation.NDR_Dashboard'
                ,["title"=>"No DELIVERY REPORT",
                "NdrReport" => $NdrReport ]);
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
     * @param  \App\Http\Requests\StoreNDRDashbordReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNDRDashbordReportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reports\NDRDashbordReport  $nDRDashbordReport
     * @return \Illuminate\Http\Response
     */
    public function show(NDRDashbordReport $nDRDashbordReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reports\NDRDashbordReport  $nDRDashbordReport
     * @return \Illuminate\Http\Response
     */
    public function edit(NDRDashbordReport $nDRDashbordReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNDRDashbordReportRequest  $request
     * @param  \App\Models\Reports\NDRDashbordReport  $nDRDashbordReport
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNDRDashbordReportRequest $request, NDRDashbordReport $nDRDashbordReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reports\NDRDashbordReport  $nDRDashbordReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(NDRDashbordReport $nDRDashbordReport)
    {
        //
    }
}
