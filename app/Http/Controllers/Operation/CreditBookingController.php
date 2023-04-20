<?php

namespace App\Http\Controllers\Operation;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCreditBookingRequest;
use App\Http\Requests\UpdateCreditBookingRequest;
use App\Models\Operation\CreditBooking;
use Illuminate\Http\Request;
use App\Models\Account\Consignee;
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
use App\Models\Operation\RTO;
use App\Models\Operation\DevileryType;
use App\Models\Operation\PackingMethod;
use App\Models\Operation\DocketInvoiceType;
use App\Models\Operation\DocketProduct;
use Illuminate\Support\Facades\Storage;
class CreditBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
      
      
        $UserId=Auth::id();
        $Offcie=employee::select('office_masters.id','office_masters.OfficeCode','office_masters.OfficeName','office_masters.City_id','office_masters.Pincode','employees.id as EmpId')
        ->leftjoin('office_masters','office_masters.id','=','employees.OfficeName')
        ->where('employees.user_id',$UserId)->first();
        
      
        $pincode=PincodeMaster::select('pincode_masters.*','cities.CityName','cities.Code')
        ->leftjoin('cities','cities.id','=','pincode_masters.city')
        ->where('pincode_masters.city',$Offcie->City_id)->get();
        $destpincode=PincodeMaster::select('pincode_masters.*','cities.CityName','cities.Code')
        ->leftjoin('cities','cities.id','=','pincode_masters.city')
        ->get();
       $customer=CustomerMaster::select('id','CustomerCode','CustomerName')->get();
       $employee=employee::select('id','EmployeeCode','EmployeeName')->get();
       $DocketBookingType=DocketBookingType::where('Type',1)->get();
       $DevileryType=DevileryType::get();
       $PackingMethod=PackingMethod::get();
       $DocketInvoiceType=DocketInvoiceType::get();
       $DocketProduct=DocketProduct::get();
       
       return view('Operation.CreditBoocking', [
            'title'=>'CREDIT BOOKING',
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
    public function getConsignor(Request $request)
    {
       $customer=ConsignorMaster::where('CustId',$request->CustId)->get();
       $html='';
       $html.='<option value="">--select--</option>';
         foreach($customer as $customerList)
         {
         $html.='<option value="'.$customerList->id.'">'.$customerList->ConsignorName.'</option>';
         }
         echo $html;
    }
    public function getConsignorDetsils(Request $request)
    {
        $customer=ConsignorMaster::where('id',$request->consignorId)->first();
        echo json_encode($customer);
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
     * @param  \App\Http\Requests\StoreCreditBookingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCreditBookingRequest $request)
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
        DocketAllocation::where("Docket_No", $request->Docket)->update(['Status' =>3,'BookDate'=>$request->BookingDate]);
        $docket=$request->Docket;
        
        $Docket=DocketMaster::insertGetId(
        ['Docket_No' => $docket,'Booking_Date'=>date("Y-m-d", strtotime($bookignDate)),'Office_ID'=>$request->BookingBranchId,'Booking_Type'=>$request->BookingType,'Delivery_Type'=>$request->DeliveryType,'Is_DACC'=>$IsDacc,'Is_DOD'=>$IsDOd,'DODAmount'=>$request->DODAmount,'Is_COD'=>$IsCod,'CODAmount'=>$request->CodAmount,'Ref_No'=>$request->ShipmentNo,'PO_No'=>$request->PoNumber,'Origin_Pin'=>$request->Origin,'Dest_Pin'=>$request->Destination,'Cust_Id'=>$request->Customer,'Mode'=>$request->Mode,'Consigner_Id'=>$consignorId,'Consignee_Id'=>$consigneeId,'Remark'=>$request->remark,'Booked_By'=>$request->BookedBy,'Booked_At'=>date('Y-m-d')]
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
   $string = "<tr><td>BOOKED</td><td>$docketFile->Booked_At</td><td><strong><strong>BOKKING DATE: </strong>$docketFile->Booked_At<br><strong>CUSTOMER NAME: </strong>$docketFile->CustomerName<br><strong>CONSIGNEE NAME: </strong>$docketFile->ConsigneeName</td><td>".date('Y-m-d H:i:s')."</td><td>$docketFile->EmployeeName</td></tr>"; 
      Storage::disk('local')->append($docket, $string);
   if(!empty($request->DocketData))
    {
        foreach($request->DocketData as $docketInvoce)
        {
            
        DocketInvoiceDetails::insert(
            ['Docket_Id' =>$Docket,'Type'=>$docketInvoce['InvType'],'Invoice_No'=>$docketInvoce['InvNo'],'Invoice_Date'=>date("Y-m-d", strtotime($docketInvoce['InvDate'])) ,'Description'=>$docketInvoce['Description'],'Amount'=>$docketInvoce['Amount'],'EWB_No'=>$docketInvoce['EWBNumber'],'EWB_Date'=>date("Y-m-d", strtotime($docketInvoce['EWBDate']))]
        );  
    }
    }
    $request->session()->flash('status', 'Docket Booked Successfully');
    return redirect('CreditBooking');
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\CreditBooking  $creditBooking
     * @return \Illuminate\Http\Response
     */
    public function show(CreditBooking $creditBooking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\CreditBooking  $creditBooking
     * @return \Illuminate\Http\Response
     */
    public function edit(CreditBooking $creditBooking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCreditBookingRequest  $request
     * @param  \App\Models\Operation\CreditBooking  $creditBooking
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCreditBookingRequest $request, CreditBooking $creditBooking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\CreditBooking  $creditBooking
     * @return \Illuminate\Http\Response
     */
    public function destroy(CreditBooking $creditBooking)
    {
        //
    }
    public function CheckDocketIsAvalible(Request $request)
    {
        $docket=DocketAllocation::select('docket_allocations.*','docket_masters.Docket_No as DocketMaster','docket_statuses.title','office_masters.OfficeName','RTO_Trans.RTO_Docket','RTO_Trans.Initial_Docket')->where('docket_allocations.Docket_No',$request->Docket)
        ->leftjoin('docket_statuses','docket_statuses.id','=','docket_allocations.Status')
        ->leftjoin('RTO_Trans','RTO_Trans.RTO_Docket','=','docket_allocations.Docket_No')
        ->leftjoin('office_masters','office_masters.id','=','docket_allocations.Branch_ID')
        ->leftjoin('docket_masters','docket_masters.Docket_No','=','docket_allocations.Docket_No','docket_masters.Docket_No as DocketMaster','RTO_Trans.Initial_Docket as RtoDocket')
        ->first();
       
       if(empty($docket))
        {
         $datas=array('status'=>'false','message'=>'No Docket Found');
        }
       elseif($docket->Status==0 && $request->DeliveryType ==1)
       {
        $datas=array('status'=>'false','message'=>'Please Make Pickup Scan First');
       }
       elseif($docket->Status==0 && $request->DeliveryType ==3)
       {
        $datas=array('status'=>'false','message'=>'Please Make Pickup Scan First');
       }
       elseif($docket->DocketMaster !='')
       {
        $datas=array('status'=>'false','message'=>'Booking Complete');
       }
     
       elseif($docket->Status==1)
       {
        $datas=array('status'=>'false','message'=>'Docket Is Cancled');
       }
       elseif($docket->Branch_ID != $request->BranchId)
       {
       $datas=array('status'=>'false','message'=>'Docket Is Assign '.$docket->OfficeName.' Contact to Admin');
       }
       else{
        $datas=array('status'=>'true','isRto'=>$docket->RTO_Docket,'IniteDocket'=>$docket->Initial_Docket);
       }
        
        
       
       echo  json_encode($datas);
    }
    public function CheckDocketIsAvalibleRTo(Request $request)
    {
        $docket=DocketAllocation::select('docket_allocations.*','docket_statuses.title','office_masters.OfficeName','docket_masters.Is_Rto','RTO_Trans.RTO_Docket','RTO_Trans.Initial_Docket')->where('docket_allocations.Docket_No',$request->Docket)
        ->leftjoin('docket_statuses','docket_statuses.id','=','docket_allocations.Status')
        ->leftjoin('RTO_Trans','RTO_Trans.RTO_Docket','=','docket_allocations.Docket_No')
        ->leftjoin('office_masters','office_masters.id','=','docket_allocations.Branch_ID')
        ->leftjoin('docket_masters','docket_masters.Docket_No','=','docket_allocations.Docket_No')
        ->first();
       
       if(empty($docket))
        {
         $datas=array('status'=>'false','message'=>'No Docket Found');
        }
       elseif($docket->Status==0)
       {
        $datas=array('status'=>'false','message'=>'Docket Is Unused');
       }
       elseif($docket->Status==3)
       {
        $datas=array('status'=>'false','message'=>'Credit Booking Complete');
       }
       elseif($docket->Status==4)
       {
        $datas=array('status'=>'false','message'=>'Cash Booking Complete');
       }
       elseif($docket->RTO_Docket !=NULL)
       {
        $datas=array('status'=>'false','message'=>'RTO Already Genrate');
       }
       elseif($docket->Status==1)
       {
        $datas=array('status'=>'false','message'=>'Docket Is Cancled');
       }
       elseif($docket->Branch_ID != $request->BranchId)
       {
       $datas=array('status'=>'false','message'=>'Docket Is Assign '.$docket->OfficeName.' Contact to Admin');
       }
       else{
        $datas=array('status'=>'true','isRto'=>$docket->Is_Rto);
       }
        
        
       
       echo  json_encode($datas);
    }

    public function getCustomerDetailsView(Request $req){
       $customer= CustomerMaster::with("parent")->where("id",$req->CustId)->first();
       echo json_encode(array("status"=>1,"datas"=> $customer));
    }
}
