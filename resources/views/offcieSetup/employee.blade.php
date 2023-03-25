@include('layouts.app')
<div class="generator-container allLists">
<div class="row">
   <div class="col-12">
      <div class="page-title-box main-title">
         <div class="page-title-right">
            <ol class="breadcrumb m-0">
               <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
               <li class="breadcrumb-item"><a href="javascript: void(0);">Cash</a></li>
               <li class="breadcrumb-item active">{{$title}}</li>
            </ol>
         </div>
         <h4 class="page-title">{{$title}}</h4>
      </div>
   </div>
</div>
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-body">
<h4 class="header-title nav nav-tabs nav-bordered mb-3">Official Information</h4>
    @if (session('status'))
     <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
     <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
     <strong>Success - </strong>  {{ session('status','') }}
    </div>
    @endif
    <div class="tab-content">
      <div class="tab-pane show active" id="input-types-preview">
            <div class="row">
           <div class="mb-2 col-md-3">
               <label for="example-select" class="form-label">Employee Code<span class="error">*</span></label>
               <input type="text" tabindex="1" class="form-control EmployeeCode" name="EmployeeCode" id="EmployeeCode"  onblur="getLoginInformation(this.value)">
                  <input type="hidden" value="" id="userId">
                  <input type="hidden" tabindex="1" class="form-control eid" name="eid" id="eid" >
                  <span class="error"></span>
                </div>
               <div class="mb-2 col-md-3">
                  <label for="example-select" class="form-label">Employee Name<span class="error">*</span></label>
                  <input type="text" tabindex="2" class="form-control EmployeeName" name="EmployeeName" id="EmployeeName" >
                  <span class="error"></span>
               </div>
             
               <div class="mb-2 col-md-3">
                  <label for="example-select" class="form-label">Reporting Person</label>
                  <input type="text" tabindex="3" class="form-control ReportingPerson" name="ReportingPerson" id="ReportingPerson" >
                  <span class="error"></span>
               </div>
                <div class="mb-2 col-md-3">
                <label for="example-select" class="form-label">Office Name<span class="error">*</span></label>
                <select class="form-control OfficeName" name="OfficeName" id="OfficeName" tabindex="4">
                     <option value=""></option>
                     @foreach($office as $offic)
                     <option value="{{$offic->id}}">{{$offic->OfficeCode}} ~ {{$offic->OfficeName}}</option>
                     @endforeach
                  </select>
                 
                  <span class="error"></span>
               </div>
               <div class="mb-2 col-md-3">
                <label for="example-select" class="form-label">Department Name<span class="error">*</span></label>
               
                  <select name="" class="form-control DepartmentName" id="DepartmentName" tabindex="5">
                     <option value=""></option>
                     @foreach($dept as $depart)
                     <option value="{{$depart->id}}">{{$depart->DepartmentName}}</option>
                     @endforeach
                  </select>
                  <span class="error"></span>
               </div>
               <div class="mb-2 col-md-3">
                <label for="example-select" class="form-label">Designation Name<span class="error">*</span></label>
                  <select class="form-control DesignationName" name="DesignationName" id="DesignationName" tabindex="6">
                     <option value=""></option>
                     @foreach($desi as $desition)
                     <option value="{{$desition->id}}">{{$desition->DesignationName}}</option>
                     @endforeach
                  </select>
                  <span class="error"></span>
               </div>
               <div class="mb-2 col-md-3">
                <label for="example-select" class="form-label">Joining Date<span class="error">*</span></label>
                  <input type="text" tabindex="7" class="form-control JoiningDate datepickerOne" name="JoiningDate" id="JoiningDate" >
                  <span class="error"></span>
               </div>
               <div class="mb-2 col-md-3">
                <label for="example-select" class="form-label">Last Work Date</label>
                  <input type="text" tabindex="8" class="form-control LastWorkDate datepickerOne" name="LastWorkDate" id="LastWorkDate" >
                  <span class="error"></span>
               </div>
               <div class="mb-2 col-md-3">
                <label for="example-select" class="form-label">Office Phone</label>
                  <input type="text" tabindex="9" class="form-control OfficePhone" name="OfficePhone" id="OfficePhone" >
                  <span class="error"></span>
               </div>
               <div class="mb-2 col-md-3">
                <label for="example-select" class="form-label">Office Ext</label>
                  <input type="text" tabindex="10" class="form-control OfficeExt" name="OfficeExt" id="OfficeExt" >
                  <span class="error"></span>
               </div>
               <div class="mb-2 col-md-3">
                <label for="example-select" class="form-label">Office Mobile No</label>
                  <input type="number" tabindex="11" class="form-control OfficeMobileNo" name="OfficeMobileNo" id="OfficeMobileNo" >
                  <span class="error"></span>
               </div>
               <div class="mb-2 col-md-3">
                <label for="example-select" class="form-label">Office Email ID</label>
                  <input type="text" tabindex="12" class="form-control OfficeEmailID" name="OfficeEmailID" id="OfficeEmailID" >
                  <span class="error"></span>
               </div>
               <h4 class="header-title nav nav-tabs nav-bordered mt-2 mb-2"></h4>
