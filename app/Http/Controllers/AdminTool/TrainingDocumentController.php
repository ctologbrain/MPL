<?php

namespace App\Http\Controllers\AdminTool;

use App\Http\Requests\StoreTrainingDocumentRequest;
use App\Http\Requests\UpdateTrainingDocumentRequest;
use App\Models\ToolAdmin\TrainingDocument;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TrainingDocExport;
class TrainingDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
       $doc= TrainingDocument::paginate(10);
       if($request->submit =="Download"){
        return  Excel::download(new TrainingDocExport(), 'TrainingDocumentsReport.xlsx');
       }
        return view("AdminTool.traningDocument",
        ["title" =>"Traning Document" ,
        "doc"=>$doc]);
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
     * @param  \App\Http\Requests\StoreTrainingDocumentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrainingDocumentRequest $request)
    {
       $UserId = Auth::id();
       
        if($request->pid){
            $file = $request->file('Attachment');
            if(isset($file)){
                $fileName =  $file->getClientOriginalName().date("YmdHis");
                $dest = public_path('Training_Doc');
                $file->move($dest ,$fileName);
                $link ="public/Training_Doc/".$fileName;
                $Id=    TrainingDocument::where("id",$request->pid)->update(["Process_Name"=> $request->Process_Name,
                "Description"=> $request->Description,"Document_Name"=> $request->Document_Name,
                "Access_Role"=> $request->Access_Role, "Attachment"=> $link]);
            }
            else{
                $Id=    TrainingDocument::where("id",$request->pid)->update(["Process_Name"=> $request->Process_Name,
                "Description"=> $request->Description,"Document_Name"=> $request->Document_Name,
                "Access_Role"=> $request->Access_Role ]);
            }
           
            if($Id){
                echo "Training Document Edit Successfully";
            }
        }
        else{
            $file = $request->file('Attachment');
            if(isset($file)){
                $fileName =  $file->getClientOriginalName().date("YmdHis");
                $dest = public_path('Training_Doc');
                $file->move($dest ,$fileName);
                $link ="public/Training_Doc/".$fileName;
            }
            else{
                $link ="";
            }
         $Id=   TrainingDocument::insertGetId(["Process_Name"=> $request->Process_Name,
            "Description"=> $request->Description,"Document_Name"=> $request->Document_Name,
            "Access_Role"=> $request->Access_Role, "Attachment"=> $link,
            "CreatedBy"=>  $UserId]);
            if($Id){
                echo "Training Document Added Successfully";
            }
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ToolAdmin\TrainingDocument  $trainingDocument
     * @return \Illuminate\Http\Response
     */
    public function show(TrainingDocument $trainingDocument, Request $request)
    {
      $data =  TrainingDocument::where("id" , $request->id)->first();
      echo json_encode($data); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ToolAdmin\TrainingDocument  $trainingDocument
     * @return \Illuminate\Http\Response
     */
    public function edit(TrainingDocument $trainingDocument)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTrainingDocumentRequest  $request
     * @param  \App\Models\ToolAdmin\TrainingDocument  $trainingDocument
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTrainingDocumentRequest $request, TrainingDocument $trainingDocument)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ToolAdmin\TrainingDocument  $trainingDocument
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrainingDocument $trainingDocument)
    {
        //
    }

    public function TrainingDocumentDelete(Request $request){
      $id=  $request->id;
      TrainingDocument::where("id", $id)->delete();
      echo "Deleted Successfully";
    }
}
