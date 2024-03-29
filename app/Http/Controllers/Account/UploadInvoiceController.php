<?php

namespace App\Http\Controllers\Account;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\StoreUploadInvoiceRequest;
use App\Http\Requests\UpdateUploadInvoiceRequest;
use App\Models\Account\UploadInvoice;
use App\Models\Account\CustomerMaster;
use Auth;

class UploadInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Customer = CustomerMaster::get();
        return view('Account.uploadInvoice', [
            'title'=>'UPLOAD INVOICE',
            'Customer'=>$Customer
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
     * @param  \App\Http\Requests\StoreUploadInvoiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUploadInvoiceRequest $request)
    {
        //
        date_default_timezone_set('Asia/Kolkata');
        $UserId = Auth::id();
           $file= $request->file('Document');

           $exe= $file->getClientOriginalExtension();
        $accept =array("PNG","png","PDF","pdf");
        if(in_array($exe,$accept)){
           $fileName= date("YmdHis").$file->getClientOriginalName();
           $path =public_path('InvoiceUpload');
            $link = 'public/InvoiceUpload/'.$fileName;
            $file->move($path, $fileName);
         $Check=   UploadInvoice::where("cust_id" ,$request->cust_id)->where("InvoiceNo" ,$request->InvoiceNo)->first();

            if(!empty($Check)){
                UploadInvoice::where("InvoiceNo",$request->InvoiceNo)->update(['Document'=>$link]);
                echo 'Upload Successfully';
            }
            else{
            UploadInvoice::insert(['cust_id'=>$request->cust_id,'Created_By'=>$UserId,"InvoiceNo"=>$request->InvoiceNo, 'BillSubmissionDate'=>date("Y-m-d",strtotime($request->BillSubmissionDate)),'Document'=>$link,'Created_At'=>date('Y-m-d H:i:s')]);
            echo 'Upload Successfully';
            }
        }
        else{
            echo 'Please Select PNG ,PDF File Only';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account\UploadInvoice  $uploadInvoice
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,UploadInvoice $uploadInvoice)
    {
        //

        $customer= $request->customer;
        $invoice = $request->invoice;
       $result= UploadInvoice::with("customerDetails","userDetails")->where("cust_id",$customer)->where("InvoiceNo" ,$invoice)->get();

       if(empty($result)){
        echo json_encode(array("status"=>0,"result"=>'')); 
       } 
       else{
         echo json_encode(array("status"=>1,"result"=>$result));
        
       }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account\UploadInvoice  $uploadInvoice
     * @return \Illuminate\Http\Response
     */
    public function edit(UploadInvoice $uploadInvoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUploadInvoiceRequest  $request
     * @param  \App\Models\Account\UploadInvoice  $uploadInvoice
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUploadInvoiceRequest $request, UploadInvoice $uploadInvoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account\UploadInvoice  $uploadInvoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(UploadInvoice $uploadInvoice)
    {
        //
    }
}
