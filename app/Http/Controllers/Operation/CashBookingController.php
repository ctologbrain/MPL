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
use App\Models\OfficeSetup\ContentsMaster;
use App\Models\Operation\VolumetricCalculation; 
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
        $Offcie=employee::select('office_masters.id','office_masters.OfficeCode','office_masters.OfficeName','office_masters.State_id','office_masters.Pincode','employees.id as EmpId')
        ->leftjoin('office_masters','office_masters.id','=','employees.OfficeName')
        ->where('employees.user_id',$UserId)
        ->where("office_masters.Is_Active","Yes")->first();
        
       $customer=CustomerMaster::leftjoin("officecustmappping","officecustmappping.CustomerId","customer_masters.id")->select('customer_masters.id','customer_masters.CustomerCode','customer_masters.CustomerName')
       ->where('officecustmappping.OfficeId', $Offcie->id)
       ->where("customer_masters.Active","Yes")->get();
       $employee=employee::select('id','EmployeeCode','EmployeeName')->where("Is_Active","Yes")->get();
       $DocketBookingType=DocketBookingType::where('Type',2)->get();
       $DevileryType=DevileryType::get();
       $PackingMethod=PackingMethod::get();
       $DocketInvoiceType=DocketInvoiceType::get();
       $DocketProduct=DocketProduct::get();
       $contents = ContentsMaster::where("Is_Active","Yes")->get();
       return view('Operation.CashBooking', [
            'title'=>'CASH BOOKING',
            'Offcie'=>$Offcie,
          
            'customer'=>$customer,
            'employee'=>$employee,
            'BookingType'=>$DocketBookingType,
            'DevileryType'=>$DevileryType,
            'PackingMethod'=>$PackingMethod,
            'DocketInvoiceType'=>$DocketInvoiceType,
           
            'DocketProduct'=>$DocketProduct,
            'contents'=> $contents
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
      $UserId=Auth::id();
      date_default_timezone_set('Asia/Kolkata');
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
      $bookignDate=date("Y-m-d",strtotime($request->BookingDate)).' '.$request->BookingTime;
        DocketAllocation::where("Docket_No", $request->Docket)->update(['Status' =>4,'BookDate'=>date("Y-m-d",strtotime($request->BookingDate)), 'Updated_By'=>$UserId]);
        $docket=$request->Docket;
          $DocketID=DocketMaster::insertGetId(
        ['Docket_No' => $request->Docket,'Booking_Date'=>$bookignDate,'Office_ID'=>$request->BookingBranchId,'Booking_Type'=>$request->BookingType,'Delivery_Type'=>$request->DeliveryType,'Is_DACC'=>$IsDacc,'Is_DOD'=>$IsDOd,'DODAmount'=>$request->DODAmount,'Is_COD'=>$IsCod,'CODAmount'=>$request->CodAmount,'Ref_No'=>$request->ShipmentNo,'PO_No'=>$request->PoNumber,'Origin_Pin'=>$request->Origin,'Dest_Pin'=>$request->Destination,'Cust_Id'=>$request->Customer,'Mode'=>$request->Mode,'Consigner_Id'=>$consignorId,'Consignee_Id'=>$consigneeId,'Remark'=>$request->remark,'Booked_By'=>$request->BookedBy,'Booked_At'=>date('Y-m-d')]
    );
    $Docket=DocketProductDetails::insert(
        ['Docket_Id' =>$DocketID,'D_Product'=>$request->Product,'Packing_M'=>$request->PackingMethod,'Qty'=>$request->Pieces  ,'Is_Volume'=>$request->Volumetric,'Actual_Weight'=>$request->ActualWeight,'Charged_Weight'=>$request->ChargeWeight,"VolumetricWeight" =>$request->VolumetricWeight]
    );
   
    if(!empty($request->DocketData))
    {
        foreach($request->DocketData as $docketInvoce)
        {
            
        DocketInvoiceDetails::insert(
            ['Docket_Id' =>$DocketID,'Type'=>$docketInvoce['InvType'],'Invoice_No'=>$docketInvoce['InvNo'],'Invoice_Date'=>date("Y-m-d",strtotime($docketInvoce['InvDate'])) ,'Description'=>$docketInvoce['Description'],'Amount'=>$docketInvoce['Amount'],'EWB_No'=>$docketInvoce['EWBNumber'],'EWB_Date'=>date("Y-m-d",strtotime($docketInvoce['EWBDate']))]
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
        ['Docket_Id' =>$DocketID,'is_gst'=>$GstApplicableTafiff,'ReceivedAmount'=>$request->TrafReceivedAmount,'PaymentMethod'=>$request->PaymentMethod,'ReferenceNumber'=>$request->tarffRefNp  ,'Freight'=>$request->TarffFright,'IGST'=>$request->TraffIGST,'CGST'=>$request->TraffCGST,'SGST'=>$request->TraffSGST,'TotalAmount'=>$request->TaffTtotal]
    );
    VolumetricCalculation::where('Docket_Id',$request->Docket)->update(['did'=>$DocketID]);
    $docketFile=DocketMaster::
    leftjoin('customer_masters','customer_masters.id','=','docket_masters.Cust_Id')
    ->leftjoin('consignees','consignees.id','=','docket_masters.Consignee_Id')
    ->leftjoin('employees','employees.id','=','docket_masters.Booked_By')
    ->leftjoin('office_masters','employees.OfficeName','=','office_masters.id')
   ->select('customer_masters.CustomerName','consignees.ConsigneeName','docket_masters.Booked_At','docket_masters.Booking_Date' ,'employees.EmployeeName','docket_masters.Docket_No','office_masters.OfficeCode','office_masters.OfficeName')
   ->where('docket_masters.Docket_No',$docket)
   ->first();
    $string = "<tr><td>BOOKED</td><td>".date("d-m-Y",strtotime($docketFile->Booking_Date))."</td><td><strong>BOOKING DATE: </strong>".date("d-m-Y",strtotime($docketFile->Booking_Date))."<br><strong>CUSTOMER NAME: </strong>$docketFile->CustomerName<br><strong>CONSIGNEE NAME: </strong>$docketFile->ConsigneeName</td><td>".date('d-m-Y h:i A')."</td><td>".$docketFile->EmployeeName."<br> (".$docketFile->OfficeCode.'~'.$docketFile->OfficeName.")</td></tr>"; 
      Storage::disk('local')->append($docket, $string);
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
