<?php


namespace App\Http\Controllers\Vendor;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVendorMasterRequest;
use App\Http\Requests\UpdateVendorMasterRequest;
use App\Models\Vendor\VendorMaster;
use App\Models\Vendor\VendorDetails;
use App\Models\Vendor\VendorBank;
use Illuminate\Http\Request;
use App\Models\OfficeSetup\OfficeMaster;
class VendorMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $office=OfficeMaster::get();
        if($request->get('search') !='')
            {
             $search=$request->get('search');
            }
            else{
              $search='';
            }
        $vendor=VendorMaster::with('VendorDetails','VendorBankDetails','OfficeDetails')
        ->Where(function ($query) use($search){ 
            if($search !='')
           {
               $query ->orWhere('VendorCode', 'like', '%' . $search . '%');
               $query ->orWhere('VendorName', 'like', '%' . $search . '%');
           }
        })
        ->orderby('id')->paginate(10);   
        
        return view('Vendor.VendorMasterBlade', [
            'title'=>'VENDOR MASTER',
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
     * @param  \App\Http\Requests\StoreVendorMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVendorMasterRequest $request)
    {
        if(isset($request->Vid) && $request->Vid !='')
        {
            VendorMaster::where("id", $request->Vid)->update(
                ['OfficeName' => $request->OfficeName,'ModeType'=> $request->ModeType,'VendorCode'=>$request->VendorCode,'VendorName'=>$request->VendorName,'FCM'=>$request->FCM,'Identification'=>$request->Identification,'Gst'=>$request->Gst,'TransportGroup'=>$request->TransportGroup,'CreditPeriod'=>$request->CreditPeriod,'Password'=>$request->Password,'WithoutFPM'=>$request->WithoutFPM,'NatureOfVendor'=>$request->NatureOfVendor]
               );
               VendorDetails::where("Vid", $request->Vid)->update(
                ['Name'=> $request->Name,'Address1'=>$request->Address1,'Address2'=>$request->Address2,'Mobile'=>$request->Mobile,'Email'=>$request->Email,'Pincode'=>$request->Pincode,'City'=>$request->City,'State'=>$request->State]
               );
               VendorBank::where("Vid", $request->Vid)->update(
                ['BankName'=> $request->BankName,'BranchName'=>$request->BranchName,'BranchAddress'=>$request->BranchAddress,'NameOfAccount'=>$request->NameOfAccount,'AccountType'=>$request->AccountType,'AccountNo'=>$request->AccountNo,'IfscCode'=>$request->IfscCode]
               );
        }
        else
        {
            $lastId=VendorMaster::insertGetId(
                ['OfficeName' => $request->OfficeName,'ModeType'=> $request->ModeType,'VendorCode'=>$request->VendorCode,'VendorName'=>$request->VendorName,'FCM'=>$request->FCM,'Identification'=>$request->Identification,'Gst'=>$request->Gst,'TransportGroup'=>$request->TransportGroup,'CreditPeriod'=>$request->CreditPeriod,'Password'=>$request->Password,'WithoutFPM'=>$request->WithoutFPM,'NatureOfVendor'=>$request->NatureOfVendor]
               );
               VendorDetails::insert(
                ['Vid' => $lastId,'Name'=> $request->Name,'Address1'=>$request->Address1,'Address2'=>$request->Address2,'Mobile'=>$request->Mobile,'Email'=>$request->Email,'Pincode'=>$request->Pincode,'City'=>$request->City,'State'=>$request->State]
               );
               VendorBank::insert(
                ['Vid' => $lastId,'BankName'=> $request->BankName,'BranchName'=>$request->BranchName,'BranchAddress'=>$request->BranchAddress,'NameOfAccount'=>$request->NameOfAccount,'AccountType'=>$request->AccountType,'AccountNo'=>$request->AccountNo,'IfscCode'=>$request->IfscCode]
               );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vendor\VendorMaster  $vendorMaster
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $vendor=VendorMaster::with('VendorDetails','VendorBankDetails','OfficeDetails')->where('id',$request->id)->first();
        echo json_encode($vendor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vendor\VendorMaster  $vendorMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(VendorMaster $vendorMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVendorMasterRequest  $request
     * @param  \App\Models\Vendor\VendorMaster  $vendorMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVendorMasterRequest $request, VendorMaster $vendorMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendor\VendorMaster  $vendorMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(VendorMaster $vendorMaster)
    {
        //
    }
}
