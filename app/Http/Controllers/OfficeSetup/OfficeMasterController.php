<?php

namespace App\Http\Controllers\OfficeSetup;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOfficeMasterRequest;
use App\Http\Requests\UpdateOfficeMasterRequest;
use App\Models\OfficeSetup\OfficeMaster;
use App\Models\OfficeSetup\OfficeTypeMaster;
use App\Models\OfficeSetup\state;
use App\Models\OfficeSetup\city;
use Illuminate\Http\Request;
use App\Models\CompanySetup\PincodeMaster;
class OfficeMasterController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $officeType=OfficeTypeMaster::get();
      
        $office=OfficeMaster::select('id','OfficeCode','OfficeName')->get();
        if($request->filled('search')){
            $officeDetails = OfficeMaster::search($request->search)
            ->orderBy('id')->paginate(10);
          }
          else{
            $officeDetails=OfficeMaster::with('StatesDetails')->orderBy('id') ->paginate(10);
          }
      
         $State=state::get();
         return view('offcieSetup.officeList',[
          'title'=>'OFFICE MASTER',
          'offcieType'=>$officeType,
          'office'=>$office,
          'officeDetails'=>$officeDetails,
          'State'=>$State,
         
       ]);
    }
    public function getPinCode(Request $request)
    {
        $Pincode=PincodeMaster::where('city',$request->CityId)->get();
       
        $html='';
        foreach($Pincode as $Pincodes)
        {
            $html.='<option value="'.$Pincodes->id.'">'.$Pincodes->PinCode.'</option>';   
        }
        echo $html;
    }
    public function getCity(Request $request)
    {
        $city=city::where('stateId',$request->stateid)->get();
        $html='';
        $html.='<option value="">--select--</option>';
        foreach($city as $cities)
        {
            $html.='<option value="'.$cities->id.'">'.$cities->CityName.'</option>';   
        }
        echo $html;
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
     * @param  \App\Http\Requests\StoreOfficeMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOfficeMasterRequest $request)
    {
        $validated = $request->validated();
        if(isset($request->Officeid) && $request->Officeid !='')
        {
            OfficeMaster::where("id", $request->Officeid)->update(['OfficeType' => $request->OffcieType,'ParentOffice'=>$request->ParentOffice,'GSTNo'=>$request->GSTNo,'OfficeCode'=>$request->OfficeCode,'OfficeName'=>$request->OfficeName,'ContactPerson'=>$request->ContactPerson,'OfficeAddress'=>$request->OfficeAddress,'State_id'=>$request->State,'City_id'=>$request->City,'Pincode'=>$request->Pincode,'MobileNo'=>$request->MobileNo,'PhoneNo'=>$request->PhoneNo,'PersonalNo'=>$request->PersonalNo,'EmailID'=>$request->EmailID]);
        }
        else
        {
            OfficeMaster::insert(
                ['OfficeType' => $request->OffcieType,'ParentOffice'=>$request->ParentOffice,'GSTNo'=>$request->GSTNo,'OfficeCode'=>$request->OfficeCode,'OfficeName'=>$request->OfficeName,'ContactPerson'=>$request->ContactPerson,'OfficeAddress'=>$request->OfficeAddress,'State_id'=>$request->State,'City_id'=>$request->City,'Pincode'=>$request->Pincode,'MobileNo'=>$request->MobileNo,'PhoneNo'=>$request->PhoneNo,'PersonalNo'=>$request->PersonalNo,'EmailID'=>$request->EmailID ]
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OfficeSetup\OfficeMaster  $officeMaster
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $officeDetails=OfficeMaster::with('StatesDetails','OfficeTypeMasterDetails','OfficeMasterParent','StatesDetails','CityDetails')->where('id',$request->officeId)->first();
        echo json_encode($officeDetails);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OfficeSetup\OfficeMaster  $officeMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(OfficeMaster $officeMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOfficeMasterRequest  $request
     * @param  \App\Models\OfficeSetup\OfficeMaster  $officeMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOfficeMasterRequest $request, OfficeMaster $officeMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OfficeSetup\OfficeMaster  $officeMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(OfficeMaster $officeMaster)
    {
        //
    }
}
