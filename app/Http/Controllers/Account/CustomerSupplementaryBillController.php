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
use App\Models\Account\CustomerOtherCharges;
use App\Models\Account\CustomerSupplementaryBill;

class CustomerSupplementaryBillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $DocketBookingType=DocketBookingType::get();
        $customer=CustomerMaster::get();
        $last= CustomerInvoice::orderBy("id","DESC")->first();
        $otherCharge=CustomerOtherCharges::get();
        return view('Account.SupplementaryBill', [
              'title'=>'SUPPLEMENTARY INVOICE',
              'DocketBookingType'=>$DocketBookingType,
              'customer'=>$customer,
              'otherCharge'=>$otherCharge
            ]);
    }
    public function CheckDocketInInvoice(Request $request)
    {
      
        $checkInv=InvoiceDetails::with('CityDetails')->where('InvId',$request->oldInvId)->where('DocketNo',$request->Docket)->first();
        if(isset($checkInv->id))
        {
           echo json_encode($checkInv);
        }
        else{
            return 'false';
        }
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
     * @param  \App\Http\Requests\StoreCustomerSupplementaryBillRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $invoiceNoCheck = CustomerInvoice::where("InvNo",$request->NewInvoiceNo)->first();
        
          $UserId=Auth::id();
          $invDate=date("Y-m-d", strtotime($request->invoice_date));
          if(isset($invoiceNoCheck->id))
          {
             $lastId=$invoiceNoCheck->id;
          }
          else
          {
            $lastId=CustomerInvoice::insertGetId(
                ['Cust_Id'=>$request->custmoerid,'AddressId'=>$request->addressId,'InvNo' => $request->NewInvoiceNo,'InvDate'=>$invDate,'ParentInvoice'=>$request->oldInvId,'InvType'=>2,'CreatedBy' =>$UserId]
              );
          }
          $check=CustomerSupplementaryBill::where('InvId',$lastId)->where('DocketNo',$request->awb_no)->first();
         if(empty($check))
          {
            CustomerSupplementaryBill::insert(
                ['InvId'=>$lastId,'ChargeId'=>$request->charge_name,'DocketNo' => $request->awb_no,'Amount'=>$request->amnt,'Cgst'=>$request->gst,'SgSt'=>$request->sgst,'Igst'=>$request->igst,'TotalAmount' =>$request->total_amnt]
              );
          }
           $supple=CustomerSupplementaryBill::
             leftjoin('Cust_Other_Charge','Cust_Other_Charge.Id','=','SupplementaryInvoice.ChargeId')
            ->select('SupplementaryInvoice.*','Cust_Other_Charge.Title')
            ->where('SupplementaryInvoice.InvId',$lastId)
            ->get();
            $html='';
            $html.='<table class="table-responsive table-bordered" width="100%"><thead><tr class="main-title text-dark"><th>Charge Name</th><th>Docket No</th><th>Amount</th><th>GST</th><th>SGST</th><th>IGST</th><th>Total Amount</th><tr></thead><tbody>';
            foreach($supple as $suly)
            {
               
                $html.='<tr><td>'.$suly->Title.'</td><td>'.$suly->DocketNo.'</td><td>'.$suly->Amount.'</td><td>'.$suly->Cgst.'</td><td>'.$suly->SgSt.'</td><td>'.$suly->Igst.'</td><td>'.$suly->TotalAmount.'</td></tr>'; 
            }
            $html.='<tbody></table>';
            echo $html;
          
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account\CustomerSupplementaryBill  $customerSupplementaryBill
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
       
        $last= CustomerInvoice::with('customerDetails','customerAddressDetails')->where('InvNo',$request->InvNo)->first();
        if(isset($last->id))
        {
          echo  json_encode($last);  
        }
        else{
            echo 'false';
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account\CustomerSupplementaryBill  $customerSupplementaryBill
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerSupplementaryBill $customerSupplementaryBill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerSupplementaryBillRequest  $request
     * @param  \App\Models\Account\CustomerSupplementaryBill  $customerSupplementaryBill
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerSupplementaryBillRequest $request, CustomerSupplementaryBill $customerSupplementaryBill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account\CustomerSupplementaryBill  $customerSupplementaryBill
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerSupplementaryBill $customerSupplementaryBill)
    {
        //
    }
}
