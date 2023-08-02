<?php
namespace App\Http\Controllers\Sales;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCODTransferRequest;
use App\Http\Requests\UpdateCODTransferRequest;
use App\Models\Sales\CODTransfer;
use App\Models\Account\CustomerMaster;
class CODTransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Cust=CustomerMaster::get();
        return view('Sales.CodDeposite', [
            'title'=>'COD DEPOSIT',
            'Cust'=>$Cust,
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
     * @param  \App\Http\Requests\StoreCODTransferRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCODTransferRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sales\CODTransfer  $cODTransfer
     * @return \Illuminate\Http\Response
     */
    public function show(CODTransfer $cODTransfer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sales\CODTransfer  $cODTransfer
     * @return \Illuminate\Http\Response
     */
    public function edit(CODTransfer $cODTransfer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCODTransferRequest  $request
     * @param  \App\Models\Sales\CODTransfer  $cODTransfer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCODTransferRequest $request, CODTransfer $cODTransfer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sales\CODTransfer  $cODTransfer
     * @return \Illuminate\Http\Response
     */
    public function destroy(CODTransfer $cODTransfer)
    {
        //
    }
}
