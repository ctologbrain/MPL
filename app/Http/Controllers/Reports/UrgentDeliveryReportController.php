<?php

namespace App\Http\Controllers\Reports;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUrgentDeliveryReportRequest;
use App\Http\Requests\UpdateUrgentDeliveryReportRequest;
use App\Models\Reports\UrgentDeliveryReport;
use App\Models\Operation\DocketCase;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UrgantDeliveryDashboardExport;
use DB;
class UrgentDeliveryReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $CASE = DocketCase::leftjoin("docket_masters","docket_masters.Docket_No","=","Docket_Case.Docket_Number")
        ->leftjoin('pincode_masters','pincode_masters.id','=','docket_masters.Origin_Pin')
       ->leftjoin('cities','cities.id','=','pincode_masters.city')
       ->leftjoin('pincode_masters as DestPin','DestPin.id','=','docket_masters.Dest_Pin')
       ->leftjoin('cities as DestCity','DestCity.id','=','DestPin.city')
       ->leftjoin('customer_masters','customer_masters.id','=','docket_masters.Cust_Id')
       ->leftjoin('gate_pass_with_dockets','gate_pass_with_dockets.Docket','=','docket_masters.Docket_No')
       ->leftjoin('vehicle_gatepasses','vehicle_gatepasses.id','=','gate_pass_with_dockets.GatePassId')
       ->leftjoin('vehicle_masters','vehicle_masters.id','=','vehicle_gatepasses.vehicle_id')
       ->leftjoin('docket_allocations','docket_allocations.Docket_No','=','docket_masters.Docket_No')
       ->leftjoin('docket_statuses','docket_statuses.id','=','docket_allocations.Status')
       ->leftjoin('employees','employees.user_id','=','docket_allocations.Updated_By')
       ->leftjoin('office_masters','office_masters.id','=','employees.OfficeName')
       ->select(
        DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%d-%m-%Y') as BD"),
        'cities.Code', 'DestCity.Code as DCity','vehicle_masters.VehicleNo',
        'vehicle_gatepasses.GP_Number','docket_masters.Docket_No', DB::raw('CONCAT(customer_masters.CustomerCode, "~",customer_masters.CustomerName) as cust') ,
        DB::raw("DATE_FORMAT(docket_allocations.BookDate, '%d-%m-%Y') as allocDate"), "docket_statuses.title","office_masters.OfficeName","Docket_Case.Remark as CRemark")
        ->where("docket_allocations.Status","!=",8)
        ->paginate(10);
        if($request->submit=="Download"){
            return   Excel::download(new UrgantDeliveryDashboardExport(), ' UrgantDeliveryDashboardExport.xlsx');
          }
        return  view("Operation.UrgentDocketReportDashboard",
        ["title"=> "DASHBOARD DETAIL - URGENT DELIVERY",
        "DocketBooking"=>   $CASE ]);
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
     * @param  \App\Http\Requests\StoreUrgentDeliveryReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUrgentDeliveryReportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reports\UrgentDeliveryReport  $urgentDeliveryReport
     * @return \Illuminate\Http\Response
     */
    public function show(UrgentDeliveryReport $urgentDeliveryReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reports\UrgentDeliveryReport  $urgentDeliveryReport
     * @return \Illuminate\Http\Response
     */
    public function edit(UrgentDeliveryReport $urgentDeliveryReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUrgentDeliveryReportRequest  $request
     * @param  \App\Models\Reports\UrgentDeliveryReport  $urgentDeliveryReport
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUrgentDeliveryReportRequest $request, UrgentDeliveryReport $urgentDeliveryReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reports\UrgentDeliveryReport  $urgentDeliveryReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(UrgentDeliveryReport $urgentDeliveryReport)
    {
        //
    }
}
