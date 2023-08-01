<?php

namespace App\Http\Controllers\Account;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMoneyReceiptRequest;
use App\Http\Requests\UpdateMoneyReceiptRequest;
use App\Models\Account\MoneyReceipt;
use App\Models\Account\MoneyReceiptTrans;
use Illuminate\Http\Request;
use App\Models\Account\CustomerMaster;
use App\Models\CompanySetup\BankMaster;
use App\Models\Account\CustomerInvoice;
use Auth;
class MoneyReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Cust=CustomerMaster::get();
        $bank=BankMaster::get();
        return view('Account.moneyRecept', [
            'title'=>'MONEY RECEIPT',
            'Cust'=>$Cust,
            'bank'=>$bank,
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
     * @param  \App\Http\Requests\StoreMoneyReceiptRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMoneyReceiptRequest $request)
    {
        $UserId=Auth::id();
       $payment_date=date("Y-m-d",strtotime($request->payment_date));
       $utr_date=date("Y-m-d",strtotime($request->utr_date));
       $lastId=MoneyReceipt::select('id')->orderBy('id','DESC');
       if(isset($lastId->id))
       {
           $lastid=$lastId->id;
           $number='MR00'.($lastid+1);
       }
       else
       {
            $number='MR001'; 
       }
       if($request->apply_tds=='on')
       {
           $atds='YES';
        }
        else{
            $atds='NO'; 
        }
        $LatIdMaster=MoneyReceipt::insertGetId(
            ['MRNo'=>$number,'CustId' => $request->customer_name,'tds'=>$request->tds,'IsTds'=>$atds,'PaymentType'=>$request->payment_type,'PaymentMode'=>$request->payment_mode,'RecAmount'=>$request->recieved_amnt,'PaymentDate'=>$payment_date,'BankName'=>$request->bank_name,'AccountNo'=>$request->deposit_acct_no,'UtrNo'=>$request->utr_no,'UtrDate'=>$utr_date,'Remark'=>$request->remark,'CreatedBy'=>$UserId]
            );
        foreach($request->Money as $monry)
        {
            if(isset($monry['checked']))
            {
                MoneyReceiptTrans::insert(
                    ['MasterId' =>$LatIdMaster,'InvId'=>$monry['InvId'],'Amount'=>$monry['adjAmiunt']]
                    );   
            }
           
        }
        return redirect(url('MoneyRecept'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account\MoneyReceipt  $moneyReceipt
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        
        $getCustInv=CustomerInvoice::withSum('InvNewDetailsMoney as TotalFright','Fright')->withSum('InvNewDetailsMoney as TotalScst','Scst')->withSum('InvNewDetailsMoney as TotalCgst','Cgst')->withSum('InvNewDetailsMoney as TotalIgst','Igst')->withSum('InvNewDetailsMoney as TotalAmount','Total')->withSum('MoneryReceptDetails as TotalMoneyAmount','Amount')->where('Cust_Id',$request->customer_name)->get();
        $TotalAmount=CustomerInvoice::withSum('InvNewDetailsMoney as TotalFright','Fright')->withSum('MoneryReceptDetails as TotalMoneyAmount','Amount')->where('Cust_Id',$request->customer_name)->groupBy('Cust_Id')->first();
      
        return view('Account.MoneyReceptInner', [
            'title'=>'MONEY RECEIPT',
            'CustInv'=>$getCustInv,
            'amount'=>$request->amount,
            'tds'=>$request->tds,
            'TotalAmount'=>$TotalAmount,
            'apply_tds'=>$request->apply_tds
          ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account\MoneyReceipt  $moneyReceipt
     * @return \Illuminate\Http\Response
     */
    public function edit(MoneyReceipt $moneyReceipt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMoneyReceiptRequest  $request
     * @param  \App\Models\Account\MoneyReceipt  $moneyReceipt
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMoneyReceiptRequest $request, MoneyReceipt $moneyReceipt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account\MoneyReceipt  $moneyReceipt
     * @return \Illuminate\Http\Response
     */
    public function destroy(MoneyReceipt $moneyReceipt)
    {
        //
    }
}
