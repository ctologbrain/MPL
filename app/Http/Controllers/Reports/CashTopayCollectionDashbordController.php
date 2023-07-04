<?php

namespace App\Http\Controllers\Reports;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCashTopayCollectionDashbordRequest;
use App\Http\Requests\UpdateCashTopayCollectionDashbordRequest;
use App\Models\Reports\CashTopayCollectionDashbord;
use App\Models\Operation\Topaycollection;
use App\Models\Operation\DocketMaster;
use DB;
class CashTopayCollectionDashbordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
     
        $allTopay= DocketMaster::
         leftjoin("office_masters","office_masters.id","docket_masters.Office_ID")
        ->leftjoin("docket_booking_types","docket_booking_types.id","docket_masters.Booking_Type")
        ->leftJoin('pincode_masters as ScourcePinCode', 'ScourcePinCode.id', '=', 'docket_masters.Origin_Pin')
        ->leftJoin('pincode_masters as DestPinCode', 'DestPinCode.id', '=', 'docket_masters.Dest_Pin')
        ->leftJoin('cities as ScourceCity', 'ScourceCity.id', '=', 'ScourcePinCode.city')
       ->leftJoin('cities as DestCity', 'DestCity.id', '=', 'DestPinCode.city')
        ->leftjoin("Docket_Collection_Trans","Docket_Collection_Trans.Docket_Id","docket_masters.id")
        ->leftjoin('docket_product_details','docket_masters.id','docket_product_details.Docket_Id')
        ->leftjoin('tariff_types','tariff_types.Docket_Id','docket_masters.id')
        ->leftjoin('customer_masters','customer_masters.id','docket_masters.Cust_Id')
        ->leftjoin('employees','employees.user_id','Docket_Collection_Trans.Created_By')
        ->leftjoin("office_masters as CollectionOffice","CollectionOffice.id","docket_masters.Office_ID")

        ->leftjoin("drs_delivery_transactions","drs_delivery_transactions.Docket","docket_masters.Docket_No")  
        ->leftjoin("drs_deliveries","drs_deliveries.id","drs_delivery_transactions.Drs_id")  
        ->leftjoin('employees as DelvEMP','DelvEMP.user_id','drs_delivery_transactions.CreatedBy')
        ->leftjoin("office_masters as DRSOffice","DRSOffice.id","DelvEMP.OfficeName")

        ->leftjoin("Regular_Deliveries","Regular_Deliveries.Docket_ID","docket_masters.Docket_No")  
        ->leftjoin("office_masters as DelvOff","DelvOff.id","Regular_Deliveries.Dest_Office_Id") 
        ->select('docket_masters.Docket_No','office_masters.OfficeName','docket_masters.Booking_Date','ScourceCity.CityName as SourceCity','DestCity.CityName as DestCity','docket_booking_types.BookingType','docket_product_details.Qty','docket_product_details.Actual_Weight','docket_product_details.Charged_Weight','tariff_types.Freight','Docket_Collection_Trans.Amt','CollectionOffice.OfficeName as CollectionOffice','customer_masters.CustomerName',
        'Regular_Deliveries.Delivery_date','drs_deliveries.D_Date','DelvOff.OfficeName as DOfficeName','DRSOffice.OfficeName as DRSOfficeName')
         ->whereIn('docket_masters.Booking_Type',[3,4])
         ->whereNull('Docket_Collection_Trans.Amt')
         ->orderBy('CollectionOffice.OfficeName','ASC')
        ->get();
        $office= DocketMaster::
         leftjoin("office_masters as CollectionOffice","CollectionOffice.id","docket_masters.Office_ID")
       ->select('CollectionOffice.OfficeName as CollectionOffice')
        ->whereIn('docket_masters.Booking_Type',[3,4])
         ->orderBy('CollectionOffice.OfficeName','ASC')
        ->groupBy('CollectionOffice.OfficeName')
       ->get();
       
        
        $DocketTotals=DocketMaster::
        leftjoin("office_masters","office_masters.id","docket_masters.Office_ID")
       ->leftjoin("docket_booking_types","docket_booking_types.id","docket_masters.Booking_Type")
       ->leftJoin('pincode_masters as ScourcePinCode', 'ScourcePinCode.id', '=', 'docket_masters.Origin_Pin')
       ->leftJoin('pincode_masters as DestPinCode', 'DestPinCode.id', '=', 'docket_masters.Dest_Pin')
       ->leftJoin('cities as ScourceCity', 'ScourceCity.id', '=', 'ScourcePinCode.city')
       ->leftJoin('cities as DestCity', 'DestCity.id', '=', 'DestPinCode.city')
       ->leftjoin("Docket_Collection_Trans","Docket_Collection_Trans.Docket_Id","docket_masters.id")
       ->leftjoin('docket_product_details','docket_masters.id','docket_product_details.Docket_Id')
       ->leftjoin('tariff_types','tariff_types.Docket_Id','docket_masters.id')
       ->leftjoin('customer_masters','customer_masters.id','docket_masters.Cust_Id')
       ->leftjoin('employees','employees.user_id','Docket_Collection_Trans.Created_By')
       ->leftjoin("office_masters as CollectionOffice","CollectionOffice.id","docket_masters.Office_ID")
       ->select(DB::raw("SUM( CASE WHEN docket_masters.id!='' THEN docket_product_details.Qty END) as TotPiece"),DB::raw("COUNT(DISTINCT  docket_masters.id) as TotatlDocket")
       ,DB::raw("SUM( CASE WHEN docket_masters.id!='' THEN docket_product_details.Actual_Weight END) as TotActual_Weight")
       ,DB::raw("SUM( CASE WHEN docket_masters.id!='' THEN docket_product_details.Charged_Weight END) as TotCharged_Weight"),
       DB::raw("SUM( CASE WHEN docket_masters.id!='' THEN  tariff_types.Freight END) as TotAmount") )
        ->whereIn('docket_masters.Booking_Type',[3,4])
        ->whereNull('Docket_Collection_Trans.Amt')
        ->orderBy('CollectionOffice.OfficeName','ASC')
       ->first();
      if($request->get('submit')=="Download"){
        return $this->TopayCollectionDashbordExport($allTopay,$office);
      }
       return view('Operation.dashboardDetailPendingTodayList', [
             'title'=>'CASH To Pay Collection Report',
             'AllTopay'=>$allTopay,
             'office'=>$office,
              'DocketTotals'=>$DocketTotals
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
     * @param  \App\Http\Requests\StoreCashTopayCollectionDashbordRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCashTopayCollectionDashbordRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reports\CashTopayCollectionDashbord  $cashTopayCollectionDashbord
     * @return \Illuminate\Http\Response
     */
    public function show(CashTopayCollectionDashbord $cashTopayCollectionDashbord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reports\CashTopayCollectionDashbord  $cashTopayCollectionDashbord
     * @return \Illuminate\Http\Response
     */
    public function edit(CashTopayCollectionDashbord $cashTopayCollectionDashbord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCashTopayCollectionDashbordRequest  $request
     * @param  \App\Models\Reports\CashTopayCollectionDashbord  $cashTopayCollectionDashbord
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCashTopayCollectionDashbordRequest $request, CashTopayCollectionDashbord $cashTopayCollectionDashbord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reports\CashTopayCollectionDashbord  $cashTopayCollectionDashbord
     * @return \Illuminate\Http\Response
     */
    public function destroy(CashTopayCollectionDashbord $cashTopayCollectionDashbord)
    {
        //
    }

    public function TopayCollectionDashbordExport($data,$office)
    {
            $timestamp = date('Y-m-d');
            $filename = 'TopayCollectionDashboard' . $timestamp . '.xls';
            header("Content-Type: application/vnd.ms-excel");
            header("Content-Disposition: attachment; filename=\"$filename\"");
            echo '<body style="border: 0.1pt solid #000"> ';
            echo '<table class="table table-bordered table-striped table-actions">
                 <thead class="#fff">
              <tr class="main-title text-dark">                                     
              <th style="min-width:100px;" class="p-1 text-center">SL#</th>
              <th style="min-width:130px;" class="p-1 text-start">Collection Office</th>
              <th style="min-width:150px;" class="p-1 text-start">Book Date</th>
              <th style="min-width:160px;" class="p-1 text-start">Sale Type</th>
              <th style="min-width:130px;" class="p-1 text-start">Booking Branch</th> 
              <th style="min-width:160px;" class="p-1 text-start">Origin</th> 
              <th style="min-width:130px;" class="p-1 text-start">Dest.</th> 
               <th style="min-width:130px;" class="p-1 text-start">Docket No</th>  
              <th style="min-width:130px;" class="p-1 text-start"> Client Name</th>
              <th style="min-width:130px;" class="p-1 text-end"> Pcs.</th>
              <th style="min-width:130px;" class="p-1 text-end">Act. Wt.</th>
               <th style="min-width:130px;" class="p-1 text-end">Chrg. Wt.</th>
              <th style="min-width:130px;" class="p-1 text-end">Amount</th>
              <th style="min-width:130px;" class="p-1 text-start">Delivery Branch</th>
              <th style="min-width:130px;" class="p-1 text-start">Delivery date</th></tr>
               </thead> <tbody>';    
               $sumQty=0;
                $sumActual=0;
                $sumCharhe=0;
                $grandQTY=0;
                $grandActual =0;
                $grandCharhe=0;
                $grandAmount=0;
                $i=0;
               foreach($office as $offcies ) 
               {
                
                $sumQty=0;
                $sumActual=0;
                $sumCharhe=0;
                $sumAmount=0;
                foreach($data as  $key => $value){
                    if($offcies->CollectionOffice==$value->CollectionOffice){
                    if(isset($value->D_Date)){
                        $DRSDate= date("d-m-Y",strtotime($value->D_Date));
                    }
                    else{
                        $DRSDate= '';
                    }
                
                $i++;
               echo '<tr>'; 
               echo   '<td>'.$i.'</td>';
               echo   '<td>'.$value->CollectionOffice .'</td>';
               echo   '<td>'.$value->Booking_Date .'</td>';
             echo   '<td>'.$value->BookingType .'</td>';
                 echo   '<td>'.$value->OfficeName .'</td>';
                  echo   '<td>'.$value->SourceCity.'</td>'; 
                 echo   '<td>'.$value->DestCity.'</td>';
                 echo   '<td>'.$value->Docket_No .'</td>';
                 echo   '<td>'.$value->CustomerName .'</td>';
                 echo   '<td>'.$value->Qty .'</td>';
                 echo   '<td>'.$value->Actual_Weight .'</td>';
                 echo   '<td>'.$value->Charged_Weight .'</td>';
                 echo   '<td>'.$value->Freight .'</td>';

                 echo   '<td>'.isset($value->DOfficeName)?$value->DOfficeName:$value->DRSOfficeName .'</td>';
                 echo   '<td>'.isset($value->Delivery_date)?date("d-m-Y",strtotime($value->Delivery_date)):$DRSDate.'</td>';
               echo  '</tr>'; 
               

               $sumQty+=$value->Qty;
               $sumActual+=$value->Actual_Weight;
               $sumCharhe+=$value->Charged_Weight;
               $sumAmount+=$value->Freight;
            }
            }
                echo '<tr style="background: grey;">'; 
                echo   '<td>'.$i.'</td>';
                echo   '<td><b>'.'SUB Total'.'</b></td>';
                echo   '<td></td>';
                echo   '<td></td>';
                echo   '<td></td>';
                echo   '<td></td>';
                echo   '<td></td>';
                echo   '<td></td>';
                echo   '<td></td>';
                echo   '<td><b>'.$sumQty.'</b></td>';
                echo   '<td><b>'.$sumActual.'</b></td>';
                echo   '<td><b>'.$sumCharhe.'</b></td>';
                echo   '<td><b>'.number_format($sumAmount,2,".","").'</b></td>';
                echo   '<td></td>';
                echo   '<td></td></tr>';

                $grandQTY +=$sumQty;
                $grandActual +=$sumActual;
                $grandCharhe +=$sumCharhe;
                $grandAmount +=$sumAmount;
        }

                echo '<tr style="background: grey;">'; 
                echo   '<td>'.'</td>';
                echo   '<td><b>'.'Total'.'</b></td>';
                echo   '<td></td>';
                echo   '<td></td>';
                echo   '<td></td>';
                echo   '<td></td>';
                echo   '<td></td>';
                echo   '<td></td>';
                echo   '<td></td>';
                echo   '<td><b>'.$grandQTY.'</b></td>';
                echo   '<td><b>'.$grandActual.'</b></td>';
                echo   '<td><b>'.$grandCharhe.'</b></td>';
                echo   '<td><b>'.number_format($grandAmount,2,".","").'</b></td>';
                echo   '<td></td>';
                echo   '<td></td></tr>';
                echo   '</tbody>
                   </table>';
                  exit(); 
    }
}
