<?php

namespace App\Http\Controllers\Account;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account\OfficeCustMapping;
use App\Http\Requests\StoreOfficeCustMappingRequest;
use App\Http\Requests\UpdateOfficeCustMappingRequest;
use App\Models\OfficeSetup\OfficeMaster;
use App\Models\Account\CustomerMaster;
use Auth;
class OfficeCustMappingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search=  $request->search;
        $listing = OfficeCustMapping::with('CustDetails','OfficeDetails','UserDetails')
        ->where(function($query) use($search){
            $query->whereRelation("CustDetails","CustomerName","like","%".$search."%");
            $query->orWhereRelation("OfficeDetails","OfficeName","like","%".$search."%");
            $query->orWhereRelation("CustDetails","CustomerCode","like","%".$search."%");
            $query->orWhereRelation("OfficeDetails","OfficeCode","like","%".$search."%");
        })
        ->paginate(10);
        $Office = OfficeMaster::where("Is_Active","Yes")->get();
        $Cust = CustomerMaster::where("Active","Yes")->get();
        return view("Account.OfficeCustMapping",[
            "title"=>"Office Wise Customer Mapping",
            "Office" => $Office,
            "Cust" =>   $Cust,
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
     * @param  \App\Http\Requests\StoreOfficeCustMappingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOfficeCustMappingRequest $request)
    {
       $UserId = Auth::id();
       if($request->pid){
        OfficeCustMapping::where("id",$request->pid)->update(
            ['OfficeId'=>$request->Office,'CustomerId' => $request->Customer,"CreatedBy" =>$UserId]
            ); 
            echo "Office Customer Map Edit Successfully";
       }
       else{
       $checkExistance = OfficeCustMapping::where("CustomerId",$request->Customer)->where("OfficeId",$request->Office)->first();
       if(empty($checkExistance)){
       $LatInsertId=OfficeCustMapping::insertGetId(
        ['OfficeId'=>$request->Office,'CustomerId' => $request->Customer,"CreatedBy" =>$UserId]
        ); 
           if($LatInsertId){
            echo "Office Customer Mapped Successfully";
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
     * @param  \App\Models\Account\OfficeCustMapping  $officeCustMapping
     * @return \Illuminate\Http\Response
     */
    public function show(OfficeCustMapping $officeCustMapping, Request $request)
    {
        $ID = $request->id;
        $data = OfficeCustMapping::where("id",$ID )->first();
        echo json_encode($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account\OfficeCustMapping  $officeCustMapping
     * @return \Illuminate\Http\Response
     */
    public function edit(OfficeCustMapping $officeCustMapping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOfficeCustMappingRequest  $request
     * @param  \App\Models\Account\OfficeCustMapping  $officeCustMapping
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOfficeCustMappingRequest $request, OfficeCustMapping $officeCustMapping)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account\OfficeCustMapping  $officeCustMapping
     * @return \Illuminate\Http\Response
     */
    public function destroy(OfficeCustMapping $officeCustMapping)
    {
        //
    }
}
