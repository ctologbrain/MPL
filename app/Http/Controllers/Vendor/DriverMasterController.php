<?php

namespace App\Http\Controllers\Vendor;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreDriverMasterRequest;
use App\Http\Requests\UpdateDriverMasterRequest;
use App\Models\Vendor\DriverMaster;
use Illuminate\Http\Request;
use App\Models\Vendor\VendorMaster;
class DriverMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
           if($request->get('search') !='')
            {
              $search=$request->get('search');
             }
            else
            {
              $search='';
            }
        $driver=DriverMaster::with('VendorDetails')->orderBy('id')
        ->Where(function ($query) use($search){ 
            if($search !='')
            {
               $query ->orWhere('DriverName', 'like', '%' . $search . '%');
             }
        })
        ->paginate(10);
        $vendor=VendorMaster::get();
        return view('Vendor.driverMaster', [
            'title'=>'DRIVER MASTER',
            'vendor'=>$vendor,
            'driver'=>$driver
            
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
     * @param  \App\Http\Requests\StoreDriverMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDriverMasterRequest $request)
    {
        $file = $request->file('File');
        if(isset($request->did) && $request->did !='')
        {
            if(isset($file)){
                $file->getClientOriginalName();
            $destinationPath = public_path('/DriverDocUpload');
            $file->move($destinationPath,date("YmdHis").$file->getClientOriginalName());
            $link= "public/DriverDocUpload/".date("YmdHis").$file->getClientOriginalName();

            DriverMaster::where("id", $request->did)->update(
                ['DriverName' => $request->DriverName,'VendorName'=> $request->VendorName,'License'=>$request->License,'LicenseExp'=>$request->LicenseExp,'Address1'=>$request->Address1,'Address2'=>$request->Address2,'City'=>$request->City,'Pincode'=>$request->Pincode,'State'=>$request->State,'Phone'=>$request->Phone,'image'=>$link]
               );
        }
        else{
            DriverMaster::where("id", $request->did)->update(
                ['DriverName' => $request->DriverName,'VendorName'=> $request->VendorName,'License'=>$request->License,'LicenseExp'=>$request->LicenseExp,'Address1'=>$request->Address1,'Address2'=>$request->Address2,'City'=>$request->City,'Pincode'=>$request->Pincode,'State'=>$request->State,'Phone'=>$request->Phone]
               );
        }

            echo 'Edit Successfully';
        
        }
        else
        {
            $file->getClientOriginalName();
            $destinationPath = public_path('/DriverDocUpload');
            $file->move($destinationPath,date("YmdHis").$file->getClientOriginalName());
            $link= "public/DriverDocUpload/".date("YmdHis").$file->getClientOriginalName();
            $lastId=DriverMaster::insertGetId(
                ['DriverName' => $request->DriverName,'VendorName'=> $request->VendorName,'License'=>$request->License,'LicenseExp'=>$request->LicenseExp,'Address1'=>$request->Address1,'Address2'=>$request->Address2,'City'=>$request->City,'Pincode'=>$request->Pincode,'State'=>$request->State,'Phone'=>$request->Phone,'image'=>$link]
               );
            echo 'Add Successfully';
              
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vendor\DriverMaster  $driverMaster
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $driver=DriverMaster::where('id',$request->id)->first();
        echo json_encode($driver);
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vendor\DriverMaster  $driverMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(DriverMaster $driverMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDriverMasterRequest  $request
     * @param  \App\Models\Vendor\DriverMaster  $driverMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDriverMasterRequest $request, DriverMaster $driverMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendor\DriverMaster  $driverMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(DriverMaster $driverMaster)
    {
        //
    }
    public function GetDriverDetailsForSearch(Request $request)
    {
        $page=$request->page;
        $resultCount = 10;
        $end = ($page - 1) * $resultCount;       
        $start = $end + $resultCount;
        $search=$request->term;
        if($request->term=='?')
        {
            $DriverMaster=DriverMaster::select('id','License','DriverName')->offset($end)->limit($start)->get();
        }
        else{
            $DriverMaster=DriverMaster::select('id','License','DriverName')
            ->Where(function ($query) use ($search){ 
               $query ->orWhere('License', 'like', '%' . $search . '%');
                $query ->orWhere('DriverName', 'like', '%' . $search . '%');
            
                })
                ->offset($end)->limit($start)->get();
        }
        
        $count=COUNT($DriverMaster);
        $data = [];
        foreach($DriverMaster as $driver)
        {
              $driverName=$driver->License.'~'.$driver->DriverName;
              $data[]=['id'=>$driver->id,'col'=>$driverName,'total_count'=>$count];
             
         
        }
        echo json_encode($data);
    }
}
