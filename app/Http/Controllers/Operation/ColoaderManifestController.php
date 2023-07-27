<?php

namespace App\Http\Controllers\Operation;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreColoaderManifestRequest;
use App\Http\Requests\UpdateColoaderManifestRequest;
use App\Models\Operation\ColoaderManifest;
use Illuminate\Http\Request;
use App\Models\OfficeSetup\OfficeMaster;
use App\Models\Vendor\VendorMaster;
use Auth;
class ColoaderManifestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $OfficeMaster=OfficeMaster::where("Is_Active","Yes")->get();
       $Vendor=VendorMaster::where("Active","Yes")->get();
               return view('Operation.ColoaderManifest', [
             'title'=>'Coloader Manifest',
             'OfficeMaster'=>$OfficeMaster,
             'Vendor'=>$Vendor
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
     * @param  \App\Http\Requests\StoreColoaderManifestRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreColoaderManifestRequest $request)
    {
       if($request->ManiFestid =='') {
        $manefest=ColoaderManifest::orderBy('id','DESC')->first();
        if(isset($manefest->Id))
        {
            $main='MANI000'.($manefest->Id+1);
        }
        else{
            $main='MANI0001'; 
        }
        $dateColoder = date("Y-m-d", strtotime($request->manifest_date)).' '.$request->manifestTime;
        $UserId=Auth::id();
        $lastId=ColoaderManifest::insertGetId(
            ['Manifest'=>$main,'Date' => $dateColoder,'Origin_Office'=>$request->origin_office,'Dest_Office'=>$request->destination_office ,'Vendor_Id'=>$request->vendor_name,'Vendor_Docket'=>$request->vendor_docket_no,'Vendor_Weight'=>$request->vendor_wt,'Remarks'=>$request->remark,'Created_By'=>$UserId]
        );
       $dataarray=array('maniFest'=>$main,'maniFestId'=>$lastId);
       echo json_encode($dataarray);
    }
    else{
        $dataarray=array('maniFest'=>$request->ManiFestName,'maniFestId'=>$request->ManiFestid);
        echo json_encode($dataarray);  
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\ColoaderManifest  $coloaderManifest
     * @return \Illuminate\Http\Response
     */
    public function show(ColoaderManifest $coloaderManifest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\ColoaderManifest  $coloaderManifest
     * @return \Illuminate\Http\Response
     */
    public function edit(ColoaderManifest $coloaderManifest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateColoaderManifestRequest  $request
     * @param  \App\Models\Operation\ColoaderManifest  $coloaderManifest
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateColoaderManifestRequest $request, ColoaderManifest $coloaderManifest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\ColoaderManifest  $coloaderManifest
     * @return \Illuminate\Http\Response
     */
    public function destroy(ColoaderManifest $coloaderManifest)
    {
        //
    }
}
