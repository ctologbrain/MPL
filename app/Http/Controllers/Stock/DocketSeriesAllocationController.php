<?php

namespace App\Http\Controllers\Stock;

use App\Http\Requests\StoreDocketSeriesAllocationRequest;
use App\Http\Requests\UpdateDocketSeriesAllocationRequest;
use App\Models\Stock\DocketSeriesAllocation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock\DocketType;
use App\Models\OfficeSetup\OfficeMaster;
use App\Models\Stock\DocketSeriesDevision;
use App\Models\Stock\DocketSeriesMaster;
use App\Models\Stock\DocketAllocation;
use App\Models\OfficeSetup\employee;
use Auth;
class DocketSeriesAllocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docketType=DocketType::get();
        $office=OfficeMaster::get();
        
        return view('Stock.DocketSeriesAllocation', [
            'title'=>'Stock Issue',
            'docketType'=>$docketType,
            'office'=>$office,
           
            
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
     * @param  \App\Http\Requests\StoreDocketSeriesAllocationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocketSeriesAllocationRequest $request)
    {
            $UserId = Auth::id();
            $validated = $request->validated();
            $empOff=employee::where('user_id',$UserId)->first();
           $lastId=DocketSeriesDevision::insertGetId(
                 ['Series_ID'=> $request->Did,'Branch_ID'=>$request->Office ,'Sr_From'=>$request->serialFrom,'Sr_To'=>$request->serialTo,'Qty'=>$request->Qty,'IssueDate'=>date("Y-m-d", strtotime($request->IssueDate)),'ToBranchId'=>$empOff->OfficeName]
             );
             $updateQty=$request->BalQty-$request->Qty;
             DocketSeriesMaster::where("id", $request->Did)->update(['UpdatedQty' =>$updateQty]);
             for($i=$request->serialFrom; $i <= $request->serialTo; $i++)
             {
                DocketAllocation::insert(
                    ['Branch_ID' => $request->Office,'devisions_id'=>$lastId,'Series_ID'=>$request->Did,'Docket_No'=>$i,'ToBranch_ID' => $request->Office]
                );
             }
             return 'true';
         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock\DocketSeriesAllocation  $docketSeriesAllocation
     * @return \Illuminate\Http\Response
     */
    public function show(DocketSeriesAllocation $docketSeriesAllocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock\DocketSeriesAllocation  $docketSeriesAllocation
     * @return \Illuminate\Http\Response
     */
    public function edit(DocketSeriesAllocation $docketSeriesAllocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocketSeriesAllocationRequest  $request
     * @param  \App\Models\Stock\DocketSeriesAllocation  $docketSeriesAllocation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocketSeriesAllocationRequest $request, DocketSeriesAllocation $docketSeriesAllocation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock\DocketSeriesAllocation  $docketSeriesAllocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocketSeriesAllocation $docketSeriesAllocation)
    {
        //
    }
    public function GetDocketSeries(Request $request)
    {
        $docketSeries=DocketSeriesMaster::where('Docket_Type',$request->id)->get();
        $html='';
        $i=0;
        foreach($docketSeries as $series)
        {
            $i++;
         $html.='<tr>';
         $html.='<td>'.$i.'</td>';
         $html.='<td><a href="javascript:void(0)" onclick="getActualSeares('.$series->id.')">select</td>';
         $html.='<td>'.$series->Sr_From.'</td>';
         $html.='<td>'.$series->Sr_To.'</td>';
         $html.='<td>'.$series->UpdatedQty.'</td>';
        }
        echo $html;
    }
    public function getActulaDocketSeries(Request $request)
    {
//         DocketSeriesDevision
        $docketSerMaster=DocketSeriesMaster::where('id',$request->id)->orderby('id','DESC')->first();  
        $docketSerDivision=DocketSeriesDevision::where('Series_ID',$request->id)->orderby('id','DESC')->first();
        if(isset($docketSerDivision->id))
        {
          $datas=array(
            'Sr_From'=>$docketSerDivision->Sr_To+1,
            'Sr_To'=>$docketSerDivision->Sr_To,
            'Qty'=>$docketSerDivision->Qty,
            'sid'=>$docketSerDivision->Series_ID,
            'balance'=>$docketSerMaster->UpdatedQty
          );
        }
        else{
           
            $datas=array(
                'Sr_From'=>$docketSerMaster->Sr_From,
                'Sr_To'=>$docketSerMaster->Sr_To,
                'Qty'=>$docketSerMaster->Qty,
                'sid'=>$docketSerMaster->id,
                'balance'=>$docketSerMaster->UpdatedQty
              );
          }
          echo json_encode($datas);
    }
}
