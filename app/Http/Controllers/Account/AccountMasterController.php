<?php

namespace App\Http\Controllers\Account;

use App\Http\Requests\StoreAccountMasterRequest;
use App\Http\Requests\UpdateAccountMasterRequest;
use App\Models\Account\AccountMaster;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Operation\DocketMaster;
use Helper;
use App\Models\OfficeSetup\OfficeMaster;
use App\Models\Account\CustomerInvoice;
use App\Models\Account\InvoiceDetails;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\SalesExport\OverdueOutstandingExport;
class AccountMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $getCustInvOut=CustomerInvoice::withSum('InvNewDetailsMoney as TotalAmount','Total')->withSum('MoneryReceptDetails as TotalMoneyAmount','Amount')->get();
      $totalInvSum=0;
      $totalMoneyRecept=0;
      foreach($getCustInvOut as $out)
      {
        $totalInvSum+=$out->TotalAmount;
        $totalMoneyRecept+=$out->TotalMoneyAmount; 
      }
        $office=OfficeMaster::get();
        $docket=DocketMaster::with('DocketProductDetails','PincodeDetails','DestPincodeDetails','customerDetails')->withSum('DocketInvoiceDetails','Amount')->get();
        $docketInvCount=DocketMaster::where('Is_invoice',1)->count('Is_invoice');
        $docketInvCountDetails=DocketMaster::where('Is_invoice',1)->get();
        $getCustInv=CustomerInvoice::with('customerDetails')->groupBy('Cust_Id')->paginate(10);
        $arrayv=array(); 
        foreach($getCustInv as $CInoice)
        {
        
          $getCustInvOne=CustomerInvoice::leftjoin("InvoiceDetails","InvoiceDetails.InvId","InvoiceMaster.id")
          ->select(DB::raw("SUM(CASE WHEN  ( InvoiceMaster.InvDate >=  DATE_SUB(CURDATE() ,INTERVAL 15 Day))   AND CURDATE() THEN  InvoiceDetails.Total END ) as lessthen15"),
          DB::raw("SUM(CASE WHEN  ( InvoiceMaster.InvDate >=  DATE_SUB(CURDATE() ,INTERVAL 31 Day))  AND ( InvoiceMaster.InvDate <=  DATE_SUB(CURDATE() ,INTERVAL 16 Day))   THEN  InvoiceDetails.Total END )  as SixteentoThirtyOne"),
          DB::raw("SUM(CASE WHEN  ( InvoiceMaster.InvDate >= DATE_SUB(CURDATE() ,INTERVAL 45 Day))     AND  ( InvoiceMaster.InvDate <= DATE_SUB(CURDATE() ,INTERVAL 31 Day))   THEN  InvoiceDetails.Total END ) as ThirtyOneto45"),
          DB::raw("SUM(CASE WHEN  ( InvoiceMaster.InvDate >=   DATE_SUB(CURDATE() ,INTERVAL 60 Day))   AND ( InvoiceMaster.InvDate <= DATE_SUB(CURDATE() ,INTERVAL 45 Day)) THEN  InvoiceDetails.Total END )    as FourtyFiveto60"),
          DB::raw("SUM(CASE WHEN  ( InvoiceMaster.InvDate  >=  DATE_SUB(CURDATE() ,INTERVAL 90 Day))    AND  ( InvoiceMaster.InvDate <= DATE_SUB(CURDATE() ,INTERVAL 60 Day))  THEN  InvoiceDetails.Total END ) as Nintyto61"),
          DB::raw("SUM(CASE WHEN  ( InvoiceMaster.InvDate  <=  DATE_SUB(CURDATE() ,INTERVAL 90 Day))      THEN  InvoiceDetails.Total END ) as greatedThennin"), "InvoiceMaster.Cust_Id"

          )->where('Cust_Id',$CInoice->Cust_Id)
          ->groupBy('InvoiceMaster.Cust_Id')
          ->get();
        
          $arrayS=array();
          $arrayS['cust']=$CInoice->customerDetails->CustomerName;
          $arrayS['data']=$getCustInvOne;
          array_push($arrayv,$arrayS);
        }
        // echo "<pre>";
        // print_r($arrayv);
        // die;
        $docketArray=array();
        $sum=0;
        $sumCount=0;
        
        foreach($docket as $docketDetails)
        {
         
         
            $SourceCity=$docketDetails->PincodeDetails->city; 
            $DestCity=$docketDetails->DestPincodeDetails->city; 
            $SourceState=$docketDetails->PincodeDetails->State; 
            $DestState=$docketDetails->DestPincodeDetails->State; 
            $SourcePinCode=$docketDetails->PincodeDetails->id; 
            $DestPinCode=$docketDetails->DestPincodeDetails->id; 
            $zoneSource=$docketDetails->PincodeDetails->CityDetails->ZoneName;
            $zoneDest=$docketDetails->DestPincodeDetails->CityDetails->ZoneName;
            $DeliveryType=$docketDetails->Delivery_Type;
            $chargeWeight=$docketDetails->DocketProductDetails->Charged_Weight;
            $goodsValue=$docketDetails->docket_invoice_details_sum_amount;
            $qty=$docketDetails->DocketProductDetails->Qty;
            $EffectDate=date("Y-m-d", strtotime($docketDetails->Booking_Date));
            $rate=Helper::CustTariff($docketDetails->Cust_Id,$SourceCity,$DestCity,$SourceState,$DestState,$SourcePinCode,$DestPinCode,$zoneSource,$zoneDest,$DeliveryType,$EffectDate,$chargeWeight);
            if($rate==00)
            {
                $checkRate=1;
            }
            else
            {
                $checkRate=0;  
            }
            $sum+=$checkRate;
           
              
        }
        foreach($docketInvCountDetails as $docketCDetails)
        {
         
         
            $SourceCity=$docketCDetails->PincodeDetails->city; 
            $DestCity=$docketCDetails->DestPincodeDetails->city; 
            $SourceState=$docketCDetails->PincodeDetails->State; 
            $DestState=$docketCDetails->DestPincodeDetails->State; 
            $SourcePinCode=$docketCDetails->PincodeDetails->id; 
            $DestPinCode=$docketCDetails->DestPincodeDetails->id; 
            $zoneSource=$docketCDetails->PincodeDetails->CityDetails->ZoneName;
            $zoneDest=$docketCDetails->DestPincodeDetails->CityDetails->ZoneName;
            $DeliveryType=$docketCDetails->Delivery_Type;
            $chargeWeight=$docketCDetails->DocketProductDetails->Charged_Weight;
            $goodsValue=$docketCDetails->docket_invoice_details_sum_amount;
            $qty=$docketCDetails->DocketProductDetails->Qty;
            $EffectDate=date("Y-m-d", strtotime($docketCDetails->Booking_Date));
            $rate=Helper::CustTariff($docketCDetails->Cust_Id,$SourceCity,$DestCity,$SourceState,$DestState,$SourcePinCode,$DestPinCode,$zoneSource,$zoneDest,$DeliveryType,$EffectDate,$chargeWeight);
            $fright=$docketCDetails->DocketProductDetails->Charged_Weight*$rate;
            $sumCount+=$fright;
           
              
        }
      $topayCollectionCash=DocketMaster::leftjoin('tariff_types','tariff_types.Docket_Id','=','docket_masters.id')->leftjoin('Docket_Collection_Trans','Docket_Collection_Trans.Docket_Id','=','docket_masters.id')->where('docket_masters.Booking_Type',3)->where('Docket_Collection_Trans.Amt','=',null)->sum('tariff_types.TotalAmount');
       $topayCollectionTpPay=DocketMaster::leftjoin('tariff_types','tariff_types.Docket_Id','=','docket_masters.id')->leftjoin('Docket_Collection_Trans','Docket_Collection_Trans.Docket_Id','=','docket_masters.id')->where('docket_masters.Booking_Type',4)->where('Docket_Collection_Trans.Amt','=',null)->sum('tariff_types.TotalAmount');
      
        return view('Account.AccountDashboard', [
            'title'=>'DASHBOARD',
            'error'=>$sum,
            'PendingBilling'=>$docketInvCount,
            'sumCount'=>$sumCount,
            'office'=>$office,
            'BillGen'=>$arrayv,
            'getCustInv'=>$getCustInv,
            'totalInvSum'=>$totalInvSum,
            'totalMoneyRecept'=>$totalMoneyRecept,
            'topayCollection'=>$topayCollectionCash,
            'topayDeposite'=>$topayCollectionTpPay
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
    public function FreightErrorDashboard(Request $request)
    {
        $docket=DocketMaster::with('DocketProductDetails','PincodeDetails','DestPincodeDetails','customerDetails','DevileryTypeDet','offcieDetails')->withSum('DocketInvoiceDetails','Amount')->get();
        
         $docketArray=array();
        foreach($docket as $docketDetails)
        {
         
         
            $SourceCity=$docketDetails->PincodeDetails->city; 
            $DestCity=$docketDetails->DestPincodeDetails->city; 
            $SourceState=$docketDetails->PincodeDetails->State; 
            $DestState=$docketDetails->DestPincodeDetails->State; 
            $SourcePinCode=$docketDetails->PincodeDetails->id; 
            $DestPinCode=$docketDetails->DestPincodeDetails->id; 
            $zoneSource=$docketDetails->PincodeDetails->CityDetails->ZoneName;
            $zoneDest=$docketDetails->DestPincodeDetails->CityDetails->ZoneName;
            $DeliveryType=$docketDetails->Delivery_Type;
            $chargeWeight=$docketDetails->DocketProductDetails->Charged_Weight;
            $goodsValue=$docketDetails->docket_invoice_details_sum_amount;
            $qty=$docketDetails->DocketProductDetails->Qty;
            $EffectDate=date("Y-m-d", strtotime($docketDetails->Booking_Date));
            $rate=Helper::CustTariff($docketDetails->Cust_Id,$SourceCity,$DestCity,$SourceState,$DestState,$SourcePinCode,$DestPinCode,$zoneSource,$zoneDest,$DeliveryType,$EffectDate,$chargeWeight);
            $fright=$docketDetails->DocketProductDetails->Charged_Weight*$rate;
             if($rate==00)
             {
              $data=array(
              'Customer'=>$docketDetails->customerDetails->CustomerName,
              'origin'=>$docketDetails->PincodeDetails->CityDetails->CityName,
              'Dest'=>$docketDetails->DestPincodeDetails->CityDetails->CityName,
              'originZone'=>$docketDetails->PincodeDetails->CityDetails->ZoneDetails->ZoneName,
              'DestZone'=>$docketDetails->DestPincodeDetails->CityDetails->ZoneDetails->ZoneName,
              'Booking_Date'=>date("d-m-Y", strtotime($docketDetails->Booking_Date)),
              'PTL'=>'PART TRUCK LOAD',
              'Mode'=>$docketDetails->Mode,
              'DeliveryType'=>$docketDetails->DevileryTypeDet->Title,
              'Docket_No'=>$docketDetails->Docket_No,
              'Qty'=>$docketDetails->DocketProductDetails->Qty,
              'Office'=>$docketDetails->offcieDetails->OfficeName,
              'Charged_Weight'=>$docketDetails->DocketProductDetails->Charged_Weight,
              
              );
              array_push($docketArray,$data);
            }
        }
        if($request->get("submit")=="Download"){
          return $this->DownloadFreightError($docketArray);
        }
        return view('Account.FreightErrorDashboard', [
            'title'=>'ERROR - FREIGHT DASHBOARDP',
            'DocketData'=>$docketArray
         ]);
    }
    public function PendingShipmentBillDashboard(Request $request)
    {
        $docket=DocketMaster::with('DocketProductDetails','PincodeDetails','DestPincodeDetails','customerDetails','DevileryTypeDet','offcieDetails')->withSum('DocketInvoiceDetails','Amount')->where('Is_invoice',1)->get();
        
        $docketArray=array();
       foreach($docket as $docketDetails)
       {
        
        
           $SourceCity=$docketDetails->PincodeDetails->city; 
           $DestCity=$docketDetails->DestPincodeDetails->city; 
           $SourceState=$docketDetails->PincodeDetails->State; 
           $DestState=$docketDetails->DestPincodeDetails->State; 
           $SourcePinCode=$docketDetails->PincodeDetails->id; 
           $DestPinCode=$docketDetails->DestPincodeDetails->id; 
           $zoneSource=$docketDetails->PincodeDetails->CityDetails->ZoneName;
           $zoneDest=$docketDetails->DestPincodeDetails->CityDetails->ZoneName;
           $DeliveryType=$docketDetails->Delivery_Type;
           $chargeWeight=$docketDetails->DocketProductDetails->Charged_Weight;
           $goodsValue=$docketDetails->docket_invoice_details_sum_amount;
           $qty=$docketDetails->DocketProductDetails->Qty;
           $EffectDate=date("Y-m-d", strtotime($docketDetails->Booking_Date));
           $rate=Helper::CustTariff($docketDetails->Cust_Id,$SourceCity,$DestCity,$SourceState,$DestState,$SourcePinCode,$DestPinCode,$zoneSource,$zoneDest,$DeliveryType,$EffectDate,$chargeWeight);
           $fright=$docketDetails->DocketProductDetails->Charged_Weight*$rate;
            $Chargejson=Helper::CustOtherCharge($docketDetails->Cust_Id,$EffectDate,$SourceCity,$DestCity,$chargeWeight,$goodsValue,$rate,$qty,$fright);
            $chhh=json_decode($Chargejson);
            
            if(isset($chhh->sum))
            {
              $Charge=$chhh->sum;
            }
          
            $charCal=$chhh->charge;
            if(isset($docketDetails->DocketProductDetails->charge) && $docketDetails->DocketProductDetails->charge !='')
                {
                    $Charge1=$docketDetails->DocketProductDetails->charge;
                    $charCal2['title']=$docketDetails->DocketProductDetails->DocketChargeDetails->Title;
                    $charCal2['Amount']=$docketDetails->DocketProductDetails->charge;
                   array_push($charCal,$charCal2);
                  }
                else
                {
                  $Charge1=0;  
                }
                $charegSting=json_encode($charCal);
                                                         
                if(isset($docketDetails->customerDetails->PaymentDetails->Road))
                {
                    $gstPer=$docketDetails->customerDetails->PaymentDetails->Road;
                }
                else
                {
                  $gstPer=0;  
                }
            
                $SourceStateCheck=$docketDetails->DestPincodeDetails->StateDetails->name; 
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
            
             $data=array(
             'CustomerCode'=>$docketDetails->customerDetails->CustomerCode,
             'Customer'=>$docketDetails->customerDetails->CustomerName,
             'origin'=>$docketDetails->PincodeDetails->CityDetails->CityName,
             'Dest'=>$docketDetails->DestPincodeDetails->CityDetails->CityName,
             'Booking_Date'=>date("d-m-Y", strtotime($docketDetails->Booking_Date)),
             'PTL'=>'PART TRUCK LOAD',
             'Mode'=>$docketDetails->Mode,
             'DeliveryType'=>$docketDetails->DevileryTypeDet->Title,
             'Docket_No'=>$docketDetails->Docket_No,
             'Qty'=>$docketDetails->DocketProductDetails->Qty,
             'Office'=>$docketDetails->offcieDetails->OfficeName,
             'Charged_Weight'=>$docketDetails->DocketProductDetails->Charged_Weight,
             'rate'=>$rate,
             'fright'=>$fright,
             'Charge'=>$Charge+$Charge1,
             'cgst'=>$cgst,
             'scst'=>$sgst,
             'igst'=>$igst,
             'total'=> $total,
             
             );
             array_push($docketArray,$data);
           
       }
       if($request->get('submit')=="Download"){ 
        return $this->PendingShipmentBillDownload($docketArray);
       }
       return view('Account.PendingShipmentBillDashboard', [
           'title'=>'PENDING SHIPMENT FOR BILL GENERATION',
           'DocketData'=>$docketArray
        ]);
    }
    public function  GateSaleDataForChart(Request $request)
    {
         
         $currentarrayMonth=array();
         $dataArrayOne=array();
         $dataArrayTwo=array();
         $dataArrayThree=array();
         $currentYear= date("Y");
         $office='';
         $year='';
         if(isset($request->office) && $request->office !='')
         {
            $office=$request->office;
         }
         if(isset($request->year) && $request->year !='' && $request->year < $currentYear)
         {
            $currentYear=$request->year; 
            $currentMonth=12;
         }
         else{
           
            $currentMonth= date("n");
            $currentYear= date("Y");
         }
       for($currentMonth; $currentMonth >=1; $currentMonth--)
       {
        $docketOne=DocketMaster::with('DocketProductDetails','PincodeDetails','DestPincodeDetails','customerDetails')->withSum('DocketInvoiceDetails','Amount')->whereMonth('Booking_Date',$currentMonth)->whereMonth('Booking_Date',$currentMonth)->whereYear('Booking_Date',$currentYear)->where('Booking_Type',1)
        ->where(function($query) use($office)
        {
          if($office !='')
          {
            $query->where('Office_ID',$office);  
          }
        })->get();
     
        $frightSum=0;
        foreach($docketOne as $docketDetails)
        {
         
         
            $SourceCity1=$docketDetails->PincodeDetails->city; 
            $DestCity1=$docketDetails->DestPincodeDetails->city; 
            $SourceState1=$docketDetails->PincodeDetails->State; 
            $DestState1=$docketDetails->DestPincodeDetails->State; 
            $SourcePinCode1=$docketDetails->PincodeDetails->id; 
            $DestPinCode1=$docketDetails->DestPincodeDetails->id; 
            $zoneSource1=$docketDetails->PincodeDetails->CityDetails->ZoneName;
            $zoneDest1=$docketDetails->DestPincodeDetails->CityDetails->ZoneName;
            $DeliveryType1=$docketDetails->Delivery_Type;
            $chargeWeight1=$docketDetails->DocketProductDetails->Charged_Weight;
            $goodsValue1=$docketDetails->docket_invoice_details_sum_amount;
            $qty1=$docketDetails->DocketProductDetails->Qty;
            $EffectDate1=date("Y-m-d", strtotime($docketDetails->Booking_Date));
            $rate1=Helper::CustTariff($docketDetails->Cust_Id,$SourceCity1,$DestCity1,$SourceState1,$DestState1,$SourcePinCode1,$DestPinCode1,$zoneSource1,$zoneDest1,$DeliveryType1,$EffectDate1,$chargeWeight1);
            $fright1=$docketDetails->DocketProductDetails->Charged_Weight*$rate1;
            $SourceStateCheck=$docketDetails->DestPincodeDetails->StateDetails->name; 
            if(isset($docketDetails->customerDetails->PaymentDetails->Road))
            {
                $gstPer=$docketDetails->customerDetails->PaymentDetails->Road;
            }
            else
            {
              $gstPer=0;  
            }
       
            if($gstPer !=0)
            {
                if($SourceStateCheck=='Delhi')
                {
                    $cgst=0;
                    $sgst=0;
                    $igst=($fright1*$gstPer)/100;
                }
                else{
                    $gsthalf=$gstPer/2;
                    $cgst=($fright1*$gsthalf)/100;
                    $sgst=($fright1*$gsthalf)/100;
                    $igst=0; 
                }
            }
            else
            {
                $cgst=0;
                $sgst=0;
                $igst=0;  
            }
            if(in_array('4',$request->val))
            {
              $frightSum+=($fright1+$cgst+$sgst+$igst);
            }
            else
            {
              $frightSum+=$fright1;
            }
            
        }
       
        array_push($dataArrayOne,$frightSum);
        $docketTwo=DocketMaster::with('DocketProductDetails','PincodeDetails','DestPincodeDetails','customerDetails')->withSum('DocketInvoiceDetails','Amount')->whereMonth('Booking_Date',$currentMonth)->whereYear('Booking_Date',$currentYear)->where('Booking_Type',3) ->where(function($query) use($office)
        {
          if($office !='')
          {
            $query->where('Office_ID',$office);  
          }
        })->get();
        $frightSumTwo=0;
        foreach($docketTwo as $docketDetailsTwo)
        {
         
         
            $SourceCity2=$docketDetailsTwo->PincodeDetails->city; 
            $DestCity2=$docketDetailsTwo->DestPincodeDetails->city; 
            $SourceState2=$docketDetailsTwo->PincodeDetails->State; 
            $DestState2=$docketDetailsTwo->DestPincodeDetails->State; 
            $SourcePinCode2=$docketDetailsTwo->PincodeDetails->id; 
            $DestPinCode2=$docketDetailsTwo->DestPincodeDetails->id; 
            $zoneSource2=$docketDetailsTwo->PincodeDetails->CityDetails->ZoneName;
            $zoneDest2=$docketDetailsTwo->DestPincodeDetails->CityDetails->ZoneName;
            $DeliveryType2=$docketDetailsTwo->Delivery_Type;
            $chargeWeight2=$docketDetailsTwo->DocketProductDetails->Charged_Weight;
            $goodsValue2=$docketDetailsTwo->docket_invoice_details_sum_amount;
            $qty2=$docketDetailsTwo->DocketProductDetails->Qty;
            $EffectDate2=date("Y-m-d", strtotime($docketDetailsTwo->Booking_Date));
            $rate2=Helper::CustTariff($docketDetailsTwo->Cust_Id,$SourceCity2,$DestCity2,$SourceState2,$DestState2,$SourcePinCode2,$DestPinCode2,$zoneSource2,$zoneDest2,$DeliveryType2,$EffectDate2,$chargeWeight2);
            $fright2=$docketDetailsTwo->DocketProductDetails->Charged_Weight*$rate2;
            $frightSumTwo+=$fright2;
            $SourceStateCheck1=$docketDetailsTwo->DestPincodeDetails->StateDetails->name; 
            if(isset($docketDetailsTwo->customerDetails->PaymentDetails->Road))
            {
                $gstPer1=$docketDetailsTwo->customerDetails->PaymentDetails->Road;
            }
            else
            {
              $gstPer1=0;  
            }
          
            if($gstPer1 !=0)
            {
                if($SourceStateCheck1=='Delhi')
                {
                    $cgst1=0;
            $sgst1=0;
            $igst1=($fright2*$gstPer1)/100;
                }
                else{
                    $gsthalf1=$gstPer1/2;
                    $cgst1=($fright2*$gsthalf1)/100;
                    $sgst1=($fright2*$gsthalf1)/100;
                    $igst1=0; 
                }
            }
            else
            {
                $cgst1=0;
                $sgst1=0;
                $igst1=0;  
            }
            if(in_array('4',$request->val))
            {
              $frightSumTwo+=($fright2+$cgst1+$sgst1+$igst1);
            }
            else
            {
              $frightSumTwo+=$fright2;
            }
        }
    
        array_push($dataArrayTwo,$frightSumTwo);
        $docketThree=DocketMaster::with('DocketProductDetails','PincodeDetails','DestPincodeDetails','customerDetails')->withSum('DocketInvoiceDetails','Amount')->whereMonth('Booking_Date',$currentMonth)->whereYear('Booking_Date',$currentYear)->where('Booking_Type',4) ->where(function($query) use($office)
        {
          if($office !='')
          {
            $query->where('Office_ID',$office);  
          }
        })->get();
        $frightSumThree=0;
        foreach($docketThree as $docketDetailsThree)
        {
         
         
            $SourceCity3=$docketDetailsThree->PincodeDetails->city; 
            $DestCity3=$docketDetailsThree->DestPincodeDetails->city; 
            $SourceState3=$docketDetailsThree->PincodeDetails->State; 
            $DestState3=$docketDetailsThree->DestPincodeDetails->State; 
            $SourcePinCode3=$docketDetailsThree->PincodeDetails->id; 
            $DestPinCode3=$docketDetailsThree->DestPincodeDetails->id; 
            $zoneSource3=$docketDetailsThree->PincodeDetails->CityDetails->ZoneName;
            $zoneDest3=$docketDetailsThree->DestPincodeDetails->CityDetails->ZoneName;
            $DeliveryType3=$docketDetailsThree->Delivery_Type;
            $chargeWeight3=$docketDetailsThree->DocketProductDetails->Charged_Weight;
            $goodsValue3=$docketDetailsThree->docket_invoice_details_sum_amount;
            $qty3=$docketDetailsThree->DocketProductDetails->Qty;
            $EffectDate3=date("Y-m-d", strtotime($docketDetailsThree->Booking_Date));
            $rate3=Helper::CustTariff($docketDetailsThree->Cust_Id,$SourceCity3,$DestCity3,$SourceState3,$DestState3,$SourcePinCode3,$DestPinCode3,$zoneSource3,$zoneDest3,$DeliveryType3,$EffectDate3,$chargeWeight3);
            $fright3=$docketDetailsThree->DocketProductDetails->Charged_Weight*$rate3;
            $SourceStateCheck3=$docketDetailsThree->DestPincodeDetails->StateDetails->name; 
            if(isset($docketDetailsThree->customerDetails->PaymentDetails->Road))
            {
                $gstPer3=$docketDetailsThree->customerDetails->PaymentDetails->Road;
            }
            else
            {
              $gstPer3=0;  
            }
           
            if($gstPer3 !=0)
            {
                if($SourceStateCheck3=='Delhi')
                {
                    $cgst3=0;
                    $sgst3=0;
                    $igst3=($fright3*$gstPer3)/100;
                }
                else{
                    $gsthalf3=$gstPer3/2;
                    $cgst3=($fright3*$gsthalf3)/100;
                    $sgst3=($fright3*$gsthalf3)/100;
                    $igst3=0; 
                }
            }
            else
            {
                $cgst3=0;
                $sgst3=0;
                $igst3=0;  
            }
            if(in_array('4',$request->val))
            {
              $frightSumThree+=($fright3+$cgst3+$sgst3+$igst3);
            }
            else
            {
              $frightSumThree+=$fright3;
            }
           
        }
        array_push($currentarrayMonth,$currentMonth);
        array_push($dataArrayThree,$frightSumThree);
       
       }
      
       $month=(array_reverse($currentarrayMonth));
       $frightTotalSum=(array_reverse($dataArrayOne));
       $frightTotalSumTwo=(array_reverse($dataArrayTwo));
       $frightTotalSumThree=(array_reverse($dataArrayThree));
       if(in_array('1',$request->val))
       {
       $dataSetOne[]=array('label'=>'Credit Sale','data'=>$frightTotalSum,'borderWidth'=>1);
       }
       if(in_array('2',$request->val))
       {
        $dataSetOne[]=array('label'=>'Cash Sale','data'=>$frightTotalSumTwo,'borderWidth'=>1);
       }
       if(in_array('3',$request->val))
       {
        $dataSetOne[]=array('label'=>'Topay Sale','data'=>$frightTotalSumThree,'borderWidth'=>1);
       }
     $datap=array('month'=>$month,'dataSetOne'=>$dataSetOne);
     $PPPP=json_encode($datap);
        return view('Account.AccountDashBoradChartOne', [
            'title'=>'PENDING SHIPMENT FOR BILL GENERATION',
            'PPPP'=>$PPPP
         ]);
    }
    public function GateSaleDataForChartTwo(Request $request)
    {
        $currentarrayMonth=array();
         $dataArrayOne=array();
         $dataArrayTwo=array();
         $dataArrayThree=array();
         $currentYear= date("Y");
         $office='';
         $year='';
         if(isset($request->office) && $request->office !='')
         {
            $office=$request->office;
         }
         $nmonth= date("n");
         $spppp= date("Y");
         if(isset($request->months) && $request->months && $request->months==$nmonth && $request->year==$spppp)
         {
          
             $currentMonth=date('d');
          
           
         }
         else{
           
         
             $currentMonth=cal_days_in_month(CAL_GREGORIAN,$request->months,$request->year); 
          
         
         }
       for($currentMonth; $currentMonth >=1; $currentMonth--)
       {
        $docketOne=DocketMaster::with('DocketProductDetails','PincodeDetails','DestPincodeDetails','customerDetails')->withSum('DocketInvoiceDetails','Amount')->whereDay('Booking_Date',$currentMonth)->whereMonth('Booking_Date',$request->months)->whereYear('Booking_Date',$request->year)->where('Booking_Type',1)
        ->where(function($query) use($office)
        {
          if($office !='')
          {
            $query->where('Office_ID',$office);  
          }
        })->get();
     
        $frightSum=0;
        foreach($docketOne as $docketDetails)
        {
         
         
            $SourceCity1=$docketDetails->PincodeDetails->city; 
            $DestCity1=$docketDetails->DestPincodeDetails->city; 
            $SourceState1=$docketDetails->PincodeDetails->State; 
            $DestState1=$docketDetails->DestPincodeDetails->State; 
            $SourcePinCode1=$docketDetails->PincodeDetails->id; 
            $DestPinCode1=$docketDetails->DestPincodeDetails->id; 
            $zoneSource1=$docketDetails->PincodeDetails->CityDetails->ZoneName;
            $zoneDest1=$docketDetails->DestPincodeDetails->CityDetails->ZoneName;
            $DeliveryType1=$docketDetails->Delivery_Type;
            $chargeWeight1=$docketDetails->DocketProductDetails->Charged_Weight;
            $goodsValue1=$docketDetails->docket_invoice_details_sum_amount;
            $qty1=$docketDetails->DocketProductDetails->Qty;
            $EffectDate1=date("Y-m-d", strtotime($docketDetails->Booking_Date));
            $rate1=Helper::CustTariff($docketDetails->Cust_Id,$SourceCity1,$DestCity1,$SourceState1,$DestState1,$SourcePinCode1,$DestPinCode1,$zoneSource1,$zoneDest1,$DeliveryType1,$EffectDate1,$chargeWeight1);
            $fright1=$docketDetails->DocketProductDetails->Charged_Weight*$rate1;
            $SourceStateCheck=$docketDetails->DestPincodeDetails->StateDetails->name; 
            if(isset($docketDetails->customerDetails->PaymentDetails->Road))
            {
                $gstPer=$docketDetails->customerDetails->PaymentDetails->Road;
            }
            else
            {
              $gstPer=0;  
            }
            if($gstPer !=0)
            {
                if($SourceStateCheck=='Delhi')
                {
                $cgst=0;
                $sgst=0;
                $igst=($fright1*$gstPer)/100;
                }
                else{
                    $gsthalf=$gstPer/2;
                    $cgst=($fright1*$gsthalf)/100;
                    $sgst=($fright1*$gsthalf)/100;
                    $igst=0; 
                }
            }
            else
            {
                $cgst=0;
                $sgst=0;
                $igst=0;  
            }
        
            if(in_array('4',$request->val))
            {
              $frightSum+=($fright1+$cgst+$sgst+$igst);
            }
            else
            {
              $frightSum+=$fright1;
            }
            
        }
       
        array_push($dataArrayOne,$frightSum);
        $docketTwo=DocketMaster::with('DocketProductDetails','PincodeDetails','DestPincodeDetails','customerDetails')->withSum('DocketInvoiceDetails','Amount')->whereDay('Booking_Date',$currentMonth)->whereMonth('Booking_Date',$request->months)->whereYear('Booking_Date',$request->year)->where('Booking_Type',3) ->where(function($query) use($office)
        {
          if($office !='')
          {
            $query->where('Office_ID',$office);  
          }
        })->get();
        $frightSumTwo=0;
        foreach($docketTwo as $docketDetailsTwo)
        {
         
         
            $SourceCity2=$docketDetailsTwo->PincodeDetails->city; 
            $DestCity2=$docketDetailsTwo->DestPincodeDetails->city; 
            $SourceState2=$docketDetailsTwo->PincodeDetails->State; 
            $DestState2=$docketDetailsTwo->DestPincodeDetails->State; 
            $SourcePinCode2=$docketDetailsTwo->PincodeDetails->id; 
            $DestPinCode2=$docketDetailsTwo->DestPincodeDetails->id; 
            $zoneSource2=$docketDetailsTwo->PincodeDetails->CityDetails->ZoneName;
            $zoneDest2=$docketDetailsTwo->DestPincodeDetails->CityDetails->ZoneName;
            $DeliveryType2=$docketDetailsTwo->Delivery_Type;
            $chargeWeight2=$docketDetailsTwo->DocketProductDetails->Charged_Weight;
            $goodsValue2=$docketDetailsTwo->docket_invoice_details_sum_amount;
            $qty2=$docketDetailsTwo->DocketProductDetails->Qty;
            $EffectDate2=date("Y-m-d", strtotime($docketDetailsTwo->Booking_Date));
            $rate2=Helper::CustTariff($docketDetailsTwo->Cust_Id,$SourceCity2,$DestCity2,$SourceState2,$DestState2,$SourcePinCode2,$DestPinCode2,$zoneSource2,$zoneDest2,$DeliveryType2,$EffectDate2,$chargeWeight2);
            $fright2=$docketDetailsTwo->DocketProductDetails->Charged_Weight*$rate2;
            $frightSumTwo+=$fright2;
            $SourceStateCheck1=$docketDetailsTwo->DestPincodeDetails->StateDetails->name; 
            if(isset($docketDetailsTwo->customerDetails->PaymentDetails->Road))
            {
                $gstPer1=$docketDetailsTwo->customerDetails->PaymentDetails->Road;
            }
            else
            {
              $gstPer1=0;  
            }
            if($gstPer1 !=0)
            {
                if($SourceStateCheck1=='Delhi')
                {
                    $cgst1=0;
                    $sgst1=0;
                    $igst1=($fright2*$gstPer1)/100;
                }
                else{
                    $gsthalf1=$gstPer1/2;
                    $cgst1=($fright2*$gsthalf1)/100;
                    $sgst1=($fright2*$gsthalf1)/100;
                    $igst1=0; 
                }
            }
            else
            {
                $cgst1=0;
                $sgst1=0;
                $sgst1=0;  
            }
           
            if(in_array('4',$request->val))
            {
              $frightSumTwo+=($fright2+$cgst1+$sgst1+$igst1);
            }
            else
            {
              $frightSumTwo+=$fright2;
            }
        }
    
        array_push($dataArrayTwo,$frightSumTwo);
        $docketThree=DocketMaster::with('DocketProductDetails','PincodeDetails','DestPincodeDetails','customerDetails')->withSum('DocketInvoiceDetails','Amount')->whereDay('Booking_Date',$currentMonth)->whereMonth('Booking_Date',$request->months)->whereYear('Booking_Date',$request->year)->where('Booking_Type',4) ->where(function($query) use($office)
        {
          if($office !='')
          {
            $query->where('Office_ID',$office);  
          }
        })->get();
        $frightSumThree=0;
        foreach($docketThree as $docketDetailsThree)
        {
         
         
            $SourceCity3=$docketDetailsThree->PincodeDetails->city; 
            $DestCity3=$docketDetailsThree->DestPincodeDetails->city; 
            $SourceState3=$docketDetailsThree->PincodeDetails->State; 
            $DestState3=$docketDetailsThree->DestPincodeDetails->State; 
            $SourcePinCode3=$docketDetailsThree->PincodeDetails->id; 
            $DestPinCode3=$docketDetailsThree->DestPincodeDetails->id; 
            $zoneSource3=$docketDetailsThree->PincodeDetails->CityDetails->ZoneName;
            $zoneDest3=$docketDetailsThree->DestPincodeDetails->CityDetails->ZoneName;
            $DeliveryType3=$docketDetailsThree->Delivery_Type;
            $chargeWeight3=$docketDetailsThree->DocketProductDetails->Charged_Weight;
            $goodsValue3=$docketDetailsThree->docket_invoice_details_sum_amount;
            $qty3=$docketDetailsThree->DocketProductDetails->Qty;
            $EffectDate3=date("Y-m-d", strtotime($docketDetailsThree->Booking_Date));
            $rate3=Helper::CustTariff($docketDetailsThree->Cust_Id,$SourceCity3,$DestCity3,$SourceState3,$DestState3,$SourcePinCode3,$DestPinCode3,$zoneSource3,$zoneDest3,$DeliveryType3,$EffectDate3,$chargeWeight3);
            $fright3=$docketDetailsThree->DocketProductDetails->Charged_Weight*$rate3;
            $SourceStateCheck3=$docketDetailsThree->DestPincodeDetails->StateDetails->name; 
            if(isset($docketDetailsThree->customerDetails->PaymentDetails->Road))
            {
                $gstPer3=$docketDetailsThree->customerDetails->PaymentDetails->Road;
            }
            else
            {
              $gstPer3=0;  
            }
            if($gstPer3 !=0)
            {
                if($SourceStateCheck3=='Delhi')
                {
                    $cgst3=0;
                    $sgst3=0;
                    $igst3=($fright3*$gstPer3)/100;
                }
                else{
                    $gsthalf3=$gstPer3/2;
                    $cgst3=($fright3*$gsthalf3)/100;
                    $sgst3=($fright3*$gsthalf3)/100;
                    $igst3=0; 
                }
            }
            else
            {
                $cgst1=0;
                $sgst1=0;
                $sgst1=0;  
            }
          
            if(in_array('4',$request->val))
            {
              $frightSumThree+=($fright3+$cgst3+$sgst3+$igst3);
            }
            else
            {
              $frightSumThree+=$fright3;
            }
           
        }
        array_push($currentarrayMonth,$currentMonth);
        array_push($dataArrayThree,$frightSumThree);
       
       }
      
       $month=(array_reverse($currentarrayMonth));
       $frightTotalSum=(array_reverse($dataArrayOne));
       $frightTotalSumTwo=(array_reverse($dataArrayTwo));
       $frightTotalSumThree=(array_reverse($dataArrayThree));
       if(in_array('1',$request->val))
       {
       $dataSetOne[]=array('label'=>'Credit Sale','data'=>$frightTotalSum,'borderWidth'=>1);
       }
       if(in_array('2',$request->val))
       {
        $dataSetOne[]=array('label'=>'Cash Sale','data'=>$frightTotalSumTwo,'borderWidth'=>1);
       }
       if(in_array('3',$request->val))
       {
        $dataSetOne[]=array('label'=>'Topay Sale','data'=>$frightTotalSumThree,'borderWidth'=>1);
       }
     $datap=array('month'=>$month,'dataSetOne'=>$dataSetOne);
     $PPPP=json_encode($datap);
        return view('Account.AccountDashBoradChartTwo', [
            'title'=>'PENDING SHIPMENT FOR BILL GENERATION',
            'PPPP'=>$PPPP
         ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAccountMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAccountMasterRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account\AccountMaster  $accountMaster
     * @return \Illuminate\Http\Response
     */
    public function show(AccountMaster $accountMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account\AccountMaster  $accountMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(AccountMaster $accountMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAccountMasterRequest  $request
     * @param  \App\Models\Account\AccountMaster  $accountMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAccountMasterRequest $request, AccountMaster $accountMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account\AccountMaster  $accountMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccountMaster $accountMaster)
    {
        //
    }
    public function OverdueOutstanding(Request $request)
    {
      $getCustInv=CustomerInvoice::with('customerDetails')->withSum('InvNewDetailsMoney as TotalFright','Fright')->withSum('InvNewDetailsMoney as TotalScst','Scst')->withSum('InvNewDetailsMoney as TotalCgst','Cgst')->withSum('InvNewDetailsMoney as TotalIgst','Igst')->withSum('InvNewDetailsMoney as TotalAmount','Total')->withSum('MoneryReceptDetails as TotalMoneyAmount','Amount')->paginate(10);
      if($request->get('submit')=="Download"){ 
        return Excel::download(new OverdueOutstandingExport(),"OverdueOutstandingExport.xlsx");
        
       }
      return view('Account.OverdueOutstanding', [
        'title'=>'OVERDUE OUTSTANDING - DASHBOARD',
        'invData'=>$getCustInv
     ]);
    }

    public function PendingShipmentBillDownload($docketArray){  
      $timestamp = date('Y-m-d');
      $filename = 'PendingShipmentBillReport' . $timestamp . '.xls';
      header("Content-Type: application/vnd.ms-excel");
      header("Content-Disposition: attachment; filename=\"$filename\"");
echo <<<HEREHEAD
    <table class="table table-bordered table-centered mb-1 mt-1">
          <thead>
        <tr class="main-title text-dark">
        <th style="min-width:20px;" class="p-1">SL#</th>
        <th style="min-width:180px;" class="p-1">Customer</th>
        <th style="min-width:180px;" class="p-1">Book Office</th>
        <th style="min-width:160px;" class="p-1">Org</th>
        <th style="min-width:160px;" class="p-1">Dest</th>
        <th style="min-width:100px;" class="p-1">Book Date</th>
        <th style="min-width:50px;" class="p-1">Docket</th>
        <th style="min-width:130px;" class="p-1">Product Name</th>
        <th style="min-width:60px;" class="p-1">Pcs</th>
        <th style="min-width:130px;" class="p-1">Chrg. Wt	</th>
        <th style="min-width:130px;" class="p-1">Freight</th>
        <th style="min-width:130px;" class="p-1">OT Charge</th>
        <th style="min-width:130px;" class="p-1">IGST</th>
        <th style="min-width:130px;" class="p-1">CGST</th>
        <th style="min-width:130px;" class="p-1">SGST</th>
        <th style="min-width:130px;" class="p-1">Total Amt</th>
          </tr>
        </thead>
        <tbody>
HEREHEAD;
      $i=0;
      foreach($docketArray as $key){
        $i++;
echo <<<HERE
        <tr>
        <td class="p-1">{$i}</td>
        <td class="p-1">{$key['Customer']}</td>
        <td class="p-1">{$key['Office']}</td>
        <td class="p-1">{$key['origin']}</td>
         <td class="p-1">{$key['Dest']}</td>
        <td class="p-1">{$key['Booking_Date']}</td>
        <td class="p-1">{$key['Docket_No']}</td>
        <td class="p-1">{$key['PTL']}</td>
        <td class="p-1">{$key['Qty']}</td>
        <td class="p-1">{$key['Charged_Weight']}</td>
        <td class="p-1">{$key['fright']}</td>
        <td class="p-1">{$key['Charge']}</td>
        <td class="p-1">{$key['cgst']}</td>
        <td class="p-1">{$key['scst']}</td>
         <td class="p-1">{$key['igst']}</td>
         <td class="p-1">{$key['total']}</td>
   </tr>
HERE;
      }

      echo "</tbody></table>";
    }

    public  function DownloadFreightError($date){
      $timestamp = date('Y-m-d');
      $filename = 'PendingShipmentBillReport' . $timestamp . '.xls';
      header("Content-Type: application/vnd.ms-excel");
      header("Content-Disposition: attachment; filename=\"$filename\"");
echo <<<HEREHEADR
    <table class="table table-bordered table-centered mb-1 mt-1">
          <thead>
        <tr class="main-title text-dark">
        <th style="min-width:20px;" class="p-1">SL#</th>
        <th style="min-width:180px;" class="p-1">Customer</th>
        <th style="min-width:180px;" class="p-1">Book Office</th>
        <th style="min-width:160px;" class="p-1">Org</th>
        <th style="min-width:80px;" class="p-1">Org Zone</th>
        <th style="min-width:160px;" class="p-1">Dest</th>
        <th style="min-width:80px;" class="p-1">Dest Zone</th>
        <th style="min-width:100px;" class="p-1">Book Date</th>
        <th style="min-width:60px;" class="p-1">Mode</th>
        <th style="min-width:130px;" class="p-1">Product Name</th>
        <th style="min-width:130px;" class="p-1">Delivery Type</th>
        <th style="min-width:50px;" class="p-1">Docket</th>
        <th style="min-width:60px;" class="p-1">Pcs</th>
        <th style="min-width:70px;" class="p-1">Chrg. Wt</th>
        <th style="min-width:130px;" class="p-1">Error</th>
          </tr>
        </thead>
        <tbody>
HEREHEADR;
      $i=0;
      foreach($date as $key){
        $i++;
        echo <<<HERET

        <tr>
               
                <td class="p-1">{$i}</td>
                <td class="p-1">{$key['Customer']}</td>
                <td class="p-1">{$key['Office']}</td>
                <td class="p-1">{$key['origin']}</td>
                <td class="p-1">{$key['originZone']}</td>
                <td class="p-1">{$key['Dest']}</td>
                <td class="p-1">{$key['DestZone']}</td>
                <td class="p-1">{$key['Booking_Date']}</td>
                <td class="p-1">{$key['Mode']}</td>
                <td class="p-1">{$key['PTL']}</td>
                <td class="p-1">{$key['DeliveryType']}</td>
                <td class="p-1">{$key['Docket_No']}</td>
                <td class="p-1">{$key['Qty']}</td>
                <td class="p-1">{$key['Charged_Weight']}</td>
                <td class="p-1">Tariff not define.</td>
           </tr>

HERET;
      }

    }
   
}
