<?php

namespace App\Http\Controllers\tooladmin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\StoreEditToPayCollectionRequest;
use App\Http\Requests\UpdateEditToPayCollectionRequest;
use App\Models\ToolsAdmin\EditToPayCollection;

use App\Models\Operation\Topaycollection;
use App\Models\Operation\DocketDepositTrans;
use App\Models\CompanySetup\BankMaster;
use App\Models\OfficeSetup\OfficeMaster;
use App\Models\Operation\DocketMaster;
use App\Models\Operation\DocketAllocation;

use Auth;

class EditToPayCollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $bank = BankMaster::get();
        $office = OfficeMaster::get();
        return view('Tooladmin.editCashtopay', [
             'title'=>'To Pay Collection',
             'bank'=>$bank,
             'office' =>$office]);
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
     * @param  \App\Http\Requests\StoreEditToPayCollectionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEditToPayCollectionRequest $request)
    {
        //
        date_default_timezone_set('Asia/Kolkata');
        $UserId = Auth::id(); 
        $updateData =array("Date"=>$request->collection_date,
                "Type"=>$request->collection_type,
                "Amt"=>$request->collection_amount,
                "Bank"=>$request->bank_name,
                "Remark"=>$request->collection_remarks,
                "updated_by"=>$UserId,
                "updated_at"=>date("Y-m-d H:i:s")
                );
        Topaycollection::where("Docket_Id",$request->docketId)->update($updateData);
       // $file = $request->file('file');
       //  $destinationPath = public_path('Topaycollection_doc');
       //  $file->move($destinationPath, date('YmdHis').$file->getClientOriginalName());
       //    $link = 'public/Topaycollection_doc/'. date('YmdHis').$file->getClientOriginalName();

        $updateDataTwo = array(
                        "Date"=>$request->deposite_date ,
                        "DepositAt"=>$request->deposite_at,
                        "Amt"=>$request->deposite_amount,
                        "Bank"=>$request->depositeInBank,
                        "Account_Number"=>$request->depositeAccNo,
                        "Remark"=>$request->deposite_remarks,
                        "Branch"=>$request->BRANCH,
                        "updated_by"=>$UserId,
                        "updated_at"=>date("Y-m-d H:i:s"));
       
         DocketDepositTrans::where("Docket_Id",$request->docketId)->update($updateDataTwo);
        echo json_encode(array("status"=>"true"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ToolsAdmin\EditToPayCollection  $editToPayCollection
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req,EditToPayCollection $editToPayCollection)
    {
        //
        $docketNo =  $req->docketNo;
         $docketId = DocketMaster::where("Docket_No",$docketNo)->first();
        if(isset($docketId->id) &&  $docketId->id!=''){
          $response=  Topaycollection::where("Docket_Id",$docketId->id)->first();
          if(!empty($response)){
                echo json_encode(array("states"=>1,"datas"=>$response));
            }
            else{
                echo json_encode(array("states"=>0,"datas"=>[]));
            }
        }
        else{
             echo json_encode(array("states"=>0,"datas"=>[]));
        }
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ToolsAdmin\EditToPayCollection  $editToPayCollection
     * @return \Illuminate\Http\Response
     */
    public function edit(EditToPayCollection $editToPayCollection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEditToPayCollectionRequest  $request
     * @param  \App\Models\ToolsAdmin\EditToPayCollection  $editToPayCollection
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEditToPayCollectionRequest $request, EditToPayCollection $editToPayCollection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ToolsAdmin\EditToPayCollection  $editToPayCollection
     * @return \Illuminate\Http\Response
     */
    public function destroy(EditToPayCollection $editToPayCollection)
    {
        //
    }

    public function DocketDepositTransDataGet(Request $req)
    {
        $docketNo =  $req->docketNo;
        $docketId = DocketMaster::where("Docket_No",$docketNo)->first();
        if(isset($docketId->id) && $docketId->id!=''){
          $response=  DocketDepositTrans::where("Docket_Id",$docketId->id)->first();
          if(!empty($response)){
                echo json_encode(array("states"=>1,"datas"=>$response));
            }
            else{
                echo json_encode(array("states"=>0,"datas"=>[]));
            }
        }
        else{
             echo json_encode(array("states"=>0,"datas"=>[]));
        }
    }
}
