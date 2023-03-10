<?php


namespace App\Http\Controllers\Operation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDRSEntryRequest;
use App\Http\Requests\UpdateDRSEntryRequest;
use App\Models\Operation\DRSEntry;
use App\Models\OfficeSetup\OfficeMaster;
use App\Models\OfficeSetup\employee;
use App\Models\Vendor\VehicleMaster;
use App\Models\Vendor\VehicleType;
use App\Models\Vendor\DriverMaster;
use App\Models\Operation\DRSTransactions;
use App\Models\Operation\DocketMaster;
use App\Models\Stock\DocketAllocation;

use Auth;
class DRSEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offcie=OfficeMaster::get();
        $employee=employee::get();
        $VehicleType=VehicleType::get();
        $VehicleMaster=VehicleMaster::get();
        $DriverMaster=DriverMaster::get();
        return view('Operation.DrsEntry', [
            'title'=>'DRS ENTRY',
            'employee'=>$employee,
            'offcie'=>$offcie,
            'VehicleType'=>$VehicleType,
            'VehicleMaster'=>$VehicleMaster,
            'DriverMaster'=>$DriverMaster
          
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Resphttps://github.com/ctologbrain/MPL.gitonse
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDRSEntryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDRSEntryRequest $request)
    {
        $UserId=Auth::id();
        $lastEntry=DRSEntry::orderBy('ID','DESC')->first();
        if(empty($lastEntry))
        {
          $no=1;  
        }
        else{
            $no=$lastEntry->ID+1; 
        }
        $UserId=Auth::id();
        $employee=employee::with('OfficeMasterParent')->where('user_id',$UserId)->first();
        if(isset($employee->OfficeMasterParent->OfficeCode))
        {
           $officeCode=$employee->OfficeMasterParent->OfficeCode;
        }
        else{
            $officeCode='';
        }
        $drs=$officeCode.'0000'.$no;
        if(isset($request->DrsId) && $request->DrsId !=''){
            $docket=$request->DrsId;
        }
       else{
        $docket=DRSEntry::insertGetId(
            ['DRS_No' =>$drs,'D_Office_Id'=>$request->deliveryOffice,'Delivery_Date'=>$request->deliveryDate,'D_Boy'=>$request->DeliveryBoy,'Vehcile_Type'=>$request->VehicleType,'RFQ_Number'=>$request->RFQNumber,'Market_Hire_Amount'=>$request->MarketHireAmount,'Vehicle_No'=>$request->VehicleNo,'OpenKm'=>$request->OpeningKm,'DriverName'=>$request->DriverName,'Mob'=>$request->MobileNumber,'Supervisor'=>$request->supervisorName,'CreatedBy'=>$UserId]
        );  
       }
      
        DRSTransactions::insert(
            ['DRS_No' =>$docket,'Docket_No'=>$request->Docket,'pieces'=>$request->pieces,'weight'=>$request->weight]
        );  
        $docketData=DRSTransactions::where('DRS_No',$docket)->get();
       
        $html='';
        $html.='<table class="table-responsive table-bordered" width="100%"><thead><tr class="main-title text-dark"><th>#</th><th>Action</th><th>Docket</th><th>Pieces</th><th>Weight</th><tr></thead><tbody>';
        $i=0;
        foreach($docketData as $docketDatawDrs)
        {
            $i++;
            $html.='<tr><td>'.$i.'</td><td><a href="javascript::void(0)" onclick="deleteDocket('.$docketDatawDrs->ID.','.$docketDatawDrs->DRS_No.')">delete</a></td><td>'.$docketDatawDrs->Docket_No.'</td><td>'.$docketDatawDrs->pieces.'</td><td>'.$docketDatawDrs->weight.'</td></tr>'; 
            
        }
        $html.='<tbody></table>';
       
        $datas=array('status'=>'true','message'=>'success','id'=>$docket,'Drs'=>$drs,'html'=>$html);
        echo json_encode($datas);
    }
    public function GetDocketWithDrsEntry(Request $request)
   {
    
      $docket=DocketMaster::with('DocketProductDetails')->where('Docket_No',$request->Docket)->first();
      $docketCheck=DocketAllocation::select('Status')->where('Docket_No',$request->Docket)->first();
      if(empty($docket))
      {
        $datas=array('status'=>'false','message'=>'No Docket Found','id'=>$docket);
        echo json_encode($datas);
      }
      elseif($docketCheck->Status !=6)
      {
        $datas=array('status'=>'false','message'=>'Docket Not Receving','id'=>$docket);
        echo json_encode($datas);
      }
      else{
        $datas=array('status'=>'true','message'=>'success','docket'=>$docket);
        echo json_encode($datas);
      }
   }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\DRSEntry  $dRSEntry
     * @return \Illuminate\Http\Response
     */
    public function show(DRSEntry $dRSEntry, Request $request)
    {
        $fromDate ='';
        $toDate ='';
        //
        if($request->formDate){
         $fromDate .=    $request->formDate;
        }
        if($request->todate){
            $toDate .=    $request->todate;
        }
       
       $DsrData=  DRSEntry::with('GetOfficeCodeNameDett','getDeliveryBoyNameDett','getVehicleNoDett')
       ->where( function($query) use($fromDate,$toDate){
        if($fromDate!='' && $toDate!=''){
            $query->whereBetween('Delivery_Date',[$fromDate,$toDate]);
        }
       })->paginate(10);
        return view('Operation.DrsEntryReport', [
            'title'=>'DRS ENTRY Report',
            'DsrData'=> $DsrData
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\DRSEntry  $dRSEntry
     * @return \Illuminate\Http\Response
     */
    public function edit(DRSEntry $dRSEntry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDRSEntryRequest  $request
     * @param  \App\Models\Operation\DRSEntry  $dRSEntry
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDRSEntryRequest $request, DRSEntry $dRSEntry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\DRSEntry  $dRSEntry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        DRSTransactions::where('ID', $request->id)->where('DRS_No', $request->dsrid)->delete();
        $docketData=DRSTransactions::where('DRS_No',$request->dsrid)->get();
       
        $html='';
        $html.='<table class="table-responsive table-bordered" width="100%"><thead><tr class="main-title text-dark"><th>#</th><th>Action</th><th>Docket</th><th>Pieces</th><th>Weight</th><tr></thead><tbody>';
        $i=0;
        foreach($docketData as $docketDatawDrs)
        {
            $i++;
            $html.='<tr><td>'.$i.'</td><td><a href="javascript::void(0)" onclick="deleteDocket('.$docketDatawDrs->ID.','.$docketDatawDrs->DRS_No.')">delete</a></td><td>'.$docketDatawDrs->Docket_No.'</td><td>'.$docketDatawDrs->pieces.'</td><td>'.$docketDatawDrs->weight.'</td></tr>'; 
            
        }
        $html.='<tbody></table>';
       
        $datas=array('status'=>'true','message'=>'success','html'=>$html);
        echo json_encode($datas);
    }
}
