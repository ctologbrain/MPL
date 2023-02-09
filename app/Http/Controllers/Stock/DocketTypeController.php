<?php

namespace App\Http\Controllers\Stock;

use App\Http\Requests\StoreDocketTypeRequest;
use App\Http\Requests\UpdateDocketTypeRequest;
use App\Models\Stock\DocketType;
use App\Models\Stock\DocketCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class DocketTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docketCat=DocketCategory::get();
        $docketType=DocketType::with('CaegoryDetails')->orderBy('id')->paginate(10);  
         return view('Stock.DocketTYpe', [
           'title'=>'DOCKET TYPE MASTER',
           'docketCat'=>$docketCat,
           'docketType'=>$docketType
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
     * @param  \App\Http\Requests\StoreDocketTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocketTypeRequest $request)
    {
        $validated = $request->validated();
       if(isset($request->Did) && $request->Did !='')
        {
            DocketType::where("id", $request->Did)->update(['Code' => $request->TypeCode,'Title'=>$request->TypeName ,'Cat_Id'=>$request->Typecategory,'Rate'=>$request->ItemPrice]);
        }
        else{
            DocketType::insert(
                ['Code' => $request->TypeCode,'Title'=>$request->TypeName ,'Cat_Id'=>$request->Typecategory,'Rate'=>$request->ItemPrice]
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock\DocketType  $docketType
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $docketType=DocketType::where('id',$request->id)->first(); 
        echo json_encode($docketType); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock\DocketType  $docketType
     * @return \Illuminate\Http\Response
     */
    public function edit(DocketType $docketType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocketTypeRequest  $request
     * @param  \App\Models\Stock\DocketType  $docketType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocketTypeRequest $request, DocketType $docketType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock\DocketType  $docketType
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocketType $docketType)
    {
        //
    }
}
