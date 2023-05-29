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
use App\Models\Operation\PartTruckLoad;
use App\Models\Stock\DocketAllocation;
use PDF;
use Illuminate\Support\Facades\Storage;
use Auth;
use DB;
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
    {    date_default_timezone_set('Asia/Kolkata');
        
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
            ['DRS_No' =>$drs,'D_Office_Id'=>$request->deliveryOffice,'Delivery_Date'=>date("Y-m-d H:i:s",strtotime($request->deliveryDate)),'D_Boy'=>$request->DeliveryBoy,'Vehcile_Type'=>$request->VehicleType,'RFQ_Number'=>$request->RFQNumber,'Market_Hire_Amount'=>$request->MarketHireAmount,'Vehicle_No'=>$request->VehicleNo,'OpenKm'=>$request->OpeningKm,'DriverName'=>$request->DriverName,'Mob'=>$request->MobileNumber,'Supervisor'=>$request->supervisorName,'CreatedBy'=>$UserId]
        );  
       }
       PartTruckLoad::where("DocketNo", $request->Docket)->update(['gatePassId' =>$docket]);
        DRSTransactions::insert(
            ['DRS_No' =>$docket,'Docket_No'=>$request->Docket,'pieces'=>$request->pieces,'weight'=>$request->weight,'BalancePices'=>$request->ppPart,'BalanceWeight'=>$request->ppWeight,'PartPices'=>$request->KKWeight]
        );  
        DocketAllocation::where("Docket_No",$request->Docket)->update(['Status' =>7,'BookDate'=>date("Y-m-d H:i:s", strtotime($request->deliveryDate))]);
        $docketFile=DRSTransactions::
        leftjoin('DRS_Masters','DRS_Masters.ID','=','DRS_Transactions.DRS_No')
        ->leftjoin('vehicle_masters','vehicle_masters.id','=','DRS_Masters.Vehicle_No')
         ->leftjoin('users','users.id','=','DRS_Masters.CreatedBy')
         ->leftjoin('vehicle_types','vehicle_types.id','=','DRS_Masters.Vehcile_Type')
       ->leftjoin('employees','employees.user_id','=','users.id')
        ->leftjoin('office_masters','employees.OfficeName','=','office_masters.id')
        ->leftjoin('employees as emp','emp.id','=','DRS_Masters.D_Boy')
       ->select('DRS_Masters.*','DRS_Transactions.PartPices as DrsEntryPartPices','DRS_Transactions.pieces','DRS_Transactions.weight','DRS_Transactions.BalancePices','DRS_Transactions.BalanceWeight','employees.EmployeeName','vehicle_types.VehicleType','vehicle_masters.VehicleNo','office_masters.OfficeName','office_masters.OfficeCode','emp.OfficeMobileNo as mobile','emp.EmployeeName as empname')
       ->where('Docket_No',$request->Docket)
       ->where('DRS_Transactions.DRS_No',$docket)
       
      ->first();
        $string = "<tr><td>OUT FOR DELIVERY</td><td>".date("d-m-Y",strtotime($docketFile->Delivery_Date))."</td><td><strong>DELIVERY: READY</strong><br><strong>ON DATED: </strong>".date("d-m-Y H:i:s",strtotime($docketFile->Delivery_Date))."<br><strong>VEHICLE NO: </strong>$docketFile->VehicleNo<br><strong>DRVIER NAME: </strong>$docketFile->DriverName<br><strong>OPENING  KM: </strong>$docketFile->OpenKm<br><strong>PIECES: </strong>$docketFile->DrsEntryPartPices<br><strong>WEIGHT: </strong>$docketFile->weight  <br><strong>MENIFEST NO: </strong>$docketFile->DRS_No <br><strong>BOY NAME/ PHONE NO: </strong>$docketFile->empname / $docketFile->mobile <br><strong>MARKET HIRE AMOUNT: </strong>$docketFile->Market_Hire_Amount <br><strong>LOADING SUPERVISIOR NAME: </strong>$docketFile->Supervisor </td><td>".date('d-m-Y h:i A')."</td><td>".$docketFile->EmployeeName." <br>(".$docketFile->OfficeCode.'~'.$docketFile->OfficeName.")</td></tr>"; 
           Storage::disk('local')->append($request->Docket, $string);



        $docketData=DRSTransactions::where('DRS_No',$docket)->get();
       
        $html='';
        $html.='<table class="table-responsive table-bordered" width="100%"><thead><tr class="main-title text-dark"><th>#</th><th>Action</th><th>Docket</th><th>Pieces</th><th>Weight</th><th>Balance Pieces</th><th>Balance Weight</th><tr></thead><tbody>';
        $i=0;
        foreach($docketData as $docketDatawDrs)
        {
            $i++;
            $html.='<tr><td>'.$i.'</td><td><a href="javascript::void(0)" onclick="deleteDocket('.$docketDatawDrs->ID.','.$docketDatawDrs->DRS_No.')">delete</a></td><td>'.$docketDatawDrs->Docket_No.'</td><td>'.$docketDatawDrs->pieces.'</td><td>'.$docketDatawDrs->weight.'</td><td>'.$docketDatawDrs->BalancePices.'</td><td>'.$docketDatawDrs->BalanceWeight.'</td></tr>'; 
            
        }
        $html.='<tbody></table>';
       
        $datas=array('status'=>'true','message'=>'success','id'=>$docket,'Drs'=>$drs,'html'=>$html);
        echo json_encode($datas);
    }
    public function GetDocketWithDrsEntry(Request $request)
   {
    
      $docket=DocketMaster::with('DocketProductDetails')->where('Docket_No',$request->Docket)->first();
      $docketPart= DocketMaster::with('DocketProductDetails')->where('Docket_No',$request->Docket)->withSum('PartLoadBalDetail as PartQty','PartPicess')->withSum('PartLoadBalDetail as PartWeight','PartWeight')->first();
      $docketCheck=DocketAllocation::select('Status')->where('Docket_No',$request->Docket)->first();
      $DrspartLoad=DRSTransactions::where('Docket_No',$request->Docket)->orderBy('ID','DESC')->first();
      $befPartLoad=PartTruckLoad::where('DocketNo',$request->Docket)->orderBy('id','DESC')->first();
      $CheckDrsEntry=DRSTransactions::where('Docket_No',$request->Docket)->where('DRS_No',$request->DrsId)->orderBy('ID','DESC')->first();
      $FindQty=DRSTransactions::where('Docket_No',$request->Docket)->where('DRS_No','!=',NULL)->orderBy('ID','DESC')->first();
     
      if(!empty($befPartLoad) && empty($FindQty))
      {
        $partTrucLoad=$befPartLoad->PartPicess;
      }
      elseif(!empty($befPartLoad) && !empty($FindQty))
      {
        $partTrucLoad=$docket->DocketProductDetails->Qty-$FindQty->PartPices;
      }
      else{
        $partTrucLoad=$docket->DocketProductDetails->Qty; 
      }

      if(empty($docket))
      {
        $datas=array('status'=>'false','message'=>'No Docket Found','id'=>$docket);
        echo json_encode($datas);
      }
      elseif(!empty($CheckDrsEntry))
      {
        $datas=array('status'=>'false','message'=>'Docket Already Assign','id'=>$docket);
        echo json_encode($datas); 
      }
      elseif(empty($befPartLoad) && $docketCheck->Status !=6)
      {
        $datas=array('status'=>'false','message'=>'Docket Not Found','id'=>$docket);
        echo json_encode($datas);
      }
      else{
        $datas=array('status'=>'true','message'=>'success','docket'=>$docket,'DockPartPiece'=>$docketPart,'partTrucLoad'=>$partTrucLoad);
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
        $office='';
        $fromDate ='';
        $toDate ='';
        //
        if($request->formDate){
         $fromDate .=    date("Y-m-d" ,strtotime($request->formDate));
        }
        if($request->todate){
            $toDate .=    date("Y-m-d" ,strtotime($request->todate));
        }
        if($request->office!=''){
            $office= $request->office;
        }
       
       $DsrData=  DRSEntry::leftjoin('DRS_Transactions','DRS_Transactions.DRS_No','=','DRS_Masters.ID')
       ->leftjoin('employees','DRS_Masters.D_Boy','=','employees.id')
       ->leftjoin('vehicle_masters','DRS_Masters.Vehicle_No','=','vehicle_masters.id')
       ->leftjoin('docket_masters','DRS_Transactions.Docket_No','=','docket_masters.Docket_No')
       ->leftjoin('docket_product_details','docket_product_details.Docket_Id','=','docket_masters.id')
       ->leftjoin('office_masters','DRS_Masters.D_Office_Id','=','office_masters.id')
       ->leftjoin('docket_allocations','docket_allocations.Docket_No','=','docket_masters.Docket_No')
        
        ->select("DRS_Masters.ID","DRS_Masters.DRS_No",'vehicle_masters.VehicleNo',
        "DRS_Masters.RFQ_Number", "DRS_Masters.Vehcile_Type", "DRS_Masters.Market_Hire_Amount",
        "DRS_Masters.OpenKm",  "DRS_Masters.DriverName", "DRS_Masters.Mob"
        , "DRS_Masters.Supervisor","employees.EmployeeCode","employees.EmployeeName",
        "office_masters.OfficeCode","office_masters.OfficeName", "employees.OfficeMobileNo","DRS_Masters.Delivery_Date",
        DB::raw("SUM(docket_product_details.Actual_Weight) as TotActWt"),
        DB::raw("SUM(docket_product_details.Charged_Weight) as TotChrgWt "), 
        DB::raw("COUNT(DRS_Transactions.DRS_No) as TotalDRS"),

         DB::raw("SUM(CASE WHEN docket_allocations.Status=9  THEN 1 ELSE 0 END) as TotNDR") ,
         DB::raw("SUM(CASE WHEN  docket_allocations.Status=8 THEN 1 ELSE 0 END) as TotalDel") ,
         DB::raw("SUM(CASE WHEN  docket_masters.Is_Rto!=NULL THEN 1 ELSE 0 END) as TotRTO")
       )

       ->where( function($query) use($fromDate,$toDate){
        if($fromDate!='' && $toDate!=''){
            $query->whereBetween('DRS_Masters.Delivery_Date',[$fromDate,$toDate]);
        }
       })
       ->where(function($query) use($office){
        if($office!=''){
          $query->where('DRS_Masters.D_Office_Id','=',$office);
        }
    })
    ->groupby('DRS_Transactions.DRS_No')
    ->orderby("DRS_Masters.ID","ASC")
    ->paginate(10);
   // echo '<pre>'; print_r( $DsrData[1]->getDRSTransDett ); die;
    $OfficeMaster=  OfficeMaster::get();
        return view('Operation.DrsEntryReport', [
            'title'=>'DRS ENTRY Report',
            'DsrData'=> $DsrData,
            'OfficeMaster'=>$OfficeMaster
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

    public function PrintDRSEntry($DrsNo){
       $DRSdata= DRSEntry::leftjoin('DRS_Transactions','DRS_Transactions.DRS_No','=','DRS_Masters.id')
      ->leftjoin('employees','DRS_Masters.D_Boy','=','employees.id')
      ->leftjoin('office_masters','DRS_Masters.D_Office_Id','=','office_masters.id')
      ->leftjoin('vehicle_masters','DRS_Masters.Vehicle_No','=','vehicle_masters.id')
      ->leftjoin('docket_masters','DRS_Transactions.Docket_No','=','docket_masters.Docket_No')
      ->leftjoin('consignees','docket_masters.Consignee_Id','=','consignees.id')
      ->leftjoin('pincode_masters','docket_masters.Origin_Pin','=','pincode_masters.id')
      ->leftjoin('cities','pincode_masters.city','=','cities.id')
      ->leftjoin('docket_booking_types','docket_masters.Booking_Type','=','docket_booking_types.id')
      ->select("DRS_Masters.DriverName","DRS_Transactions.Docket_No","DRS_Transactions.weight",
      "DRS_Transactions.pieces","docket_masters.Booking_Type","cities.Code" ,"cities.CityName","consignees.ConsigneeName",
      "vehicle_masters.VehicleNo","DRS_Masters.DRS_No" ,"DRS_Masters.Delivery_Date","office_masters.OfficeCode","office_masters.OfficeName","consignees.City","consignees.Address1","docket_booking_types.BookingType")
      ->where("DRS_Masters.DRS_No","=",$DrsNo)->get();
      $data = [
        'title' => 'Welcome to CodeSolutionStuff.com',
        'DRSdata' => $DRSdata];
      // with('GetOfficeCodeNameDett','getDeliveryBoyNameDett','getVehicleNoDett')
        // return view('Operation.printDRSEntry', [
        //     'title'=>'DRS ENTRY PRINT',
        //     'DRSdata'=>$DRSdata]);

        $pdf = PDF::loadView('Operation.printDRSEntry', $data);
        $path = public_path('pdf/');
        $fileName =  $DrsNo . '.' . 'pdf' ;
        $pdf->save($path . '/' . $fileName);
        return response()->file($path.'/'.$fileName);
       
    }

    public function DRSReportDetails($DRSNO){
        $DsrData=  DRSTransactions::with('DRSDatasDetails','DRSDocketDataDeatils')->where("DRS_No",$DRSNO)->groupby('DRS_Transactions.Docket_No')->paginate(10);
        return view('Operation.DrsEntryDetailedReport', [
            'title'=>'DRS Report- Detailed ',
            'DsrData'=> $DsrData]);
        
    }

   public function NDRReportDetails($DRSNO){
    $DsrData=  DRSTransactions::join('NDR_Trans','NDR_Trans.Docket_No','DRS_Transactions.Docket_No')
    ->leftjoin('ndr_masters','ndr_masters.id','NDR_Trans.NDR_Reason')
    ->leftjoin('DRS_Masters','DRS_Masters.ID','DRS_Transactions.DRS_No')
    ->leftjoin('docket_masters','DRS_Transactions.Docket_No','docket_masters.Docket_No')
    ->leftjoin('gate_pass_with_dockets','gate_pass_with_dockets.Docket','docket_masters.Docket_No')
    ->leftjoin('vehicle_gatepasses','vehicle_gatepasses.id','gate_pass_with_dockets.GatePassId')
    ->leftjoin('vendor_masters','vehicle_gatepasses.Vendor_ID','vendor_masters.id')

    ->leftjoin('pincode_masters as ORGPIN','docket_masters.Origin_Pin','ORGPIN.id')
    ->leftjoin('pincode_masters as DESTPIN','docket_masters.Dest_Pin','DESTPIN.id')

    ->leftjoin('cities as ORGCITY','ORGPIN.city','ORGCITY.id')
    ->leftjoin('cities as DESTCITY','DESTPIN.city','DESTCITY.id')

    ->leftjoin('states as ORGSTET','ORGPIN.State','ORGSTET.id')
    ->leftjoin('states as DESTSTET','DESTPIN.State','DESTSTET.id')
    ->leftjoin('docket_allocations','docket_allocations.Docket_No','docket_masters.Docket_No')
    ->leftjoin('docket_statuses','docket_allocations.Status','docket_statuses.id')

    ->leftjoin('docket_product_details','docket_masters.id','docket_product_details.Docket_Id')
    ->leftjoin('docket_booking_types','docket_masters.Booking_Type','docket_booking_types.id')
    ->leftjoin('office_masters','docket_masters.Office_ID','office_masters.id')
    ->leftjoin('customer_masters','docket_masters.Cust_Id','customer_masters.id')

    ->leftjoin('employees','DRS_Masters.D_Boy','employees.id')
    ->leftjoin('vehicle_masters','DRS_Masters.Vehicle_No','vehicle_masters.id')
    ->leftjoin('vehicle_types','vehicle_masters.VehicleModel','vehicle_types.id')
    ->leftjoin('office_masters as DDOfM','DRS_Masters.D_Office_Id','DDOfM.id')
    ->select("DRS_Masters.Vehcile_Type", "ndr_masters.ReasonDetail","NDR_Trans.NDR_Date","vendor_masters.VendorCode" ,
    "vendor_masters.VendorName", "ORGPIN.PinCode as ORGPinCode","DESTPIN.PinCode as DESTPinCode",
    "ORGCITY.CityName as ORGCityName","ORGCITY.Code as ORGCode","ORGSTET.name as ORGSTATName",
    "ORGSTET.StateCode as ORGStateCode","DESTCITY.CityName as DESTCityName","DESTCITY.Code as DESTCityCode",
    "DESTSTET.name as DESTSTETName", "DESTSTET.StateCode as DESTSTETStateCode","docket_allocations.BookDate",
    "docket_statuses.title","docket_product_details.Qty","docket_product_details.Actual_Weight",
    "docket_product_details.Charged_Weight","docket_booking_types.BookingType","office_masters.OfficeCode",
    "office_masters.OfficeName","customer_masters.CustomerCode","customer_masters.CustomerName",
    "vehicle_masters.VehicleNo","employees.OfficeMobileNo","employees.EmployeeName","employees.EmployeeCode",
    "vehicle_types.VehicleType","docket_masters.Docket_No","docket_masters.Booking_Date","DDOfM.OfficeCode as DoffCode",
    "DDOfM.OfficeName as DoffName","DRS_Masters.Delivery_Date","DRS_Masters.DriverName","DRS_Masters.Mob",
    "DRS_Masters.RFQ_Number","DRS_Masters.Market_Hire_Amount","DRS_Masters.Supervisor","DRS_Masters.OpenKm","DRS_Masters.DRS_No")
    ->where("DRS_Transactions.DRS_No",$DRSNO)
    ->groupby('DRS_Transactions.Docket_No')->paginate(10);
   // with('DRSDatasDetails','DRSDocketDataDeatils','NDRTransDetails')->where("DRS_No",$DRSNO)->paginate(10);
    return view('Operation.DrsNDRDetailedReport', [
        'title'=>'DRS Report- Detailed ',
        'DsrData'=> $DsrData,
        'NdR'=>1]);
   }

   public function RTOReportDetails($DRSNO){
    $DsrData=  DRSTransactions::join('RTO_Trans','RTO_Trans.Initial_Docket','DRS_Transactions.Docket_No')
    ->leftjoin('ndr_masters','ndr_masters.id','RTO_Trans.Reason')
    ->leftjoin('DRS_Masters','DRS_Masters.ID','DRS_Transactions.DRS_No')
    ->leftjoin('docket_masters','DRS_Transactions.Docket_No','docket_masters.Docket_No')
    ->leftjoin('gate_pass_with_dockets','gate_pass_with_dockets.Docket','docket_masters.Docket_No')
    ->leftjoin('vehicle_gatepasses','vehicle_gatepasses.id','gate_pass_with_dockets.GatePassId')
    ->leftjoin('vendor_masters','vehicle_gatepasses.Vendor_ID','vendor_masters.id')

    ->leftjoin('pincode_masters as ORGPIN','docket_masters.Origin_Pin','ORGPIN.id')
    ->leftjoin('pincode_masters as DESTPIN','docket_masters.Dest_Pin','DESTPIN.id')

    ->leftjoin('cities as ORGCITY','ORGPIN.city','ORGCITY.id')
    ->leftjoin('cities as DESTCITY','DESTPIN.city','DESTCITY.id')

    ->leftjoin('states as ORGSTET','ORGPIN.State','ORGSTET.id')
    ->leftjoin('states as DESTSTET','DESTPIN.State','DESTSTET.id')
    ->leftjoin('docket_allocations','docket_allocations.Docket_No','docket_masters.Docket_No')
    ->leftjoin('docket_statuses','docket_allocations.Status','docket_statuses.id')

    ->leftjoin('docket_product_details','docket_masters.id','docket_product_details.Docket_Id')
    ->leftjoin('docket_booking_types','docket_masters.Booking_Type','docket_booking_types.id')
    ->leftjoin('office_masters','docket_masters.Office_ID','office_masters.id')
    ->leftjoin('customer_masters','docket_masters.Cust_Id','customer_masters.id')

    ->leftjoin('employees','DRS_Masters.D_Boy','employees.id')
    ->leftjoin('vehicle_masters','DRS_Masters.Vehicle_No','vehicle_masters.id')
    ->leftjoin('vehicle_types','vehicle_masters.VehicleModel','vehicle_types.id')
    ->leftjoin('office_masters as DDOfM','DRS_Masters.D_Office_Id','DDOfM.id')
    ->select("DRS_Masters.Vehcile_Type", "ndr_masters.ReasonDetail","RTO_Trans.RTO_Date","vendor_masters.VendorCode" ,
    "vendor_masters.VendorName", "ORGPIN.PinCode as ORGPinCode","DESTPIN.PinCode as DESTPinCode",
    "ORGCITY.CityName as ORGCityName","ORGCITY.Code as ORGCode","ORGSTET.name as ORGSTATName",
    "ORGSTET.StateCode as ORGStateCode","DESTCITY.CityName as DESTCityName","DESTCITY.Code as DESTCityCode",
    "DESTSTET.name as DESTSTETName", "DESTSTET.StateCode as DESTSTETStateCode","docket_allocations.BookDate",
    "docket_statuses.title","docket_product_details.Qty","docket_product_details.Actual_Weight",
    "docket_product_details.Charged_Weight","docket_booking_types.BookingType","office_masters.OfficeCode",
    "office_masters.OfficeName","customer_masters.CustomerCode","customer_masters.CustomerName",
    "vehicle_masters.VehicleNo","employees.OfficeMobileNo","employees.EmployeeName","employees.EmployeeCode",
    "vehicle_types.VehicleType","docket_masters.Docket_No","docket_masters.Booking_Date","DDOfM.OfficeCode as DoffCode",
    "DDOfM.OfficeName as DoffName","DRS_Masters.Delivery_Date","DRS_Masters.DriverName","DRS_Masters.Mob",
    "DRS_Masters.RFQ_Number","DRS_Masters.Market_Hire_Amount","DRS_Masters.Supervisor","DRS_Masters.OpenKm","DRS_Masters.DRS_No")
    ->where("DRS_Transactions.DRS_No",$DRSNO)
    ->groupby('DRS_Transactions.Docket_No')->paginate(10);
    return view('Operation.DrsRTODetailedReport', [
        'title'=>'DRS Report- Detailed ',
        'DsrData'=> $DsrData,
        'RTO'=>1]);
    }
    public function DELVReportDetails($DRSNO){
        $DsrData=  DRSTransactions::join('drs_delivery_transactions','drs_delivery_transactions.Docket','DRS_Transactions.Docket_No')
    ->leftjoin('ndr_masters','ndr_masters.id','drs_delivery_transactions.NdrReason')
    // ->leftjoin('drs_deliveries','drs_delivery_transactions.Drs_id','drs_deliveries.id')
    ->leftjoin('DRS_Masters','DRS_Masters.ID','DRS_Transactions.DRS_No')
    ->leftjoin('docket_masters','DRS_Transactions.Docket_No','docket_masters.Docket_No')
    ->leftjoin('gate_pass_with_dockets','gate_pass_with_dockets.Docket','docket_masters.Docket_No')
    ->leftjoin('vehicle_gatepasses','vehicle_gatepasses.id','gate_pass_with_dockets.GatePassId')
    ->leftjoin('vendor_masters','vehicle_gatepasses.Vendor_ID','vendor_masters.id')

    ->leftjoin('pincode_masters as ORGPIN','docket_masters.Origin_Pin','ORGPIN.id')
    ->leftjoin('pincode_masters as DESTPIN','docket_masters.Dest_Pin','DESTPIN.id')

    ->leftjoin('cities as ORGCITY','ORGPIN.city','ORGCITY.id')
    ->leftjoin('cities as DESTCITY','DESTPIN.city','DESTCITY.id')

    ->leftjoin('states as ORGSTET','ORGPIN.State','ORGSTET.id')
    ->leftjoin('states as DESTSTET','DESTPIN.State','DESTSTET.id')
    ->leftjoin('docket_allocations','docket_allocations.Docket_No','docket_masters.Docket_No')
    ->leftjoin('docket_statuses','docket_allocations.Status','docket_statuses.id')

    ->leftjoin('docket_product_details','docket_masters.id','docket_product_details.Docket_Id')
    ->leftjoin('docket_booking_types','docket_masters.Booking_Type','docket_booking_types.id')
    ->leftjoin('office_masters','docket_masters.Office_ID','office_masters.id')
    ->leftjoin('customer_masters','docket_masters.Cust_Id','customer_masters.id')

    ->leftjoin('employees','DRS_Masters.D_Boy','employees.id')
    ->leftjoin('vehicle_masters','DRS_Masters.Vehicle_No','vehicle_masters.id')
    ->leftjoin('vehicle_types','vehicle_masters.VehicleModel','vehicle_types.id')
    ->leftjoin('office_masters as DDOfM','DRS_Masters.D_Office_Id','DDOfM.id')
    ->select("DRS_Masters.Vehcile_Type", "ndr_masters.ReasonDetail","vendor_masters.VendorCode" ,
    "vendor_masters.VendorName", "ORGPIN.PinCode as ORGPinCode","DESTPIN.PinCode as DESTPinCode",
    "ORGCITY.CityName as ORGCityName","ORGCITY.Code as ORGCode","ORGSTET.name as ORGSTATName",
    "ORGSTET.StateCode as ORGStateCode","DESTCITY.CityName as DESTCityName","DESTCITY.Code as DESTCityCode",
    "DESTSTET.name as DESTSTETName", "DESTSTET.StateCode as DESTSTETStateCode","docket_allocations.BookDate",
    "docket_statuses.title","docket_product_details.Qty","docket_product_details.Actual_Weight",
    "docket_product_details.Charged_Weight","docket_booking_types.BookingType","office_masters.OfficeCode",
    "office_masters.OfficeName","customer_masters.CustomerCode","customer_masters.CustomerName",
    "vehicle_masters.VehicleNo","employees.OfficeMobileNo","employees.EmployeeName","employees.EmployeeCode",
    "vehicle_types.VehicleType","docket_masters.Docket_No","docket_masters.Booking_Date","DDOfM.OfficeCode as DoffCode",
    "DDOfM.OfficeName as DoffName","DRS_Masters.Delivery_Date","DRS_Masters.DriverName","DRS_Masters.Mob",
    "DRS_Masters.RFQ_Number","DRS_Masters.Market_Hire_Amount","DRS_Masters.Supervisor","DRS_Masters.OpenKm","DRS_Masters.DRS_No")
    ->where("DRS_Transactions.DRS_No",$DRSNO)
    ->groupby('DRS_Transactions.Docket_No')->paginate(10);
        return view('Operation.DELVReportDetails', [
            'title'=>'DRS Report- Detailed ',
            'DsrData'=> $DsrData,
            'DELV'=>1]);
    }
    



   
}
