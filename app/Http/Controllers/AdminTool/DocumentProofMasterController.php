<?php

namespace App\Http\Controllers\AdminTool;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDocumentProofMasterRequest;
use App\Http\Requests\UpdateDocumentProofMasterRequest;
use App\Models\ToolAdmin\DocumentProofMaster;
use Auth;
class DocumentProofMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $listing=  DocumentProofMaster::paginate(10);
        return view("AdminTool.documentProofMaster",
        ["title" =>"Document Proof Master" ,
            "listing"=>$listing]);
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
     * @param  \App\Http\Requests\StoreDocumentProofMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocumentProofMasterRequest $request)
    {
       $userId = Auth::id();
        if($request->pid){
            $LatInsertId=DocumentProofMaster::where("id",$request->pid)->update(
                ['document'=>$request->document_proof_name,'Is_Active' => $request->Active]);
                echo "Document Edit successfully";
        }
        else{
            $LatInsertId=DocumentProofMaster::insertGetId(
                ['document'=>$request->document_proof_name, 
                'Is_Active' => $request->Active,
                'CreatedBy' =>$userId]);
                if( $LatInsertId){
                    echo "Document Added successfully";
                }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ToolAdmin\DocumentProofMaster  $documentProofMaster
     * @return \Illuminate\Http\Response
     */
    public function show(DocumentProofMaster $documentProofMaster, Request $request)
    {
        $ID = $request->id;
        $data = DocumentProofMaster::where("id",$ID )->first();
        echo json_encode($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ToolAdmin\DocumentProofMaster  $documentProofMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(DocumentProofMaster $documentProofMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocumentProofMasterRequest  $request
     * @param  \App\Models\ToolAdmin\DocumentProofMaster  $documentProofMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocumentProofMasterRequest $request, DocumentProofMaster $documentProofMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ToolAdmin\DocumentProofMaster  $documentProofMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocumentProofMaster $documentProofMaster)
    {
        //
    }
}
