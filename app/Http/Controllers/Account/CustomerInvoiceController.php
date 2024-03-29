<?php

namespace App\Http\Controllers\Account;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerInvoiceRequest;
use App\Http\Requests\UpdateCustomerInvoiceRequest;
use App\Models\Account\CustomerInvoice;
use App\Models\Operation\DocketBookingType;
use App\Models\Account\CustomerMaster;
use Illuminate\Http\Request;
use App\Models\Operation\DocketMaster;
use App\Models\Account\InvoiceDetails;
use App\Models\SalesReport\CustomerLedger;
use Auth;
use Helper;
use PDF;
/**
 * Summary of CustomerInvoiceController
 */
class CustomerInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //MPL/23-24/18
       $DocketBookingType=DocketBookingType::get();
        $customer=CustomerMaster::where("Active","Yes")->get();
        $last= CustomerInvoice::orderBy("id","DESC")->first();
        if(isset($last->id))
        {
          $invoiceNo ='MPL/23-24/'.intval($last->id+1);
        }
        else{
            $invoiceNo ='MPL/23-24/'.intval(1); 
        }
       
        return view('Account.customerinvoice', [
              'title'=>'CUSTOMER INVOICE',
              'DocketBookingType'=>$DocketBookingType,
              'customer'=>$customer,
              'invoiceNo'=>$invoiceNo
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
     * @param  \App\Http\Requests\StoreCustomerInvoiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerInvoiceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account\CustomerInvoice  $customerInvoice
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
         $last= CustomerInvoice::orderBy("id","DESC")->first();
         if(isset($last->id)){
           $invoiceNo ='MPL/23-24/'.intval($last->id+1);
         }
         else{
            $invoiceNo ='MPL/23-24/'.intval(1);  
         }
        $docket=DocketMaster::with('DocketProductDetails','PincodeDetails','DestPincodeDetails','customerDetails')->withSum('DocketInvoiceDetails','Amount')->where('Cust_Id',$request->customer_name)->whereDate('Booking_Date','>=',date("Y-m-d",strtotime($request->from_date)))->whereDate('Booking_Date','<=',date("Y-m-d",strtotime($request->to_date)))->where('Is_invoice',1)->get();
        
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
              'id'=>$docketDetails->id,
              'Source'=>$docketDetails->PincodeDetails->CityDetails->Code.'('.$docketDetails->PincodeDetails->StateDetails->name.')',
              'Dest'=>$docketDetails->DestPincodeDetails->CityDetails->Code.'('.$docketDetails->DestPincodeDetails->StateDetails->name.')',
              'Booking_Date'=>date("d-m-Y", strtotime($docketDetails->Booking_Date)),
              'PTL'=>'PTL',
              'Docket_No'=>$docketDetails->Docket_No,
              'Qty'=>$docketDetails->DocketProductDetails->Qty,
              'Charged_Weight'=>$docketDetails->DocketProductDetails->Charged_Weight,
              'rate'=>$rate,
              'fright'=>$fright,
              'Charge'=>$Charge+$Charge1,
              'cgst'=>$cgst,
              'scst'=>$sgst,
              'igst'=>$igst,
              'total'=> $total,
              'SourceId'=>$SourceCity,
              'DestId'=>$DestCity,
              'charegStin'=>$charegSting
              );
              array_push($docketArray,$data);
        }
        if(!empty($docketArray))
        {
        return view('Account.customerinvoiceInner', [
            'title'=>'CUSTOMER INVOICE',
            'docket'=>$docketArray,
            'invoiceNo'=>$invoiceNo
            ]);
        }
        else{
            return 'false';
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account\CustomerInvoice  $customerInvoice
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerInvoice $customerInvoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerInvoiceRequest  $request
     * @param  \App\Models\Account\CustomerInvoice  $customerInvoice
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerInvoiceRequest $request, CustomerInvoice $customerInvoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account\CustomerInvoice  $customerInvoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerInvoice $customerInvoice)
    {
        //
    }
    public function SubmitInvoice(Request $request)
    {  
      
        $invoiceNoCheck = CustomerInvoice::where("InvNo",$request->InvNo)->first();
        $last= CustomerInvoice::orderBy("id","DESC")->first();
        if(!empty($invoiceNoCheck)){
            $invoiceNo= 'MPL/23-24/'.intval($last->id+2);
        }
        else{
           $invoiceNo= $request->InvNo;
        }
          $UserId=Auth::id();
          $invDate=date("Y-m-d", strtotime($request->invoice_date));
          $lastid=CustomerInvoice::insertGetId(
            ['Cust_Id'=>$request->customer_name,'InvNo' => $invoiceNo,'FormDate'=>date("Y-m-d",strtotime($request->from_date)),'ToDate'=>date("Y-m-d",strtotime($request->to_date)),'InvDate'=>$invDate,'Remark' => $request->remarks,'CreatedBy' =>$UserId,'Mode'=> $request->Mode,'LoadType'=> $request->loadType , 'BookingType'=> $request->bookingType ,'BookingBranch'=>$request->BookingBranch ]
          );
          $sum=0;
          foreach($request->Multi as $multiInv)
          {
              if(isset($multiInv['docketFirstCheck']) && $multiInv['docketFirstCheck'] !='undefined'){
                $BookingDate=date("Y-m-d", strtotime($multiInv['BokkingDate']));
                 InvoiceDetails::insert(
                ['InvId'=>$lastid,'ChargeString'=>$multiInv['changeString'],'DocketId' =>$multiInv['docketFirstCheck'],'DocketNo'=>$multiInv['Docket_No'],'SourceId'=>$multiInv['Source'],'DestId'=>$multiInv['DestId'],'BookingDate' => $BookingDate
                ,'Product' =>$multiInv['Type'],'Qty' =>$multiInv['Qty'],'Weight' =>$multiInv['Charged_Weight'],'Rate' =>$multiInv['rate'],'Fright' =>$multiInv['fright'],'Charge' =>$multiInv['Charge'],'Scst' =>$multiInv['scst'],'Cgst' =>$multiInv['cgst'],'Igst' =>$multiInv['igst'],'Total' =>$multiInv['total'],'CratedBy' =>$UserId
                ]
              ); 
              DocketMaster::where("Docket_No", $multiInv['Docket_No'])->update(
                ['Is_invoice'=>2]
               ); 
              $sum+=$multiInv['total']; 
            }
          }
          $lastBalance=CustomerLedger::where('CustId',$request->customer_name)->orderBy('id','DESC')->first();
           if(isset($lastBalance->Balance))
           {
             $balance=abs($lastBalance->Balance);
           }
           else
           {
            $balance=0;
           }
           $balanceAmount=$balance+$sum;
          CustomerLedger::insert(
            ['CustId'=>$request->customer_name,'Date'=>$invDate,'Description' =>$request->remarks,'VoucherType'=>'Receipt','VoucherNo'=>$invoiceNo,'Debit'=>$sum,'Credit' => 0,'Balance'=>$balanceAmount]
          );

       
       
    }
    public function CustomerInvoiceRegister(Request $request)
    {
        $cust=CustomerMaster::where("Active","Yes")->get();
        $customer='';
        if($request->customer)
        {
          $customer=$request->customer;  
        }
        $custInv=CustomerInvoice::with('customerDetails')->withsum('Sum','Qty')->withsum('Sum','Fright')->withsum('Sum','Scst')->withsum('Sum','Cgst')->withsum('Sum','Igst')->withsum('Sum','Total')
        ->where(function($query) use ($customer) {
           if($customer !=''){
           $query->where('Cust_Id',$customer);
            }
            })
        ->where("Cancel_Invoice",0)
        ->paginate(10);
        return view('Account.customerinvoiceRegister', [
            'title'=>'CUSTOMER INVOICE',
            'customer'=>$cust,
            'custInv'=>$custInv
           ]);
    }

    public function printInvoiceTex(Request $request ,$pre, $con,$id,$supInv=''){
      if($supInv==""){
      $invoice =$pre.'/'.$con.'/'.$id;
      }
      else{
        $invoice =$pre.'/'.$con.'/'.$id.'/'.$supInv;
      }
      $invoiceDet=  CustomerInvoice::with("customerDetails")->where("InvNo",$invoice)->first();
      if(!empty($invoiceDet)){
        $totalInvoice= InvoiceDetails::with('CustomerOthChagesDet')->where("InvId",$invoiceDet->id)->get();
        }
        else{
            $totalInvoice=[];
        }
        
       $data= ['title'=>'PRINT INVOICE',
        'invoiceDet'=>$invoiceDet,
        'totalInvoice'=>$totalInvoice];
        if($supInv==""){
          $pdf = PDF::loadView('Account.taxInvoicePrint', $data);
        }
        else{
          $pdf = PDF::loadView('Account.supplementaryInvoicePrint', $data);
        }
       $path = public_path('InvoicePdf/');
       $fileName = $pre.$con.$id . '.' . 'pdf' ;
       $pdf->save($path . '/' . $fileName);
       return response()->file($path.'/'.$fileName);
      
    }

    public function CancelInvoice(Request $request){
      date_default_timezone_set("Asia/Kolkata");
      $UserId=Auth::id();
      $Invoice = $request->Invoice;
      $remrks = $request->remrks;
      $CheckAvailable= CustomerInvoice::where("InvNo",$request->Invoice)->first();
        if(!empty($CheckAvailable)){
            $CheckCancle= CustomerInvoice::where("InvNo",$request->Invoice)->where("Cancel_Invoice",1)->first();
            if(empty($CheckCancle)){
              CustomerInvoice::where("InvNo",$request->Invoice)->update(["Cancel_By" =>$UserId,
              "updated_at" => date("Y-m-d H:i:s"), "Cancel_Invoice" =>1,"Cancel_Remark" =>$remrks]);
              echo "Canceled Successfully";
             $invDetails=InvoiceDetails::where('InvId',$CheckAvailable->id)->get();
             $sum=0;
             foreach($invDetails as $InvDet)
             {
               DocketMaster::where("Docket_No", $InvDet->DocketNo)->update(
                ['Is_invoice'=>1]
              );
               $sum+=$InvDet->Total;
             }
            
             $lastBalance=CustomerLedger::where('CustId',$CheckAvailable->Cust_Id)->orderBy('id','DESC')->first();
             if(isset($lastBalance->Balance))
             {
               $balance=abs($lastBalance->Balance);
             }
             else
             {
              $balance=0;
             }
             $balanceAmount=$balance-$sum;
            CustomerLedger::insert(
              ['CustId'=>$CheckAvailable->Cust_Id,'Date'=>$CheckAvailable->InvDate,'Description' =>$request->remrks,'VoucherType'=>'Payment','VoucherNo'=>$request->Invoice,'Debit'=>0,'Credit' =>$sum,'Balance'=>$balanceAmount]
            );

            }
            else{
              echo "Already Canceled";
            }
      }
      else{
        echo "Invoice No. Not Found";
      }
    }
}
