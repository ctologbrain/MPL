<?php

namespace App\Http\Controllers\Account;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCodDepositeRequest;
use App\Http\Requests\UpdateCodDepositeRequest;
use App\Models\Account\CodDeposite;
use App\Models\Account\CustomerMaster;
use App\Models\CompanySetup\BankMaster;
use Illuminate\Http\Request;
use App\Models\Operation\DocketMaster;
use Auth;
class CodDepositeController extends Controller
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
        return view('Account.CodDesposite', [
            'title'=>'COD DEPOSITE',
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
     * @param  \App\Http\Requests\StoreCodDepositeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCodDepositeRequest $request)
    {
        echo "<pre>";
        print_r($_POST);
        die;
        $UserId=Auth::id();
        $paymantDate=date("Y-m-d", strtotime($request->payment_date));
        $UtrDate=date("Y-m-d", strtotime($request->utr_date));
        CodDeposite::insert(
            ['CustId'=>$request->customer_name,'PaymentMode' => $request->payment_mode,'Amount'=>$request->amount,'PaymentDate'=>$paymantDate,'Bank'=>$request->bank_name,'UtrNo'=>$request->utr_no,'UtrDate' =>$UtrDate,'Remark' => $request->remarks,'DocketNo' => $request->docket_no,'DepostAmount' => $request->deposit_amount,'CodeAmount' => $request->codAmountoo,'BalanceAmount' => $request->BalanceAmount,'Created_By' =>$UserId]
          );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account\CodDeposite  $codDeposite
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $docketDetails=DocketMaster::where('Docket_No',$request->docket)->where('Cust_Id',$request->customer_name)->first();
        if(empty($docketDetails))
        {
            $datas=array('status'=>'false','message'=>'Docket Not Found');  
        }
        elseif(!empty($docketDetails) && $docketDetails->CODAmount==0 && $docketDetails->CODAmount=='')
        {
            $datas=array('status'=>'false','message'=>'Amount is not due !');  
        }
        else{
            $datas=array('status'=>'true','message'=>'ok','CodAmount'=>$docketDetails->CODAmount);   
        }
        echo json_encode($datas);
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account\CodDeposite  $codDeposite
     * @return \Illuminate\Http\Response
     */
    public function edit(CodDeposite $codDeposite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCodDepositeRequest  $request
     * @param  \App\Models\Account\CodDeposite  $codDeposite
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCodDepositeRequest $request, CodDeposite $codDeposite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account\CodDeposite  $codDeposite
     * @return \Illuminate\Http\Response
     */
    public function destroy(CodDeposite $codDeposite)
    {
        //
    }
}
