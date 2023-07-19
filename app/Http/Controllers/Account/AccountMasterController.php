<?php

namespace App\Http\Controllers\Account;

use App\Http\Requests\StoreAccountMasterRequest;
use App\Http\Requests\UpdateAccountMasterRequest;
use App\Models\Account\AccountMaster;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Operation\DocketMaster;
use Helper;
class AccountMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docket=DocketMaster::with('DocketProductDetails','PincodeDetails','DestPincodeDetails','customerDetails')->withSum('DocketInvoiceDetails','Amount')->get();
        $docketInvCount=DocketMaster::where('Is_invoice',1)->count('Is_invoice');
        $docketInvCountDetails=DocketMaster::where('Is_invoice',1)->get();
        
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
  
        return view('Account.AccountDashboard', [
            'title'=>'DASHBOARD',
            'error'=>$sum,
            'PendingBilling'=>$docketInvCount,
            'sumCount'=>$sumCount
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
        return view('Account.FreightErrorDashboard', [
            'title'=>'ERROR - FREIGHT DASHBOARD',
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
              $total=$igst+$cgst+$sgst+$fright+$Charge+$Charge1;
         
             $data=array(
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
      
       return view('Account.PendingShipmentBillDashboard', [
           'title'=>'PENDING SHIPMENT FOR BILL GENERATION',
           'DocketData'=>$docketArray
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
}
