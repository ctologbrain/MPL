<?php

namespace App\Http\Controllers\OfficeSetup;

use App\Http\Requests\StorecityRequest;
use App\Http\Requests\UpdatecityRequest;
use App\Models\OfficeSetup\city;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanySetup\ZoneMaster;
use App\Models\OfficeSetup\state;
use Maatwebsite\Excel\Facades\Excel;
use App\AdminExports\CityMasterExport;
class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
         $keyword = $req->search;
        $zone=ZoneMaster::get();
        $state=state::get();
        $city=city::orderBy('id','DESC')->with('ZoneDetails','StateDetails')->where(function($query) use($keyword){
                if($keyword!=""){
                    $query->where("cities.Code" ,"like",'%'.$keyword.'%');
                     $query->orWhere("cities.CityName" ,"like",'%'.$keyword.'%');
                }
            })->paginate(10);
        if($req->submit=="Download"){
            return   Excel::download(new CityMasterExport($keyword), 'CityMasterExport.xlsx');
        }
        return view('offcieSetup.CityList', [
           'title'=>'City Master',
           'Zone'=>$zone,
           'state'=>$state,
           'city'=>$city
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
     * @param  \App\Http\Requests\StorecityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecityRequest $request)
    {
        $validated = $request->validated();
       
        if(isset($request->MetroCity) && $request->MetroCity !='')
        {
            $MetroCity='Yes'; 
        }
        else{
            $MetroCity='No'; 
        }
        if(isset($request->AirportExists) && $request->AirportExists !='')
        {
            $AirportExists='Yes'; 
        }
        else{
            $AirportExists='No'; 
        }
         $check= city::where("Code",$request->CityCode)->orWhere("CityName",$request->CityName)->first();
      
        if(isset($request->cid) && $request->cid !='')
        {
            city::where("id", $request->cid)->update(['CityName' => $request->CityName,'Code'=> $request->CityCode,'stateId'=>$request->StateName,'ZoneName'=>$request->ZoneName,'MetroCity'=>$MetroCity,'AirportExists'=>$AirportExists]); 
            echo 'Edit Successfully';
        }
        else
        {
             if(empty($check)){
            city::insert(
                ['CityName' => $request->CityName,'Code'=> $request->CityCode,'stateId'=>$request->StateName,'ZoneName'=>$request->ZoneName,'MetroCity'=>$MetroCity,'AirportExists'=>$AirportExists]
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
     * @param  \App\Models\OfficeSetup\city  $city
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $city=city::where('id',$request->id)->first();
        echo json_encode($city);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OfficeSetup\city  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(city $city)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecityRequest  $request
     * @param  \App\Models\OfficeSetup\city  $city
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecityRequest $request, city $city)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OfficeSetup\city  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(city $city)
    {
        //
    }

    public function GetCityDetailsForSearch(Request $request){
         $page=$request->page;
        $resultCount = 10;
        $end = ($page - 1) * $resultCount;       
        $start = $end + $resultCount;
        $search=$request->term;
        if($request->term=='?')
        {
            $cityMaster=city::select('id','Code','CityName')->offset($end)->limit($start)->get();
        }
        else{
            $cityMaster=city::select('id','Code','CityName')
            ->Where(function ($query) use ($search){ 
               $query ->where('CityName', 'like', '%' . $search . '%');
                $query ->orWhere('Code', 'like', '%' . $search . '%');
            
                })
                ->offset($end)->limit($start)->get();
        }
        
        $count=COUNT($cityMaster);
        $data = [];
        foreach($cityMaster as $vendor)
        {
              $cityName=$vendor->Code.'~'.$vendor->CityName;
              $data[]=['id'=>$vendor->id,'col'=>$cityName,'total_count'=>$count];
             
         
        }
        echo json_encode($data);
    }
}
