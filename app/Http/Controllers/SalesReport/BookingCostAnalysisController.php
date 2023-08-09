<?php

namespace App\Http\Controllers\SalesReport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBookingCostAnalysisRequest;
use App\Http\Requests\UpdateBookingCostAnalysisRequest;
use App\Models\SalesReport\BookingCostAnalysis;
use App\Models\Operation\DocketMaster;
use App\Models\Operation\DocketBookingType;

use App\Models\Account\CustomerMaster;
use DB;

class BookingCostAnalysisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        //

        $date =[];
        $CustomerData = '';
        $saleType ='';
        $SaleDiff= '';

        if($req->formDate){
            $date['formDate']=  date("Y-m-d",strtotime($req->formDate));
        }
        else{
            $date['formDate']=date('Y-m-d', strtotime('-2 day'));
        }
        
        if($req->todate){
           $date['todate']=  date("Y-m-d",strtotime($req->todate));
        }
        else{
            $date['todate']=  date("Y-m-d");
        }
        
       
        if(isset($req->Customer)){
            $CustomerData =  $req->Customer;
        }

        if(isset($req->saleType)){
            $saleType =  $req->saleType;
        }

        if(isset($req->saleDiff)){
            $saleDiff =  $req->saleDiff;
        }
        
        $Customer=CustomerMaster::select('customer_masters.*')->where("Active","Yes")->get();
        $sale = DocketBookingType::groupBy("Type")->get();
        $Booking=DocketMaster::with('customerNewDetails')
        ->where(function($query) use($CustomerData){
            if($CustomerData!=''){
               $query->where("docket_masters.Cust_Id",$CustomerData);
            }
           })
           ->where(function($query) use($saleType){
            if($saleType!=''){
                
               $query->whereRelation("BookignTypeDetails","Type","=",$saleType);
              
            }
           
          
           })
        ->where(function($query) use($date){
            if(isset($date['formDate']) &&  isset($date['todate'])){
                $query->whereBetween(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),[$date['formDate'],$date['todate']]);
            }
        })
        ->groupBy('Cust_Id')
        ->paginate(10);
        if($req->submit=="Download"){
            return  $this->BookingCostAnalysis($date,$CustomerData, $saleType, $SaleDiff);
        }
      
        return view('SalesReport.BookingCostAnalysis', [
            'title'=>'Booking Cost Analysis Report',
            'Booking'=> $Booking,
            'Customer' => $Customer,
            'sale'=> $sale]);

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
     * @param  \App\Http\Requests\StoreBookingCostAnalysisRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookingCostAnalysisRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SalesReport\BookingCostAnalysis  $bookingCostAnalysis
     * @return \Illuminate\Http\Response
     */
    public function show(BookingCostAnalysis $bookingCostAnalysis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SalesReport\BookingCostAnalysis  $bookingCostAnalysis
     * @return \Illuminate\Http\Response
     */
    public function edit(BookingCostAnalysis $bookingCostAnalysis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookingCostAnalysisRequest  $request
     * @param  \App\Models\SalesReport\BookingCostAnalysis  $bookingCostAnalysis
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookingCostAnalysisRequest $request, BookingCostAnalysis $bookingCostAnalysis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SalesReport\BookingCostAnalysis  $bookingCostAnalysis
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookingCostAnalysis $bookingCostAnalysis)
    {
        //
    }

    public function BookingCostAnalysis($date,$CustomerData, $saleType, $SaleDiff){
        //   header( "Content-type: application/vnd.ms-excel; charset=UTF-8" ); 
        $timestamp = date('Y-m-d');
        $filename = 'BookingCostAnalysisReport' . $timestamp . '.xls';
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$filename\"");
        $Customer=CustomerMaster::select('customer_masters.*')->where("Active","Yes")->get();
        $sale = DocketBookingType::groupBy("Type")->get();
        $Booking=DocketMaster::with('customerNewDetails')
        ->where(function($query) use($CustomerData){
            if($CustomerData!=''){
               $query->where("docket_masters.Cust_Id",$CustomerData);
            }
           })
           ->where(function($query) use($saleType){
            if($saleType!=''){
                
               $query->whereRelation("BookignTypeDetails","Type","=",$saleType);
              
            }
           
          
           })
        ->where(function($query) use($date){
            if(isset($date['formDate']) &&  isset($date['todate'])){
                $query->whereBetween(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),[$date['formDate'],$date['todate']]);
            }
        })
        ->groupBy('Cust_Id')
        ->get();
