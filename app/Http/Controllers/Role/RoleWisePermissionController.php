<?php

namespace App\Http\Controllers\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleWisePermissionRequest;
use App\Http\Requests\UpdateRoleWisePermissionRequest;
use App\Models\Role\RoleWisePermission;
use Illuminate\Http\Request;
use App\Models\Role\RoleMaster;
use App\Models\Project\ProjectMaster;
use App\Models\Role\MainManu;
use App\Models\Role\RoleWithProjectMaster;
class RoleWisePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $RoleMaster=RoleMaster::get();
        return view('Role.rolewisepermission', [
            'title'=>'ROLE WISE MODULE PERMISSION',
            'RoleMaster'=>$RoleMaster
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
     * @param  \App\Http\Requests\StoreRoleWisePermissionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleWisePermissionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role\RoleWisePermission  $roleWisePermission
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $ProjectMaster=ProjectMaster::orderBy("project_masters.ProjectName","ASC")->get();
        $MainManu=MainManu::with('ParentMenuDetails','ProjectDetails')
        ->orderBy("MenuName","ASC")->get();
        $RoleWithProjectMaster=RoleWithProjectMaster::where('roleId',$request->RoleName)->get();
        $RoleWithMenu=RoleWisePermission::where('roleId',$request->RoleName)->get();
        $project=array();
        $menu=array();
         foreach($RoleWithProjectMaster as $roleAndProject)
         {
            $roleAProject=$roleAndProject->ProjectId;
            array_push($project,$roleAProject);
         }
         foreach($RoleWithMenu as $RoleAndMenu)
         {
            $RoleAmenu=$RoleAndMenu->MenuId;
            array_push($menu,$RoleAmenu);
         }
        
        return view('Role.rolewisepermissionView', [
           'ProjectMaster'=>$ProjectMaster,
           'MainManu'=>$MainManu,
           'RoleWithProjectMaster'=>$RoleWithProjectMaster,
           'project'=>$project,
           'menu'=>$menu
          ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role\RoleWisePermission  $roleWisePermission
     * @return \Illuminate\Http\Response
     */
    public function edit(RoleWisePermission $roleWisePermission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoleWisePermissionRequest  $request
     * @param  \App\Models\Role\RoleWisePermission  $roleWisePermission
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleWisePermissionRequest $request, RoleWisePermission $roleWisePermission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role\RoleWisePermission  $roleWisePermission
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoleWisePermission $roleWisePermission)
    {
        //
    }
}
