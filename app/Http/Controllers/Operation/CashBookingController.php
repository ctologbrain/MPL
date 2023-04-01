<?php
namespace App\Http\Controllers\Operation;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreCashBookingRequest;
use App\Http\Requests\UpdateCreditBookingRequest;
use App\Models\Operation\CreditBooking;
use App\Models\Account\Consignee;
use Illuminate\Http\Request;
use Auth;
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
use App\Models\Operation\TariffType;
use App\Models\Account\CustomerPayment;
use App\Models\Operation\DocketProduct;
use App\Models\Operation\RTO;
use Illuminate\Support\Facades\Storage;
class CashBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $UserId=Auth::id();
        $Offcie=employee::select('office_masters.id','office_masters.OfficeCode','office_masters.OfficeName','office_masters.City_id','office_masters.Pincode','employees.id as EmpId')
        ->leftjoin('office_masters','office_masters.id','=','employees.OfficeName')
        ->where('employees.user_id',$UserId)->first();
        $destpincode=PincodeMaster::select('pincode_masters.*','cities.CityName','cities.Code')
        ->leftjoin('cities','cities.id','=','pincode_masters.city')
        ->get();
        $pincode=PincodeMaster::select('pincode_masters.*','cities.CityName','cities.Code')
        ->leftjoin('cities','cities.id','=','pincode_masters.city')
        ->where('pincode_masters.city',$Offcie->City_id)->get();
       $customer=CustomerMaster::select('id','CustomerCode','CustomerName')->get();
       $employee=employee::select('id','EmployeeCode','EmployeeName')->get();
       $DocketBookingType=DocketBookingType::where('Type',2)->get();
       $DevileryType=DevileryType::get();
       $PackingMethod=PackingMethod::get();
       $DocketInvoiceType=DocketInvoiceType::get();
       $DocketProduct=DocketProduct::get();
       return view('Operation.CashBooking', [
            'title'=>'CASH BOOKING',
            'Offcie'=>$Offcie,
            'pincode'=>$pincode,
            'customer'=>$customer,
            'employee'=>$employee,
            'BookingType'=>$DocketBookingType,
            'DevileryType'=>$DevileryType,
            'PackingMethod'=>$PackingMethod,
            'DocketInvoiceType'=>$DocketInvoiceType,
            'destpincode'=>$destpincode,
            'DocketProduct'=>$DocketProduct
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
     * @param  \App\Http\Requests\StoreCashBookingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCashBookingRequest $request)
    {

      if(isset($request->AddConsignor) && $request->AddConsignor !='')
      {
        $checkConsigner=ConsignorMaster::select('id')->where('ConsignorName',$request->consignerName)->first();
        if(isset($checkConsigner->id))
        {
         $consignorId=$checkConsigner->id;
        }
        else
        {
            $consignorId=ConsignorMaster::insertGetId(
                ['CustId' => $request->Customer,'ConsignorName'=>$request->consignerName,'GSTNo'=>$request->CaGstNo,'Mobile'=>$request->CamobNomobNo,'Address1'=>$request->CaAddress]
            );
            } 
       }
      else{
        $consignorId=$request->Consignor;
      }
      $checkConsignee=Consignee::select('id')->where('ConsigneeName',$request->ConsigneeName)->where('ConsrId',$consignorId)->first();
      if(isset($checkConsignee->id) && $checkConsignee->id !='')
      {
        $consigneeId=$checkConsignee->id;
      }
      else{
        $consigneeId=Consignee::insertGetId(
          ['ConsrId' => $consignorId,'ConsigneeName'=>$request->ConsigneeName,'GSTNo'=>$request->CoGStNo,'Mobile'=>$request->CoMobile,'Address1'=>$request->CoAddress]
      );
      }
      if(isset($request->Dacc) && $request->Dacc)
      {
        $IsDacc='YES';
      }
      else{
        $IsDacc='NO';
      }
      if(isset($request->Dod) && $request->Dod)
      {
        $IsDOd='YES';
      }
      else{
        $IsDOd='NO';
      }
      if(isset($request->Dod) && $request->Dod)
      {
        $IsDOd='YES';
      }
      else{
        $IsDOd='NO';
      }
      if(isset($request->Cod) && $request->Cod)
      {
        $IsCod='YES';
      }
      else{
        $IsCod='NO';
      }
      $bookignDate=$request->BookingDate.' '.$request->BookingTime;
        DocketAllocation::where("Docket_No", $request->Docket)->update(['Status' =>4,'BookDate'=>$request->BookingDate]);
        if(isset($request->RtoDocket) && $request->RtoDocket !='')
        {
        RTO::where("Initial_Docket", $request->Docket)->update(['RTO_Docket' =>$request->RtoDocket]);
        }
        if(isset($request->RtoDocket) && $request->RtoDocket !='')
        {
          $docket=$request->RtoDocket;
        }
        else{
          $docket=$request->Docket;
        }
        $Docket=DocketMaster::insertGetId(
        ['Docket_No' => $request->Docket,'Booking_Date'=>$bookignDate,'Office_ID'=>$request->BookingBranchId,'Booking_Type'=>$request->BookingType,'Delivery_Type'=>$request->DeliveryType,'Is_DACC'=>$IsDacc,'Is_DOD'=>$IsDOd,'DODAmount'=>$request->DODAmount,'Is_COD'=>$IsCod,'CODAmount'=>$request->CodAmount,'Ref_No'=>$request->ShipmentNo,'PO_No'=>$request->PoNumber,'Origin_Pin'=>$request->Origin,'Dest_Pin'=>$request->Destination,'Cust_Id'=>$request->Customer,'Mode'=>$request->Mode,'Consigner_Id'=>$consignorId,'Consignee_Id'=>$consigneeId,'Remark'=>$request->remark,'Booked_By'=>$request->BookedBy,'Booked_At'=>date('Y-m-d')]
    );
    $Docket=DocketProductDetails::insert(
        ['Docket_Id' =>$Docket,'D_Product'=>$request->Product,'Packing_M'=>$request->PackingMethod,'Qty'=>$request->Pieces  ,'Is_Volume'=>$request->Volumetric,'Actual_Weight'=>$request->ActualWeight,'Charged_Weight'=>$request->ChargeWeight]
    );
    $docketFile=DocketMaster::
    leftjoin('customer_masters','customer_masters.id','=','docket_masters.Cust_Id')
    ->leftjoin('consignees','consignees.id','=','docket_masters.Consignee_Id')
    ->leftjoin('users','users.id','=','docket_masters.Booked_By')
    ->leftjoin('employees','employees.user_id','=','users.id')
   ->select('customer_masters.CustomerName','consignees.ConsigneeName','docket_masters.Booked_At','employees.EmployeeName','docket_masters.Docket_No')
   ->where('docket_masters.Docket_No',$docket)
   ->first();
    $string = "<tr><td>BOOKED</td><td>$docketFile->Booked_At</td><td><strong>BOKKING DATE: </strong>$docketFile->Booked_At<br><strong>CUSTOMER NAME: </strong>$docketFile->CustomerName<br><strong>CONSIGNEE NAME: </strong>$docketFile->ConsigneeName</td><td>".date('Y-m-d H:i:s')."</td><td>$docketFile->EmployeeName</td></tr>"; 
      Storage::disk('local')->append($docket, $string);
    if(!empty($request->DocketData))
    {
        foreach($request->DocketData as $docketInvoce)
        {
            
        DocketInvoiceDetails::insert(
            ['Docket_Id' =>$Docket,'Type'=>$docketInvoce['InvType'],'Invoice_No'=>$docketInvoce['InvNo'],'Invoice_Date'=>$docketInvoce['InvDate'] ,'Description'=>$docketInvoce['Description'],'Amount'=>$docketInvoce['Amount'],'EWB_No'=>$docketInvoce['EWBNumber'],'EWB_Date'=>$docketInvoce['EWBDate']]
        );  
    }
    }

    if(isset($request->GstApplicableTafiff) && $request->GstApplicableTafiff)
    {
      $GstApplicableTafiff='YES';
    }
    else{
      $GstApplicableTafiff='NO';
    }
    $Docket=TariffType::insert(
        ['Docket_Id' =>$Docket,'is_gst'=>$GstApplicableTafiff,'ReceivedAmount'=>$request->TrafReceivedAmount,'PaymentMethod'=>$request->PaymentMethod,'ReferenceNumber'=>$request->tarffRefNp  ,'Freight'=>$request->TarffFright,'IGST'=>$request->TraffIGST,'CGST'=>$request->TraffCGST,'SGST'=>$request->TraffSGST,'TotalAmount'=>$request->TaffTtotal]
    );

    $request->session()->flash('status', 'Docket Booked Successfully');
    return redirect('CashBooking');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\CashBooking  $cashBooking
     * @return \Illuminate\Http\Response
     */
    public function show(CashBooking $cashBooking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\CashBooking  $cashBooking
     * @return \Illuminate\Http\Response
     */
    public function edit(CashBooking $cashBooking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCashBookingRequest  $request
     * @param  \App\Models\Operation\CashBooking  $cashBooking
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCashBookingRequest $request, CashBooking $cashBooking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\CashBooking  $cashBooking
     * @return \Illuminate\Http\Response
     */
    public function destroy(CashBooking $cashBooking)
    {
        //
    }
    public function getStateUsingOrigin(Request $request)
    {
      $getState=PincodeMaster::select('State')->where('id',$request->Origin)->first();
      if($getState->State==10)
      {
        return 'true';
      }
      else{
        return 'false';
      }
    }
    public function getGstPerCustomer(Request $request)
    {
      $getPer=CustomerPayment::select('cust_id','Road')->where('cust_id',$request->CustId)->first();
       if(isset($getPer->cust_id))
       {
        $gstPer=$getPer->Road;
       }
       else{
        $gstPer=0;
       }
       echo $gstPer;
    }
}
