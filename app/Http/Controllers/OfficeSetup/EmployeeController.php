<?php
namespace App\Http\Controllers\OfficeSetup;

use App\Http\Requests\StoreemployeeRequest;
use App\Http\Requests\UpdateemployeeRequest;
use App\Models\OfficeSetup\employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\OfficeSetup\Department;
use App\Models\OfficeSetup\designation;
use App\Models\OfficeSetup\OfficeMaster;
use App\Models\OfficeSetup\empPersonalInformation;
use App\Models\OfficeSetup\empPermanentContactInformation;
use App\Models\OfficeSetup\empPresentContactInformation;
use App\Models\Role\RoleMaster;
use Auth;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->search;
         $dept=Department::get();
         $desi=designation::get();
         $office=OfficeMaster::get();
         $RoleMaster=RoleMaster::get();
         $employeeDetails=employee::with('EmpPerDetails','EmpPresentDetails','EmpPersonalDetails','OfficeMasterParent','DeptMasterDet','designationDet','UserDetails')->where(function($query) use($keyword){
                if($keyword!=""){
                    $query->where("employees.EmployeeCode" ,"like",'%'.$keyword.'%');
                    $query->orWhere("employees.EmployeeName",'like','%'.$keyword.'%');
                }
    })->orderBy('id') ->paginate(10);
        return view('offcieSetup.employee', [
            'title'=>'EMPLOYEE MASTER',
            'dept'=>$dept,
            'desi'=>$desi,
            'office'=>$office,
            'employeeDetails'=>$employeeDetails,
            'RoleMaster'=>$RoleMaster
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
     * @param  \App\Http\Requests\StoreemployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreemployeeRequest $request)
    {
         if(isset($request->eid) && $request->eid !='')
         {
            $UserId=Auth::id();
            employee::where("id", $request->eid)->update(['EmployeeCode' => $request->EmployeeCode,'EmployeeName'=>$request->EmployeeName,'ReportingPerson'=>$request->ReportingPerson,'OfficeName'=>$request->OfficeName,'DepartmentName'=>$request->DepartmentName,'DesignationName'=>$request->DesignationName,'JoiningDate'=>$request->JoiningDate,'LastWorkDate'=>$request->LastWorkDate,'OfficePhone'=>$request->OfficePhone,'OfficeExt'=>$request->OfficeExt,'OfficeMobileNo'=>$request->OfficeMobileNo,'OfficeEmailID'=>$request->OfficeEmailID]);
            empPersonalInformation::where("EmpId", $request->eid)->update(['DateOfBirth'=>$request->DateOfBirth,'AadhaarNo'=>$request->AadhaarNo,'DrivingLicence'=>$request->DrivingLicence,'DrivingLicenceExp'=>$request->DrivingLicenceExp,'IDCardNo'=>$request->IDCardNo,'PanNo'=>$request->PanNo,'PassportNo'=>$request->PassportNo,'PassportExpDate'=>$request->PassportExpDate,'Guardian'=>$request->Guardian,'GuardianName'=>$request->GuardianName,'PersonalMobileNo'=>$request->PersonalMobileNo,'PersonalPhoneNo'=>$request->PersonalPhoneNo,'PersonalEmail'=>$request->PersonalEmail,'Gender'=>$request->MALE]);
            empPermanentContactInformation::where("EmpId", $request->eid)->update(
                ['Address1'=>$request->Address1,'Address2'=>$request->Address2,'State'=>$request->State,'City'=>$request->City,'Pincode'=>$request->Pincode]
               );
             empPresentContactInformation::where("EmpId", $request->eid)->update(
                ['Address1'=>$request->Address1p,'Address2'=>$request->Address2p,'State'=>$request->Statep,'City'=>$request->Cityp,'Pincode'=>$request->Pincodep]
               );
               if($request->Password !='' && $request->LoginName !='')
               {
                User::where("id", $request->userId)->update(
                    ['email'=>$request->LoginName,'ViewPassowrd'=>$request->Password,'password'=>Hash::make($request->Password),'Role'=>$request->Role]
                   );   
               }
            }
         else{
            $usertIlastId=User::insertGetId([
                'name' => $request->EmployeeName,
                'email' =>$request->LoginName,
                'password' => Hash::make($request->Password),
                'ViewPassowrd'=>$request->Password,
                'Role'=>$request->Role
            ]);
            if($usertIlastId !='')
            {
                $userid=$usertIlastId;
            }
            else{
                $userid=NULL;
            }
             $lastId= employee::insertGetId(
                ['EmployeeCode' => $request->EmployeeCode,'user_id'=>$userid,'EmployeeName'=>$request->EmployeeName,'ReportingPerson'=>$request->ReportingPerson,'OfficeName'=>$request->OfficeName,'DepartmentName'=>$request->DepartmentName,'DesignationName'=>$request->DesignationName,'JoiningDate'=>$request->JoiningDate,'LastWorkDate'=>$request->LastWorkDate,'OfficePhone'=>$request->OfficePhone,'OfficeExt'=>$request->OfficeExt,'OfficeMobileNo'=>$request->OfficeMobileNo,'OfficeEmailID'=>$request->OfficeEmailID]
               );
               empPersonalInformation::insert(
                ['EmpId' => $lastId,'DateOfBirth'=>$request->DateOfBirth,'AadhaarNo'=>$request->AadhaarNo,'DrivingLicence'=>$request->DrivingLicence,'DrivingLicenceExp'=>$request->DrivingLicenceExp,'IDCardNo'=>$request->IDCardNo,'PanNo'=>$request->PanNo,'PassportNo'=>$request->PassportNo,'PassportExpDate'=>$request->PassportExpDate,'Guardian'=>$request->Guardian,'GuardianName'=>$request->GuardianName,'PersonalMobileNo'=>$request->PersonalMobileNo,'PersonalPhoneNo'=>$request->PersonalPhoneNo,'PersonalEmail'=>$request->PersonalEmail,'Gender'=>$request->MALE]
               );
               empPermanentContactInformation::insert(
                ['EmpId' => $lastId,'Address1'=>$request->Address1,'Address2'=>$request->Address2,'State'=>$request->State,'City'=>$request->City,'Pincode'=>$request->Pincode]
               );
               empPresentContactInformation::insert(
                ['EmpId' => $lastId,'Address1'=>$request->Address1p,'Address2'=>$request->Address2p,'State'=>$request->Statep,'City'=>$request->Cityp,'Pincode'=>$request->Pincodep]
               );
               
            }
           
           
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OfficeSetup\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $employeeDetails=employee::with('EmpPerDetails','EmpPresentDetails','EmpPersonalDetails','OfficeMasterParent','UserDetails')->where('id',$request->id)->first();
        echo json_encode($employeeDetails);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OfficeSetup\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateemployeeRequest  $request
     * @param  \App\Models\OfficeSetup\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateemployeeRequest $request, employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OfficeSetup\employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(employee $employee)
    {
        //
    }
    public function GetEmployeDetailsForSearch(Request $request)
    {
        $page=$request->page;
        $resultCount = 10;
        $end = ($page - 1) * $resultCount;       
        $start = $end + $resultCount;
        $search=$request->term;
            if($request->term=='?')
            {
                $EmployeeMaster=employee::select('id','EmployeeCode','EmployeeName')->offset($end)->limit($start)->get();
            }
           else{
           
            $EmployeeMaster=employee::select('id','EmployeeCode','EmployeeName')
            ->Where(function ($query) use ($search){ 
             $query ->orWhere('EmployeeName', 'like', '%' . $search . '%');
               })
               ->offset($end)->limit($start)->get();
              
               
        }
        $count=COUNT($EmployeeMaster);
        $data = [];
         foreach($EmployeeMaster as $Emp)
        {
            $EmpName=$Emp->EmployeeCode.'~'.$Emp->EmployeeName;
            $data[]=['id'=>$Emp->id,'col'=>$EmpName,'total_count'=>$count];
            
        }
        echo json_encode($data);
    }
}
