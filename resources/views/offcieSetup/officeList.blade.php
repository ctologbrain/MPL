@include('layouts.app')
<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Office</a></li>
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
        <div class="col-xl-12">
            <h4 class="header-title text-center">OFFICE INFORMATION</h4>
            <div class="card">
          
                <div class="card-body">
                    <form>
                        <div id="basicwizard">
                           <div class="tab-content b-0 mb-0">
                              <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                  
                                        <div class="col-6">
                                                <div class="row">
                                                    <label class="col-md-4 col-form-label" for="userName">Office Type   <span class="error">*</span></label>
                                                    <div class="col-md-8">
                                                    <select class="form-control OffcieType selectBox" tabindex="1" name="OffcieType" id="OffcieType">
                                                    <option value="">Select Office Type</option>
                                                    @foreach($offcieType as $officeT)
                                                    <option value="{{$officeT->id}}">{{$officeT->OfficeTypeCode}} ~ {{$officeT->OfficeTypeName}}</option>
                                                    @endforeach
                                                    </select>
                                                    <input type="hidden"  class="form-control Officeid" name="Officeid" id="Officeid">
                                                    <span class="error"></span>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Parent Office<span
                                                class="error">*</span></label>
                                                <div class="col-md-8">
                                                <select  class="form-control ParentOffice selectBox" tabindex="2" name="ParentOffice" id="ParentOffice" > 
                                                <option value="">Select Office</option> 
                                                   @foreach($office as $off)
                                                <option value="{{$off->id}}">{{$off->OfficeCode}} ~ {{$off->OfficeName}}</option>
                                                   @endforeach
                                                   </select>  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">GST No</label>
                                                <div class="col-md-8">
                                                <input type="text" tabindex="3" class="form-control GSTNo" name="GSTNo" max='16' id="GSTNo" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">Office Code<span class="error">*</span></label>
                                                <div class="col-md-8">
                                                <input type="text" tabindex="4" class="form-control OfficeCode" name="OfficeCode" id="OfficeCode" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">Office Name</label>
                                                <div class="col-md-8">
                                                <input type="text" tabindex="5" class="form-control OfficeName" name="OfficeName" id="OfficeName" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                           

                                            
                               </div> <!-- end col -->
                                        
                            </div>
                        </div>
                    </form>
                </div>
            </div> <!-- tab-content -->
             <h4 class="header-title text-center">CONTACT INFORMATION</h4>
            <div class="card">
             <div class="card-body">
                    <form>
                        <div id="basicwizard">
                           <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row pl-pr mt-1">
                                  
                                        <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="userName">Contact Person<span class="error">*</span></label>
                                                <div class="col-md-8">
                                                <input type="text" tabindex="6" class="form-control ContactPerson" name="ContactPerson" id="ContactPerson" >
                                                <span class="error"></span>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Office Address<span
                                            class="error">*</span></label>
                                                <div class="col-md-8">
                                                <input type="text" tabindex="7" class="form-control OfficeAddress" name="OfficeAddress" id="OfficeAddress" >
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">State<span class="error">*</span></label>
                                                <div class="col-md-8">
                                                <select class="form-control State selectBox" name="State" id="State" onchange="getCity(this.value)" tabindex="8"> 
                                                <option value="">Select State</option> 
                                                   @foreach($State as $sta)
                                                <option value="{{$sta->id}}">{{$sta->name}}</option>
                                                   @endforeach
                                                   </select>  
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">City<span class="error">*</span></label>
                                                <div class="col-md-8">
                                                <select class="form-control selectBox City" name="City" id="City" onchange="getpincode(this.value)" tabindex="9">
                                              </select>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Pincode<span class="error">*</span></label>
                                                <div class="col-md-8">
                                                <!-- <input type="text" tabindex="1" class="form-control Pincode" name="Pincode" id="Pincode" > -->
                                                <select class="form-control Pincode selectBox" name="Pincode" id="Pincode" tabindex="10">
                                              </select>    
                                            </div>
                                            <!-- <div class="col-md-2">
                                                <button class="btn btn-light" type="button" onclick="ViewPincode();">View</button>
                                            </div> -->
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">Mobile No<span class="error">*</span></label>
                                                <div class="col-md-8">
                                                <input type="number" tabindex="11" class="form-control MobileNo" name="MobileNo" id="MobileNo" >
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Phone No<span class="error">*</span></label>
                                                <div class="col-md-8">
                                                <input type="number" tabindex="12" class="form-control PhoneNo" name="PhoneNo" id="PhoneNo" >
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">Personal No<span class="error">*</span></label>
                                                <div class="col-md-8">
                                                <input type="number" tabindex="13" class="form-control PersonalNo" name="PersonalNo" id="PersonalNo" >
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="password">Email ID<span class="error">*</span></label>
                                                <div class="col-md-8">
                                                <input type="email" tabindex="14" class="form-control EmailID" name="EmailID" id="EmailID" >
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-4 col-form-label" for="Active">Active</label>
                                                <div class="col-md-8">
                                                <input type="checkbox" tabindex="15" class="Active mt-1" name="Active" id="Active" >
                                                </div>
                                            </div>
                                            </div>


                                             <div class="col-6 text-end mt-1">
                                            <div class="row">
                                            <label class="col-md-4 col-form-label" for="password"> </label>
                                            <div class="col-md-8">
                                            <input type="button" value="Save" class="btn btn-primary btnSubmit" id="btnSubmit" onclick="SubMitOffcie()" tabindex="15">
                                            <a href="{{url('ViewOfficeMaster')}}" class="btn btn-primary" tabindex="16">Cancel</a>
                                            <a href="{{url('KycOfficeMaster')}}" class="btn btn-primary" tabindex="16">Add KYC</a>
                                                </div>
                                              </div>
                                            </div>
                                            
                                           </div>
                                           

                                            
                                        </div> <!-- end col -->
                                        
                                   </div>
                                 </div>
                               </div>
                           </div> <!-- tab-content -->
                        </div> <!-- end #basicwizard-->
                    </form>
                     <form action="" method="GET">
                  @csrf
                  @method('GET')
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                              <div class="tab-pane show active" id="input-types-preview">
                                  <div class="row pl-pr mt-1">
                                              <div class="mb-2 col-md-3">
                                               <input type="text"  class="form-control" value="{{ request()->get('search') }}" name="search"  placeholder="Search"  autocomplete="off" tabindex="17">
                                               </div>
                                               
                                               <div class="mb-2 col-md-2">
                                                       <button type="submit" name="submit" value="Search" class="btn btn-primary" tabindex="18">Search</button>
                                                       <input type="Submit"  class="btn btn-primary" tabindex="19" value="Download" name="Submit" >
                                                </div>
                                               
                                  </div>
                              </div>
                            </div>
                        </div>
                    </div>
            </form>
            <div class="table-responsive">
                    <table class="table table-bordered table-centered mb-1 mt-1">
                       <thead>
                          <tr class="main-title text-dark">
                          <th style="min-width:130px;" class="p-1">ACTION</th>
                            <th style="min-width:20px;" class="p-1">SL#</th>
                            <th style="min-width:190px;" class="p-1">Office Type</th>
                            <th style="min-width:130px;" class="p-1">Parent Office</th>
                            <th style="min-width:130px;" class="p-1">Office Code</th>
                            <th style="min-width:130px;" class="p-1">Office Name    </th>
                            <th style="min-width:130px;" class="p-1">GST No</th>
                            <th style="min-width:150px;" class="p-1">Contact Person</th>
                            <th style="min-width:770px;" class="p-1">Office Address</th>
                            <th style="min-width:130px;" class="p-1">State Name</th>
                            <th style="min-width:130px;" class="p-1">City</th>
                            <th style="min-width:130px;" class="p-1">Phone No</th>
                            <th style="min-width:130px;" class="p-1">Personal No</th>
                            <th style="min-width:130px;" class="p-1">Email ID</th>
                            <th style="min-width:130px;" class="p-1">Pin Code</th>

                            <th style="min-width:130px;" class="p-1">Latitude</th>
                            <th style="min-width:130px;" class="p-1">Longitude</th>
                            <th style="min-width:130px;" class="p-1">Active</th>
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
                               @foreach($officeDetails as $offcieDet)
                               <tr>
                               <?php $i++; ?>
                               <td class="p-1"><a href="javascript:void(0)" onclick="viewOffice('{{$offcieDet->id}}')">View</a> / <a href="javascript:void(0)" onclick="EditOffice('{{$offcieDet->id}}')">Edit</a></td>
                               <td class="p-1">{{$i}}</td>
                               <td class="p-1">@if(isset($offcieDet->OfficeTypeMasterDetails->OfficeTypeCode)){{$offcieDet->OfficeTypeMasterDetails->OfficeTypeCode}} ~ {{$offcieDet->OfficeTypeMasterDetails->OfficeTypeName}}@endif</td>
                               <td class="p-1">@if(isset($offcieDet->OfficeMasterParent->OfficeCode)){{$offcieDet->OfficeMasterParent->OfficeCode}} ~ {{$offcieDet->OfficeMasterParent->OfficeName}}@endif</td>
                               <td class="p-1">{{$offcieDet->OfficeCode}}</td>
                               <td class="p-1">{{$offcieDet->OfficeName}}</td>
                               <td class="p-1">{{$offcieDet->GSTNo}}</td>
                               <td class="p-1">{{$offcieDet->ContactPerson}}</td>
                               <td class="p-1">{{$offcieDet->OfficeAddress}}</td>
                               <td class="p-1">{{$offcieDet->StatesDetails->name}}</td>
                               <td class="p-1">{{$offcieDet->CityDetails->CityName}}</td>
                               <td class="p-1">{{$offcieDet->PhoneNo}}</td>
                               <td class="p-1">{{$offcieDet->PersonalNo}}</td>
                               <td class="p-1">{{$offcieDet->EmailID}}</td>
                               <td class="p-1">{{$offcieDet->Pincode}}</td>
                               <td class="p-1">{{$offcieDet->CityDetails->latitude}}</td>
                               <td class="p-1">{{$offcieDet->CityDetails->longitude}}</td>
                               <td class="p-1">@isset($offcieDet->Is_Active){{$offcieDet->Is_Active}} @endisset</td>
                              </tr>
                            
                               @endforeach
                         </tbody>
                   </table>
            </div>
            <div class="d-flex d-flex justify-content-between">
            {!! $officeDetails->appends(Request::all())->links() !!}
            </div>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
           
        
        </div> <!-- end col -->
      

    </div>
