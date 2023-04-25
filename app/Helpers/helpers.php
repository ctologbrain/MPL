<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;
use App\Models\Account\CustomerTariff;
use App\Models\Account\CustomerTariffTrans;
use App\Models\Account\CustomerChargesMapWithCustomer;
use App\Models\Account\CustOtherChargeMultiSource;
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
             $rate=$getRate[0]->Rate;    
          }
          elseif(isset($getRate[2]->Qty) && $weight  >= $getRate[1]->Qty   && $weight <= $getRate[2]->Qty )
          {
              
             $rate=$getRate[1]->Rate;    
          }
          elseif(isset($getRate[3]->Qty) && $getRate[2]->Qty <= $weight && $getRate[3]->Qty >= $weight)
          {
             $rate=$getRate[2]->Rate;    
          }
          elseif(isset($getRate[4]->Qty) && $getRate[3]->Qty <= $weight && $getRate[4]->Qty >= $weight)
          {
             $rate=$getRate[3]->Rate;    
          }
          elseif(isset($getRate[5]->Qty) && $getRate[4]->Qty <= $weight && $getRate[5]->Qty >= $weight)
          {
             $rate=$getRate[4]->Rate;    
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
    public static function CustOtherCharge($custId,$date,$sourceCity,$destCity,$weight)
    {
     $CustomerMapWith=CustomerChargesMapWithCustomer::where('Customer_Id',$custId)->whereDate('Date_From', '<=', $date)->whereDate('Date_To', '>=', $date)->where('Range_From', '<=', $weight)->where('Range_To', '>=', $weight)->get(); 
      $sum=0;
     foreach($CustomerMapWith as $totalChnage)
       {
         if($totalChnage->Process==1)
         {
            $charge=$totalChnage->Charge_Amt;
         }
         elseif($totalChnage->Process==2)
         {
            if($totalChnage->Origin==$sourceCity && $totalChnage->Destination==$destCity)
            {
               $charge=$totalChnage->Charge_Amt; 
            }
            else{
               $charge=0;   
            }
         }
         elseif($totalChnage->Process==3)
         {
            $getMultiChnage=CustOtherChargeMultiSource::where('Charge_Id',$totalChnage->Id)->where('Source',$sourceCity)->where('Dest',$destCity)->first();
            if(isset($getMultiChnage->id))
            {
               $charge=$totalChnage->Charge_Amt; 
            }else{
               $charge=0;   
            }
         }
         else{
            $charge=0;   
         }
         $sum+=$charge;

       }
       return $sum;
    }
}