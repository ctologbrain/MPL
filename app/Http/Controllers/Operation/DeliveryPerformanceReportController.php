<?php

namespace App\Http\Controllers\Operation;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDeliveryPerformanceReportRequest;
use App\Http\Requests\UpdateDeliveryPerformanceReportRequest;
use App\Models\Operation\DeliveryPerformanceReport;
use Illuminate\Http\Request;
use App\Models\OfficeSetup\OfficeMaster;
use App\Models\Account\CustomerMaster;
use App\Models\CompanySetup\ZoneMaster;
class DeliveryPerformanceReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $office=OfficeMaster::get();
        $customer=CustomerMaster::get();
        $zone=ZoneMaster::get();
       return view('Operation.DeliveryPerformanceReport', [
            'title'=>'DELIVERY PERFORMANCE REPORT',
            'office'=>$office,
            'customer'=>$customer,
            'zone'=>$zone
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
     * @param  \App\Http\Requests\StoreDeliveryPerformanceReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeliveryPerformanceReportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\DeliveryPerformanceReport  $deliveryPerformanceReport
     * @return \Illuminate\Http\Response
     */
    public function show(DeliveryPerformanceReport $deliveryPerformanceReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\DeliveryPerformanceReport  $deliveryPerformanceReport
     * @return \Illuminate\Http\Response
     */
    public function edit(DeliveryPerformanceReport $deliveryPerformanceReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDeliveryPerformanceReportRequest  $request
     * @param  \App\Models\Operation\DeliveryPerformanceReport  $deliveryPerformanceReport
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeliveryPerformanceReportRequest $request, DeliveryPerformanceReport $deliveryPerformanceReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\DeliveryPerformanceReport  $deliveryPerformanceReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeliveryPerformanceReport $deliveryPerformanceReport)
    {
        //
    }
}
