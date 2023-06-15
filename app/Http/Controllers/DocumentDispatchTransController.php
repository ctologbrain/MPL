<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDocumentDispatchTransRequest;
use App\Http\Requests\UpdateDocumentDispatchTransRequest;
use App\Models\Operation\DocumentDispatchTrans;

class DocumentDispatchTransController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreDocumentDispatchTransRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocumentDispatchTransRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\DocumentDispatchTrans  $documentDispatchTrans
     * @return \Illuminate\Http\Response
     */
    public function show(DocumentDispatchTrans $documentDispatchTrans)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\DocumentDispatchTrans  $documentDispatchTrans
     * @return \Illuminate\Http\Response
     */
    public function edit(DocumentDispatchTrans $documentDispatchTrans)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocumentDispatchTransRequest  $request
     * @param  \App\Models\Operation\DocumentDispatchTrans  $documentDispatchTrans
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocumentDispatchTransRequest $request, DocumentDispatchTrans $documentDispatchTrans)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\DocumentDispatchTrans  $documentDispatchTrans
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocumentDispatchTrans $documentDispatchTrans)
    {
        //
    }
}
