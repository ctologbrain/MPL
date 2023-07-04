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
        date_default_timezone_set('Asia/Kolkata');
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
        DocketAllocation::where("Docket_No",$request->docketNo)->update(['Status' =>10,'BookDate'=>date("Y-m-d",strtotime($request->forwarding_date)), 'Updated_By'=>$UserId]);
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
        $bulkdf='';
        $bulkdt='';
        if($request->office){
        $OfficeData = $request->office;
        }
        if($request->formDate){
            $bulkdf= $date['formDate']=  date("Y-m-d",strtotime($request->formDate));
        }
        
        if($request->todate){
            $bulkdt = $date['todate']=  date("Y-m-d",strtotime($request->todate));
        }

        $Office = OfficeMaster::get();
        $officeParent = Forwarding::leftjoin("docket_masters","docket_masters.Docket_No","=","forwarding.DocketNo")
        ->leftjoin('employees','employees.user_id','=','forwarding.CreatedBy')
        ->leftjoin('office_masters','employees.OfficeName','=','office_masters.id')
        ->select(DB::raw("COUNT(office_masters.id) as TotalOff"),"office_masters.id as OFID" )
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
        if($request->get('submit')=="Download"){
           
            return $this->ForwardingDownload( $officeParent,  $OfficeData,  $bulkdf,$bulkdt);
        }
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
       ->leftjoin('employees','employees.user_id','=','forwarding.CreatedBy')
        ->leftjoin('office_masters','employees.OfficeName','=','office_masters.id')
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
               $query->where("office_masters.id",$Office);
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
        ->leftjoin('employees','employees.user_id','=','forwarding.CreatedBy')
        ->leftjoin('office_masters','employees.OfficeName','=','office_masters.id')
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
        "ndr_masters.ReasonDetail","RTO_Trans.RTO_Date","office_masters.OfficeCode","office_masters.OfficeName","docket_masters.Docket_No")
        ->where(function($query) use($Office){
            if($Office!='' && $Office!=0){
                $query->where("office_masters.id",$Office);
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
        ->leftjoin('employees','employees.user_id','=','forwarding.CreatedBy')
        ->leftjoin('office_masters','employees.OfficeName','=','office_masters.id')
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
        "ndr_masters.ReasonDetail","NDR_Trans.NDR_Date","office_masters.OfficeCode","office_masters.OfficeName","docket_masters.Docket_No")
        ->where(function($query) use($Office){
            if($Office!='' && $Office!=0){
                $query->where("office_masters.id",$Office);
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
       ->leftjoin('employees','employees.user_id','=','forwarding.CreatedBy')
       ->leftjoin('office_masters','employees.OfficeName','=','office_masters.id')
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
       "office_masters.OfficeCode","office_masters.OfficeName","docket_masters.Docket_No")
       ->where(function($query) use($Office){
           if($Office!='' && $Office!=0){
            $query->where("office_masters.id",$Office);
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

    public function ForwardingDownload( $officeParent,  $OfficeData='',  $bulkdf='',$bulkdt ='')
    {
        $timestamp = date('Y-m-d');
        $filename = 'TopayCollectionDashboard' . $timestamp . '.xls';
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$filename\"");
        echo '<body style="border: 0.1pt solid #000"> ';
        echo '<table class="table table-bordered table-striped table-actions">
             <thead class="#fff">
          <tr class="main-title text-dark">                                     
          <th class="p-1 text-center">SL#</th>
          <th class="p-1 text-start" style="min-width: 150px;">Office Name</th>
          <th class="p-1 text-start" style="min-width: 120px;">Forwarding Date</th>
           <th class="p-1 text-start" style="min-width: 250px;">3PL Vendor Name</th>
           <th class="p-1 text-end" style="min-width: 100px;">Total Dockets</th>
           <th class="p-1 text-end" style="min-width: 150px;">Forwarding Wt</th>
           <th class="p-1 text-end" >NDR</th>
           <th class="p-1 text-end" >RTO</th>
           <th class="p-1 text-end">Delivered</th>
           <th class="p-1 text-end">Pending</th></tr>
           </thead> <tbody>'; 

           foreach($officeParent as $val){
                $OfficeData ='';
                $date =[];
                $bulkdf='';
                $bulkdt ='';

                $GrandTotalDock=0;
                $GrandTotalNDR=0;
                $GrandTotalRTO=0;
                $GrandTOTALDel=0;
                $GrandTOTALWeight =0;
                $GrandTOTALPending =0;


           $forwardingOffice =  DB::table("forwarding")->leftjoin("vendor_masters","vendor_masters.id","=","forwarding.Forwarding_Vendor")
           ->leftjoin("RTO_Trans","RTO_Trans.Initial_Docket","=","forwarding.DocketNo")
           ->leftjoin("NDR_Trans","NDR_Trans.Docket_No","=","forwarding.DocketNo")
           ->leftjoin("docket_masters","docket_masters.Docket_No","=","forwarding.DocketNo")
           ->leftjoin("docket_allocations","docket_masters.Docket_No","=","docket_allocations.Docket_No")
           ->leftjoin('employees','employees.user_id','=','forwarding.CreatedBy')
           ->leftjoin('office_masters','employees.OfficeName','=','office_masters.id')
           ->select("office_masters.OfficeCode","office_masters.OfficeName","office_masters.id as OFID",
           "forwarding.Forwarding_Date", "forwarding.Forwarding_Weight","vendor_masters.VendorCode"
           ,"vendor_masters.VendorName", DB::raw("COUNT(DISTINCT forwarding.DocketNo) as TotDock"),
           DB::raw("SUM(forwarding.Forwarding_Weight) as TotWeight"),
           DB::raw("COUNT(DISTINCT NDR_Trans.Docket_No) as TotNDR"),
           DB::raw("COUNT(DISTINCT RTO_Trans.Initial_Docket) as TotRTO"),
           DB::raw("COUNT(DISTINCT CASE WHEN docket_allocations.Status=8 THEN docket_allocations.Docket_No END ) as  TOTDel") )
               //with("vendorDetails","DocketDetails")->withCount("DocketDetails as TotDock")
           ->where(function($query) use($OfficeData){
               if($OfficeData!=''){
                   $query->where("office_masters.id",$OfficeData);
               }
           })
           ->where(function($query) use($date){
               if(isset($date['formDate']) &&  isset($date['todate'])){
                   $query->whereBetween("forwarding.Forwarding_Date",[$date['formDate'],$date['todate']]);
               }
           })    
           ->where("office_masters.id",$val->OFID)
           ->orderBy("office_masters.OfficeName","ASC")
           ->groupBy(["office_masters.id","forwarding.Forwarding_Date"])
           ->get();
           $TotalDock=0;
           $TotalNDR=0;
           $TotalRTO=0;
           $TOTALDel=0;
           $TOTALWeight =0;
           $TOTALPending =0;
           $l=0;
           $i=0;
           foreach($forwardingOffice as $key){
            $i++;
            $TotalDock += $key->TotDock; 
            $TotalNDR += $key->TotNDR;
            $TotalRTO += $key->TotRTO;
            $TOTALDel += $key->TOTDel;
            $TOTALWeight += $key->TotWeight;
            $TOTALPending += ($key->TotDock-$key->TOTDel);
            $dt = $key->Forwarding_Date;
            $df= $key->Forwarding_Date;
            echo '<tr>'; 
            echo   '<td>'.$i.'</td>';
          
                echo   '<td>'.$key->OfficeName .'</td>';
                echo   '<td>'.$key->Forwarding_Date.'</td>'; 
                echo   '<td>'.$key->VendorName.'</td>';
                echo   '<td>'.$key->TotDock .'</td>';
                echo   '<td>'.$key->TotWeight .'</td>';
                echo   '<td>'.$key->TotNDR .'</td>';
                echo   '<td>'.$key->TotRTO .'</td>';
                echo   '<td>'.$key->TOTDel .'</td>';
                echo   '<td>'.$key->TOTDel .'</td>';
                echo  '</tr>'; 
                $TotalDock += $key->TotDock; 
                $TotalNDR += $key->TotNDR;
                $TotalRTO += $key->TotRTO;
                $TOTALDel += $key->TOTDel;
                $TOTALWeight += $key->TotWeight;
                $TOTALPending += ($key->TotDock-$key->TOTDel);
                $dt = $key->Forwarding_Date;
                $df= $key->Forwarding_Date;
           }

           echo '<tr>'; 
            echo   '<td></td>';
            echo   '<td> <strong>TOTAL: </strong></td>';
            echo   '<td></td>';
            echo   '<td></td>';
            echo   '<td> <strong>'.$TotalDock.' </strong> </td>';
            echo   '<td> <strong>'.$TOTALWeight.' </strong> </td>';
            echo   '<td> <strong>'.$TotalNDR.' </strong> </td>';
            echo   '<td> <strong>'.$TotalRTO.' </strong> </td>';
            echo   '<td> <strong>'.$TOTALDel.' </strong> </td>';
            echo   '<td> <strong>'.$TOTALPending.' </strong> </td></tr>';

            $GrandTotalDock += $TotalDock;
            $GrandTotalNDR +=  $TotalNDR;
            $GrandTotalRTO +=  $TotalRTO;
            $GrandTOTALDel +=  $TOTALDel;
            $GrandTOTALWeight +=  $TOTALWeight;
            $GrandTOTALPending +=  $TOTALPending;
        }

            echo '<tr>'; 
            echo   '<td></td>';
            echo   '<td> <strong>Grand TOTAL: </strong></td>';
            echo   '<td></td>';
            echo   '<td></td>';
            echo   '<td> <strong>'.$GrandTotalDock.' </strong> </td>';
            echo   '<td> <strong>'.$GrandTotalNDR.' </strong> </td>';
            echo   '<td> <strong>'.$GrandTotalRTO.' </strong> </td>';
            echo   '<td> <strong>'.$GrandTOTALDel.' </strong> </td>';
            echo   '<td> <strong>'.$GrandTOTALWeight.' </strong> </td>';
            echo   '<td> <strong>'.$GrandTOTALPending.' </strong> </td></tr>';
            echo   '</tbody>
            </table>';
           exit(); 
    }
    


}
