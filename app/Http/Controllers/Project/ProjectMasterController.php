<?php

namespace App\Http\Controllers\Project;

use App\Http\Requests\StoreProjectMasterRequest;
use App\Http\Requests\UpdateProjectMasterRequest;
use App\Models\Project\ProjectMaster;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ProjectMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ProjectMaster=ProjectMaster::paginate(10);
        return view('Project.ProjectList', [
            'title'=>'ROLE MASTER',
            'ProjectMaster'=>$ProjectMaster
            
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
     * @param  \App\Http\Requests\StoreProjectMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectMasterRequest $request)
    {
        if(isset($request->IsActive) && $request->IsActive)
        {
         $IsActive='Yes';
        }
        else{
           $IsActive='No';  
        }
        if(isset($request->Pid) && $request->Pid !='')
        {
            ProjectMaster::where("id", $request->Pid)->update(['ProjectName' => $request->ProjectName,'ProjectUrl'=>$request->ProjectUrl,'ProjectIcon'=>$request->ProjectIcon,'isActive'=>$IsActive]);
        }
        else{
            ProjectMaster::insert(
                ['ProjectName' => $request->ProjectName,'ProjectUrl'=>$request->ProjectUrl,'ProjectIcon'=>$request->ProjectIcon,'isActive'=>$IsActive]
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project\ProjectMaster  $projectMaster
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $project=ProjectMaster::where('id',$request->id)->first();
        echo json_encode($project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project\ProjectMaster  $projectMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectMaster $projectMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectMasterRequest  $request
     * @param  \App\Models\Project\ProjectMaster  $projectMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectMasterRequest $request, ProjectMaster $projectMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project\ProjectMaster  $projectMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectMaster $projectMaster)
    {
        //
    }
}
