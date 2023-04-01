<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoredocketTrackingRequest;
use App\Http\Requests\UpdatedocketTrackingRequest;
use App\Models\Operation\docketTracking;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
class DocketTrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->get('docket') !='')
        {
            $docket=$request->get('docket');
            $data=Storage::disk('local')->get($docket);
        }
        else{
            $data='';
        }
       
         return view('Operation.docketTracking', [
             'title'=>'DOCKET TRACKING',
             'data'=>$data
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
     * @param  \App\Http\Requests\StoredocketTrackingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredocketTrackingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\docketTracking  $docketTracking
     * @return \Illuminate\Http\Response
     */
    public function show(docketTracking $docketTracking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\docketTracking  $docketTracking
     * @return \Illuminate\Http\Response
     */
    public function edit(docketTracking $docketTracking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedocketTrackingRequest  $request
     * @param  \App\Models\Operation\docketTracking  $docketTracking
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedocketTrackingRequest $request, docketTracking $docketTracking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\docketTracking  $docketTracking
     * @return \Illuminate\Http\Response
     */
    public function destroy(docketTracking $docketTracking)
    {
        //
    }
}
