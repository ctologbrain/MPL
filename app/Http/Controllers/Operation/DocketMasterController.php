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
use App\Models\OfficeSetup\city;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DocketReport;
use App\Exports\HubStatusReportExport;
use App\Exports\CustomersDocketExport;
use App\Exports\AZReportExport;
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
        $SaleType= '';
        $CustomerData = '';
        $ParentCustomerData = '';
        $originCityData='';
        $DestCityData='';
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
        
        if($req->todate){
           $date['todate']=  date("Y-m-d",strtotime($req->todate));
        }

        if($req->SaleType){
            $SaleType =  $req->SaleType;
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
       
        $originCity= city::get();
        $DestCity= '';
        $Customer=CustomerMaster::select('customer_masters.*')->get();
        $ParentCustomer = CustomerMaster::join('customer_masters as PCust','PCust.ParentCustomer','customer_masters.id')->select('PCust.CustomerCode as PCustomerCode','PCust.CustomerName as  PCN','PCust.id')->get(); 
        $Saletype=DocketBookingType::get();
       $Offcie=OfficeMaster::select('office_masters.*')->get();
       $Docket=DocketMaster::with('offcieDetails','BookignTypeDetails','DevileryTypeDet','customerDetails','consignor','consignoeeDetails','DocketProductDetails','PincodeDetails','DestPincodeDetails','DocketInvoiceDetails','DocketAllocationDetail','NDRTransDetails','DrsTransDetails','offEntDetails','RTODataDetails','RegulerDeliveryDataDetails','getpassDataDetails','DocketManyInvoiceDetails','DocketImagesDet','DocketDetailUser')->where(function($query) use($DocketNo){
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
            $query->whereRelation("PincodeDetails","city","=",$originCityData);
        }
       })
       ->where(function($query) use($DestCityData){
        if($DestCityData!=''){
            $query->whereRelation("DestPincodeDetails","city","=",$DestCityData);
        }
       })
       ->where(function($query) use($date){
        if(isset($date['formDate']) &&  isset($date['todate'])){
            $query->whereBetween(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),[$date['formDate'],$date['todate']]);
        }
       })
      
       ->paginate(10);
       if($req->get('submit')=='Download')
       {
          return  Excel::download(new DocketReport($office,$date,$DocketNo,$SaleType,$CustomerData,$ParentCustomerData,$originCityData,$DestCityData), 'PickupScan.xlsx');
       }
        // echo '<pre>'; print_r($Docket[0]->DocketManyInvoiceDetails[0] ); die;
        return view('Operation.docketBookingReport', [
        'title'=>'DOCKET BOOKING REPORT',
        'DocketBookingData'=>$Docket,
        'OfficeMaster'=>$Offcie,
        'Saletype'=> $Saletype,
        'Customer'=>$Customer,
        'ParentCustomer'=>$ParentCustomer,
        'originCity'=>$originCity,
        'DestCity'=>$DestCity]);
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

    public function DocketBookingCustomerWise(Request $req)
    {
        $date =[];
        $CustomerData = '';
        $ParentCustomerData = '';
        $originCityData='';
        $DestCityData='';
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
        
        if($req->todate){
           $date['todate']=  date("Y-m-d",strtotime($req->todate));
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
        $DocketTotals=DocketMaster::leftjoin('docket_product_details','docket_masters.id','docket_product_details.Docket_Id')->select(DB::raw("SUM(docket_product_details.Qty) as TotPiece"),DB::raw("SUM(docket_product_details.Actual_Weight) as TotActual_Weight"),DB::raw("SUM(docket_product_details.Charged_Weight) as TotCharged_Weight"))->where(function($query) use($DocketNo){
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
           })->first();
        $originCity= city::get();
        $DestCity= '';
       $Offcie=OfficeMaster::select('office_masters.*')->get();
       $Customer=CustomerMaster::select('customer_masters.*')->get();
       $ParentCustomer = CustomerMaster::join('customer_masters as PCust','PCust.ParentCustomer','customer_masters.id')->select('PCust.CustomerCode as PCustomerCode','PCust.CustomerName as  PCN','PCust.id')->get(); 
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
       ->where(function($query) use($date){
        if(isset($date['formDate']) &&  isset($date['todate'])){
            $query->whereBetween(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),[$date['formDate'],$date['todate']]);
        }
       })
       ->paginate(10);
       if($req->get('submit')=='Download')
        {
           return  Excel::download(new CustomersDocketExport($office,$date,$DocketNo,$CustomerData,$ParentCustomerData,$originCityData,$DestCityData), 'CustomersDocketreport.xlsx');
        }
       
        return view('Operation.DocketBookingCustomerWise', [
        'title'=>'DOCKET BOOKING -CUSTOMER REPORT',
        'DocketBookingData'=>$Docket,
        'OfficeMaster'=>$Offcie,
        'Customer'=>$Customer,
        'ParentCustomer'=>$ParentCustomer,
        'originCity'=>$originCity,
        'DestCity'=>$DestCity,
        'DocketTotals'=>$DocketTotals]);
    }

    public function DocketHubStatusWise(Request $req)
    {
        $date =[];
        if($req->office){
            $office =  $req->office;
        }
        else{
             $office = '';
        }

        if($req->formDate){
            $date['formDate']=  date("Y-m-d",strtotime($req->formDate));
        }
        
        if($req->todate){
           $date['todate']=  date("Y-m-d",strtotime($req->todate));
        }

        $Offcie=OfficeMaster::select('office_masters.*')->get();
        $Docket=DocketMaster::with('offcieDetails','BookignTypeDetails','DevileryTypeDet','customerDetails','consignor','consignoeeDetails','DocketProductDetails','PincodeDetails','DestPincodeDetails','DocketInvoiceDetails','DocketAllocationDetail','NDRTransDetails','DrsTransDetails','offEntDetails','RTODataDetails','RegulerDeliveryDataDetails','getpassDataDetails','DocketManyInvoiceDetails','DocketImagesDet','DocketDetailUser','DrsTransDeliveryDetails')->where(function($query) use($office){
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
        if($req->get('submit')=='Download')
        {
           return  Excel::download(new HubStatusReportExport($office,$date), 'HubStatusReport.xlsx');
        }
        return view('Operation.DocketHubStatusReport', [
            'title'=>'DOCKET - HUB STATUS REPORT',
            'DocketBookingData'=>$Docket,
            'OfficeMaster'=>$Offcie]);
    }

    public function DocketAtoZReport(Request $req)
    {
        $date =[];
        $originCityData='';
        if($req->formDate){
            $date['formDate']=  date("Y-m-d",strtotime($req->formDate));
        }
        
        if($req->todate){
           $date['todate']=  date("Y-m-d",strtotime($req->todate));
        }
       
        if($req->originCity){
            $originCityData =  $req->originCity;
        }
        $originCity= city::get();
        $Docket=DocketMaster::leftjoin('NDR_Trans','NDR_Trans.Docket_No','docket_masters.Docket_No')
        ->leftjoin('ndr_masters','ndr_masters.id','NDR_Trans.NDR_Reason')
        ->leftjoin('pincode_masters','pincode_masters.id','docket_masters.Origin_Pin')
        ->leftjoin('cities','cities.id','pincode_masters.city')
        ->leftjoin('docket_allocations','docket_allocations.Docket_No','docket_masters.Docket_No')
        ->leftjoin('docket_booking_types','docket_booking_types.id','docket_masters.Booking_Type')
        ->select('docket_booking_types.BookingType','cities.CityName','cities.Code',DB::raw('COUNT(docket_masters.Docket_No) as TotDocket'),DB::raw('COUNT(NDR_Trans.Docket_No) as TotNDR'),
        DB::raw('SUM(CASE WHEN docket_allocations.Status!=8 THEN 1 ELSE  0 END)  AS TOTNONDEL' ), 
        DB::raw('SUM(CASE WHEN docket_allocations.Status=2 THEN 1 ELSE  0 END)  AS TOTNONCONCT' ),'cities.id as CID','docket_masters.Booking_Type')
        ->groupBy(['cities.id','docket_booking_types.BookingType'])
        ->where(function($query) use($originCityData){
            if($originCityData!=''){
                $query->where("cities.id",$originCityData);
            }
           })
        ->where(function($query) use($date){
            if(isset($date['formDate']) &&  isset($date['todate'])){
                $query->whereBetween(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),[$date['formDate'],$date['todate']]);
            }
        })
        ->paginate('10');
        if($req->get('submit')=='Download')
        {
           return  Excel::download(new AZReportExport($originCityData,$date), 'AZReportExport.xlsx');
        }
        
        return view('Operation.DocketAtoZReport', [
            'title'=>'DOCKET - AZ REPORT',
            'DocketBookingData'=>$Docket,
            'originCity'=>$originCity]);

    }

    public function BookinAZDetails(Request $req, $origin ,$category){
        $date= [];
        if($req->get('formDate')!==null){
            $date['formDate']=  date("Y-m-d",strtotime($req->get('formDate')));
        }
        if($req->get('ToDate')!==null){
           $date['todate']=  date("Y-m-d",strtotime($req->get('ToDate')));
        }
        $Docket=DocketMaster::with('offcieDetails','BookignTypeDetails','DevileryTypeDet','customerDetails','consignor','consignoeeDetails','DocketProductDetails','PincodeDetails','DestPincodeDetails','DocketAllocationDetail','NDRTransDetails','DrsTransDetails','RTODataDetails','RegulerDeliveryDataDetails','getpassDataDetails','DocketManyInvoiceDetails','DocketImagesDet','DocketDetailUser')->where(function($query) use($origin){
            if($origin!=''){
                $query->whereRelation("PincodeDetails","city",$origin);
            }
           })->where(function($query) use($category){
            if($category!=''){
                $query->where("docket_masters.Booking_Type",$category);
            }
           })
           ->where(function($query) use($date){
            if(isset($date['formDate']) &&  isset($date['todate'])){
                $query->whereBetween(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),[$date['formDate'],$date['todate']]);
            }
           })
           ->paginate('10');
            return view('Operation.BookingAtoZDetailReport', [
                'title'=>'DOCKET - AZ DETAILED REPORT',
                'DocketBookingData'=>$Docket
            ]);
    }

    public function BookinAZNDRDetails(Request $req,$origin ,$category){
        $date= [];
        if($req->get('formDate')!==null){
            $date['formDate']=  date("Y-m-d",strtotime($req->get('formDate')));
        }
        if($req->get('ToDate')!==null){
           $date['todate']=  date("Y-m-d",strtotime($req->get('ToDate')));
        }
        $Docket=DocketMaster::join('NDR_Trans','NDR_Trans.Docket_No','docket_masters.Docket_No')
            ->leftjoin('ndr_masters','ndr_masters.id','NDR_Trans.NDR_Reason')
            ->leftjoin('pincode_masters as ORGPIN','docket_masters.Origin_Pin','ORGPIN.id')
            ->leftjoin('cities as ORGCITY','ORGPIN.city','ORGCITY.id')
            ->leftjoin('pincode_masters as DESTPIN','docket_masters.Dest_Pin','DESTPIN.id')
            ->leftjoin('cities as DESTCITY','DESTPIN.city','DESTCITY.id')
            ->leftjoin('docket_product_details','docket_masters.id','docket_product_details.Docket_Id')
            ->leftjoin('docket_booking_types','docket_masters.Booking_Type','docket_booking_types.id')
            ->leftjoin('office_masters','docket_masters.Office_ID','office_masters.id')
            ->leftjoin('customer_masters','docket_masters.Cust_Id','customer_masters.id')

            ->leftjoin('users','docket_masters.Booked_By','users.id')
            ->leftjoin('employees','users.id','employees.user_id')
            ->select('customer_masters.CustomerCode','customer_masters.CustomerName','office_masters.OfficeCode',
            'office_masters.OfficeName',"DESTCITY.CityName as DESTCityName","DESTCITY.Code as DESTCityCode",
            "ORGCITY.CityName as ORGCityName","ORGCITY.Code as ORGCode","docket_product_details.Qty",
            "docket_product_details.Charged_Weight", "docket_product_details.Actual_Weight","docket_booking_types.BookingType",
            "ndr_masters.ReasonDetail","NDR_Trans.NDR_Date", "docket_masters.Docket_No",  "docket_masters.Booking_Date"
            ,"docket_masters.created_at", "employees.EmployeeCode",'employees.EmployeeName',"ndr_masters.ReasonCode")
           ->where(function($query) use($origin){
            if($origin!=''){
                $query->where("ORGPIN.city","=",$origin);
            }
           })->where(function($query) use($category){
            if($category!=''){
                $query->where("docket_masters.Booking_Type",$category);
            }
           })
           ->where(function($query) use($date){
            if(isset($date['formDate']) &&  isset($date['todate'])){
                $query->whereBetween(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),[$date['formDate'],$date['todate']]);
            }
           })
           ->groupBy('docket_masters.Docket_No')
           ->paginate('10');
            return view('Operation.BookingAtoZDetailNDRReport', [
                'title'=>'DOCKET - AZ DETAILED REPORT',
                'DocketBookingData'=>$Docket
            ]);
    }

    public function BookinAZNONDELDetails(Request $req,$origin ,$category){
        $date= [];
        if($req->get('formDate')!==null){
            $date['formDate']=  date("Y-m-d",strtotime($req->get('formDate')));
        }
        if($req->get('ToDate')!==null){
           $date['todate']=  date("Y-m-d",strtotime($req->get('ToDate')));
        }

        $Docket=DocketMaster::with('offcieDetails','BookignTypeDetails','DevileryTypeDet','customerDetails','consignor','consignoeeDetails','DocketProductDetails','PincodeDetails','DestPincodeDetails','DocketAllocationDetail','NDRTransDetails','DrsTransDetails','RTODataDetails','RegulerDeliveryDataDetails','getpassDataDetails','DocketManyInvoiceDetails','DocketImagesDet','DocketDetailUser')
        ->where(function($query) use($origin){
            if($origin!=''){
                $query->whereRelation("PincodeDetails","city",$origin);
            }
           })->where(function($query) use($category){
            if($category!=''){
                $query->where("docket_masters.Booking_Type",$category);
            }
           })
           ->where(function($query) use($date){
            if(isset($date['formDate']) &&  isset($date['todate'])){
                $query->whereBetween(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),[$date['formDate'],$date['todate']]);
            }
           })
           ->whereRelation("DocketAllocationDetail","Status","!=" ,8)
           ->paginate('10');
            return view('Operation.BookingAtoZDetailReport', [
                'title'=>'DOCKET - AZ DETAILED REPORT',
                'DocketBookingData'=>$Docket
            ]);
    }


    public function CustomerWiseVolumeReport(Request $req){
        $date =[];
        $CustomerData = '';
        $ParentCustomerData = '';
        $originCityData='';
        $DestCityData='';
        if($req->office){
            $office =  $req->office;
        }
        else{
             $office = '';
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

        if($req->formDate){
            $date['formDate']=  date("Y-m-d",strtotime($req->formDate));
        }
        
        if($req->todate){
           $date['todate']=  date("Y-m-d",strtotime($req->todate));
        }
        
     $Customer=   CustomerMaster::join('docket_masters','docket_masters.Cust_Id','customer_masters.id')
     ->leftjoin('docket_product_details','docket_product_details.Docket_Id','docket_masters.id')
     ->select("customer_masters.CustomerCode","customer_masters.CustomerName","customer_masters.id as CID"
     )
     ->where(function($query) use($office){
        if($office!=''){
            $query->where("docket_masters.Office_ID",$office);
        }
       })
      ->where(function($query) use($date){
        if(isset($date['formDate']) &&  isset($date['todate'])){
            $query->whereBetween(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),[$date['formDate'],$date['todate']]);
        }
       })
     ->where(function($query) use($CustomerData){
        if($CustomerData!=''){
           $query->where("customer_masters.id",$CustomerData);
        }
       })
       ->groupBy('customer_masters.id')
       ->paginate(10);

       $allCityCode = DocketMaster::leftjoin('pincode_masters as DESTPIN','docket_masters.Dest_Pin','DESTPIN.id')
       ->leftjoin('cities as DESTCITY','DESTPIN.city','DESTCITY.id')
       ->select('DESTCITY.*','DESTCITY.id as CTID')
       ->where(function($query) use($DestCityData){
        if($DestCityData!=''){
            $query->where("DESTCITY.id",$DestCityData);
        }
       })
       ->where(function($query) use($originCityData){
        if($originCityData!=''){
            $query->orWhere("DESTCITY.id",$originCityData);
        }
       })
       ->where(function($query) use($office){
        if($office!=''){
            $query->where("docket_masters.Office_ID",$office);
        }
       })
       ->where(function($query) use($date){
        if(isset($date['formDate']) &&  isset($date['todate'])){
            $query->whereBetween(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),[$date['formDate'],$date['todate']]);
        }
       })
       ->groupBy('DESTCITY.id')->get();



       $originCity= city::get();
        $DestCity= '';
       $Offcie=OfficeMaster::select('office_masters.*')->get();
       $CustomerFilter=CustomerMaster::select('customer_masters.*')->get();
       $ParentCustomer = CustomerMaster::join('customer_masters as PCust','PCust.ParentCustomer','customer_masters.id')->select('PCust.CustomerCode as PCustomerCode','PCust.CustomerName as  PCN','PCust.id')->get(); 
        return view('Operation.CustomerWiseVolumeReport', [
            'title'=>'Customer Wise Volume Report',
            'customer'=>$Customer,
            'Offcie'=>$Offcie,
            'CustomerFilter'=>$CustomerFilter,
            'ParentCustomer'=> $ParentCustomer,
            'originCity'=> $originCity,
            'DestCity'=>$DestCity,
            'AllCity'=>$allCityCode
        ]);
    }

   

}
