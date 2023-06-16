<?php

namespace App\Http\Controllers\Operation;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoutePlanningRequest;
use App\Http\Requests\UpdateRoutePlanningRequest;
use App\Models\Operation\RoutePlanning;
use App\Models\OfficeSetup\city;
use Illuminate\Http\Request;
use App\Models\Operation\DocketMaster;
use DB;
class RoutePlanningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $city=city::get();
        return view('Operation.RoutePlanning_Org_Dest', [
            'title'=>'ROUTE PLANNING',
            'originCity'=>$city
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
     * @param  \App\Http\Requests\StoreRoutePlanningRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoutePlanningRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\RoutePlanning  $routePlanning
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $source='';
        $dest='';
        if($request->originCity)
        {
            $source=$request->originCity;   
        }
        if($request->DestCity)
        {
            $dest=$request->DestCity;   
        }
        $city=city::where('id',$request->originCity)->first();
       $docetDetails=DocketMaster::
       leftjoin('docket_product_details','docket_product_details.Docket_Id','=','docket_masters.id')
       ->leftjoin('pincode_masters as SourcePinCode','SourcePinCode.id','=','docket_masters.Origin_Pin')
       ->leftjoin('customer_masters','customer_masters.id','=','docket_masters.Cust_Id')
       ->leftjoin('cities','cities.id','=','SourcePinCode.city')
       ->leftjoin('pincode_masters as DestPinCode','DestPinCode.id','=','docket_masters.Dest_Pin')
       ->select('docket_masters.Booking_Date',DB::raw("COUNT(docket_masters.Docket_No) as TotalDocket"),DB::raw("SUM(docket_product_details.Qty) as TotalQty"),DB::raw("SUM(docket_product_details.Actual_Weight) as TotalWight"),'cities.Code','cities.CityName')
       ->wherebetween('docket_masters.Booking_Date',[date("Y-m-d", strtotime($request->formDate)),date("Y-m-d", strtotime($request->todate))])
       ->where(function($query) use($source){
        if($source!=''){
           $query->where("SourcePinCode.city",$source);
        }
       })
       ->where(function($query) use($dest){
        if($dest!=''){
           $query->where("DestPinCode.city",$dest);
        }
       })
       ->groupBy(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"))
       ->get();
       if(!empty($docetDetails->toarray()))
       {
          $html1='';
          $html='<table class="table table-bordered table-centered mb-1 az_report">';
          $html.='<thead><tr class="main-title text-dark text-start">';
          $html.='<tr class="main-title text-dark text-start"><th class="p-1 text-center"><input type="checkbox" class="checkAll" id="checkAll" name=""></th>';
          $html.='<th class="p-1 text-start" style="min-width: 70px;">Scan Date</th>';
          $html.='<th class="p-1 text-end" style="min-width: 30px;">Docket</th>';
          $html.='<th class="p-1 text-end" style="min-width: 40px;">Pcs</th>';
          $html.='<th class="p-1 text-end" style="min-width: 40px;">Weight</th></tr></thead><tbody>';
          foreach($docetDetails as $docketDetails)
          {
            $html.='<tr><td class="p-1 text-center">
            <input type="checkbox" class="checkedBox" value="'.date("Y-m-d", strtotime($docketDetails->Booking_Date)).'" name="Date" id="Date['.date("Y-m-d", strtotime($docketDetails->Booking_Date)).'][check]">   </td>
            <td class="p-1 text-start">'.date("Y-m-d", strtotime($docketDetails->Booking_Date)).'</td>
            <td class="p-1 text-end">'.$docketDetails->TotalDocket.'</td>
            <td class="p-1 text-end">'.$docketDetails->TotalQty.'</td>
            <td class="p-1 text-end">'.$docketDetails->TotalWight.'</td></tr>';
             
          }
          $html.='</tbody></table><div class="col-12 text-center mb-1">
          <a href="javascript:void(0)" class="btn btn-primary" onclick="checkBoxCheck('.$request->originCity.','.$request->DestCity.')">Process</a>
         </div>';
          $html1.="$city->Code~$city->CityName";
        }
        else
        {
            $html='';
            $html1='2';
            $html.='<span class="error"><b>No Data Found</b></span>';
        }
        $datat=array('html1'=>$html1,'html'=>$html);
         echo  json_encode($datat);
      }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\RoutePlanning  $routePlanning
     * @return \Illuminate\Http\Response
     */
    public function edit(RoutePlanning $routePlanning)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoutePlanningRequest  $request
     * @param  \App\Models\Operation\RoutePlanning  $routePlanning
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoutePlanningRequest $request, RoutePlanning $routePlanning)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\RoutePlanning  $routePlanning
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoutePlanning $routePlanning)
    {
        //
    }
    public function TotalDocketDetailsForRouteMap(Request $request)
    {
        $source=$request->origin;
        $dest=$request->dest;
       
        $docetDetails=DocketMaster::
        leftjoin('docket_product_details','docket_product_details.Docket_Id','=','docket_masters.id')
        ->leftjoin('cities as BookingOffice','BookingOffice.id','=','BookingBranch.City_id')
        ->leftjoin('customer_masters','customer_masters.id','=','docket_masters.Cust_Id')
        ->leftjoin('pincode_masters as SourcePinCode','SourcePinCode.id','=','docket_masters.Origin_Pin')
        ->leftjoin('cities','cities.id','=','SourcePinCode.city')
        ->leftjoin('pincode_masters as DestPinCode','DestPinCode.id','=','docket_masters.Dest_Pin')
        ->leftjoin('cities as DestCity','DestCity.id','=','DestPinCode.city')
        ->select('docket_product_details.Qty','docket_product_details.Actual_Weight','docket_masters.Booking_Date','docket_masters.Docket_No','customer_masters.CustomerName','CurrentLoaction.CityName as CurrentCity','BookingOffice.CityName as Bookingofficenew','DestCity.CityName as DestCityName')
        ->whereIn(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),$request->checkboxValues)
        ->where(function($query) use($source){
         if($source!=''){
            $query->where("SourcePinCode.city",$source);
         }
        })
        ->where(function($query) use($dest){
         if($dest!=''){
            $query->where("DestPinCode.city",$dest);
         }
        })
        ->groupBy('docket_masters.Docket_No')
        ->orderBy(DB::raw("DATE_FORMAT(docket_masters.Booking_Date, '%Y-%m-%d')"),'ASC')
        ->get();
      
        return view('Operation.RoutePlanning_Org_Dest_inner', [
            'title'=>'ROUTE PLANNING',
            'docetDetails'=>$docetDetails
             ]);
    }
}
