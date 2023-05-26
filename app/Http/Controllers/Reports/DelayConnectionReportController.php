<?php

namespace App\Http\Controllers\Reports;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDelayConnectionReportRequest;
use App\Http\Requests\UpdateDelayConnectionReportRequest;
use App\Models\Reports\DelayConnectionReport;
use App\Models\OfficeSetup\OfficeMaster;
use App\Models\Operation\DocketMaster;
use App\Models\Account\CustomerMaster;
use DB;
class DelayConnectionReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $CustomerData='';
        $officeData =  $request->office;
        if(isset($req->Customer)){
            $CustomerData =  $req->Customer;
        }
        $office = OfficeMaster::get();
        $Customer=CustomerMaster::select('customer_masters.*')->get();
        $docket = DocketMaster::leftjoin("docket_product_details","docket_product_details.Docket_Id","=","docket_masters.id")
        ->leftjoin("customer_masters","customer_masters.id","=","docket_masters.Cust_Id")
        ->leftjoin("gate_pass_with_dockets","gate_pass_with_dockets.Docket","=","docket_masters.Docket_No")
        ->leftjoin("vehicle_gatepasses","vehicle_gatepasses.id","=","gate_pass_with_dockets.GatePassId")
        ->leftjoin("users","vehicle_gatepasses.Created_By","=","users.id")
        ->leftjoin("employees","employees.user_id","=","users.id")
        ->leftjoin("office_masters","office_masters.id","=","employees.OfficeName")
        ->leftjoin("NDR_Trans","NDR_Trans.Docket_No","=","docket_masters.Docket_No")
        ->leftjoin("ndr_masters as NDRR","NDRR.id","=","NDR_Trans.NDR_Reason")
        ->leftjoin("Offload_Transactions","Offload_Transactions.Docket_NO","=","docket_masters.Docket_No")
        ->leftjoin("ndr_masters as OFFLoadR","OFFLoadR.id","=","Offload_Transactions.Offload_Reason")
        ->select("docket_masters.Docket_No","docket_masters.Booking_Date","OFFLoadR.ReasonCode as OffRC","OFFLoadR.ReasonDetail as OFFRD",
        "NDRR.ReasonDetail as NDRRD","NDRR.ReasonCode as NDRRC",
        DB::raw("GROUP_CONCAT(DISTINCT vehicle_gatepasses.GP_Number SEPARATOR ',')  as `GPN`"),
        DB::raw("GROUP_CONCAT(DISTINCT vehicle_gatepasses.GP_TIME SEPARATOR ',')  as `GPT`"),
        DB::raw("GROUP_CONCAT(DISTINCT office_masters.OfficeName SEPARATOR ',') as `GPBranch`"),
        "Offload_Transactions.Remark as OFFLoad_REMARK","NDR_Trans.Remark as NDR_REMARK",
        "docket_masters.Remark as DocketRemark","docket_product_details.Qty"
        ,"docket_product_details.Actual_Weight","customer_masters.CustomerCode","customer_masters.CustomerName","Offload_Transactions.Offload_Date")
        ->where(function($query) use($officeData){
            if($officeData!=''){
                $query->where("docket_masters.Office_ID",$officeData);
            }
           })
           ->where(function($query) use($CustomerData){
            if($CustomerData!=''){
               $query->where("docket_masters.Cust_Id",$CustomerData);
            }
           })
        ->groupBy("docket_masters.Docket_No")
        ->paginate(10);
     // echo '<pre>';  print_r( $docket); die;
        return view('Operation.DelayConnectionReport', [
            'title'=>'DELAY CONNECTION REPORT',
            'docketData'=>$docket,
            'office'=> $office,
            'Customer'=>$Customer]);
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
     * @param  \App\Http\Requests\StoreDelayConnectionReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDelayConnectionReportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reports\DelayConnectionReport  $delayConnectionReport
     * @return \Illuminate\Http\Response
     */
    public function show(DelayConnectionReport $delayConnectionReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reports\DelayConnectionReport  $delayConnectionReport
     * @return \Illuminate\Http\Response
     */
    public function edit(DelayConnectionReport $delayConnectionReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDelayConnectionReportRequest  $request
     * @param  \App\Models\Reports\DelayConnectionReport  $delayConnectionReport
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDelayConnectionReportRequest $request, DelayConnectionReport $delayConnectionReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reports\DelayConnectionReport  $delayConnectionReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(DelayConnectionReport $delayConnectionReport)
    {
        //
    }
}
