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
            <div class="text-start fw-bold blue_color">
                        FIELDS WITH (*) MARK ARE MANDATORY.
              </div>
          </div>
      </div>
    </div>
    <div class="row pl-pr mt-1">
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
                      <div class="row pl-pr mt-1">
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
                              <input type="text" tabindex="7" class="form-control JoiningDate datepickerOne" name="JoiningDate" id="JoiningDate" readonly>
                              <span class="error"></span>
                        </div>
                        <div class="mb-2 col-md-3">
                            <label for="example-select" class="form-label">Last Work Date</label>
                              <input type="text" tabindex="8" class="form-control LastWorkDate datepickerOne" name="LastWorkDate" id="LastWorkDate" readonly>
                              <span class="error"></span>
                        </div>
                        <div class="mb-2 col-md-3">
                            <label for="example-select" class="form-label">Office Phone</label>
                              <input type="number" tabindex="9" class="form-control OfficePhone" name="OfficePhone" id="OfficePhone" >
                              <span class="error"></span>
                        </div>
                        <div class="mb-2 col-md-3">
                            <label for="example-select" class="form-label">Office Ext</label>
                              <input type="number" tabindex="10" class="form-control OfficeExt" name="OfficeExt" id="OfficeExt" >
                              <span class="error"></span>
                        </div>
                        <div class="mb-2 col-md-3">
                            <label for="example-select" class="form-label">Office Mobile No</label>
                              <input type="number" tabindex="11" class="form-control OfficeMobileNo" name="OfficeMobileNo" id="OfficeMobileNo" >
                              <span class="error"></span>
                        </div>
                        <div class="mb-2 col-md-3">
                            <label for="example-select" class="form-label">Office Email ID</label>
                              <input type="email" tabindex="12" class="form-control OfficeEmailID" name="OfficeEmailID" id="OfficeEmailID" >
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
                      <div class="row pl-pr mt-1">
                        <h4 class="header-title nav nav-tabs nav-bordered mt-2 mb-2">Personal Information</h4>
                        <div class="mb-2 col-md-3">
                          <label for="example-select" class="form-label">Date Of Birth<span class="error">*</span></label>
                            <input type="text" tabindex="13" class="form-control DateOfBirth datepickerOne" name="DateOfBirth" id="DateOfBirth" readonly>
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
                            <input type="number" tabindex="23" class="form-control PersonalMobileNo" name="PersonalMobileNo" id="PersonalMobileNo" >
                            <span class="error"></span>
                        </div>
                        <div class="mb-2 col-md-3">
                          <label for="example-select" class="form-label">Personal Phone No</label>
                            <input type="number" tabindex="24" class="form-control PersonalPhoneNo" name="PersonalPhoneNo" id="PersonalPhoneNo" >
                            <span class="error"></span>
                        </div>
                        <div class="mb-2 col-md-3">
                          <label for="example-select" class="form-label">Personal Email</label>
                            <input type="email" tabindex="25" class="form-control PersonalEmail" name="PersonalEmail" id="PersonalEmail" >
                            <span class="error"></span>
                        </div>
                        <div class="mb-2 col-md-3">
                          <label for="example-select" class="form-label">Gender</label>
                          <br>
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
        <div class="card">
          <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane show active" id="input-types-preview">
                      <div class="row pl-pr mt-1">
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
                            <input type="number" tabindex="32" class="form-control Pincode" name="Pincode" id="Pincode" >
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
                      <div class="row pl-pr mt-1">
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
                            <input type="number" tabindex="38" class="form-control PincodeP" name="PincodeP" id="PincodeP" >
                            <span class="error"></span>
                        </div>
                      </div>
                      <h4 class="header-title nav nav-tabs nav-bordered mt-2 mb-2"></h4>
                </div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane show active" id="input-types-preview">
                      <div class="row pl-pr mt-1">
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
                            
                            <select   class="form-control Role selectBox" name="Role" id="Role" tabindex="41">
                              <option value="">--select--</option>
                              @foreach($RoleMaster as $role)
                              <option value="{{$role->id}}">{{$role->RoleName}}</option>
                              @endforeach
                            
                            </select>
                            <span class="error"></span>
                        </div>
                        <h4 class="header-title nav nav-tabs nav-bordered mt-2 mb-2"></h4>
                        <div class="mb-2 col-md-12 text-end">
                          <input type="button" value="Save" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="AddEmployee()" tabindex="42">
                          <a href="{{url('EmployeeMaster')}}" class="btn btn-primary">Cancel</a>
                        </div>
                        
                      <h4 class="header-title nav nav-tabs nav-bordered mt-2"></h4>
                    <form action="" method="GET">
                    @csrf
                    @method('GET')
                </div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane show active" id="input-types-preview">
                      <div class="row pl-pr mt-1">
                            <div class="mb-2 col-md-3">
                              <input type="text"  class="form-control BillDate" name="search" value="{{request()->get('search')}}"   placeholder="Search"  autocomplete="off" tabindex="43">
                            </div>
                            <div class="mb-2 col-md-3">
                                    <button type="submit" name="submit" value="Search" class="btn btn-primary" tabindex="44">Search</button>
                            </div> 
                            </form>
                        <div class="table-responsive a">
                          <table class="table table-bordered table-centered mb-1 mt-1">
                            <thead>
                            <tr class="main-title text-dark"> 
                                  <th style="min-width:130px;" class="p-1">ACTION</th>
                                  <th style="min-width:80px;" class="p-1">SL#</th>
                                  <th style="min-width:150px;" class="p-1">Employee Code</th>
                                  <th style="min-width:150px;" class="p-1">Employee Name</th>
                                  <th style="min-width:150px;" class="p-1">Reporting Person</th>
                                  <th style="min-width:130px;" class="p-1">Office Name</th>
                                  <th style="min-width:160px;" class="p-1">Department Name</th>
                                  <th style="min-width:160px;" class="p-1">Designation Name</th>
                                  <th style="min-width:130px;" class="p-1">Joining Date</th>
                                  <th style="min-width:160px;" class="p-1">Last Working Date</th>
                                  <th style="min-width:130px;" class="p-1">Office Phone</th>
                                  <th style="min-width:130px;" class="p-1">Office Mobile</th>
                                  <th style="min-width:130px;" class="p-1">Office Email ID</th>
                                  <th style="min-width:130px;" class="p-1">Date Of Birth</th>
                                  <th style="min-width:160px;" class="p-1">Adhar</th>
                                  <th style="min-width:160px;" class="p-1">Driveing Licence</th>
                                  <th style="min-width:160px;" class="p-1">DL Expiry Date</th>
                                  <th style="min-width:160px;" class="p-1">Election Card No</th>
                                  <th style="min-width:130px;" class="p-1">PAN No</th>
                                  <th style="min-width:130px;" class="p-1">Passport No</th>
                                  <th style="min-width:180px;" class="p-1">Passport Expiry Date</th>
                                  <th style="min-width:130px;" class="p-1">Guardian</th>
                                  <th style="min-width:160px;" class="p-1">Guardian Name</th>
                                  <th style="min-width:130px;" class="p-1">Gender</th>
                                  <th style="min-width:160px;" class="p-1">Personal Mobile No</th>
                                  <th style="min-width:160px;" class="p-1">Personal Phone No</th>
                                  <th style="min-width:160px;" class="p-1">Personal Email ID</th>
                                  <th style="min-width:130px;" class="p-1">Present Add1</th>
                                  <th style="min-width:130px;" class="p-1">Present Add2</th>
                                  <th style="min-width:130px;" class="p-1">Present State</th>
                                  <th style="min-width:130px;" class="p-1">Present City</th>
                                  <th style="min-width:160px;" class="p-1">Present Pincode</th>
                                  <th style="min-width:160px;" class="p-1">Permanent Add1</th>
                                  <th style="min-width:160px;" class="p-1">Permanent Add2</th>
                                  <th style="min-width:160px;" class="p-1">Permanent State</th>
                                  <th style="min-width:160px;" class="p-1">Permanent City</th>
                                  <th style="min-width:180px;" class="p-1">Permanent Pincode</th>
                                  <th style="min-width:160px;" class="p-1">Allow Mobile App</th>
                                  <th style="min-width:130px;" class="p-1">Login Name</th>
                                  <th style="min-width:130px;" class="p-1">Password</th>
                                  <th style="min-width:130px;" class="p-1">Role</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $i=0; 
                                $page=request()->get('page');
                                if(isset($page) && $page>1){
                                    $page =$page-1;
                                $i = intval($page*10);
                                }
                                  else{
                                $i=0;
                                }
                                ?>
                                @foreach($employeeDetails as $emp)
                                  <tr>
                                  <?php  $i++; ?>
                                  <td class="p-1"><a href="javascript:void(0)" onclick="ViewEmployee('{{$emp->id}}')">View </a>/ <a href="javascript:void(0)" onclick="EditEmployee('{{$emp->id}}','{{$emp->user_id}}')">Edit</a></td>
                                  <td class="p-1">{{$i}}</td>
                                  <td class="p-1">{{$emp->EmployeeCode}}</td>
                                  <td class="p-1">{{$emp->EmployeeName}}</td>
                                  <td class="p-1">{{$emp->ReportingPerson}}</td>
                                  <td class="p-1">@isset($emp->OfficeMasterParent->OfficeCode) {{$emp->OfficeMasterParent->OfficeCode}} ~ {{$emp->OfficeMasterParent->OfficeName}} @endisset</td>
                                  <td class="p-1">@isset($emp->DeptMasterDet->DepartmentName) {{$emp->DeptMasterDet->DepartmentName}} @endisset</td>
                                  <td class="p-1">@isset($emp->designationDet->DesignationName){{$emp->designationDet->DesignationName}} @endisset</td>
                                  <td class="p-1">{{$emp->JoiningDate}}</td>
                                  <td class="p-1">{{$emp->LastWorkDate}}</td>
                                  <td class="p-1">{{$emp->OfficePhone}}</td>
                                  <td class="p-1">{{$emp->OfficeMobileNo}}</td>
                                  <td class="p-1">{{$emp->OfficeEmailID}}</td>
                                  <td class="p-1">@isset($emp->EmpPersonalDetails->DateOfBirth) {{$emp->EmpPersonalDetails->DateOfBirth}} @endisset</td>
                                  <td class="p-1">@isset($emp->EmpPersonalDetails->AadhaarNo) {{$emp->EmpPersonalDetails->AadhaarNo}}  @endisset</td>
                                  <td class="p-1">@isset($emp->EmpPersonalDetails->DrivingLicence) {{$emp->EmpPersonalDetails->DrivingLicence}}  @endisset</td>
                                  <td class="p-1">@isset($emp->EmpPersonalDetails->DrivingLicenceExp) {{$emp->EmpPersonalDetails->DrivingLicenceExp}}  @endisset</td>
                                  <td class="p-1">@isset($emp->EmpPersonalDetails->IDCardNo) {{$emp->EmpPersonalDetails->IDCardNo}}  @endisset</td>
                                  <td class="p-1">@isset($emp->EmpPersonalDetails->PanNo) {{$emp->EmpPersonalDetails->PanNo}} @endisset</td>
                                  <td class="p-1">@isset($emp->EmpPersonalDetails->PassportNo) {{$emp->EmpPersonalDetails->PassportNo}}  @endisset</td>
                                  <td class="p-1">@isset($emp->EmpPersonalDetails->PassportExpDate) {{$emp->EmpPersonalDetails->PassportExpDate}} @endisset</td>
                                  <td class="p-1">@isset($emp->EmpPersonalDetails->Guardian) {{$emp->EmpPersonalDetails->Guardian}} @endisset</td>
                                  <td class="p-1">@isset($emp->EmpPersonalDetails->GuardianName) {{$emp->EmpPersonalDetails->GuardianName}} @endisset</td>
                                  <td class="p-1">@isset($emp->EmpPersonalDetails->Gender) {{$emp->EmpPersonalDetails->Gender}} @endisset</td>
                                  <td class="p-1">@isset($emp->EmpPersonalDetails->PersonalMobileNo) {{$emp->EmpPersonalDetails->PersonalMobileNo}} @endisset</td>
                                  <td class="p-1">@isset($emp->EmpPersonalDetails->PersonalPhoneNo) {{$emp->EmpPersonalDetails->PersonalPhoneNo}} @endisset</td>
                                  <td class="p-1">@isset($emp->EmpPersonalDetails->PersonalEmail) {{$emp->EmpPersonalDetails->PersonalEmail}} @endisset</td>

                                  <td class="p-1"> @isset($emp->EmpPresentDetails->Address1) {{$emp->EmpPresentDetails->Address1}} @endisset </td>
                                  <td class="p-1">@isset($emp->EmpPresentDetails->Address2) {{$emp->EmpPresentDetails->Address2}} @endisset</td>
                                  <td class="p-1">@isset($emp->EmpPresentDetails->State) {{$emp->EmpPresentDetails->State}} @endisset</td>
                                  <td class="p-1">@isset($emp->EmpPresentDetails->City) {{$emp->EmpPresentDetails->City}} @endisset</td>
                                  <td class="p-1">@isset($emp->EmpPresentDetails->Pincode) {{$emp->EmpPresentDetails->Pincode}} @endisset</td>
                                  <td class="p-1">@isset($emp->EmpPerDetails->Address1) {{$emp->EmpPerDetails->Address1}} @endisset</td>
                                  <td class="p-1"> @isset($emp->EmpPerDetails->Address2) {{$emp->EmpPerDetails->Address2}} @endisset</td>
                                  <td class="p-1"> @isset($emp->EmpPerDetails->State) {{$emp->EmpPerDetails->State}} @endisset</td>
                                  <td class="p-1"> @isset($emp->EmpPerDetails->City) {{$emp->EmpPerDetails->City}} @endisset</td>
                                  <td class="p-1" > @isset($emp->EmpPerDetails->Pincode) {{$emp->EmpPerDetails->Pincode}} @endisset</td>
                                  <td class="p-1"></td>
                                  <td class="p-1">@if(isset($emp->UserDetails->email)){{$emp->UserDetails->email}}@endif</td>
                                  <td class="p-1">@if(isset($emp->UserDetails->ViewPassowrd)){{$emp->UserDetails->ViewPassowrd}}@endif</td>
                                  <td class="p-1">@if(isset($emp->UserDetails->RoleDetails->RoleName)){{$emp->UserDetails->RoleDetails->RoleName}}@endif</td>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<script type="text/javascript">
     $('.selectBox').select2();
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

