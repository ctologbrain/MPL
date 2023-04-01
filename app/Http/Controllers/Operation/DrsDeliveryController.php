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
use Illuminate\Support\Facades\Storage;
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
        $UserId=Auth::id();
        $drsDe=DrsDelivery::insertGetId(
            ['D_Date' => $request->delivery_date,'D_Number'=>$request->drs_number,'O_KM'=>$request->opening_km,'C_KM'=>$request->closing_km]
        );
        
        foreach($request->docket as $docketDetails)
        {
            DrsDeliveryTransaction::insertGetId(
                ['Drs_id'=>$drsDe,'Docket' =>$docketDetails['docket'],'Type'=>$docketDetails['type'],'ActualPieces'=>$docketDetails['actual_pieces'],'DelieveryPieces'=>$docketDetails['delievery_pieces'],'Weight'=>$docketDetails['weight'],'Time'=>$docketDetails['time'],'ProofName'=>$docketDetails['proof_name'],'RecName'=>$docketDetails['reciever_name'],'phone'=>$docketDetails['phone'],'ProofDetail'=>$docketDetails['proof_detail'],'NdrReason'=>$docketDetails['ndr_reason'],'Ndr_remark'=>$docketDetails['ndr_remark'],'CreatedBy'=>$UserId]
            ); 
            $docketFile=DrsDelivery::
            leftjoin('drs_delivery_transactions','drs_delivery_transactions.Drs_id','=','drs_deliveries.id')
            ->leftjoin('users','users.id','=','drs_delivery_transactions.CreatedBy')
           ->leftjoin('employees','employees.user_id','=','users.id')
           ->select('drs_delivery_transactions.*','employees.EmployeeName')
           ->where('drs_delivery_transactions.Docket',$docketDetails['docket'])
           
          ->first();
            $string = "<tr><td>DELIVERED</td><td>$request->delivery_date</td><td><strong>DELIVERED NO: $request->drs_number</strong><br><strong>ON DATED: </strong>$request->delivery_date<br>(PROOF NAME SIGNATURE): $docketFile->ProofName</td><td>".date('Y-m-d H:i:s')."</td><td>$docketFile->EmployeeName</td></tr>"; 
               Storage::disk('local')->append($docketDetails['docket'], $string);
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
