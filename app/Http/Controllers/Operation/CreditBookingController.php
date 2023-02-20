<?php

namespace App\Http\Controllers\Operation;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCreditBookingRequest;
use App\Http\Requests\UpdateCreditBookingRequest;
use App\Models\Operation\CreditBooking;
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
       $customer=CustomerMaster::select('id','CustomerCode','CustomerName')->get();
       $employee=employee::select('id','EmployeeCode','EmployeeName')->get();
       $DocketBookingType=DocketBookingType::get();
       $DevileryType=DevileryType::get();
       $PackingMethod=PackingMethod::get();
       $DocketInvoiceType=DocketInvoiceType::get();
       return view('Operation.CreditBoocking', [
            'title'=>'CREDIT BOOKING',
            'Offcie'=>$Offcie,
            'pincode'=>$pincode,
            'customer'=>$customer,
            'employee'=>$employee,
            'BookingType'=>$DocketBookingType,
            'DevileryType'=>$DevileryType,
            'PackingMethod'=>$PackingMethod,
            'DocketInvoiceType'=>$DocketInvoiceType
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
    

        DocketAllocation::where("Docket_No", $request->Docket)->update(['Status' =>2,'BookDate'=>$request->BookingDate]);
        $Docket=DocketMaster::insertGetId(
        ['Docket_No' => $request->Docket,'Booking_Date'=>$request->BookingDate,'Office_ID'=>$request->BookingBranchId,'Booking_Type'=>$request->BookingType,'Delivery_Type'=>$request->DeliveryType,'Is_DACC'=>$request->Dacc,'Is_DOD'=>$request->Dod,'DODAmount'=>$request->DODAmount,'Is_COD'=>$request->Cod,'CODAmount'=>$request->CodAmount,'Ref_No'=>$request->ShipmentNo,'PO_No'=>$request->PoNumber,'Origin_Pin'=>$request->Origin,'Dest_Pin'=>$request->Destination,'Cust_Id'=>$request->Customer,'Consigner_Id'=>$request->Consignor,'Consignee_Id'=>$request->Consignor,'Remark'=>$request->remark,'Booked_By'=>$request->BookedBy,'Booked_At'=>date('Y-m-d')]
    );
    $Docket=DocketProductDetails::insert(
        ['Docket_Id' =>$Docket,'D_Product'=>$request->Product,'Packing_M'=>$request->PackingMethod,'Qty'=>$request->Pieces  ,'Is_Volume'=>$request->Volumetric,'Actual_Weight'=>$request->ActualWeight,'Charged_Weight'=>$request->ChargeWeight]
    );
    if(!empty($request->DocketData))
    {
        foreach($request->DocketData as $docketInvoce)
        {
            
        DocketInvoiceDetails::insert(
            ['Docket_Id' =>$Docket,'Type'=>$docketInvoce['InvType'],'Invoice_No'=>$docketInvoce['InvNo'],'Invoice_Date'=>$docketInvoce['InvDate'] ,'Description'=>$docketInvoce['Description'],'Amount'=>$docketInvoce['Amount'],'EWB_No'=>$docketInvoce['EWBNumber'],'EWB_Date'=>$docketInvoce['EWBDate']]
        );  
    }
    }
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
        $docket=DocketAllocation::select('docket_allocations.*','docket_statuses.title','office_masters.OfficeName')->where('Docket_No',$request->Docket)
        ->leftjoin('docket_statuses','docket_statuses.id','=','docket_allocations.Status')
        ->leftjoin('office_masters','office_masters.id','=','docket_allocations.Branch_ID')
        ->first();
      
        if(empty($docket))
        {
         $datas=array('status'=>'false','message'=>'No Docket Found');
        }
       elseif($docket->Status==2)
       {
        $datas=array('status'=>'false','message'=>'Docket Is Bookid On Date '.$docket->BookDate);
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
        $datas=array('status'=>'true');
       }
        
        
       
       echo  json_encode($datas);
    }
}
