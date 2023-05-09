<?php

namespace App\Http\Controllers\Account;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReconCashAndToPayRequest;
use App\Http\Requests\UpdateReconCashAndToPayRequest;
use App\Models\Account\ReconCashAndToPay;
use Auth;
use Illuminate\Http\Request;
use App\Models\Operation\DocketDepositTrans;
class ReconCashAndToPayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Account.ReconCashAndToPay', [
            'title'=>'To Pay Collection',
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
     * @param  \App\Http\Requests\StoreReconCashAndToPayRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReconCashAndToPayRequest $request)
    {
        DocketDepositTrans::where('Docket_Id',$request->DocketId)->update(['RefNo'=>$request->refno]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account\ReconCashAndToPay  $reconCashAndToPay
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
         $docket=DocketDepositTrans::with('DocketDetails','BankDetails')->where('DepositAt',$request->reconcilation)->where('RefNo','=',null)->get();
         $html='';
         $html.='<table class="table-responsive table-bordered" width="100%"><thead><tr class="main-title text-dark"><th>SL#</th><th>ACTION</th><th>UTR/Reference Number</th><th>Deposit Date</th><th>Docket Number</th><th>Deposit Amount</th><th>Deposit Branch</th><th>Deposit Bank</th><th>Account Number</th><th>Deposit Remarks</th><tr></thead><tbody>';
          $i=0; 
         foreach($docket as $dockets)
            {
                $i++;
                if(isset($dockets->Attachment) && $dockets->Attachment !='')
                {
                    $image='<a href="'.url($dockets->Attachment).'" target="_blank">View</a>';
                }
                else{
                    $image='';
                }
               
              $html.='<tr><td>'.$i.'</td><td>'.$image.'</td><td><input type="text" class="form-control" onchange="UpdateRefNo('.$dockets->Docket_Id.',this.value)"></td><td>'.$dockets->Date.'</td><td>'.$dockets->DocketDetails->Docket_No.'</td><td>'.$dockets->Amt.'</td><td></td><td>'.$dockets->BankDetails->BankName.'</td><td>'.$dockets->Account_Number.'</td><td>'.$dockets->Remark.'</td></tr>'; 
            }
            $html.='<tbody></table>';
            echo $html;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account\ReconCashAndToPay  $reconCashAndToPay
     * @return \Illuminate\Http\Response
     */
    public function edit(ReconCashAndToPay $reconCashAndToPay)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReconCashAndToPayRequest  $request
     * @param  \App\Models\Account\ReconCashAndToPay  $reconCashAndToPay
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReconCashAndToPayRequest $request, ReconCashAndToPay $reconCashAndToPay)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account\ReconCashAndToPay  $reconCashAndToPay
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReconCashAndToPay $reconCashAndToPay)
    {
        //
    }
}
