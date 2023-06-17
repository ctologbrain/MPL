<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreOrganizationChartReportRequest;
use App\Http\Requests\UpdateOrganizationChartReportRequest;
use App\Models\Operation\OrganizationChartReport;
use Auth;
use App\Models\Operation\DocketMaster;
use App\Models\OfficeSetup\employee;
use DB; 

class OrganizationChartReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //leftjoin("employees as EmployeeChild","EmployeeChild.ReportingPerson","employees.id")->
        $parentEmployee =employee::leftjoin("office_masters","office_masters.id","employees.OfficeName")->where("ReportingPerson",'=',null)->get();
        $ChildrenEmployee =employee::leftjoin("office_masters","office_masters.id","employees.OfficeName")->where("ReportingPerson",'!=',null)
        ->select(DB::raw("GROUP_CONCAT(employees.EmployeeName SEPARATOR '-') as `ParentsChild`"),
         DB::raw("GROUP_CONCAT(employees.EmployeeCode SEPARATOR '-') as `ChildCode`"),
         DB::raw("GROUP_CONCAT(office_masters.OfficeName SEPARATOR '-') as `ChildOffice`"))
        ->groupBy('ReportingPerson')
        ->get();
        return view('Operation.organisation_chart', [
            'title'=>'DOCKET BOOKING REPORT',
           'parentEmployee' => $parentEmployee,
           'ChildrenEmployee' => $ChildrenEmployee ]);
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
     * @param  \App\Http\Requests\StoreOrganizationChartReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrganizationChartReportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\OrganizationChartReport  $organizationChartReport
     * @return \Illuminate\Http\Response
     */
    public function show(OrganizationChartReport $organizationChartReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\OrganizationChartReport  $organizationChartReport
     * @return \Illuminate\Http\Response
     */
    public function edit(OrganizationChartReport $organizationChartReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrganizationChartReportRequest  $request
     * @param  \App\Models\Operation\OrganizationChartReport  $organizationChartReport
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrganizationChartReportRequest $request, OrganizationChartReport $organizationChartReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\OrganizationChartReport  $organizationChartReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrganizationChartReport $organizationChartReport)
    {
        //
    }
}
