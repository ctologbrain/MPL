<?php

namespace App\Http\Controllers\SalesReport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDocketChargeDetailReportRequest;
use App\Http\Requests\UpdateDocketChargeDetailReportRequest;
use App\Models\Account\DocketChargeDetailReport;
use App\Models\Operation\DocketMaster;
use App\Models\Account\CustomerMaster;
use App\Models\CompanySetup\PincodeMaster;
use App\Models\OfficeSetup\OfficeMaster;
use App\Models\Operation\DocketBookingType;
use Helper;
class DocketChargeDetailReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $date =[];
        $SaleType= '';
        $CustomerData = '';
        $ParentCustomerData = '';
        $originCityData='';
        $DestCityData='';
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

        if($request->SaleType){
            $SaleType =  $request->SaleType;
        }
        if(isset($request->Customer)){
            $CustomerData =  $request->Customer;
        }
        

        if(isset($request->ParentCustomer)){
            $ParentCustomerData =  $request->ParentCustomer;
        }

        if($request->originCity){
            $originCityData =  $request->originCity;
        }
        if($request->DestCity){
            $DestCityData =  $request->DestCity;
        }
        //
        $originCity= PincodeMaster::leftjoin('cities','pincode_masters.city','cities.id')->select('cities.*','pincode_masters.PinCode','pincode_masters.id as PID')->get();
        $DestCity= '';
        $customer=CustomerMaster::select('customer_masters.*')->where("Active","Yes")->get();
        $ParentCustomer = CustomerMaster::join('customer_masters as PCust','PCust.ParentCustomer','customer_masters.id')->select('PCust.CustomerCode as PCustomerCode','PCust.CustomerName as  PCN','PCust.id')->where("customer_masters.Active","Yes")->get(); 
        $Saletype=DocketBookingType::get();
       $Offcie=OfficeMaster::select('office_masters.*')->where("Is_Active","Yes")->get();
      $docket = DocketMaster::with('BookignTypeDetails','DevileryTypeDet','customerDetails','consignor','consignoeeDetails','DocketProductDetails','PincodeDetails','DestPincodeDetails','DocketInvoiceDetails','DocketAllocationDetail','getpassDataDetails','DocketManyInvoiceDetails','DocketDetailUser')->where(function($query) use($DocketNo){
        if($DocketNo!=''){
            $query->where("docket_masters.Docket_No",$DocketNo);
        }
       })->where(function($query) use($office){
        if($office!=''){
            $query->where("docket_masters.Office_ID",$office);
        }
       })
       ->where(function($query) use($SaleType){
        if($SaleType!=''){
            $query->where("docket_masters.Booking_Type",$SaleType);
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
            $query->where("docket_masters.Origin_Pin",$originCityData);
        }
       })
       ->where(function($query) use($DestCityData){
        if($DestCityData!=''){
            $query->where("docket_masters.Dest_Pin",$DestCityData);
        }
       })
       ->where(function($query) use($date){
        if(isset($date['formDate']) &&  isset($date['todate'])){
            $query->whereBetween(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),[$date['formDate'],$date['todate']]);
        }
       })
       ->paginate(10);
       if($request->submit=="Download"){
            $this->DownloadDocketChargeDetailReport( $date,$SaleType,$CustomerData,$ParentCustomerData, $originCityData, $DestCityData,$DocketNo,$office);
       }
        return view('SalesReport.DocketChargeReport', [
            'title'=>'Docket Charge  Details',
            'docketCharge'=>$docket,
            'customer'=>$customer,
            'OfficeMaster'=>$Offcie,
            'Saletype'=> $Saletype,
            'ParentCustomer'=>$ParentCustomer,
            'originCity'=>$originCity,
            'DestCity'=>$DestCity
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
     * @param  \App\Http\Requests\StoreDocketChargeDetailReportRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocketChargeDetailReportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account\DocketChargeDetailReport  $docketChargeDetailReport
     * @return \Illuminate\Http\Response
     */
    public function show(DocketChargeDetailReport $docketChargeDetailReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account\DocketChargeDetailReport  $docketChargeDetailReport
     * @return \Illuminate\Http\Response
     */
    public function edit(DocketChargeDetailReport $docketChargeDetailReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocketChargeDetailReportRequest  $request
     * @param  \App\Models\Account\DocketChargeDetailReport  $docketChargeDetailReport
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocketChargeDetailReportRequest $request, DocketChargeDetailReport $docketChargeDetailReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account\DocketChargeDetailReport  $docketChargeDetailReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocketChargeDetailReport $docketChargeDetailReport)
    {
        //
    }

    public function DownloadDocketChargeDetailReport($date,$SaleType,$CustomerData,$ParentCustomerData, $originCityData, $DestCityData,$DocketNo,$office){
        $timestamp = date('Y-m-d');
        $filename = 'DownloadDocketChargeDetailReport' . $timestamp . '.xls';
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$filename\"");
        
        $pinOr =$stor =$PinDest= $zone =$vhcl   = $gpno = $cust  =$product  =  $consigner  = $qty   =  $aw="";
        $cw = $invno = $invDate = $amt = $ewNo  = $emp =  $bkat   =$rgD =   $RegTime =$btyp = $rat =$Fright = $custCode="";
        $ttChrg  = $Cgst  = $Scst = $Igst = $Total= $inNo = $off  =   $vndr= $img="";
       $i=0;
       $docket = DocketMaster::with('BookignTypeDetails','DevileryTypeDet','customerDetails','consignor','consignoeeDetails','DocketProductDetails','PincodeDetails','DestPincodeDetails','DocketInvoiceDetails','DocketAllocationDetail','getpassDataDetails','DocketManyInvoiceDetails','DocketDetailUser')->where(function($query) use($DocketNo){
        if($DocketNo!=''){
            $query->where("docket_masters.Docket_No",$DocketNo);
        }
       })->where(function($query) use($office){
        if($office!=''){
            $query->where("docket_masters.Office_ID",$office);
        }
       })
       ->where(function($query) use($SaleType){
        if($SaleType!=''){
            $query->where("docket_masters.Booking_Type",$SaleType);
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
            $query->where("docket_masters.Origin_Pin",$originCityData);
        }
       })
       ->where(function($query) use($DestCityData){
        if($DestCityData!=''){
            $query->where("docket_masters.Dest_Pin",$DestCityData);
        }
       })
       ->where(function($query) use($date){
        if(isset($date['formDate']) &&  isset($date['todate'])){
            $query->whereBetween(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),[$date['formDate'],$date['todate']]);
        }
       })->get();
      

 echo <<<DTH
     <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
         <tr class="main-title text-dark">
         <th style="min-width:100px;" class="p-1">SL#</th>
            <th style="min-width:130px;" class="p-1">Docket No. </th>
            <th style="min-width:150px;" class="p-1">Date</th>
            
            <th style="min-width:160px;" class="p-1">Origin </th>
          
            <th style="min-width:160px;" class="p-1">Dest.</th>	

            <th style="min-width:130px;" class="p-1">Mode</th>	
            <th style="min-width:130px;" class="p-1">Vendor Name</th>
            <th style="min-width:130px;" class="p-1">Vehicle No.</th>   
            <th style="min-width:190px;" class="p-1">Gatepass No.</th>

            <th style="min-width:130px;" class="p-1">Client Code</th>
            <th style="min-width:130px;" class="p-1">Client Name</th>

             <th style="min-width:170px;" class="p-1">Billing Person </th>

            	
             <th style="min-width:130px;" class="p-1">Product</th>	
            <th style="min-width:130px;" class="p-1">PO Number</th>
            
            <th style="min-width:130px;" class="p-1">Consignor Name</th>
            <th style="min-width:130px;" class="p-1">Consignee Name</th>
     
            <th style="min-width:130px;" class="p-1">Pcs.</th>
            <th style="min-width:130px;" class="p-1">Act. Wt.</th>
            <th style="min-width:130px;" class="p-1"> Chrg. Wt.</th>
            <th style="min-width:130px;" class="p-1"> Volumetric. Chrg.</th>
            
            <th style="min-width:130px;" class="p-1">Sale Type</th>
             
            <th style="min-width:130px;" class="p-1"> Rate</th>

            <th style="min-width:130px;" class="p-1"> FREIGHT</th>
            <th style="min-width:130px;" class="p-1"> TAXABLE AMOUNT</th>
            <th style="min-width:130px;" class="p-1"> CGST</th>
            <th style="min-width:130px;" class="p-1"> SGST</th>
            <th style="min-width:130px;" class="p-1"> IGST</th>
            <th style="min-width:130px;" class="p-1"> TOTAL GST	</th>
            <th style="min-width:130px;" class="p-1"> NET AMOUNT</th>
           </tr>
         </thead>
         <tbody>
DTH;

        foreach($docket as $DockBookData){
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
                $cust = $DockBookData->customerDetails->CustomerName;
                $custCode = $DockBookData->customerDetails->CustomerCode;
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

           
           
         
            if(isset($DockBookData->RegulerDeliveryDataDetails->Time)){
                $RegTime =$DockBookData->RegulerDeliveryDataDetails->Time;
            }

            if(isset($DockBookData->BookignTypeDetails->BookingType)){
                $btyp =$DockBookData->BookignTypeDetails->BookingType;
            }

           
           
            if(isset($DockBookData->offcieDetails->OfficeCode)){
                $off =$DockBookData->offcieDetails->OfficeCode.'~'.$DockBookData->offcieDetails->OfficeName;
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

            if(isset($DockBookData->getpassDataDetails->DocketDetailGPData->VehicleDetails->VehicleNo )){
                $vndr = $DockBookData->getpassDataDetails->DocketDetailGPData->VendorDetails->VendorName;
            }

            if($DockBookData->Booking_Type==3 || $DockBookData->Booking_Type==4){
                $rat =0;
                $gst = "";
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
                    $ttChrg ="";
                    $Cgst="";
                    $Scst="";
                    $Igst="";
                    $gst = "";
                    $Total="";
                }
                else{
                    $rat= $rate;
                    $Fright =$fright; 
                    $ttChrg =$fright; 
                    $Scst=$Scst;
                    $Igst=$Igst;
                    $Cgst=$Cgst;
                    $gst =  $Total=$Igst+$Scst+$Cgst;
                    $Total=$Igst+$Scst+$Cgst+$Fright;
                }
            }
            $i++;
            echo <<<HERD
                    <tr>
                    <td class="p-1">{$i}</td>
                    <td class="p-1"> {$DockBookData->Docket_No}</td>
                    <td class="p-1"> {$DockBookData->Booking_Date}</td>
                    <td class="p-1"> {$pinOr}</td>
                    <td class="p-1"> {$PinDest}</td>
            
                    <td class="p-1"> {$DockBookData->Mode}</td>
                    <td class="p-1"> {$vndr}</td>
                    <td class="p-1"> {$vhcl}</td>
                    <td class="p-1"> {$gpno}</td>
                    <td class="p-1"> {$custCode}</td>
                    <td class="p-1"> {$cust}</td>
                    <td class="p-1"> </td>
                    <td class="p-1"> {$product}</td>
                    <td class="p-1"> {$DockBookData->PO_No}</td>
                    <td class="p-1"> {$consigner}</td>
                    <td class="p-1"> {$cnsni}</td>
                    <td class="p-1"> {$qty}</td>
                    <td class="p-1"> {$aw}</td>
                    <td class="p-1"> {$cw}</td>
                    <td class="p-1"> {$vlWt}</td>
                    <td class="p-1"> {$btyp}</td>
                 
                    <td class="p-1"> {$rat}</td>
                    <td class="p-1"> {$Fright}</td>
                    <td class="p-1"> {$ttChrg}</td>
                    <td class="p-1"> {$Cgst}</td>
                    <td class="p-1"> {$Scst}</td>
                    <td class="p-1"> {$Igst}</td>
                   <td class="p-1"> {$gst}</td>
                    <td class="p-1"> {$Total}</td>

                    </tr>
                    
HERD;
           

           
          
        }
   echo "  </tbody></table>" ;    

    }
}
