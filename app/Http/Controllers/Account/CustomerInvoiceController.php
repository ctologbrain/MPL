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
use Auth;
use Helper;
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
       $DocketBookingType=DocketBookingType::get();
        $customer=CustomerMaster::get();
        $last= CustomerInvoice::orderBy("id","DESC")->first();
        $invoiceNo ='MPL/23-24/'.intval($last->id+1);
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
        $docket=DocketMaster::with('DocketProductDetails','PincodeDetails','DestPincodeDetails','customerDetails')->withSum('DocketInvoiceDetails','Amount')->where('Cust_Id',$request->customer_name)->whereDate('Booking_Date','>=',$request->from_date)->whereDate('Booking_Date','<=',$request->to_date)->get();
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
            $Charge=Helper::CustOtherCharge($docketDetails->Cust_Id,$EffectDate,$SourceCity,$DestCity,$chargeWeight,$goodsValue,$rate,$qty,$fright);
            
                                                         
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
              $total=$igst+$cgst+$sgst+$fright+$Charge;
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
              'Charge'=>$Charge,
              'cgst'=>$cgst,
              'scst'=>$sgst,
              'igst'=>$igst,
              'total'=> $total,
              'SourceId'=>$SourceCity,
              'DestId'=>$DestCity
              );
              array_push($docketArray,$data);
        }
        if(!empty($docketArray))
        {
        return view('Account.customerinvoiceInner', [
            'title'=>'CUSTOMER INVOICE',
            'docket'=>$docketArray,
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
        if(!empty($invoiceNoCheck)){
            $invoiceNo= 'MPL/23-24/'.intval($last->id+2);
        }
        else{
           $invoiceNo= $request->InvNo;
        }
          $UserId=Auth::id();
          $invDate=date("Y-m-d", strtotime($request->invoice_date));
          $lastid=CustomerInvoice::insertGetId(
            ['Cust_Id'=>$request->customer_name,'InvNo' => $invoiceNo,'FormDate'=>$request->from_date,'ToDate'=>$request->to_date,'InvDate'=>$invDate,'Remark' => $request->remarks,'CreatedBy' =>$UserId]
          );
          foreach($request->Multi as $multiInv)
          {
              if(isset($multiInv['docketFirstCheck']) && $multiInv['docketFirstCheck'] !='undefined'){
                $BookingDate=date("Y-m-d", strtotime($multiInv['BokkingDate']));
                 InvoiceDetails::insert(
                ['InvId'=>$lastid,'DocketId' =>$multiInv['docketFirstCheck'],'DocketNo'=>$multiInv['Docket_No'],'SourceId'=>$multiInv['Source'],'DestId'=>$multiInv['DestId'],'BookingDate' => $BookingDate
                ,'Product' =>$multiInv['Type'],'Qty' =>$multiInv['Qty'],'Weight' =>$multiInv['Charged_Weight'],'Rate' =>$multiInv['rate'],'Fright' =>$multiInv['fright'],'Charge' =>$multiInv['Charge'],'Scst' =>$multiInv['scst'],'Cgst' =>$multiInv['cgst'],'Igst' =>$multiInv['igst'],'Total' =>$multiInv['total'],'CratedBy' =>$UserId
                ]
              );   
            }
          }
       
       
    }
    public function CustomerInvoiceRegister(Request $request)
    {
        $cust=CustomerMaster::get();
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
        ->paginate(10);
        return view('Account.customerinvoiceRegister', [
            'title'=>'CUSTOMER INVOICE',
            'customer'=>$cust,
            'custInv'=>$custInv
           ]);
    }
}
