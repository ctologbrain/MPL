<?php

namespace App\Http\Controllers\Reports;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePendingPickupRequestDashboardRequest;
use App\Http\Requests\UpdatePendingPickupRequestDashboardRequest;
use App\Models\Reports\PendingPickupRequestDashboard;
use App\Models\Operation\PickupRequest;
use Auth;
use App\Models\OfficeSetup\employee;

class PendingPickupRequestDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $pickupRequest= PickupRequest::with("CustomerDetails","contentDetails","PincodeOriginDetails","PincodeDestDetails","userDetails","emplDet")
        ->paginate(10);
        return view('Operation.PendingPickupRequestDashBoard', [
            'title'=>'PICKUP REQUEST DASHBOARD',
            'pickupRequest'=>$pickupRequest
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
     * @param  \App\Http\Requests\StorePendingPickupRequestDashboardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePendingPickupRequestDashboardRequest $request)
    {
       $UserId= Auth::id();
        $file = $request->file('uploadImage'); 
        if(isset($file) && $file!=''){
       $destinationPath = public_path('document');
       $file->move($destinationPath, date("dmYHis").$file->getClientOriginalName());
       $path = 'public/document/'.date("dmYHis").$file->getClientOriginalName();
       $file->getClientOriginalExtension(); 
        }
        else{
       $path = '';
        }
        if($request->NextPickupdate!=''){
          $nextPickup=  date("Y-m-d", strtotime($request->NextPickupdate));
        }
        else{
         $nextPickup=null;
        }
      $update=  PickupRequest::where("id" ,$request->RequestId)->update(["Status" =>$request->status,
        "status_remark" => $request->statusRemark, 
        "UpdatedBy"=> $UserId ,
        "Updated_At" => date("Y-m-d H:i:s"),
        "NextPickupDate" => $nextPickup  ,
        "AssignTo" =>   $request->assign_to,
        "DocketNo" =>   $request->docket,
        "Reason" =>   $request->Reason,
        "file" =>  $path]);
        if($update){
             echo "Status Updated";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SalesReport\PendingPickupRequestDashboard  $pendingPickupRequestDashboard
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request ,PendingPickupRequestDashboard $pendingPickupRequestDashboard)
    { 
        //
        $employee = employee::get();
        $pickupRequest= PickupRequest::with("CustomerDetails","contentDetails","PincodeOriginDetails","PincodeDestDetails","userDetails")
        ->where("id",$request->GetRequestId)->first();
        return view('Operation.pickupDetailOrderModel', [
            'title'=>'PICKUP REQUEST Model',
            'pickupRequest'=>$pickupRequest,
            'employee'=> $employee
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SalesReport\PendingPickupRequestDashboard  $pendingPickupRequestDashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(PendingPickupRequestDashboard $pendingPickupRequestDashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePendingPickupRequestDashboardRequest  $request
     * @param  \App\Models\SalesReport\PendingPickupRequestDashboard  $pendingPickupRequestDashboard
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePendingPickupRequestDashboardRequest $request, PendingPickupRequestDashboard $pendingPickupRequestDashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SalesReport\PendingPickupRequestDashboard  $pendingPickupRequestDashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(PendingPickupRequestDashboard $pendingPickupRequestDashboard)
    {
        //
    }
}
