<?php

namespace App\Http\Controllers\Stock;

use App\Http\Requests\StoreDocketTypeRequest;
use App\Http\Requests\UpdateDocketTypeRequest;
use App\Models\Stock\DocketType;
use App\Models\Stock\DocketCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Operation\DocketMaster;
use App\Models\Operation\VehicleGatepass;
use DB;
use App\Models\Operation\VehicleHireChallan;
use App\Models\Operation\Forwarding;
use App\Models\Stock\DocketAllocation;
use App\Models\Operation\Topaycollection;
use App\Models\Operation\PickupScanAndDocket;
use App\Models\Operation\GenerateSticker;
use App\Models\Operation\DocketInvoiceDetails;

class DocketTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $keyword = $req->search;
        $docketCat=DocketCategory::get();
        $docketType=DocketType::with('CaegoryDetails','UserDetails')->where(function($query) use($keyword){
                if($keyword!=""){
                    $query->where("docket_types.Title" ,"like",'%'.$keyword.'%');
                    $query->orWhere("docket_types.Code" ,"like",'%'.$keyword.'%');
                }
            })->orderBy('id')->paginate(10);  
         return view('Stock.DocketTYpe', [
           'title'=>'DOCKET TYPE MASTER',
           'docketCat'=>$docketCat,
           'docketType'=>$docketType
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
     * @param  \App\Http\Requests\StoreDocketTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocketTypeRequest $request)
    {
        $UserId = Auth::id();
        $validated = $request->validated();
        $check= DocketType::where("Code",$request->TypeCode)->first();
       
       if(isset($request->Did) && $request->Did !='')
        {
            DocketType::where("id", $request->Did)->update(['Code' => $request->TypeCode,'Title'=>$request->TypeName ,'Cat_Id'=>$request->Typecategory,'Rate'=>$request->ItemPrice]);
             echo 'Edit Successfully';
        }
        else{
            if(empty($check)){
            DocketType::insert(
                ['Code' => $request->TypeCode,'Title'=>$request->TypeName ,'Cat_Id'=>$request->Typecategory,'Rate'=>$request->ItemPrice,'Created_By'=>$UserId]
            );
             echo 'Add Successfully';
             }
            else{
                echo 'false';
            }
        }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock\DocketType  $docketType
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $docketType=DocketType::where('id',$request->id)->first(); 
        echo json_encode($docketType); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock\DocketType  $docketType
     * @return \Illuminate\Http\Response
     */
    public function edit(DocketType $docketType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocketTypeRequest  $request
     * @param  \App\Models\Stock\DocketType  $docketType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocketTypeRequest $request, DocketType $docketType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock\DocketType  $docketType
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocketType $docketType)
    {
        //
    }
    public function OperationDashboard()
    {
        $RouteAndWeight=VehicleGatepass::leftjoin("gate_pass_with_dockets","gate_pass_with_dockets.GatePassId","vehicle_gatepasses.id")
        ->leftjoin("route_masters","route_masters.id","vehicle_gatepasses.Route_ID")
        ->leftJoin('touch_points', 'touch_points.RouteId', '=', 'route_masters.id')
        ->leftJoin('cities as TocuPoint', 'TocuPoint.id', '=', 'touch_points.CityId')
        ->leftJoin('cities as ScourceCity', 'ScourceCity.id', '=', 'route_masters.Source')
        ->leftJoin('cities as DestCity', 'DestCity.id', '=', 'route_masters.Destination')
        ->select(DB::raw("SUM(gate_pass_with_dockets.weight) as Weight"),
         DB::raw("GROUP_CONCAT(Distinct TocuPoint.CityName ORDER BY touch_points.RouteOrder SEPARATOR '-') as `TouchPointCity`"),
         "ScourceCity.CityName as srcc",
        "DestCity.CityName as Destin")
         ->groupBy('route_masters.id')
         ->get();

         $OrgDestAndWeight = DocketMaster::
           leftjoin("pincode_masters as Pin","Pin.id","docket_masters.Origin_Pin")
         ->leftjoin("pincode_masters as DestPin","DestPin.id","docket_masters.Dest_Pin")
         ->leftjoin("cities as CityDest","DestPin.city","CityDest.id")
         ->leftjoin("cities as CityOrg","Pin.city","CityOrg.id")
         ->leftjoin("docket_product_details","docket_product_details.Docket_Id","docket_masters.id")
         ->select(DB::raw("SUM(docket_product_details.Charged_Weight) as Weight"),
         "CityOrg.Code as Origin","CityDest.Code as Destination","docket_masters.Origin_Pin","docket_masters.Dest_Pin"
         )
         ->groupBy('CityDest.id')
         ->groupBy('CityOrg.id')
         ->get();

         $TotalBookingCredit = DocketMaster::leftjoin("docket_allocations","docket_masters.Docket_No","docket_allocations.Docket_No")
         ->whereIn("docket_masters.Booking_Type",[1,2])
        //  ->where("docket_allocations.Status","=",3)
         ->Select(DB::raw("COUNT(docket_masters.id) as Total"))->first();
         $TotalBookingCash = DocketMaster::leftjoin("docket_allocations","docket_masters.Docket_No","docket_allocations.Docket_No")
         ->where("Booking_Type",[3,4])
         ->Select(DB::raw("COUNT(docket_masters.id) as Total"))->first();

         $PendingCash = DocketMaster::
         leftjoin("Docket_Collection_Trans","Docket_Collection_Trans.Docket_Id","docket_masters.id")
         ->Select(DB::raw("COUNT( docket_masters.id) as Total"))
         ->whereNull('Docket_Collection_Trans.Amt')
          ->whereIn("Booking_Type",[3])
         ->first();
       

         $PendingTopay = DocketMaster::
         leftjoin("Docket_Collection_Trans","Docket_Collection_Trans.Docket_Id","docket_masters.id")
         ->Select(DB::raw("COUNT( docket_masters.id) as Total"))
         ->whereNull('Docket_Collection_Trans.Amt')
          ->whereIn("Booking_Type",[4])
         ->first();

        $Challan = VehicleHireChallan::Select(DB::raw("COUNT(Vehicle_Hire_Challan.id) as Total"))->first();
        $Forwarding = Forwarding::leftjoin("docket_allocations","forwarding.DocketNo" ,"docket_allocations.Docket_No")
        ->Select(DB::raw("COUNT(forwarding.DocketNo) as Total"))
        ->where("docket_allocations.Status","=",10)
        ->first();
       
        $MissingGatePass =DocketMaster::with('DocketAllocationDetail')
        ->whereRelation('DocketAllocationDetail','Status','=',3)
        ->orWhereRelation('DocketAllocationDetail','Status','=',4)
        ->Select(DB::raw("COUNT(docket_masters.Docket_No) as Total"))->first();
        $NDR = DocketMaster::leftjoin("docket_allocations","docket_masters.Docket_No","docket_allocations.Docket_No")
        ->where("docket_allocations.Status","=",9)
        ->Select(DB::raw("COUNT(docket_masters.Docket_No) as Total"))->first();

        $OpenDRS =  DocketMaster::leftjoin("docket_allocations","docket_masters.Docket_No","docket_allocations.Docket_No")
        ->leftjoin('DRS_Transactions','DRS_Transactions.Docket_No','=','docket_masters.Docket_No')
        ->where("docket_allocations.Status","=",7)->Select(DB::raw("COUNT(DRS_Transactions.ID) as Total"))->first();

        $PendingRecieving =  DocketMaster::leftjoin("docket_allocations","docket_masters.Docket_No","docket_allocations.Docket_No")
        ->where("docket_allocations.Status","=",5)->Select(DB::raw("COUNT(docket_masters.Docket_No) as Total"))->first();

        $PendingDeliverd =  DocketMaster::leftjoin("docket_allocations","docket_masters.Docket_No","docket_allocations.Docket_No")
        ->where("docket_allocations.Status","!=",8)->Select(DB::raw("COUNT(docket_masters.Docket_No) as Total"))->first();

        $MissingPOD =  DocketMaster::leftjoin("UploadDocketImage","UploadDocketImage.DocketNo","docket_masters.Docket_No")
        ->whereNull("UploadDocketImage.file")
        ->Select(DB::raw("COUNT(docket_masters.Docket_No) as Total"))->first();
        $ShortBooking = GenerateSticker::leftjoin("docket_allocations","docket_allocations.Docket_No","Sticker.Docket")
        ->where("Sticker.Manual","=",1)
        ->where("Sticker.Status","=",0)
        ->whereIn("docket_allocations.Status",[0,1,2])->Select(DB::raw("COUNT(Sticker.Docket) as Total"))->first();

        $PickUpScan =  PickupScanAndDocket::leftjoin("docket_allocations","docket_allocations.Docket_No","pickup_scan_and_dockets.Docket")
        ->where("docket_allocations.Status","=",2)
        ->Select(DB::raw("COUNT(docket_allocations.Docket_No) as Total"))->first();

        date_default_timezone_set('Asia/Kolkata');
        $Edd =4;
        $CurrentDate = date("Y-m-d");
        $EddToday=DocketMaster::with('offcieDetails','BookignTypeDetails','DevileryTypeDet','customerDetails','consignor','consignoeeDetails','DocketProductDetails','PincodeDetails','DestPincodeDetails','DocketAllocationDetail','NDRTransDetails','getpassDataDetails','DocketDetailUser')
        ->whereRelation("DocketAllocationDetail",fn($q) => $q->whereIn("Status",[3,4,5,6]))
        ->where(DB::raw("DATE_FORMAT(Booking_Date + INTERVAL 4 DAY ,'%Y-%m-%d')"),"=",$CurrentDate)
        ->Select(DB::raw("COUNT(docket_masters.Docket_No) as Total"))->first();

        $DelayReport=DocketMaster::with('offcieDetails','BookignTypeDetails','DevileryTypeDet','customerDetails','consignor','consignoeeDetails','DocketProductDetails','PincodeDetails','DestPincodeDetails','DocketAllocationDetail','NDRTransDetails','getpassDataDetails','DocketDetailUser')
        ->whereRelation("DocketAllocationDetail",fn($q) => $q->whereIn("Status",[3,4,5,6]))
        ->where(DB::raw("DATE_FORMAT(Booking_Date + INTERVAL 4 DAY ,'%Y-%m-%d')"),"<",$CurrentDate)
        ->Select(DB::raw("COUNT(docket_masters.Docket_No) as Total"))->first();
        $UnusedEway =DocketMaster::join("docket_invoice_details","docket_masters.id","docket_invoice_details.Docket_Id")->Select(DB::raw("COUNT(docket_invoice_details.id) as Total"))->first();
        $DaccDocket = DocketMaster::where("Is_DACC","YES")->Select(DB::raw("COUNT(docket_masters.Docket_No) as Total"))->first();
        return view('Stock.OperationDashboard', [
            'title'=>'DASHBOARD',
            'RouteAndWeight'=>$RouteAndWeight,
            'OrgDestAndWeight' =>$OrgDestAndWeight,
            'TotalBookingCredit' => $TotalBookingCredit,
            'TotalBookingCash'=>$TotalBookingCash,
            'Challan' => $Challan,
            'PendingCash'=>$PendingCash,
            'PendingTopay'=>$PendingTopay,
            'Forwarding'=>$Forwarding,
            'NDR'=> $NDR,
            'OpenDRS'=>$OpenDRS,
            'PendingRecieving'=> $PendingRecieving,
            'PendingDeliverd'=>$PendingDeliverd,
            'MissingPOD'=>$MissingPOD,
            'MissingGatePass'=>$MissingGatePass,
            'ShortBooking'=>$ShortBooking,
            'PickUpScan'=>$PickUpScan,
            'EddToday'=>$EddToday,
            'DelayReport'=>$DelayReport,
            'UnusedEway'=> $UnusedEway,
            'DaccDocket' => $DaccDocket
         ]);
    }

    public function DeleteDocketType(Request $request){
         $del=  $request->id;
         DocketType::where("id",$del)->delete();
         echo json_encode(array());
    }
}
