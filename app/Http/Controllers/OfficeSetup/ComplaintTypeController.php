<?php

namespace App\Http\Controllers\OfficeSetup;

use App\Http\Requests\StoreComplaintTypeRequest;
use App\Http\Requests\UpdateComplaintTypeRequest;
use App\Models\OfficeSetup\ComplaintType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\AdminExports\ComplainTypeExport;
use Auth;
class ComplaintTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
     
        $keyword = $req->search;
        $ComplaintType = ComplaintType::with('GetUserDett')->orderBy('id')->where(function($query) use($keyword){
                if($keyword!=""){
                    $query->where("complaint_types.ComplaintType" ,"like",'%'.$keyword.'%');
                }
            })
            ->paginate(10);
            if($req->submit=="Download"){
                return   Excel::download(new ComplainTypeExport($keyword), 'ComplainTypeExport.xlsx');
            }
        return view('offcieSetup.ComplaintType', [
           'title'=>'COMPLAINT TYPE',
           'ComplaintType'=>$ComplaintType
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
     * @param  \App\Http\Requests\StoreComplaintTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComplaintTypeRequest $request)
    {
        $UserId = Auth::id();
        $validated = $request->validated();
        if(isset($request->CaseOpen) && $request->CaseOpen !='')
        {
            $cp='Yes'; 
        }
        else{
            $cp='No'; 
        }
            
        
        if(isset($request->Cid) && $request->Cid !='')
       {
        ComplaintType::where("id", $request->Cid)->update(['ComplaintType' => $request->ComplaintType,'CaseOpen'=>$cp]);
          echo 'Edit Successfully';
       }
       else{
        $check=  ComplaintType::where("ComplaintType",$request->ComplaintType)->first();
        if(empty($check)){
        ComplaintType::insert(
            ['ComplaintType' => $request->ComplaintType,'CaseOpen'=>$cp,"Created_By"=>$UserId]
           );
          echo 'Add Successfully';
        }
        else{
            echo 'Complaint Type  Already Exist';
        }
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OfficeSetup\ComplaintType  $complaintType
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $ComplaintType = ComplaintType::where('id',$request->id)
        ->first();
       echo json_encode($ComplaintType);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OfficeSetup\ComplaintType  $complaintType
     * @return \Illuminate\Http\Response
     */
    public function edit(ComplaintType $complaintType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateComplaintTypeRequest  $request
     * @param  \App\Models\OfficeSetup\ComplaintType  $complaintType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateComplaintTypeRequest $request, ComplaintType $complaintType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OfficeSetup\ComplaintType  $complaintType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ComplaintType $complaintType)
    {
        //
    }
}