</div>
<script>$('.selectBox').select2();</script>
<script type="text/javascript">
    
    function SubMitOffcie()
 {  
const validateEmail = (email) => {
  return email.match(
    /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
  );
};
    var gstlength = $('#GSTNo').val().length;
   if($('#OffcieType').val()=='')
   {
      alert('please Select Office Type');
      return false;
   }

    if(gstlength != 16 )
   {
      alert('GST No. Must be 16 Digit No.');
      return false;
   }
  
   if($('#OfficeCode').val()=='')
   {
      alert('please Enter Office Code');
      return false;
   }
   if ($('#ParentOffice').val() == '') {
    alert('please Enter Parent Office');
    return false;
    }
   if($('#OfficeName').val()=='')
   {
      alert('please Enter Office Name');
      return false;
   }
   if($('#ContactPerson').val()=='')
   {
      alert('please Enter Contact Person');
      return false;
   }

   if($('#OfficeAddress').val()=='')
   {
      alert('please Enter Office Address');
      return false;
   }

   if($('#State').val()=='')
   {
      alert('please Enter State');
      return false;
   }
   if($('#City').val()=='')
   {
      alert('please Enter City');
      return false;
   }
   if($('#Pincode').val()=='')
   {
      alert('please Enter Pin Code');
      return false;
   }
   
   if($('#Pincode :selected').text().length!= 6)
   { 
      alert('Pin Code Must Be 6 Digits');
      return false;
   }

   if($('#MobileNo').val()=='')
   {
      alert('please Enter Mobile No');
      return false;
   }

   
   if($('#MobileNo').val()!="" ){
    if($('#MobileNo').val().length!= 10)
   {
      alert('Mobile No. is Incorrect');
      return false;
   }
}

 if($('#PhoneNo').val()=='')
   {
      alert('please Enter Phone No');
      return false;
   }

if($('#PhoneNo').val()!="" ){
  if(  $('#PhoneNo').val().length!= 10)
   {
      alert('Phone No. is Incorrect');
      return false;
   }
}

if($('#PersonalNo').val()=='')
   {
      alert('please Enter Personal No');
      return false;
   }

if($('#PersonalNo').val()!="" ){
  if(  $('#PersonalNo').val().length!= 10)
   {
      alert('Personal No. is Incorrect');
      return false;
   }
}

if($('#EmailID').val()=='')
   {
      alert('please Enter Email ID');
      return false;
   }

if($('#EmailID').val()!="" ){
  if( validateEmail($('#EmailID').val())==null)
   {
      alert('Email ID  Is Not Valid');
      return false;
   }
}


   var OffcieType=$('#OffcieType').val();
   var Officeid=$('#Officeid').val(); 
   var ParentOffice=$('#ParentOffice').val(); 
   var GSTNo=$('#GSTNo').val(); 
   var OfficeCode=$('#OfficeCode').val(); 
   var OfficeName=$('#OfficeName').val(); 
   var ContactPerson=$('#ContactPerson').val(); 
   var OfficeAddress=$('#OfficeAddress').val(); 
   var State=$('#State').val(); 
   var City=$('#City').val(); 
   var Pincode=$('#Pincode').val();
   var MobileNo=$('#MobileNo').val();
   var PhoneNo=$('#PhoneNo').val();
   var PersonalNo=$('#PersonalNo').val();
   var EmailID=$('#EmailID').val();
   if($("#Active").prop("checked")==true){
    var Active ="Yes";
   }
   else{
    var Active ="No";
   }
 
   // $(".btnSubmit").attr("disabled", true);
      var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/AddOffcie',
       cache: false,
       data: {
           'OffcieType':OffcieType,'Officeid':Officeid,'ParentOffice':ParentOffice,'GSTNo':GSTNo,'OfficeCode':OfficeCode,'OfficeName':OfficeName,'ContactPerson':ContactPerson,'OfficeAddress':OfficeAddress,'State':State,'City':City,'Pincode':Pincode,'MobileNo':MobileNo,'PhoneNo':PhoneNo,'PersonalNo':PersonalNo,'EmailID':EmailID,'Active':Active
       },
       success: function(data) {
        if(data=='false'){
                alert('Office Code already Exist');
                  $(".btnSubmit").attr("disabled", false);
                  $('#OfficeCode').focus();
            }
            else{
                alert(data);
                location.reload();
          }
       }
     });
  }  
  function viewOffice(officeId)
  {
   var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/ViewOffice',
       cache: false,
       data: {
           'officeId':officeId
       },
       success: function(data) {
         const obj = JSON.parse(data);
         if(obj.office_master_parent==null)
         {
            var offcieP='';
         }
         else{
            var offcieP=obj.office_master_parent.id; 
         }
         $('.OffcieType').val(obj.office_type_master_details.id).trigger('change');
         $('.OffcieType').attr('disabled', true);
         $('.ParentOffice').val(offcieP).trigger('change');
         $('.ParentOffice').attr('disabled', true);
         $('.Officeid').val(obj.id); 
         $('.GSTNo').val(obj.GSTNo); 
          $('.GSTNo').attr('readonly', true);
          $('.OfficeCode').val(obj.OfficeCode); 
          $('.OfficeCode').attr('readonly', true);
          $('.OfficeName').val(obj.OfficeName); 
          $('.OfficeName').attr('readonly', true);
          $('.ContactPerson').val(obj.ContactPerson); 
          $('.ContactPerson').attr('readonly', true);
          $('.OfficeAddress').val(obj.OfficeAddress); 
          $('.OfficeAddress').attr('readonly', true);
        
          $('.Pincode').val(obj.Pincode).trigger('change');
          $('.Pincode').attr('disabled', true);
          $('.MobileNo').val(obj.MobileNo); 
          $('.MobileNo').attr('readonly', true);
          $('.PhoneNo').val(obj.PhoneNo); 
          $('.PhoneNo').attr('readonly', true);
          $('.PersonalNo').val(obj.PersonalNo); 
          $('.PersonalNo').attr('readonly', true);
          $('.EmailID').val(obj.EmailID); 
          $('.EmailID').attr('readonly', true);
           $('.State').val(obj.states_details.id).trigger('change');
          $('.State').attr('disabled', true);
          $('.City').attr('disabled', true);
          $("#Active").attr("disabled",true);
          if(obj.Is_Active=='Yes'){
          // var Active ="Yes"; obj.EmailID
          $("#Active").prop("checked",true);
          }
          else{
            $("#Active").prop("checked",false);
          }
        var cty=  getCity(obj.states_details.id,obj.city_details.id);
        var Pincode=     getpincode(obj.city_details.id,obj.Pincode);
          
         $('.City').html(cty);
           $('.Pincode').html(Pincode);
      
       }
     });
        $(".btnSubmit").attr("disabled", true);
          $(window).scrollTop(0);
  }
  function EditOffice(officeId)
  {
   var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/ViewOffice',
       cache: false,
       data: {
         'officeId':officeId
       },
       success: function(data) {
         const obj = JSON.parse(data);
        
        $('.Officeid').val(obj.id); 
         if(obj.office_master_parent==null)
         {
            var offcieP='';
         }
         else{
            var offcieP=obj.office_master_parent.id; 
         }
         $('.OffcieType').val(obj.office_type_master_details.id).trigger('change');
         $('.OffcieType').attr('disabled', false);
         $('.ParentOffice').val(offcieP).trigger('change');
         $('.ParentOffice').attr('disabled', false);
         $('.Officeid').val(obj.id); 
         $('.GSTNo').val(obj.GSTNo); 
          $('.GSTNo').attr('readonly', false);
          $('.OfficeCode').val(obj.OfficeCode); 
          $('.OfficeCode').attr('readonly', false);
          $('.OfficeName').val(obj.OfficeName); 
          $('.OfficeName').attr('readonly', false);
          $('.ContactPerson').val(obj.ContactPerson); 
          $('.ContactPerson').attr('readonly', false);
          $('.OfficeAddress').val(obj.OfficeAddress); 
          $('.OfficeAddress').attr('readonly', false);
          $('.Pincode').val(obj.Pincode).trigger('change');
          $('.Pincode').attr('disabled', false);
          $('.MobileNo').val(obj.MobileNo); 
          $('.MobileNo').attr('readonly', false);
          $('.PhoneNo').val(obj.PhoneNo); 
          $('.PhoneNo').attr('readonly', false);
          $('.PersonalNo').val(obj.PersonalNo); 
          $('.PersonalNo').attr('readonly', false);
          $('.EmailID').val(obj.EmailID); 
          $('.EmailID').attr('readonly', false);
          $('.State').val(obj.states_details.id).trigger('change');
          $('.State').attr('disabled', false);
          // $('.City').val(obj.city_details.id).trigger('change');
            $('.City').attr('disabled', false);
         var cty= getCity(obj.states_details.id,obj.city_details.id);
         var Pincode=  getpincode(obj.city_details.id,obj.Pincode);
           
           $('.City').html(cty);
           $('.Pincode').html(Pincode);
           $("#Active").attr("disabled",false);
           if(obj.Is_Active=='Yes'){
           
            $("#Active").prop("checked",true);
            }
            else{
              $("#Active").prop("checked",false);
            }
           $(".btnSubmit").attr("disabled", false);
           $(window).scrollTop(0);
         
      
      
       }
     });
   }
   function getCity(stateid,city='')
   {
  
      var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/getCity',
       cache: false,
       data: {
           'stateid':stateid,'city':city
       },
       success: function(data) {
         $('.City').html(data);
       }
     });
   }
    function getpincode(CityId,pincode='')
   {
    var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/getPinCode',
       cache: false,
       data: {
           'CityId':CityId,'pincode':pincode
       },
       success: function(data) {
         $('.Pincode').html(data);
       }
     });
   }
</script>