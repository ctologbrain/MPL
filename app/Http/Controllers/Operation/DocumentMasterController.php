<?php

namespace App\Http\Controllers\Operation;

use App\Http\Requests\StoreDocumentMasterRequest;
use App\Http\Requests\UpdateDocumentMasterRequest;
use App\Models\Operation\DocumentMaster;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class DocumentMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $search ='';
        if($request->search){
            $search = $request->search;
        }
        $DocMaster = DocumentMaster::where(function($query) use($search){
            if($search!=''){
                $query->where("DocumentCode","like", "%".$search."%");
                $query->orWhere("DocumentName","like", "%".$search."%");
            }
        })->paginate(10);
        return view('Operation.documentMaster', [
            'title'=>'Document Master',
            'DocMaster'=> $DocMaster
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
     * @param  \App\Http\Requests\StoreDocumentMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocumentMasterRequest $request)
    {
        //
        date_default_timezone_set("Asia/Kolkata");
        $UserId = Auth::id();
         
        if(isset($request->Isactive) && $request->Isactive!=''){
            $active= 0;
        }
        else{
            $active = 1;
        }

        if(isset($request->CustomerBill) && $request->CustomerBill!=''){
            $Customer = "Yes";
        }
        else{
            $Customer = "No";
        }

        if(isset($request->VendorBill) && $request->VendorBill!=''){
            $Vendor = "Yes";
        }
        else{
            $Vendor = "No";
        }

        if(isset($request->Image) && $request->Image!=''){
            $Image = "Yes";
        }
        else{
            $Image = "No";
        }

        if($request->Did==''){
            $Insert = DocumentMaster::insertGetId( ["DocumentCode" => $request->DocumentCode,
            "DocumentName" =>  $request->DocumentName,
            "CustomerBill" =>  $Customer,
            "vendorBill" =>  $Vendor,
            "ImageRequire" => $Image,
            "CreatedBy"=>$UserId]);
            if($Insert){
                echo "Document Added Successfully";
            }
        }
        else{
            $Updated = DocumentMaster::where("id",$request->Did)->update(["DocumentCode" => $request->DocumentCode,
            "DocumentName" =>  $request->DocumentName,
            "CustomerBill" =>  $Customer,
            "vendorBill" =>  $Vendor,
            "ImageRequire" => $Image,
            "updated_at"=>date("Y-m-d H:i:s"),
            "Is_Active"=>$active]);
            if($Updated){
                echo "Document Updated Successfully";
            }
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\DocumentMaster  $documentMaster
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request ,DocumentMaster $documentMaster)
    {
        //
        $getDetails = DocumentMaster::where("id",$request->Did)->first();
        echo json_encode($getDetails);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\DocumentMaster  $documentMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(DocumentMaster $documentMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocumentMasterRequest  $request
     * @param  \App\Models\Operation\DocumentMaster  $documentMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocumentMasterRequest $request, DocumentMaster $documentMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\DocumentMaster  $documentMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocumentMaster $documentMaster)
    {
        //
    }
}
