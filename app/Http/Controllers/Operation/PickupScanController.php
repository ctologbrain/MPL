<?php

namespace App\Http\Controllers\Operation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePickupScanRequest;
use App\Http\Requests\UpdatePickupScanRequest;
use App\Models\Operation\PickupScan;
use App\Models\Operation\PickupScanAndDocket;
use App\Models\Vendor\VehicleMaster;
use App\Models\Vendor\VendorMaster;
use App\Models\Vendor\DriverMaster;
use App\Models\Stock\DocketAllocation;
use App\Models\OfficeSetup\employee;
use App\Models\OfficeSetup\OfficeMaster;
use Auth;
class PickupScanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendor=VendorMaster::get();
        $driver=DriverMaster::get();
        return view('Operation.pickupSacn', [
            'title'=>'PICKUP SCAN',
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
     * @param  \App\Http\Requests\StorePickupScanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePickupScanRequest $request)
    {
        $UserId=Auth::id();
        $lastRecourd=PickupScan::select('id')->orderBy('id','DESC')->first();
        if(isset($lastRecourd->id))
        {
         $lastId=$lastRecourd->id+1;
        }
        else{
            $lastId=1;  
        }
        $OfficeCode=employee::select('OfficeCode')->leftjoin('office_masters','office_masters.id','=','employees.OfficeName')->where('user_id',$UserId)->first();
         if(isset($OfficeCode->OfficeCode))
         {
            $pickUpNo='PICKUP/'.$OfficeCode->OfficeCode.'/0000'.$lastId;
         }
         else{
            $pickUpNo='PICKUP0000/'.$lastId;
         }
        
        $pickupLastId=PickupScan::insertGetId(
            ['scanDate' => $request->scanDate,'vehicleType'=>$request->vehicleType,'vendorName'=>$request->vendorName,'vehicleNo'=>$request->vehicleNo,'driverName'=>$request->driverName,'startkm'=>$request->startkm,'endkm'=>$request->endkm,'marketHireAmount'=>$request->marketHireAmount,'unloadingSupervisorName'=>$request->unloadingSupervisorName,'pickupPersonName'=>$request->pickupPersonName,'remark'=>$request->remark,'PickupNo'=>$pickUpNo,'advanceToBePaid'=>$request->advanceToBePaid,'paymentMode'=>$request->paymentMode,'advanceType'=>$request->advanceType]
        );
        $arr = array('status' => 'true', 'message' =>'PickupNo Genrate Sucessfully','data'=>$pickUpNo,'LastId'=>$pickupLastId);
        echo json_encode($arr);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operation\PickupScan  $pickupScan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $vehicle=VehicleMaster::select('id','VehicleNo')->where('VendorName',$request->id)->get();
        $html='';
        $html.='<option value="">--select--</option>';
        foreach($vehicle as $vehicleList)
        {
          $html.='<option value="'.$vehicleList->id.'">'.$vehicleList->VehicleNo.'</option>';
        }
        echo $html;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operation\PickupScan  $pickupScan
     * @return \Illuminate\Http\Response
     */
    public function edit(PickupScan $pickupScan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePickupScanRequest  $request
     * @param  \App\Models\Operation\PickupScan  $pickupScan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePickupScanRequest $request, PickupScan $pickupScan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operation\PickupScan  $pickupScan
     * @return \Illuminate\Http\Response
     */
    public function destroy(PickupScan $pickupScan)
    {
        //
    }
    public function PickupScanReport(Request $request)
    {
        $date =[];
           if($request->get('office') !='')
            {
             $offfcie=$request->get('office');
            }
            else
            {
                $offfcie='';
            }
             if($request->get('formDate') !='')
             {  
             $date['from'] =$request->get('formDate');
             }
             if($request->get('todate') !='')
             {
               $date['to']=$request->get('todate');
             }
            $OfficeMaster=OfficeMaster::select('id','OfficeCode','OfficeName')->get();
            $pickupSacn=PickupScanAndDocket::
        select('pickup_scan_and_dockets.Docket','pickup_scans.PickupNo','pickup_scans.ScanDate','pickup_scans.vehicleType','pickup_scans.advanceToBePaid','pickup_scans.startkm','pickup_scans.endkm','pickup_scans.remark','pickup_scans.unloadingSupervisorName','office_masters.OfficeName','office_masters.OfficeCode','vendor_masters.VendorName','vehicle_masters.VehicleNo','driver_masters.DriverName','driver_masters.License')
        ->leftjoin('pickup_scans','pickup_scans.id','=','pickup_scan_and_dockets.Pickup_id')
        ->leftjoin('docket_allocations','docket_allocations.Docket_No','=','pickup_scan_and_dockets.Docket')
        ->leftjoin('office_masters','office_masters.id','=','docket_allocations.Branch_ID')
        ->leftjoin('vendor_masters','vendor_masters.id','=','pickup_scans.vendorName')
        ->leftjoin('vehicle_masters','vehicle_masters.id','=','pickup_scans.vehicleNo')
        ->leftjoin('driver_masters','driver_masters.id','=','pickup_scans.driverName')
        ->orderBy('pickup_scan_and_dockets.id')
        ->Where(function ($query) use($offfcie){ 
            if($offfcie !='')
           {
               $query ->orWhere('docket_allocations.Branch_ID',$offfcie);
           }
        })
        ->where(function ($query) use ($date){
           
         if(isset($date['from']) && isset($date['to']))
         {
          $query->whereBetween('pickup_scans.ScanDate',[$date['from'],$date['to']]);
         }
        }) 
        ->paginate(10);
        return view('Operation.PickupScanReport', [
            'title'=>'PICKUP SCAN REPORT',
            'pickupSacn'=>$pickupSacn,
            'OfficeMaster'=>$OfficeMaster
        ]);
    }
     function submitPickupSacn(Request $request)
     {
        $UserId=Auth::id();
        $OfficeCode=employee::select('office_masters.id')->leftjoin('office_masters','office_masters.id','=','employees.OfficeName')->where('employees.user_id',$UserId)->first();
        $checkDocket=DocketAllocation::select('Docket_No','Status')->where('Docket_No',$request->Docket)->where('Branch_ID',$OfficeCode->id)->first();
       if(isset($checkDocket->Docket_No))
       {
         if($checkDocket->Status==0)
         {
           
            DocketAllocation::where('Docket_No',$request->Docket)->update(['Status' =>2,'BookDate'=>$request->scanDate]);
            PickupScanAndDocket::insert(
                ['Pickup_id' => $request->pickup,'Docket'=>$request->Docket]
            );
            $PickpSabdScan=PickupScanAndDocket::select('pickup_scans.PickupNo','pickup_scan_and_dockets.Docket')->leftjoin('pickup_scans','pickup_scans.id','=','pickup_scan_and_dockets.Pickup_id')->where('pickup_scan_and_dockets.Pickup_id',$request->pickup)->orderBy('pickup_scan_and_dockets.id','DESC')->paginate(20);
            $tabel='';
            $tabel.='<table class="table table-bordered table-centered mb-1 mt-1"><thead> <tr>';
            $tabel.='<th width="2%">SL#</th>
            <th width="5%">Docket</th>
             <th width="5%">Pickup No</th> </tr>
             </thead>
             <tbody>'; 
             $i=0;
            foreach($PickpSabdScan as $PickupSacn)
            {
              $i++;
              $tabel.='<tr>';
              $tabel.='<td>'.$i.'</td>';
              $tabel.='<td>'.$PickupSacn->Docket.'</td>';
              $tabel.='<td>'.$PickupSacn->PickupNo.'</td>';
              $tabel.='</tr>';
            }
            $tabel.='</tbody> </table>';
           $arr = array('status' => 'true', 'message' =>'Docket Scan Sucessfully','table'=>$tabel);
            echo json_encode($arr);
         }
         if($checkDocket->Status==1)
         {
            $arr = array('status' => 'false', 'message' =>'Docket is Cancled');
            echo json_encode($arr);
         }
         if($checkDocket->Status==2)
         {
            $arr = array('status' => 'false', 'message' =>'Docket Already Booked');
            echo json_encode($arr);
         }
       }
       else{
        $arr = array('status' => 'false', 'message' =>'Docket Not Found');
        echo json_encode($arr);
       }
     }
}
