<?php

namespace App\Http\Controllers\Operation;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreEditDocketBookingRequest;
use App\Http\Requests\UpdateEditDocketBookingRequest;
use App\Models\Operation\EditDocketBooking;
use Illuminate\Http\Request;
use Auth;

use App\Models\OfficeSetup\employee;
use App\Models\Stock\DocketAllocation;
use App\Models\Operation\DocketProductDetails;
use App\Models\Operation\DocketInvoiceDetails;
use App\Models\Operation\DocketMaster;
use App\Models\Operation\DocketBookingType;

use App\Models\CompanySetup\PincodeMaster;
use App\Models\Account\CustomerMaster;
use App\Models\Operation\DevileryType;
use App\Models\Operation\PackingMethod;
use App\Models\Operation\DocketInvoiceType;
use App\Models\Operation\DocketProduct;

use App\Models\Operation\TariffType;

class EditDocketBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $UserId=Auth::id();
        $Offcie=employee::select('office_masters.id','office_masters.OfficeCode','office_masters.OfficeName','office_masters.City_id','office_masters.Pincode','employees.id as EmpId')
        ->leftjoin('office_masters','office_masters.id','=','employees.OfficeName')
        ->where('employees.user_id',$UserId)->first();
        
        $destpincode=PincodeMaster::select('pincode_masters.*','cities.CityName','cities.Code')
        ->leftjoin('cities','cities.id','=','pincode_masters.city')
        ->get();
      
        $pincode=PincodeMaster::select('pincode_masters.*','cities.CityName','cities.Code')
        ->leftjoin('cities','cities.id','=','pincode_masters.city')
        ->where('pincode_masters.city',$Offcie->City_id)->get();
         $customer=CustomerMaster::select('id','CustomerCode','CustomerName')->get();
       $employee=employee::select('id','EmployeeCode','EmployeeName')->get();

       $DevileryType=DevileryType::get();
       $PackingMethod=PackingMethod::get();
       $DocketInvoiceType=DocketInvoiceType::get();
       $DocketProduct=DocketProduct::get();
        $DocketBookingType = DocketBookingType::get();

        return view('Operation.EditDocketBooking', [
            'title'=>'EDIT DOCKET BOOKING',
            'Offcie'=>$Offcie,
            'pincode'=>$pincode,
            'customer'=>$customer,
            'employee'=>$employee,
            'BookingType'=>$DocketBookingType,
            'DevileryType'=>$DevileryType,
            'PackingMethod'=>$PackingMethod,
            'DocketInvoiceType'=>$DocketInvoiceType,
            'destpincode'=>$destpincode,
            'DocketProduct'=>$DocketProduct
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
     * @param  \App\Http\Requests\StoreEditDocketBookingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEditDocketBookingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\EditDocketBooking  $editDocketBooking
     * @return \Illuminate\Http\Response
     */
    public function show(Reques $req ,EditDocketBooking $editDocketBooking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\EditDocketBooking  $editDocketBooking
     * @return \Illuminate\Http\Response
     */
    public function edit(EditDocketBooking $editDocketBooking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEditDocketBookingRequest  $request
     * @param  \App\Models\Operation\EditDocketBooking  $editDocketBooking
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEditDocketBookingRequest $request, EditDocketBooking $editDocketBooking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\EditDocketBooking  $editDocketBooking
     * @return \Illuminate\Http\Response
     */
    public function destroy(EditDocketBooking $editDocketBooking)
    {
        //
    }
}
