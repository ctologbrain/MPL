<?php


namespace App\Http\Controllers\Role;

use App\Http\Requests\StoreRoleMasterRequest;
use App\Http\Requests\UpdateRoleMasterRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role\ParentManu;
class ParentManuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ParentManu=ParentManu::paginate(10);
        return view('Role.ParentMenu', [
            'title'=>'Parent Menu',
            'ParentManu'=>$ParentManu
           
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
     * @param  \App\Http\Requests\StoreParentManuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(isset($request->pid) && $request->pid !='')
        {
            ParentManu::where("id", $request->pid)->update(['ParentMenu' => $request->ParentMenu,'MenuIcon'=>$request->MenuIcon]);
        }
        else{
            ParentManu::insert(
                ['ParentMenu' => $request->ParentMenu,'MenuIcon'=>$request->MenuIcon]
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role\ParentManu  $parentManu
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $ParentManu=ParentManu::where('id',$request->id)->first();
        echo json_encode($ParentManu);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role\ParentManu  $parentManu
     * @return \Illuminate\Http\Response
     */
    public function edit(ParentManu $parentManu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateParentManuRequest  $request
     * @param  \App\Models\Role\ParentManu  $parentManu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateParentManuRequest $request, ParentManu $parentManu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role\ParentManu  $parentManu
     * @return \Illuminate\Http\Response
     */
    public function destroy(ParentManu $parentManu)
    {
        //
    }
}
