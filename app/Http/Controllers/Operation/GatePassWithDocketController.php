<?php

namespace App\Http\Controllers\Operation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGatePassWithDocketRequest;
use App\Http\Requests\UpdateGatePassWithDocketRequest;
use App\Models\Operation\GatePassWithDocket;
use App\Models\Operation\PartTruckLoad;
use App\Models\Stock\DocketAllocation;
use Illuminate\Support\Facades\Storage;
use Auth;
class GatePassWithDocketController extends Controller
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
     * @param  \App\Http\Requests\StoreGatePassWithDocketRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGatePassWithDocketRequest $request)
    {

            date_default_timezone_set('Asia/Kolkata');
        GatePassWithDocket::insert(['Docket'=>$request->Docket,'GatePassId' => $request->id,'destinationOffice' => $request->destination_office,'pieces' => $request->pieces,'weight' => $request->weight]);
         PartTruckLoad::where("DocketNo", $request->Docket)->update(['gatePassId' =>$request->id]);
         DocketAllocation::where("Docket_No", $request->Docket)->update(['Status' =>5,'BookDate'=>date('Y-m-d')]);
         $docketFile=GatePassWithDocket::
          leftjoin('vehicle_gatepasses','vehicle_gatepasses.id','=','gate_pass_with_dockets.GatePassId')
          ->leftjoin('vehicle_trip_sheet_transactions','vehicle_trip_sheet_transactions.id','=','vehicle_gatepasses.Fpm_Number')
         ->leftjoin('office_masters','office_masters.id','=','gate_pass_with_dockets.destinationOffice')
         ->leftjoin('route_masters','route_masters.id','=','vehicle_trip_sheet_transactions.Route_Id')
         ->leftjoin('cities as SourceCity','SourceCity.id','=','route_masters.Source')
         ->leftjoin('cities as DestCity','DestCity.id','=','route_masters.Destination')
         ->leftjoin('pincode_masters as Destpin','DestCity.id','=','Destpin.city')
         ->leftjoin('pincode_masters as Sourcepin','SourceCity.id','=','Sourcepin.city')
         ->leftjoin('vendor_masters','vendor_masters.id','=','vehicle_trip_sheet_transactions.Vehicle_Provider')
         ->leftjoin('vehicle_masters','vehicle_masters.id','=','vehicle_trip_sheet_transactions.Vehicle_No')
         ->leftjoin('vehicle_types','vehicle_types.id','=','vehicle_trip_sheet_transactions.Vehicle_Model')
         ->leftjoin('driver_masters','driver_masters.id','=','vehicle_trip_sheet_transactions.Driver_Id')
         ->leftjoin('users as userOne','userOne.id','=','vehicle_trip_sheet_transactions.CreatedBy')
         ->leftjoin('users as UserTwo','UserTwo.id','=','vehicle_gatepasses.Created_By')

         ->leftjoin('employees as empOne','empOne.user_id','=','userOne.id')
         ->leftjoin('employees as empTwo','empTwo.user_id','=','UserTwo.id')
          ->leftjoin('office_masters as OFM','empOne.OfficeName','=','OFM.id')
          ->leftjoin('office_masters as OfmGatepass','empTwo.OfficeName','=','OfmGatepass.id')
         ->select('vehicle_trip_sheet_transactions.FPMNo','vehicle_trip_sheet_transactions.Fpm_Date','vehicle_trip_sheet_transactions.Trip_Type','vehicle_trip_sheet_transactions.Vehicle_Type','vehicle_trip_sheet_transactions.Weight','SourceCity.CityName as SourceCity','DestCity.CityName as DestCity','vendor_masters.VendorName','driver_masters.DriverName','vehicle_types.VehicleType as Vtype','vehicle_gatepasses.GP_TIME','empOne.EmployeeName as Femp','vehicle_gatepasses.GP_Number','vehicle_gatepasses.Supervisor','OFM.OfficeName as OffName','OFM.OfficeCode as OffCode','vehicle_trip_sheet_transactions.Reporting_Time','vehicle_trip_sheet_transactions.vehcile_Load_Date','Destpin.PinCode as dpin','Sourcepin.PinCode as spin','OfmGatepass.OfficeCode as Gofc', 'OfmGatepass.OfficeName as Gofn','empTwo.EmployeeName as GPemp')
         ->where('gate_pass_with_dockets.Docket',$request->Docket)
         ->first();
       
         if(isset($docketFile->Trip_Type) && $docketFile->Trip_Type==1)
        {
           $tripTYpe='OW';
        }
        elseif(isset($docketFile->Trip_Type) && $docketFile->Trip_Type==2)
        {
           $tripTYpe='RT';
        }
        else
        {
         $tripTYpe=''; 
        }
         $string = "<tr><td>FPM</td><td>".date("d-m-Y",strtotime($docketFile->Fpm_Date))."</td><td><strong>TRIP SHEET NUMBER: </strong>$docketFile->FPMNo<strong> TRIP SHEET DATE: </strong>".date("d-m-Y H:i:s",strtotime($docketFile->Fpm_Date))."<br><strong>TRIP TYPE : </strong>$tripTYpe<strong> VEHICLE  TYPE: </strong>$docketFile->Vehicle_Type<br><strong>ORIGIN: </strong> $docketFile->spin -$docketFile->SourceCity <strong>DESTINATION: </strong>$docketFile->dpin -$docketFile->DestCity <strong>VENDOR NAME: </strong>$docketFile->VendorName<br> <strong>VEHICLE PROVIDER: </strong>$docketFile->VendorName<br> <strong>VEHICLE LOADED DATE: </strong>".date("d-m-Y",strtotime($docketFile->vehcile_Load_Date))."<br>  <strong>WEIGHT: </strong> $docketFile->Weight <br> <strong>VEHICLE REPORTING DATE: </strong>".date("d-m-Y",strtotime($docketFile->Reporting_Time))."<br> <strong> TIME: </strong>".date("H:i:s",strtotime($docketFile->Reporting_Time))." <br>  <br><strong>DRIVER NAME: </strong>$docketFile->DriverName<br><strong>VEHICLE MODEL: </strong>$docketFile->Vtype</td><td>".date("d-m-Y h:i A", strtotime($docketFile->Fpm_Date))."</td><td>".$docketFile->Femp."(".$docketFile->OffCode.'~'.$docketFile->OffName.")</td></tr>"; 
              Storage::disk('local')->append($request->Docket, $string);
              $string1 = "<tr><td>GATEPASS OUT</td><td>".date("d-m-Y",strtotime($docketFile->GP_TIME))."</td><td><strong>GATEPASS NUMBER: </strong>$docketFile->GP_Number<br> <strong>VENDOR NAME: </strong>$docketFile->VendorName<br> <strong>VEHICLE NUMBER: </strong>$docketFile->VehicleNo<br> <strong>PICKUP CITY: </strong>$docketFile->SourceCity <br> <strong>TO CITY: </strong>$docketFile->DestCity <br> <strong>TRIP SHEET NUMBER: </strong>$docketFile->FPMNo  <br> <strong>SUPERVISOR NAME </strong>$docketFile->Supervisor<br><strong>ROUTE NAME: </strong>$docketFile->SourceCity-$docketFile->DestCity  <br><strong>PIECES: </strong>$request->pieces <strong>WEIGHT: </strong>$request->weight<br><strong>DESTINATION OFFICE: </strong>$docketFile->OfficeCode ~ $docketFile->OfficeName</td><td>".date("d-m-Y h:i A", strtotime( $docketFile->GP_TIME))."</td><td>".$docketFile->GPemp."(".$docketFile->Gofc.'~'.$docketFile->Gofn.")</td></tr>"; 
              Storage::disk('local')->append($request->Docket, $string1);    
         $getGatePass=GatePassWithDocket::
        leftjoin('office_masters','office_masters.id','=','gate_pass_with_dockets.destinationOffice')
        ->select('office_masters.OfficeName','office_masters.OfficeCode','gate_pass_with_dockets.*')
        ->where('GatePassId',$request->id)->get();
        $html='';
        $html.='<table class="table-responsive table-bordered" width="100%"><thead><tr class="main-title text-dark"><th>Docket</th><th>Destination Office</th><th>Pieces</th><th>Weight</th><tr></thead><tbody>';
        foreach($getGatePass as $getGate)
        {
            $html.='<tr><td>'.$getGate->Docket.'</td><td>'.$getGate->OfficeName.'</td><td>'.$getGate->pieces.'</td><td>'.$getGate->weight.'</td></tr>'; 
            
        }
        $html.='<tbody></table>';
        echo $html;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\GatePassWithDocket  $gatePassWithDocket
     * @return \Illuminate\Http\Response
     */
    public function show(GatePassWithDocket $gatePassWithDocket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\GatePassWithDocket  $gatePassWithDocket
     * @return \Illuminate\Http\Response
     */
    public function edit(GatePassWithDocket $gatePassWithDocket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGatePassWithDocketRequest  $request
     * @param  \App\Models\Operation\GatePassWithDocket  $gatePassWithDocket
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGatePassWithDocketRequest $request, GatePassWithDocket $gatePassWithDocket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\GatePassWithDocket  $gatePassWithDocket
     * @return \Illuminate\Http\Response
     */
    public function destroy(GatePassWithDocket $gatePassWithDocket)
    {
        //
    }
}
