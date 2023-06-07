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
use App\Models\Operation\GatePassCanceled;
use App\Models\Operation\DRSEntry;
use Auth;
use DB;
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

        $DRSID = DRSEntry::where("DRS_No",$request->DrsNo)->first();  
        $CancelledCheck = GatePassCanceled::where('Activity_Id',$DRSID->ID)->where('Actvity_Type',2)->first();
        $CheckExistance = DrsDelivery::where("D_Number",$request->DrsNo)->first();
        if(!empty($CancelledCheck)){
            echo  '1';
            die;
        }
       
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
            $checkDocketQty=DrsDeliveryTransaction::where('Docket',$docketDetails['docket'])->first();
            if(!empty($checkDocketQty))
            {
                $checkDockQty=$checkDocketQty->DelieveryPieces;
            }
            else
            {
                $checkDockQty=0; 
            }
            if(isset( $docketDetails['ndr_reason'])){
               $Ndr_RES = $docketDetails['ndr_reason'];
               $status = 9;
           }
           else{
            $Ndr_RES= '';
            $status = 8;
           }
           if(isset($docketDetails['ndr_remark'])){
            $Ndr_REMARK =$docketDetails['ndr_remark'];
            }
            else{
            $Ndr_REMARK= '';
            }

            
            DrsDeliveryTransaction::insertGetId(
                ['Drs_id'=>$drsDe,'Docket' =>$docketDetails['docket'],'Type'=>$docketDetails['type'],'ActualPieces'=>$docketDetails['actual_pieces'],'DelieveryPieces'=>$docketDetails['delievery_pieces'],'Weight'=>$docketDetails['weight'],'Time'=>date("Y-m-d",strtotime($docketDetails['time'])),'ProofName'=>$docketDetails['proof_name'],'RecName'=>$docketDetails['reciever_name'],'phone'=>$docketDetails['phone'],'ProofDetail'=>$docketDetails['proof_detail'],'NdrReason'=>$Ndr_RES,'Ndr_remark'=>$Ndr_REMARK,'CreatedBy'=>$UserId]
            ); 
            DocketAllocation::where("Docket_No", $docketDetails['docket'])->update(['Status' =>$status,'BookDate'=>date("Y-m-d", strtotime($request->delivery_date))]);
            $docketFile=DrsDelivery::
            leftjoin('drs_delivery_transactions','drs_delivery_transactions.Drs_id','=','drs_deliveries.id')
            ->leftjoin('ndr_masters','ndr_masters.id','=','drs_delivery_transactions.NdrReason')
            ->leftjoin('users','users.id','=','drs_delivery_transactions.CreatedBy')
           ->leftjoin('employees','employees.user_id','=','users.id')
           ->leftjoin('office_masters','employees.OfficeName','=','office_masters.id')
           ->leftjoin('delivery_proof_masters','drs_delivery_transactions.ProofName','=','delivery_proof_masters.id')

           ->select('drs_delivery_transactions.*',DB::raw("SUM(drs_delivery_transactions.DelieveryPieces) as SumOfDelivery"),'employees.EmployeeName','ndr_masters.ReasonDetail','office_masters.OfficeName','office_masters.OfficeCode','delivery_proof_masters.ProofCode', 'delivery_proof_masters.ProofName as ProfN','drs_delivery_transactions.Ndr_remark','drs_delivery_transactions.DelieveryPieces','drs_delivery_transactions.Weight')
           ->where('drs_delivery_transactions.Docket',$docketDetails['docket'])
           ->where('drs_delivery_transactions.Drs_id',$drsDe)
           
           ->first();
           if($docketDetails['type']=='NDR')
           {
            $string = "<tr><td>NDR</td><td>".date("d-m-Y",strtotime($request->delivery_date))."</td><td><strong>NDR DATE: ".date("d-m-Y",strtotime($request->delivery_date))."</strong><br><strong>NDR  REASON: </strong>$docketFile->ReasonDetail<br><strong>NDR REMARK</strong>: $docketFile->Ndr_remark <br><strong>PIECES</strong>: $docketFile->DelieveryPieces   <br><strong>WEIGHT</strong>: $docketFile->Weight</td><td>".date('d-m-Y h:i A')."</td><td>".$docketFile->EmployeeName." <br>(".$docketFile->OfficeCode.'~'.$docketFile->OfficeName.")</td></tr>"; 
               Storage::disk('local')->append($docketDetails['docket'], $string);
           }
           else{
             
               if($docketDetails['actual_pieces'] != ($checkDockQty+$docketDetails['delievery_pieces']))
               {
                  $title='PART DELIVERED';
               }
               else
               {
                $title='DELIVERED';
               }
            $string = "<tr><td>".$title."</td><td>".date("d-m-Y",strtotime($request->delivery_date))."</td><td><strong>DELIVERED NO: $request->drs_number</strong><br><strong>ON DATED: </strong>".date("d-m-Y",strtotime($request->delivery_date))."<br>(PROOF NAME SIGNATURE): $docketFile->ProofCode ~ $docketFile->ProfN <br><strong> PIECES:</strong> ".$docketDetails['delievery_pieces'].' <strong>Weight:</strong>'.$docketDetails['weight']."</td><td>".date('d-m-Y H:i A')."</td><td>".$docketFile->EmployeeName."<br>(".$docketFile->OfficeCode.'~'.$docketFile->OfficeName.")</td></tr>"; 
            Storage::disk('local')->append($docketDetails['docket'], $string);
           }
        }
        $statuss = 'Docket Delivery Successfully';
        $request->session()->flash('status', $statuss);
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
