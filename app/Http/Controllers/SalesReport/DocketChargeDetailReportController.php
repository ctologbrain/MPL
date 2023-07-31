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
            $this->DownloadDocketChargeDetailReport($docket);
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

    public function DocketChargeDetailReport($docket){
        $pinOr =$stor =$PinDest= $zone =$vhcl   = $gpno = $cust  =$product  =  $consigner  = $qty   =  $aw="";
        $cw = $invno = $invDate = $amt = $ewNo  = $emp =  $bkat   =$rgD =   $RegTime =$btyp = $rat =$Fright = $Charge="";
        $ttChrg  = $Cgst  = $Scst = $Igst = $Total= $inNo = $off  =   $vndr= $img="";
       $i=0;
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

           

           
          
        }

    }
}
