<?php

namespace App\Http\Controllers\OfficeSetup;

use App\Http\Requests\StoreCheckListMasterRequest;
use App\Http\Requests\UpdateCheckListMasterRequest;
use App\Models\OfficeSetup\CheckListMaster;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class CheckListMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
          
        if($request->filled('search')){
            $checkList = CheckListMaster::search($request->search)->
             orderBy('id')
            ->paginate(10);
            }
            else{
                $checkList = CheckListMaster::
                orderBy('id')
               ->paginate(10);  
            }
          return view('offcieSetup.checkList', [
              'checklist' => $checkList,
             'title'=>'Check List Master',
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
     * @param  \App\Http\Requests\StoreCheckListMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCheckListMasterRequest $request)
    { 
        $validated = $request->validated();
        if(isset($request->Mandatory) && $request->Mandatory=='Mandatory')
        {
         $man='Yes';
        }
        else{
            $man='No';  
        }
        if(isset($request->Cid) && $request->Cid !='')
        {
            CheckListMaster::where("id", $request->Cid)->update(['DocumentName' => $request->DocumentName,'Mandatory'=>$man]);
        }
        else{
            CheckListMaster::insert(
                ['DocumentName' => $request->DocumentName,'Mandatory'=>$man]
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OfficeSetup\CheckListMaster  $checkListMaster
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
         $checkList = CheckListMaster::
         where('id',$request->CheclListId)
        ->first();  
        echo json_encode($checkList);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OfficeSetup\CheckListMaster  $checkListMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(CheckListMaster $checkListMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCheckListMasterRequest  $request
     * @param  \App\Models\OfficeSetup\CheckListMaster  $checkListMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCheckListMasterRequest $request, CheckListMaster $checkListMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OfficeSetup\CheckListMaster  $checkListMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(CheckListMaster $checkListMaster)
    {
        //
    }
}
