<?php

namespace App\Http\Controllers\Cash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreExpenceClaimSpecialRequest;
use App\Http\Requests\UpdateExpenceClaimSpecialRequest;
use App\Models\Cash\ExpenceClaimSpecial;

class ExpenceClaimSpecialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  view("Cash.expenseClaimedSpecial",[
            "title" => "Expense Claimed Special"
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
     * @param  \App\Http\Requests\StoreExpenceClaimSpecialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExpenceClaimSpecialRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cash\ExpenceClaimSpecial  $expenceClaimSpecial
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenceClaimSpecial $expenceClaimSpecial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cash\ExpenceClaimSpecial  $expenceClaimSpecial
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpenceClaimSpecial $expenceClaimSpecial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExpenceClaimSpecialRequest  $request
     * @param  \App\Models\Cash\ExpenceClaimSpecial  $expenceClaimSpecial
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExpenceClaimSpecialRequest $request, ExpenceClaimSpecial $expenceClaimSpecial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cash\ExpenceClaimSpecial  $expenceClaimSpecial
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpenceClaimSpecial $expenceClaimSpecial)
    {
        //
    }
}
