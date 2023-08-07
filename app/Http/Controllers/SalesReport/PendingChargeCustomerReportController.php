<?php

namespace App\Http\Controllers\SalesReport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePendingChargeCustomerReportRequest;
use App\Http\Requests\UpdatePendingChargeCustomerReportRequest;
use App\Models\Account\PendingChargeCustomerReport;
use App\Models\Account\CustomerMaster;
use App\Models\OfficeSetup\OfficeMaster;
use App\Models\Operation\DocketMaster;
use Helper;
class PendingChargeCustomerReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            $date =[];
            $CustomerData = '';
            if($request->DocketNo){
                $DocketNo =  $request->DocketNo;
            }
            else{
                 $DocketNo = '';
            }
    
            if($request->office){
                $office =  $request->office;
            }
            else{
                 $office = '';
            }
    
            if($request->formDate){
                $date['formDate']=  date("Y-m-d",strtotime($request->formDate));
            }
            
            if($request->todate){
               $date['todate']=  date("Y-m-d",strtotime($request->todate));
            }
    
           
            if(isset($request->Customer)){
                $CustomerData =  $request->Customer;
            }
            
            $customer=CustomerMaster::select('customer_masters.*')->where("Active","Yes")->get();
            
           $Offcie=OfficeMaster::select('office_masters.*')->where("Is_Active","Yes")->get();
           $docket=DocketMaster::with('DocketProductDetails','PincodeDetails','DestPincodeDetails','customerDetails','DevileryTypeDet','offcieDetails')->withSum('DocketInvoiceDetails','Amount')
           ->where(function($query) use($DocketNo){
            if($DocketNo!=''){
                $query->where("docket_masters.Docket_No",$DocketNo);
            }
           })
           ->where(function($query) use($office){
            if($office!=''){
                $query->where("docket_masters.Office_ID",$office);
            }
           })
           ->where(function($query) use($CustomerData){
            if($CustomerData!=''){
               $query->where("docket_masters.Cust_Id",$CustomerData);
            }
           })
           
           ->where(function($query) use($date){
            if(isset($date['formDate']) &&  isset($date['todate'])){
                $query->whereBetween(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),[$date['formDate'],$date['todate']]);
            }
           })
           ->get();
           $docketArray=array();
           foreach($docket as $docketDetails)
           {
            
            
               $SourceCity=$docketDetails->PincodeDetails->city; 
               $DestCity=$docketDetails->DestPincodeDetails->city; 
               $SourceState=$docketDetails->PincodeDetails->State; 
               $DestState=$docketDetails->DestPincodeDetails->State; 
               $SourcePinCode=$docketDetails->PincodeDetails->id; 
               $DestPinCode=$docketDetails->DestPincodeDetails->id; 
               $zoneSource=$docketDetails->PincodeDetails->CityDetails->ZoneName;
               $zoneDest=$docketDetails->DestPincodeDetails->CityDetails->ZoneName;
               $DeliveryType=$docketDetails->Delivery_Type;
               $chargeWeight=$docketDetails->DocketProductDetails->Charged_Weight;
               $goodsValue=$docketDetails->docket_invoice_details_sum_amount;
               $qty=$docketDetails->DocketProductDetails->Qty;
               $EffectDate=date("Y-m-d", strtotime($docketDetails->Booking_Date));
               $rate=Helper::CustTariff($docketDetails->Cust_Id,$SourceCity,$DestCity,$SourceState,$DestState,$SourcePinCode,$DestPinCode,$zoneSource,$zoneDest,$DeliveryType,$EffectDate,$chargeWeight);
               $fright=$docketDetails->DocketProductDetails->Charged_Weight*$rate;
                if($rate==00)
                {
                 $data=array(
                 'Customer'=>$docketDetails->customerDetails->CustomerName,
                 'origin'=>$docketDetails->PincodeDetails->CityDetails->CityName,
                 'Dest'=>$docketDetails->DestPincodeDetails->CityDetails->CityName,
                 'originZone'=>$docketDetails->PincodeDetails->CityDetails->ZoneDetails->ZoneName,
                 'DestZone'=>$docketDetails->DestPincodeDetails->CityDetails->ZoneDetails->ZoneName,
                 'Booking_Date'=>date("d-m-Y", strtotime($docketDetails->Booking_Date)),
                 'PTL'=>'PART TRUCK LOAD',
                 'Mode'=>$docketDetails->Mode,
                 'DeliveryType'=>$docketDetails->DevileryTypeDet->Title,
                 'Docket_No'=>$docketDetails->Docket_No,
                 'Qty'=>$docketDetails->DocketProductDetails->Qty,
                 'Office'=>$docketDetails->offcieDetails->OfficeName,
                 'Charged_Weight'=>$docketDetails->DocketProductDetails->Charged_Weight,
                 'ActualWeight'=>$docketDetails->DocketProductDetails->Actual_Weight,
                 'VolumetriCWeight'=>$docketDetails->DocketProductDetails->VolumetricWeight,
                 
                 
                 );
                 array_push($docketArray,$data);
               }
            }
             return view('SalesReport.PendingCustomerCharge', [
                'title'=>'Pending Customer Charge Calculation',
                'docketCharge'=>$docketArray,
                'customer'=>$customer,
                'OfficeMaster'=>$Offcie
              
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
     * @param  \App\Http\Requests\StorePendingChargeCustomerReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePendingChargeCustomerReportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account\PendingChargeCustomerReport  $pendingChargeCustomerReport
     * @return \Illuminate\Http\Response
     */
    public function show(PendingChargeCustomerReport $pendingChargeCustomerReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account\PendingChargeCustomerReport  $pendingChargeCustomerReport
     * @return \Illuminate\Http\Response
     */
    public function edit(PendingChargeCustomerReport $pendingChargeCustomerReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePendingChargeCustomerReportRequest  $request
     * @param  \App\Models\Account\PendingChargeCustomerReport  $pendingChargeCustomerReport
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePendingChargeCustomerReportRequest $request, PendingChargeCustomerReport $pendingChargeCustomerReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account\PendingChargeCustomerReport  $pendingChargeCustomerReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(PendingChargeCustomerReport $pendingChargeCustomerReport)
    {
        //
    }
}
