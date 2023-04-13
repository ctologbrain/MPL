<?php
namespace App\Http\Controllers\Account;
use App\Http\Controllers\Controller;
use App\Models\Account\CustomerMaster;
use App\Http\Requests\StoreCustomerTariffRequest;
use App\Http\Requests\UpdateCustomerTariffRequest;
use App\Models\Account\CustomerTariff;
use App\Models\Account\TariffType;
use App\Models\OfficeSetup\city;
use App\Models\OfficeSetup\Product;
use App\Models\Operation\DevileryType;
use Illuminate\Http\Request;
use Auth;
class CustomerTariffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer=CustomerMaster::get();
        $city=city::get();
        $Product=Product::get();
        $DevileryType=DevileryType::get();
        $TariffType=TariffType::get();
        return view('Account.customerTariff', [
            'title'=>'CUSTOMER TARIFF',
            'customer'=>$customer,
            'city'=>$city,
            'Product'=>$Product,
            'DevileryType'=>$DevileryType,
            'TariffType'=>$TariffType
          ]);
    }
    public function CusomerTafiffModel(Request $request)
    {

        $UserId=Auth::id();
        $LatId=CustomerTariff::insertGetId(
            ['Customer_Id' => $request->customer_name,'Wef_Date'=>$request->wef_date,'Tarrif_Code'=>$request->tarrif_type,'Created_by'=>$UserId]
        ); 
        $slab=$request->weight_slab;
        return view('Account.customerTariffModel', [
            'title'=>'CUSTOMER TARIFF',
            'slab'=>$slab,
            'LatId'=>$LatId,
            'data'=>$request->all()
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
     * @param  \App\Http\Requests\StoreCustomerTariffRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerTariffRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account\CustomerTariff  $customerTariff
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerTariff $customerTariff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account\CustomerTariff  $customerTariff
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerTariff $customerTariff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerTariffRequest  $request
     * @param  \App\Models\Account\CustomerTariff  $customerTariff
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerTariffRequest $request, CustomerTariff $customerTariff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account\CustomerTariff  $customerTariff
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerTariff $customerTariff)
    {
        //
    }
}
