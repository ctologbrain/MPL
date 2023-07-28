<?php

namespace App\Http\Controllers\CompanySetup;

use App\Http\Requests\StorePincodeMasterRequest;
use App\Http\Requests\UpdatePincodeMasterRequest;
use App\Models\CompanySetup\PincodeMaster;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OfficeSetup\state;
use App\Models\OfficeSetup\city;
use App\Models\OfficeSetup\employee;
use Maatwebsite\Excel\Facades\Excel;
use App\AdminExports\PinCodeMasterExport;
use Auth;
class PincodeMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        if($request->search !='')
        {
            $search=$request->search;
        }
        else{
            $search='';
        }
        $pincode=PincodeMaster::with('StateDetails','CityDetails','GetUserDett')
        ->Where(function ($query) use ($search){ 
            $query ->orWhere('pincode_masters.PinCode', 'like', '%' . $search . '%');
            
        })->orderBy('id')->paginate();
        if($request->submit=="Download"){
            return   Excel::download(new PinCodeMasterExport($search), 'PinCodeMasterExport.xlsx');
        }
        $state=state::get();
        return view('CompanySetup.PincodeList', [
            'title'=>'PINCODE MASTER',
            'state'=>$state,
            'pincode'=>$pincode
            
       ]);
    }
    public function getCityForState(Request $request)
    {
         $city=city::where('stateId',$request->id)->get();
         $html='';
         foreach($city as $citys)
         {
            if(isset($request->city) && $request->city ==$citys->id)
            {
            $html.='<option value="'.$citys->id.'" selected>'.$citys->Code.' ~ '.$citys->CityName.'</option>';
            }
            else
            {

            }
           $html.='<option value="'.$citys->id.'">'.$citys->Code.' ~ '.$citys->CityName.'</option>';
         }
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
     * @param  \App\Http\Requests\StorePincodeMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePincodeMasterRequest $request)
    {
        $UserId = Auth::id();
        $validated = $request->validated();
        if(isset($request->ARP) && $request->ARP=='ARP')
        {
         $ARP='Yes';
        }
        else
        {
         $ARP='No';  
        }
        if(isset($request->ODA) && $request->ODA=='ODA')
        {
         $ODA='Yes';
        }
        else
        {
         $ODA='No';  
        }
         $check= PincodeMaster::where("PinCode",$request->PinCode)->first();
      
        if(isset($request->pid) && $request->pid !='')
        {
            PincodeMaster::where("id", $request->pid)->update(['State' => $request->State,'city'=>$request->city,'PinCode'=>$request->PinCode,'ARP'=>$ARP,'ODA'=>$ODA,'Is_Active'=>$request->Active]);
             echo 'Edit Successfully';
        }
        else{
             if(empty($check)){
            PincodeMaster::insert(
                ['State' => $request->State,'city'=>$request->city,'PinCode'=>$request->PinCode,'ARP'=>$ARP,'ODA'=>$ODA,'Created_By'=>$UserId,'Is_Active'=>$request->Active]
            );
             echo 'Add Successfully';
             }
            else{
            echo 'false';
            }
        }
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanySetup\PincodeMaster  $pincodeMaster
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $pincode=PincodeMaster::where('id',$request->id)->first();
        echo json_encode($pincode);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanySetup\PincodeMaster  $pincodeMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(PincodeMaster $pincodeMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePincodeMasterRequest  $request
     * @param  \App\Models\CompanySetup\PincodeMaster  $pincodeMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePincodeMasterRequest $request, PincodeMaster $pincodeMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanySetup\PincodeMaster  $pincodeMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(PincodeMaster $pincodeMaster)
    {
        //
    }

    public function GetOriginDetailsForSearch(Request $req){
         $search='';
        $page = $req->page;
        $resCount =10;
        $strt =($page-1)*$resCount;
        $end =$strt +$resCount;
        $search=$req->term;

        $UserId=Auth::id();
        $Offcie=employee::select('office_masters.id','office_masters.OfficeCode','office_masters.OfficeName','office_masters.State_id','office_masters.Pincode','employees.id as EmpId')
        ->leftjoin('office_masters','office_masters.id','=','employees.OfficeName')
        ->where('employees.user_id',$UserId)->first();

        if($req->term=="?"){
        

          $perticulerData=  PincodeMaster::select('pincode_masters.*','cities.CityName','cities.Code')
        ->leftjoin('cities','cities.id','=','pincode_masters.city')
        ->where('pincode_masters.State',$Offcie->State_id)->where("pincode_masters.Is_Active","Yes")->offset($strt)->limit($end)->get();
        }
        else{
            $perticulerData= PincodeMaster::select('pincode_masters.*','cities.CityName','cities.Code')
                ->leftjoin('cities','cities.id','=','pincode_masters.city')
                ->where('pincode_masters.State',$Offcie->State_id)
                ->where("pincode_masters.Is_Active","Yes")->where(function($query) use ($search){
                if(isset($search) && $search!=''){
                    $query->where("cities.Code","like", '%'.$search.'%');
                    $query->orWhere("cities.CityName","like", '%'.$search.'%');
                    $query->orWhere("pincode_masters.PinCode","like", '%'.$search.'%');
                }
            })->offset($strt)->limit($end)->get();
        }
      $tcount =count($perticulerData);
       $dataArr =[];
        foreach($perticulerData as $key){
            $origin = $key->PinCode.'~'.$key->Code.':'.$key->CityName;
            $dataArr[] = array("id"=>$key->id,"col"=>$origin ,'total_count'=>$tcount);
        }
        echo json_encode($dataArr);
    }

    public function  GetDestDetailsForSearch(Request $req){
       
        $search='';
        $page = $req->page;
        $resCount =10;
        $strt =($page-1)*$resCount;
        $end =$strt +$resCount;
        $search=$req->term;

        if($req->term=="?"){
        

          $perticulerData=  PincodeMaster::select('pincode_masters.*','cities.CityName','cities.Code')
        ->leftjoin('cities','cities.id','=','pincode_masters.city')->where("pincode_masters.Is_Active","Yes")->offset($strt)->limit($end)->get();
        }
        else{
            $perticulerData= PincodeMaster::select('pincode_masters.*','cities.CityName','cities.Code')
                ->leftjoin('cities','cities.id','=','pincode_masters.city')
                ->where("pincode_masters.Is_Active","Yes")->where(function($query) use ($search){
                if(isset($search) && $search!=''){
                    $query->where("cities.Code","like", '%'.$search.'%');
                    $query->orWhere("cities.CityName","like", '%'.$search.'%');
                    $query->orWhere("pincode_masters.PinCode","like", '%'.$search.'%');
                }
            })->offset($strt)->limit($end)->get();
        }
      $tcount =count($perticulerData);
       $dataArr =[];
        foreach($perticulerData as $key){
            $origin = $key->PinCode.'~'.$key->Code.':'.$key->CityName;
            $dataArr[] = array("id"=>$key->id,"col"=>$origin ,'total_count'=>$tcount);
        }
        echo json_encode($dataArr);

    }

    public function getPinCodeNumberForSearch(Request $req){
        $search='';
        $page = $req->page;
        $resCount =10;
        $strt =($page-1)*$resCount;
        $end =$strt +$resCount;
        $search=$req->term;

        if($req->term=="?"){
        

          $perticulerData=  PincodeMaster::where("pincode_masters.Is_Active","Yes")->offset($strt)->limit($end)->get();
        }
        else{
            $perticulerData= PincodeMaster::where(function($query) use ($search){
                if(isset($search) && $search!=''){
                    $query->where("pincode_masters.PinCode","like", '%'.$search.'%');
                }
            })
            ->where("pincode_masters.Is_Active","Yes")->offset($strt)->limit($end)->get();
        }
      $tcount =count($perticulerData);
       $dataArr =[];
        foreach($perticulerData as $key){
            $origin = $key->PinCode;
            $dataArr[] = array("id"=>$key->id,"col"=>$origin ,'total_count'=>$tcount);
        }
        echo json_encode($dataArr);
    }
}
