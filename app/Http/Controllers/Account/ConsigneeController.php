<?php

namespace App\Http\Controllers\Account;
use App\Models\Account\CustomerMaster;
use App\Http\Requests\StoreConsigneeRequest;
use App\Http\Requests\UpdateConsigneeRequest;
use App\Models\Account\Consignee;
use App\Models\Account\ConsignorMaster;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class ConsigneeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Consnr=ConsignorMaster::get();
        $Consignor=Consignee::with('CustAddress')->orderBy('id')->paginate(10);
      // echo '<pre>'; print_r($Consignor); die;
        return view('Account.ConsigneeList', [
            'title'=>'CONSIGNEE MASTER',
            'Consnr'=>$Consnr,
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
     * @param  \App\Http\Requests\StoreConsigneeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreConsigneeRequest $request)
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
            Consignee::where("id", $request->Cid)->update(
                ['CustId'=>$request->CustomerName,'ServiceType' => $request->ServiceType,'ConsignorName'=>$request->ConsignorName,'PickupChargesAmount'=>$request->PickupChargesAmount,'GSTNo'=>$request->GSTNo,'PANNo' => $request->PANNo,'Address1' => $request->Address1,'Address2' => $request->Address2,'City' => $request->City,'Phone' => $request->Phone,'Mobile' => $request->Mobile,'Email' => $request->Email,'PickupCharge' => $PickupChargeApplicable]
               );
        }
        else{
            Consignee::insert(
                ['CustId'=>$request->CustomerName,'ServiceType' => $request->ServiceType,'ConsignorName'=>$request->ConsignorName,'PickupChargesAmount'=>$request->PickupChargesAmount,'GSTNo'=>$request->GSTNo,'PANNo' => $request->PANNo,'Address1' => $request->Address1,'Address2' => $request->Address2,'City' => $request->City,'Phone' => $request->Phone,'Mobile' => $request->Mobile,'Email' => $request->Email,'PickupCharge' => $PickupChargeApplicable]
              );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account\Consignee  $consignee
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        
        $Consignee=Consignee::where('id',$request->id)->first();
        echo json_encode($Consignee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account\Consignee  $consignee
     * @return \Illuminate\Http\Response
     */
    public function edit(Consignee $consignee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateConsigneeRequest  $request
     * @param  \App\Models\Account\Consignee  $consignee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConsigneeRequest $request, Consignee $consignee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account\Consignee  $consignee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consignee $consignee)
    {
        //
    }
}
