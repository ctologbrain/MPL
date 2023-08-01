<?php

namespace App\Http\Controllers\SalesReport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoresalesReportRequest;
use App\Http\Requests\UpdatesalesReportRequest;
use App\Models\SalesReport\salesReport;

use App\Models\Account\CustomerMaster;
use App\Models\OfficeSetup\OfficeMaster;
use App\Models\Operation\DocketMaster;
use App\Models\OfficeSetup\city;
use App\Models\Operation\DocketBookingType;
use DB;
use Helper;
class SalesReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    { 
        
        $date =[];
        $CustomerData = '';
        $ParentCustomerData = '';
        $originCityData='';
        $DestCityData='';
        $SaleType = '';
       
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
            $date['formDate']=  date("Y-m-d",strtotime($req->formDate));
        }
        else{
            $date['formDate']= date("Y-m-d", strtotime('-10 day'));
            
        }
        
        if($req->todate){
           $date['todate']=  date("Y-m-d",strtotime($req->todate));
        }
        else{
            $date['todate']= date("Y-m-d");
        }
       
        if(isset($req->Customer)){
            $CustomerData =  $req->Customer;
        }
        

        if(isset($req->ParentCustomer)){
            $ParentCustomerData =  $req->ParentCustomer;
        }

        if($req->originCity){
            $originCityData =  $req->originCity;
        }
        if($req->DestCity){
            $DestCityData =  $req->DestCity;
        }

        if($req->saleType){
            $SaleType=  $req->saleType;
        }
        $DocketSale = DocketBookingType::get();
        $originCity= city::where("is_active",1)->get();
        $DestCity= '';
       $Offcie=OfficeMaster::select('office_masters.*')->where("Is_Active","Yes")->get();
       $Customer=CustomerMaster::select('customer_masters.*')->where("Active","Yes")->get();
       $ParentCustomer = CustomerMaster::join('customer_masters as PCust','PCust.ParentCustomer','customer_masters.id')->select('PCust.CustomerCode as PCustomerCode','PCust.CustomerName as  PCN','PCust.id')->where("customer_masters.Active","Yes")->get(); 
       $Docket=DocketMaster::with('offcieDetails','BookignTypeDetails','DevileryTypeDet','customerDetails','consignor','consignoeeDetails','DocketProductDetails','PincodeDetails','DestPincodeDetails','DocketInvoiceDetails','DocketAllocationDetail','NDRTransDetails','DrsTransDetails','offEntDetails','RTODataDetails','RegulerDeliveryDataDetails','getpassDataDetails','DocketManyInvoiceDetails','DocketImagesDet','DocketDetailUser')->where(function($query) use($DocketNo){
        if($DocketNo!=''){
            $query->where("docket_masters.Docket_No",$DocketNo);
        }
       })->where(function($query) use($office){
        if($office!=''){
            $query->where("docket_masters.Office_ID",$office);
        }
       })
       ->where(function($query) use($CustomerData){
        if($CustomerData!=''){
           $query->where("docket_masters.Cust_Id",$CustomerData);
        }
       })
       ->where(function($query) use($ParentCustomerData){
        if($ParentCustomerData!=''){
            $query->where("docket_masters.Cust_Id",$ParentCustomerData);
        }
       })
       ->where(function($query) use($originCityData){
        if($originCityData!=''){
            $query->whereRelation("PincodeDetails","city","=",$originCityData);
        }
       })
       ->where(function($query) use($DestCityData){
        if($DestCityData!=''){
            $query->whereRelation("DestPincodeDetails","city","=",$DestCityData);
        }
       })
       ->where(function($query) use($SaleType){
        if($SaleType!=''){
            $query->where("Booking_Type","=",$SaleType);
        }
       })
       ->where(function($query) use($date){
        if(isset($date['formDate']) &&  isset($date['todate'])){
            $query->whereBetween(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),[$date['formDate'],$date['todate']]);
        }
       })
       ->paginate(10);
       if($req->submit=="Download"){
        return   $this->DownloadSales($date,$CustomerData , $ParentCustomerData,$originCityData,$DestCityData,$SaleType,$DocketNo,$office);
       }
        return view('SalesReport.salesReport', [
            'title'=>'Sales Report',
            'DocketBookingData'=>$Docket,
            'OfficeMaster'=>$Offcie,
            'Customer'=>$Customer,
            'ParentCustomer'=>$ParentCustomer,
            'originCity'=>$originCity,
            'DestCity'=>$DestCity,
            'DocketSale'=>$DocketSale
          
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
     * @param  \App\Http\Requests\StoresalesReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresalesReportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SalesReport\salesReport  $salesReport
     * @return \Illuminate\Http\Response
     */
    public function show(salesReport $salesReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SalesReport\salesReport  $salesReport
     * @return \Illuminate\Http\Response
     */
    public function edit(salesReport $salesReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesalesReportRequest  $request
     * @param  \App\Models\SalesReport\salesReport  $salesReport
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesalesReportRequest $request, salesReport $salesReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SalesReport\salesReport  $salesReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(salesReport $salesReport)
    {
        //
    }

    public function DownloadSales($date,$CustomerData , $ParentCustomerData,$originCityData,$DestCityData,$SaleType,$DocketNo,$office){
        $Docket=DocketMaster::with('offcieDetails','BookignTypeDetails','DevileryTypeDet','customerDetails','consignor','consignoeeDetails','DocketProductDetails','PincodeDetails','DestPincodeDetails','DocketInvoiceDetails','DocketAllocationDetail','NDRTransDetails','DrsTransDetails','offEntDetails','RTODataDetails','RegulerDeliveryDataDetails','getpassDataDetails','DocketManyInvoiceDetails','DocketImagesDet','DocketDetailUser')->where(function($query) use($DocketNo){
            if($DocketNo!=''){
                $query->where("docket_masters.Docket_No",$DocketNo);
            }
           })->where(function($query) use($office){
            if($office!=''){
                $query->where("docket_masters.Office_ID",$office);
            }
           })
           ->where(function($query) use($CustomerData){
            if($CustomerData!=''){
               $query->where("docket_masters.Cust_Id",$CustomerData);
            }
           })
           ->where(function($query) use($ParentCustomerData){
            if($ParentCustomerData!=''){
                $query->where("docket_masters.Cust_Id",$ParentCustomerData);
            }
           })
           ->where(function($query) use($originCityData){
            if($originCityData!=''){
                $query->whereRelation("PincodeDetails","city","=",$originCityData);
            }
           })
           ->where(function($query) use($DestCityData){
            if($DestCityData!=''){
                $query->whereRelation("DestPincodeDetails","city","=",$DestCityData);
            }
           })
           ->where(function($query) use($SaleType){
            if($SaleType!=''){
                $query->where("Booking_Type","=",$SaleType);
            }
           })
           ->where(function($query) use($date){
            if(isset($date['formDate']) &&  isset($date['todate'])){
                $query->whereBetween(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),[$date['formDate'],$date['todate']]);
            }
           })
           ->get();
            $pinOr =$stor =$PinDest= $zone =$vhcl   = $gpno = $cust  =$product  =  $consigner  = $qty   =  $aw="";
            $cw = $invno = $invDate = $amt = $ewNo  = $emp =  $bkat   =$rgD =   $RegTime =$btyp = $rat =$Fright = $Charge="";
            $ttChrg  = $Cgst  = $Scst = $Igst = $Total= $inNo = $off = $rto=  $ofload =  $img="";
           $i=0;

           $timestamp = date('Y-m-d');
           $filename = 'SalesReport' . $timestamp . '.xls';
           header("Content-Type: application/vnd.ms-excel");
           header("Content-Disposition: attachment; filename=\"$filename\"");

echo <<<HEREDOCq
        <table class="table table-bordered table-centered mb-1 mt-1">
          <thead>
         <tr class="main-title">
           
           <th style="min-width:100px;" class="p-1">SL#</th>
           <th style="min-width:130px;" class="p-1">Docket No. </th>
           <th style="min-width:150px;" class="p-1">Date</th>
           <th style="min-width:160px;" class="p-1">Origin</th>
          
           <th style="min-width:130px;" class="p-1">Dest. State</th>	
           <th style="min-width:160px;" class="p-1">Dest. City</th>	
          
           <th style="min-width:130px;" class="p-1">Dest. Pincode</th>	

           <!-- remove -->
           <th style="min-width:130px;" class="p-1">Dest. Zone</th>
           <th style="min-width:130px;" class="p-1">Mode</th>	
           
           <th style="min-width:130px;" class="p-1"> Vehicle</th>
           <th style="min-width:130px;" class="p-1"> Gatepass</th>
                   
           
           <th style="min-width:130px;" class="p-1">Client Name</th>

            <th style="min-width:130px;" class="p-1">Product</th>
           <th style="min-width:130px;" class="p-1">PO Number</th>
           <th style="min-width:130px;" class="p-1">Consignor Name</th>
           <th style="min-width:130px;" class="p-1">Consignee Name</th>
    
           <th style="min-width:130px;" class="p-1">Pcs.</th>
           <th style="min-width:130px;" class="p-1">Act. Wt.</th>
           <th style="min-width:130px;" class="p-1"> Chrg. Wt.</th>
           <th style="min-width:130px;" class="p-1"> Vlt. Wt.</th>
           <th style="min-width:130px;" class="p-1">Invoice No</th>
           <th style="min-width:130px;" class="p-1">Invoice Date</th>
           <th style="min-width:130px;" class="p-1">Goods Value</th>
           <th style="min-width:130px;" class="p-1">EwayBill</th>
          
           <th style="min-width:130px;" class="p-1">Booked By</th>
           <th style="min-width:130px;" class="p-1">Booked At</th>
           
           <th style="min-width:130px;" class="p-1">Delivery Status</th>
           <th style="min-width:130px;" class="p-1">Delivery Date</th> 
           
          
           <th style="min-width:130px;" class="p-1">Sale Type</th>

           <th style="min-width:130px;" class="p-1">Rate</th>
           <th style="min-width:130px;" class="p-1">Freight</th>

           <th style="min-width:130px;" class="p-1">Other Charge</th>
           <th style="min-width:130px;" class="p-1">Textable Amount</th>
           <th style="min-width:130px;" class="p-1">CGST</th>
           <th style="min-width:130px;" class="p-1">SGST</th>
           <th style="min-width:130px;" class="p-1">IGST</th>
           <th style="min-width:130px;" class="p-1">Invoice Amount</th>
           <th style="min-width:130px;" class="p-1"> Bill NO</th>
           <th style="min-width:170px;" class="p-1">Branch </th>
           <th style="min-width:130px;" class="p-1">Billing Status</th>
           <th style="min-width:130px;" class="p-1">RTO Status</th>
           <th style="min-width:130px;" class="p-1">Offload Status</th>

           <th style="min-width:130px;" class="p-1">Scan Image Status</th>
          </tr>
        </thead>
        <tbody>

HEREDOCq;
          
          
        $PinnDest="";
        foreach($Docket as $DockBookData){
            if(isset($DockBookData->PincodeDetails->CityDetails->Code )){
                $pinOr = $DockBookData->PincodeDetails->CityDetails->Code.'~'.$DockBookData->PincodeDetails->CityDetails->CityName;
            }
            if(isset($DockBookData->DestPincodeDetails->StateDetails->name )){
                $stor = $DockBookData->DestPincodeDetails->StateDetails->name;
            }
            if(isset($DockBookData->DestPincodeDetails->CityDetails->Code )){
                $PinDest = $DockBookData->DestPincodeDetails->CityDetails->Code.'~'.$DockBookData->DestPincodeDetails->CityDetails->CityName;
            }
            if(isset($DockBookData->DestPincodeDetails->CityDetails->Code )){
                $PinnDest = $DockBookData->DestPincodeDetails->PinCode;
            }

            if(isset($DockBookData->DestPincodeDetails->CityDetails->ZoneDetails->ZoneName )){
                $zone = $DockBookData->DestPincodeDetails->CityDetails->ZoneDetails->ZoneName;
            }
            if(isset($DockBookData->getpassDataDetails->DocketDetailGPData->VehicleDetails->VehicleNo )){
                $vhcl = $DockBookData->getpassDataDetails->DocketDetailGPData->VehicleDetails->VehicleNo;
            }
            if(isset($DockBookData->getpassDataDetails->DocketDetailGPData->GP_Number )){
                $gpno = $DockBookData->getpassDataDetails->DocketDetailGPData->GP_Number;
            }
            if(isset($DockBookData->customerDetails->CustomerCode )){
                $cust = $DockBookData->customerDetails->CustomerCode.'~'.$DockBookData->customerDetails->CustomerName;
            }
            if(isset($DockBookData->DocketProductDetails->DocketProdductDetails->Title)){
                $product = $DockBookData->DocketProductDetails->DocketProdductDetails->Title;
            }
            if(isset($DockBookData->consignor->ConsignorName)){
                $consigner =$DockBookData->consignor->ConsignorName;
            }


            if(isset($DockBookData->DocketProductDetails->Qty)){
                $qty =$DockBookData->DocketProductDetails->Qty;
            }
            if(isset($DockBookData->DocketProductDetails->Actual_Weight)){
                $aw =$DockBookData->DocketProductDetails->Actual_Weight;
            }
            if(isset($DockBookData->DocketProductDetails->Charged_Weight)){
                $cw =$DockBookData->DocketProductDetails->Charged_Weight;
            }

            if(isset($DockBookData->DocketManyInvoiceDetails[0]->Invoice_No)){
                $invno =implode(",",array_column($DockBookData->DocketManyInvoiceDetails->toArray(), 'Invoice_No'));
            }

            if(isset($DockBookData->DocketManyInvoiceDetails[0]->Invoice_Date)){
                $invDate =implode(",",array_column($DockBookData->DocketManyInvoiceDetails->toArray(), 'Invoice_Date'));
            }
            if(isset($DockBookData->DocketManyInvoiceDetails[0]->Amount)){
                $amt =implode(",",array_column($DockBookData->DocketManyInvoiceDetails->toArray(), 'Amount'));
            }
            if(isset($DockBookData->DocketManyInvoiceDetails[0]->EWB_No)){
                $ewNo =implode(",",array_column($DockBookData->DocketManyInvoiceDetails->toArray(), 'EWB_No'));
            }

            if(isset($DockBookData->DocketDetailUser->EmployeeCode)){
                $emp =$DockBookData->DocketDetailUser->EmployeeCode.'~'.$DockBookData->DocketDetailUser->EmployeeName;
            }
            if(isset($DockBookData->Booked_At)){
                $bkat =$DockBookData->Booked_At;
            }
            if(isset($DockBookData->RegulerDeliveryDataDetails->Id)){
                $rgD ="Yes";
            }
            else{
                $rgD ="No";
            }
            if(isset($DockBookData->RegulerDeliveryDataDetails->Time)){
                $RegTime =$DockBookData->RegulerDeliveryDataDetails->Time;
            }

            if(isset($DockBookData->BookignTypeDetails->BookingType)){
                $btyp =$DockBookData->BookignTypeDetails->BookingType;
            }

            if(isset($DockBookData->InvoiceMasterMainDetails->InvoiceMastersMainForMasterDet->InvNo)){
                $inNo =$DockBookData->InvoiceMasterMainDetails->InvoiceMastersMainForMasterDet->InvNo;
            }
           
            if(isset($DockBookData->offcieDetails->OfficeCode)){
                $off =$DockBookData->offcieDetails->OfficeCode.'~'.$DockBookData->offcieDetails->OfficeName;
            }
            if(isset($DockBookData->Is_Rto)){
                $rto ="Yes";
            }
            else{
                $rto ="No";
            }
            if(isset($DockBookData->offEntDetails->ID)){
                $ofload ="Yes";
            }
            else{
                $ofload ="No";
            }
            if(isset($DockBookData->DocketImagesDet->DocketNo)){
                $img ="Yes";
            }
            else{
                $img ="No";
            }
            if(isset($DockBookData->consignoeeDetails->ConsigneeName)){
                $cnsni =$DockBookData->consignoeeDetails->ConsigneeName;
            }
            else{
                $cnsni ="";
            }
            if(isset($DockBookData->DocketProductDetails->VolumetricWeight)){
                $vlWt=$DockBookData->DocketProductDetails->VolumetricWeight;
            }
            else{
                $vlWt="";
            }
            if(isset($DockBookData->InvoiceMasterMainDetails->InvoiceMastersMainForMasterDet->InvNo)){
                $Blstst = "Billed";
            }
            else{
                $Blstst = "No";
            }

            if(isset($DockBookData->InvoiceMasterMainDetails->InvoiceMastersMainForMasterDet->InvNo)){

            if(isset($DockBookData->InvoiceMasterMainDetails->Rate)){
                $rat =$DockBookData->InvoiceMasterMainDetails->Rate;
            }
            if(isset($DockBookData->InvoiceMasterMainDetails->Fright)){
                $Fright =$DockBookData->InvoiceMasterMainDetails->Fright;
            }
            if(isset($DockBookData->InvoiceMasterMainDetails->Charge)){
                $Charge =$DockBookData->InvoiceMasterMainDetails->Charge;
            }
            if(isset($DockBookData->InvoiceMasterMainDetails->Charge)  && isset($DockBookData->InvoiceMasterMainDetails->Fright) ){
                $ttChrg =$DockBookData->InvoiceMasterMainDetails->Charge+$DockBookData->InvoiceMasterMainDetails->Fright;
            }
            if(isset($DockBookData->InvoiceMasterMainDetails->Cgst)){
                $Cgst =$DockBookData->InvoiceMasterMainDetails->Cgst;
            }
            if(isset($DockBookData->InvoiceMasterMainDetails->Scst)){
                $Scst =$DockBookData->InvoiceMasterMainDetails->Scst;
            }
            if(isset($DockBookData->InvoiceMasterMainDetails->Igst)){
                $Igst =$DockBookData->InvoiceMasterMainDetails->Igst;
            }
            if(isset($DockBookData->InvoiceMasterMainDetails->Total)){
                $Total =$DockBookData->InvoiceMasterMainDetails->Total;
            }
        }
        else{
            if($DockBookData->Booking_Type==3 || $DockBookData->Booking_Type==4){
                $rat ="";
                $Charge ="";
                if(isset( $DockBookData->TariffTypeDeatils->Freight)){
                    $ttChrg = $DockBookData->TariffTypeDeatils->Freight;
                }
                if(isset( $DockBookData->TariffTypeDeatils->Freight)){
                    $Fright = $DockBookData->TariffTypeDeatils->Freight;
                }
               

                if(isset( $DockBookData->TariffTypeDeatils->Cgst)){
                    $Cgst = $DockBookData->TariffTypeDeatils->Cgst;
                }
                if(isset( $DockBookData->TariffTypeDeatils->Scst)){
                    $Scst = $DockBookData->TariffTypeDeatils->Scst;
                }
                if(isset( $DockBookData->TariffTypeDeatils->Igst)){
                    $Igst = $DockBookData->TariffTypeDeatils->Igst;
                }
                if(isset( $DockBookData->TariffTypeDeatils->TotalAmount)){
                    $Total = $DockBookData->TariffTypeDeatils->TotalAmount;
                }
           
            }
            else{
                $SourceCity=$DockBookData->PincodeDetails->city; 
                $DestCity=$DockBookData->DestPincodeDetails->city; 
                $SourceState=$DockBookData->PincodeDetails->State; 
                $DestState=$DockBookData->DestPincodeDetails->State; 
                $SourcePinCode=$DockBookData->PincodeDetails->id; 
                $DestPinCode=$DockBookData->DestPincodeDetails->id; 
                $zoneSource=$DockBookData->PincodeDetails->CityDetails->ZoneName;
                $zoneDest=$DockBookData->DestPincodeDetails->CityDetails->ZoneName;
                $DeliveryType=$DockBookData->Delivery_Type;
                $chargeWeight=$DockBookData->DocketProductDetails->Charged_Weight;
                $goodsValue=$DockBookData->docket_invoice_details_sum_amount;
                $qty=$DockBookData->DocketProductDetails->Qty;
                $EffectDate=date("Y-m-d", strtotime($DockBookData->Booking_Date));
                $rate=Helper::CustTariff($DockBookData->Cust_Id,$SourceCity,$DestCity,$SourceState,$DestState,$SourcePinCode,$DestPinCode,$zoneSource,$zoneDest,$DeliveryType,$EffectDate,$chargeWeight);
                $SourceStateCheck=$DockBookData->DestPincodeDetails->StateDetails->name; 
                $fright=$DockBookData->DocketProductDetails->Charged_Weight*$rate;
                if(isset($DockBookData->customerDetails->PaymentDetails->Road))
                    {
                        $gstPer=$DockBookData->customerDetails->PaymentDetails->Road;
                    }
                    else
                    {
                      $gstPer=0;  
                    }
                    if($gstPer !=0)
                {
                    if($SourceStateCheck=='Delhi')
                    {
                        $Cgst=0;
                        $Scst=0;
                        $Igst=($fright*$gstPer)/100;
                    }
                    else{
                        $gsthalf=$gstPer/2;
                        $Cgst=($fright*$gsthalf)/100;
                        $Scst=($fright*$gsthalf)/100;
                        $Igst=0; 
                    }
                }
                else
                {
                    $Cgst=0;
                    $Scst=0;
                    $Igst=0;  
                }

                if($rate==00){
                    $rat="";
                    $Fright="";
                    $Charge ="";
                    $ttChrg ="";
                    $Cgst="";
                    $Scst="";
                    $Igst="";
                    $Total="";
                }
                else{
                    $Chargejson=Helper::CustOtherCharge($DockBookData->Cust_Id,$EffectDate,$SourceCity,$DestCity,$chargeWeight,$goodsValue,$rate,$qty,$fright);
                    $chhh=json_decode($Chargejson);
                    
                    if(isset($chhh->sum))
                    {
                    $Charge=$chhh->sum;
                    }
                    $Charge1=$DockBookData->DocketProductDetails->charge;

                    $rat= $rate;
                    $Fright =$fright; 
                    $Charge = $Charge+$Charge1;
                    $ttChrg =$fright; 
                    $Scst=$Scst;
                    $Igst=$Igst;
                    $Cgst=$Cgst;
                    $Total=$Igst+$Scst+$Cgst+$fright+$Charge+$Charge1;
                }
            }
        }
            

            $i++;
echo <<<HEREDOC
        <tr>
        <td class="p-1">{$i}</td>
        <td class="p-1"> {$DockBookData->Docket_No}</td>
        <td class="p-1"> {$DockBookData->Booking_Date}</td>
        <td class="p-1"> {$pinOr}</td>
        <td class="p-1"> {$stor}</td>

        <td class="p-1"> {$PinDest}</td>
        <td class="p-1"> {$PinnDest}</td>
        <td class="p-1"> {$zone}</td>
        <td class="p-1"> {$DockBookData->Mode}</td>
        <td class="p-1"> {$vhcl}</td>
        <td class="p-1"> {$gpno}</td>
        <td class="p-1"> {$cust}</td>
        
        <td class="p-1"> {$product}</td>
        <td class="p-1"> {$DockBookData->PO_No}</td>
        <td class="p-1"> {$consigner}</td>
        <td class="p-1"> {$cnsni}</td>
        <td class="p-1"> {$qty}</td>
        <td class="p-1"> {$aw}</td>
        <td class="p-1"> {$cw}</td>
        <td class="p-1"> {$vlWt}</td>
        <td class="p-1"> {$invno}</td>
        <td class="p-1"> {$invDate}</td>
        <td class="p-1"> {$amt}</td>
        <td class="p-1"> {$ewNo}</td>

        <td class="p-1"> {$emp}</td>
        <td class="p-1"> {$bkat}</td>
        <td class="p-1"> {$rgD}</td>
        <td class="p-1"> {$RegTime}</td>
        <td class="p-1"> {$btyp}</td>


        <td class="p-1"> {$rat}</td>
        <td class="p-1"> {$Fright}</td>
        <td class="p-1"> {$Charge}</td>
        <td class="p-1"> {$ttChrg}</td>
        <td class="p-1"> {$Cgst}</td>
        <td class="p-1"> {$Scst}</td>
        <td class="p-1"> {$Igst}</td>
        <td class="p-1"> {$Total}</td>


        <td class="p-1"> {$inNo}</td>
        <td class="p-1"> {$off}</td>
        <td class="p-1">{$Blstst}</td>
        <td class="p-1"> {$rto}</td>
        <td class="p-1"> {$ofload}</td>
        <td class="p-1"> {$img}</td>
        </tr>
        
HEREDOC;




        }

    }
}
