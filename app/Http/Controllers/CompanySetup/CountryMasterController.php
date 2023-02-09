<?php

namespace App\Http\Controllers\CompanySetup;

use App\Http\Requests\StoreCountryMasterRequest;
use App\Http\Requests\UpdateCountryMasterRequest;
use App\Models\CompanySetup\CountryMaster;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class CountryMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->filled('search')){
        $Country = CountryMaster::search($request->search)->
        orderBy('id')
       ->paginate(10);  
        }
        else{
            $Country = CountryMaster::
            orderBy('id')
           ->paginate(10);  
        }
       
        return view('CompanySetup.CountryList', [
            'title'=>'Country List',
            'Country'=>$Country
            
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
     * @param  \App\Http\Requests\StoreCountryMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCountryMasterRequest $request)
    {
        $validated = $request->validated();
        if(isset($request->International) && $request->International !='')
        {
            $In='Yes'; 
        }
        else{
            $In='No'; 
        }
            
        
        if(isset($request->Cid) && $request->Cid !='')
       {
        CountryMaster::where("id", $request->Cid)->update(['CountryName' => $request->CountryName,'CurrencyName'=>$request->CurrencyName,'International'=>$In]);
       }
       else{
        CountryMaster::insert(
            ['CountryName' => $request->CountryName,'CurrencyName'=>$request->CurrencyName,'International'=>$In]
           );
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanySetup\CountryMaster  $countryMaster
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $Country = CountryMaster::where('id',$request->id)->first(); 
        echo json_encode($Country);
        
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanySetup\CountryMaster  $countryMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(CountryMaster $countryMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCountryMasterRequest  $request
     * @param  \App\Models\CompanySetup\CountryMaster  $countryMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCountryMasterRequest $request, CountryMaster $countryMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanySetup\CountryMaster  $countryMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(CountryMaster $countryMaster)
    {
        //
    }
}
