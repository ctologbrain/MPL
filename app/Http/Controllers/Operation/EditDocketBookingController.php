<?php

namespace App\Http\Controllers\Operation;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreEditDocketBookingRequest;
use App\Http\Requests\UpdateEditDocketBookingRequest;
use App\Models\Operation\EditDocketBooking;
use Illuminate\Http\Request;
use Auth;

use App\Models\OfficeSetup\employee;
use App\Models\Stock\DocketAllocation;
use App\Models\Operation\DocketProductDetails;
use App\Models\Operation\DocketInvoiceDetails;
use App\Models\Operation\DocketMaster;
use App\Models\Operation\DocketBookingType;

use App\Models\CompanySetup\PincodeMaster;
use App\Models\Account\CustomerMaster;
use App\Models\Operation\DevileryType;
use App\Models\Operation\PackingMethod;
use App\Models\Operation\DocketInvoiceType;
use App\Models\Operation\DocketProduct;

use App\Models\Operation\TariffType;
use App\Models\Account\Consignee;
use App\Models\Account\ConsignorMaster;
use App\Models\OfficeSetup\ContentsMaster;
use Illuminate\Support\Facades\Storage;

class EditDocketBookingController extends Controller
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
        $Offcie=employee::select('office_masters.id','office_masters.OfficeCode','office_masters.OfficeName','office_masters.State_id','office_masters.Pincode','employees.id as EmpId')
        ->leftjoin('office_masters','office_masters.id','=','employees.OfficeName')
        ->where('employees.user_id',$UserId)
        ->where("office_masters.Is_Active","Yes")->first();
        
       
         $customer=CustomerMaster::select('id','CustomerCode','CustomerName')->where("customer_masters.Active","Yes")->get();
       $employee=employee::select('id','EmployeeCode','EmployeeName')->where("Is_Active","Yes")->get();

       $DevileryType=DevileryType::get();
       $PackingMethod=PackingMethod::get();
       $DocketInvoiceType=DocketInvoiceType::get();
       $DocketProduct=DocketProduct::get();
        $DocketBookingType = DocketBookingType::get();
        $pincode=PincodeMaster::select('pincode_masters.*','cities.CityName','cities.Code')
        ->leftjoin('cities','cities.id','=','pincode_masters.city')
        ->where("pincode_masters.Is_Active","Yes")->where('pincode_masters.State',$Offcie->State_id)->get();

        $Destpincode=PincodeMaster::select('pincode_masters.*','cities.CityName','cities.Code')
        ->where("pincode_masters.Is_Active","Yes")->leftjoin('cities','cities.id','=','pincode_masters.city')->get();

        $contents = ContentsMaster::where("Is_Active","Yes")->get();
        return view('Operation.EditDocketBooking', [
            'title'=>'EDIT DOCKET BOOKING',
            'Offcie'=>$Offcie,
             'customer'=>$customer,
            'employee'=>$employee,
            'BookingType'=>$DocketBookingType,
            'DevileryType'=>$DevileryType,
            'PackingMethod'=>$PackingMethod,
            'Pincode'=>$pincode,
            "Destpincode"=>$Destpincode,
            'DocketInvoiceType'=>$DocketInvoiceType,
            'DocketProduct'=>$DocketProduct,
             'contents'=>$contents
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
     * @param  \App\Http\Requests\StoreEditDocketBookingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEditDocketBookingRequest $request)
    {
        //
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
      $bookignDate=$request->BookingDate.' '.$request->BookingTime;
        // DocketAllocation::where("Docket_No", $request->Docket)->update(['Status' =>4,'BookDate'=>$request->BookingDate]);
        // if(isset($request->RtoDocket) && $request->RtoDocket !='')
        // {
        //  RTO::where("Initial_Docket", $request->Docket)->update(['RTO_Docket' =>$request->RtoDocket]);
        // }
        if(isset($request->RtoDocket) && $request->RtoDocket !='')
        {
          $docket=$request->RtoDocket;
        }
        else{
          $docket=$request->Docket;
        }
       $user_id= $UserId=Auth::id();
        $Docket=DocketMaster::where("id", $request->DocketId)->update(
        ['Booking_Date'=>$bookignDate,'Office_ID'=>$request->BookingBranchId,'Booking_Type'=>$request->BookingType,'Delivery_Type'=>$request->DeliveryType,'Is_DACC'=>$IsDacc,'Is_DOD'=>$IsDOd,'DODAmount'=>$request->DODAmount,'Is_COD'=>$IsCod,'CODAmount'=>$request->CodAmount,'Ref_No'=>$request->ShipmentNo,'PO_No'=>$request->PoNumber,'Origin_Pin'=>$request->Origin,'Dest_Pin'=>$request->Destination,'Cust_Id'=>$request->Customer,'Mode'=>$request->Mode,'Consigner_Id'=>$consignorId,'Consignee_Id'=>$consigneeId,'Remark'=>$request->remark,'Booked_By'=>$request->BookedBy,'UpdatedBy'=>$user_id]
    );
    $Docket=DocketProductDetails::where("Docket_Id", $request->DocketId)->update(
        ['D_Product'=>$request->Product,'Packing_M'=>$request->PackingMethod,'Qty'=>$request->Pieces  ,'Is_Volume'=>$request->Volumetric,'Actual_Weight'=>$request->ActualWeight,'Charged_Weight'=>$request->ChargeWeight]
    );
    $docketFile=DocketMaster::
    leftjoin('customer_masters','customer_masters.id','=','docket_masters.Cust_Id')
    ->leftjoin('consignees','consignees.id','=','docket_masters.Consignee_Id')
    ->leftjoin('users','users.id','=','docket_masters.UpdatedBy')
    ->leftjoin('employees','employees.user_id','=','users.id')
    ->leftjoin('office_masters','employees.OfficeName','=','office_masters.id')
   ->select('customer_masters.CustomerName','consignees.ConsigneeName','docket_masters.Booked_At','employees.EmployeeName','docket_masters.Docket_No', 'office_masters.OfficeCode','office_masters.OfficeName')
   ->where('docket_masters.Docket_No',$docket)
   ->first();
    $string = "<tr><td>OLD BOOKED</td><td>".date("d-m-Y",strtotime($docketFile->Booked_At))."</td><td><strong>BOOKING DATE: </strong>".date("d-m-Y",strtotime($docketFile->Booked_At))."<br><strong>CUSTOMER NAME: </strong>$docketFile->CustomerName<br><strong>CONSIGNEE NAME: </strong>$docketFile->ConsigneeName</td><td>".date('d-m-Y h:i A')."</td><td>".$docketFile->EmployeeName."<br> (".$docketFile->OfficeCode.'~'.$docketFile->OfficeName.")</td></tr>"; 
      Storage::disk('local')->append($docket, $string);


    if(!empty($request->DocketData))
    {
        foreach($request->DocketData as $docketInvoce)
        {
            if(isset($docketInvoce['InvType']))
            {     
            DocketInvoiceDetails::insert(
                ['Docket_Id'=>$request->DocketId,'Type'=>$docketInvoce['InvType'],'Invoice_No'=>$docketInvoce['InvNo'],'Invoice_Date'=>$docketInvoce['InvDate'] ,'Description'=>$docketInvoce['Description'],'Amount'=>$docketInvoce['Amount'],'EWB_No'=>$docketInvoce['EWBNumber'],'EWB_Date'=>$docketInvoce['EWBDate']]
            ); 
          } 
        }
    }

    if(isset($request->GstApplicableTafiff) && $request->GstApplicableTafiff)
    {
      $GstApplicableTafiff='YES';
    }
    else{
      $GstApplicableTafiff='NO';
    }
    $Docket=TariffType::where("Docket_Id", $request->DocketId)->update(
        ['is_gst'=>$GstApplicableTafiff,'ReceivedAmount'=>$request->TrafReceivedAmount,'PaymentMethod'=>$request->PaymentMethod,'ReferenceNumber'=>$request->tarffRefNp  ,'Freight'=>$request->TarffFright,'IGST'=>$request->TraffIGST,'CGST'=>$request->TraffCGST,'SGST'=>$request->TraffSGST,'TotalAmount'=>$request->TaffTtotal]
    );

    $request->session()->flash('status', 'Docket Booking Edit Successfully');
    return redirect('EditDocketBooking');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\EditDocketBooking  $editDocketBooking
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req , EditDocketBooking $editDocketBooking)
    {
        //
      $Docket= $req->Docket;
     $result =DocketMaster::with('offcieDetails','BookignTypeDetails','DevileryTypeDet','customerDetails','consignor','consignoeeDetails','DocketProductDetails','PincodeDetails','DestPincodeDetails','DocketInvoiceDetails')->where(function($query) use($Docket){
            $query->where("docket_masters.Docket_No",$Docket);
       })->first();

     if(!empty($result)){
         $dockId =$result->id;
         $tarrif = TariffType::where(function($query) use($dockId){
                $query->where("tariff_types.Docket_Id",$dockId);
           })->first();
         $datas=  array("status"=>1,"result"=>$result);
            if(!empty($tarrif)){
                $datas['tarrif']= $tarrif;
                 echo json_encode($datas);
            }
            else{
                $datas['tarrif']=[];
                 echo json_encode($datas);
            }
     }
     else{
        echo json_encode(array("status"=>0,"result"=>[]));
     }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\EditDocketBooking  $editDocketBooking
     * @return \Illuminate\Http\Response
     */
    public function edit(EditDocketBooking $editDocketBooking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEditDocketBookingRequest  $request
     * @param  \App\Models\Operation\EditDocketBooking  $editDocketBooking
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEditDocketBookingRequest $request, EditDocketBooking $editDocketBooking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\EditDocketBooking  $editDocketBooking
     * @return \Illuminate\Http\Response
     */
    public function destroy(EditDocketBooking $editDocketBooking)
    {
        //
    }

    public function EditDocketInvoiceDetail(Request $req){
        $docketId = $req->DocketId;
       $DocketDatas= DocketInvoiceDetails::with('DocketInviceTypeData')->where("Docket_Id", $docketId)->get();
       if(!empty($DocketDatas)){
           echo json_encode(array("status"=>1,"datas"=>$DocketDatas));
       }
       else{
             echo json_encode(array("status"=>0,"datas"=>[]));
       }
    }

    public function DeleteDocketInvoiceDetail(Request $req){
        $invoiceId = $req->InvoiceId;
        DocketInvoiceDetails::where("id",$invoiceId)->delete();
        echo json_encode(array("status"=>1));
    }
}
