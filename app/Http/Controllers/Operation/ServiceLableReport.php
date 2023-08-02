<?php

namespace App\Http\Controllers\Operation;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoutePlanningRequest;
use App\Http\Requests\UpdateRoutePlanningRequest;
use App\Models\Operation\RoutePlanning;
use App\Models\OfficeSetup\city;
use Illuminate\Http\Request;
use App\Models\Operation\DocketMaster;
use App\Models\Operation\GatePassReceiving;
use DB;
class ServiceLableReport extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $city=city::get();
        return view('Operation.serviceLableReport', [
            'title'=>'SERVICE LEVEL PERCENTAGE REPORT',
            'originCity'=>$city
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
     * @param  \App\Http\Requests\StoreRoutePlanningRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoutePlanningRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\RoutePlanning  $routePlanning
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
      
        $source='';
        $dest='';
        $city=city::where('id',$request->originCity)->first();
        $docetDetails=GatePassReceiving::
        leftjoin('Gp_Recv_Trans','Gp_Recv_Trans.GP_Recv_Id','=','gate_pass_receivings.id')
       ->join('docket_allocations','docket_allocations.Docket_No','=','Gp_Recv_Trans.Docket_No')
       ->select('docket_allocations.Status',DB::raw("DATE_FORMAT(gate_pass_receivings.Rcv_Date, '%Y-%m-%d') as Date"),
        DB::raw(
        "SUM(CASE
        WHEN docket_allocations.Status = 6
       THEN 1 ELSE 0 END) AS 'Received'"
        ),
        DB::raw(
        "SUM(CASE
        WHEN docket_allocations.Status = 8
        THEN 1 ELSE 0 END) AS 'Delivred'"
        ),DB::raw("COUNT(docket_allocations.Docket_No) as TotalDocket"))
       ->wherebetween('gate_pass_receivings.Rcv_Date',[date("Y-m-d", strtotime($request->formDate)),date("Y-m-d", strtotime($request->todate))])
       ->groupBy(DB::raw("DATE_FORMAT(gate_pass_receivings.Rcv_Date, '%Y-%m-%d')"))
        ->get();
        if(!empty($docetDetails->toarray()))
       {
          $html1='';
          $html='<table class="table table-bordered table-centered mb-1 az_report">';
          $html.='<thead><tr class="main-title text-dark text-start">';
          $html.='<tr class="main-title text-dark text-start"><th class="p-1 text-center"  style="min-width: 70px;">EDD</th>';
          $html.='<th class="p-1 text-start" style="min-width: 70px;">Dockets For Delivery</th>';
          $html.='<th class="p-1 text-end" style="min-width: 30px;">Dlvd</th>';
          $html.='<th class="p-1 text-end" style="min-width: 40px;">Pend</th>';
          $html.='<th class="p-1 text-end" style="min-width: 40px;">Pend (%)</th><th class="p-1 text-end" style="min-width: 40px;">Ontime (%)</th></tr></thead><tbody>';
          foreach($docetDetails as $docketDetails)
          {
            $pendper=$docketDetails->TotalDocket-$docketDetails->Delivred;
            $toalPending=($pendper*$docketDetails->Delivred)/100;  
            $html.='<tr><td class="p-1 text-center"><a href="javascript:void(0)" onclick="getDocketDetails('."'$docketDetails->Date'".')">'.date("d-m-Y", strtotime($docketDetails->Date)).'</a></td>
            <td class="p-1 text-end">'.$docketDetails->TotalDocket.'</td>
            <td class="p-1 text-end">'.$docketDetails->Delivred.'</td>
            <td class="p-1 text-end"><a href="javascript:void(0)" onclick="PendingReceivingDocket('."'$docketDetails->Date'".')">'.$docketDetails->Received.'</a></td>
            <td class="p-1 text-end">'.$toalPending.'</td>
            <td class="p-1 text-end">0</td></tr>';
             
          }
          return $html;
         
        
        }
       
      }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\RoutePlanning  $routePlanning
     * @return \Illuminate\Http\Response
     */
    public function edit(RoutePlanning $routePlanning)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoutePlanningRequest  $request
     * @param  \App\Models\Operation\RoutePlanning  $routePlanning
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoutePlanningRequest $request, RoutePlanning $routePlanning)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\RoutePlanning  $routePlanning
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoutePlanning $routePlanning)
    {
        //
    }
    public function GetAllReceivingAndDelivData(Request $request)
    {
        
       
        $docetDetails=GatePassReceiving::
        leftjoin('Gp_Recv_Trans','Gp_Recv_Trans.GP_Recv_Id','=','gate_pass_receivings.id')
       ->join('docket_allocations','docket_allocations.Docket_No','=','Gp_Recv_Trans.Docket_No')
       ->join('docket_masters','docket_masters.Docket_No','=','Gp_Recv_Trans.Docket_No')
       ->leftjoin('office_masters','office_masters.id','=','docket_masters.Office_ID')
       ->leftjoin('pincode_masters as SourcePin','SourcePin.id','=','docket_masters.Origin_Pin')
       ->leftjoin('cities as SourceCity','SourceCity.id','=','SourcePin.city')
       ->leftjoin('zone_masters as Sourcezone','Sourcezone.id','=','SourceCity.ZoneName')
       ->leftjoin('pincode_masters as DestPin','DestPin.id','=','docket_masters.Dest_Pin')
       ->leftjoin('cities as DestCity','DestCity.id','=','DestPin.city')
       ->leftjoin('zone_masters as Destzone','Destzone.id','=','DestCity.ZoneName')
       ->select('Sourcezone.ZoneName as SourceZone','Destzone.ZoneName as DestZone','office_masters.OfficeName','docket_allocations.Status',DB::raw("DATE_FORMAT(gate_pass_receivings.Rcv_Date, '%Y-%m-%d') as Date"),
        DB::raw(
        "SUM(CASE
        WHEN docket_allocations.Status = 6
       THEN 1 ELSE 0 END) AS 'Received'"
        ),
        DB::raw(
        "SUM(CASE
        WHEN docket_allocations.Status = 8
        THEN 1 ELSE 0 END) AS 'Delivred'"
        ),DB::raw("COUNT(docket_allocations.Docket_No) as TotalDocket"))
       ->whereDate('gate_pass_receivings.Rcv_Date',$request->date)
       ->groupBy('Sourcezone.id')
       ->groupBy('Destzone.id')
       ->get();
       return view('Operation.serviceLableReport_inner', [
            'title'=>'ROUTE PLANNING',
            'docetDetails'=>$docetDetails
             ]);
    }
    public function GetAllReceivingDocketReport(Request $request)
    {
        $docetDetails=GatePassReceiving::
        leftjoin('Gp_Recv_Trans','Gp_Recv_Trans.GP_Recv_Id','=','gate_pass_receivings.id')
       ->join('docket_allocations','docket_allocations.Docket_No','=','Gp_Recv_Trans.Docket_No')
       ->join('docket_masters','docket_masters.Docket_No','=','Gp_Recv_Trans.Docket_No')
       ->leftjoin('docket_product_details','docket_product_details.Docket_Id','=','docket_masters.id')
       ->leftjoin('customer_masters','customer_masters.id','=','docket_masters.Cust_Id')
       ->leftjoin('gate_pass_with_dockets','gate_pass_with_dockets.Docket','=','docket_masters.Docket_No')
       ->leftjoin('vehicle_gatepasses','vehicle_gatepasses.id','=','gate_pass_with_dockets.GatePassId')
       ->leftjoin('office_masters','office_masters.id','=','docket_masters.Office_ID')
       ->leftjoin('pincode_masters as SourcePin','SourcePin.id','=','docket_masters.Origin_Pin')
       ->leftjoin('cities as SourceCity','SourceCity.id','=','SourcePin.city')
       ->leftjoin('zone_masters as Sourcezone','Sourcezone.id','=','SourceCity.ZoneName')
       ->leftjoin('pincode_masters as DestPin','DestPin.id','=','docket_masters.Dest_Pin')
       ->leftjoin('cities as DestCity','DestCity.id','=','DestPin.city')
       ->leftjoin('zone_masters as Destzone','Destzone.id','=','DestCity.ZoneName')
       ->select('vehicle_gatepasses.GP_Number','vehicle_gatepasses.GP_TIME','customer_masters.CustomerName','docket_product_details.Qty','docket_product_details.Actual_Weight','SourceCity.CityName as Sourcity','DestCity.CityName as CestCity','docket_masters.Docket_No','docket_masters.Booking_Date','Sourcezone.ZoneName as SourceZone','Destzone.ZoneName as DestZone','office_masters.OfficeName','docket_allocations.Status',DB::raw("DATE_FORMAT(gate_pass_receivings.Rcv_Date, '%Y-%m-%d') as Date"))
       ->whereDate('gate_pass_receivings.Rcv_Date',$request->date)
       ->where('docket_allocations.Status',6)
       ->groupBy('docket_masters.Docket_No')
       ->get();
        
       return view('Operation.serviceLableReport_inner1', [
            'title'=>'ROUTE PLANNING',
            'docetDetails'=>$docetDetails
             ]);
    }
}