</div>
</div>
</div>
</div>
</div>
<div class="card">
<div class="card-body">
  <div class="tab-content">
      <div class="tab-pane show active" id="input-types-preview">
            <div class="row">
               <h4 class="header-title nav nav-tabs nav-bordered mt-2 mb-2">Personal Information</h4>
               <div class="mb-2 col-md-3">
                <label for="example-select" class="form-label">Date Of Birth<span class="error">*</span></label>
                  <input type="text" tabindex="13" class="form-control DateOfBirth datepickerOne" name="DateOfBirth" id="DateOfBirth" >
                  <span class="error"></span>
               </div>
               <div class="mb-2 col-md-3">
                <label for="example-select" class="form-label">Aadhaar No</label>
                  <input type="text" tabindex="14" class="form-control AadhaarNo" name="AadhaarNo" id="AadhaarNo" >
                  <span class="error"></span>
               </div>
               <div class="mb-2 col-md-3">
                <label for="example-select" class="form-label">Driving Licence</label>
                  <input type="text" tabindex="15" class="form-control DrivingLicence" name="DrivingLicence" id="DrivingLicence" >
                  <span class="error"></span>
               </div>
               <div class="mb-2 col-md-3">
                <label for="example-select" class="form-label">Driving Licence Exp</label>
                  <input type="text" tabindex="16" class="form-control DrivingLicenceExp datepickerOne" name="DrivingLicenceExp" id="DrivingLicenceExp" >
                  <span class="error"></span>
               </div>
               <div class="mb-2 col-md-3">
                <label for="example-select" class="form-label">ID Card No</label>
                  <input type="text" tabindex="17" class="form-control IDCardNo" name="IDCardNo" id="IDCardNo" >
                  <span class="error"></span>
               </div>
               <div class="mb-2 col-md-3">
                <label for="example-select" class="form-label">Pan No</label>
                  <input type="text" tabindex="18" class="form-control PanNo" name="PanNo" id="PanNo" >
                  <span class="error"></span>
               </div>
               <div class="mb-2 col-md-3">
                <label for="example-select" class="form-label">Passport No</label>
                  <input type="text" tabindex="19" class="form-control PassportNo" name="PassportNo" id="PassportNo" >
                  <span class="error"></span>
               </div>
               <div class="mb-2 col-md-3">
                <label for="example-select" class="form-label">Passport Exp Date</label>
                  <input type="text" tabindex="20" class="form-control PassportExpDate datepickerOne" name="PassportExpDate" id="PassportExpDate" >
                  <span class="error"></span>
               </div>
               <div class="mb-2 col-md-3">
                <label for="example-select" class="form-label">Guardian</label>
                  <input type="text" tabindex="21" class="form-control Guardian" name="Guardian" id="Guardian" >
                  <span class="error"></span>
               </div>
               <div class="mb-2 col-md-3">
                <label for="example-select" class="form-label">Guardian Name</label>
                  <input type="text" tabindex="22" class="form-control GuardianName" name="GuardianName" id="GuardianName" >
                  <span class="error"></span>
               </div>
               <div class="mb-2 col-md-3">
                <label for="example-select" class="form-label">Personal Mobile No</label>
                  <input type="text" tabindex="23" class="form-control PersonalMobileNo" name="PersonalMobileNo" id="PersonalMobileNo" >
                  <span class="error"></span>
               </div>
               <div class="mb-2 col-md-3">
                <label for="example-select" class="form-label">Personal Phone No</label>
                  <input type="text" tabindex="24" class="form-control PersonalPhoneNo" name="PersonalPhoneNo" id="PersonalPhoneNo" >
                  <span class="error"></span>
               </div>
               <div class="mb-2 col-md-3">
                <label for="example-select" class="form-label">Personal Email</label>
                  <input type="text" tabindex="25" class="form-control PersonalEmail" name="PersonalEmail" id="PersonalEmail" >
                  <span class="error"></span>
               </div>
               <div class="mb-2 col-md-3">
                <label for="example-select" class="form-label">Gender</label>
                <br>
                <!-- <input type="radio" id="MALE" name="MALE" class="MALE" value="MALE">
                <label for="html">MALE</label><br>
                <input type="radio" id="MALE" name="MALE" class="MALE" value="FEMALE">
                <label for="css">FEMALE</label><br> -->
                <label class="radio-inline">
      <input type="radio" id="MALE" name="optradio" tabindex="26"> MALE
    </label>
    <label class="radio-inline">
      <input type="radio" id="MALE" name="optradio" tabindex="27"> FEMALE
    </label>
               
                  <span class="error"></span>
               </div>
               <h4 class="header-title nav nav-tabs nav-bordered mt-2 mb-2"></h4>
