<?php

namespace App\Http\Controllers\Account;

use App\Http\Requests\StoreSpotRateBookingRequest;
use App\Http\Requests\UpdateSpotRateBookingRequest;
use App\Models\Account\SpotRateBooking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Account\CustomerMaster;
use App\Models\OfficeSetup\OfficeMaster;
use App\Models\OfficeSetup\city;
use App\Models\Vendor\VendorMaster;
use App\Models\Stock\DocketAllocation;
use App\Models\Operation\DocketMaster;
class SpotRateBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $origin = city::get();
        $dest= '';
        $customer =  CustomerMaster::get();
        $vendor = VendorMaster::get();
        $office = OfficeMaster::get();
        return view('Account.spotRateBooking', [
            'title'=>'DASHBOARD',
            'origin'=> $origin,
            'customer'=>$customer,
            'vendor'=>$vendor,
            'office'=>$office
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
     * @param  \App\Http\Requests\StoreSpotRateBookingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpotRateBookingRequest $request)
    {
        //
        $userId = Auth::id();
      $success=  SpotRateBooking::insertGetId(['DocketNo'=> $request->docketNo , 
        'OfficeID'=> $request->booking_branch,
        'Rate_For'=> $request->rate_for,
        'Customer'=> $request->customer_name,
        'Vendor'=> $request->vendor_name,
        'Origin'=> $request->origin,
        'Destination'=> $request->destination,
        'ValidtTill'=> date("d-m-Y", strtotime($request->valid_up_to)),
        'Time'=> $request->time,
        'Pieces'=> $request->pieces,
        'Weight'=> $request->weight,
        'Remarks'=> $request->remark,
        'GSTPercent'=>$request->gst,
        'Rate'=>$request->rate,
        'Received_Amount'=>$request->recieved_amt,
        'Freight'=>$request->freight,
        'Taxable_Amount'=>$request->taxable_amt,
        'IGST'=>$request->igst,
        'CGST'=>$request->cgst,
        'SGST'=>$request->sgst,
        'Total_amount'=>$request->total_amt,
        'CreatedBy'=> $userId]);  
        DocketAllocation::where("Docket_No",$request->docketNo)->update(["Status"=>11,"BookDate" =>date("Y-m-d")]);
    
        $docketFile=SpotRateBooking::leftjoin('customer_masters','customer_masters.id','=','Spot_Rate_Booking.Customer')
        ->leftjoin('office_masters','Spot_Rate_Booking.OfficeID','=','office_masters.id')
        ->leftjoin('vendor_masters','Spot_Rate_Booking.Vendor','=','vendor_masters.id')

        ->leftjoin('cities as OriginCity','Spot_Rate_Booking.Origin','=','vendor_masters.id')
        ->leftjoin('cities as DestCity','Spot_Rate_Booking.Destination','=','vendor_masters.id')

        ->leftjoin('employees','employees.user_id','=','Spot_Rate_Booking.CreatedBy')
        ->leftjoin('office_masters as OFM','employees.OfficeName','=','OFM.id')
        ->select('customer_masters.CustomerName','vendor_masters.VendorName','vendor_masters.VendorCode','Spot_Rate_Booking.Created_At as date','employees.EmployeeName','Spot_Rate_Booking.DocketNo','office_masters.OfficeCode','office_masters.OfficeName','OFM.OfficeCode as OffCode','OFM.OfficeName as OffName','Spot_Rate_Booking.*','customer_masters.CustomerCode',
        'OriginCity.CityName as OrgCity','DestCity.CityName as DesCity')
        ->where('Spot_Rate_Booking.DocketNo',$request->docketNo)
        ->first();
        $string = "<tr><td>SPOT RATE BOOKING</td><td>".date("d-m-Y",strtotime($docketFile->date))."</td><td><strong>BOOKING BRANCH: </strong>".$docketFile->OfficeName."<br><strong>RATE FOR: </strong>$docketFile->Rate_For<br><strong>CUSTOMER NAME: </strong>$docketFile->CustomerCode ~$docketFile->CustomerName <br> <strong>ORIGIN: </strong>  $docketFile->OrgCity <strong>DESTINATION: </strong> $docketFile->DesCity <br><strong>PCS: </strong>  $docketFile->Pieces <strong>WEIGHT: </strong> $docketFile->Weight <br> <strong>RECEIVED AMOUNT: </strong> $docketFile->Received_Amount<br> <strong>FREIGHT: </strong> $docketFile->Freight <strong>TAXABLE AMOUNT: </strong>$docketFile->Taxable_Amount  <br>   <strong>CGST: </strong>$docketFile->CGST    <strong>SGST: </strong> $docketFile->SGST  <strong>IGST: </strong>$docketFile->IGST <br> <strong>TOTAL AMOUNT: </strong> $docketFile->Total_amount </td><td>".date('d-m-Y h:i A')."</td><td>".$docketFile->EmployeeName."<br> (".$docketFile->OffCode.'~'.$docketFile->OffName.")</td></tr>"; 
        Storage::disk('local')->append($request->docketNo, $string);
        if( $success){
             echo "SPOT RATE Booked Successfully";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account\SpotRateBooking  $spotRateBooking
     * @return \Illuminate\Http\Response
     */
    public function show(SpotRateBooking $spotRateBooking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account\SpotRateBooking  $spotRateBooking
     * @return \Illuminate\Http\Response
     */
    public function edit(SpotRateBooking $spotRateBooking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSpotRateBookingRequest  $request
     * @param  \App\Models\Account\SpotRateBooking  $spotRateBooking
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpotRateBookingRequest $request, SpotRateBooking $spotRateBooking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account\SpotRateBooking  $spotRateBooking
     * @return \Illuminate\Http\Response
     */
    public function destroy(SpotRateBooking $spotRateBooking)
    {
        //
    }

    public  function SpotRateBookingCheck(Request $req){
       $result= DocketAllocation::where("Docket_No",$req->Docket)->first();
        if(empty($result)){
            echo json_encode(array("status"=>"false"));
        }
    }
}
