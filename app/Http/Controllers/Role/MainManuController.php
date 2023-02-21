<?php

namespace App\Http\Controllers\Role;

use App\Http\Requests\StoreMainManuRequest;
use App\Http\Requests\UpdateMainManuRequest;
use App\Models\Role\MainManu;
use App\Models\Project\ProjectMaster;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role\ParentManu;
class MainManuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ParentManu=ParentManu::get();
        $Project=ProjectMaster::get();
        $MainManu=MainManu::with('ParentMenuDetails','ProjectDetails')->paginate(10);
        return view('Role.MainMenu', [
            'title'=>'Main Menu',
            'ParentManu'=>$ParentManu,
            'Project'=>$Project,
            'MainManu'=>$MainManu
         
           
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
     * @param  \App\Http\Requests\StoreMainManuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMainManuRequest $request)
    {
        if(isset($request->pid) && $request->pid !='')
        {
          
            MainManu::where("id",$request->pid)->update(['ParentMenu' => $request->ParentMenu,'MenuName'=>$request->MenuName,'MenuIcon'=>$request->MenuIcon,'projectName'=>$request->projectName]);
        }
        else{
            MainManu::insert(
                ['ParentMenu' => $request->ParentMenu,'MenuIcon'=>$request->MenuIcon,'MenuName'=>$request->MenuName,'projectName'=>$request->projectName]
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role\MainManu  $mainManu
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $MainManu=MainManu::where('id',$request->id)->first();
        echo json_encode($MainManu);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role\MainManu  $mainManu
     * @return \Illuminate\Http\Response
     */
    public function edit(MainManu $mainManu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMainManuRequest  $request
     * @param  \App\Models\Role\MainManu  $mainManu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMainManuRequest $request, MainManu $mainManu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role\MainManu  $mainManu
     * @return \Illuminate\Http\Response
     */
    public function destroy(MainManu $mainManu)
    {
        //
    }
}
