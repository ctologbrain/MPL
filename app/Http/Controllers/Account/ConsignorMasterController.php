<?php

namespace App\Http\Controllers\Account;

use App\Http\Requests\StoreConsignorMasterRequest;
use App\Http\Requests\UpdateConsignorMasterRequest;
use App\Models\Account\ConsignorMaster;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account\CustomerMaster;
class ConsignorMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Cust=CustomerMaster::get();
        $Consignor=ConsignorMaster::with('CustAddress')->orderBy('id')->paginate(10);
        return view('Account.ConsignorList', [
            'title'=>'PICKUP LOCATION MASTER',
            'Cust'=>$Cust,
            'Consignor'=>$Consignor
            
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
     * @param  \App\Http\Requests\StoreConsignorMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConsignorMasterRequest $request)
    {
        if(isset($request->PickupChargeApplicable))
        {
           $PickupChargeApplicable='Yes';
        }
        else{
          $PickupChargeApplicable='No';
        }
        if(isset($request->Cid) && $request->Cid !='')
        {
            ConsignorMaster::where("id", $request->Cid)->update(
                ['CustId'=>$request->CustomerName,'ServiceType' => $request->ServiceType,'ConsignorName'=>$request->ConsignorName,'PickupChargesAmount'=>$request->PickupChargesAmount,'GSTNo'=>$request->GSTNo,'PANNo' => $request->PANNo,'Address1' => $request->Address1,'Address2' => $request->Address2,'City' => $request->City,'Phone' => $request->Phone,'Mobile' => $request->Mobile,'Email' => $request->Email,'PickupCharge' => $PickupChargeApplicable]
               );
        }
        else{
            ConsignorMaster::insert(
                ['CustId'=>$request->CustomerName,'ServiceType' => $request->ServiceType,'ConsignorName'=>$request->ConsignorName,'PickupChargesAmount'=>$request->PickupChargesAmount,'GSTNo'=>$request->GSTNo,'PANNo' => $request->PANNo,'Address1' => $request->Address1,'Address2' => $request->Address2,'City' => $request->City,'Phone' => $request->Phone,'Mobile' => $request->Mobile,'Email' => $request->Email,'PickupCharge' => $PickupChargeApplicable]
              );
        }

            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account\ConsignorMaster  $consignorMaster
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $Consignor=ConsignorMaster::where('id',$request->id)->first();
        echo json_encode($Consignor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account\ConsignorMaster  $consignorMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(ConsignorMaster $consignorMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateConsignorMasterRequest  $request
     * @param  \App\Models\Account\ConsignorMaster  $consignorMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConsignorMasterRequest $request, ConsignorMaster $consignorMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account\ConsignorMaster  $consignorMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConsignorMaster $consignorMaster)
    {
        //
    }
}
