<?php

namespace App\Http\Controllers\Operation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDocumentDispatchRequest;
use App\Http\Requests\UpdateDocumentDispatchRequest;
use App\Models\Operation\DocumentDispatch;
use App\Models\OfficeSetup\OfficeMaster;
use App\Models\Operation\DocumentMaster;
use Auth;
use App\Models\Operation\DocumentDispatchTrans;
class DocumentDispatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        $Office = OfficeMaster::get();
        $Document = DocumentMaster::get();
        return view("Operation.documentDispatch",["title"=>"Document Dispatch",
       "Office"=>$Office,
       "Document"=>$Document]);
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
     * @param  \App\Http\Requests\StoreDocumentDispatchRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocumentDispatchRequest $request)
    {
       // print_r($request->Documents); die;
       $dispatchLastID = DocumentDispatch::orderBy("id","DESC")->first();
        if(isset($dispatchLastID->id)){
            $DispatchNo = "DD".intval($dispatchLastID->id+1);
        }
        else{
            $DispatchNo = "DD1";
        }
        $UserId = Auth::id();
       $lastId= DocumentDispatch::insertGetId(["DispatchNo" =>$DispatchNo,
        "Dispatch_Date" => date("Y-m-d",strtotime($request->dispatch_date)),
        "Destination_Office" =>$request->destination_office,
        "Docket_Number" =>$request->awb_no, //
        "Courier_Name" =>$request->courier_no,
        "Courier_Charges" =>$request->courier_chrg,
        "Created_By"=>$UserId
        ]);
        $i=0;
        foreach($request->Documents as $key ){
            if($request->file("fileImage".$i)!==null){
            $file = $request->file("fileImage".$i."");
            $destination = public_path("DocumentDispatch");
            $file->move($destination,date("YmdHis").$file->getClientOriginalName());
           $link = 'public/DocumentDispatch/'.date("YmdHis").$file->getClientOriginalName();
            }
            else{
                $link ='';
            }
       $allDone = DocumentDispatchTrans::insertGetId(["Dispatch_ID"=>$lastId,
        "Document_Name" => $key['DocumentName'] ,
        "Remark"=> $key['Remark'],
        "File"=> $link ]);
        $i++;
        }
        if($allDone){
            echo "Document Dispatched Successfully";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\DocumentDispatch  $documentDispatch
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request ,DocumentDispatch $documentDispatch)
    {
        //
        $Documentreceive = DocumentDispatch::with("GetOfficeDet","userDet")->withCount("DispatchTransSum as Total")->paginate(10);
        return view("Operation.documentReceive",
        ["title"=>"Document Receive",
        "Documentreceive"=> $Documentreceive
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\DocumentDispatch  $documentDispatch
     * @return \Illuminate\Http\Response
     */
    public function edit(DocumentDispatch $documentDispatch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocumentDispatchRequest  $request
     * @param  \App\Models\Operation\DocumentDispatch  $documentDispatch
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocumentDispatchRequest $request, DocumentDispatch $documentDispatch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\DocumentDispatch  $documentDispatch
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocumentDispatch $documentDispatch)
    {
        //
    }

    public function DocumentreceivedPost(Request $request){
      $DDId = $request->ID;
      $Data =  DocumentDispatchTrans::where("Dispatch_ID",$DDId)->first();
      return view("Operation.documentReceiveModal",
        ["title"=>"Document Receive",
        "Data"=> $Data
        ]);
    }
}
