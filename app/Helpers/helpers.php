<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;
use App\Models\Account\CustomerTariff;
use App\Models\Account\CustomerTariffTrans;
use App\Models\Account\CustomerChargesMapWithCustomer;
use App\Models\Account\CustOtherChargeMultiSource;
use App\Models\Operation\DocketMaster;
use DB;
class Helper
{
    public static function CustTariff($custId,$SourceCity,$DestCity,$SourceState,$DestState,$SourcePinCode,$DestPinCode,$zoneSource,$zoneDest,$deliveryType,$date,$weight)
    {
       $traff=CustomerTariff::where('Customer_Id',$custId)->whereDate('Wef_Date','<=',$date)->orderBy('Id','DESC')->first();
       
       if(isset($traff->Id))
       {
        $traffCode=$traff->Tarrif_Code;
        $getTaranRate=DB::table('Cust_Tariff_Trans')->where('Tariff_M_ID',$traff->Id)
        ->Where(function ($query) use($traffCode,$SourceCity,$DestCity,$SourceState,$DestState,$SourcePinCode,$DestPinCode,$zoneSource,$zoneDest,$deliveryType){ 
        if($traffCode==1)
        {
            $query->where('Cust_Tariff_Trans.Origin',$SourceCity); 
            $query->where('Cust_Tariff_Trans.Dest',$DestCity);  
        }
        if($traffCode==2)
        {
          
            $query->where('Cust_Tariff_Trans.Origin',$SourceState); 
            $query->where('Cust_Tariff_Trans.Dest',$DestState);  
        }
        if($traffCode==3)
        {
            
            $query->where('Cust_Tariff_Trans.Origin',$zoneSource); 
            $query->where('Cust_Tariff_Trans.Dest',$zoneDest);  
        }
        if($traffCode==4)
        {
            
            $query->where('Cust_Tariff_Trans.Origin',$SourcePinCode); 
            $query->where('Cust_Tariff_Trans.Dest',$DestPinCode);  
        }
        })  
        ->where('Cust_Tariff_Trans.Delivery_Type',$deliveryType)
        ->orderBy('Cust_Tariff_Trans.Id','DESC')
        ->first(); 
      
        if(isset($getTaranRate->Id)){
        $getRate=DB::table('Cust_Tarrif_Slabs')->where('Tarrif_Id',$getTaranRate->Id)->get();  
        if(!empty($getRate->toArray()))
        {
           $k=0;
          if($weight >=$k &&  $weight <= $getRate[0]->Qty)
          {
             $rate=$getRate[0]->Rate;  
          }
          elseif(isset($getRate[1]->Qty) && $getRate[0]->Qty <= $weight && $getRate[1]->Qty  >= $weight)
          {
             $rate=$getRate[1]->Rate;    
          }
          elseif(isset($getRate[2]->Qty) && $weight  >= $getRate[1]->Qty   && $weight <= $getRate[2]->Qty )
          {
              
             $rate=$getRate[2]->Rate;    
          }
          elseif(isset($getRate[3]->Qty) && $getRate[2]->Qty <= $weight && $getRate[3]->Qty >= $weight)
          {
             $rate=$getRate[3]->Rate;    
          }
          elseif(isset($getRate[4]->Qty) && $getRate[3]->Qty <= $weight && $getRate[4]->Qty >= $weight)
          {
             $rate=$getRate[4]->Rate;    
          }
          elseif(isset($getRate[5]->Qty) && $getRate[4]->Qty <= $weight && $getRate[5]->Qty >= $weight)
          {
             $rate=$getRate[5]->Rate;    
          }
          elseif(isset($getRate[5]->Qty) && $getRate[5]->Qty <= $weight)
          {
             $rate=$getRate[5]->Rate;    
          }
          else{
            
             $rate=$getTaranRate->Min_Amount;    
          }
        }
        else{
         $rate='00';    
        }
       }
       else{
        $rate='00';     
       }
    }
       else{
        $rate='00';    
       }
       return $rate;
    }
    public static function CustOtherCharge($custId,$date,$sourceCity,$destCity,$weight,$goodValue,$rate,$qty,$fright)
    {
     $CustomerMapWith=CustomerChargesMapWithCustomer::
     leftjoin('Cust_Other_Charge','Cust_Other_Charge.Id','=','Cust_Oth_Charge_Map.Charge_Id')
     ->where('Customer_Id',$custId)->whereDate('Date_From', '<=', $date)->whereDate('Date_To', '>=', $date)
     ->select('Cust_Oth_Charge_Map.*','Cust_Other_Charge.Title')
     ->get();
    
     $chargeArrayDef=array();
     $sum=0;
     foreach($CustomerMapWith as $totalChnage)
       {
         $range=$totalChnage->Range_Id;
         if(isset($totalChnage->Title) && $totalChnage->Title !='')
         {
            $chargeArray['title']=$totalChnage->Title;
         }
         if($range==2 && $totalChnage->Charge_Type==1 && $rate >= $totalChnage->Range_From && $rate <= $totalChnage->Range_To)
         {
            $chargeAmount=($fright*$totalChnage->Charge_Amt)/100;
         }
         elseif($range==4 && $totalChnage->Charge_Type==1 && $goodValue >= $totalChnage->Range_From && $goodValue <= $totalChnage->Range_To)
         {
             $chargeAmount=($goodValue*$totalChnage->Charge_Amt)/100; 
           
         }
         elseif($range==5 && $totalChnage->Charge_Type==2)
         {
            $chargeAmount=$totalChnage->Charge_Amt;
         }
         elseif($range==7 && $totalChnage->Charge_Type==2 && $qty >= $totalChnage->Range_From && $qty <= $totalChnage->Range_To)
         {
            $chargeAmount=$qty*$totalChnage->Charge_Amt;
         }
         else{
            $chargeAmount=0;
         }
       
         if($totalChnage->Process==1)
         {
            $charge=$chargeAmount;
         }
         elseif($totalChnage->Process==2)
         {
            if($totalChnage->Origin==$sourceCity && $totalChnage->Destination==$destCity)
            {
               $charge=$chargeAmount; 
            }
            else{
               $charge=0;   
            }
         }
         elseif($totalChnage->Process==3)
         {
            $getMultiChnage=CustOtherChargeMultiSource::
            leftjoin('Cust_Other_Charge','Cust_Other_Charge.Id','=','Cust_Other_Charge_Multi_Sources.Charge_Id')
            ->where('Charge_Id',$totalChnage->Id)->where('Source',$sourceCity)->where('Dest',$destCity)
            ->select('Cust_Other_Charge_Multi_Sources.*','Cust_Other_Charge.Title')
            ->first();
            if(isset($getMultiChnage->Title) && $getMultiChnage->Title !='')
         {
            $chargeArray=$getMultiChnage->Title;
         }
            if(isset($getMultiChnage->id))
            {
               $charge=$chargeAmount; 
            }else{
               $charge=0;   
            }
         }
         else{
            $charge=0;   
         }
         $sum+=$charge;
         $chargeArray['Amount']=$charge;
         array_push($chargeArrayDef,$chargeArray);
       }
      
       if(isset($chargeArrayDef))
       {
          $cArr=$chargeArrayDef;
       }
       else
       {
         $cArr=[];  
       }
       $datas=array('sum'=>$sum,'charge'=>$cArr);
       return  json_encode($datas);
      
    }
    public function CustRateanaylis($custId,$month,$year)
    {
       $docket=DocketMaster::with('DocketProductDetails','PincodeDetails','DestPincodeDetails','TariffTypeDeatils')->where('Cust_Id',$custId)->whereMonth('Booking_Date',$month)->whereYear('Booking_Date',$year)->get();
       $sum=0;
       foreach($docket as $docketDetails)
       {
          
          if($docketDetails->Booking_Type==3 || $docketDetails->Booking_Type==4)
          {
             if(isset($docketDetails->TariffTypeDeatils->TotalAmount))
             {
                $totalAmount=$docketDetails->TariffTypeDeatils->TotalAmount;
             }
             else{
               $totalAmount=0;
             }
              $sum+=$totalAmount;
          }
          else
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
            $traff=CustomerTariff::where('Customer_Id',$custId)->whereDate('Wef_Date','<=',$EffectDate)->orderBy('Id','DESC')->first();
            if(isset($traff->Id))
            {
            $traffCode=$traff->Tarrif_Code;
            $getTaranRate=DB::table('Cust_Tariff_Trans')->where('Tariff_M_ID',$traff->Id)
           ->Where(function ($query) use($traffCode,$SourceCity,$DestCity,$SourceState,$DestState,$SourcePinCode,$DestPinCode,$zoneSource,$zoneDest,$DeliveryType){ 
           if($traffCode==1)
           {
            $query->where('Cust_Tariff_Trans.Origin',$SourceCity); 
            $query->where('Cust_Tariff_Trans.Dest',$DestCity);  
           }
           if($traffCode==2)
           {
          
            $query->where('Cust_Tariff_Trans.Origin',$SourceState); 
            $query->where('Cust_Tariff_Trans.Dest',$DestState);  
           }
           if($traffCode==3)
           {
            $query->where('Cust_Tariff_Trans.Origin',$zoneSource); 
            $query->where('Cust_Tariff_Trans.Dest',$zoneDest);  
           }
           if($traffCode==4)
           {
            
            $query->where('Cust_Tariff_Trans.Origin',$SourcePinCode); 
            $query->where('Cust_Tariff_Trans.Dest',$DestPinCode);  
           }
         })  
        ->where('Cust_Tariff_Trans.Delivery_Type',$DeliveryType)
        ->orderBy('Cust_Tariff_Trans.Id','DESC')
        ->first(); 
      
        if(isset($getTaranRate->Id)){
        $getRate=DB::table('Cust_Tarrif_Slabs')->where('Tarrif_Id',$getTaranRate->Id)->get();  
        if(!empty($getRate->toArray()))
        {
           $k=0;
          if($chargeWeight >=$k &&  $chargeWeight <= $getRate[0]->Qty)
          {
             $rate=$getRate[0]->Rate;  
          }
          elseif(isset($getRate[1]->Qty) && $getRate[0]->Qty <= $chargeWeight && $getRate[1]->Qty  >= $chargeWeight)
          {
             $rate=$getRate[1]->Rate;    
          }
          elseif(isset($getRate[2]->Qty) && $$chargeWeight  >= $getRate[1]->Qty   && $chargeWeight <= $getRate[2]->Qty )
          {
              
             $rate=$getRate[2]->Rate;    
          }
          elseif(isset($getRate[3]->Qty) && $getRate[2]->Qty <= $chargeWeight && $getRate[3]->Qty >= $chargeWeight)
          {
             $rate=$getRate[3]->Rate;    
          }
          elseif(isset($getRate[4]->Qty) && $getRate[3]->Qty <= $chargeWeight && $getRate[4]->Qty >= $chargeWeight)
          {
             $rate=$getRate[4]->Rate;    
          }
          elseif(isset($getRate[5]->Qty) && $getRate[4]->Qty <= $chargeWeight && $getRate[5]->Qty >= $chargeWeight)
          {
             $rate=$getRate[5]->Rate;    
          }
          elseif(isset($getRate[5]->Qty) && $getRate[5]->Qty <= $chargeWeight)
          {
             $rate=$getRate[5]->Rate;    
          }
          else{
            
             $rate=$getTaranRate->Min_Amount;    
          }
        }
        else{
         $rate='0.0';    
        }
       }
       else{
        $rate='0.0';     
       }
    }
       else{
        $rate='0.0';    
       }
       $mainrate=$rate*$chargeWeight;
       $chareg=static::CustOtherCharge($custId,$EffectDate,$SourceCity,$DestCity,$chargeWeight,$goodsValue,$traff,$qty,$mainrate);
       $ch=json_decode($chareg);
       if(isset($docketDetails->DocketProductDetails->charge) && $docketDetails->DocketProductDetails->charge !='')
       {
       $Charge1=$docketDetails->DocketProductDetails->charge;
           
       }
       else
       {
         $Charge1=0;  
       }
       $totalCharge=$ch->sum+$Charge1;
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
                $igst=($mainrate*$gstPer)/100;
                }
                else{
                    $gsthalf=$gstPer/2;
                    $cgst=($mainrate*$gsthalf)/100;
                    $sgst=($mainrate*$gsthalf)/100;
                    $igst=0; 
                }
              $total=$igst+$cgst+$sgst+$mainrate+$totalCharge;

        $sum+=($total);
      }
      }
      return $sum;
   }
}