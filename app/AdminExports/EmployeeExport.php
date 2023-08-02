<?php
namespace App\AdminExports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\OfficeSetup\employee;
use DB;
class EmployeeExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $offcie;
    function __construct($keyword) {
       
        $this->keyword=$keyword;
      
        
    }
    public function collection()
    {
       return employee::leftjoin("emp_personal_information","emp_personal_information.EmpId","employees.id")
       ->leftjoin("emp_permanent_contact_information","emp_permanent_contact_information.EmpId","employees.id")
       ->leftjoin("emp_present_contact_information","emp_present_contact_information.EmpId","employees.id")

       ->leftjoin("office_masters","office_masters.id","employees.OfficeName")
       ->leftjoin("departments","departments.id","employees.DepartmentName")
       ->leftjoin("designations","designations.id","employees.DesignationName")
       ->leftjoin("employees as Peremployees","Peremployees.id","employees.ReportingPerson")
       ->leftjoin("users","users.id","employees.user_id")
       ->leftjoin("role_masters","role_masters.id","users.Role")

       ->leftjoin("states as statePresent","statePresent.id","emp_present_contact_information.State")
       ->leftjoin("cities as cityPersent","cityPersent.id","emp_present_contact_information.City")
       ->leftjoin("pincode_masters as PinCodePresent","PinCodePresent.id","emp_present_contact_information.Pincode")

       ->leftjoin("states as statePermanent","statePermanent.id","emp_permanent_contact_information.State")
       ->leftjoin("cities as cityPermanent","cityPermanent.id","emp_permanent_contact_information.City")
       ->leftjoin("pincode_masters as PinCodePermanent","PinCodePermanent.id","emp_permanent_contact_information.Pincode")
       ->orderBy('employees.id')->where(function($query){
        if($this->keyword!=""){
            $query->where("employees.EmployeeCode" ,"like",'%'.$this->keyword.'%');
            $query->orWhere("employees.EmployeeName" ,"like",'%'.$this->keyword.'%');
        }
        })
        ->select("employees.EmployeeCode","employees.EmployeeName","Peremployees.EmployeeName as PersonEmpName",
        DB::raw("CONCAT(office_masters.OfficeCode ,'~',office_masters.OfficeName ) as Offc"),
        "departments.DepartmentName","designations.DesignationName",DB::raw("DATE_FORMAT(employees.JoiningDate ,'%d-%m-%Y' ) as JD"),
        DB::raw("DATE_FORMAT(employees.LastWorkDate ,'%d-%m-%Y') as LD"), "employees.OfficePhone", "employees.OfficeMobileNo",
        "employees.OfficeEmailID",
        DB::raw("DATE_FORMAT(emp_personal_information.DateOfBirth,'%d-%m-%Y') as DOB"),  "emp_personal_information.AadhaarNo",
        "emp_personal_information.DrivingLicence",DB::raw("DATE_FORMAT(emp_personal_information.DrivingLicenceExp,'%d-%m-%Y') as DDE")
        ,"emp_personal_information.IDCardNo"
        ,"emp_personal_information.PanNo","emp_personal_information.PassportNo"
        ,DB::raw("DATE_FORMAT(emp_personal_information.PassportExpDate,'%d-%m-%Y') as PED"), "emp_personal_information.Guardian"
        , "emp_personal_information.GuardianName"
        ,"emp_personal_information.Gender" ,"emp_personal_information.PersonalMobileNo" ,"emp_personal_information.PersonalPhoneNo"
        ,"emp_personal_information.PersonalEmail"
        ,"emp_present_contact_information.Address1" ,"emp_present_contact_information.Address2"
        ,"statePresent.name as SPName" ,"cityPersent.CityName as cpCity"
        ,"PinCodePresent.PinCode as PP_Pin" 
        ,"emp_permanent_contact_information.Address1 as pa" , "emp_permanent_contact_information.Address2 as patwo" 
        ,"statePermanent.name as PS" , "cityPermanent.CityName as PC" 
        ,"PinCodePermanent.PinCode as PI"
        ,"users.name","users.ViewPassowrd"
        ,"role_masters.RoleName"
      //  DB::raw("(CASE  WHEN ProductActive=0 THEN 'No' ELSE 'YES' END) as stts")
        )
       ->get();
    }
    public function headings(): array
    {
        return [
            'Employee Code',
            'Employee Name',
            'Reporting Person',
            'Office Name',
            'Department Name',
            'Designation Name',
            'Joining Date',
            'Last Working Date ',
            'Office Phone ',
            'Office Mobile ',
            'Office Email ID',
            'Date Of Birth ',
            'Adhar',
            'Driveing Licence',
            'DL Expiry Date',
            'Election Card No',
            'PAN No',
            'Passport No',
            'Passport Expiry Date',
            'Guardian',
            'Guardian Name',
            'Gender',
            'Personal Mobile No',
            'Personal Phone No',
            'Personal Email ID',
            'Present Add1',
            'Present Add2',
            'Present State',
            'Present City',
            'Present Pincode',

            'Permanent Add1',
            'Permanent Add2',
            'Permanent State',
            'Permanent City',
            'Permanent Pincode',
        //  'Allow Mobile App',
            'Login Name',
            'Password',
            'Role'

        ];
    }

}