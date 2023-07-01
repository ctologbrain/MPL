<?php

namespace App\Http\Controllers\Reports;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreVehicleHireChallanDashboardRequest;
use App\Http\Requests\UpdateVehicleHireChallanDashboardRequest;
use App\Models\Reports\VehicleHireChallanDashboard;
use App\Models\Operation\VehicleHireChallan;
use Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\VehicleHireChallanDashboardExport;
class VehicleHireChallanDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
   
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
      })->paginate(10);
      if($request->submit=="Download"){
        return   Excel::download(new VehicleHireChallanDashboardExport(), ' VehicleHireChallanDashboardReport.xlsx');
      }
        return  view("Operation.vehicleHireChallanDashbord",[
            "title"=>"Vehicle Hire Challan Report",
            "VehicleHire"=>$VehicleHire]);
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
     * @param  \App\Http\Requests\StoreVehicleHireChallanDashboardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVehicleHireChallanDashboardRequest $request)
    {
        $UserId = Auth::id();
        $ID =$request->id;
        $Bal_PaymentNumber = $request->Bal_PaymentNumber;
       $Bal_PaymentMode =  $request->Bal_PaymentMode;
        $finalAdd =  VehicleHireChallan::where("id",$ID)->update(["Updated_At"=>date("Y-m-d H:i:s"),"UpdatedBy" => $UserId,
       "Bal_PaymentMode" =>$Bal_PaymentMode,
       "Bal_PaymentNumber"=>$Bal_PaymentNumber
       ]);
       if($finalAdd){
           echo "Updated Successfully";
       }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reports\VehicleHireChallanDashboard  $vehicleHireChallanDashboard
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, VehicleHireChallanDashboard $vehicleHireChallanDashboard)
    {
       $ID =$request->getId;
      $getHireDetails = VehicleHireChallan::with("VehicleDetails","vendorDetails","VehicleModelDetails","OriginOfficeDetails","DestOfficeDetails","AdvOfficeDetails","BalOfficeDetails")
      ->where("id",$ID)->first();
      return  view("Operation.vehicleHireChallanDetailModel",[
        "title"=>"Vehicle Hire Challan",
        "getHireDetails"=>$getHireDetails]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reports\VehicleHireChallanDashboard  $vehicleHireChallanDashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(VehicleHireChallanDashboard $vehicleHireChallanDashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVehicleHireChallanDashboardRequest  $request
     * @param  \App\Models\Reports\VehicleHireChallanDashboard  $vehicleHireChallanDashboard
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVehicleHireChallanDashboardRequest $request, VehicleHireChallanDashboard $vehicleHireChallanDashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reports\VehicleHireChallanDashboard  $vehicleHireChallanDashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(VehicleHireChallanDashboard $vehicleHireChallanDashboard)
    {
        //
    }
}
