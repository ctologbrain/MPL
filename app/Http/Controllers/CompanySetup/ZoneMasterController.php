<?php

namespace App\Http\Controllers\CompanySetup;

use App\Http\Requests\StoreZoneMasterRequest;
use App\Http\Requests\UpdateZoneMasterRequest;
use App\Models\CompanySetup\ZoneMaster;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanySetup\CountryMaster;
class ZoneMasterController extends Controller
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
        $country = CountryMaster::get();
        $zone=ZoneMaster::
        Where(function ($query) use ($search){ 
            $query ->orWhere('zone_masters.ZoneName', 'like', '%' . $search . '%');
            
        })->
        orderBy('id')->paginate(10);
        return view('CompanySetup.ZoneList', [
            'title'=>'Zone List',
            'country'=>$country,
            'zone'=>$zone
           
            
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
     * @param  \App\Http\Requests\StoreZoneMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreZoneMasterRequest $request)
    {
        $validated = $request->validated();
        if(isset($request->zid) && $request->zid !='')
               {
                ZoneMaster::where("id", $request->zid)->update(['CountryName' => $request->CountryName,'ZoneName'=>$request->ZoneName]);
               }
               else{
                ZoneMaster::insert(
                    ['CountryName' => $request->CountryName,'ZoneName'=>$request->ZoneName]
                   );
               }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanySetup\ZoneMaster  $zoneMaster
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $zone=ZoneMaster::where('id',$request->id)->first();
        echo json_encode($zone);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanySetup\ZoneMaster  $zoneMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(ZoneMaster $zoneMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateZoneMasterRequest  $request
     * @param  \App\Models\CompanySetup\ZoneMaster  $zoneMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateZoneMasterRequest $request, ZoneMaster $zoneMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanySetup\ZoneMaster  $zoneMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(ZoneMaster $zoneMaster)
    {
        //
    }
}
