<?php
namespace App\Http\Controllers\Operation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreVehicleGatepassRequest;
use App\Http\Requests\UpdateVehicleGatepassRequest;
use App\Models\Operation\VehicleGatepass;
use App\Models\Operation\VehicleTripSheetTransaction;
use App\Models\Operation\TripType;
use App\Models\Operation\RouteMaster;
use App\Models\Operation\TouchPoints;
use App\Models\Vendor\VehicleMaster;
use App\Models\Vendor\VendorMaster;
use App\Models\Vendor\VehicleType;
use App\Models\Vendor\DriverMaster;
use App\Models\OfficeSetup\OfficeMaster;
use App\Models\Stock\DocketAllocation;
use App\Models\OfficeSetup\employee;
use DB;
use Auth;
use PDF;
use Milon\Barcode\DNS1D;
use Illuminate\Support\Facades\Storage;
use App\Models\Operation\GatePassWithDocket;
class VehicleGatepassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $fcm=VehicleTripSheetTransaction::select('id','FPMNo')->get();
        $route=RouteMaster::
        leftJoin('cities as ScourceCity', 'ScourceCity.id', '=', 'route_masters.Source')
       ->leftJoin('cities as DestCity', 'DestCity.id', '=', 'route_masters.Destination')
       ->leftJoin('touch_points', 'touch_points.RouteId', '=', 'route_masters.id')
       ->leftJoin('cities as TocuPoint', 'TocuPoint.id', '=', 'touch_points.CityId')
       ->select('route_masters.id','ScourceCity.CityName as SourceCity','DestCity.CityName as DestCity',DB::raw("GROUP_CONCAT(TocuPoint.CityName ORDER BY touch_points.RouteOrder SEPARATOR '-') as `TouchPointCity`"))
       ->groupBy('route_masters.id')
       ->get();
      $VehicleMaster=VehicleMaster::select('id','VehicleNo')->get();
      $TripType=TripType::get();
      $VendorMaster=VendorMaster::select('id','VendorName','VendorCode')->get();
      $VehicleType=VehicleType::select('id','VehicleType')->get();
      $DriverMaster=DriverMaster::select('id','License','DriverName')->get();
      $offcie=OfficeMaster::select('id','OfficeCode','OfficeName')->get();
      $docket=DocketAllocation::where('status',2)->get();
        return view('Operation.VehicleGatePass', [
            'fcm'=>$fcm,
            'TripType'=>$TripType,
            'route'=>$route,
            'VehicleMaster'=>$VehicleMaster,
            'VendorMaster'=>$VendorMaster,
            'VehicleType'=>$VehicleType,
            'DriverMaster'=>$DriverMaster,
            'offcie'=>$offcie,
            'docket'=>$docket,
            'title'=>'GatePass Genrate',
           
          ]);
    }
    public function getFcmDetails(Request $request)
    {
        $fcm=VehicleTripSheetTransaction::where('id',$request->Fpm)->first();
        echo json_encode($fcm);
        
    }
    public function getOffcieByCity(Request $request)
    {
        $offcie=OfficeMaster::select('id','OfficeCode','OfficeName')->where('City_id',$request->EndPoint)->get();
        
        $html='';
        $html.='<option value="">--select--</option>';
        foreach($offcie as $offciees)
        {
            $html.='<option value="'.$offciees->id.'">'.$cities->OfficeCode.'~'.$cities->OfficeName.'</option>'; 
            
        }
        echo $html;
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
     * @param  \App\Http\Requests\StoreVehicleGatepassRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVehicleGatepassRequest $request)
    {
        $UserId=Auth::id();
        $employee=employee::with('OfficeMasterParent')->where('user_id',$UserId)->first();
        if(isset($employee->OfficeMasterParent->OfficeCode))
        {
           $officeCode=$employee->OfficeMasterParent->OfficeCode;
        }
        else{
            $officeCode='';
        }
        $getPass=VehicleGatepass::select('id')->orderBy('id','DESC')->first();
        if(isset($getPass->id) && $getPass->id !='')
        {
            $gpass2=$getPass->id+1;
             $gpass='GP/'.$officeCode.'/0000'.$gpass2;
        }
        else{
            $gpass='GP/'.$officeCode.'/'.'00001';
        }
       
          $lastid=VehicleGatepass::insertGetId(['Is_Fpm'=>$request->with_fpm,'Fpm_Number' => $request->fpm_number,'GP_Number'=>$gpass,'Gp_Type'=>$request->type,'GP_TIME'=>$request->GP_Time_Stamp,'Place_Time'=>$request->PlacementTimeStamp,'Route_ID'=>$request->route,'Vendor_ID'=>$request->vendor_name,'Vehicle_Model'=>$request->vehicle_model,'Device_ID'=>$request->dev_id,'Supervisor'=>$request->sprvisor_name,'Seal'=>$request->seal_number,'Start_Km'=>$request->start_km,'Vehicle_Tarrif'=>$request->vehicle_teriff,'Driver_Adv'=>$request->adv_driver,'Created_By'=>$UserId,'DrvierId'=>$request->vehicle_name,'Remark'=>$request->remark,'vehicle_id'=>$request->vehicle_name]);
         $array=array('gatepass'=>$gpass,'id'=>$lastid);
         echo json_encode($array);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\VehicleGatepass  $vehicleGatepass
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleGatepass $vehicleGatepass)
    {
       
        $gatePassDetails=VehicleGatepass::with('fpmDetails','VendorDetails','VehicleTypeDetails','VehicleDetails','DriverDetails','RouteMasterDetails','getPassDocketDetails')
        ->paginate(10);
         return view('Operation.VehicleGatePassReport', [
            'title'=>'VEHICLE GATEPASS - OUTSCAN REGISTER',
            'gatePassDetails'=>$gatePassDetails
           
          ]);
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\VehicleGatepass  $vehicleGatepass
     * @return \Illuminate\Http\Response
     */
    public function edit(VehicleGatepass $vehicleGatepass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVehicleGatepassRequest  $request
     * @param  \App\Models\Operation\VehicleGatepass  $vehicleGatepass
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVehicleGatepassRequest $request, VehicleGatepass $vehicleGatepass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\VehicleGatepass  $vehicleGatepass
     * @return \Illuminate\Http\Response
     */
    public function destroy(VehicleGatepass $vehicleGatepass)
    {
        //
    }
    public function CheckDocketIsBooked(Request $request)
    {
        $docket=DocketAllocation::select('docket_allocations.*','docket_statuses.title','office_masters.OfficeName','docket_product_details.Qty','docket_product_details.Actual_Weight','part_truck_loads.PartPicess','part_truck_loads.PartWeight','part_truck_loads.gatePassId','part_truck_loads.DocketNo as PartDocket','gate_pass_with_dockets.Docket as gatePassDocket')->where('docket_allocations.Docket_No',$request->Docket)
        ->leftjoin('docket_statuses','docket_statuses.id','=','docket_allocations.Status')
        ->leftjoin('office_masters','office_masters.id','=','docket_allocations.Branch_ID')
        ->leftjoin('gate_pass_with_dockets','gate_pass_with_dockets.Docket','=','docket_allocations.Docket_No')
        ->leftjoin('docket_masters','docket_masters.Docket_No','=','docket_allocations.Docket_No')
        ->leftjoin('docket_product_details','docket_product_details.Docket_Id','=','docket_masters.id')
        ->leftJoin('part_truck_loads', function($join)
        {
            $join->on('part_truck_loads.DocketNo', '=', 'docket_allocations.Docket_No');
            $join->where('part_truck_loads.gatePassId','=',NULL);
          
            
        })
        ->first();
       
       if(empty($docket))
        {
         $datas=array('status'=>'false','message'=>'Docket not found');
        }
       elseif($docket->Status==0)
       {
        $datas=array('status'=>'false','message'=>'Docket is not used');
       }
       elseif($docket->Status==1)
       {
        $datas=array('status'=>'false','message'=>'Docket is cancled');
       }
       elseif($docket->Branch_ID != $request->BranchId)
       {
       $datas=array('status'=>'false','message'=>'Docket is assign '.$docket->OfficeName.' Contact to Admin');
       }
       elseif($docket->gatePassDocket!='' &&  $docket->PartPicess =='')
       {
       $datas=array('status'=>'false','message'=>'Docket is assign in this gatepass');
       }
       else{
        if($docket->PartPicess)
        {
            $pqty=$docket->PartPicess;
            $pweight=$docket->PartWeight;
        }
        else{
            $pqty=$docket->Qty;
            $pweight=$docket->Actual_Weight;
        }
        $datas=array('status'=>'true','qty'=>$docket->Qty,'ActualW'=>$docket->Actual_Weight,'partQty'=>$pqty,'partWeight'=>$pweight);
       }
        
        
       
       echo  json_encode($datas);
    }
    public function print_gate_Number(Request $request,$id,$id1,$id2)
    {
        $dataArray=array();
        date_default_timezone_set("Asia/Kolkata"); 
        $gp=$id.'/'.$id1.'/'.$id2;
        $gatePassDetails=VehicleGatepass::with('fpmDetails','VendorDetails','VehicleTypeDetails','VehicleDetails','DriverDetails','RouteMasterDetails','getPassDocketDetails')->where('GP_Number',$gp)->first();
         $getPassDoc=GatePassWithDocket::
         leftjoin('office_masters','office_masters.id','=','gate_pass_with_dockets.destinationOffice')
         ->select('office_masters.OfficeName','gate_pass_with_dockets.GatePassId','gate_pass_with_dockets.destinationOffice')
         ->where('gate_pass_with_dockets.GatePassId',$gatePassDetails->id)->groupBy('destinationOffice')->get();
          foreach($getPassDoc as $docketDetails)
          {
            $GatePassD=GatePassWithDocket::
            leftjoin('docket_masters','docket_masters.Docket_No','=','gate_pass_with_dockets.Docket')
            ->leftjoin('docket_product_details','docket_product_details.Docket_Id','=','docket_masters.id')
            ->leftjoin('consignor_masters','consignor_masters.id','=','docket_masters.Consigner_Id')
            ->leftjoin('consignees','consignees.id','=','docket_masters.Consignee_Id')
            ->leftjoin('pincode_masters','pincode_masters.id','=','docket_masters.Dest_Pin')
            ->leftjoin('cities','cities.id','=','pincode_masters.city')
            ->select('docket_masters.Docket_No','docket_product_details.Qty','docket_product_details.Actual_Weight','docket_product_details.Charged_Weight','cities.CityName','consignor_masters.ConsignorName','consignees.ConsigneeName')
            ->where('gate_pass_with_dockets.GatePassId',$docketDetails->GatePassId)
            ->where('gate_pass_with_dockets.destinationOffice',$docketDetails->destinationOffice)
            ->get();
            $data['docket']=$GatePassD;
            $data['docketDeatils']=$docketDetails->OfficeName;
            array_push($dataArray,$data);
          }
          
         $productCode =$gp;
        $data = [
            'title' => 'Welcome to CodeSolutionStuff.com',
            'productCode' => $productCode,
            'gatePassDetails'=>$gatePassDetails,
            'dataArrays'=>$dataArray
        ];
          
        $pdf = PDF::loadView('Operation.printGatePass', $data);
        $path = public_path('pdf/');
        $fileName =  $id.$id1.$id2 . '.' . 'pdf' ;
        $pdf->save($path . '/' . $fileName);
        return response()->file($path.'/'.$fileName);
       

            // return view('Operation.printGatePass', [
            //     'productCode' => $productCode,
            //     'gatePassDetails'=>$gatePassDetails,
            //     'dataArrays'=>$dataArray
            // ]);
    }
}
