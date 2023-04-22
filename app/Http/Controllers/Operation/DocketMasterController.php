<?php

namespace App\Http\Controllers\Operation;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCreditBookingRequest;
use App\Http\Requests\UpdateCreditBookingRequest;
use App\Models\Operation\CreditBooking;
use Illuminate\Http\Request;
use Auth;
use App\Models\Account\Consignee;
use App\Models\Account\ConsignorMaster;
use App\Models\Account\CustomerMaster;
use App\Models\CompanySetup\PincodeMaster;
use App\Models\OfficeSetup\employee;
use App\Models\Stock\DocketAllocation;
use App\Models\Operation\DocketProductDetails;
use App\Models\Operation\DocketInvoiceDetails;
use App\Models\Operation\DocketMaster;
use App\Models\Operation\DocketBookingType;
use App\Models\Operation\DevileryType;
use App\Models\Operation\PackingMethod;
use App\Models\Operation\DocketInvoiceType;
use App\Models\OfficeSetup\OfficeMaster;
use DB;
class DocketMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $date =[];
        if($req->DocketNo){
            $DocketNo =  $req->DocketNo;
        }
        else{
             $DocketNo = '';
        }

        if($req->office){
            $office =  $req->office;
        }
        else{
             $office = '';
        }

        if($req->formDate){
            $date['formDate']=  $req->formDate;
        }
        
        if($req->todate){
           $date['todate']=  $req->todate;
        }
       

       $Offcie=OfficeMaster::select('office_masters.*')->get();
       $Docket=DocketMaster::with('offcieDetails','BookignTypeDetails','DevileryTypeDet','customerDetails','consignor','consignoeeDetails','DocketProductDetails','PincodeDetails','DestPincodeDetails','DocketInvoiceDetails','DocketAllocationDetail','NDRTransDetails','DrsTransDetails','offEntDetails')->where(function($query) use($DocketNo){
        if($DocketNo!=''){
            $query->where("docket_masters.Docket_No",$DocketNo);
        }
       })->where(function($query) use($office){
        if($office!=''){
            $query->where("docket_masters.Office_ID",$office);
        }
       })
       ->where(function($query) use($date){
        if(isset($date['formDate']) &&  isset($date['todate'])){
            $query->whereBetween(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),[$date['formDate'],$date['todate']]);
        }
       })
       ->paginate(10);
     //echo '<pre>';  print_r($Docket[0]->offEntDetails); die;
        return view('Operation.docketBookingReport', [
        'title'=>'DOCKET BOOKING REPORT',
        'DocketBookingData'=>$Docket,
        'OfficeMaster'=>$Offcie]);
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
     * @param  \App\Http\Requests\StoreDocketMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocketMasterRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\DocketMaster  $docketMaster
     * @return \Illuminate\Http\Response
     */
    public function show(DocketMaster $docketMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\DocketMaster  $docketMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(DocketMaster $docketMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocketMasterRequest  $request
     * @param  \App\Models\Operation\DocketMaster  $docketMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocketMasterRequest $request, DocketMaster $docketMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\DocketMaster  $docketMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocketMaster $docketMaster)
    {
        //
    }
}
