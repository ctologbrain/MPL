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
use Auth;
class DocketSeriesMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $docketType=DocketType::get();
        $office=OfficeMaster::get();
        if($request->get('DocketType') !='')
        {
            $DocketType=$request->get('DocketType');
        }
        else
        {
            $DocketType='';
        }
        if($request->get('search') !='')
        {
            $search=$request->get('search');
        }
        else
        {
            $search='';
        }
        $DocketSeries=DocketSeriesMaster::with('DocketTypeDetials','UserDetails')
        ->Where(function ($query) use($DocketType){ 
            if($DocketType !='')
           {
               $query ->orWhere('docket_series_masters.Docket_Type',$DocketType);
           }
        })
        ->Where(function ($query) use($search){ 
            if($search !='')
           {
              $query->whereRaw('('.$search.' between docket_series_masters.Sr_From  and docket_series_masters.Sr_To )');
           }
        })
        ->orderBy('id')
        ->paginate(10); 
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
        $UserId =Auth::id();
        date_default_timezone_set('Asia/Kolkata');
        $validated = $request->validated();
        if(isset($request->isActive) && $request->isActive !='')
        {
            $isActive='Yes'; 
        }
        else{
            $isActive='No'; 
        }
         $DocSr=DocketSeriesMaster::insertGetId(
                 ['Docket_Type'=>$request->DocketType ,'Sr_From'=>$request->serialFrom,'Sr_To'=>$request->serialTo,'Qty'=>$request->Qty,'UpdatedQty'=>$request->Qty,'Status'=>$isActive,"Created_By"=>$UserId,"created_at"=> date('Y-m-d H:i:s')]
             );
           
             return 'true';
         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock\DocketSeriesMaster  $docketSeriesMaster
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $DocketSeries=DocketSeriesMaster::where('id',$request->id)->first();
        echo json_encode($DocketSeries);

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

    public function ActiveDocketSeries(Request $request){
        DocketSeriesMaster::where("id",$request->Id)->update(["Status"=> $request->Active]);
        $data = DocketSeriesMaster::where("id",$request->Id)->first();
        echo json_encode($data);
    }
}
