<?php

namespace App\Http\Controllers\Operation;
use App\Http\Controllers\Controller;

use App\Models\Operation\Forwarding;
use App\Http\Requests\StoreForwardingRequest;
use App\Http\Requests\UpdateForwardingRequest;
use App\Models\OfficeSetup\OfficeMaster;
use App\Models\OfficeSetup\employee;
use App\Models\Vendor\VendorMaster;
use App\Models\Operation\DocketMaster;
use App\Models\Stock\DocketAllocation;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Storage;
use DB;

class ForwardingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $vandor = VendorMaster::get();
        return view('Operation.Forwarding', [
            'title'=>'3D Forwarding',
            'vendor'=>  $vandor]);
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
     * @param  \App\Http\Requests\StoreForwardingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreForwardingRequest $request)
    {
        //
        $UserId = Auth::id();

       $getLastId = Forwarding::orderBy("id","DESC")->first();
       if(isset($getLastId->id)){
        $Office = employee::leftjoin("office_masters","employees.OfficeName","=","office_masters.id")->where("user_id",$UserId)->first();
        $ForwardingNo = $Office->OfficeCode.'/000'.($getLastId->id+1);
       }
       else{
        $ForwardingNo ='0001';
       }

        Forwarding::insert(["Forwarding_Date" =>date("Y-m-d",strtotime($request->forwarding_date)),
        "DocketNo"=> $request->docketNo,
        "ForwardingNo"=> $ForwardingNo,
        "Forwarding_Vendor"=> $request->forwarding_vendor_name,
        "Forwarding_Weight"=> $request->forwarding_weight,
        "CreatedBy"=> $UserId]);
        DocketAllocation::where("Docket_No",$request->docketNo)->update(['Status' =>10,'BookDate'=>date("Y-m-d",strtotime($request->forwarding_date))]);
        $docketFile=DocketMaster::leftjoin('forwarding','forwarding.DocketNo','=','docket_masters.Docket_No')
        ->leftjoin('vendor_masters','vendor_masters.id','=','forwarding.Forwarding_Vendor')
        ->leftjoin('users','users.id','=','forwarding.CreatedBy')
        ->leftjoin('employees','employees.user_id','=','users.id')
        ->leftjoin('office_masters','employees.OfficeName','=','office_masters.id')
        ->select('forwarding.ForwardingNo','forwarding.Forwarding_Weight','forwarding.Forwarding_Date','employees.EmployeeName','vendor_masters.VendorName','vendor_masters.VendorCode', 'office_masters.OfficeCode','office_masters.OfficeName')
        ->where('docket_masters.Docket_No',$request->docketNo)
        ->first();
         $string = "<tr><td>3PL FORWARDING</td><td>".date("d-m-Y",strtotime($docketFile->Forwarding_Date))."</td><td><strong>FORWARDING DATE: </strong>".date("d-m-Y",strtotime($docketFile->Forwarding_Date))."<br><strong>FORWARDING NO: </strong>$docketFile->ForwardingNo<br><strong>VENDOR NAME: </strong>$docketFile->VendorCode ~ $docketFile->VendorName <br><strong> FORWARDING WEIGHT:</strong>$docketFile->Forwarding_Weight</td><td>".date('d-m-Y h:i A')."</td><td>".$docketFile->EmployeeName."<br> (".$docketFile->OfficeCode.'~'.$docketFile->OfficeName.")</td></tr>"; 
           Storage::disk('local')->append($request->docketNo, $string);

        echo "Forward successfully";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\Forwarding  $forwarding
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request ,Forwarding $forwarding)
    { 
        //
        $date =[];
        $office = '';
        $OfficeData ='';
        if($request->office){
        $OfficeData = $request->office;
        }
        if($request->formDate){
            $date['formDate']=  date("Y-m-d",strtotime($request->formDate));
        }
        
        if($request->todate){
           $date['todate']=  date("Y-m-d",strtotime($request->todate));
        }

        $Office = OfficeMaster::get();
        $officeParent = Forwarding::leftjoin("docket_masters","docket_masters.Docket_No","=","forwarding.DocketNo")
        ->leftjoin("office_masters","office_masters.id","=","docket_masters.Office_ID")
        ->select(DB::raw("COUNT(docket_masters.Office_ID) as TotalOff"),"docket_masters.Office_ID as OFID" )
        ->where(function($query) use($OfficeData){
            if($OfficeData!=''){
                $query->where("docket_masters.Office_ID",$OfficeData);
            }
        })
        ->where(function($query) use($date){
            if(isset($date['formDate']) &&  isset($date['todate'])){
                $query->whereBetween("forwarding.Forwarding_Date",[$date['formDate'],$date['todate']]);
            }
           })  
        ->groupBy('office_masters.id')->paginate(10);
        return view('Operation.forwarding_register', [
            'title'=>'3D Forwarding',
            'officeParent'=>  $officeParent,
            "Office"=>$Office]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\Forwarding  $forwarding
     * @return \Illuminate\Http\Response
     */
    public function edit(Forwarding $forwarding)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateForwardingRequest  $request
     * @param  \App\Models\Operation\Forwarding  $forwarding
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateForwardingRequest $request, Forwarding $forwarding)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\Forwarding  $forwarding
     * @return \Illuminate\Http\Response
     */
    public function destroy(Forwarding $forwarding)
    {
        //
    }

    public function getDocketDetails(Request $request){
      $details =  DocketMaster::with("customerDetails","DocketProductDetails","DocketManyInvoiceDetails","DocketAllocationDetail")
      ->where("Docket_No", $request->Docket)->first();
      if(!empty($details)){
        echo json_encode(array("Status"=>"true","datas"=>$details));
      }
      else{
        echo json_encode(array("Status"=>"false","datas"=>[]));
      }
    }

    public function ForwardingDetailedReport($Office ,$penging ='',Request $request){
       // $Office 
       $df = '';
       $dt ='';
       if($request->get('df')){
       $df =  $request->get('df');
       }

       if($request->get('dt')){
        $dt =  $request->get('dt');
       }

       $officeParent = Forwarding::leftjoin("docket_masters","docket_masters.Docket_No","=","forwarding.DocketNo")
       ->leftjoin('docket_allocations','docket_allocations.Docket_No','docket_masters.Docket_No')
       ->leftjoin("office_masters","office_masters.id","=","docket_masters.Office_ID")
       ->leftjoin('docket_product_details','docket_product_details.Docket_Id','=','docket_masters.id')
       ->leftjoin('pincode_masters as ORGPIN','docket_masters.Origin_Pin','ORGPIN.id')
        ->leftjoin('pincode_masters as DESTPIN','docket_masters.Dest_Pin','DESTPIN.id')
        ->leftjoin('cities as ORGCITY','ORGPIN.city','ORGCITY.id')
        ->leftjoin('cities as DESTCITY','DESTPIN.city','DESTCITY.id')
        ->leftjoin('customer_masters','docket_masters.Cust_Id','customer_masters.id')
       ->select("docket_masters.Office_ID as OFID","ORGCITY.CityName as ORGCityName","ORGCITY.Code as ORGCode" ,
       "DESTCITY.CityName as DESTCityName","DESTCITY.Code as DESTCityCode","docket_product_details.Qty","docket_product_details.Actual_Weight",
       "docket_product_details.Charged_Weight","forwarding.*"
       ,"customer_masters.CustomerCode","customer_masters.CustomerName","docket_masters.Docket_No","office_masters.OfficeCode","office_masters.OfficeName")
       ->where(function($query) use($Office){
           if($Office!='' && $Office!=0){
               $query->where("docket_masters.Office_ID",$Office);
           }
       })
       ->where(function($query) use($df,$dt){
           if($df!='' &&  $dt!=''){
               $query->whereBetween("forwarding.Forwarding_Date",[$df,$dt]);
           }
          })  
          ->where(function($query) use($penging){
            if($penging!=''){
                $query->where("docket_allocations.Status","!=","8");
            }
    })
        ->groupBy("docket_masters.Docket_No")
       ->paginate(10);
       return view('Operation.forwarding_registerDetails', [
        'title'=>'3D Forwarding Details',
        'officeParent'=>$officeParent]);
    }

    public function ForwardingDetailedRTOReport($Office ,Request $request){
        $df = '';
        $dt ='';
        if($request->get('df')){
        $df =  $request->get('df');
        }
 
        if($request->get('dt')){
         $dt =  $request->get('dt');
        }
        $officeParent = Forwarding::join("RTO_Trans","RTO_Trans.Initial_Docket","forwarding.DocketNo")
        ->leftjoin('ndr_masters','ndr_masters.id','RTO_Trans.Reason')
        ->leftjoin("docket_masters","docket_masters.Docket_No","=","RTO_Trans.Initial_Docket")
        ->leftjoin("office_masters","office_masters.id","=","docket_masters.Office_ID")
        ->leftjoin('docket_product_details','docket_product_details.Docket_Id','=','docket_masters.id')
       ->leftjoin('pincode_masters as ORGPIN','docket_masters.Origin_Pin','ORGPIN.id')
        ->leftjoin('pincode_masters as DESTPIN','docket_masters.Dest_Pin','DESTPIN.id')
        ->leftjoin('cities as ORGCITY','ORGPIN.city','ORGCITY.id')
        ->leftjoin('cities as DESTCITY','DESTPIN.city','DESTCITY.id')
        ->leftjoin('customer_masters','docket_masters.Cust_Id','customer_masters.id')

        ->select("docket_masters.Office_ID as OFID","ORGCITY.CityName as ORGCityName","ORGCITY.Code as ORGCode" ,
        "DESTCITY.CityName as DESTCityName","DESTCITY.Code as DESTCityCode","docket_product_details.Qty","docket_product_details.Actual_Weight",
        "docket_product_details.Charged_Weight","forwarding.*"
        ,"customer_masters.CustomerCode","customer_masters.CustomerName",
        "ndr_masters.ReasonDetail","RTO_Trans.RTO_Date","office_masters.OfficeCode","office_masters.OfficeName")
        ->where(function($query) use($Office){
            if($Office!='' && $Office!=0){
                $query->where("docket_masters.Office_ID",$Office);
            }
        })
        ->where(function($query) use($df,$dt){
            if($df!='' &&  $dt!=''){
                $query->whereBetween("forwarding.Forwarding_Date",[$df,$dt]);
            }
           })  
        ->groupBy("docket_masters.Docket_No")
        ->paginate(10);
        return view('Operation.forwarding_RTODetails', [
            'title'=>'3D Forwarding Details',
            'officeParent'=>$officeParent]);
    }

    public function ForwardingDetailedNDRReport($Office ,Request $request){
        $df = '';
        $dt ='';
        if($request->get('df')){
        $df =  $request->get('df');
        }
 
        if($request->get('dt')){
         $dt =  $request->get('dt');
        }
        $officeParent = Forwarding::join("NDR_Trans","NDR_Trans.Docket_No","forwarding.DocketNo")
        ->leftjoin('ndr_masters','ndr_masters.id','NDR_Trans.NDR_Reason')
        ->leftjoin("docket_masters","docket_masters.Docket_No","=","NDR_Trans.Docket_No")
        ->leftjoin("office_masters","office_masters.id","=","docket_masters.Office_ID")
        ->leftjoin('docket_product_details','docket_product_details.Docket_Id','=','docket_masters.id')
       ->leftjoin('pincode_masters as ORGPIN','docket_masters.Origin_Pin','ORGPIN.id')
        ->leftjoin('pincode_masters as DESTPIN','docket_masters.Dest_Pin','DESTPIN.id')
        ->leftjoin('cities as ORGCITY','ORGPIN.city','ORGCITY.id')
        ->leftjoin('cities as DESTCITY','DESTPIN.city','DESTCITY.id')
        ->leftjoin('customer_masters','docket_masters.Cust_Id','customer_masters.id')

        ->select("docket_masters.Office_ID as OFID","ORGCITY.CityName as ORGCityName","ORGCITY.Code as ORGCode" ,
        "DESTCITY.CityName as DESTCityName","DESTCITY.Code as DESTCityCode","docket_product_details.Qty","docket_product_details.Actual_Weight",
        "docket_product_details.Charged_Weight","forwarding.*"
        ,"customer_masters.CustomerCode","customer_masters.CustomerName",
        "ndr_masters.ReasonDetail","NDR_Trans.NDR_Date","office_masters.OfficeCode","office_masters.OfficeName")
        ->where(function($query) use($Office){
            if($Office!='' && $Office!=0){
                $query->where("docket_masters.Office_ID",$Office);
            }
        })
        ->where(function($query) use($df,$dt){
            if($df!='' &&  $dt!=''){
                $query->whereBetween("forwarding.Forwarding_Date",[$df,$dt]);
            }
           })  
        ->groupBy("docket_masters.Docket_No")
        ->paginate(10);
        return view('Operation.forwarding_NDRDetails', [
            'title'=>'3D Forwarding Details',
            'officeParent'=>$officeParent]);
    }

    public function ForwardingDetailedDELIVEREDReport($Office ,Request $request){
        $df = '';
       $dt ='';
       if($request->get('df')){
       $df =  $request->get('df');
       }

       if($request->get('dt')){
        $dt =  $request->get('dt');
       }

       $officeParent = Forwarding::join("docket_masters","docket_masters.Docket_No","=","forwarding.DocketNo")
       ->leftjoin('docket_allocations','docket_allocations.Docket_No','docket_masters.Docket_No')
       ->leftjoin("office_masters","office_masters.id","=","docket_masters.Office_ID")
       ->leftjoin('docket_product_details','docket_product_details.Docket_Id','=','docket_masters.id')
       ->leftjoin('pincode_masters as ORGPIN','docket_masters.Origin_Pin','ORGPIN.id')
        ->leftjoin('pincode_masters as DESTPIN','docket_masters.Dest_Pin','DESTPIN.id')
        ->leftjoin('cities as ORGCITY','ORGPIN.city','ORGCITY.id')
        ->leftjoin('cities as DESTCITY','DESTPIN.city','DESTCITY.id')
        ->leftjoin('customer_masters','docket_masters.Cust_Id','customer_masters.id')
       ->select("docket_masters.Office_ID as OFID","ORGCITY.CityName as ORGCityName","ORGCITY.Code as ORGCode" ,
       "DESTCITY.CityName as DESTCityName","DESTCITY.Code as DESTCityCode","docket_product_details.Qty","docket_product_details.Actual_Weight",
       "docket_product_details.Charged_Weight","forwarding.*"
       ,"customer_masters.CustomerCode","customer_masters.CustomerName","docket_allocations.BookDate",
       "office_masters.OfficeCode","office_masters.OfficeName")
       ->where(function($query) use($Office){
           if($Office!='' && $Office!=0){
               $query->where("docket_masters.Office_ID",$Office);
           }
       })
       ->where(function($query) use($df,$dt){
           if($df!='' &&  $dt!=''){
               $query->whereBetween("forwarding.Forwarding_Date",[$df,$dt]);
           }
          })  
       ->where("docket_allocations.Status","=","8")
       ->groupBy("docket_masters.Docket_No")
       ->paginate(10);
       return view('Operation.forwarding_DeliveredDetails', [
        'title'=>'3D Forwarding Details',
        'officeParent'=>$officeParent]);
    }
    


}
