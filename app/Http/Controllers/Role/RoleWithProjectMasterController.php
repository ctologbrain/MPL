<?php

namespace App\Http\Controllers\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleWithProjectMasterRequest;
use App\Http\Requests\UpdateRoleWithProjectMasterRequest;
use App\Models\Role\RoleWithProjectMaster;
use App\Models\Role\RoleWisePermission;
use Illuminate\Http\Request;
class RoleWithProjectMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         RoleWisePermission::where('roleId',$request->RoleName)->delete();
        foreach($request->menu as $menuS)
        {
            RoleWisePermission::insert(['roleId' => $request->RoleName,'MenuId'=>$menuS]);
        }
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
     * @param  \App\Http\Requests\StoreRoleWithProjectMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleWithProjectMasterRequest $request)
    {
        RoleWithProjectMaster::where('roleId',$request->RoleName)->delete();
        foreach($request->project as $projects)
        {
            RoleWithProjectMaster::insert(['roleId' => $request->RoleName,'ProjectId'=>$projects]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role\RoleWithProjectMaster  $roleWithProjectMaster
     * @return \Illuminate\Http\Response
     */
    public function show(RoleWithProjectMaster $roleWithProjectMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role\RoleWithProjectMaster  $roleWithProjectMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(RoleWithProjectMaster $roleWithProjectMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoleWithProjectMasterRequest  $request
     * @param  \App\Models\Role\RoleWithProjectMaster  $roleWithProjectMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleWithProjectMasterRequest $request, RoleWithProjectMaster $roleWithProjectMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role\RoleWithProjectMaster  $roleWithProjectMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoleWithProjectMaster $roleWithProjectMaster)
    {
        //
    }
}
