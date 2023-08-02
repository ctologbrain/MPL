<?php

namespace App\Http\Controllers\Account;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\StoreDebitNoteRequest;
use App\Http\Requests\UpdateDebitNoteRequest;
use App\Models\Account\DebitNote;
use App\Models\Account\CreditNote;
use App\Models\Account\CustomerMaster;
use App\Models\Account\CustomerInvoice;
use App\Models\Account\CustomerOtherCharges;
class DebitNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Customer = CustomerMaster::where("Active","Yes")->get();
        $Charge =CustomerOtherCharges::get();
        return view('Account.debitNote',
        ['title'=>'DEBIT NOTE',
        'Customer'=>$Customer,
        'Charge'=> $Charge]);
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
     * @param  \App\Http\Requests\StoreDebitNoteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDebitNoteRequest $request)
    {
        //
        $UserId=Auth::id();
        $checkLastId=CreditNote::orderBy('id','DESC')->first();
        if(isset($checkLastId->id))
        {
          $note='DRN/23-24/'.intval($checkLastId->id+1);
        }
        else{
            $note='DRN/23-24/1';
        }

        $NodeDate=date("Y-m-d", strtotime($request->debit_note_date));
        $LatInsertId=CreditNote::insertGetId(
            ['NodeNo'=>$note,'CustId' => $request->customer_name,'AddressId'=>$request->Addressid,'NoteDate'=>$NodeDate,'InvDate'=>$request->invoice_date,'InvId'=>$request->Invid,'InvFright'=>$request->invoice_amnt,'InvCGST'=>$request->cgst,'InvSGST'=>$request->sgst,'InvIGST'=>$request->igst,'InvTotalAmount'=>$request->total,'CFright'=>$request->invoice_amnt_credit,'CSGST'=>$request->sgst_credit,'CCGST'=>$request->cgst_credit,'CIGST'=>$request->igst_credit,'CTotalAmount'=>$request->total_Credit,'CreatedBy'=>$UserId,'Remark'=>$request->remark,"Charge_id"=>$request->Charge, "Type"=>2]
        ); 
        return $note;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account\DebitNote  $debitNote
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request ,DebitNote $debitNote)
    {
        //
        $last= CustomerMaster::with('CustAddress','PaymentDetails')->where('id',$request->Customer)->first();
        echo json_encode($last);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account\DebitNote  $debitNote
     * @return \Illuminate\Http\Response
     */
    public function edit(DebitNote $debitNote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDebitNoteRequest  $request
     * @param  \App\Models\Account\DebitNote  $debitNote
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDebitNoteRequest $request, DebitNote $debitNote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account\DebitNote  $debitNote
     * @return \Illuminate\Http\Response
     */
    public function destroy(DebitNote $debitNote)
    {
        //
    }

    public function GetAllInvoiceDetails(Request $request){
        $custInv=CustomerInvoice::withsum('Sum','Qty')->withsum('Sum','Fright')->withsum('Sum','Scst')->withsum('Sum','Cgst')->withsum('Sum','Igst')->withsum('Sum','Total')->where('InvNo',$request->InvNo)->where('Cust_Id',$request->CustId)->first();
        if(!empty($custInv))
        {
            echo json_encode($custInv);
        }
        else{
           
            return 'false';
        }
    }
}
