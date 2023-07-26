<?php

namespace App\Http\Controllers\Vendor;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVehicleTypeRequest;
use App\Http\Requests\UpdateVehicleTypeRequest;
use App\Models\Vendor\VehicleType;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\AdminExports\VehicleTypeExport;
class VehicleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->filled('search')){
        $vehcileType=VehicleType::search($request->search)->orderby('id')->paginate(10);  
        }
        else{
            $vehcileType=VehicleType::orderby('id')->paginate(10);  
        }
        if($request->submit=="Download"){
            return   Excel::download(new VehicleTypeExport(), 'VehicleTypeExport.xlsx');
        }
        return view('Vendor.VehicleType', [
            'title'=>'Vehicle Model  Master',
            'vehcileType'=>$vehcileType
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
     * @param  \App\Http\Requests\StoreVehicleTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVehicleTypeRequest $request)
    {
        $file = $request->file('File');
        
        if(isset($request->Vid) && $request->Vid !='')
        {
            if(isset($file)){
                $file->getClientOriginalName();
            $destinationPath = public_path('/VehicleDocUpload');
            $file->move($destinationPath,date("YmdHis").$file->getClientOriginalName());
            $link= "public/VehicleDocUpload/".date("YmdHis").$file->getClientOriginalName();
            VehicleType::where("id", $request->Vid)->update(
                ['VehicleType' => $request->VehicleType,'Capacity'=> $request->Capacity,'BodyType'=>$request->BodyType,'VehSize'=>$request->VehicleSize,'Length'=>$request->Length,'Width'=>$request->Width,'height'=>$request->height,'TotalWheels'=>$request->TotalWheels,'image'=>$link,'Is_Active' =>$request->Active]
               );
            }
            else{
                VehicleType::where("id", $request->Vid)->update(
                ['VehicleType' => $request->VehicleType,'Capacity'=> $request->Capacity,'BodyType'=>$request->BodyType,'VehSize'=>$request->VehicleSize,'Length'=>$request->Length,'Width'=>$request->Width,'height'=>$request->height,'TotalWheels'=>$request->TotalWheels,'Is_Active' =>$request->Active]
               );
            
            
            

            
            }
             echo 'Edit Successfully';
        }
        else
        {
            if(isset($file)){
            $file->getClientOriginalName();
            $destinationPath = public_path('/VehicleDocUpload');
            $file->move($destinationPath,date("YmdHis").$file->getClientOriginalName());
            $link= "public/VehicleDocUpload/".date("YmdHis").$file->getClientOriginalName();
            }
            else{
                $link='';
            }
            $lastId=VehicleType::insertGetId(
                ['VehicleType' => $request->VehicleType,'Capacity'=> $request->Capacity,'BodyType'=>$request->BodyType,'VehSize'=>$request->VehicleSize,'Length'=>$request->Length,'Width'=>$request->Width,'height'=>$request->height,'TotalWheels'=>$request->TotalWheels,'image'=>$link,'Is_Active' =>$request->Active]
               );
             echo 'Add Successfully';
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vendor\VehicleType  $vehicleType
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $vehcileType=VehicleType::where('id',$request->id)->first();
        echo json_encode($vehcileType); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vendor\VehicleType  $vehicleType
     * @return \Illuminate\Http\Response
     */
    public function edit(VehicleType $vehicleType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVehicleTypeRequest  $request
     * @param  \App\Models\Vendor\VehicleType  $vehicleType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVehicleTypeRequest $request, VehicleType $vehicleType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendor\VehicleType  $vehicleType
     * @return \Illuminate\Http\Response
     */
    public function destroy(VehicleType $vehicleType)
    {
        //
    }
}
