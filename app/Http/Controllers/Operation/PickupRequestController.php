<?php

namespace App\Http\Controllers\Operation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePickupRequestRequest;
use App\Http\Requests\UpdatePickupRequestRequest;
use App\Models\Operation\PickupRequest;
use Auth; 
use App\Models\Account\CustomerMaster;
use App\Models\CompanySetup\PincodeMaster;
use App\Models\OfficeSetup\employee;
use App\Models\OfficeSetup\ContentsMaster;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PickupRequestExport;
use App\Models\Account\ConsignorMaster;
class PickupRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $UserId=Auth::id();
        $Offcie=employee::select('office_masters.id','office_masters.OfficeCode','office_masters.OfficeName','office_masters.City_id','office_masters.Pincode','employees.id as EmpId')
        ->leftjoin('office_masters','office_masters.id','=','employees.OfficeName')
        ->where('employees.user_id',$UserId)->first();
        $customer = CustomerMaster::get();
        $destpincode=PincodeMaster::select('pincode_masters.*','cities.CityName','cities.Code')
        ->leftjoin('cities','cities.id','=','pincode_masters.city')
        ->get();
        $pincode=PincodeMaster::select('pincode_masters.*','cities.CityName','cities.Code')
        ->leftjoin('cities','cities.id','=','pincode_masters.city')
        ->where('pincode_masters.city',$Offcie->City_id)->get();

        $ContentsMaster = ContentsMaster::get();
        return view('Operation.PickupRequest', [
            'title'=>'Pickup Request',
            'customer'=>$customer,
            'destpincode' =>$destpincode,
            'pincode'=>$pincode,
            'ContentsMaster'=>$ContentsMaster]);
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
     * @param  \App\Http\Requests\StorePickupRequestRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePickupRequestRequest $request)
    {
        // $request->pickup_time;
        $userId = Auth::id();
        $lastId = PickupRequest::orderby("id","DESC")->first();

        if(isset( $lastId->id)){
            $id = $lastId->id+1;
            $orderNo =  "ORDER/".$id;
        }
        else{
            $orderNo =  "ORDER/1";
        }
        $date = date("Y-m-d", strtotime($request->pickup_date)).' '.$request->pickup_time;
        PickupRequest::insert(['OrderNo'=> $orderNo,
        'pickup_date'=>$date ,
        'sale_refere'=>$request->sale_refere,
        'reference_name'=>$request->reference_name,
        'customerId'=>$request->customer_name,
        'bill_to'=>$request->bill_to,
        'store_name'=>$request->store_name,
        'DestId'=>$request->pincode,
        'warehouse_address'=>$request->warehouse_address,
        'pieces'=>$request->pieces,
        'originId'=>$request->origin_pincode,
        'weight'=>$request->weight,
        'contactPersonName'=>$request->contactPersonName,
        'valumetric'=>$request->valumetric,
        'volumetric_weight'=>$request->volumetric_weight,
        'mobile_no'=>$request->mobile_no,
        'contentId'=>$request->content,
        'remark'=>$request->remark,
        'CreatedBy'=> $userId 
        ]);
        echo 'Requested successfully';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\PickupRequest  $pickupRequest
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request ,PickupRequest $pickupRequest)
    {
        //
        $date=[];
        $status ='';
        if($request->fromDate){
            $date['fromDate'] =date("Y-m-d",strtotime($request->fromDate));
        }
        if($request->todate){
            $date['todate'] = date("Y-m-d",strtotime($request->todate));
        }
        if($request->status){
            $status = $request->status;
        }
         $customer =   $request->customer;
       $pickupRequest= PickupRequest::with("CustomerDetails","contentDetails","PincodeOriginDetails","PincodeDestDetails","userDetails","emplDet","BillDet")
        ->where(function($query) use($customer){
            if($customer!=''){
                $query->where("customerId",$customer);
            }
        })
        ->where(function($query) use($date){
            if(isset($date['fromDate']) && isset($date['todate'])){

                $query->whereBetween(DB::raw("DATE_FORMAT(pickup_date,'%Y-%m-%d')"),[$date['fromDate'],$date['todate']]);
            }
        })
        ->where(function($query) use($status){
            if($status!=''){
                $query->where("Status", $status);
            }
        })
        ->paginate(10);
        if($request->get('submit')=='Download')
        {
            return  Excel::download(new PickupRequestExport($status, $date,$customer), 'PickupRequestReports.xlsx');
        }
        $customer = CustomerMaster::get();
        return view('Operation.PickupRequestReport', [
            'title'=>'Pickup Request Report',
            'customer'=>$customer,
            'pickupRequest'=>$pickupRequest]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\PickupRequest  $pickupRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(PickupRequest $pickupRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePickupRequestRequest  $request
     * @param  \App\Models\Operation\PickupRequest  $pickupRequest
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePickupRequestRequest $request, PickupRequest $pickupRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\PickupRequest  $pickupRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(PickupRequest $pickupRequest)
    {
        //
    }
    public function getSelectedConsiner(Request $request){
        $CustId = $request->ConsrId;
        $getAllConsigner =  ConsignorMaster::where("CustId",$CustId)->get();
        $data ='<option value="">--Select-- <option>';
        foreach($getAllConsigner as $key){
            $data .= '<option value="'.$key->id.'">'.$key->ConsignorName.' <option>';
        }
        echo $data;
    }
}
