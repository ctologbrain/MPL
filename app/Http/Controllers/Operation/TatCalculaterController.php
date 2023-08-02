<?php
namespace App\Http\Controllers\Operation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\StoreTatCalculaterRequest;
use App\Http\Requests\UpdateTatCalculaterRequest;
use App\Models\Operation\TatCalculater;
use App\Models\Operation\DocketMaster;
class TatCalculaterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Operation.TatCaculater', [
            'title'=>'TAT CALCULATOR',
            
        ]);
    }
    public function getTatCalculater(Request $request)
    {
      $docket=DocketMaster::where('Docket_No',$request->Docket)->first();
      echo "<pre>";
      print_r($docket);
      die;

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
     * @param  \App\Http\Requests\StoreTatCalculaterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTatCalculaterRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\TatCalculater  $tatCalculater
     * @return \Illuminate\Http\Response
     */
    public function show(TatCalculater $tatCalculater)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\TatCalculater  $tatCalculater
     * @return \Illuminate\Http\Response
     */
    public function edit(TatCalculater $tatCalculater)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTatCalculaterRequest  $request
     * @param  \App\Models\Operation\TatCalculater  $tatCalculater
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTatCalculaterRequest $request, TatCalculater $tatCalculater)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\TatCalculater  $tatCalculater
     * @return \Illuminate\Http\Response
     */
    public function destroy(TatCalculater $tatCalculater)
    {
        //
    }
}
