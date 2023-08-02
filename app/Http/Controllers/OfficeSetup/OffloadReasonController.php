<?php

namespace App\Http\Controllers\OfficeSetup;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\StoreOffloadReasonRequest;
use App\Http\Requests\UpdateOffloadReasonRequest;
use App\Models\Operation\OffloadReason;

class OffloadReasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Reason=OffloadReason::paginate(10);
    
        return view('OfficeSetup.OffloadReason', [
             'title'=>'Offload Reason',
             'Reason'=>$Reason
          
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
     * @param  \App\Http\Requests\StoreOffloadReasonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOffloadReasonRequest $request)
    {
        //
        OffloadReason::insert(['Title',$request->Title]);
        echo "Add Successfully";

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\OffloadReason  $offloadReason
     * @return \Illuminate\Http\Response
     */
    public function show(OffloadReason $offloadReason)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\OffloadReason  $offloadReason
     * @return \Illuminate\Http\Response
     */
    public function edit(OffloadReason $offloadReason)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOffloadReasonRequest  $request
     * @param  \App\Models\Operation\OffloadReason  $offloadReason
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOffloadReasonRequest $request, OffloadReason $offloadReason)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\OffloadReason  $offloadReason
     * @return \Illuminate\Http\Response
     */
    public function destroy(OffloadReason $offloadReason)
    {
        //
    }
}
