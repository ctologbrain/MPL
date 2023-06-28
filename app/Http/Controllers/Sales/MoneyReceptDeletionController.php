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
       $datas=MoneyReceipt::where('CustId',$request->customer_name)->whereBetween('PaymentDate',[$fromDate,$Toate])->get();
       echo "<pre>";
       print_r($datas);
       die;
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
