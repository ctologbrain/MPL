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
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DocketCostAnalysExport;
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
        $office = OfficeMaster::where("Is_Active","Yes")->get();
        $Customer=CustomerMaster::select('customer_masters.*')->where("Active","Yes")->get();
        $vehicle = VehicleMaster::leftjoin('vehicle_types','vehicle_types.id','=','vehicle_masters.VehicleModel')
        ->leftjoin('vehicle_gatepasses','vehicle_gatepasses.vehicle_id','=','vehicle_masters.id')
        ->leftjoin('gate_pass_with_dockets','vehicle_gatepasses.id','=','gate_pass_with_dockets.GatePassId')
        ->leftjoin('docket_masters','docket_masters.Docket_No','gate_pass_with_dockets.Docket')

        ->leftjoin('docket_product_details','docket_product_details.Docket_Id','docket_masters.id')

        ->leftjoin('vendor_masters','vendor_masters.id','=','vehicle_masters.VendorName')
        ->leftjoin('route_masters','route_masters.id','=','vehicle_gatepasses.Route_ID')

        ->leftjoin('DRS_Masters','vehicle_masters.id','=','DRS_Masters.Vehicle_No')
        ->leftjoin('employees','employees.id','DRS_Masters.D_Boy')

        ->leftjoin('drs_delivery_transactions', function($query){
            $query->on('docket_masters.Docket_No','=','drs_delivery_transactions.Docket');
            $query->where("drs_delivery_transactions.Type","=","DELIVERED");
        })
        ->leftjoin('drs_deliveries','drs_delivery_transactions.Drs_id','=','drs_deliveries.id')
        ->leftjoin('Regular_Deliveries','Regular_Deliveries.Docket_ID','=','docket_masters.Docket_No')
        // ->where(function($query) use($office){
        //     if($office!=''){
        //         $query->where("docket_masters.Office_ID",$office);
        //     }
        //    })
         ->where(function($query) use($date){
            if(isset($date['formDate']) &&  isset($date['todate'])){
                $query->whereBetween(DB::raw("DATE_FORMAT(vehicle_gatepasses.GP_TIME,'%Y-%m-%d')"),[$date['formDate'],$date['todate']]);
               
            }
         })
        ->select("vehicle_masters.VehicleNo","vehicle_types.Capacity", "vehicle_types.VehicleType","vehicle_types.VehSize"
        ,"vendor_masters.VendorName","vendor_masters.VendorCode","DRS_Masters.OpenKm","employees.EmployeeName",
        "employees.EmployeeCode","vehicle_masters.MonthRent","vehicle_masters.ReportingTime","vehicle_gatepasses.GP_TIME",
       DB::raw('COUNT(DISTINCT drs_delivery_transactions.Docket) as TotDelivered'),
        DB::raw('COUNT(DISTINCT Regular_Deliveries.Docket_ID) as TotRegulerDelivered'),
        DB::raw('COUNT(DISTINCT docket_masters.Docket_No) as TotDocket'),
         DB::raw('SUM(drs_delivery_transactions.Weight) as TotWeight'),DB::raw("DATE_FORMAT(vehicle_gatepasses.GP_TIME,'%d-%m-%Y') as GPTIME"))
    
          ->groupBy('vehicle_masters.id')
        ->paginate(10);
        if($request->submit=="Download"){
            return  Excel::download(new DocketCostAnalysExport($officeData,$date), 'deliveryCostAnalys.xlsx');
        }
      //  echo '<pre>'; print_r( $vehicle); die;
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
