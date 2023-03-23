<?php

namespace App\Http\Controllers\Operation;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUploadDocketRequest;
use App\Http\Requests\UpdateUploadDocketRequest;
use App\Models\Operation\UploadDocket;
use App\Models\Operation\DocketAllocation;
use Illuminate\Http\Request;
use Auth;

class UploadDocketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         return view('Operation.uploadDocketImage', [
            'title'=>'Upload Docket Image']);
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
     * @param  \App\Http\Requests\StoreUploadDocketRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUploadDocketRequest $request)
    {
        //
        $UserId=Auth::id();
     $file=  $request->file('file');
     if(!empty($file)){
        $i= 0;
    $htmlBody='';
    $docket ='';
    foreach($file as $fileKey){
            $i++;
    $checkType= $request->submitTo;

    $fileName =$fileKey->getClientOriginalName();
    $fileNameArray = explode(".", $fileName);
    $RestrictExt = array("JPEG","JPG", "PNG", "JPACK", "jpeg","jpg","png","jpack");
    $checkExt = end($fileNameArray);
            if( in_array( $checkExt, $RestrictExt) ){
                $docket = $fileNameArray[0];
                $docket = trim($docket);

              $checkDocket=  DocketAllocation::where("Docket_No",$docket)->first();
                if(empty($checkDocket)){
                  $htmlBody .='<tr><td style="font-weight:25">'.$docket.'</td> <td style="font-weight:25; color:red;"> Failed (Docket No. Not Found)</td></tr>';
                }
                else{
 
                    $destinationPath = public_path('document');
                    $link = 'document/'.date('YmdHis').$fileKey->getClientOriginalName();
                    $fileKey->move($destinationPath, date('YmdHis').$fileKey->getClientOriginalName());
                     $CheckDocket = UploadDocket::where("DocketNo",$docket)->first();
                    if(empty($CheckDocket)){
                      $dataArr = array("remark"=>$request->remark,"DocketNo"=>$docket,"file"=>$link, "Created_by"=>$UserId,"Recieved"=>$checkType);
                     UploadDocket::insert($dataArr);
                     $htmlBody .='<tr><td style="font-weight:25">'.$docket.'</td> <td style="font-weight:25; color:green;"> Success</td></tr>';
                    }
                    else{
                        $dataArr = array("remark"=>$request->remark,"DocketNo"=>$docket,"file"=>$link,"Recieved"=>$checkType);
                         UploadDocket::where("DocketNo",$docket)->update($dataArr);
                         $htmlBody .='<tr><td style="font-weight:25">'.$docket.'</td> <td style="font-weight:25; color:green;"> Success</td></tr>';
                    }
                }
            }
            else{
                $htmlBody .='<tr><td style="font-weight:25">'.$fileKey->getClientOriginalName().' File'.'</td> <td style="font-weight:25; color:red;"> Failed (JPG,JPEG,PNG JPACK ) Allowed only</td></tr>';
            }

        }
        echo json_encode(array("status"=>"","body"=>$htmlBody));
    }
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\UploadDocket  $uploadDocket
     * @return \Illuminate\Http\Response
     */
    public function show(UploadDocket $uploadDocket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\UploadDocket  $uploadDocket
     * @return \Illuminate\Http\Response
     */
    public function edit(UploadDocket $uploadDocket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUploadDocketRequest  $request
     * @param  \App\Models\Operation\UploadDocket  $uploadDocket
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUploadDocketRequest $request, UploadDocket $uploadDocket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\UploadDocket  $uploadDocket
     * @return \Illuminate\Http\Response
     */
    public function destroy(UploadDocket $uploadDocket)
    {
        //
    }
}
