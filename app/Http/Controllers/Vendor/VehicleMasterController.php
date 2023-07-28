<?php

namespace App\Http\Controllers\Vendor;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVehicleMasterRequest;
use App\Http\Requests\UpdateVehicleMasterRequest;
use App\Models\Vendor\VehicleMaster;
use App\Models\Vendor\VehicleType;
use App\Models\Vendor\VendorMaster;
use App\Models\OfficeSetup\OfficeMaster;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\AdminExports\VendorVehicleExport;
class VehicleMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $vehicleType=VehicleType::get();
        $VendorMaster=VendorMaster::get();
        $offcieMaster=OfficeMaster::get();
        $vehicle=VehicleMaster::with('officeDetails','VendorDetails','VehicleTypeDetails')->orderBy('id')->paginate(10);
        if($request->submit=="Download"){
            return   Excel::download(new VendorVehicleExport(), 'VendorVehicleExport.xlsx');
        }
        return view('Vendor.VehicleMaster', [
            'title'=>'VENDOR VEHICLE MASTER',
             'vehicleType'=>$vehicleType,
             'vendor'=>$VendorMaster,
             'offcieMaster'=>$offcieMaster,
             'vehicle'=>$vehicle
            
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
     * @param  \App\Http\Requests\StoreVehicleMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVehicleMasterRequest $request)
    {
        if(isset($request->vid) && $request->vid !='')
        {
            if(isset($request->Month))
            {
                $month=implode(' , ',$request->Month);
            }
            else{
                $month='';
            }
            if(isset($request->AllowMultiHUB))
            {
                $AllowMultiHUB='YES';
            }
            else{
                $AllowMultiHUB='NO';
            }
            VehicleMaster::where("id", $request->vid)->update(
                ['Reportinghub' => $request->Reportinghub,'ReportingTime'=> $request->ReportingTime,'Owner'=>$request->Owner,'TariffType'=>$request->TariffType,'MonthRent'=>$request->MonthRent,'Rentwef'=>date("Y-m-d",strtotime($request->Rentwef)),'MonthlyFixKm'=>$request->MonthlyFixKm,'AdditionalPerKmRate'=>$request->AdditionalPerKmRate,'PerHRRate'=>$request->PerHRRate,'PlacementType'=>$request->PlacementType,'VendorName'=>$request->VendorName,'VehicleModel'=>$request->VehicleModel,'VehicleNo'=>$request->VehicleNo,'ChasisNo'=>$request->ChasisNo,'EngineNo'=>$request->EngineNo,'RegistrationNo'=>$request->RegistrationNo,'RegistrationState'=>$request->RegistrationState,'TypeOfRegistration' => $request->TypeOfRegistration,'InsuranceValidity'=>date("Y-m-d",strtotime($request->InsuranceValidity)),'InsuredAmount'=>$request->InsuredAmount,'InsuranceCompany'=>$request->InsuranceCompany,'YearofMfg'=>$request->YearofMfg,'NosOfDrivers'=>$request->NosOfDrivers,'FuelType'=>$request->FuelType,'FitnessValidity'=>date("Y-m-d",strtotime($request->FitnessValidity)),'VehiclePermit'=>$request->VehiclePermit,'IsGps'=>$request->IsGps,'GPSDeviceID'=>$request->GPSDeviceID,'AllowMultiHUB'=>$AllowMultiHUB,'VehicleAvailability'=>$request->VehicleAvailability,'Month'=>$month,'VehiclePurpose'=>$request->VehiclePurpose, 'Is_Active'=> $request->Active]
               );
             echo 'Edit Successfully';
        }
        else
        {
            if(isset($request->Month))
            {
                $month=implode(' , ',$request->Month);
            }
            else{
                $month='';
            }
            if(isset($request->AllowMultiHUB))
            {
                $AllowMultiHUB='YES';
            }
            else{
                $AllowMultiHUB='NO';
            }
            VehicleMaster::insert(['Reportinghub' => $request->Reportinghub,'ReportingTime'=> $request->ReportingTime,'Owner'=>$request->Owner,'TariffType'=>$request->TariffType,'MonthRent'=>$request->MonthRent,'Rentwef'=>$request->Rentwef,'MonthlyFixKm'=>$request->MonthlyFixKm,'AdditionalPerKmRate'=>$request->AdditionalPerKmRate,'PerHRRate'=>$request->PerHRRate,'PlacementType'=>$request->PlacementType,'VendorName'=>$request->VendorName,'VehicleModel'=>$request->VehicleModel,'VehicleNo'=>$request->VehicleNo,'ChasisNo'=>$request->ChasisNo,'EngineNo'=>$request->EngineNo,'RegistrationNo'=>$request->RegistrationNo,'RegistrationState'=>$request->RegistrationState,'TypeOfRegistration' => $request->TypeOfRegistration,'InsuranceValidity'=>$request->InsuranceValidity,'InsuredAmount'=>$request->InsuredAmount,'InsuranceCompany'=>$request->InsuranceCompany,'YearofMfg'=>$request->YearofMfg,'NosOfDrivers'=>$request->NosOfDrivers,'FuelType'=>$request->FuelType,'FitnessValidity'=>$request->FitnessValidity,'VehiclePermit'=>$request->VehiclePermit,'IsGps'=>$request->IsGps,'GPSDeviceID'=>$request->GPSDeviceID,'AllowMultiHUB'=>$AllowMultiHUB,'VehicleAvailability'=>$request->VehicleAvailability,'Month'=>$month,'VehiclePurpose'=>$request->VehiclePurpose, 'Is_Active'=> $request->Active]);
             echo 'Add Successfully';
              
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vendor\VehicleMaster  $vehicleMaster
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $vehicle=VehicleMaster::where('id',$request->id)->first();
        echo  json_encode($vehicle);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vendor\VehicleMaster  $vehicleMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(VehicleMaster $vehicleMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVehicleMasterRequest  $request
     * @param  \App\Models\Vendor\VehicleMaster  $vehicleMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVehicleMasterRequest $request, VehicleMaster $vehicleMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendor\VehicleMaster  $vehicleMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(VehicleMaster $vehicleMaster)
    {
        //
    }
}
