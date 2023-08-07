<?php

namespace App\Http\Controllers\AdminTool;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreHolidayMasterRequest;
use App\Http\Requests\UpdateHolidayMasterRequest;
use App\Models\ToolAdmin\HolidayMaster;
use App\Models\ToolAdmin\HolidayListMaster;
use App\Models\OfficeSetup\state;
use App\Models\OfficeSetup\city;
use Auth;
class HolidayMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->name;
        $list = HolidayMaster::with("HolidayDescDetails","cityDetails","stateDetails")->where(function($query) use( $search ){
            if( $search!=""){
                 $query->whereRelation("HolidayDescDetails", "HolidayName",'like','%'.$search .'%');
                 $query->orWhereRelation("cityDetails", "CityName",'like','%'.$search .'%');
                 $query->orWhereRelation("stateDetails", "name",'like','%'.$search .'%');
            }
        })->paginate(10);
        $description =  HolidayListMaster::where("Is_Active", "Yes")->get();
        return view("AdminTool.holidayMaster",
        ["title" =>"Holiday Master",
            "description" => $description,
            "list" => $list ]);
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
     * @param  \App\Http\Requests\StoreHolidayMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHolidayMasterRequest $request)
    {
        // 
        $UserId = Auth::id();
       $data = HolidayMaster::insertGetId(["StateCity"=> $request->StateCity ,"Start_date"=> date("Y-m-d", strtotime($request->Start_date)) ,
        "End_date"=> date("Y-m-d", strtotime($request->End_date)) ,"Description"=> $request->Description,"CreatedBy" => $UserId,
        "State" => $request->State ,  "City" => $request->City ]);
        if($data){
            echo "Holiday Added Successfully";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ToolAdmin\HolidayMaster  $holidayMaster
     * @return \Illuminate\Http\Response
     */
    public function show(HolidayMaster $holidayMaster, Request $request)
    {  
        if($request->Type==1){
        $htmlOne = '<select class="form-control selectBox" name="State" id="State" >';
         $state =   state::get();
            foreach($state as $key){
                $htmlOne .=   '<option value="'.$key->id.'">'.$key->name.'</option>';
            }
            $htmlOne .= '</select>';
            echo $htmlOne;
        }
        else if($request->Type==2){
            $city =   city::get();
            $html = '<select class="form-control selectBox" name="City" id="City"    >';
            foreach($city as $key){
                $html .=   '<option value="'.$key->id.'">'.$key->Code.'~'.$key->CityName.'</option>';
            }
            $html .= '</select>';
            echo $html;
        }
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ToolAdmin\HolidayMaster  $holidayMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(HolidayMaster $holidayMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHolidayMasterRequest  $request
     * @param  \App\Models\ToolAdmin\HolidayMaster  $holidayMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHolidayMasterRequest $request, HolidayMaster $holidayMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ToolAdmin\HolidayMaster  $holidayMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(HolidayMaster $holidayMaster)
    {
        //
    }
}
