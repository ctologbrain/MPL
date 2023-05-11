<?php

namespace App\Http\Controllers\Account;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMoneyReceiptRequest;
use App\Http\Requests\UpdateMoneyReceiptRequest;
use App\Models\Account\MoneyReceipt;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account\MoneyReceipt  $moneyReceipt
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        
        $getCustInv=CustomerInvoice::withSum('InvNewDetailsMoney as TotalFright','Fright')->withSum('InvNewDetailsMoney as TotalScst','Scst')->withSum('InvNewDetailsMoney as TotalCgst','Cgst')->withSum('InvNewDetailsMoney as TotalIgst','Igst')->withSum('InvNewDetailsMoney as TotalAmount','Total')->where('Cust_Id',$request->customer_name)->get();
        return view('Account.MoneyReceptInner', [
            'title'=>'MONEY RECEIPT',
            'CustInv'=>$getCustInv,
            'amount'=>$request->amount,
            'tds'=>$request->tds,
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
