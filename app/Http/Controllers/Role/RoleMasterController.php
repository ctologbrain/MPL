<?php

namespace App\Http\Controllers\Role;

use App\Http\Requests\StoreRoleMasterRequest;
use App\Http\Requests\UpdateRoleMasterRequest;
use App\Models\Role\RoleMaster;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class RoleMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->filled('search')){
            $role = RoleMaster::search($request->search)->
             orderBy('id')
            ->paginate(10);
            }
            else{
                $role = RoleMaster::
                orderBy('id')
               ->paginate(10);  
            }
        return view('Role.roleList', [
          'title'=>'ROLE MASTER',
          'role'=>$role
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
     * @param  \App\Http\Requests\StoreRoleMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleMasterRequest $request)
    {
        $validated = $request->validated();
        if(isset($request->defaultRole) && $request->defaultRole)
        {
         $defaultRole='Yes';
        }
        else{
           $defaultRole='No';  
        }
        if(isset($request->Active) && $request->Active)
        {
         $Active='Yes';
        }
        else{
           $Active='No';  
        }
        if(isset($request->bypassSecurity) && $request->bypassSecurity)
        {
         $bypassSecurity='Yes';
        }
        else{
           $bypassSecurity='No';  
        }
        if(isset($request->Rid) && $request->Rid !='')
        {
            RoleMaster::where("id", $request->Rid)->update(['RoleName' => $request->RoleName,'Description'=>$request->Description,'defaultRole'=>$defaultRole,'Active'=>$Active,'bypassSecurity'=>$bypassSecurity]);
        }
        else{
            RoleMaster::insert(
                ['RoleName' => $request->RoleName,'Description'=>$request->Description,'defaultRole'=>$defaultRole,'Active'=>$Active,'bypassSecurity'=>$bypassSecurity]
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role\RoleMaster  $roleMaster
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $role = RoleMaster::where('id',$request->id)->first();
        echo json_encode($role);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role\RoleMaster  $roleMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(RoleMaster $roleMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoleMasterRequest  $request
     * @param  \App\Models\Role\RoleMaster  $roleMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleMasterRequest $request, RoleMaster $roleMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role\RoleMaster  $roleMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoleMaster $roleMaster)
    {
        //
    }
}
