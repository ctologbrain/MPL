<?php

namespace App\Http\Controllers\Reports;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDeliveryCostAnalysisReportRequest;
use App\Http\Requests\UpdateDeliveryCostAnalysisReportRequest;
use App\Models\Reports\DeliveryCostAnalysisReport;
use App\Models\OfficeSetup\OfficeMaster;
use App\Models\Account\CustomerMaster;
use DB;
use  App\Models\Vendor\VehicleMaster;
class DeliveryCostAnalysisReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $date=[];
        $CustomerData='';
        $officeData =  $request->office;
        if(isset($request->Customer)){
            $CustomerData =  $request->Customer;
        }

        if($request->formDate){
            $date['formDate']=  date("Y-m-d",strtotime($request->formDate));
        }
        
        if($request->todate){
           $date['todate']=  date("Y-m-d",strtotime($request->todate));
        }
        $office = OfficeMaster::get();
        $Customer=CustomerMaster::select('customer_masters.*')->get();
        $vehicle = VehicleMaster::leftjoin('vehicle_types','vehicle_types.id','=','vehicle_masters.VehicleModel')
        ->leftjoin('vehicle_gatepasses','vehicle_gatepasses.vehicle_id','=','vehicle_masters.id')
        ->leftjoin('gate_pass_with_dockets','vehicle_gatepasses.id','=','gate_pass_with_dockets.GatePassId')
        ->leftjoin('docket_masters','docket_masters.Docket_No','gate_pass_with_dockets.Docket')

        ->leftjoin('docket_product_details','docket_product_details.Docket_Id','docket_masters.id')

        ->leftjoin('vendor_masters','vendor_masters.id','=','vehicle_masters.VendorName')
        ->leftjoin('route_masters','route_masters.id','=','vehicle_gatepasses.Route_ID')

        ->leftjoin('DRS_Masters','vehicle_masters.id','=','DRS_Masters.Vehicle_No')
        ->leftjoin('employees','employees.id','DRS_Masters.D_Boy')

        ->leftjoin('DRS_Transactions','DRS_Transactions.DRS_No','=','DRS_Masters.ID')
        ->leftjoin('drs_delivery_transactions','DRS_Transactions.Docket_No','=','drs_delivery_transactions.Docket')
        ->leftjoin('drs_deliveries','drs_delivery_transactions.Drs_id','=','drs_deliveries.id')
        ->join('Regular_Deliveries','Regular_Deliveries.Docket_ID','=','gate_pass_with_dockets.Docket')
        
        // ->where(function($query) use($office){
        //     if($office!=''){
        //         $query->where("docket_masters.Office_ID",$office);
        //     }
        //    })
           ->where(function($query) use($date){
            if(isset($date['formDate']) &&  isset($date['todate'])){
                $query->whereBetween("drs_deliveries.D_Date",[$date['formDate'],$date['todate']]);
            }
           })
        ->select("vehicle_masters.VehicleNo","vehicle_types.Capacity", "vehicle_types.VehicleType","vehicle_types.VehSize"
        ,"vendor_masters.VendorName","vendor_masters.VendorCode","DRS_Masters.OpenKm","employees.EmployeeName",
        "employees.EmployeeCode","vehicle_masters.MonthRent","vehicle_masters.ReportingTime","drs_deliveries.D_Date",
        "Regular_Deliveries.Delivery_date",
        DB::raw('COUNT(DISTINCT DRS_Transactions.Docket_No) as TotDelivered'),
        DB::raw('COUNT(DISTINCT gate_pass_with_dockets.Docket) as TotDock'),
        DB::raw('SUM(drs_delivery_transactions.Weight) as TotWeight'))
        ->where("drs_delivery_transactions.Type","=","DELIVERED")
        ->groupBy('vehicle_masters.id')
        ->paginate(10);
       // echo '<pre>'; print_r( $vehicle); die;
        return view('Operation.DeliveryCostAnalysisReport', [
            'title'=>'Delivery Cost Analysis',
            'vehicle'=>$vehicle,
            'OfficeMaster'=>$office]);
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
     * @param  \App\Http\Requests\StoreDeliveryCostAnalysisReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeliveryCostAnalysisReportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reports\DeliveryCostAnalysisReport  $deliveryCostAnalysisReport
     * @return \Illuminate\Http\Response
     */
    public function show(DeliveryCostAnalysisReport $deliveryCostAnalysisReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reports\DeliveryCostAnalysisReport  $deliveryCostAnalysisReport
     * @return \Illuminate\Http\Response
     */
    public function edit(DeliveryCostAnalysisReport $deliveryCostAnalysisReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDeliveryCostAnalysisReportRequest  $request
     * @param  \App\Models\Reports\DeliveryCostAnalysisReport  $deliveryCostAnalysisReport
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeliveryCostAnalysisReportRequest $request, DeliveryCostAnalysisReport $deliveryCostAnalysisReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reports\DeliveryCostAnalysisReport  $deliveryCostAnalysisReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeliveryCostAnalysisReport $deliveryCostAnalysisReport)
    {
        //
    }
}
