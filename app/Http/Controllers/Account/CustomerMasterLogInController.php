<?php

namespace App\Http\Controllers\Account;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCustomerMasterLogInRequest;
use App\Http\Requests\UpdateCustomerMasterLogInRequest;
use App\Models\Account\CustomerMasterLogIn;
use App\Models\Account\CustomerMaster;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
class CustomerMasterLogInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 
        if(isset($request->search)){
            $search=$request->search;
        }
        else{
            $search='';
        }
       
        $Customer= CustomerMaster::where("Active","Yes")->get();
        $CustomerMasterData =  CustomerMaster::join("users","users.id","customer_masters.UserId")
        ->select('users.id as uid','customer_masters.CustomerCode','customer_masters.CustomerName','customer_masters.UserId','users.email','users.ViewPassowrd')->where(function($query) use($search){
            if($search!=''){
                $query->where("customer_masters.CustomerCode","like","%".$search."%");
                $query->orWhere("customer_masters.CustomerName","like","%".$search."%");
            }
        })->paginate(10);
        return view('Account.CustomerLogIN',[
            'title'=>'Customer LogIn',
            'Customer'=>$Customer,
            'CustomerMasterData'=>$CustomerMasterData
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
     * @param  \App\Http\Requests\StoreCustomerMasterLogInRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerMasterLogInRequest $request)
    {
        //
        $password = Hash::make($request->loginPassword);
        if(isset($request->hiddenId) && $request->hiddenId!=''){
            User::where("id",$request->hiddenId)->update(['name'=>$request->loginName,'email'=>$request->loginName, 'password'=>$password ,'ViewPassowrd'=>$request->loginPassword]);
            $returnVar ="Edit Successfully";
        }
        else{
           $check= CustomerMaster::where("customer_masters.id",$request->Customer)->first();
           if(isset($check->UserId)){
            User::where("id",$check->UserId)->update(['name'=>$request->loginName,'email'=>$request->loginName, 'password'=>$password ,'ViewPassowrd'=>$request->loginPassword]);
            $returnVar ="Existing User Edit Successfully";
           }
           else{
                $lastId = User::insertGetId(['name'=>$request->loginName,'email'=>$request->loginName, 'password'=>$password ,'ViewPassowrd'=>$request->loginPassword,"Role"=>22]);
                CustomerMaster::where("id",$request->Customer)->update(['UserId'=>$lastId]);
                $returnVar ="Add Successfully";
            }
        }
        echo $returnVar;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account\CustomerMasterLogIn  $customerMasterLogIn
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, CustomerMasterLogIn $customerMasterLogIn)
    {
        //
       $CustomerDetail= CustomerMaster::join("users","users.id","customer_masters.UserId")
       ->select('users.id as uid','customer_masters.CustomerCode','customer_masters.CustomerName','customer_masters.UserId','customer_masters.id as cid',
       'users.email','users.ViewPassowrd')
       ->where("users.id",$request->userId)->first();
       if(!empty($CustomerDetail)){
           echo json_encode($CustomerDetail);
       }
       else{
        echo json_encode(array());
       }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account\CustomerMasterLogIn  $customerMasterLogIn
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerMasterLogIn $customerMasterLogIn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerMasterLogInRequest  $request
     * @param  \App\Models\Account\CustomerMasterLogIn  $customerMasterLogIn
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerMasterLogInRequest $request, CustomerMasterLogIn $customerMasterLogIn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account\CustomerMasterLogIn  $customerMasterLogIn
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerMasterLogIn $customerMasterLogIn)
    {
        //
    }
}
