<?php

namespace App\Http\Controllers\CompanySetup;

use App\Http\Requests\StoreBankMasterRequest;
use App\Http\Requests\UpdateBankMasterRequest;
use App\Models\CompanySetup\BankMaster;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\AdminExports\BankMasterExport;
use Auth;
class BankMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->search !='')
        {
            $search=$request->search;
        }
        else{
            $search='';
        }
        $Bank=BankMaster::with("GetUserDett")
        ->Where(function ($query) use ($search){ 
            $query ->Where('bank_masters.BankCode', 'like', '%' . $search . '%');
            $query ->orWhere('bank_masters.BankName', 'like', '%' . $search . '%');
            
        })->orderBy('id')
        ->paginate(10);  
        if($request->submit=="Download"){
            return   Excel::download(new BankMasterExport($search), 'BankMasterExport.xlsx');
        }
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
    { $UserId = Auth::id();
        $validated = $request->validated();
         $check= BankMaster::where("BankCode",$request->BankCode)->first();
     
          if(isset($request->Bid) && $request->Bid !='')
            {
                BankMaster::where("id", $request->Bid)->update(['BankCode' => $request->BankCode,'BankName'=>$request->BankName,'BranchName'=>$request->BranchName,'BranchAdd'=>$request->BranchAdd
                ,'NameAsAccount'=>$request->NameAsAccount,'AccountType'=>$request->AccountType,'AccountNo'=>$request->AccountNo,'Active'=>$request->Active,'IfscCode'=>$request->IfscCode]);
                echo 'Edit Successfully';
            }
            else{
                  if(empty($check)){
                BankMaster::insert(
                    ['BankCode' => $request->BankCode,'BankName'=>$request->BankName,'BranchName'=>$request->BranchName,'BranchAdd'=>$request->BranchAdd
                    ,'NameAsAccount'=>$request->NameAsAccount,'AccountType'=>$request->AccountType,'AccountNo'=>$request->AccountNo,'Active'=>$request->Active,'IfscCode'=>$request->IfscCode,"Created_By"=>$UserId]
                );
                echo 'Add Successfully';
                }
               else{
                echo 'false';
               }
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
