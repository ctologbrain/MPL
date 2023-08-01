<?php

namespace App\Http\Controllers\AdminTool;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDocumentProofMasterRequest;
use App\Http\Requests\UpdateDocumentProofMasterRequest;
use App\Models\ToolAdmin\DocumentProofMaster;

class DocumentProofMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("AdminTool.documentProofMaster",
        ["title" =>"Document Proof Master" ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ToolAdmin\DocumentProofMaster  $documentProofMaster
     * @return \Illuminate\Http\Response
     */
    public function show(DocumentProofMaster $documentProofMaster)
    {
        //
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
