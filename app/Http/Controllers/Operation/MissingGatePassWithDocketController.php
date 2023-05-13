<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreMissingGatePassWithDocketRequest;
use App\Http\Requests\UpdateMissingGatePassWithDocketRequest;
use App\Models\Operation\MissingGatePassWithDocket;
use App\Models\Operation\DocketMaster;
use App\Models\Operation\DocketProductDetails;
use DB;

class MissingGatePassWithDocketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        date_default_timezone_set('Asia/Kolkata');
        $previousThree= date("Y-m-d", strtotime("-3 day"));
        $previousTwo= date("Y-m-d", strtotime("-2 day"));
        $previousOne = date("Y-m-d", strtotime("-1 day"));
        $cd =date("Y-m-d");

        $Timing24 = DocketMaster::leftjoin('docket_allocations','docket_allocations.Docket_No','docket_masters.Docket_No')->select(DB::raw("COUNT('docket_masters.Docket_No') as TotalDock"))->where('docket_allocations.Status','=',4)->orwhere('docket_allocations.Status','=',3)->where(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),'=',$cd)->groupBy('docket_masters.Docket_No')->first();

        $Timing48 = DocketMaster::leftjoin('docket_allocations','docket_allocations.Docket_No','docket_masters.Docket_No')->select(DB::raw("COUNT('docket_masters.Docket_No') as TotalDock"))->where('docket_allocations.Status','=',4)->orwhere('docket_allocations.Status','=',3)->where(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),'=',$previousOne)->groupBy('docket_masters.Docket_No')->first();
        $Timing72 = DocketMaster::leftjoin('docket_allocations','docket_allocations.Docket_No','docket_masters.Docket_No')->select(DB::raw("COUNT('docket_masters.Docket_No') as TotalDock"))->where('docket_allocations.Status','=',4)->orwhere('docket_allocations.Status','=',3)->where(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),'=',$previousTwo)->groupBy('docket_masters.Docket_No')->first();

        $Time72Pluse = DocketMaster::leftjoin('docket_allocations','docket_allocations.Docket_No','docket_masters.Docket_No')->select(DB::raw("COUNT('docket_masters.Docket_No') as TotalDock"))->where('docket_allocations.Status','=',4)->orwhere('docket_allocations.Status','=',3)->where(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),'<=',$previousThree)->groupBy('docket_masters.Docket_No')->first();

        $MissingDocket = DocketMaster::with('DocketAllocationDetail','PincodeDetails','DocketProductDetails','customerDetails','DestPincodeDetails','offcieDetails')->whereRelation('DocketAllocationDetail','Status','=',3)->orWhereRelation('DocketAllocationDetail','Status','=',4)->groupBy('docket_masters.Docket_No')->paginate(10);

      $SumDocketStuff =  DocketMaster::leftjoin('docket_allocations',"docket_masters.Docket_No","docket_allocations.Docket_No")->leftjoin('docket_product_details',"docket_masters.id","docket_product_details.Docket_Id")->select(DB::raw('SUM(Actual_Weight) as actW'),DB::raw('SUM(Charged_Weight) as chgW'),DB::raw('SUM(Qty) as qty'))->where('docket_allocations.Status',3)->orwhere('docket_allocations.Status',4)->groupBy('docket_masters.Docket_No')->first();
        return view('Operation.missingGatepass', [
             'title'=>'MISSING GATEPASS',
             'MissingDocket'=>$MissingDocket,
             'TimingTweentyFourCount'=>$Timing24,
             'TimingFortyEightCount'=>$Timing48,
             'TimingSeventyTwoCount'=>$Timing72,
             'Time72Pluse'=>  $Time72Pluse,
             'SumDocketStuff'=>$SumDocketStuff]);
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
     * @param  \App\Http\Requests\StoreMissingGatePassWithDocketRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMissingGatePassWithDocketRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\MissingGatePassWithDocket  $missingGatePassWithDocket
     * @return \Illuminate\Http\Response
     */
    public function show(MissingGatePassWithDocket $missingGatePassWithDocket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\MissingGatePassWithDocket  $missingGatePassWithDocket
     * @return \Illuminate\Http\Response
     */
    public function edit(MissingGatePassWithDocket $missingGatePassWithDocket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMissingGatePassWithDocketRequest  $request
     * @param  \App\Models\Operation\MissingGatePassWithDocket  $missingGatePassWithDocket
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMissingGatePassWithDocketRequest $request, MissingGatePassWithDocket $missingGatePassWithDocket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\MissingGatePassWithDocket  $missingGatePassWithDocket
     * @return \Illuminate\Http\Response
     */
    public function destroy(MissingGatePassWithDocket $missingGatePassWithDocket)
    {
        //
    }

    public function MissingGatePassWithDocketDownload(){
             $MissingDocket = DocketMaster::with('DocketAllocationDetail','PincodeDetails','DocketProductDetails','customerDetails','DestPincodeDetails','offcieDetails')->whereRelation('DocketAllocationDetail','Status','=',3)->orWhereRelation('DocketAllocationDetail','Status','=',4)->get();

             $timestamp = date('Y-m-d');
          $filename = 'HeadWiseRegister' . $timestamp . '.xls';
          header("Content-Type: application/vnd.ms-excel");
          header("Content-Disposition: attachment; filename=\"$filename\"");
          echo '<body style="border: 0.1pt solid #000"> ';
          echo '<table class="table table-bordered table-striped table-actions">
                   <thead>
                <tr class="main-title text-dark">                                     
                <th class="p-1 td1">SL#</th>
                <th class="p-1 td2">Date</th>
                <th class="p-1 td3">Origin</th>
                <th class="p-1 td4">Origin State</th>
                <th class="p-1 td5">Dest.</th>
                <th class="p-1 td6">Dest. State</th>
                <th class="p-1 td7">Docket No.</th>
                <th class="p-1 tdM8">Client Name</th>
                <th class="p-1 td9">Pieces</th>
                <th class="p-1 td10">Act. Wt</th>
                <th class="p-1 td11">Chrg. Wt.</th>
                <th class="p-1 td12">Sale Type</th>
                <th class="p-1 td13">Branch</th>
                <th class="p-1 td14">Delay In Hour.</th></tr>
                 </thead> <tbody>';    
                   $i=1;    
                   foreach ($MissingDocket as $key ) 
                   {
                    date_default_timezone_set("Asia/Kolkata");
                        $delayCal =intval( strtotime(date("Y-m-d H:i:s"))-strtotime($key->Booking_Date));
                        $delayCal = number_format(($delayCal/(60*60)),0);
                    if(isset($key->PincodeDetails->CityDetails->CityName )){
                        $origan =$key->PincodeDetails->CityDetails->CityName;
                    }
                    else{
                        $origan ='';
                    } 
                    if(isset($key->PincodeDetails->StateDetails->name  )){
                        $origanStat =$key->PincodeDetails->StateDetails->name;
                    }
                    else{
                        $origanStat ='';
                    } 
                    if(isset($key->DestPincodeDetails->CityDetails->CityName)){
                        $dest =$key->DestPincodeDetails->CityDetails->CityName;
                    }
                    else{
                        $dest ='';
                    } 
                    if(isset($key->DestPincodeDetails->StateDetails->name)){
                        $destStat =$key->DestPincodeDetails->StateDetails->name;
                    }
                    else{
                        $destStat ='';
                    } 
                    if(isset($key->customerDetails->CustomerCode) && isset($key->customerDetails->CustomerName)){
                        $custcode =$key->customerDetails->CustomerCode;
                        $custName =$key->customerDetails->CustomerName;
                    }
                    else{
                        $custcode ='';
                         $custName='';
                    } 

                    if(isset($key->DocketProductDetails->Qty) ){
                        $Qty =$key->DocketProductDetails->Qty;
                      
                    }
                    else{
                        $Qty ='';
                    } 
                    if(isset($key->DocketProductDetails->Actual_Weight) ){
                        $Actual_Weight =$key->DocketProductDetails->Actual_Weight;
                      
                    }
                    else{
                        $Actual_Weight ='';
                    } 


                     if(isset($key->DocketProductDetails->Charged_Weight) ){
                        $Charged_Weight =$key->DocketProductDetails->Charged_Weight;
                      
                    }
                    else{
                        $Charged_Weight ='';
                    } 
                     if(isset($key->offcieDetails->OfficeCode) && isset($key->offcieDetails->OfficeName) ){
                        $officeCode =$key->offcieDetails->OfficeCode;
                         $officeName =$key->offcieDetails->OfficeName;
                      
                    }
                    else{
                         $officeCode ='';
                         $officeName ='';
                    } 
                    
                      echo '<tr>'; 
                      echo   '<td>'.$i.'</td>';
                      echo   '<td>'.$key->Booking_Date.'</td>';
                      echo   '<td>'.$origan.'</td>';
                      echo   '<td>'.$origanStat.'</td>';
                    echo   '<td>'.$dest.'</td>';
                        echo   '<td>'.$destStat.'</td>';
                         echo   '<td>'.$key->Docket_No.'</td>'; 
                        echo   '<td>'.$custcode.'~'.$custName.'</td>';
                        echo   '<td>'.$Qty.'</td>';
                        echo   '<td>'.$Actual_Weight.'</td>';
                        echo   '<td>'.$Charged_Weight.'</td>';
                        echo '<td>-</td>';
                        echo   '<td>'.$officeCode.'~'.$officeName.'</td>';
                        echo   '<td>'.$delayCal.'</td>';
                      echo  '</tr>';
                      $i++;
                    }
                    echo   '</tbody>
                          </table>';
                         exit(); 
    }
}
