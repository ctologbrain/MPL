<?php

namespace App\Http\Controllers\Operation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Operation\CreditBooking;
use App\Http\Requests\StorePartTruckLoadRequest;
use App\Http\Requests\UpdatePartTruckLoadRequest;
use App\Models\Operation\PartTruckLoad;
use App\Models\OfficeSetup\OfficeMaster;
use App\Models\Stock\DocketAllocation;
use App\Models\Operation\DocketMaster;
use Illuminate\Support\Facades\Storage;
use Auth;
class PartTruckLoadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $office=OfficeMaster::where("Is_Active","Yes")->get();
        return view('Operation.PartTruckLoad', [
            'title'=>'PART LOAD MAPPING',
            'office'=>$office
            
            
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
     * @param  \App\Http\Requests\StorePartTruckLoadRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePartTruckLoadRequest $request)
    {
        //
        date_default_timezone_set('Asia/Kolkata');
       $UserId= Auth::id();
        PartTruckLoad::insert(
                ['DocketNo' => $request->docket_no,'ActualPicess'=>$request->actual_box,'PartPicess'=>$request->to_be_loaded_box,'ActualWeight'=>$request->actual_weight,'PartWeight'=>$request->to_be_loaded_weight,'OffciceId'=>$request->office_name,'Allow'=>$request->type,"CeatedBy"=>$UserId,'PartType'=>$request->type]
            );
             //docket_masters
        DocketMaster::where("Docket_No", $request->docket_no)->update(['Is_part_load'=>2]);
      $dockFiles=  PartTruckLoad::leftjoin('office_masters','part_truck_loads.OffciceId','=','office_masters.id')
       ->leftjoin('employees','employees.user_id','=','part_truck_loads.CeatedBy')
       ->leftjoin('office_masters as ofm','employees.OfficeName','=','ofm.id')
        ->select('ofm.OfficeName as OffName','ofm.OfficeCode as OffCode','employees.EmployeeName','office_masters.OfficeName','office_masters.OfficeCode','part_truck_loads.Allow')
        ->where("DocketNo", $request->docket_no)
        ->first();
        if($dockFiles->Allow==2){
            $allow = "Is GATEPASS ALLOW YES";
        }
        else{
            $allow = "Is DRS ALLOW YES";
        }
        if($request->type==2){
            $title1='PART LOAD MAPPING';
        }
        else
        {
            $title1='DRS PART LOAD MAPPING'; 
        }
       
        $string ="<tr><td>".$title1."</td><td> ".date("d-m-Y")."</td><td> <strong>OFFICE NAME: </strong> $dockFiles->OfficeCode ~ $dockFiles->OfficeName <br> <strong>".$allow." </strong></td><td>".date('d-m-Y h:i A')."</td><td>".$dockFiles->EmployeeName." <br>(".$dockFiles->OffName.'~'.$dockFiles->OffCode.")</td></tr>"; 
        Storage::disk('local')->append($request->docket_no, $string);
        
        

        echo json_encode(array("success"=>1,"msg"=>"Partload Successfully"));
    }
    public function CheckDocketIsAvalibleForPartLoad(Request $request)
    {
        $docket=DocketAllocation::select('docket_allocations.*','docket_statuses.title','office_masters.OfficeName','docket_product_details.Qty','docket_product_details.Actual_Weight','part_truck_loads.PartWeight','part_truck_loads.PartPicess','part_truck_loads.gatePassId','part_truck_loads.DocketNo as PartDocket')
        ->leftjoin('docket_statuses','docket_statuses.id','=','docket_allocations.Status')
        ->leftjoin('docket_masters','docket_masters.Docket_No','=','docket_allocations.Docket_No')
        ->leftjoin('docket_product_details','docket_product_details.Docket_Id','=','docket_masters.id')
        ->leftjoin('office_masters','office_masters.id','=','docket_allocations.Branch_ID')
        ->leftJoin('part_truck_loads', function($join)
        {
            $join->on('part_truck_loads.DocketNo', '=', 'docket_allocations.Docket_No');
            $join->where('part_truck_loads.gatePassId','=',NULL);
          
            
        })
        ->where('docket_masters.Docket_No',$request->Docket)
        ->first();
        $PartTruckLoad=PartTruckLoad::where('DocketNo',$request->Docket)->where('Allow',$request->type)->orderBy('id','DESC')->first();
       
        if(empty($docket))
        {
         $datas=array('status'=>'false','message'=>'No Docket Found');
        }
       elseif($docket->Status==0)
       {
        $datas=array('status'=>'false','message'=>'Docket is unused');
       }
       elseif($docket->Status==1)
       {
        $datas=array('status'=>'false','message'=>'Docket Is Cancled');
       }
       elseif(($docket->Status==3 || $docket->Status==4 || $docket->Status==5) && $request->type==1)
       {
        $datas=array('status'=>'false','message'=>'You can not select option DRS');
       }
       elseif($docket->Status==5 && $request->type==2 && empty($PartTruckLoad))
       {
        $datas=array('status'=>'false','message'=>'You can not select option LOCAL GATEPASS');
       }
       elseif($docket->Status==5 && $request->type==1 && !empty($PartTruckLoad))
       {
        $datas=array('status'=>'false','message'=>'You can not select option DRS');
       }
       elseif($docket->Status==6 && $request->type==2)
       {
        $datas=array('status'=>'false','message'=>'You can not select option LOCAL GATEPASS');
       }
       elseif($docket->PartDocket !='' && $docket->PartPicess !='' && $request->type==2)
       {
        $datas=array('status'=>'false','message'=>'You can not added part-truck because gatepass not genrate');
       }
       elseif($docket->PartDocket !='' && $docket->PartPicess !='' && $request->type==1)
       {
        $datas=array('status'=>'false','message'=>'You can not added part-truck because DRS Entry not genrate');
       }
       elseif($docket->Branch_ID != $request->BranchId && $request->type==2)
       {
       $datas=array('status'=>'false','message'=>'Docket Is Assign '.$docket->OfficeName.' Contact to Admin');
       }
       else{
        if(isset($PartTruckLoad->PartPicess) && $PartTruckLoad->PartPicess !='')
        {
            $qty=$PartTruckLoad->ActualPicess-$PartTruckLoad->PartPicess;
            $weight=$PartTruckLoad->ActualWeight-$PartTruckLoad->PartWeight;
        }
        else{
            $qty=$docket->Qty;
            $weight=$docket->Actual_Weight; 
        }
        $datas=array('status'=>'true','Pices'=>$qty,'ActualW'=>$weight);
       }
        
        
       
       echo  json_encode($datas);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\PartTruckLoad  $partTruckLoad
     * @return \Illuminate\Http\Response
     */
    public function show(PartTruckLoad $partTruckLoad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\PartTruckLoad  $partTruckLoad
     * @return \Illuminate\Http\Response
     */
    public function edit(PartTruckLoad $partTruckLoad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePartTruckLoadRequest  $request
     * @param  \App\Models\Operation\PartTruckLoad  $partTruckLoad
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePartTruckLoadRequest $request, PartTruckLoad $partTruckLoad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\PartTruckLoad  $partTruckLoad
     * @return \Illuminate\Http\Response
     */
    public function destroy(PartTruckLoad $partTruckLoad)
    {
        //
    }


    
}
