<?php

namespace App\Http\Controllers\OfficeSetup;

use App\Http\Requests\StoreNdrMasterRequest;
use App\Http\Requests\UpdateNdrMasterRequest;
use App\Models\OfficeSetup\NdrMaster;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class NdrMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $NdrMaster=NdrMaster::orderBy('id')->paginate(10);
        return view('offcieSetup.NrdMaster', [
            'title'=>'NDR MASTER',
            'NdrMaster'=>$NdrMaster
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
     * @param  \App\Http\Requests\StoreNdrMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNdrMasterRequest $request)
    {
        $validated = $request->validated();
        if(isset($request->NDRReason) && $request->NDRReason !='')
        {
            $NDRReason='Yes'; 
        }
        else{
            $NDRReason='No'; 
        }
        if(isset($request->MobileReason) && $request->MobileReason !='')
        {
            $MobileReason='Yes'; 
        }
        else{
            $MobileReason='No'; 
        }
        if(isset($request->vrr) && $request->vrr !='')
        {
            $vrr='Yes'; 
        }
        else{
            $vrr='No'; 
        }
        if(isset($request->RTOReason) && $request->RTOReason !='')
        {
            $RTOReason='Yes'; 
        }
        else{
            $RTOReason='No'; 
        }
        if(isset($request->CustomerException) && $request->CustomerException !='')
        {
            $CustomerException='Yes'; 
        }
        else{
            $CustomerException='No'; 
        }
        if(isset($request->ReversePickup) && $request->ReversePickup !='')
        {
            $ReversePickup='Yes'; 
        }
        else{
            $ReversePickup='No'; 
        }
        if(isset($request->InternalNDR) && $request->InternalNDR !='')
        {
            $InternalNDR='Yes'; 
        }
        else{
            $InternalNDR='No'; 
        }
        if(isset($request->OffloadReason) && $request->OffloadReason !='')
        {
            $OffloadReason='Yes'; 
        }
        else{
            $OffloadReason='No'; 
        }
        if(isset($request->Rid) && $request->Rid !='')
        {
            NdrMaster::where("id", $request->Rid)->update(['ReasonCode' => $request->ReasonCode,'ReasonDetail'=> $request->ReasonDetail,'NDRReason'=>$NDRReason,'MobileReason'=>$MobileReason,'vrr'=>$vrr,'RTOReason'=>$RTOReason,'CustomerException'=>$CustomerException,'ReversePickup'=>$ReversePickup,'InternalNDR'=>$InternalNDR,'OffloadReason'=>$OffloadReason]); 
        }
        else
        {
            NdrMaster::insert(
                ['ReasonCode' => $request->ReasonCode,'ReasonDetail'=> $request->ReasonDetail,'NDRReason'=>$NDRReason,'MobileReason'=>$MobileReason,'vrr'=>$vrr,'RTOReason'=>$RTOReason,'CustomerException'=>$CustomerException,'ReversePickup'=>$ReversePickup,'InternalNDR'=>$InternalNDR,'OffloadReason'=>$OffloadReason]
               );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OfficeSetup\NdrMaster  $ndrMaster
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $NdrMaster=NdrMaster::where('id',$request->id)->first();
        echo json_encode($NdrMaster);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OfficeSetup\NdrMaster  $ndrMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(NdrMaster $ndrMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNdrMasterRequest  $request
     * @param  \App\Models\OfficeSetup\NdrMaster  $ndrMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNdrMasterRequest $request, NdrMaster $ndrMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OfficeSetup\NdrMaster  $ndrMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(NdrMaster $ndrMaster)
    {
        //
    }
}