</div>
</div>
</div>
</div>
</div>
<div class="card">
<div class="card-body">
  <div class="tab-content">
      <div class="tab-pane show active" id="input-types-preview">
            <div class="row">
               <h4 class="header-title nav nav-tabs nav-bordered mt-2 mb-2">Present Contact Information</h4>
               <div class="mb-2 col-md-3">
                <label for="example-select" class="form-label">Address 1</label>
                  <input type="text" tabindex="28" class="form-control Address1" name="Address1" id="Address1" >
                  <span class="error"></span>
               </div>
               <div class="mb-2 col-md-3">
                <label for="example-select" class="form-label">Address 2</label>
                  <input type="text" tabindex="29" class="form-control Address2" name="Address2" id="Address2" >
                  <span class="error"></span>
               </div>
               <div class="mb-2 col-md-3">
                <label for="example-select" class="form-label">State</label>
                  <input type="text" tabindex="30" class="form-control State" name="State" id="State" >
                  <span class="error"></span>
               </div>
               <div class="mb-2 col-md-3">
                <label for="example-select" class="form-label">City</label>
                  <input type="text" tabindex="31" class="form-control City" name="City" id="City" >
                  <span class="error"></span>
               </div>
               <div class="mb-2 col-md-3">
                <label for="example-select" class="form-label">Pincode</label>
                  <input type="text" tabindex="32" class="form-control Pincode" name="Pincode" id="Pincode" >
                  <span class="error"></span>
               </div>
               <div class="mb-2 col-md-3">
                <label for="example-select" class="form-label">Same Permanent Add</label>
                <br>
                <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" tabindex="33">
                  <span class="error"></span>
               </div>
               </div>
               <h4 class="header-title nav nav-tabs nav-bordered mt-2 mb-2"></h4>
</div>
</div>
</div>
</div>
</div>
<div class="card">
<div class="card-body">
  <div class="tab-content">
      <div class="tab-pane show active" id="input-types-preview">
            <div class="row">
               <h4 class="header-title nav nav-tabs nav-bordered mt-2 mb-2">Permanent Contact Information</h4>
               <div class="mb-2 col-md-3">
                <label for="example-select" class="form-label">Address 1</label>
                  <input type="text" tabindex="34" class="form-control Address1P" name="Address1P" id="Address1P" >
                  <span class="error"></span>
               </div>
               <div class="mb-2 col-md-3">
                <label for="example-select" class="form-label">Address 2</label>
                  <input type="text" tabindex="35" class="form-control Address2P" name="Address2P" id="Address2P" >
                  <span class="error"></span>
               </div>
               <div class="mb-2 col-md-3">
                <label for="example-select" class="form-label">State</label>
                  <input type="text" tabindex="36" class="form-control StateP" name="StateP" id="StateP" >
                  <span class="error"></span>
               </div>
               <div class="mb-2 col-md-3">
                <label for="example-select" class="form-label">City</label>
                  <input type="text" tabindex="37" class="form-control CityP" name="CityP" id="CityP" >
                  <span class="error"></span>
               </div>
               <div class="mb-2 col-md-3">
                <label for="example-select" class="form-label">Pincode</label>
                  <input type="text" tabindex="38" class="form-control PincodeP" name="PincodeP" id="PincodeP" >
                  <span class="error"></span>
               </div>
               </div>
               <h4 class="header-title nav nav-tabs nav-bordered mt-2 mb-2"></h4>
