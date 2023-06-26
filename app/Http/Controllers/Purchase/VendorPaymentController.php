<?php
namespace App\Http\Controllers\Purchase;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Http\Requests\StoreVendorPaymentRequest;
use App\Http\Requests\UpdateVendorPaymentRequest;
use App\Models\Purchase\VendorPayment;
use App\Models\Purchase\VendorPaymentDetails;
use App\Models\Vendor\VendorMaster;
use App\Models\CompanySetup\BankMaster;
use App\Models\Purchase\OtherBillCreation;
class VendorPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bank=BankMaster::get();
        $vendor=VendorMaster::get();
        return view('Purchase.vendorBillPaymant', [
            'title'=>'VENDOR BILL ENTRY',
            'vendor'=>$vendor,
            'bank'=>$bank
          
         ]);
    }
    public function GetAccountByBank(Request $request)
    {
        $account=BankMaster::where('id',$request->Bank)->where('Active',1)->first();
       if(isset($account->AccountNo))
       {
           $acount=$account->AccountNo;
       }
       else{
        $acount='';
       }
       return $acount;
    }
    public function GetProcessVendorBill(Request $request)
    {
        $vendor=OtherBillCreation::where('VendorId',$request->vendor_name)
        ->leftjoin('VendorMoneyReceiptTransaction','VendorMoneyReceiptTransaction.InvId','=','VendorInvoice.id')
        ->select('VendorInvoice.*',DB::raw("SUM(VendorMoneyReceiptTransaction.Amount) as TotalPaid"))
        ->groupBy('VendorInvoice.id')
        ->get();
       
        $vendorAmountSum=OtherBillCreation::where('VendorId',$request->vendor_name)->sum('net_amt');
        return view('Purchase.vendorBillPaymantInner', [
            'title'=>'Vendor Paymant',
            'vendor'=>$vendor,
            'vendorAmountSum'=>$vendorAmountSum,
            'amount'=>$request->amnt
           
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
     * @param  \App\Http\Requests\StoreVendorPaymentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVendorPaymentRequest $request)
    {
       
        $UserId=Auth::id();
        $payment_date=date("Y-m-d",strtotime($request->payment_date));
        $utr_date=date("Y-m-d",strtotime($request->cheque_date));
        $LatIdMaster=VendorPayment::insertGetId(
            ['Vid' => $request->vendor_name,'PaymentType'=>$request->payment_type,'PaymentMode'=>$request->payment_mode,'RecAmount'=>$request->amnt,'PaymentDate'=>$payment_date,'BankName'=>$request->bank_name,'AccountNo'=>$request->acct_no,'UtrNo'=>$request->utr_no,'UtrDate'=>$utr_date,'Remark'=>$request->remark,'CreatedBy'=>$UserId]
            );
        foreach($request->Money as $monry)
        {
            if(isset($monry['checked']))
            {
                VendorPaymentDetails::insert(
                    ['MasterId' =>$LatIdMaster,'InvId'=>$monry['checked'],'Amount'=>$monry['AdjAmount']]
                    );   
            }
           
        }
        return redirect(url('VendorPayment'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase\VendorPayment  $vendorPayment
     * @return \Illuminate\Http\Response
     */
    public function show(VendorPayment $vendorPayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase\VendorPayment  $vendorPayment
     * @return \Illuminate\Http\Response
     */
    public function edit(VendorPayment $vendorPayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVendorPaymentRequest  $request
     * @param  \App\Models\Purchase\VendorPayment  $vendorPayment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVendorPaymentRequest $request, VendorPayment $vendorPayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase\VendorPayment  $vendorPayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(VendorPayment $vendorPayment)
    {
        //
    }
}
