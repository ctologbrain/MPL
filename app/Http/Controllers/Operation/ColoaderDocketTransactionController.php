<?php
namespace App\Http\Controllers\Operation;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreColoaderDocketTransactionRequest;
use App\Http\Requests\UpdateColoaderDocketTransactionRequest;
use App\Models\Operation\ColoaderDocketTransaction;
use Auth;
use Illuminate\Http\Request;
use App\Models\Stock\DocketAllocation;
use App\Models\Operation\VehicleGatepass;
use App\Models\Operation\GatePassCanceled;
use Illuminate\Support\Facades\Storage;
use DB;
class ColoaderDocketTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreColoaderDocketTransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreColoaderDocketTransactionRequest $request)
    {
        date_default_timezone_set('Asia/Kolkata');
       // $request->GatePassId;
        $lastId=ColoaderDocketTransaction::insert(
            ['Manifest_Id' =>$request->ManiFestid,'Docket_Id'=>$request->DocketId,'Pices'=>$request->displayPices,'Weight'=>$request->displayWeight]
        );
        $docket=ColoaderDocketTransaction::select('Co_loader_Mainifest.Manifest','docket_masters.Docket_No','Coloader_Docket_Transaction.Pices','Coloader_Docket_Transaction.Weight')->where('Coloader_Docket_Transaction.Manifest_Id',$request->ManiFestid)
        ->leftjoin('Co_loader_Mainifest','Co_loader_Mainifest.id','=','Coloader_Docket_Transaction.Manifest_Id')
        ->leftjoin('docket_masters','docket_masters.id','=','Coloader_Docket_Transaction.Docket_Id')
        ->leftjoin('docket_product_details','docket_product_details.Docket_Id','=','docket_masters.id')
        ->get();
        $docketFile=ColoaderDocketTransaction::select('Co_loader_Mainifest.Date','Co_loader_Mainifest.Remarks','Co_loader_Mainifest.Manifest','docket_masters.Docket_No','Coloader_Docket_Transaction.Pices','Coloader_Docket_Transaction.Weight','employees.EmployeeName','office_masters.OfficeCode','office_masters.OfficeName')->where('Coloader_Docket_Transaction.Docket_Id',$request->DocketId)
        ->leftjoin('Co_loader_Mainifest','Co_loader_Mainifest.id','=','Coloader_Docket_Transaction.Manifest_Id')
        ->leftjoin('docket_masters','docket_masters.id','=','Coloader_Docket_Transaction.Docket_Id')
        ->leftjoin('docket_product_details','docket_product_details.Docket_Id','=','docket_masters.id')
        ->leftjoin('users','users.id','=','Co_loader_Mainifest.Created_By')
        ->leftjoin('employees','employees.user_id','=','users.id')
        ->leftjoin('office_masters','employees.OfficeName','=','office_masters.id')
        ->first();
        
        $string = "<tr><td>COLOADER MANIFEST</td><td>". date("d-m-Y", strtotime($docketFile->Date))."</td><td><strong>MANIFEST NAME: </strong>$docketFile->Manifest<br><strong>DATE: </strong>". date("d-m-Y", strtotime($docketFile->Date))."<br><strong>PIECES : </strong>$docketFile->Pices <strong>WEIGHT : </strong>$docketFile->Weight<br><strong>REMARK : </strong>$docketFile->Remarks</td><td>".date('d-m-Y h:i A')."</td><td>".$docketFile->EmployeeName."(".$docketFile->OfficeCode.'~'.$docketFile->OfficeName.")</td></tr>"; 
       Storage::disk('local')->append($request->Docket, $string);
        $html='';
        $html.='<table class="table-responsive table-bordered" width="100%"><thead><tr class="main-title text-dark"><th>Manifest</th><th>Docket</th><th>Pieces</th><th>Weight</th><tr></thead><tbody>';
        foreach($docket as $getGate)
        {
            $html.='<tr><td>'.$getGate->Manifest.'</td><td>'.$getGate->Docket_No.'</td><td>'.$getGate->Pices.'</td><td>'.$getGate->Weight.'</td></tr>'; 
            
        }
        $html.='<tbody></table>';
        $datas=array('status'=>'false','message'=>'success','datas'=>$html,'Manifest_Id'=>$request->ManiFestid,'Manifest_Name'=>$request->ManiFestName);
        echo json_encode($datas);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\ColoaderDocketTransaction  $coloaderDocketTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $docket=DocketAllocation::select('docket_product_details.Qty','docket_product_details.Actual_Weight','docket_allocations.*','docket_statuses.title','office_masters.OfficeName','docket_masters.Is_Rto','docket_masters.id as DocketId')->where('docket_allocations.Docket_No',$request->docketId)
        ->leftjoin('docket_statuses','docket_statuses.id','=','docket_allocations.Status')
        ->leftjoin('office_masters','office_masters.id','=','docket_allocations.Branch_ID')
        ->leftjoin('docket_masters','docket_masters.Docket_No','=','docket_allocations.Docket_No')
        ->leftjoin('docket_product_details','docket_product_details.Docket_Id','=','docket_masters.id')
        ->first();
       
       if(empty($docket))
        {
         $datas=array('status'=>'false','message'=>'No Docket Found');
        }
       elseif($docket->Status==0)
       {
        $datas=array('status'=>'false','message'=>'Docket Is Unused');
       }
       elseif($docket->Status==1)
       {
        $datas=array('status'=>'false','message'=>'Docket Is Cancled');
       }
       
       else{

       
        $datas=array('status'=>'true','DocketId'=>$docket->DocketId,'Qty'=>$docket->Qty,'Weight'=>$docket->Actual_Weight);
       }
        
        
       
       echo  json_encode($datas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\ColoaderDocketTransaction  $coloaderDocketTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(ColoaderDocketTransaction $coloaderDocketTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateColoaderDocketTransactionRequest  $request
     * @param  \App\Models\Operation\ColoaderDocketTransaction  $coloaderDocketTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateColoaderDocketTransactionRequest $request, ColoaderDocketTransaction $coloaderDocketTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\ColoaderDocketTransaction  $coloaderDocketTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(ColoaderDocketTransaction $coloaderDocketTransaction)
    {
        //
    }

    public function CheckColoderGatePass(Request $request){
      $gatepass=  VehicleGatepass::select('vehicle_gatepasses.*','vehicle_gatepasses.id as VID','docket_allocations.*','docket_masters.id as DocketId',DB::raw('SUM(docket_product_details.Qty) as APiece'), DB::raw('SUM(docket_product_details.Actual_Weight) as A_Weight')
      ,DB::raw('SUM(part_truck_loads.PartPicess) as P_Piece'), DB::raw('SUM(part_truck_loads.PartWeight) as P_Weight') )
      ->where('vehicle_gatepasses.GP_Number','=',$request->gatepassId)
      ->leftjoin('gate_pass_with_dockets','vehicle_gatepasses.id','gate_pass_with_dockets.GatePassId')
      ->leftjoin('docket_masters','docket_masters.Docket_No','=','gate_pass_with_dockets.Docket')
      ->leftjoin('docket_allocations','docket_masters.Docket_No','=','docket_allocations.Docket_No')
      ->leftjoin('docket_statuses','docket_statuses.id','=','docket_allocations.Status')
      ->leftjoin('office_masters','office_masters.id','=','docket_allocations.Branch_ID')
      ->leftjoin('docket_product_details','docket_product_details.Docket_Id','=','docket_masters.id')
      ->leftJoin('part_truck_loads', function($join)
      {
          $join->on('part_truck_loads.DocketNo', '=', 'docket_allocations.Docket_No');
          $join->where('part_truck_loads.gatePassId','=',NULL);
        
          
      })
      ->whereNotIn('docket_allocations.Status',[0,1])
      ->groupBy('vehicle_gatepasses.id')
      ->first();
      if(empty($gatepass))
      {
       $datas=array('status'=>'false','message'=>'No GatePass Found');
      }
      else{
        $ActivityGatepassCancle = GatePassCanceled::where("Activity_Id",$gatepass->VID)->where("Actvity_Type",1)->first();
        if(empty($ActivityGatepassCancle)){
            $datas=array('status'=>'false','message'=>'GatePass Cancel');
        }
        else{
            if($gatepass->P_Piece > 0)
            {
                $pqty=$gatepass->P_Piece;
                $pweight=$gatepass->P_Weight;
            }
            else{
                $pqty=$gatepass->APiece;
                $pweight=$gatepass->A_Weight;
            }
            $datas=array('status'=>'true','GatePassId'=>$gatepass->VID,'Qty'=>$gatepass->APiece,'Weight'=>$gatepass->A_Weight,'PartQty'=>$pqty,'PartWeight'=>$pweight);
        }

        
      }
      echo json_encode($datas);
    }
}
