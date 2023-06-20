<?php

namespace App\Http\Controllers\Reports;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOpenDRSDashboardRequest;
use App\Http\Requests\UpdateOpenDRSDashboardRequest;
use App\Models\Reports\OpenDRSDashboard;
use App\Models\Operation\DRSEntry;

class OpenDRSDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $DsrData=  DRSEntry::leftjoin('DRS_Transactions','DRS_Transactions.DRS_No','=','DRS_Masters.ID')
        ->leftjoin('employees','DRS_Masters.D_Boy','=','employees.id')
        ->leftjoin('vehicle_masters','DRS_Masters.Vehicle_No','=','vehicle_masters.id')
        ->leftjoin('docket_masters','DRS_Transactions.Docket_No','=','docket_masters.Docket_No')
        ->leftjoin('docket_product_details','docket_product_details.Docket_Id','=','docket_masters.id')
        ->leftjoin('office_masters','DRS_Masters.D_Office_Id','=','office_masters.id')
        ->leftjoin('docket_allocations','docket_allocations.Docket_No','=','docket_masters.Docket_No')
        ->where("docket_allocations.Status","=",7)
        ->select("vehicle_masters.VehicleNo","employees.EmployeeCode","employees.EmployeeName",
        "office_masters.OfficeCode","office_masters.OfficeName","DRS_Masters.Vehcile_Type","DRS_Transactions.Docket_No",
        "DRS_Masters.Supervisor","DRS_Masters.DriverName","DRS_Masters.Mob","DRS_Masters.Delivery_Date","DRS_Masters.DRS_No")->paginate(10);

        return view("Operation.OpenDRSDashboard",
        ["title"=>"OPEN DRS DELIVERY",
         "DsrData"=> $DsrData]);
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
     * @param  \App\Http\Requests\StoreOpenDRSDashboardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOpenDRSDashboardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reports\OpenDRSDashboard  $openDRSDashboard
     * @return \Illuminate\Http\Response
     */
    public function show(OpenDRSDashboard $openDRSDashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reports\OpenDRSDashboard  $openDRSDashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(OpenDRSDashboard $openDRSDashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOpenDRSDashboardRequest  $request
     * @param  \App\Models\Reports\OpenDRSDashboard  $openDRSDashboard
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOpenDRSDashboardRequest $request, OpenDRSDashboard $openDRSDashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reports\OpenDRSDashboard  $openDRSDashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(OpenDRSDashboard $openDRSDashboard)
    {
        //
    }
}