</div>
</div>
</div>
</div>
</div>
<div class="card">
<div class="card-body">
  <div class="tab-content">
      <div class="tab-pane show active" id="input-types-preview">
            <div class="row">
               <h4 class="header-title nav nav-tabs nav-bordered mt-2 mb-2">Login Information</h4>
               <div class="mb-2 col-md-3">
                <label for="example-select" class="form-label">Login Name</label>
                  <input type="text" tabindex="39" class="form-control LoginName" name="LoginName" id="LoginName" autocomplete="off ">
                  <span class="error"></span>
               </div>
               <div class="mb-2 col-md-3">
                <label for="example-select" class="form-label">Password</label>
                  <input type="password" tabindex="40" class="form-control Password" name="Password" id="Password"  autocomplete="off ">
                  <span class="error"></span>
               </div>
               <div class="mb-2 col-md-3">
                <label for="example-select" class="form-label">Role</label>
                  
                  <select   class="form-control Role" name="Role" id="Role" tabindex="41">
                     <option value="">--select--</option>
                    @foreach($RoleMaster as $role)
                    <option value="{{$role->id}}">{{$role->RoleName}}</option>
                    @endforeach
                   
                  </select>
                  <span class="error"></span>
               </div>
               <h4 class="header-title nav nav-tabs nav-bordered mt-2 mb-2"></h4>
               <div class="mb-2 col-md-4">
               <input type="button" value="Save" class="btn btn-primary btnSubmit mt-3" id="btnSubmit" onclick="AddEmployee()" tabindex="42">
                  <a href="{{url('EmployeeMaster')}}" class="btn btn-primary mt-3">Cancel</a>
               </div>
               
               <div class="mb-2 col-md-2">
            </div>
              <h4 class="header-title nav nav-tabs nav-bordered mt-2"></h4>
               <form action="" method="GET">
          @csrf
          @method('GET')
          </div>
</div>
</div>
</div>
</div>
<div class="card">
<div class="card-body">
  <div class="tab-content">
      <div class="tab-pane show active" id="input-types-preview">
            <div class="row">
                  <div class="mb-2 col-md-3">
                   <input type="text"  class="form-control BillDate" name="search"  placeholder="Search"  autocomplete="off" tabindex="43">
                   </div>
                   <div class="mb-2 col-md-3">
                           <button type="button" name="submit" value="Search" class="btn btn-primary" tabindex="44">Submit</button>
                          </div> 
                    </form>
                    <div class="table-responsive a">
           <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
           <tr>
            <th style="min-width:130px;">ACTION</th>
            <th style="min-width:80px;">SL#</th>
            <th style="min-width:150px;">Employee Code</th>
            <th style="min-width:150px;">Employee Name</th>
            <th style="min-width:150px;">Reporting Person</th>
            <th style="min-width:130px;">Office Name</th>
            <th style="min-width:160px;">Department Name</th>
            <th style="min-width:160px;">Designation Name</th>
            <th style="min-width:130px;">Joining Date</th>
            <th style="min-width:160px;">Last Working Date</th>
            <th style="min-width:130px;">Office Phone</th>
            <th style="min-width:130px;">Office Mobile</th>
            <th style="min-width:130px;">Office Email ID</th>
            <th style="min-width:130px;">Date Of Birth</th>
            <th style="min-width:160px;">Adhar</th>
            <th style="min-width:160px;">Driveing Licence</th>
            <th style="min-width:160px;">DL Expiry Date</th>
            <th style="min-width:160px;">Election Card No</th>
            <th style="min-width:130px;">PAN No</th>
            <th style="min-width:130px;">Passport No</th>
            <th style="min-width:180px;">Passport Expiry Date</th>
            <th style="min-width:130px;">Guardian</th>
            <th style="min-width:160px;">Guardian Name</th>
            <th style="min-width:130px;">Gender</th>
            <th style="min-width:160px;">Personal Mobile No</th>
            <th style="min-width:160px;">Personal Phone No</th>
            <th style="min-width:160px;">Personal Email ID</th>
            <th style="min-width:130px;">Present Add1</th>
            <th style="min-width:130px;">Present Add2</th>
            <th style="min-width:130px;">Present State</th>
            <th style="min-width:130px;">Present City</th>
            <th style="min-width:160px;">Present Pincode</th>
            <th style="min-width:160px;">Permanent Add1</th>
            <th style="min-width:160px;">Permanent Add2</th>
            <th style="min-width:160px;">Permanent State</th>
            <th style="min-width:160px;">Permanent City</th>
            <th style="min-width:180px;">Permanent Pincode</th>
            <th style="min-width:160px;">Allow Mobile App</th>
            <th style="min-width:130px;">Login Name</th>
            <th style="min-width:130px;">Password</th>
            <th style="min-width:130px;">Role</th>

           </tr>
         </thead>
         <tbody>
            <?php $i=0; ?>
            @foreach($employeeDetails as $emp)
              <tr>
              <?php  $i++; ?>
              <td><a href="javascript:void(0)" onclick="ViewEmployee('{{$emp->id}}')">View </a>/ <a href="javascript:void(0)" onclick="EditEmployee('{{$emp->id}}','{{$emp->user_id}}')">Edit</a></td>
              <td>{{$i}}</td>
              <td>{{$emp->EmployeeCode}}</td>
              <td>{{$emp->EmployeeName}}</td>
              <td>{{$emp->ReportingPerson}}</td>
              <td>{{$emp->OfficeMasterParent->OfficeCode}} ~ {{$emp->OfficeMasterParent->OfficeName}}</td>
              <td>{{$emp->DeptMasterDet->DepartmentName}}</td>
              <td>{{$emp->designationDet->DesignationName}}</td>
              <td>{{$emp->JoiningDate}}</td>
              <td>{{$emp->LastWorkDate}}</td>
              <td>{{$emp->OfficePhone}}</td>
              <td>{{$emp->OfficeMobileNo}}</td>
              <td>{{$emp->OfficeEmailID}}</td>
              <td>{{$emp->EmpPersonalDetails->DateOfBirth}}</td>
              <td>{{$emp->EmpPersonalDetails->AadhaarNo}}</td>
              <td>{{$emp->EmpPersonalDetails->DrivingLicence}}</td>
              <td>{{$emp->EmpPersonalDetails->DrivingLicenceExp}}</td>
              <td>{{$emp->EmpPersonalDetails->IDCardNo}}</td>
              <td>{{$emp->EmpPersonalDetails->PanNo}}</td>
              <td>{{$emp->EmpPersonalDetails->PassportNo}}</td>
              <td>{{$emp->EmpPersonalDetails->PassportExpDate}}</td>
              <td>{{$emp->EmpPersonalDetails->Guardian}}</td>
              <td>{{$emp->EmpPersonalDetails->GuardianName}}</td>
              <td>{{$emp->EmpPersonalDetails->Gender}}</td>
              <td>{{$emp->EmpPersonalDetails->PersonalMobileNo}}</td>
              <td>{{$emp->EmpPersonalDetails->PersonalPhoneNo}}</td>
              <td>{{$emp->EmpPersonalDetails->PersonalEmail}}</td>
              <td>{{$emp->EmpPresentDetails->Address1}}</td>
              <td>{{$emp->EmpPresentDetails->Address2}}</td>
              <td>{{$emp->EmpPresentDetails->State}}</td>
              <td>{{$emp->EmpPresentDetails->City}}</td>
              <td>{{$emp->EmpPresentDetails->Pincode}}</td>
              <td>{{$emp->EmpPerDetails->Address1}}</td>
              <td>{{$emp->EmpPerDetails->Address2}}</td>
              <td>{{$emp->EmpPerDetails->State}}</td>
              <td>{{$emp->EmpPerDetails->City}}</td>
              <td>{{$emp->EmpPerDetails->Pincode}}</td>
              <td></td>
              <td>@if(isset($emp->UserDetails->email)){{$emp->UserDetails->email}}@endif</td>
              <td>@if(isset($emp->UserDetails->ViewPassowrd)){{$emp->UserDetails->ViewPassowrd}}@endif</td>
              <td>@if(isset($emp->RoleDetails->RoleName)){{$emp->RoleDetails->RoleName}}@endif</td>
          </tr>
            @endforeach
         </tbody>
        </table>
        {!! $employeeDetails->appends(Request::all())->links() !!}
