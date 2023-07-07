<?php

namespace App\Http\Controllers\OfficeSetup;

use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Models\OfficeSetup\Department;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\AdminExports\DepartmentMasterExport;
class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword =$request->search;
            $Department = Department::orderBy('id')->where(function($query) use($keyword){
                if($keyword!=""){
                    $query->where("departments.DepartmentName" ,"like",'%'.$keyword.'%');
                    $query->orWhere("departments.ShortName",'like','%'.$keyword.'%');
                }
    })
             ->paginate(10);
             if($request->submit=="Download"){
                return   Excel::download(new DepartmentMasterExport($keyword), 'DepartmentMasterExport.xlsx');
            }
          return view('offcieSetup.DeptList', [
              'Department' => $Department,
              'title'=>'DEPARTMENT MASTER',
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
     * @param  \App\Http\Requests\StoreDepartmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepartmentRequest $request)
    {
        $validated = $request->validated();
    if(isset($request->deptId) && $request->deptId !='')
       {
        Department::where("id", $request->deptId)->update(['DepartmentName' => $request->DepartmentName,'ShortName'=>$request->ShortName,'DepartmentHead'=>$request->DepartmentHead,'DepartmentHeadEmail'=>$request->DepartmentHeadEmail]);
         echo 'Edit Successfully';
       }
       else{
      $check=  Department::where("DepartmentName",$request->DepartmentName)->first();
           if(empty($check)){
        Department::insert(
            ['DepartmentName' => $request->DepartmentName,'ShortName'=>$request->ShortName,'DepartmentHead'=>$request->DepartmentHead,'DepartmentHeadEmail'=>$request->DepartmentHeadEmail]
           );
            echo 'Add Successfully';
        }
        else{
            echo 'Department Name Already Exist';
        }
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OfficeSetup\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
       
       // $Department = Department::where('id',$request->id);
       $Department = Department::where('id',$request->id)->first();
       echo json_encode($Department);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OfficeSetup\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDepartmentRequest  $request
     * @param  \App\Models\OfficeSetup\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OfficeSetup\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        //
    }
}
