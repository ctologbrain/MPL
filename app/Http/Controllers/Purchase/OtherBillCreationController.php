<?php
namespace App\Http\Controllers\Purchase;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\StoreOtherBillCreationRequest;
use App\Http\Requests\UpdateOtherBillCreationRequest;
use App\Models\Purchase\OtherBillCreation;
use App\Models\Purchase\VendorBillingDetails;
use App\Models\Vendor\VendorMaster;
class OtherBillCreationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $vendor=VendorMaster::get();
        return view('Purchase.OtherBillCreation', [
            'title'=>'CASH BOOKING',
            'vendor'=>$vendor
          
         ]);
    }
    public function GetVendorDetails(Request $request)
    {
        $vendor=VendorMaster::with('VendorDetails','VendorBankDetails','OfficeDetails')->where('vendor_masters.id',$request->VendrId)->first();
        echo json_encode($vendor);
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
     * @param  \App\Http\Requests\StoreOtherBillCreationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOtherBillCreationRequest $request)
    {
        $biilDate=date('Y-m-d',strtotime($request->bill_date));
        $biilDueDate=date('Y-m-d',strtotime($request->bill_due_date));
        $fromDate=date('Y-m-d',strtotime($request->from_date));
        $todate=date('Y-m-d',strtotime($request->to_date));
        $UserId=Auth::id();
        if(isset($request->Invid) && $request->Invid !='')
        {
            $lastId=$request->Invid;
        }
        else
        {
            $lastId=OtherBillCreation::insertGetId(
                ['VendorId' => $request->vendorname,'BillNo'=>$request->billNo,'OrderNo'=>$request->Order_no,'BillAmount'=>$request->bill_amt,'BillDate'=>$biilDate,'BillDueDate'=>$biilDueDate,'FromDate'=>$fromDate,'ToDate'=>$todate,'CreatedBy'=>$UserId]
            );
        }
      
          VendorBillingDetails::insert(
            ['InvId' =>$lastId,'InvDetails'=>$request->item_detail,'HsnCode'=>$request->hsn_code,'Qty'=>$request->quantity,'Rate'=>$request->rate,'TaxAmount'=>$request->taxabble_amt,'Gst'=>$request->gst,'GstAmount'=>$request->gst_amt,'TotalAmount'=>$request->total_amt]
         );
         $invDetails=VendorBillingDetails::where('InvId',$lastId)->get();
         $html='';
         $totalSum=0;
         foreach($invDetails as $InvSSS)
         {
            $totalSum+=$InvSSS->TotalAmount;
             $html.='<tr><td>'.$InvSSS->InvDetails.'</td><td>'.$InvSSS->HsnCode.'</td><td>'.$InvSSS->Qty.'</td><td>'.$InvSSS->Rate.'</td><td>'.$InvSSS->TaxAmount.'</td><td>'.$InvSSS->Gst.'</td><td>'.$InvSSS->GstAmount.'</td><td>'.$InvSSS->TotalAmount.'</td><td><a href="javascript:void(0)" onclick="DeleteInvoceIane('."'$InvSSS->id'".','."'$lastId'".')">delete</a></td></tr>';
         }
         $balanceAmount=$request->bill_amt-$totalSum;
         $data=array('lastid'=>$lastId,'httml'=>$html,'totalSum'=>$totalSum,'balanceAmount'=>$balanceAmount);
         echo json_encode($data);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase\OtherBillCreation  $otherBillCreation
     * @return \Illuminate\Http\Response
     */
    public function show(OtherBillCreation $otherBillCreation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase\OtherBillCreation  $otherBillCreation
     * @return \Illuminate\Http\Response
     */
    public function edit(OtherBillCreation $otherBillCreation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOtherBillCreationRequest  $request
     * @param  \App\Models\Purchase\OtherBillCreation  $otherBillCreation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOtherBillCreationRequest $request, OtherBillCreation $otherBillCreation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase\OtherBillCreation  $otherBillCreation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        VendorBillingDetails::where('id',$request->id)->where('InvId',$request->InvId)->delete();
        $invDetails=VendorBillingDetails::where('InvId',$request->InvId)->get();
        $html='';
        $totalSum=0;
        foreach($invDetails as $InvSSS)
        {
           $totalSum+=$InvSSS->TotalAmount;
            $html.='<tr><td>'.$InvSSS->InvDetails.'</td><td>'.$InvSSS->HsnCode.'</td><td>'.$InvSSS->Qty.'</td><td>'.$InvSSS->Rate.'</td><td>'.$InvSSS->TaxAmount.'</td><td>'.$InvSSS->Gst.'</td><td>'.$InvSSS->GstAmount.'</td><td>'.$InvSSS->TotalAmount.'</td><td><a href="javascript:void(0)" onclick="DeleteInvoceIane('."'$request->id'".','."'$request->InvId'".')">delete</a></td></tr>';
        }
        $balanceAmount=$request->bill_amt-$totalSum;
        $data=array('lastid'=>$request->InvId,'httml'=>$html,'totalSum'=>$totalSum,'balanceAmount'=>$balanceAmount);
        echo json_encode($data);
    }
    public function PostInvoiceDetails(Request $request)
    {
        $file=$request->file;
        if($file !='')
        {
         $destination = public_path("VendorInvoice");
         $file->move($destination,date("YmdHis").$file->getClientOriginalName());
         $link = 'public/DocumentDispatch/'.date("YmdHis").$file->getClientOriginalName();
       }
        OtherBillCreation::where("id", $request->InvId)->update(
            ['sub_total'=>$request->sub_total,'discount'=>$request->discount,'Tds'=>$request->Tds,'tdsAmount'=>$request->tdsAmount,'adjustment'=>$request->adjustment,'net_amt'=>$request->net_amt,'bill_remark'=>$request->bill_remark,'atach_copy'=> $link,'Status'=>1]
           );   
       
    }
    public function CancleVendorInvoice(Request $request)
    {
        $UserId=Auth::id();
        OtherBillCreation::where("BillNo", $request->billNo)->update(
            ['Status'=>2,'CancleBy'=>$UserId,'CancleDate'=>date('Y-m-d')]
           );  
    }
}
