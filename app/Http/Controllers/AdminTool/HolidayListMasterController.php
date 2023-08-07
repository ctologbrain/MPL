<?php

namespace App\Http\Controllers\AdminTool;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreHolidayListMasterRequest;
use App\Http\Requests\UpdateHolidayListMasterRequest;
use App\Models\ToolAdmin\HolidayListMaster;
use Auth;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\HolidayListMasterExport;
class HolidayListMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->name;
        $Listing =  HolidayListMaster::where(function($query) use( $search ){
            if( $search!=""){
                 $query->where("HolidayName",'like','%'.$search .'%');
            }
        })->paginate(10);
       if($request->submit =="Download"){
        return  Excel::download(new HolidayListMasterExport(), 'HolidayListMasterReport.xlsx');
       }
        return view("AdminTool.holidayMasterList",
        ["title" =>"Holiday Master List",
          "Listing" =>$Listing ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHolidayListMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHolidayListMasterRequest $request)
    {
        $UserId =  Auth::id();
        if(isset($request->pid)){
          $data=  HolidayListMaster::where("id", $request->pid)->update(["HolidayName" =>$request->HolidayName, "Is_Active" => $request->Active ]);
          if($data){
              echo "Holiday List Edit Successfully";
          }
        }
        else{
         $check =   HolidayListMaster::where("HolidayName", $request->HolidayName)->first();
         if(empty($check)){
         $data =   HolidayListMaster::insertGetId(["HolidayName" =>$request->HolidayName, "Is_Active" => $request->Active, "CreatedBy"=> $UserId ]);
            if($data){
                echo "Holiday List Added Successfully";
            }
        }
        else{
            echo "Holiday Already exist";
        }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ToolAdmin\HolidayListMaster  $holidayListMaster
     * @return \Illuminate\Http\Response
     */
    public function show(HolidayListMaster $holidayListMaster, Request $request)
    {
      $data =  HolidayListMaster::where("id",$request->id)->first();
      echo json_encode($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ToolAdmin\HolidayListMaster  $holidayListMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(HolidayListMaster $holidayListMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHolidayListMasterRequest  $request
     * @param  \App\Models\ToolAdmin\HolidayListMaster  $holidayListMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHolidayListMasterRequest $request, HolidayListMaster $holidayListMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ToolAdmin\HolidayListMaster  $holidayListMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(HolidayListMaster $holidayListMaster)
    {
        //
    }
}
