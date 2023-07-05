<?php

namespace App\Http\Controllers\OfficeSetup;

use App\Http\Requests\StoreCheckListMasterRequest;
use App\Http\Requests\UpdateCheckListMasterRequest;
use App\Models\OfficeSetup\CheckListMaster;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\AdminExports\DriverChecklistExport;
class CheckListMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        $keyword = $request->search;
       
        $checkList = CheckListMaster::where(function($query) use($keyword){
                if($keyword!=""){
                    $query->where("check_list_masters.DocumentName" ,"like",'%'.$keyword.'%');
                }
        })
               ->orderBy('id')
               ->paginate(10);  
               if($request->submit=="Download"){
                return   Excel::download(new DriverChecklistExport($keyword), 'DriverChecklistExport.xlsx');
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
             echo 'Edit Successfully';
        }
        else{
           $Check = CheckListMaster::where("DocumentName", $request->DocumentName)->first();
            if(!empty($Check)){
                echo 'Document Name Already Exist';
                
            }
            else{
            CheckListMaster::insert(
                ['DocumentName' => $request->DocumentName,'Mandatory'=>$man]
            );
             echo 'Add Successfully';
            }
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
