<?php

namespace App\Http\Controllers\OfficeSetup;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoredesignationRequest;
use App\Http\Requests\UpdatedesignationRequest;
use App\Models\OfficeSetup\designation;
use Illuminate\Http\Request;
class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
         $keyword = $req->search;
            $designation = designation::with('designationParent')->where(function($query) use($keyword){
                if($keyword!=""){
                    $query->where("designations.DesignationName" ,"like",'%'.$keyword.'%');
                }
            })
            ->orderBy('id')
            ->paginate(10);
            $designation1 = designation::where('Parent_Id',null)->get();
            
          
          return view('offcieSetup.designationList', [
              'designation' => $designation,
              'designation1'=>$designation1,
             'title'=>'DESIGNATION MASTER',
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
     * @param  \App\Http\Requests\StoredesignationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredesignationRequest $request)
    {
        $validated = $request->validated();
         if(isset($request->DesignationId) && $request->DesignationId !='')
        {
            designation::where("id", $request->DesignationId)->update(['DesignationName' => $request->DesignationName,'Parent_Id'=>$request->ParentDesignation,'ShortName'=>$request->ShortName]);
            echo 'Edit Successfully';
        }
        else{
            designation::insert(
                ['DesignationName' => $request->DesignationName,'Parent_Id'=>$request->ParentDesignation,'ShortName'=>$request->ShortName]
            );
            echo 'Add Successfully';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OfficeSetup\designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $designation = designation::where('id',$request->id)
        ->first();
        echo json_encode($designation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OfficeSetup\designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function edit(designation $designation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedesignationRequest  $request
     * @param  \App\Models\OfficeSetup\designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedesignationRequest $request, designation $designation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OfficeSetup\designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function destroy(designation $designation)
    {
        //
    }
}
