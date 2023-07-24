<?php

namespace App\Http\Controllers\Stock;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStockDocketTrackingRequest;
use App\Http\Requests\UpdateStockDocketTrackingRequest;
use App\Models\Stock\StockDocketTracking;
use App\Models\Stock\DocketAllocation;
use App\Models\Stock\DocketSeriesMaster;
use App\Models\Stock\DocketSeriesDevision;
use DB;
class StockDocketTrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Stock.stockTracking', [
            'title'=>'Stock Tracking']);
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
     * @param  \App\Http\Requests\StoreStockDocketTrackingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStockDocketTrackingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock\StockDocketTracking  $stockDocketTracking
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request ,StockDocketTracking $stockDocketTracking)
    {
        //
        $Docket = $request->Docket;
        $stockSeriesData = DocketSeriesMaster::leftjoin("employees","employees.user_id","docket_series_masters.Created_By")
        ->leftjoin("office_masters","office_masters.id","=","employees.OfficeName")
       ->select(
       "office_masters.OfficeCode",
       "office_masters.OfficeAddress",
       "office_masters.OfficeName",
        "docket_series_masters.Sr_From",
       "docket_series_masters.Sr_To",
        "docket_series_masters.Qty",
        "docket_series_masters.created_at",
       "employees.EmployeeName"
       )
        ->whereRaw('('.$Docket.' between Sr_From  and Sr_To )')
        ->first();
    
        $StockIssueDATA = DocketSeriesDevision::leftjoin("docket_series_masters","docket_series_masters.id","docket_series_devisions.Series_ID")
        ->leftjoin("employees","employees.user_id","docket_series_devisions.CreatedBy")
       ->leftjoin("office_masters as DestinationOffice","DestinationOffice.id","docket_series_devisions.Branch_ID")
        ->leftjoin("office_masters as InitOffice","InitOffice.id","docket_series_devisions.ToBranchId")
        ->select("DestinationOffice.OfficeCode as DestOfficeCode","DestinationOffice.OfficeName as DestOfficeName",
        "InitOffice.OfficeCode as InitOfficeCode","InitOffice.OfficeName as InitOfficeName",
        "docket_series_devisions.IssueDate" ,"docket_series_devisions.Sr_From"
        ,"docket_series_devisions.Sr_To" ,"docket_series_devisions.Qty",
        "docket_series_devisions.created_at","employees.EmployeeName","employees.EmployeeCode",
        "InitOffice.OfficeAddress as InitOfficeAdd","DestinationOffice.OfficeAddress as DestOfficeAdd"
        )
        ->whereRaw('('.$Docket.' between docket_series_devisions.Sr_From  and docket_series_devisions.Sr_To )')
        ->get();
      
        $html='';
       if(!empty($stockSeriesData) ){
         $html.='<thred><tr class=main-title><th class=p-1 style=min-width:100px>SL#<th class=p-1 style=min-width:130px>Activity<th class=p-1 style=min-width:150px>Activity Date<th class=p-1 style=min-width:160px>From Office<th class=p-1 style=min-width:130px>To Office<th class=p-1 style=min-width:160px>Serial From<th class=p-1 style=min-width:160px>Serial To<th class=p-1 style=min-width:160px>Qty<th class=p-1 style=min-width:160px>Entry Date<th class=p-1 style=min-width:160px>Entry By</tr></thred>';
         $html.='<tbody><tr><td>1</td><td>DOCKET SERIES</td><td>'.date("Y-m-d",strtotime($stockSeriesData->created_at)).'</td><td>'.$stockSeriesData->OfficeName.'</td><td></td><td>'.$stockSeriesData->Sr_From.'</td><td>'.$stockSeriesData->Sr_To.'</td><td>'.$stockSeriesData->Qty.'</td><td>'.date("Y-m-d",strtotime($stockSeriesData->created_at)).'</td><td>'.$stockSeriesData->EmployeeName.'</td></tr></tbody>';   
        $i=1;
         foreach($StockIssueDATA as $sdata)
        {
            $i++;
            $html.='<tbody><tr><td>'.$i.'</td><td>DOCKET SERIES</td><td>'.date("Y-m-d",strtotime($sdata->created_at)).'</td><td>'.$sdata->InitOfficeName.'</td><td>'.$sdata->DestOfficeName.'</td><td>'.$sdata->Sr_From.'</td><td>'.$sdata->Sr_To.'</td><td>'.$sdata->Qty.'</td><td>'.date("Y-m-d",strtotime($sdata->IssueDate)).'</td><td>'.$sdata->EmployeeName.'</td></tr></tbody>';      
        }   
         echo $html;
    }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock\StockDocketTracking  $stockDocketTracking
     * @return \Illuminate\Http\Response
     */
    public function edit(StockDocketTracking $stockDocketTracking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStockDocketTrackingRequest  $request
     * @param  \App\Models\Stock\StockDocketTracking  $stockDocketTracking
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStockDocketTrackingRequest $request, StockDocketTracking $stockDocketTracking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock\StockDocketTracking  $stockDocketTracking
     * @return \Illuminate\Http\Response
     */
    public function destroy(StockDocketTracking $stockDocketTracking)
    {
        //
    }

    public function StockTrackExport(Request $request){
       $StockDocket= $request->get('StockId');
       if($StockDocket){

       $series= DocketSeriesMaster::leftjoin("employees","employees.user_id","docket_series_masters.Created_By")
        ->leftjoin("office_masters","office_masters.id","=","employees.OfficeName")
       ->select(
        DB::raw("(CASE WHEN docket_series_masters.id!='' THEN 'DOCKET SERIES' END ) as Title "),
        DB::raw("DATE_FORMAT(docket_series_masters.created_at,'%d-%m-%Y') as CRDate"),
       "office_masters.OfficeName","office_masters.OfficeCode",
        "docket_series_masters.Sr_From",
       "docket_series_masters.Sr_To",
        "docket_series_masters.Qty",
        "docket_series_masters.created_at",
       "employees.EmployeeName"
       )
        ->whereRaw('('.$StockDocket.' between Sr_From  and Sr_To )')
        ->first();

        $StockIssueDATA = DocketSeriesDevision::leftjoin("docket_series_masters","docket_series_masters.id","docket_series_devisions.Series_ID")
        ->leftjoin("users","users.id","docket_series_masters.Created_By")
        ->leftjoin("employees","employees.user_id","docket_series_masters.Created_By")
        ->leftjoin("office_masters as InitOffice","InitOffice.id","=","employees.OfficeName")
        ->leftjoin("office_masters as DestinationOffice","DestinationOffice.id","docket_series_devisions.Branch_ID")
        ->select("DestinationOffice.OfficeCode as DestOfficeCode","DestinationOffice.OfficeName as DestOfficeName",
        "InitOffice.OfficeCode as InitOfficeCode","InitOffice.OfficeName as InitOfficeName",
        "docket_series_devisions.IssueDate" ,"docket_series_devisions.Sr_From"
        ,"docket_series_devisions.Sr_To" ,"docket_series_devisions.Qty",
        "docket_series_devisions.created_at","employees.EmployeeName","employees.EmployeeCode",
        "InitOffice.OfficeAddress as InitOfficeAdd","DestinationOffice.OfficeAddress as DestOfficeAdd"
        )
        ->whereRaw('('.$StockDocket.' between docket_series_devisions.Sr_From  and docket_series_devisions.Sr_To )')
        ->first();

        $timestamp = date('Y-m-d');
        $filename = 'HeadWiseRegister' . $timestamp . '.xls';
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$filename\"");
        echo '<body style="border: 0.1pt solid #000"> ';
        echo '<table class="table table-bordered table-striped table-actions">
                 <thead>
              <tr class="main-title text-dark">                                     
              <th class="p-1 td2">Activity</th>
              <th class="p-1 td3">Activity Date</th>
              <th class="p-1 td4">From Office </th>
              <th class="p-1 td5">To Office</th>
              <th class="p-1 td6">Serial From</th>
              <th class="p-1 td7">Serial To</th>
              <th class="p-1 tdM8"> Qty</th>
              <th class="p-1 td9">Entry Date</th>
              <th class="p-1 td10">Entry By</th>
                </tr>
               </thead> <tbody>';    


               echo '<tr>'; 
               echo   '<td> STOCK ISSUE</td>';
               echo   '<td>'.date("d-m-Y", strtotime($StockIssueDATA->IssueDate)).'</td>';
               echo   '<td>'.$StockIssueDATA->InitOfficeCode.'~'.$StockIssueDATA->InitOfficeName.'</td>';
                echo   '<td>'.$StockIssueDATA->DestOfficeCode.'~'.$StockIssueDATA->DestOfficeName.'</td>';
                 echo   '<td>'.$StockIssueDATA->Sr_From.'</td>';
                  echo   '<td>'.$StockIssueDATA->Sr_To.'</td>'; 
                 echo   '<td>'.$StockIssueDATA->Qty.'</td>';
                 echo   '<td>'.date("d-m-Y H:i", strtotime($StockIssueDATA->created_at)).'</td>';
                 echo   '<td>'.$StockIssueDATA->EmployeeName.'</td>';
               echo  '</tr>';

               echo '<tr>'; 
               echo   '<td> DOCKET SERIES</td>';
               echo   '<td>'.$series->CRDate.'</td>';
               echo   '<td>'.$series->OfficeCode.'~'.$series->OfficeName.'</td>';
               echo   '<td> -</td>';
             echo   '<td>'.$series->Sr_From.'</td>';
                 echo   '<td>'.$series->Sr_To.'</td>';
                  echo   '<td>'.$series->Qty.'</td>'; 
                 echo   '<td>'.date("d-m-Y H:i", strtotime($series->created_at)).'</td>';
                 echo   '<td>'.$series->EmployeeName.'</td>';
               echo  '</tr>';
             echo   '</tbody>
            </table>';
            exit(); 


        //return  Excel::download(new StockrackingExport($fpmId),'StockrackingExport.xlsx');
       }
    }
}
