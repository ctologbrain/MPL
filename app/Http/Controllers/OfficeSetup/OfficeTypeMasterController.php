<?php

namespace App\Http\Controllers\OfficeSetup;
use App\Http\Requests\StoreOfficeTypeMasterRequest;
use App\Http\Requests\UpdateOfficeTypeMasterRequest;
use App\Models\OfficeSetup\OfficeTypeMaster;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class OfficeTypeMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->filled('search')){
            $officeType = OfficeTypeMaster::search($request->search)->orderBy('id')->paginate(5);
            }
            else{
                $officeType = OfficeTypeMaster::
                orderBy('id')
               ->paginate(5);  
            }
          return view('offcieSetup.officeTypeList', [
              'officeType' => $officeType,
             'title'=>'OFFICE TYPE MASTER',
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
     * @param  \App\Http\Requests\StoreOfficeTypeMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOfficeTypeMasterRequest $request)
    {
        $validated = $request->validated();
        if(isset($request->BookingAllow) && $request->BookingAllow=='BookingAllow')
        {
         $Bokking='Yes';
        }
        else{
        $Bokking='No';  
        }
        if(isset($request->DeilveryCommission) && $request->DeilveryCommission=='DeilveryCommission')
        {
         $commison='Yes';
        }
        else{
         $commison='No';  
        }
        if(isset($request->OfficeId) && $request->OfficeId !='')
        {
            OfficeTypeMaster::where("id", $request->OfficeId)->update(['OfficeTypeCode' => $request->OfficeCode,'OfficeTypeName'=>$request->OfficeTypeName ,'AllowBookingCommission'=>$Bokking,'AllowDeliveryCommission'=>$commison]);
        }
        else{
            OfficeTypeMaster::insert(
                ['OfficeTypeCode' => $request->OfficeCode,'OfficeTypeName'=>$request->OfficeTypeName ,'AllowBookingCommission'=>$Bokking,'AllowDeliveryCommission'=>$commison]
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OfficeSetup\OfficeTypeMaster  $officeTypeMaster
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
       
        $OfficeTypeMaster = OfficeTypeMaster::
        where('id',$request->OffcieTId)
       ->first();  
        echo json_encode($OfficeTypeMaster);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OfficeSetup\OfficeTypeMaster  $officeTypeMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(OfficeTypeMaster $officeTypeMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOfficeTypeMasterRequest  $request
     * @param  \App\Models\OfficeSetup\OfficeTypeMaster  $officeTypeMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOfficeTypeMasterRequest $request, OfficeTypeMaster $officeTypeMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OfficeSetup\OfficeTypeMaster  $officeTypeMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(OfficeTypeMaster $officeTypeMaster)
    {
        //
    }
}
