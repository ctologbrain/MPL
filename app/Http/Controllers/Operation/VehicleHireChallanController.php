<?php

namespace App\Http\Controllers\Operation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreVehicleHireChallanRequest;
use App\Http\Requests\UpdateVehicleHireChallanRequest;
use App\Models\Operation\VehicleHireChallan;
use Auth;
use App\Models\Vendor\VehicleMaster;
use App\Models\Vendor\VehicleType;
use App\Models\Vendor\VendorMaster;
use  App\Models\OfficeSetup\OfficeMaster;
use App\Models\Vendor\VendorBank;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\VehicleHireChallanExport;
class VehicleHireChallanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicle = VehicleMaster::get();
        $Model = VehicleType::get();
        $Vendor = VendorMaster::get();
        $office = OfficeMaster::get();
      return  view("Operation.vehicleHireChallan",[
            "title"=>"Vehicle Hire Challan",
            "vehicle"=>$vehicle,
            "Model"=>$Model,
            "Vendor"=>$Vendor,
            "Office"=>$office
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
     * @param  \App\Http\Requests\StoreVehicleHireChallanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVehicleHireChallanRequest $request)
    {
        //
      $getId=  VehicleHireChallan::orderBy("id","DESC")->first();
      if(isset($getId->id)){
        $ChaallanNo = "VC-ADV-".intval($getId->id+1);
      }
      else{
        $ChaallanNo = "VC-ADV-1";
      }
        $UserId = Auth::id();
        $Inserted =VehicleHireChallan::insertGetId(["Created_By"=>$UserId,
        "Challan_Date"=>date("Y-m-d", strtotime($request->challan_date)),
        "Challan_No"=>$ChaallanNo,
        "Challan_Type"=>$request->challan_type,
        "Purpose"=>$request->purpose,
        "Paid_For"=>$request->paid_for,
        "Origin_Office"=>$request->origin_office,
        "Destination"=>$request->destination_office,
        "Route"=>$request->route,

        "Vendor_Name"=>$request->vendor_name,
        "Account_Number"=>$request->account_number,
        "Vehicle_Model"=>$request->vechile_model,
        "Vehicle_Number"=>$request->vechile_number,
        "Remarks"=>$request->remarks,
        "Number"=>$request->number,
        "TotalAmount"=>$request->total_amount,
        "AdvancePaid"=>$request->advanced_paid,

        "Balance"=>$request->balance,
        "Adv_PaymentMode"=>$request->PaymentMode,
        "Adv_PaymentNumber"=>$request->PaymentNumber,
        "Bal_PaymentMode"=>$request->BalPaymentMode,
        "Bal_PaymentNumber"=>$request->BalPaymentNumber,
        "Adv_PaidByOffice"=>$request->AdvOffice,
        "Bal_PaidByOffice"=>$request->BalOffice
        ]);
        if($Inserted){
            echo "Challan Added Successfully";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\VehicleHireChallan  $vehicleHireChallan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request ,VehicleHireChallan $vehicleHireChallan)
    {
     $Vehicle =   $request->VehicleId;
     $VehicleModel =  $request->Model; 
     $datas =VehicleMaster::with("VehicleTypeDetails","VendorDetails","officeDetails")->where("id",$Vehicle)->first();
     if(!empty($datas)){
        echo json_encode(array("status"=>"true","datas" => $datas));
     }
     else{
        echo json_encode(array("status"=>"false","datas" => [])); 
     }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\VehicleHireChallan  $vehicleHireChallan
     * @return \Illuminate\Http\Response
     */
    public function edit(VehicleHireChallan $vehicleHireChallan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVehicleHireChallanRequest  $request
     * @param  \App\Models\Operation\VehicleHireChallan  $vehicleHireChallan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVehicleHireChallanRequest $request, VehicleHireChallan $vehicleHireChallan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\VehicleHireChallan  $vehicleHireChallan
     * @return \Illuminate\Http\Response
     */
    public function destroy(VehicleHireChallan $vehicleHireChallan)
    {
        //
    }

    public function VehicleHireChallanReport(Request $request){
      $date =[];
      if($request->formDate){
        $date['fromDate']=date("Y-m-d",strtotime($request->formDate));
      }
      if($request->todate){
        $date['todate']=date("Y-m-d",strtotime($request->todate));
      }
      $VehicleHire=  VehicleHireChallan::with("VehicleDetails","vendorDetails","VehicleModelDetails","OriginOfficeDetails","DestOfficeDetails","AdvOfficeDetails","BalOfficeDetails")
      ->where(function($query) use($date){
        if(isset($date['fromDate']) && isset($date['todate'])){
          $query->whereBetween("Challan_Date",[$date['fromDate'],$date['todate']]);
        }
      })
        ->paginate(10);
        if($request->submit=="Download"){
          return Excel::download(new VehicleHireChallanExport($date),"VehicleHireChallanExport.xlsx");
        }
        return  view("Operation.vehicleHireChallanReport",[
            "title"=>"Vehicle Hire Challan Report",
            "VehicleHire"=>$VehicleHire]);
    }

    public function GetVendorVehicleInfo(Request $request){
      $VendorId = $request->Id;
     $getAccountNo = VendorBank::where("Vid",$VendorId)->first();
     echo json_encode($getAccountNo);
    }
}

