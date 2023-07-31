<?php

namespace App\Http\Controllers\Account;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCreditNoteRequest;
use App\Http\Requests\UpdateCreditNoteRequest;
use App\Models\Account\CreditNote;
use Auth;
use Illuminate\Http\Request;
use App\Models\Account\CustomerMaster;
use App\Models\Account\CustomerInvoice;
use Maatwebsite\Excel\Facades\Excel;
use App\SalesExport\CreditNoteDownloadExport;
class CreditNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $customer=CustomerMaster::where("Active","Yes")->get();
        return view('Account.CreditNote', [
            'title'=>'Credit Note',
            'customer'=>$customer
            ]);
    }
    public function GetCustomerDetsilsCredit(Request $request)
    {
        $last= CustomerMaster::with('CustAddress','PaymentDetails')->where('id',$request->custid)->first();
        echo json_encode($last);
    }
    public function CheckInvoiceCreditNode(Request $request)
    {
        $custInv=CustomerInvoice::withsum('Sum','Qty')->withsum('Sum','Fright')->withsum('Sum','Scst')->withsum('Sum','Cgst')->withsum('Sum','Igst')->withsum('Sum','Total')->where('InvNo',$request->InvNo)->where('Cust_Id',$request->CustId)->first();
        if(!empty($custInv))
        {
            echo json_encode($custInv);
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
     * @param  \App\Http\Requests\StoreCreditNoteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCreditNoteRequest $request)
    {
        $UserId=Auth::id();
        $checkLastId=CreditNote::orderBy('id','DESC')->first();
        if(isset($checkLastId->id))
        {
             $ids=$checkLastId->id;
             $ididid= $ids+1;
             $note='CRN/23-24/'.$ididid;
           
        }
        else{
            $note='CRN/23-24/1';
        }
        $NodeDate=date("Y-m-d", strtotime($request->credit_note_date));
        $LatInsertId=CreditNote::insertGetId(
            ['NodeNo'=>$note,'CustId' => $request->customer_name,'AddressId'=>$request->Addressid,'NoteDate'=>$NodeDate,'InvDate'=>$request->invoice_date,'InvId'=>$request->Invid,'InvFright'=>$request->invoice_amnt,'InvCGST'=>$request->cgst,'InvSGST'=>$request->sgst,'InvIGST'=>$request->igst,'InvTotalAmount'=>$request->total,'CFright'=>$request->invoice_amnt_credit,'CSGST'=>$request->sgst_credit,'CCGST'=>$request->cgst_credit,'CIGST'=>$request->igst_credit,'CTotalAmount'=>$request->total_Credit,'CreatedBy'=>$UserId,'Remark'=>$request->remark]
        ); 
        return $note;
    }
    public function CancelCreditNode(Request $request)
    {
        $UserId=Auth::id();
        CreditNote::where("NodeNo", $request->credit_note_no_cancel)->update(['cancel_remark' => $request->cancel_remark,'cancelAt'=>date('y-m-d H:i:s'),'cancelBy'=>$UserId]); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account\CreditNote  $creditNote
     * @return \Illuminate\Http\Response
     */
    public function show(CreditNote $creditNote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account\CreditNote  $creditNote
     * @return \Illuminate\Http\Response
     */
    public function edit(CreditNote $creditNote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCreditNoteRequest  $request
     * @param  \App\Models\Account\CreditNote  $creditNote
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCreditNoteRequest $request, CreditNote $creditNote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account\CreditNote  $creditNote
     * @return \Illuminate\Http\Response
     */
    public function destroy(CreditNote $creditNote)
    {
        //
    }

    public function  CustomerCreditNoteReport(Request $request){
        $date=[];
        $customerData='';
        if($request->customer)
        {
          $customerData=$request->customer;  
        }
        if($request->formDate){
            $date['formDate']=  date("Y-m-d",strtotime($request->formDate));
        }
        
        if($request->todate){
           $date['todate']=  date("Y-m-d",strtotime($request->todate));
        }

        $customer=CustomerMaster::where("Active","Yes")->get();
        $credit = CreditNote::with('CustomerDetail','InvoiceMasterDataDetail','CustomerAddDetails','userData','CancelByData')->where(function($query) use ($customerData) {
                if($customerData !=''){
                    $query->whereRelation('CustomerDetail','CustId',$customerData);
                }
             })
             ->where(function($query) use($date){
                if(isset($date['formDate']) &&  isset($date['todate'])){
                    $query->whereBetween("CreditNote.NoteDate",[$date['formDate'],$date['todate']]);
                }
               })
             ->where("Type",1)
             ->paginate(10);
             if($request->get('submit')=="Download"){ 
                return Excel::download(new CreditNoteDownloadExport($date,$customerData),"CreditNoteDownloadExport.xlsx");
                
             }
        return view('Account.CreditNoteRegister', [
            'title'=>'Credit Note -Register',
            'customer'=>$customer,
            'credit'=>$credit
            ]); 
    }

    public function PrintCreditNode(Request $request)
    {
       $CreditNo = $request->get('CreditNo');

       CreditNote::with('CustomerDetail','InvoiceMasterDataDetail','CustomerAddDetails','userData','CancelByData')
       ->where("NodeNo",$CreditNo)->first();

    }

    

    
}
