<?php

namespace App\Http\Controllers\CompanySetup;

use App\Http\Requests\StoreBankMasterRequest;
use App\Http\Requests\UpdateBankMasterRequest;
use App\Models\CompanySetup\BankMaster;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class BankMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Bank=BankMaster::orderBy('id')
        ->paginate(10);  
        return view('CompanySetup.Bankdetails', [
            'title'=>'BANK MASTER',
            'Bank'=>$Bank
            
            
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
     * @param  \App\Http\Requests\StoreBankMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBankMasterRequest $request)
    {
        $validated = $request->validated();
      if(isset($request->Bid) && $request->Bid !='')
        {
            BankMaster::where("id", $request->Bid)->update(['BankCode' => $request->BankCode,'BankName'=>$request->BankName]);
        }
        else{
            BankMaster::insert(
                ['BankCode' => $request->BankCode,'BankName'=>$request->BankName]
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanySetup\BankMaster  $bankMaster
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $Bank=BankMaster::where('id',$request->id)->first();
        echo json_encode($Bank);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanySetup\BankMaster  $bankMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(BankMaster $bankMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBankMasterRequest  $request
     * @param  \App\Models\CompanySetup\BankMaster  $bankMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBankMasterRequest $request, BankMaster $bankMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanySetup\BankMaster  $bankMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(BankMaster $bankMaster)
    {
        //
    }
}
