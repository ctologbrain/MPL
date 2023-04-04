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
            </div>
        </div>
    </div>
    <div class="row">
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
                                    <div class="row">
                                  
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
                                                <select class="form-control City" name="City" id="City" onclick="getpincode(this.value)" tabindex="9">
                                              </select>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-4 col-form-label" for="password">Pincode<span class="error">*</span></label>
                                                <div class="col-md-8">
                                                <!-- <input type="text" tabindex="1" class="form-control Pincode" name="Pincode" id="Pincode" > -->
                                                <select class="form-control Pincode" name="Pincode" id="Pincode" tabindex="10">
                                              </select>    
                                            </div>
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
                                            <div class="col-4">
                                               </div>
                                             <div class="col-1">
                                            <div class="row">
                                            <input type="button" value="Save" class="btn btn-primary btnSubmit mt-3" id="btnSubmit" onclick="SubMitOffcie()" tabindex="15">
                                               
                                                </div>
                                            </div>
                                            <div class="col-1">
                                            <div class="row">
                                           
                                            <a href="{{url('ViewOfficeMaster')}}" class="btn btn-primary mt-3" tabindex="16">Cancel</a>
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
                                  <div class="row">
                                              <div class="mb-2 col-md-3">
                                               <input type="text"  class="form-control" value="{{ request()->get('search') }}" name="search"  placeholder="Search"  autocomplete="off" tabindex="17">
                                               </div>
                                               
                                               <div class="mb-2 col-md-2">
                                                       <button type="submit" name="submit" value="Search" class="btn btn-primary" tabindex="18">Submit</button>
                                                </div>
                                                <div class="mb-2 col-md-3">
                   <input type="Submit"  class="btn btn-primary" tabindex="8" value="Export" name="Submit" >
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
                          <tr>
                          <th style="min-width:130px;">ACTION</th>
                            <th style="min-width:20px;">SL#</th>
                            <th style="min-width:190px;">Office Type</th>
                            <th style="min-width:130px;">Parent Office</th>
                            <th style="min-width:130px;">Office Code</th>
                            <th style="min-width:130px;">Office Name    </th>
                            <th style="min-width:130px;">GST No</th>
                            <th style="min-width:150px;">Contact Person</th>
                            <th style="min-width:130px;">Office Address</th>
                            <th style="min-width:130px;">State Name</th>
                            <th style="min-width:130px;">City</th>
                            <th style="min-width:130px;">Phone No</th>
                            <th style="min-width:130px;">Personal No</th>
                            <th style="min-width:130px;">Email ID</th>
                           </tr>
                       </thead>
                         <tbody>
                                <?php $i=0; ?>
                               @foreach($officeDetails as $offcieDet)
                               <tr>
                               <?php $i++; ?>
                               <td><a href="javascript:void(0)" onclick="viewOffice('{{$offcieDet->id}}')">View</a> / <a href="javascript:void(0)" onclick="EditOffice('{{$offcieDet->id}}')">Edit</a></td>
                               <td>{{$i}}</td>
                               <td>@if(isset($offcieDet->OfficeTypeMasterDetails->OfficeTypeCode)){{$offcieDet->OfficeTypeMasterDetails->OfficeTypeCode}} ~ {{$offcieDet->OfficeTypeMasterDetails->OfficeTypeName}}@endif</td>
                               <td>@if(isset($offcieDet->OfficeMasterParent->OfficeCode)){{$offcieDet->OfficeMasterParent->OfficeCode}} ~ {{$offcieDet->OfficeMasterParent->OfficeName}}@endif</td>
                               <td>{{$offcieDet->OfficeCode}}</td>
                               <td>{{$offcieDet->OfficeName}}</td>
                               <td>{{$offcieDet->GSTNo}}</td>
                               <td>{{$offcieDet->ContactPerson}}</td>
                               <td>{{$offcieDet->OfficeAddress}}</td>
                               <td>{{$offcieDet->StatesDetails->name}}</td>
                               <td>{{$offcieDet->CityDetails->CityName}}</td>
                               <td>{{$offcieDet->PhoneNo}}</td>
                               <td>{{$offcieDet->PersonalNo}}</td>
                               <td>{{$offcieDet->EmailID}}</td>
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

    if(gstlength < 16 || gstlength > 16)
   {
      alert('GST No. Must be 16 Digit No.');
      return false;
   }
  
   if($('#OfficeCode').val()=='')
   {
      alert('please Enter Office Code');
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
   
   if($('#Pincode').text().length!= 6)
   {
      alert('Pin Code Must Be 6 Digits');
      return false;
   }

   
   if($('#MobileNo').val()!="" ){
    if($('#MobileNo').val().length< 10 || $('#MobileNo').val().length > 10)
   {
      alert('Mobile No. is Incorrect');
      return false;
   }
}

if($('#PhoneNo').val()!="" ){
  if(  $('#PhoneNo').val().length< 10 || $('#PhoneNo').val().length > 10)
   {
      alert('Phone No. is Incorrect');
      return false;
   }
}

if($('#PersonalNo').val()!="" ){
  if(  $('#PersonalNo').val().length< 10 || $('#PersonalNo').val().length > 10)
   {
      alert('Personal No. is Incorrect');
      return false;
   }
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
           'OffcieType':OffcieType,'Officeid':Officeid,'ParentOffice':ParentOffice,'GSTNo':GSTNo,'OfficeCode':OfficeCode,'OfficeName':OfficeName,'ContactPerson':ContactPerson,'OfficeAddress':OfficeAddress,'State':State,'City':City,'Pincode':Pincode,'MobileNo':MobileNo,'PhoneNo':PhoneNo,'PersonalNo':PersonalNo,'EmailID':EmailID
       },
       success: function(data) {
        location.reload();
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