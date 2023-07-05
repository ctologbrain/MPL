<?php
namespace App\AdminExports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\Vendor\VehicleMaster;
use DB;
class VendorVehicleExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct($keyword=''){
       // $this->keyword=$keyword;
      
    }
    public function collection()
    {
       return VehicleMaster::leftjoin("office_masters","office_masters.id","vehicle_masters.Reportinghub")
       ->leftjoin("vendor_masters","vehicle_masters.VendorName","vendor_masters.id")
       ->leftjoin("vehicle_types","vehicle_masters.VehicleModel","vehicle_types.id")
       ->orderBy('vehicle_masters.id')
        //    ->where(function($query){
        //     if($this->keyword!=""){
        //         $query->where("vehicle_masters.EmployeeCode" ,"like",'%'.$this->keyword.'%');
        //         $query->orWhere("vehicle_masters.EmployeeName" ,"like",'%'.$this->keyword.'%');
        //     }
        //     })
        ->select(DB::raw("CONCAT(office_masters.OfficeCode,'~', office_masters.OfficeName ) as Hub")
         ,DB::raw("DATE_FORMAT(vehicle_masters.ReportingTime,'%H-%i') as RT"), 
         "vehicle_masters.Owner" ,"vehicle_masters.VehiclePurpose"  ,"vehicle_masters.TariffType"
         ,"vehicle_masters.MonthRent"  
         ,"vehicle_masters.MonthlyFixKm"
         ,"vehicle_masters.AdditionalPerKmRate" 
         ,"vehicle_masters.PerHRRate" ,"vehicle_masters.PlacementType"
         ,"vehicle_masters.Rentwef" ,
            DB::raw("CONCAT(vendor_masters.VendorCode,'~', vendor_masters.VendorName ) as Vndr")
            ,"vehicle_types.VehicleType"    ,"vehicle_masters.VehicleNo" ,
            "vehicle_masters.ChasisNo" , "vehicle_masters.EngineNo"
            , "vehicle_masters.RegistrationNo", "vehicle_masters.RegistrationState", "vehicle_masters.TypeOfRegistration"
            , "vehicle_masters.InsuranceValidity" , "vehicle_masters.InsuredAmount" , "vehicle_masters.InsuranceCompany"
            , "vehicle_masters.YearofMfg" , "vehicle_masters.NosOfDrivers", "vehicle_masters.FuelType"
            , "vehicle_masters.FitnessValidity"  , "vehicle_masters.VehiclePermit"
            , "vehicle_masters.IsGps"  , "vehicle_masters.GPSDeviceID","vehicle_masters.VehicleAvailability","vehicle_masters.Month",
            "vehicle_masters.AllowMultiHUB"
      //  DB::raw("(CASE  WHEN ProductActive=0 THEN 'No' ELSE 'YES' END) as stts")
        )
       ->get();
    }
    public function headings(): array
    {
        return [
            'Reporting HUB',
            'Reporting Time',
            'Owner',
            'Vehicle Purpose',
            'Tariff Type',
            'Rent Amount',
            'Monthly Fix Km',
            'Per Km Rate',
            'Per Hour Rate',
            'Placement Type',
            'Rent wef',
            'Vendor Name',
            'Vehicle Model',
            'Vehicle No',
            'Chasis No',
            'Engine No',
            'Registration No',
            'Registration State',
            'Type Of Registration',
            'Insurance Validity',
            'Insured Amount',
            'Insurance Company',
            'Year Of Mfg',
            'No Of Drivers',
            'Fuel Type',
            'Fitness Validity',
            'Vehicle Permit',
            'GPS Installed',
            'GPS Device ID',
            'Vehicle Availability',
            'Months',
            'Allow Multi HUB'
        ];
    }

}