<?php

namespace App\Http\Controllers\Account;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account\AddCustomerKYC;
use App\Http\Requests\StoreAddCustomerKYCRequest;
use App\Http\Requests\UpdateAddCustomerKYCRequest;
use App\Models\ToolAdmin\DocumentProofMaster;
use Auth;
class AddCustomerKYCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Docs = DocumentProofMaster::get();
        return view("Account.AddCustomerKYC",[
        "title"=>"Add Customer KYC",
        "Docs"=>$Docs,
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
     * @param  \App\Http\Requests\StoreAddCustomerKYCRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAddCustomerKYCRequest $request)
    {
        $UserId = Auth::id();
        $file = $request->file('Document');
        if(isset($file)){
          $fileName =  $file->getClientOriginalName().date("YmdHis");
            $destinationPath = public_path('KycCustomer');
            $file->move($destinationPath, $fileName);
            $link = 'public/KycCustomer/'.$fileName;
        }
        else{
            $link ="";
        }
        $LatInsertId=AddCustomerKYC::insertGetId(
            ['customerType'=>$request->customerType,'Mobile_No' => $request->Mobile_No,
                "DocumentName"=>$request->DocumentName,
                "DocumetNumber"=>$request->DocumetNumber,
                "DateOfIssue"=>date("d-m-Y", strtotime($request->DateOfIssue)),
                "DateOfExp"=>date("d-m-Y", strtotime($request->DateOfExp)),
                "Upload_Doc"=>$link,
                "CreatedBy" =>$UserId]
            ); 
               if($LatInsertId){
                echo "Customer KYC Successfully Done";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account\AddCustomerKYC  $addCustomerKYC
     * @return \Illuminate\Http\Response
     */
    public function show(AddCustomerKYC $addCustomerKYC)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account\AddCustomerKYC  $addCustomerKYC
     * @return \Illuminate\Http\Response
     */
    public function edit(AddCustomerKYC $addCustomerKYC)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAddCustomerKYCRequest  $request
     * @param  \App\Models\Account\AddCustomerKYC  $addCustomerKYC
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAddCustomerKYCRequest $request, AddCustomerKYC $addCustomerKYC)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account\AddCustomerKYC  $addCustomerKYC
     * @return \Illuminate\Http\Response
     */
    public function destroy(AddCustomerKYC $addCustomerKYC)
    {
        //
    }
}
