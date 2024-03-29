<?php

namespace App\Http\Controllers\OfficeSetup;

use App\Http\Requests\StoreDeliveryProofMasterRequest;
use App\Http\Requests\UpdateDeliveryProofMasterRequest;
use App\Models\OfficeSetup\DeliveryProofMaster;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\AdminExports\DeliveryProofMasterExport;
class DeliveryProofMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $keyword = $req->search;
        $DpMaster=DeliveryProofMaster::with('userDataDetails')->orderBy('id')->where(function($query) use($keyword){
                if($keyword!=""){
                    $query->where("delivery_proof_masters.ProofCode" ,"like",'%'.$keyword.'%');
                      $query->orWhere("delivery_proof_masters.ProofName" ,"like",'%'.$keyword.'%');
                }
            })->paginate(10);
            if($req->submit=="Download"){
                return   Excel::download(new DeliveryProofMasterExport($keyword), 'DeliveryProofMasterExport.xlsx');
            }
        return view('offcieSetup.DeliveryProof', [
            'title'=>'DELIVERY PROOF',
            'DpMaster'=>$DpMaster
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
     * @param  \App\Http\Requests\StoreDeliveryProofMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeliveryProofMasterRequest $request)
    {
        $UserId =Auth::id();
        $validated = $request->validated();
        if(isset($request->Pdr) && $request->Pdr !='')
        {
            $Pdr='Yes'; 
        }
        else{
            $Pdr='No'; 
        }
        if(isset($request->Active) && $request->Active !='')
        {
            $Active='Yes'; 
        }
        else{
            $Active='No'; 
        }
        if(isset($request->Default) && $request->Default !='')
        {
            $Default='Yes'; 
        }
        else{
            $Default='No'; 
        }
        if(isset($request->Pci) && $request->Pci !='')
        {
            DeliveryProofMaster::where("id", $request->Pci)->update(['ProofCode' => $request->ProofCode,'ProofName'=> $request->ProofName,'Pdr'=>$Pdr,'Active'=>$Active,'Default'=>$Default]); 
             echo 'Edit Successfully';
        }
        else
        {
            DeliveryProofMaster::insert(
                ['ProofCode' => $request->ProofCode,'ProofName'=> $request->ProofName,'Pdr'=>$Pdr,'Active'=>$Active,'Default'=>$Default,'Created_By'=>$UserId]
               );
             echo 'Add Successfully';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OfficeSetup\DeliveryProofMaster  $deliveryProofMaster
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $DpMaster=DeliveryProofMaster::where('id',$request->id)->first();
        echo json_encode($DpMaster);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OfficeSetup\DeliveryProofMaster  $deliveryProofMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(DeliveryProofMaster $deliveryProofMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDeliveryProofMasterRequest  $request
     * @param  \App\Models\OfficeSetup\DeliveryProofMaster  $deliveryProofMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeliveryProofMasterRequest $request, DeliveryProofMaster $deliveryProofMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OfficeSetup\DeliveryProofMaster  $deliveryProofMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeliveryProofMaster $deliveryProofMaster)
    {
        //
    }
}