echo "\xEF\xBB\xBF";
echo <<<DDHERE
    <table class="table table-bordered table-centered mb-1 mt-1">
            <thead>
            <tr class="main-title">
                
                <th style="min-width:100px;" class="p-1">SL#</th>
                <th style="min-width:180px;" class="p-1">Customer Name</th>
                <th style="min-width:130px;" class="p-1">Docket No. </th>
                <th style="min-width:260px;" class="p-1">Origin - Dest</th>
                <th style="min-width:130px;" class="p-1">Load Type</th>
                <th style="min-width:130px;" class="p-1">Sale Type</th>
                <th style="min-width:130px;" class="p-1">Pcs.</th>
                <th style="min-width:130px;" class="p-1">Act. Wt.</th>
                <th style="min-width:130px;" class="p-1">Vendor Name</th>
                <th style="min-width:130px;" class="p-1">Transport Name</th>	
                <th style="min-width:130px;" class="p-1"> Sallling Cost</th>
                <th style="min-width:130px;" class="p-1"> Purchasing Cost</th>
                <th style="min-width:130px;" class="p-1">Diffrance</th>
                <th style="min-width:130px;" class="p-1">Diff %</th>
                
            </tr>
    </thead>
            <tbody>
DDHERE;

        $i=0; 
        $gsum=0;
        foreach($Booking as $DockBookData){

            $sum=0;
            foreach($DockBookData->customerNewDetails->DocketVolDetailss as $docketBkkoing){
                if(isset($DockBookData->customerNewDetails->CustomerCode)){
                   $cusc= $DockBookData->customerNewDetails->CustomerCode;
                   $cName = $DockBookData->customerDetails->CustomerName;
                }
                else{
                    $cusc= '';
                    $cName ='';
                }
                if(isset($docketBkkoing->PincodeDetails->CityDetails->Code)){
                   $orgCode= $docketBkkoing->PincodeDetails->CityDetails->Code;
                   $orgname= $docketBkkoing->PincodeDetails->CityDetails->CityName;
                }
                else{
                    $orgCode='';
                    $orgname= '';
                }
                if(isset($docketBkkoing->PincodeDetails->CityDetails->Code)){
                     $DestCode= $docketBkkoing->DestPincodeDetails->CityDetails->Code;
                   $Destname=   $docketBkkoing->DestPincodeDetails->CityDetails->CityName;
                }
                else{
                    $DestCode= '';
                    $Destname= '';
                }

                if(isset($docketBkkoing->BookignTypeDetails->BookingType)){
                    $bkt =$docketBkkoing->BookignTypeDetails->BookingType;
                }
                else{
                    $bkt ="";
                }
                if(isset($docketBkkoing->BookignTypeDetails->BookingType)){
                    $bkt =$docketBkkoing->BookignTypeDetails->BookingType;
                }
                else{
                    $bkt ="";
                }

                if(isset($docketBkkoing->DocketProductDetails->Qty)){
                    $Qty = $docketBkkoing->DocketProductDetails->Qty;
                }
                else{
                    $Qty ="";
                }
                if(isset($docketBkkoing->DocketProductDetails->Charged_Weight)){
                   $chrWt = $docketBkkoing->DocketProductDetails->Charged_Weight;
                }
                else{
                    $chrWt ="";
                }

                if($docketBkkoing->Booking_Type==3 || $docketBkkoing->Booking_Type==4)
                {
                 if(isset($docketBkkoing->TariffTypeDeatils->TotalAmount))
                 {
                   $total=$docketBkkoing->TariffTypeDeatils->TotalAmount;
                 }
                 else
                 {
                   $total=0;
                 }
                 
                }
                else
                {
                 $SourceCity=$docketBkkoing->PincodeDetails->city; 
                 $DestCity=$docketBkkoing->DestPincodeDetails->city; 
                 $SourceState=$docketBkkoing->PincodeDetails->State; 
                 $DestState=$docketBkkoing->DestPincodeDetails->State; 
                 $SourcePinCode=$docketBkkoing->PincodeDetails->id; 
                 $DestPinCode=$docketBkkoing->DestPincodeDetails->id; 
                 $zoneSource=$docketBkkoing->PincodeDetails->CityDetails->ZoneName;
                 $zoneDest=$docketBkkoing->DestPincodeDetails->CityDetails->ZoneName;
                 $DeliveryType=$docketBkkoing->Delivery_Type;
                 $chargeWeight=$docketBkkoing->DocketProductDetails->Charged_Weight;
                 $goodsValue=$docketBkkoing->docket_invoice_details_sum_amount;
                 $qty=$docketBkkoing->DocketProductDetails->Qty;
                 $EffectDate=date("Y-m-d", strtotime($docketBkkoing->Booking_Date));
                 $rate=Helper::CustTariff($docketBkkoing->Cust_Id,$SourceCity,$DestCity,$SourceState,$DestState,$SourcePinCode,$DestPinCode,$zoneSource,$zoneDest,$DeliveryType,$EffectDate,$chargeWeight);
                 
                 $fright=$docketBkkoing->DocketProductDetails->Charged_Weight*$rate;
                 $Chargejson=Helper::CustOtherCharge($docketBkkoing->Cust_Id,$EffectDate,$SourceCity,$DestCity,$chargeWeight,$goodsValue,$rate,$qty,$fright);
                  
   
   
                 
                 $chhh=json_decode($Chargejson);
               
                 if(isset($chhh->sum))
                 {
                   $Charge=$chhh->sum;
                 }
                 if(isset($docketBkkoing->DocketProductDetails->charge) && $docketBkkoing->DocketProductDetails->charge !='')
                     {
                         $Charge1=$docketBkkoing->DocketProductDetails->charge;
                     }
                     else
                     {
                       $Charge1=0;  
                     }
                    
                                                              
                     if(isset($docketBkkoing->customerDetails->PaymentDetails->Road))
                     {
                         $gstPer=$docketBkkoing->customerDetails->PaymentDetails->Road;
                     }
                     else
                     {
                       $gstPer=0;  
                     }
                 
                     $SourceStateCheck=$docketBkkoing->DestPincodeDetails->StateDetails->name; 
                     if($gstPer !=0)
                 {
                     if($SourceStateCheck=='Delhi')
                     {
                         $cgst=0;
                         $sgst=0;
                         $igst=($fright*$gstPer)/100;
                     }
                     else{
                         $gsthalf=$gstPer/2;
                         $cgst=($fright*$gsthalf)/100;
                         $sgst=($fright*$gsthalf)/100;
                         $igst=0; 
                     }
                 }
                 else
                 {
                     $cgst=0;
                     $sgst=0;
                     $igst=0;  
                 }
                 
                    $total=$igst+$cgst+$sgst+$fright+$Charge+$Charge1;
                }
                 

                $i++; 
                echo <<<EDDC
                <tr>
                <td class="p-1">{$i}</td>
                <td class="p-1"> {$cusc} ~ {$cName}  </td>
                <td class="p-1">{$docketBkkoing->Docket_No} </td>
                <td>  {$orgCode} ~ { $orgname} -  { $DestCode} ~ {$Destname}</td>
                <td>Console</td>
                <td> {$bkt} </td>
                <td> {$Qty} </td>
                <td> {$chrWt} </td>
                <td></td>
                <td></td>
                <td>{$total}</td>
                <td>0.00</td>
                <td>{$total}</td>
                <td>100%</td>
                </tr>
EDDC;
        $sum+=$total;
            }
        $gsum+=$sum;
        echo <<<DDCEE
            <tr class="main-title"><td colspan="10" class="text-start"><b>TOTAL:</b></td><td><b>{$sum}</b></td><td><b>0.00</b></td><td><b>0.00</b></td><td><b>100%</b></td></tr>
DDCEE;
        }
        echo <<<DDCEE
        <tr class="back-color"><td colspan="10" class="text-start"><b>GRAND TOTAL:</b></td><td><b>{$gsum}</b></td><td><b>0.00</b></td><td><b>0.00</b></td><td><b>100%</b></td></tr>
        </tbody></table>
DDCEE;
    }
}
