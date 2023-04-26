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
use App\Models\OfficeSetup\state;
use App\Models\OfficeSetup\Product;
use App\Models\Operation\DevileryType;
use App\Models\CompanySetup\ZoneMaster;
use App\Models\CompanySetup\PincodeMaster;
use Illuminate\Http\Request;
use Auth;
class CustomerTariffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Responsephp artisan make:model Account/CustomerInvoice -a
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
        if(isset($request->MasterId))
        {
          $LatIdMaster=$request->MasterId; 
        }
        else{
            $checkCustTraff=CustomerTariff::where('Customer_Id',$request->customer_name)->whereDate('Wef_Date',$request->wef_date)->where('Tarrif_Code',$request->tarrif_type)->first();
           if(isset($checkCustTraff->Id))
           {
             $LatIdMaster=$checkCustTraff->Id;
           }
           else{
            $LatIdMaster=CustomerTariff::insertGetId(
                ['Customer_Id' => $request->customer_name,'Wef_Date'=>$request->wef_date,'Tarrif_Code'=>$request->tarrif_type,'Created_by'=>$UserId]
                );
           }
           
        }
        $origin=explode(',',$request->originname);
        $Dest=explode(',',$request->destination_name);
        foreach($origin as $getorignin)
        {
           
           foreach($Dest as $checkDest) 
           {
              $LatInsertId=CustomerTariffTrans::insertGetId(
                ['Tariff_M_ID' =>$LatIdMaster,'Origin'=>$getorignin,'Dest'=>$checkDest,'Mode'=>$request->mode_name,'Product_Type'=>$request->Product_Type,'Delivery_Type'=>$request->Delivery_Type,'Rate_type'=>$request->RateType,'TAT'=>$request->TAT,'Min_Amount'=>$request->Min_Amount]
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

           }

        }
        $cuatomerTraffSlab=CustomerTariffSlab::
            leftjoin('Cust_Tariff_Trans','Cust_Tariff_Trans.Id','=','Cust_Tarrif_Slabs.Tarrif_Id')
            ->leftjoin('devilery_types','devilery_types.id','=','Cust_Tariff_Trans.Delivery_Type')
            ->leftjoin('cities as SourceCity','SourceCity.id','=','Cust_Tariff_Trans.Origin')
            ->leftjoin('cities as DestCity','DestCity.id','=','Cust_Tariff_Trans.Dest')
            ->leftjoin('states as SourceState','SourceState.id','=','Cust_Tariff_Trans.Origin')
            ->leftjoin('states as DestState','DestState.id','=','Cust_Tariff_Trans.Dest')
            ->leftjoin('zone_masters as SourceZone','SourceZone.id','=','Cust_Tariff_Trans.Origin')
            ->leftjoin('zone_masters as DestZone','DestZone.id','=','Cust_Tariff_Trans.Dest')
            ->leftjoin('pincode_masters as SourcePinCode','SourcePinCode.id','=','Cust_Tariff_Trans.Origin')
            ->leftjoin('pincode_masters as DestPinCode','DestPinCode.id','=','Cust_Tariff_Trans.Dest')
            ->leftjoin('products','products.id','=','Cust_Tariff_Trans.Product_Type')
            ->select('Cust_Tarrif_Slabs.Qty','Cust_Tarrif_Slabs.Rate','SourceCity.CityName as SourceCity','DestCity.CityName as DestCity',
              'SourceState.name as SourceState','DestState.name as DestState','SourceZone.ZoneName as SourceZone','DestZone.ZoneName as DestZone',
              'SourcePinCode.PinCode as SourcePinCode','DestPinCode.PinCode as DestPinCode'
            ,'devilery_types.Title','Cust_Tariff_Trans.Mode','products.ProductName','products.ProductCode','Cust_Tariff_Trans.Rate_type')
            ->where('Cust_Tariff_Trans.Tariff_M_ID',$LatIdMaster)
            ->get();
            $html='';
            $html.='<table class="table-responsive table-bordered" width="100%"><thead><tr class="main-title text-dark"><th>Origin</th><th>Destination</th><th>Delivery Type</th><th>Mode</th><th>Product</th><th>Rate Type</th><th>Qty</th><th>Rate</th><tr></thead><tbody>';
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
                if($request->tarrif_type==1)
                {
                    $origin=$slab->SourceCity;
                    $dest=$slab->DestCity;
                }
                if($request->tarrif_type==2)
                {
                    $origin=$slab->SourceState;
                    $dest=$slab->DestState;
                }
                if($request->tarrif_type==3)
                {
                    $origin=$slab->SourceZone;
                    $dest=$slab->DestZone;
                }
                if($request->tarrif_type==4)
                {
                    $origin=$slab->SourcePinCode;
                    $dest=$slab->DestPinCode;
                }

                if($slab->Rate_type==1){
                    $rateType= 'PER KG';
                }
                if($slab->Rate_type==2){
                    $rateType= 'PER BOXS';
                }
                $html.='<tr><td>'.$origin.'</td><td>'.$dest.'</td><td>'.$slab->Title.'</td><td>'.$slb.'</td><td>'.$slab->ProductName.'</td><td>'.$rateType.'</td><td>'.$slab->Qty.'</td><td>'.$slab->Rate.'</td></tr>'; 
            }
            $html.='<tbody></table>';
            $datas=array('status'=>'true','lastId'=>$LatIdMaster,'table'=>$html);
            echo  json_encode($datas);
      
       
       
        // $slab=$request->weight_slab;
        // return view('Account.customerTariffModel', [
        //     'title'=>'CUSTOMER TARIFF',
        //     'slab'=>$slab,
        //     'LatId'=>$LatId,
        //     'data'=>$request->all()
        //    ]);
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
            $html.='<table class="table-responsive table-bordered" width="100%"><thead><tr class="main-title text-dark"><th>Delivery Type</th><th>Mode</th><th>Product</th><th>Qty</th><th>Rate</th><tr></thead><tbody>';
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
    public function TarrifTypeAccoToS(Request $request)
    {
        if($request->ttype==1)
        {
            $city=city::get(); 
            $html='';
            $html.='<option value="">--select--</option>';
            foreach($city as $cityLsit)
            {
              $html.='<option value="'.$cityLsit->id.'">'.$cityLsit->Code.'~'.$cityLsit->CityName.'</option>';
           }
           echo $html;
        }
        
        if($request->ttype==2)
        {
            $state=state::get(); 
            $html='';
            $html.='<option value="">--select--</option>';
            foreach($state as $StateLsit)
            {
              $html.='<option value="'.$StateLsit->id.'">'.$StateLsit->name.'</option>';
           }
           echo $html;
        }
        if($request->ttype==3)
        {
            $zone=ZoneMaster::get(); 
            $html='';
            $html.='<option value="">--select--</option>';
            foreach($zone as $ZoneLsit)
            {
              $html.='<option value="'.$ZoneLsit->id.'">'.$ZoneLsit->ZoneName.'</option>';
           }
           echo $html;
        }
        if($request->ttype==4)
        {
            $Pincode=PincodeMaster::with('StateDetails','CityDetails')->get(); 
            $html='';
            $html.='<option value="">--select--</option>';
            foreach($Pincode as $PinLsit)
            {
                if(isset($PinLsit->CityDetails->CityName))
                {
              $html.='<option value="'.$PinLsit->id.'">'.$PinLsit->PinCode.'~'.$PinLsit->StateDetails->name.'~'.$PinLsit->CityDetails->CityName.'</option>';
                }
             }
           echo $html;
        }
    }
    public function TarrifTypeAccoToD(Request $request)
    {
        if($request->ttype==1)
        {
            $city=city::get(); 
            $html='';
            $html.='<option value="">--select--</option>';
            foreach($city as $cityLsit)
            {
              $html.='<option value="'.$cityLsit->id.'">'.$cityLsit->Code.'~'.$cityLsit->CityName.'</option>';
           }
           echo $html;
        }
        if($request->ttype==2)
        {
            $state=state::get(); 
            $html='';
            $html.='<option value="">--select--</option>';
            foreach($state as $StateLsit)
            {
              $html.='<option value="'.$StateLsit->id.'">'.$StateLsit->name.'</option>';
           }
           echo $html;
        }
        if($request->ttype==3)
        {
            $zone=ZoneMaster::get(); 
            $html='';
            $html.='<option value="">--select--</option>';
            foreach($zone as $ZoneLsit)
            {
              $html.='<option value="'.$ZoneLsit->id.'">'.$ZoneLsit->ZoneName.'</option>';
           }
           echo $html;
        }
        if($request->ttype==4)
        {
            $Pincode=PincodeMaster::with('StateDetails','CityDetails')->get(); 
            $html='';
            $html.='<option value="">--select--</option>';
            foreach($Pincode as $PinLsit)
            {
                if(isset($PinLsit->CityDetails->CityName))
                {
                 $html.='<option value="'.$PinLsit->id.'">'.$PinLsit->PinCode.'~'.$PinLsit->StateDetails->name.'~'.$PinLsit->CityDetails->CityName.'</option>';
                }
           }
           echo $html;
        }
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
        print_r($request->input()); die;
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


    public  function CustomerTariffReport(Request $req){
        $date=[];
        $keyword='';
        $getCustomerData =[];
        if($req->formDate){
             $date['from'] = $req->formDate;
        }
        if($req->todate){
            $date['to'] = $req->todate;
        }
        if($req->customer){
            $keyword .=$req->customer;
        }
       
        $BaseOnTarrif = CustomerTariff::leftjoin("Cust_Tariff_Trans","Cust_Tariff_Trans.Tariff_M_ID","Cust_Tariff_Master.Id")
            ->leftjoin("Cust_Tarrif_Slabs","Cust_Tariff_Trans.Id","Cust_Tarrif_Slabs.Tarrif_Id")->select('Cust_Tariff_Master.Tarrif_Code','Cust_Tarrif_Slabs.Id')->where(function($query) use($date){
            if(isset($date['from']) && isset($date['to'])){
                $query->whereBetween("Wef_Date",[$date['from'],$date['to']]);
            }
        })->where(function($query) use($keyword){ 
            if($keyword!=''){
                $query->where("Customer_Id",$keyword);
            }
        })->orderBy("Wef_Date","ASC")->paginate(10);
      /// echo '<pre>' ;   print_r($BaseOnTarrif[9]->Id); die;
        if(!empty($BaseOnTarrif)){
        foreach($BaseOnTarrif as $mainKay){
            if($mainKay->Tarrif_Code==1){
                $getCustomerData[] = CustomerTariff::leftjoin("Cust_Tariff_Trans","Cust_Tariff_Trans.Tariff_M_ID","Cust_Tariff_Master.Id")
        ->leftjoin("Cust_Tarrif_Slabs","Cust_Tariff_Trans.Id","Cust_Tarrif_Slabs.Tarrif_Id")
        ->leftjoin('Cust_Tariff_Type','Cust_Tariff_Type.id','Cust_Tariff_Master.Tarrif_Code' )
        ->leftjoin('cities as c_one','Cust_Tariff_Trans.Origin','c_one.id')
        ->leftjoin('cities as c_two','Cust_Tariff_Trans.Dest','c_two.id')
        ->leftjoin('customer_masters','Cust_Tariff_Master.Customer_Id','customer_masters.id')
        ->leftjoin('devilery_types','devilery_types.id','Cust_Tariff_Trans.Delivery_Type')
        ->select("devilery_types.Title as DelivertY","Cust_Tariff_Trans.Origin","Cust_Tariff_Trans.Dest","Cust_Tariff_Trans.Mode","Cust_Tariff_Trans.Rate_type","Cust_Tariff_Trans.TAT","Cust_Tariff_Trans.Min_Amount","Cust_Tarrif_Slabs.Qty","Cust_Tarrif_Slabs.Rate","Cust_Tariff_Master.Wef_Date","Cust_Tariff_Master.Tarrif_Code","Cust_Tariff_Master.Id","Cust_Tariff_Type.Code","c_one.CityName as OutputOrigin","c_two.CityName as OutputDest","customer_masters.CustomerCode","customer_masters.CustomerName","Cust_Tariff_Type.Origin","Cust_Tariff_Type.Desitination","Cust_Tariff_Master.Wef_Date")->where("Cust_Tarrif_Slabs.Id",$mainKay->Id)->first();
            }
            elseif($mainKay->Tarrif_Code==2){
                $getCustomerData[] = CustomerTariff::leftjoin("Cust_Tariff_Trans","Cust_Tariff_Trans.Tariff_M_ID","Cust_Tariff_Master.Id")
        ->leftjoin("Cust_Tarrif_Slabs","Cust_Tariff_Trans.Id","Cust_Tarrif_Slabs.Tarrif_Id")
        ->leftjoin('Cust_Tariff_Type','Cust_Tariff_Type.id','Cust_Tariff_Master.Tarrif_Code' )
         ->leftjoin('customer_masters','Cust_Tariff_Master.Customer_Id','customer_masters.id')
         ->leftjoin('devilery_types','devilery_types.id','Cust_Tariff_Trans.Delivery_Type')
        ->leftjoin('states as c_one','Cust_Tariff_Trans.Origin','c_one.id')
        ->leftjoin('states as c_two','Cust_Tariff_Trans.Dest','c_two.id')
        ->select("devilery_types.Title as DelivertY","Cust_Tariff_Trans.Origin","Cust_Tariff_Trans.Dest","Cust_Tariff_Trans.Mode","Cust_Tariff_Trans.Rate_type","Cust_Tariff_Trans.TAT","Cust_Tariff_Trans.Min_Amount","Cust_Tarrif_Slabs.Qty","Cust_Tarrif_Slabs.Rate","Cust_Tariff_Master.Wef_Date","Cust_Tariff_Master.Tarrif_Code","Cust_Tariff_Master.Id","Cust_Tariff_Type.Code","c_one.name as OutputOrigin","c_two.name as OutputDest","customer_masters.CustomerCode","customer_masters.CustomerName","Cust_Tariff_Type.Origin","Cust_Tariff_Type.Desitination","Cust_Tariff_Master.Wef_Date")->where("Cust_Tarrif_Slabs.Id",$mainKay->Id)->first();
            }
            elseif($mainKay->Tarrif_Code==3){
                $getCustomerData[] = CustomerTariff::leftjoin("Cust_Tariff_Trans","Cust_Tariff_Trans.Tariff_M_ID","Cust_Tariff_Master.Id")
        ->leftjoin("Cust_Tarrif_Slabs","Cust_Tariff_Trans.Id","Cust_Tarrif_Slabs.Tarrif_Id")
        ->leftjoin('Cust_Tariff_Type','Cust_Tariff_Type.id','Cust_Tariff_Master.Tarrif_Code' )
         ->leftjoin('customer_masters','Cust_Tariff_Master.Customer_Id','customer_masters.id')
         ->leftjoin('devilery_types','devilery_types.id','Cust_Tariff_Trans.Delivery_Type')
        ->leftjoin('zone_masters as c_one','Cust_Tariff_Trans.Origin','c_one.id')
        ->leftjoin('zone_masters as c_two','Cust_Tariff_Trans.Dest','c_two.id')
        ->select("devilery_types.Title as DelivertY","Cust_Tariff_Trans.Origin","Cust_Tariff_Trans.Dest","Cust_Tariff_Trans.Mode","Cust_Tariff_Trans.Rate_type","Cust_Tariff_Trans.TAT","Cust_Tariff_Trans.Min_Amount","Cust_Tarrif_Slabs.Qty","Cust_Tarrif_Slabs.Rate","Cust_Tariff_Master.Wef_Date","Cust_Tariff_Master.Tarrif_Code","Cust_Tariff_Master.Id","Cust_Tariff_Type.Code","c_one.ZoneName as OutputOrigin","c_two.ZoneName as OutputDest","customer_masters.CustomerCode","customer_masters.CustomerName","Cust_Tariff_Type.Origin","Cust_Tariff_Type.Desitination","Cust_Tariff_Master.Wef_Date")->where("Cust_Tarrif_Slabs.Id",$mainKay->Id)->first();
            }
            elseif($mainKay->Tarrif_Code==4){
                $getCustomerData[] = CustomerTariff::leftjoin("Cust_Tariff_Trans","Cust_Tariff_Trans.Tariff_M_ID","Cust_Tariff_Master.Id")
        ->leftjoin("Cust_Tarrif_Slabs","Cust_Tariff_Trans.Id","Cust_Tarrif_Slabs.Tarrif_Id")
        ->leftjoin('Cust_Tariff_Type','Cust_Tariff_Type.id','Cust_Tariff_Master.Tarrif_Code' )
         ->leftjoin('customer_masters','Cust_Tariff_Master.Customer_Id','customer_masters.id')
         ->leftjoin('devilery_types','devilery_types.id','Cust_Tariff_Trans.Delivery_Type')
        ->leftjoin('pincode_masters as c_one','Cust_Tariff_Trans.Origin','c_one.id')
        ->leftjoin('pincode_masters as c_two','Cust_Tariff_Trans.Dest','c_two.id')
        ->select("devilery_types.Title as DelivertY","Cust_Tariff_Trans.Origin","Cust_Tariff_Trans.Dest","Cust_Tariff_Trans.Mode","Cust_Tariff_Trans.Rate_type","Cust_Tariff_Trans.TAT","Cust_Tariff_Trans.Min_Amount","Cust_Tarrif_Slabs.Qty","Cust_Tarrif_Slabs.Rate","Cust_Tariff_Master.Wef_Date","Cust_Tariff_Master.Tarrif_Code","Cust_Tariff_Master.Id","Cust_Tariff_Type.Code","c_one.PinCode as OutputOrigin","c_two.PinCode as OutputDest","customer_masters.CustomerCode","customer_masters.CustomerName","Cust_Tariff_Type.Origin","Cust_Tariff_Type.Desitination","Cust_Tariff_Master.Wef_Date")->where("Cust_Tarrif_Slabs.Id",$mainKay->Id)->first();
            }

        }
    }
    else{
        $getCustomerData ='';
    }
       
    $customer = CustomerMaster::get();
        return view('Account.customerTariffReport', [
            'title'=>'CUSTOMER TARIFF REPORT',
            'getCustomerData'=>$getCustomerData,
            'BaseOnTarrif'=> $BaseOnTarrif,
            'customer'=>$customer]);

    }
}
