<?php
namespace App\Http\Controllers\Operation;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreColoaderDocketTransactionRequest;
use App\Http\Requests\UpdateColoaderDocketTransactionRequest;
use App\Models\Operation\ColoaderDocketTransaction;
use Auth;
use Illuminate\Http\Request;
use App\Models\Stock\DocketAllocation;
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
        $lastId=ColoaderDocketTransaction::insert(
            ['Manifest_Id' =>$request->ManiFestid,'Docket_Id'=>$request->DocketId,'Pices'=>$request->displayPices,'Weight'=>$request->displayWeight]
        );
        $docket=ColoaderDocketTransaction::select('Co_loader_Mainifest.Manifest','docket_masters.Docket_No','Coloader_Docket_Transaction.Pices','Coloader_Docket_Transaction.Weight')->where('Coloader_Docket_Transaction.Manifest_Id',$request->ManiFestid)
        ->leftjoin('Co_loader_Mainifest','Co_loader_Mainifest.id','=','Coloader_Docket_Transaction.Manifest_Id')
        ->leftjoin('docket_masters','docket_masters.id','=','Coloader_Docket_Transaction.Docket_Id')
        ->leftjoin('docket_product_details','docket_product_details.Docket_Id','=','docket_masters.id')
        ->get();
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
}
