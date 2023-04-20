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
        echo $request->OfficeTo;
        $UserId = Auth::id();
         $updateQty=$request->BalQty-$request->Qty;
             DocketSeriesMaster::where("id", $request->Did)->update(['UpdatedQty' =>$updateQty]);
             for($i=$request->serialFrom; $i <= $request->serialTo; $i++)
             {
                
                DocketAllocation::Where("Docket_No",$i)->update(
                            ['ToBranch_ID' => $request->OfficeTo,'Updated_By'=>$UserId]
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
        $docketSeries=DocketSeriesMaster::where('Branch_ID',$request->id)->get();
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

    public function getActulaDocketSeriesStock(Request $request)
    {
        $docketSerMaster=DocketSeriesMaster::where('id',$request->id)->orderby('id','DESC')->first();  
        $docketSerDivision=DocketSeriesDevision::where('Series_ID',$request->id)->orderby('id','DESC')->first();
      
           
            $datas=array(
                'Sr_From'=>$docketSerMaster->Sr_From,
                'Sr_To'=>$docketSerMaster->Sr_To,
                'Qty'=>$docketSerMaster->Qty,
                'sid'=>$docketSerMaster->id,
                'balance'=>$docketSerMaster->UpdatedQty
              );
        
          echo json_encode($datas);
    }
}
