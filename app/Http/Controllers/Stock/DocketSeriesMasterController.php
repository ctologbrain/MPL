<?php

namespace App\Http\Controllers\Stock;

use App\Http\Requests\StoreDocketSeriesMasterRequest;
use App\Http\Requests\UpdateDocketSeriesMasterRequest;
use App\Models\Stock\DocketSeriesMaster;
use App\Http\Controllers\Controller;
use App\Models\Stock\DocketType;
use App\Models\OfficeSetup\OfficeMaster;
use Illuminate\Http\Request;
use App\Models\Stock\DocketAllocation;
class DocketSeriesMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docketType=DocketType::get();
        $office=OfficeMaster::where('OfficeType',1)->get();
        $DocketSeries=DocketSeriesMaster::with('DocketTypeDetials')->orderBy('id')->paginate(10);
        return view('Stock.DocketSeries', [
            'title'=>'DOCKET SERIES MASTER',
            'docketType'=>$docketType,
            'office'=>$office,
            'DocketSeries'=>$DocketSeries
            
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
     * @param  \App\Http\Requests\StoreDocketSeriesMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocketSeriesMasterRequest $request)
    {
        $validated = $request->validated();
        if(isset($request->isActive) && $request->isActive !='')
        {
            $isActive='Yes'; 
        }
        else{
            $isActive='No'; 
        }
         $DocSr=DocketSeriesMaster::insertGetId(
                 ['Docket_Type'=>$request->DocketType ,'Sr_From'=>$request->serialFrom,'Sr_To'=>$request->serialTo,'Qty'=>$request->Qty,'UpdatedQty'=>$request->Qty,'Status'=>$isActive]
             );
           
             return 'true';
         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock\DocketSeriesMaster  $docketSeriesMaster
     * @return \Illuminate\Http\Response
     */
    public function show(DocketSeriesMaster $docketSeriesMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock\DocketSeriesMaster  $docketSeriesMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(DocketSeriesMaster $docketSeriesMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocketSeriesMasterRequest  $request
     * @param  \App\Models\Stock\DocketSeriesMaster  $docketSeriesMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocketSeriesMasterRequest $request, DocketSeriesMaster $docketSeriesMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock\DocketSeriesMaster  $docketSeriesMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocketSeriesMaster $docketSeriesMaster)
    {
        //
    }
    public function CheckDocketSeriesInsert(Request $request)
    {
        
        $from=(int)$request->serialFrom;
        $to=(int)$request->serialTo;
  
        $DcoketAll=DocketSeriesMaster:: 
         whereRaw('('.$from.' between Sr_From and Sr_To)')
        ->first();
       if(isset($DcoketAll->id) && $DcoketAll->id !='')
        {
          return 'false';
        }
        else{
            return 'true';
        }
    }
}
