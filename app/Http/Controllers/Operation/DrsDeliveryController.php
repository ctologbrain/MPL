<?php
namespace App\Http\Controllers\Operation;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDrsDeliveryRequest;
use App\Http\Requests\UpdateDrsDeliveryRequest;
use App\Models\Operation\DrsDelivery;
use Illuminate\Http\Request;
use App\Models\Operation\DRSTransactions;
use App\Models\OfficeSetup\NdrMaster;
use App\Models\OfficeSetup\DeliveryProofMaster;
use App\Models\Operation\DrsDeliveryTransaction;
use App\Models\Stock\DocketAllocation;
use Illuminate\Support\Facades\Storage;
use Auth;
class DrsDeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Operation.DRSWiseDelivery', [
            'title'=>'DELIVERY - DRS WISE',
           
          
            ]);
    
    }
    public function getDrsEntryNumber(Request $request)
    {
        $dproof=DeliveryProofMaster::get();
        $ndr=NdrMaster::get();
        $docketData=DRSTransactions::
        leftjoin('DRS_Masters','DRS_Masters.ID','=','DRS_Transactions.DRS_No')
        ->where('DRS_Masters.DRS_No',$request->DrsNo)->get();
        return view('Operation.DRSWiseDeliveryInner', [
            'title'=>'DELIVERY - DRS WISE',
            'docketData'=>$docketData,
            'dproof'=>$dproof,
            'ndr'=>$ndr
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
     * @param  \App\Http\Requests\StoreDrsDeliveryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDrsDeliveryRequest $request)
    {
        date_default_timezone_set('Asia/Kolkata');
        $UserId=Auth::id();
        $drsDe=DrsDelivery::insertGetId(
            ['D_Date' => date("Y-m-d",strtotime($request->delivery_date)),'D_Number'=>$request->drs_number,'O_KM'=>$request->opening_km,'C_KM'=>$request->closing_km]
        );
        
        foreach($request->docket as $docketDetails)
        {
            DrsDeliveryTransaction::insertGetId(
                ['Drs_id'=>$drsDe,'Docket' =>$docketDetails['docket'],'Type'=>$docketDetails['type'],'ActualPieces'=>$docketDetails['actual_pieces'],'DelieveryPieces'=>$docketDetails['delievery_pieces'],'Weight'=>$docketDetails['weight'],'Time'=>date("Y-m-d",strtotime($docketDetails['time'])),'ProofName'=>$docketDetails['proof_name'],'RecName'=>$docketDetails['reciever_name'],'phone'=>$docketDetails['phone'],'ProofDetail'=>$docketDetails['proof_detail'],'NdrReason'=>$docketDetails['ndr_reason'],'Ndr_remark'=>$docketDetails['ndr_remark'],'CreatedBy'=>$UserId]
            ); 
            DocketAllocation::where("Docket_No", $docketDetails['docket'])->update(['Status' =>8,'BookDate'=>date("Y-m-d", strtotime($request->delivery_date))]);
            $docketFile=DrsDelivery::
            leftjoin('drs_delivery_transactions','drs_delivery_transactions.Drs_id','=','drs_deliveries.id')
            ->leftjoin('ndr_masters','ndr_masters.id','=','drs_delivery_transactions.NdrReason')
            ->leftjoin('users','users.id','=','drs_delivery_transactions.CreatedBy')
           ->leftjoin('employees','employees.user_id','=','users.id')
           ->leftjoin('office_masters','employees.OfficeName','=','office_masters.id')
           ->select('drs_delivery_transactions.*','employees.EmployeeName','ndr_masters.ReasonDetail','office_masters.OfficeName','office_masters.OfficeCode')
           ->where('drs_delivery_transactions.Docket',$docketDetails['docket'])
           ->first();
           if($docketDetails['type']=='NDR')
           {
            $string = "<tr><td>NDR</td><td>".date("d-m-Y",strtotime($request->delivery_date))."</td><td><strong>NDR DATE: $request->delivery_date</strong><br><strong>NDR  RESION: </strong>$docketFile->ReasonDetail<br>NDR REMARK: $docketFile->Ndr_remark</td><td>".date('Y-m-d h:i A')."</td><td>".$docketFile->EmployeeName."(".$docketFile->OfficeCode.'~'.$docketFile->OfficeName.")</td></tr>"; 
               Storage::disk('local')->append($docketDetails['docket'], $string);
           }
           else{
            $string = "<tr><td>DELIVERED</td><td>".date("d-m-Y",strtotime($request->delivery_date))."</td><td><strong>DELIVERED NO: $request->drs_number</strong><br><strong>ON DATED: </strong>".date("d-m-Y",strtotime($request->delivery_date))."<br>(PROOF NAME SIGNATURE): $docketFile->ProofName</td><td>".date('Y-m-d H:i A')."</td><td>".$docketFile->EmployeeName."(".$docketFile->OfficeCode.'~'.$docketFile->OfficeName.")</td></tr>"; 
            Storage::disk('local')->append($docketDetails['docket'], $string);
           }
           
        }
        $request->session()->flash('status', 'Docket Delivery Successfully');
        return redirect('DRSWiseUpdation');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\DrsDelivery  $drsDelivery
     * @return \Illuminate\Http\Response
     */
    public function show(DrsDelivery $drsDelivery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\DrsDelivery  $drsDelivery
     * @return \Illuminate\Http\Response
     */
    public function edit(DrsDelivery $drsDelivery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDrsDeliveryRequest  $request
     * @param  \App\Models\Operation\DrsDelivery  $drsDelivery
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDrsDeliveryRequest $request, DrsDelivery $drsDelivery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\DrsDelivery  $drsDelivery
     * @return \Illuminate\Http\Response
     */
    public function destroy(DrsDelivery $drsDelivery)
    {
        //
    }
}