</div>
           </div>
         </div>
       
        
    </div>

</div>
 </div>
</div>
</div>
</div>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script type="text/javascript">
    $('.datepickerOne').datepicker({
          dateFormat: 'yy-mm-dd'
      });
      $('input[type="checkbox"]').click(function() { 
         if ($(this).is(':checked')) {
         var Address1=$('#Address1').val();
         var Address2=$('#Address2').val();
         var State=$('#State').val();
         var City=$('#City').val();
         var Pincode=$('#Pincode').val();
         $('.Address1P').val(Address1);
         $('.Address1P').attr('readonly', true);
         $('.Address2P').val(Address2);
         $('.Address2P').attr('readonly', true);
         $('.StateP').val(State);
         $('.StateP').attr('readonly', true);
         $('.CityP').val(City);
         $('.CityP').attr('readonly', true);
         $('.PincodeP').val(Pincode);
         $('.PincodeP').attr('readonly', true);
        
        } else {
          $('.Address1P').val('');
          $('.Address1P').attr('readonly', false);
          $('.Address2P').val('');
          $('.Address2P').attr('readonly', false);
          $('.StateP').val('');
          $('.StateP').attr('readonly', false);
          $('.CityP').val('');
          $('.CityP').attr('readonly', false);
          $('.PincodeP').val('');
          $('.PincodeP').attr('readonly', false);
        
    }
});
 function getLoginInformation(EmpCode)
 {
   $('.LoginName').val(EmpCode);
   $('.LoginName').attr('readonly', true);
   $('.Password').val(EmpCode);
  
 }
 function AddEmployee()
 {
   if($('#EmployeeCode').val()=='')
   {
     alert('Please Enter Employee Code');
     return false; 
   }
   if($('#EmployeeName').val()=='')
   {
     alert('Please Enter Employee Name');
     return false; 
   }
   if($('#OfficeName').val()=='')
   {
     alert('Please Select  Offcie');
     return false; 
   }
   if($('#DepartmentName').val()=='')
   {
     alert('Please Select Department Name');
     return false; 
   }
   if($('#DesignationName').val()=='')
   {
     alert('Please Select Designation');
     return false; 
   }
   if($('#JoiningDate').val()=='')
   {
     alert('Please Select Joining Date');
     return false; 
   }
   if($('#DateOfBirth').val()=='')
   {
     alert('Please Select Date Of Birth');
     return false; 
   }
var EmployeeCode=$('#EmployeeCode').val();
var eid=$('#eid').val();
var EmployeeName=$('#EmployeeName').val();
var ReportingPerson=$('#ReportingPerson').val();
var OfficeName=$('#OfficeName').val();
var DepartmentName=$('#DepartmentName').val();
var DesignationName=$('#DesignationName').val();
var JoiningDate=$('#JoiningDate').val();
var LastWorkDate=$('#LastWorkDate').val();
var OfficePhone=$('#OfficePhone').val();
var OfficeExt=$('#OfficeExt').val();
var OfficeMobileNo=$('#OfficeMobileNo').val();
var OfficeEmailID=$('#OfficeEmailID').val();
var DateOfBirth=$('#DateOfBirth').val();
var AadhaarNo=$('#AadhaarNo').val();
var DrivingLicence=$('#DrivingLicence').val();
var DrivingLicenceExp=$('#DrivingLicenceExp').val();
var IDCardNo=$('#IDCardNo').val();
var PanNo=$('#PanNo').val();
var PassportNo=$('#PassportNo').val();
var PassportExpDate=$('#PassportExpDate').val();
var Guardian=$('#Guardian').val();
var GuardianName=$('#GuardianName').val();
var PersonalMobileNo=$('#PersonalMobileNo').val();
var PersonalPhoneNo=$('#PersonalPhoneNo').val();
var PersonalEmail=$('#PersonalEmail').val();
var MALE=$('#MALE').val();
var Address1=$('#Address1').val();
var Address2=$('#Address2').val();
var State=$('#State').val();
var City=$('#City').val();
var Pincode=$('#Pincode').val();
var Address1p=$('#Address1P').val();
var Address2p=$('#Address2P').val();
var Statep=$('#StateP').val();
var Cityp=$('#CityP').val();
var Pincodep=$('#PincodeP').val();
var LoginName=$('#LoginName').val();
var Password=$('#Password').val();
var Role=$('#Role').val();
var userId=$('#userId').val();
    
   //  $(".btnSubmit").attr("disabled", true);
      var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/AddEmployee',
       cache: false,
       data: {
         'eid':eid,'EmployeeCode':EmployeeCode,'EmployeeName':EmployeeName,'ReportingPerson':OfficeName,'OfficeName':OfficeName,'DepartmentName':DepartmentName,'DesignationName':DesignationName,'JoiningDate':JoiningDate,'LastWorkDate':LastWorkDate,'OfficePhone':OfficePhone,'OfficeExt':OfficeExt,'OfficeMobileNo':OfficeMobileNo,'OfficeEmailID':OfficeEmailID,'DateOfBirth':DateOfBirth,'AadhaarNo':AadhaarNo,'DrivingLicence':DrivingLicence,'DrivingLicenceExp':DrivingLicenceExp,'IDCardNo':IDCardNo,'PanNo':PanNo,'PassportNo':PassportNo,'PassportExpDate':PassportExpDate,'Guardian':Guardian,'GuardianName':GuardianName,'PersonalMobileNo':PersonalMobileNo,'PersonalPhoneNo':PersonalPhoneNo,'PersonalEmail':PersonalEmail,'MALE':MALE,'Address1':Address1,'Address2':Address2,'State':State,'City':City,'Pincode':Pincode,'Address1p':Address1p,'Address2p':Address2p,'Statep':Statep,'Cityp':Cityp,'Pincodep':Pincodep,'LoginName':LoginName,'Password':Password,'Role':Role,'userId':userId
       },
       success: function(data) {
      location.reload();
       }
     });
  }  
  function ViewEmployee(id)
  {
   var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/ViewEmployee',
       cache: false,
       data: {
           'id':id
       },
       success: function(data) {
         const obj = JSON.parse(data);
         $('.EmployeeCode').val(obj.EmployeeCode);
         $('.EmployeeCode').attr('readonly', true);
         $('.EmployeeName').val(obj.EmployeeName);
         $('.EmployeeName').attr('readonly', true);
         $('.ReportingPerson').val(obj.ReportingPerson);
         $('.ReportingPerson').attr('readonly', true);
         $('.OfficeName').val(obj.OfficeName).trigger('change');
         $('.OfficeName').attr('disabled', true);
         $('.DepartmentName').val(obj.DepartmentName).trigger('change');
         $('.DepartmentName').attr('disabled', true);
         $('.DesignationName').val(obj.DesignationName).trigger('change');
         $('.DesignationName').attr('disabled', true);
         $('.JoiningDate').val(obj.JoiningDate);
         $('.JoiningDate').attr('readonly', true);
         $('.LastWorkDate').val(obj.LastWorkDate);
         $('.LastWorkDate').attr('readonly', true);
         $('.OfficePhone').val(obj.OfficePhone);
         $('.OfficePhone').attr('readonly', true);
         $('.OfficeExt').val(obj.OfficeExt);
         $('.OfficeExt').attr('readonly', true);
         $('.OfficeMobileNo').val(obj.OfficeMobileNo);
         $('.OfficeMobileNo').attr('readonly', true);
         $('.OfficeEmailID').val(obj.OfficeEmailID);
         $('.OfficeEmailID').attr('readonly', true);
         $('.DateOfBirth').val(obj.emp_personal_details.DateOfBirth);
         $('.DateOfBirth').attr('readonly', true);
         $('.AadhaarNo').val(obj.emp_personal_details.AadhaarNo);
         $('.AadhaarNo').attr('readonly', true);
         $('.DrivingLicence').val(obj.emp_personal_details.DrivingLicence);
         $('.DrivingLicence').attr('readonly', true);
         $('.DrivingLicenceExp').val(obj.emp_personal_details.DrivingLicenceExp);
         $('.DrivingLicenceExp').attr('readonly', true);
         $('.IDCardNo').val(obj.emp_personal_details.IDCardNo);
         $('.IDCardNo').attr('readonly', true);
         $('.PanNo').val(obj.emp_personal_details.PanNo);
         $('.PanNo').attr('readonly', true);
         $('.PassportNo').val(obj.emp_personal_details.PassportNo);
         $('.PassportNo').attr('readonly', true);
         $('.PassportExpDate').val(obj.emp_personal_details.PassportExpDate);
         $('.PassportExpDate').attr('readonly', true);
         $('.Guardian').val(obj.emp_personal_details.Guardian);
         $('.Guardian').attr('readonly', true);
         $('.GuardianName').val(obj.emp_personal_details.GuardianName);
         $('.GuardianName').attr('readonly', true);
         $('.PersonalMobileNo').val(obj.emp_personal_details.PersonalMobileNo);
         $('.PersonalMobileNo').attr('readonly', true);
         $('.PersonalPhoneNo').val(obj.emp_personal_details.PersonalPhoneNo);
         $('.PersonalPhoneNo').attr('readonly', true);
         $('.PersonalEmail').val(obj.emp_personal_details.PersonalEmail);
         $('.PersonalEmail').attr('readonly', true);
         $('.MALE').val(obj.emp_personal_details.Gender);
         $('.MALE').attr('readonly', true);
         $('.Address1').val(obj.emp_present_details.Address1);
         $('.Address1').attr('readonly', true);
         $('.Address2').val(obj.emp_present_details.Address2);
         $('.Address2').attr('readonly', true);
         $('.State').val(obj.emp_present_details.State);
         $('.State').attr('readonly', true);
         $('.City').val(obj.emp_present_details.City);
         $('.City').attr('readonly', true);
         $('.Pincode').val(obj.emp_present_details.Pincode);
         $('.Pincode').attr('readonly', true);
         $('.Address1P').val(obj.emp_per_details.Address1);
         $('.Address1P').attr('readonly', true);
         $('.Address2P').val(obj.emp_per_details.Address2);
         $('.Address2P').attr('readonly', true);
         $('.StateP').val(obj.emp_per_details.State);
         $('.StateP').attr('readonly', true);
         $('.CityP').val(obj.emp_per_details.City);
         $('.CityP').attr('readonly', true);
         $('.PincodeP').val(obj.emp_per_details.Pincode);
         $('.PincodeP').attr('readonly', true);
   
      
      
       }
     });
  }
  function EditEmployee(id,userId)
  {
    var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/ViewEmployee',
       cache: false,
       data: {
           'id':id,'userId':userId
       },
       success: function(data) {
         const obj = JSON.parse(data);
         $('.eid').val(obj.id)
         $('#userId').val(userId);
         $('.EmployeeCode').val(obj.EmployeeCode);
         $('.EmployeeCode').attr('readonly', false);
         $('.EmployeeName').val(obj.EmployeeName);
         $('.EmployeeName').attr('readonly', false);
         $('.ReportingPerson').val(obj.ReportingPerson);
         $('.ReportingPerson').attr('readonly', false);
         $('.OfficeName').val(obj.OfficeName).trigger('change');
         $('.OfficeName').attr('disabled', false);
         $('.DepartmentName').val(obj.DepartmentName).trigger('change');
         $('.DepartmentName').attr('disabled', false);
         $('.DesignationName').val(obj.DesignationName).trigger('change');
         $('.DesignationName').attr('disabled', false);
         $('.JoiningDate').val(obj.JoiningDate);
         $('.JoiningDate').attr('readonly', false);
         $('.LastWorkDate').val(obj.LastWorkDate);
         $('.LastWorkDate').attr('readonly', false);
         $('.OfficePhone').val(obj.OfficePhone);
         $('.OfficePhone').attr('readonly', false);
         $('.OfficeExt').val(obj.OfficeExt);
         $('.OfficeExt').attr('readonly', false);
         $('.OfficeMobileNo').val(obj.OfficeMobileNo);
         $('.OfficeMobileNo').attr('readonly', false);
         $('.OfficeEmailID').val(obj.OfficeEmailID);
         $('.OfficeEmailID').attr('readonly', false);
         $('.DateOfBirth').val(obj.emp_personal_details.DateOfBirth);
         $('.DateOfBirth').attr('readonly', false);
         $('.AadhaarNo').val(obj.emp_personal_details.AadhaarNo);
         $('.AadhaarNo').attr('readonly', false);
         $('.DrivingLicence').val(obj.emp_personal_details.DrivingLicence);
         $('.DrivingLicence').attr('readonly', false);
         $('.DrivingLicenceExp').val(obj.emp_personal_details.DrivingLicenceExp);
         $('.DrivingLicenceExp').attr('readonly', false);
         $('.IDCardNo').val(obj.emp_personal_details.IDCardNo);
         $('.IDCardNo').attr('readonly', false);
         $('.PanNo').val(obj.emp_personal_details.PanNo);
         $('.PanNo').attr('readonly', false);
         $('.PassportNo').val(obj.emp_personal_details.PassportNo);
         $('.PassportNo').attr('readonly', false);
         $('.PassportExpDate').val(obj.emp_personal_details.PassportExpDate);
         $('.PassportExpDate').attr('readonly', false);
         $('.Guardian').val(obj.emp_personal_details.Guardian);
         $('.Guardian').attr('readonly', false);
         $('.GuardianName').val(obj.emp_personal_details.GuardianName);
         $('.GuardianName').attr('readonly', false);
         $('.PersonalMobileNo').val(obj.emp_personal_details.PersonalMobileNo);
         $('.PersonalMobileNo').attr('readonly', false);
         $('.PersonalPhoneNo').val(obj.emp_personal_details.PersonalPhoneNo);
         $('.PersonalPhoneNo').attr('readonly', false);
         $('.PersonalEmail').val(obj.emp_personal_details.PersonalEmail);
         $('.PersonalEmail').attr('readonly', false);
         $('.MALE').val(obj.emp_personal_details.Gender);
         $('.MALE').attr('readonly', false);
         $('.Address1').val(obj.emp_present_details.Address1);
         $('.Address1').attr('readonly', false);
         $('.Address2').val(obj.emp_present_details.Address2);
         $('.Address2').attr('readonly', false);
         $('.State').val(obj.emp_present_details.State);
         $('.State').attr('readonly', false);
         $('.City').val(obj.emp_present_details.City);
         $('.City').attr('readonly', false);
         $('.Pincode').val(obj.emp_present_details.Pincode);
         $('.Pincode').attr('readonly', false);
         $('.Address1P').val(obj.emp_per_details.Address1);
         $('.Address1P').attr('readonly', false);
         $('.Address2P').val(obj.emp_per_details.Address2);
         $('.Address2P').attr('readonly', false);
         $('.StateP').val(obj.emp_per_details.State);
         $('.StateP').attr('readonly', false);
         $('.CityP').val(obj.emp_per_details.City);
         $('.CityP').attr('readonly', false);
         $('.PincodeP').val(obj.emp_per_details.Pincode);
         $('.PincodeP').attr('readonly', false);
        
   
      
      
       }
     });
        
      
      
  }
</script>