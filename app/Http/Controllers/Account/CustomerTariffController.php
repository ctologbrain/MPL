<?php
namespace App\Http\Controllers\Account;
use App\Http\Controllers\Controller;
use App\Models\Account\CustomerMaster;
use App\Http\Requests\StoreCustomerTariffRequest;
use App\Http\Requests\UpdateCustomerTariffRequest;
use App\Models\Account\CustomerTariff;
use App\Models\Account\TariffType;
use App\Models\Account\CustomerTariffTrans;
use App\Models\Account\CustomerTariffSlab;
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
        $checkCustomer=CustomerTariff::where('Tarrif_Code',$request->tarrif_type)->where('Customer_Id',$request->customer_name)->first();
        if(empty($checkCustomer)){
        $LatId=CustomerTariff::insertGetId(
            ['Customer_Id' => $request->customer_name,'Wef_Date'=>$request->wef_date,'Tarrif_Code'=>$request->tarrif_type,'Created_by'=>$UserId]
        ); 
       }
       else{
        $LatId=$checkCustomer->Id;
       }
        $slab=$request->weight_slab;
        return view('Account.customerTariffModel', [
            'title'=>'CUSTOMER TARIFF',
            'slab'=>$slab,
            'LatId'=>$LatId,
            'data'=>$request->all()
           ]);
    }
    public function submitTarrifDataPost(Request $request)
    {
        $LatInsertId=CustomerTariffTrans::insertGetId(
            ['Tariff_M_ID' => $request->MasterId,'Origin'=>$request->originname,'Dest'=>$request->destination_name,'Mode'=>$request->mode_name,'Product_Type'=>$request->Product_Type,'Delivery_Type'=>$request->Delivery_Type,'Rate_type'=>$request->Rate_type,'TAT'=>$request->TAT,'Min_Amount'=>$request->Min_Amount]
        ); 
        if(!empty($request->Multi))
        {
            foreach($request->Multi as $rateValue)
            {
                CustomerTariffSlab::insert(
                    ['Tarrif_Id' => $LatInsertId,'Qty'=>$rateValue['CustTarrifQty'],'Rate'=>$rateValue['CustTarrifRate']]
                ); 

            }
        }
        $cuatomerTraffSlab=CustomerTariffSlab::
            leftjoin('Cust_Tariff_Trans','Cust_Tariff_Trans.Id','=','Cust_Tarrif_Slabs.Tarrif_Id')
            ->leftjoin('devilery_types','devilery_types.id','=','Cust_Tariff_Trans.Delivery_Type')
            ->leftjoin('products','products.id','=','Cust_Tariff_Trans.Product_Type')
            ->select('Cust_Tarrif_Slabs.Qty','Cust_Tarrif_Slabs.Rate','devilery_types.Title','Cust_Tariff_Trans.Mode','products.ProductName','products.ProductCode')
            ->where('Cust_Tariff_Trans.Tariff_M_ID',$request->MasterId)
            ->get();
            $html='';
            $html.='<table class="table-responsive table-bordered" width="100%"><thead><tr class="main-title text-dark"><th>Delivery Type</th><th>Mode</th><th>Prodcut</th><th>Qty</th><th>Rate</th><tr></thead><tbody>';
            foreach($cuatomerTraffSlab as $slab)
            {
                if($slab->Mode==1)
                {
                    $slb='AIR';
                }
                if($slab->Mode==2)
                {
                    $slb='ROAD';
                }
                if($slab->Mode==3)
                {
                    $slb='TRAIN';
                }
                if($slab->Mode==4)
                {
                    $slb='COURIER';
                }
                $html.='<tr><td>'.$slab->Title.'</td><td>'.$slb.'</td><td>'.$slab->ProductName.'</td><td>'.$slab->Qty.'</td><td>'.$slab->Rate.'</td></tr>'; 
            }
            $html.='<tbody></table>';
            echo $html;
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
