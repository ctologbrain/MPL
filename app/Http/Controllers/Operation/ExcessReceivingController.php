<?php

namespace App\Http\Controllers\Operation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\StoreExcessReceivingRequest;
use App\Http\Requests\UpdateExcessReceivingRequest;
use App\Models\Operation\ExcessReceiving;
use App\Models\OfficeSetup\OfficeMaster;
use Auth;
class ExcessReceivingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $offcie = OfficeMaster::select('office_masters.*')->get();
        return view('Operation.excessReceiving', [
            'title'=>'Excess Receiving',
            'offcie' => $offcie]);
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
     * @param  \App\Http\Requests\StoreExcessReceivingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExcessReceivingRequest $request)
    {
        //
        $UserId = Auth::id();
        $getMutiDocket = explode(",",$request->DocketNumber);
        foreach($getMutiDocket as $docket){
        $data= array("Receiving_office"=> $request->office,
            "Receiving_date"=> $request->rdate,
            "GatepassId"=> $request->gatePassId,
            "Remark"=> $request->Remark,
            "DocketNo"=> $docket,
            "Created_By"=>$UserId);
            ExcessReceiving::insert($data);
        }
        echo "Excess Received Successfully";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\ExcessReceiving  $excessReceiving
     * @return \Illuminate\Http\Response
     */
    public function show(ExcessReceiving $excessReceiving)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\ExcessReceiving  $excessReceiving
     * @return \Illuminate\Http\Response
     */
    public function edit(ExcessReceiving $excessReceiving)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExcessReceivingRequest  $request
     * @param  \App\Models\Operation\ExcessReceiving  $excessReceiving
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExcessReceivingRequest $request, ExcessReceiving $excessReceiving)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\ExcessReceiving  $excessReceiving
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExcessReceiving $excessReceiving)
    {
        //
    }
}
