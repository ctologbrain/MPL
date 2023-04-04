<?php

namespace App\Http\Controllers\OfficeSetup;

use App\Http\Requests\StorestateRequest;
use App\Http\Requests\UpdatestateRequest;
use App\Models\OfficeSetup\state;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanySetup\CountryMaster;
class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $keyword= $req->search;
        $State = state::with('CountryDetails')->where(function($query) use($keyword){
                if($keyword!=""){
                    $query->where("states.StateCode" ,"like",'%'.$keyword.'%');
                     $query->orWhere("states.StateType" ,"like",'%'.$keyword.'%');
                }
            })->orderBy('id','DESC')->paginate(10);
        $country = CountryMaster::get();
      return view('offcieSetup.stateLsit', [
      'title'=>'State List',
      'State'=>$State,
      'country'=>$country
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
     * @param  \App\Http\Requests\StorestateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorestateRequest $request)
    {
        $validated = $request->validated();
       if(isset($request->sid) && $request->sid !='')
        {
            state::where("id", $request->sid)->update(['name' => $request->StateName,'country_id'=>$request->CountryName,'StateType'=>$request->StateType,'StateCode'=>$request->StateCode,'GSTNumber'=>$request->GSTNumber,'eWaybillGST'=>$request->eWaybillGSTNumber,'eWaybillLimit'=>$request->eWaybillLimit]);
        }
        else{
            state::insert(
            ['name' => $request->StateName,'country_id'=>$request->CountryName,'StateType'=>$request->StateType,'StateCode'=>$request->StateCode,'GSTNumber'=>$request->GSTNumber,'eWaybillGST'=>$request->eWaybillGSTNumber,'eWaybillLimit'=>$request->eWaybillLimit,'is_active'=>1]
           );
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OfficeSetup\state  $state
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $State = state::where('id',$request->id)->first();
        echo json_encode($State);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OfficeSetup\state  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(state $state)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatestateRequest  $request
     * @param  \App\Models\OfficeSetup\state  $state
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatestateRequest $request, state $state)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OfficeSetup\state  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(state $state)
    {
        //
    }
}
