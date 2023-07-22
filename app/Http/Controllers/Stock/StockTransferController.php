<?php

namespace App\Http\Controllers\Stock;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStockTransferRequest;
use App\Http\Requests\UpdateStockTransferRequest;
use App\Models\Stock\StockTransfer;
use Illuminate\Http\Request;
use Auth;
use App\Models\Stock\DocketAllocation;
use App\Models\Stock\DocketType;
use App\Models\OfficeSetup\OfficeMaster;

use App\Models\Stock\DocketSeriesDevision;
use App\Models\Stock\DocketSeriesMaster;
class StockTransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $docketType=DocketType::get();
        $office=OfficeMaster::get();
        
        return view('Stock.StockTransfer', [
            'title'=>'Stock Transfer',
            'docketType'=>$docketType,
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
     * @param  \App\Http\Requests\StoreStockTransferRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStockTransferRequest $request)
    {
      
          $UserId = Auth::id();
          $updateQty=$request->BalQty-$request->Qty;
          DocketSeriesDevision::where("id", $request->Did)->where("Branch_ID", $request->Office)->update(['Qty' =>$updateQty,'Sr_From'=>$request->serialTo+1]);
          $lastId=DocketSeriesDevision::insertGetId(
            ['Series_ID'=> $request->seriesid,'Branch_ID'=>$request->Office,'ToBranchId'=>$request->OfficeTo ,'Sr_From'=>$request->serialFrom,'Sr_To'=>$request->serialTo,'Qty'=>$request->Qty,'IssueDate'=>$request->IssueDate]
         );  
          for($i=$request->serialFrom; $i <= $request->serialTo; $i++)
             {
                
                DocketAllocation::Where("Docket_No",$i)->update(
                            ['devisions_id'=>$lastId,'Branch_ID' => $request->OfficeTo,'Updated_By'=>$UserId]
                        );
            }
             return 'true';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock\StockTransfer  $stockTransfer
     * @return \Illuminate\Http\Response
     */
    public function show(StockTransfer $stockTransfer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock\StockTransfer  $stockTransfer
     * @return \Illuminate\Http\Response
     */
    public function edit(StockTransfer $stockTransfer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStockTransferRequest  $request
     * @param  \App\Models\Stock\StockTransfer  $stockTransfer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStockTransferRequest $request, StockTransfer $stockTransfer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock\StockTransfer  $stockTransfer
     * @return \Illuminate\Http\Response
     */
    public function destroy(StockTransfer $stockTransfer)
    {
        //
    }

    public function GetDocketSeriesStock(Request $request)
    {
        $docketSeries=DocketSeriesDevision::where('Branch_ID',$request->id)->get();
         $html='';
        $i=0;
        foreach($docketSeries as $series)
        {
            $i++;
         $html.='<tr>';
         $html.='<td>'.$i.'</td>';
         $html.='<td><a href="javascript:void(0)" onclick="getActualSeares('.$series->id.','.$series->Series_ID.')">select</td>';
         $html.='<td>'.$series->Sr_From.'</td>';
         $html.='<td>'.$series->Sr_To.'</td>';
         $html.='<td>'.$series->Qty.'</td>';
        }
        echo $html;
    }

    public function getActulaDocketSeriesStock(Request $request)
    {
        // $docketSerMaster=DocketSeriesMaster::where('id',$request->id)->orderby('id','DESC')->first();  
        $docketSerDivision=DocketSeriesDevision::where('id',$request->id)->orderby('id','DESC')->first();
            $datas=array(
                'Sr_From'=>$docketSerDivision->Sr_From,
                'Sr_To'=>$docketSerDivision->Sr_To,
                'Qty'=>$docketSerDivision->Qty,
                'sid'=>$docketSerDivision->id,
                'balance'=>$docketSerDivision->Qty,
                'seriesid'=>$docketSerDivision->Series_ID
              );
        
          echo json_encode($datas);
    }
}
