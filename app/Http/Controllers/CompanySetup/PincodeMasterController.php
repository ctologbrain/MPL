<?php

namespace App\Http\Controllers\CompanySetup;

use App\Http\Requests\StorePincodeMasterRequest;
use App\Http\Requests\UpdatePincodeMasterRequest;
use App\Models\CompanySetup\PincodeMaster;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OfficeSetup\state;
use App\Models\OfficeSetup\city;
class PincodeMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        if($request->search !='')
        {
            $search=$request->search;
        }
        else{
            $search='';
        }
        $pincode=PincodeMaster::with('StateDetails','CityDetails')
        ->Where(function ($query) use ($search){ 
            $query ->orWhere('pincode_masters.PinCode', 'like', '%' . $search . '%');
            
        })->orderBy('id')->paginate();
        $state=state::get();
        return view('CompanySetup.PincodeList', [
            'title'=>'PINCODE MASTER',
            'state'=>$state,
            'pincode'=>$pincode
            
       ]);
    }
    public function getCityForState(Request $request)
    {
         $city=city::where('stateId',$request->id)->get();
         $html='';
         foreach($city as $citys)
         {
            if(isset($request->city) && $request->city ==$citys->id)
            {
            $html.='<option value="'.$citys->id.'" selected>'.$citys->Code.' ~ '.$citys->CityName.'</option>';
            }
            else
            {

            }
           $html.='<option value="'.$citys->id.'">'.$citys->Code.' ~ '.$citys->CityName.'</option>';
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
     * @param  \App\Http\Requests\StorePincodeMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePincodeMasterRequest $request)
    {
        $validated = $request->validated();
        if(isset($request->ARP) && $request->ARP=='ARP')
        {
         $ARP='Yes';
        }
        else
        {
         $ARP='No';  
        }
        if(isset($request->ODA) && $request->ODA=='ODA')
        {
         $ODA='Yes';
        }
        else
        {
         $ODA='No';  
        }
         $check= PincodeMaster::where("PinCode",$request->PinCode)->first();
      
        if(isset($request->pid) && $request->pid !='')
        {
            PincodeMaster::where("id", $request->pid)->update(['State' => $request->State,'city'=>$request->city,'PinCode'=>$request->PinCode,'ARP'=>$ARP,'ODA'=>$ODA]);
             echo 'Edit Successfully';
        }
        else{
             if(empty($check)){
            PincodeMaster::insert(
                ['State' => $request->State,'city'=>$request->city,'PinCode'=>$request->PinCode,'ARP'=>$ARP,'ODA'=>$ODA]
            );
             echo 'Add Successfully';
             }
            else{
            echo 'false';
            }
        }
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanySetup\PincodeMaster  $pincodeMaster
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $pincode=PincodeMaster::where('id',$request->id)->first();
        echo json_encode($pincode);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanySetup\PincodeMaster  $pincodeMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(PincodeMaster $pincodeMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePincodeMasterRequest  $request
     * @param  \App\Models\CompanySetup\PincodeMaster  $pincodeMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePincodeMasterRequest $request, PincodeMaster $pincodeMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanySetup\PincodeMaster  $pincodeMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(PincodeMaster $pincodeMaster)
    {
        //
    }
}
