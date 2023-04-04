@include('layouts.app')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Vendor</a></li>
                        <li class="breadcrumb-item active">{{$title}}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{$title}}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    
                        <div id="basicwizard">
                           <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="userName">OfficeName<span
                                            class="error">*</span></label>
                                                <div class="col-md-8">
                                                  <select name="OfficeName" tabindex="1" class="form-control OfficeName" id="OfficeName">
                                                   <option value="">Select Office</option>
                                                   @foreach($office as $officeList)
                                                   <option value="{{$officeList->id}}">{{$officeList->OfficeCode}} ~ {{$officeList->OfficeName}}</option>
                                                   @endforeach
                                                  </select>
                                                  <input type="hidden" name="Vid"  class="form-control Vid" id="Vid">	
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Mode Type</label>
                                                <div class="col-md-8">
                                                <!-- <input type="text" name="ModeType" tabindex="2" class="form-control ModeType" id="ModeType"> -->
                                                <select name="ModeType" tabindex="2" class="form-control ModeType" id="ModeType">
                                                 <option value="">Select Mode Type</option>   
                                                 <option value="AIR">AIR</option>   
                                                 <option value="COURIER">COURIER</option>   
                                                 <option value="ROAD">ROAD</option>
                                                 <option value="TRAIN">TRAIN</option>
                                                </select>	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="userName">Vendor Code<span
                                            class="error">*</span></label>
                                                <div class="col-md-8">
                                                  <input type="text" name="VendorCode" tabindex="3" class="form-control VendorCode" id="VendorCode">	
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Vendor Name<span  class="error">*</span></label>
                                                <div class="col-md-8">
                                                <input type="text" name="VendorName" tabindex="4" class="form-control VendorName" id="VendorName">	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="userName">Nature Of Vendor</label>
                                                <div class="col-md-8">
                                                  <!-- <input type="text" name="NatureOfVendor" tabindex="5" class="form-control NatureOfVendor" id="NatureOfVendor">	 -->
                                                  <select name="NatureOfVendor" tabindex="5" class="form-control NatureOfVendor" id="NatureOfVendor">
                                                  <option selected="selected" value="COMPANY">COMPANY</option>
                                                  <option value="FIRM">FIRM</option>
                                                  <option value="INDIVIDUAL">INDIVIDUAL</option>
                                                  </select>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">FCM / RCM</label>
                                                <div class="col-md-8">
                                                <!-- <input type="text" name="FCM" tabindex="6" class="form-control FCM" id="FCM"> -->
                                                 <select name="FCM" tabindex="6" class="form-control FCM" id="FCM">
                                                 <option selected="selected" value="FCM">FCM</option>
	                                             <option value="RCM">RCM</option>
                                                  </select>	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="userName">Vendor Identification</label>
                                                <div class="col-md-8">
                                                  <!-- <input type="text" name="Identification" tabindex="7" class="form-control Identification" id="Identification"> -->
                                                  <select name="Identification" tabindex="7" class="form-control Identification" id="Identification">
                                                  <option value="3PL">3PL</option>
                                                <option value="AIRLINE">AIRLINE</option>
                                                <option selected="selected" value="COMPUTER VENDOR">COMPUTER VENDOR</option>
                                                <option value="COURIER VENDOR">COURIER VENDOR</option>
                                                <option value="FIXED ASSETS PURCHASE">FIXED ASSETS PURCHASE</option>
                                                <option value="HIRING">HIRING</option>
                                                <option value="OFFICE VENDOR">OFFICE VENDOR</option>
                                                <option value="OTHER VENDOR">OTHER VENDOR</option>
                                                <option value="OWNER">OWNER</option>
                                                <option value="PRINTING AND STATIONERY">PRINTING AND STATIONERY</option>
                                                <option value="REPAIR AND MAINTENANCE">REPAIR AND MAINTENANCE</option>
                                                <option value="SELF">SELF</option>
                                                <option value="TRANSPORTER">TRANSPORTER</option>
                                                  </select>	
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">GST No</label>
                                                <div class="col-md-8">
                                                <input type="text" name="Gst" tabindex="8" class="form-control Gst" id="Gst">	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="userName">Transport Group</label>
                                                <div class="col-md-8">
                                                  <input type="text" name="TransportGroup" tabindex="9" class="form-control TransportGroup" id="TransportGroup">	
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Credit Period</label>
                                                <div class="col-md-8">
                                                <input type="text" name="CreditPeriod" tabindex="10" class="form-control CreditPeriod" id="CreditPeriod">	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="userName">RFQ Password</label>
                                                <div class="col-md-8">
                                                  <input type="text" name="Password" tabindex="11" class="form-control Password" id="Password">	
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Allow Without FPM</label>
                                                <div class="col-md-8">
                                                <input type="text" name="WithoutFPM" tabindex="12" class="form-control WithoutFPM" id="WithoutFPM">	
                                                </div>
                                            </div>
                                           </div>
                                           
                                          
                                           </div>
                                          </div>
                                             
                                            
                                        </div> <!-- end col -->
                                        
                                   </div>
                           </div>
                   </div>
                           
            <div class="card">
                <div class="card-body">
                    
                        <div id="basicwizard">
                           <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="userName">Bank Name<span
                                            class="error">*</span></label>
                                                <div class="col-md-8">
                                                  <input type="text" name="BankName" tabindex="13" class="form-control BankName" id="BankName">	
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Branch Name<span  class="error">*</span></label>
                                                <div class="col-md-8">
                                                <input type="text" name="BranchName" tabindex="14" class="form-control BranchName" id="BranchName">	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="userName">Branch Address<span
                                            class="error">*</span></label>
                                                <div class="col-md-8">
                                                  <input type="text" name="BranchAddress" tabindex="15" class="form-control BranchAddress" id="BranchAddress">	
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Name as in Account<span  class="error">*</span></label>
                                                <div class="col-md-8">
                                                <input type="text" name="NameOfAccount" tabindex="16" class="form-control NameOfAccount" id="NameOfAccount">	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="userName">Account Type<span
                                            class="error">*</span></label>
                                                <div class="col-md-8">
                                                  <!-- <input type="text" name="AccountType" tabindex="17" class="form-control AccountType" id="AccountType">	 -->
                                                  <select name="AccountType" tabindex="17" class="form-control AccountType" id="AccountType">
                                                  <option selected="selected" value="">--Select--</option>
                                                  <option value="SAVING">SAVING</option>
                                                  <option value="CURRENT">CURRENT</option>
                                                  </select>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Account No<span  class="error">*</span></label>
                                                <div class="col-md-8">
                                                <input type="text" name="AccountNo" tabindex="18" class="form-control AccountNo" id="AccountNo">	
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">IFSC Code<span  class="error">*</span></label>
                                                <div class="col-md-8">
                                                <input type="text" name="IfscCode" tabindex="19" class="form-control IfscCode" id="IfscCode">	
                                                </div>
                                            </div>
                                           </div>
                                            </div>
                                          </div>
                                          </div> <!-- end col -->
                                   </div>
                                 </div>
                               </div>
            <div class="card">
                <div class="card-body">
                  
                        <div id="basicwizard">
                           <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="userName">Name<span
                                            class="error">*</span></label>
                                                <div class="col-md-8">
                                                  <input type="text" tabindex="19" name="Name" class="form-control Name" id="Name">  
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Address1<span  class="error">*</span></label>
                                                <div class="col-md-8">
                                                <input type="text" tabindex="20" name="Address1" class="form-control Address1" id="Address1">  
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="userName">Mobile<span
                                            class="error">*</span></label>
                                                <div class="col-md-8">
                                                  <input type="text" name="Mobile" tabindex="21" class="form-control Mobile" id="Mobile">  
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Address2<span  class="error">*</span></label>
                                                <div class="col-md-8">
                                                <input type="text" name="Address2" tabindex="22" class="form-control Address2" id="Address2">  
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="userName">EMail<span
                                            class="error">*</span></label>
                                                <div class="col-md-8">
                                                  <input type="text" name="Email" tabindex="23" class="form-control Email" id="Email">  
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Pincode<span  class="error">*</span></label>
                                                <div class="col-md-8">
                                                <input type="text" name="Pincode" tabindex="24" class="form-control Pincode" id="Pincode">  
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">City<span  class="error">*</span></label>
                                                <div class="col-md-8">
                                                <input type="text" name="City" tabindex="25" class="form-control City" id="City">  
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">State<span  class="error">*</span></label>
                                                <div class="col-md-8">
                                                <input type="text" name="State" tabindex="26" class="form-control State" id="State">  
                                                </div>
                                            </div>
                                           </div>
                                           <div class="col-md-2">
                                            <input type="button" value="Save" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="AddVendor()">
                                               <a href="{{url('VendorMaster')}}" class="btn btn-primary">Cancel</a>
                                            </div>
                                           </div>
                                          </div>
                                             
                                            
                                        </div> 
                                        
                                   </div>
                                 </div>
                               </div>
                           </div> 
                        </div> 
                        <div class="card">
     <div class="card-body">
     <form action="" method="GET">
          @csrf
          @method('GET')
     <div class="tab-content b-0 mb-0">
    <div class="tab-pane active show" id="basictab1" role="tabpanel">
        <div class="row">
        <div class="col-12">
          <div class="mb-2 col-md-3">
                   <input type="text"  class="form-control" value="{{ request()->get('search') }}" name="search"  placeholder="Search"  autocomplete="off">
                   </div>
                   
                   <div class="mb-2 col-md-3">
                           <button type="submit" name="submit" value="Search" class="btn btn-primary">Submit</button>
                          </div> 
                    </form>
            <div class="table-responsive a">
               <table class="table table-bordered table-centered mb-1 mt-1">
           <thead>
          <tr>
          <th style="min-width:130px;">ACTION</th>
          <th style="min-width:20px;">SL#</th>
          <th style="min-width:130px;">Office Name</th>
          <th style="min-width:130px;">Mode Type</th>
          <th style="min-width:130px;">Vendor Code</th>
          <th style="min-width:130px;">Vendor Name</th>
          <th style="min-width:150px;">Vendor Identification</th>
          <th style="min-width:130px;">Nature Of Vendor</th>
          <th style="min-width:130px;">FCM_RCM</th>
          <th style="min-width:130px;">GST No</th>
          <th style="min-width:130px;">Credit Period</th>
         <th style="min-width:130px;">Transport Group</th>
          <th style="min-width:130px;">RFQ Password</th>
          <th style="min-width:130px;">Bank Name</th>
          <th style="min-width:130px;">Branch Name</th>
          <th style="min-width:130px;">Branch Address</th>
          <th style="min-width:150px;">Name as in Account</th>
          <th style="min-width:130px;">Account Type</th>
          <th style="min-width:130px;">Account No</th>
          <th style="min-width:130px;">IFSC Code</th>
          <th style="min-width:130px;">Contact Person</th>
          <th style="min-width:130px;">Mobile</th>
          <th style="min-width:130px;">Phone</th>
          <th style="min-width:130px;">Email</th>
          <th style="min-width:130px;">Address1</th>
          <th style="min-width:130px;">Address2</th>
          <th style="min-width:130px;">Pincode</th>
          <th style="min-width:130px;">City</th>
          <th style="min-width:130px;">State</th>
           </tr>
         </thead>
         <tbody>
            <?php $i=0; ?>
            @foreach($vendor as $vendorList)
        <?php $i++; ?>
        <tr>
        <td>
            <a href="javascript:void(0)" onclick="ViewVendor('{{$vendorList->id}}')">View</a> |
            <a href="javascript:void(0)" onclick="EditVendor('{{$vendorList->id}}')">Edit</a>
        </td>
            <td>{{$i}}</td>
            <td>@isset($vendorList->OfficeDetails->OfficeCode) {{$vendorList->OfficeDetails->OfficeCode}} ~ {{$vendorList->OfficeDetails->OfficeName}} @endisset</td>
            <td>{{$vendorList->ModeType}}</td>
            <td>{{$vendorList->VendorCode}}</td>
            <td>{{$vendorList->VendorName}}</td>
            <td>{{$vendorList->Identification}}</td>
            <td>{{$vendorList->NatureOfVendor}}</td>
            <td>{{$vendorList->FCM}}</td>
            <td>{{$vendorList->Gst}}</td>
            <td>{{$vendorList->CreditPeriod}}</td>
            <td>{{$vendorList->TransportGroup}}</td>
            <td>{{$vendorList->Password}}</td>
            <td>@isset($vendorList->VendorBankDetails->BankName){{$vendorList->VendorBankDetails->BankName}} @endisset</td>
            <td>@isset($vendorList->VendorBankDetails->BranchName){{$vendorList->VendorBankDetails->BranchName}}  @endisset</td>
            <td>@isset($vendorList->VendorBankDetails->BranchAddress){{$vendorList->VendorBankDetails->BranchAddress}}  @endisset</td>   
            <td>@isset($vendorList->VendorBankDetails->NameOfAccount){{$vendorList->VendorBankDetails->NameOfAccount}}  @endisset</td>
            
           
              <td>@isset($vendorList->VendorBankDetails->AccountType){{$vendorList->VendorBankDetails->AccountType}}  @endisset</td>
            <td>@isset($vendorList->VendorBankDetails->AccountNo){{$vendorList->VendorBankDetails->AccountNo}}  @endisset</td>
         
           
            <td>@isset($vendorList->VendorBankDetails->IfscCode){{$vendorList->VendorBankDetails->IfscCode}}  @endisset</td>
            <td>@isset($vendorList->VendorBankDetails->Name){{$vendorList->VendorDetails->Name}}  @endisset</td>
             <td>@isset($vendorList->VendorDetails->Mobile){{$vendorList->VendorDetails->Mobile}}  @endisset</td>
            <td></td> 
             <td>@isset($vendorList->VendorDetails->Email){{$vendorList->VendorDetails->Email}}  @endisset</td>
            <td>@isset($vendorList->VendorBankDetails->Address1){{$vendorList->VendorDetails->Address1}}  @endisset</td>
            <td>@isset($vendorList->VendorBankDetails->Address2){{$vendorList->VendorDetails->Address2}}  @endisset</td>
           
           
            <td>@isset($vendorList->VendorDetails->Pincode){{$vendorList->VendorDetails->Pincode}} @endisset</td>
            <td>@isset($vendorList->VendorDetails->City){{$vendorList->VendorDetails->City}} @endisset</td>
            <td>@isset($vendorList->VendorDetails->State) {{$vendorList->VendorDetails->State}}  @endisset</td>
       

        </tr>

        @endforeach
        </tbody>
        </table>
       </div>
