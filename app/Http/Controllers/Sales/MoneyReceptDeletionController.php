<?php


namespace App\Http\Controllers\Sales;
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

class MoneyReceptDeletionController extends Controller
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
        return view('Sales.moneyReceptDelete', [
            'title'=>'MONEY RECEIPT  - DELETION',
            'Cust'=>$Cust,
            'bank'=>$bank,
         ]);
    }
    public function MoneyReceivedDelete(Request $request)
    {
        $fromDate=date("Y-m-d",strtotime($request->fromDate));
        $Toate=date("Y-m-d",strtotime($request->Toate));
       $datas=MoneyReceipt::
         join('MoneyReceiptTransaction','MoneyReceiptTransaction.MasterId','=','MoneyReceiptMaster.id')
       ->leftjoin('InvoiceMaster','InvoiceMaster.id','=','MoneyReceiptTransaction.InvId')
       ->leftjoin('bank_masters','bank_masters.id','=','MoneyReceiptMaster.BankName')
       ->select('MoneyReceiptMaster.*','MoneyReceiptTransaction.InvId','MoneyReceiptTransaction.Amount','MoneyReceiptTransaction.Amount','InvoiceMaster.InvNo','bank_masters.BankName as MBank')
       ->where('CustId',$request->customer_name)->whereBetween('PaymentDate',[$fromDate,$Toate])->get();
       if(!empty($datas->toarray()))
       {
           $html='<table class="mb-1 mt-1 table table-bordered table-centered"><thead><tr class="main-title text-dark"><th class=p-1 style=min-width:130px>ACTION<th class=p-1 style=min-width:20px>SL#<th class=p-1 style=min-width:180px>MR No<th class=p-1 style=min-width:180px>Invoice Number<th class=p-1 style=min-width:130px>Payment Type<th class=p-1 style=min-width:180px>Payment Mode<th class=p-1 style=min-width:170px>Payment Date<th class=p-1 style=min-width:130px>Amount<th class=p-1 style=min-width:130px>TDS Amount<th class=p-1 style=min-width:130px>Bank Name<th class=p-1 style=min-width:130px>Account Number<th class=p-1 style=min-width:130px>Cheque No<th class=p-1 style=min-width:130px>Cheque Date<tbody>';
           $i=0;
           foreach($datas as $dataValue)
           {
           $i++;
           if($dataValue->PaymentType ==1)
           {
               $ptye="NEW";
           }
           else
           {
            $ptye="ADJUSTMENT";
           }
           if($dataValue->PaymentMode ==1)
           {
               $Pmode="BANK";
           }
           else
           {
              $Pmode="CASH";
           }
           $paymentDate=date('d-m-Y',strtotime($dataValue->PaymentDate));
           $UtrDateDate=date('d-m-Y',strtotime($dataValue->UtrDate));
           $html.='<tr><td><a href="javascript:void(0)" onclick="deleteMoneyRecept('.$dataValue->id.','.$dataValue->InvId.')">Delete</a></td><td>'.$i.'</td><td>'.$dataValue->MRNo.'</td><td>'.$dataValue->InvNo.'</td><td>'.$ptye.'</td><td>'.$Pmode.'</td><td>'.$paymentDate.'</td><td>'.$paymentDate.'</td><td>'.$dataValue->Amount.'</td><td>'.$dataValue->tds.'</td><td>'.$dataValue->MBank.'</td><td>'.$dataValue->AccountNo.'</td><td>'.$dataValue->UtrNo.'</td><td>'.$UtrDateDate.'</td></tr>';
          
        }
            $data=array('status'=>'true','data'=>$html); 
          }
          else{
            $data=array('status'=>'false','data'=>''); 
         } 
         echo json_encode($data); 
    
    }
    public function MoneyReceivedDeletePost(Request $request)
    {
        MoneyReceiptTrans::where('MasterId',$request->Mid)->where('InvId',$request->InvId)->delete();
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
     * @param  \App\Http\Requests\StoreMoneyReceptDeletionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMoneyReceptDeletionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sales\MoneyReceptDeletion  $moneyReceptDeletion
     * @return \Illuminate\Http\Response
     */
    public function show(MoneyReceptDeletion $moneyReceptDeletion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sales\MoneyReceptDeletion  $moneyReceptDeletion
     * @return \Illuminate\Http\Response
     */
    public function edit(MoneyReceptDeletion $moneyReceptDeletion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMoneyReceptDeletionRequest  $request
     * @param  \App\Models\Sales\MoneyReceptDeletion  $moneyReceptDeletion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMoneyReceptDeletionRequest $request, MoneyReceptDeletion $moneyReceptDeletion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sales\MoneyReceptDeletion  $moneyReceptDeletion
     * @return \Illuminate\Http\Response
     */
    public function destroy(MoneyReceptDeletion $moneyReceptDeletion)
    {
        //
    }
}
