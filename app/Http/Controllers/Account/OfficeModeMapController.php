<?php

namespace App\Http\Controllers\Account;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account\OfficeModeMap;
use App\Http\Requests\StoreOfficeModeMapRequest;
use App\Http\Requests\UpdateOfficeModeMapRequest;
use App\Models\Account\CustomerMaster;
use App\Models\Operation\BookingMode;
use Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\SalesExport\CustomerModeMappingExport;
class OfficeModeMapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search=  $request->search;
        $listing = OfficeModeMap::with('CustDetails','ModeDetails','UserDetails')
        ->where(function($query) use($search){
            $query->whereRelation("CustDetails","CustomerName","like","%".$search."%");
            $query->orWhereRelation("ModeDetails","Mode","like","%".$search."%");
            $query->orWhereRelation("CustDetails","CustomerCode","like","%".$search."%");
        })
        ->paginate(10);
        if($request->get('submit')=='Download')
        {
           return  Excel::download(new CustomerModeMappingExport($search), 'CustomerModeMappingExport.xlsx');
        }
        $Cust = CustomerMaster::where("Active","Yes")->get();
        $Mode = BookingMode::get();
        return view("Account.OfficeModeMap",[
            "title"=>"Customer Wise Mode Mapping",
            "Cust" => $Cust,
            "Mode" =>   $Mode,
            "listing" =>$listing
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
     * @param  \App\Http\Requests\StoreOfficeModeMapRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOfficeModeMapRequest $request)
    {
        $UserId = Auth::id();
        if($request->pid){
            OfficeModeMap::where("id",$request->pid)->update(
             ['ModeId'=>$request->Mode,'CustId' => $request->Customer,"CreatedBy" =>$UserId]
             ); 
             echo "Office Customer Map Edit Successfully";
        }
        else{
        $checkExistance = OfficeModeMap::where("CustId",$request->Customer)->where("ModeId",$request->Mode)->first();
        if(empty($checkExistance)){
        $LatInsertId=OfficeModeMap::insertGetId(
         ['ModeId'=>$request->Mode,'CustId' => $request->Customer,"CreatedBy" =>$UserId]
         ); 
            if($LatInsertId){
             echo "Customer Mode Mapped Successfully";
            }
         }
         else{
             echo "false";
         }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account\OfficeModeMap  $officeModeMap
     * @return \Illuminate\Http\Response
     */
    public function show(OfficeModeMap $officeModeMap, Request $request)
    {
        $ID = $request->id;
        $data = OfficeModeMap::where("id",$ID )->first();
        echo json_encode($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account\OfficeModeMap  $officeModeMap
     * @return \Illuminate\Http\Response
     */
    public function edit(OfficeModeMap $officeModeMap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOfficeModeMapRequest  $request
     * @param  \App\Models\Account\OfficeModeMap  $officeModeMap
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOfficeModeMapRequest $request, OfficeModeMap $officeModeMap)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account\OfficeModeMap  $officeModeMap
     * @return \Illuminate\Http\Response
     */
    public function destroy(OfficeModeMap $officeModeMap)
    {
        //
    }
}