</form>
        <div class="d-flex d-flex justify-content-between">
        {!! $vendor->appends(Request::all())->links() !!}
        </div>
        
        </div> <!-- end col -->
      

    </div>
</div>
</div>
</div>
                   </div> 
<script>
  function AddVendor()
  {
     if($('#OfficeName').val()=='')
     {
        alert('Please select OfficeName');
        return false;
     }
     if($('#VendorCode').val()=='')
     {
        alert('Please Enter Vendor Code');
        return false;
     }
     if($('#VendorName').val()=='')
     {
        alert('Please Enter Vendor Name');
        return false;
     }
     if($('#BankName').val()=='')
     {
        alert('Please Enter Bank Name');
        return false;
     }
     if($('#BranchName').val()=='')
     {
        alert('Please Enter Branch Name');
        return false;
     }
     if($('#BranchAddress').val()=='')
     {
        alert('Please Enter Branch Address');
        return false;
     }
     if($('#NameOfAccount').val()=='')
     {
        alert('Please Enter Name Of Account');
        return false;
     }
     if($('#AccountType').val()=='')
     {
        alert('Please Select Account Type');
        return false;
     }
     if($('#AccountNo').val()=='')
     {
        alert('Please Enter Account No');
        return false;
     }
     if($('#IfscCode').val()=='')
     {
        alert('Please Enter IfscCode');
        return false;
     }
     if($('#Name').val()=='')
     {
        alert('Please Enter Name');
        return false;
     }
     if($('#Address1').val()=='')
     {
        alert('Please Enter Address1');
        return false;
     }
     if($('#Address2').val()=='')
     {
        alert('Please Enter Address2');
        return false;
     }
     if($('#Mobile').val()=='')
     {
        alert('Please Enter Mobile');
        return false;
     }
     if($('#Pincode').val()=='')
     {
        alert('Please Enter Pincode');
        return false;
     }
     if($('#City').val()=='')
     {
        alert('Please Enter City');
        return false;
     }
     if($('#State').val()=='')
     {
        alert('Please Enter State');
        return false;
     }
     var OfficeName=$('#OfficeName').val();
     var vid=$('#Vid').val();
     var ModeType=$('#ModeType').val();
     var VendorCode=$('#VendorCode').val();
     var VendorName=$('#VendorName').val();
     var NatureOfVendor=$('#NatureOfVendor').val();
     var FCM=$('#FCM').val();
     var Identification=$('#Identification').val();
     var Gst=$('#Gst').val();
     var TransportGroup=$('#TransportGroup').val();
     var CreditPeriod=$('#CreditPeriod').val();
     var Password=$('#Password').val();
     var WithoutFPM=$('#WithoutFPM').val();
     var BankName=$('#BankName').val();
     var BranchName=$('#BranchName').val();
     var BranchAddress=$('#BranchAddress').val();
     var NameOfAccount=$('#NameOfAccount').val();
     var AccountType=$('#AccountType').val();
     var AccountNo=$('#AccountNo').val();
     var IfscCode=$('#IfscCode').val();
     var Name=$('#Name').val();
     var Address1=$('#Address1').val();
     var Mobile=$('#Mobile').val();
     var Address2=$('#Address2').val();
     var Email=$('#Email').val();
     var Pincode=$('#Pincode').val();
     var City=$('#City').val();
     var State=$('#State').val();

     var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/AddVendor',
       cache: false,
       data: {
           'Vid':vid,'OfficeName':OfficeName,'ModeType':ModeType,'VendorCode':VendorCode,'VendorName':VendorName,'NatureOfVendor':NatureOfVendor,'FCM':FCM,'Identification':Identification,'Gst':Gst,'TransportGroup':TransportGroup,'CreditPeriod':CreditPeriod,'Password':Password,'WithoutFPM':WithoutFPM,'BankName':BankName,'BranchName':BranchName,'BranchAddress':BranchAddress,'NameOfAccount':NameOfAccount,'AccountType':AccountType,'AccountNo':AccountNo,'IfscCode':IfscCode,'Name':Name,'Address1':Address1,'Mobile':Mobile,'Address2':Address2,'Email':Email,'Pincode':Pincode,'City':City,'State':State
             },
           success: function(data) {
           location.reload();
       }
     });
  }
  function ViewVendor(id) 
  {
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/ViewVendor',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
     const obj = JSON.parse(data);
     
     $('.OfficeName').val(obj.OfficeName).trigger('change');
     $('.OfficeName').attr('disabled', true);
     $('.ModeType').val(obj.ModeType).trigger('change');
     $('.ModeType').attr('disabled', true);
     $('.VendorCode').val(obj.VendorCode);
     $('.VendorCode').attr('readonly', true);
     $('.VendorName').val(obj.VendorName);
     $('.VendorName').attr('readonly', true);
     $('.NatureOfVendor').val(obj.NatureOfVendor).trigger('change');
     $('.NatureOfVendor').attr('disabled', true);
     $('.FCM').val(obj.FCM).trigger('change');
     $('.FCM').attr('disabled', true);
     $('.Identification').val(obj.Identification).trigger('change');
     $('.Identification').attr('disabled', true);
     $('.Gst').val(obj.Gst);
     $('.Gst').attr('readonly', true);
     $('.TransportGroup').val(obj.TransportGroup);
     $('.TransportGroup').attr('readonly', true);
     $('.CreditPeriod').val(obj.CreditPeriod);
     $('.CreditPeriod').attr('readonly', true);
     $('.Password').val(obj.Password);
     $('.Password').attr('readonly', true);
     $('.WithoutFPM').val(obj.WithoutFPM);
     $('.WithoutFPM').attr('readonly', true);
     $('.BankName').val(obj.vendor_bank_details.BankName);
     $('.BankName').attr('readonly', true);
     $('.BranchName').val(obj.vendor_bank_details.BranchName);
     $('.BranchName').attr('readonly', true);
     $('.BranchAddress').val(obj.vendor_bank_details.BranchAddress);
     $('.BranchAddress').attr('readonly', true);
     $('.NameOfAccount').val(obj.vendor_bank_details.NameOfAccount);
     $('.NameOfAccount').attr('readonly', true);
     $('.AccountType').val(obj.vendor_bank_details.AccountType).trigger('change');
     $('.AccountType').attr('disabled', true);
     $('.AccountNo').val(obj.vendor_bank_details.AccountNo);
     $('.AccountNo').attr('readonly', true);
     $('.IfscCode').val(obj.vendor_bank_details.IfscCode);
     $('.IfscCode').attr('readonly', true);
     $('.Name').val(obj.vendor_details.Name);
     $('.Name').attr('readonly', true);
     $('.Address1').val(obj.vendor_details.Address1);
     $('.Address1').attr('readonly', true);
     $('.Address2').val(obj.vendor_details.Address2);
     $('.Address2').attr('readonly', true);
     $('.Mobile').val(obj.vendor_details.Mobile);
     $('.Mobile').attr('readonly', true);
     $('.Email').val(obj.vendor_details.Email);
     $('.Email').attr('readonly', true);
     $('.Pincode').val(obj.vendor_details.Pincode);
     $('.Pincode').attr('readonly', true);
     $('.City').val(obj.vendor_details.City);
     $('.City').attr('readonly', true);
     $('.State').val(obj.vendor_details.State);
     $('.State').attr('readonly', true);
    $('.btnSubmit').attr('disabled',true);
    }
    });
  }
  function EditVendor(id)
  {
    var base_url = '{{url('')}}';
    $.ajax({
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
        },
        url: base_url + '/ViewVendor',
        cache: false,
        data: {
            'id': id
        },
        success: function(data) {
     const obj = JSON.parse(data);
     $('.Vid').val(obj.id);
     $('.OfficeName').val(obj.OfficeName).trigger('change');
     $('.OfficeName').attr('disabled', false);
     $('.ModeType').val(obj.ModeType).trigger('change');
     $('.ModeType').attr('disabled', false);
     $('.VendorCode').val(obj.VendorCode);
     $('.VendorCode').attr('readonly', false);
     $('.VendorName').val(obj.VendorName);
     $('.VendorName').attr('readonly', false);
     $('.NatureOfVendor').val(obj.NatureOfVendor).trigger('change');
     $('.NatureOfVendor').attr('disabled', false);
     $('.FCM').val(obj.FCM).trigger('change');
     $('.FCM').attr('disabled', false);
     $('.Identification').val(obj.Identification).trigger('change');
     $('.Identification').attr('disabled', false);
     $('.Gst').val(obj.Gst);
     $('.Gst').attr('readonly', false);
     $('.TransportGroup').val(obj.TransportGroup);
     $('.TransportGroup').attr('readonly', false);
     $('.CreditPeriod').val(obj.CreditPeriod);
     $('.CreditPeriod').attr('readonly', false);
     $('.Password').val(obj.Password);
     $('.Password').attr('readonly', false);
     $('.WithoutFPM').val(obj.WithoutFPM);
     $('.WithoutFPM').attr('readonly', false);
     $('.BankName').val(obj.vendor_bank_details.BankName);
     $('.BankName').attr('readonly', false);
     $('.BranchName').val(obj.vendor_bank_details.BranchName);
     $('.BranchName').attr('readonly', false);
     $('.BranchAddress').val(obj.vendor_bank_details.BranchAddress);
     $('.BranchAddress').attr('readonly', false);
     $('.NameOfAccount').val(obj.vendor_bank_details.NameOfAccount);
     $('.NameOfAccount').attr('readonly', false);
     $('.AccountType').val(obj.vendor_bank_details.AccountType).trigger('change');
     $('.AccountType').attr('disabled', false);
     $('.AccountNo').val(obj.vendor_bank_details.AccountNo);
     $('.AccountNo').attr('readonly', false);
     $('.IfscCode').val(obj.vendor_bank_details.IfscCode);
     $('.IfscCode').attr('readonly', false);
     $('.Name').val(obj.vendor_details.Name);
     $('.Name').attr('readonly', false);
     $('.Address1').val(obj.vendor_details.Address1);
     $('.Address1').attr('readonly', false);
     $('.Address2').val(obj.vendor_details.Address2);
     $('.Address2').attr('readonly', false);
     $('.Mobile').val(obj.vendor_details.Mobile);
     $('.Mobile').attr('readonly', false);
     $('.Email').val(obj.vendor_details.Email);
     $('.Email').attr('readonly', false);
     $('.Pincode').val(obj.vendor_details.Pincode);
     $('.Pincode').attr('readonly', false);
     $('.City').val(obj.vendor_details.City);
     $('.City').attr('readonly', false);
     $('.State').val(obj.vendor_details.State);
     $('.State').attr('readonly', false);
    $('.btnSubmit').attr('disabled',false);
    }
    });
  } 
</script>