const validateEmail = (email) => {
  return email.match(
    /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
  );
};


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
     alert('Please Select  Office');
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

  if($('#OfficeEmailID').val()!='')
   {
    if(validateEmail( $('#OfficeEmailID').val()) ==null)
   {
     alert('Please Enter a valid Email');
     return false; 
   }
  }

  if($('#PersonalEmail').val()!='')
   {
    if(validateEmail( $('#PersonalEmail').val()) ==null)
   {
     alert('Please Enter a valid Email');
     return false; 
   }
  }



 if($('#OfficeMobileNo').val()!="" ){
    if($('#OfficeMobileNo').val().length< 10 || $('#OfficeMobileNo').val().length > 10)
   {
      alert('Office Mobile No. is Incorrect');
      return false;
   }
}

if($('#PincodeP').val()!="" ){
  if( $('#PincodeP').val().length != 6 )
   {
      alert('Pincode range must be  6 Digit');
      return false;
   }
}

if($('#Pincode').val()!="" ){
  if( $('#Pincode').val().length != 6 )
   {
      alert('Pincode range must be  6 Digit');
      return false;
   }
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
       if(data=='false'){
                alert('Employee Code already Exist');
                  $(".btnSubmit").attr("disabled", false);
                  $('#EmployeeCode').focus();
            }
            else{
              alert(data);
                location.reload();
          }
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
        
         $('.LoginName').val(obj.user_details.email);
         $('.LoginName').attr('readonly', true);
         $('.Password').val(obj.user_details.ViewPassowrd);
         $('.Password').attr('readonly', true);
         $('.Role').val(obj.user_details.Role).trigger('change');
         $('.Role').attr('disabled', true);
          $(".btnSubmit").attr("disabled", true);
         $(window).scrollTop(0);
   
   
      
      
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
         $('.LoginName').val(obj.user_details.email);
         $('.LoginName').attr('readonly', false);
         $('.Password').val(obj.user_details.ViewPassowrd);
         $('.Password').attr('readonly', false);
         $('.Role').val(obj.user_details.Role).trigger('change');
         $('.Role').attr('disabled', false);
         $(window).scrollTop(0);
        $(".btnSubmit").attr("disabled", false);
   
      
      
       }
     });
        
      
      
  }
</script>