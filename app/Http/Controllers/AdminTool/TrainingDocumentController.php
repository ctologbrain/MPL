<?php

namespace App\Http\Controllers\AdminTool;

use App\Http\Requests\StoreTrainingDocumentRequest;
use App\Http\Requests\UpdateTrainingDocumentRequest;
use App\Models\ToolAdmin\TrainingDocument;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class TrainingDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("AdminTool.traningDocument",
        ["title" =>"Traning Document" ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ToolAdmin\TrainingDocument  $trainingDocument
     * @return \Illuminate\Http\Response
     */
    public function show(TrainingDocument $trainingDocument)
    {
        //
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
}
