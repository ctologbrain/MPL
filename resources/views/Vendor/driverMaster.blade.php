@include('layouts.app')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Operation</a></li>
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
                    <form>
                        <div id="basicwizard">
                           <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label" for="userName">Driver Name<span
                                            class="error">*</span></label>
                                                <div class="col-md-9">
                                                <input type="text" tabindex="1" class="form-control DriverName" name="DriverName" id="DriverName" >
                                                <input type="hidden"  class="form-control did" name="did" id="did" >
                                                <span class="error"></span>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-3 col-form-label" for="password">Vendor Name<span
                                            class="error">*</span></label>
                                                <div class="col-md-9">
                                                <select id="VendorName" tabindex="2" class="form-control selectBox VendorName">
                                                <option value="">--Select--</option>
                                                @foreach($vendor as $vendors)
                                                <option value="{{$vendors->id}}">{{$vendors->VendorName}}</option>
                                                @endforeach
                                                
                                             </select>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-3 col-form-label" for="password">License No<span
                                            class="error">*</span></label>
                                                <div class="col-md-9">
                                                <input type="text" tabindex="3" class="form-control License" name="License" id="License" value="">
                                                </div>
                                            </div>
                                            </div>
                                        
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-3 col-form-label" for="password">L. Exp. Date<span
                                            class="error">*</span></label>
                                                <div class="col-md-9">
                                                <input type="text" tabindex="4" class="form-control LicenseExp datepickerOne" name="LicenseExp" id="LicenseExp" value="">
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label" for="userName">Address 1	<span
                                            class="error">*</span></label>
                                                <div class="col-md-9">
                                                <input type="text" tabindex="5" class="form-control Address1" name="Address1" id="Address1">
                                               
                                                <span class="error"></span>
                                                </div>
                                                
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-3 col-form-label" for="password">Address 2</label>
                                                <div class="col-md-9">
                                                <input type="text" tabindex="6" class="form-control Address2" name="Address2" id="Address2" value="" >
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label" for="userName">City<span
                                            class="error">*</span></label>
                                                <div class="col-md-9">
                                                <input type="text" tabindex="7" class="form-control City" name="City" id="City">
                                               
                                                <span class="error"></span>
                                                </div>
                                                
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-3 col-form-label" for="password">Pincode<span
                                            class="error">*</span></label>
                                                <div class="col-md-9">
                                                <input type="number" tabindex="8" class="form-control Pincode" name="Pincode" id="Pincode" value="" >
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label" for="userName">State<span
                                            class="error">*</span></label>
                                                <div class="col-md-9">
                                                <input type="text" tabindex="9" class="form-control State" name="State" id="State">
                                               
                                                <span class="error"></span>
                                                </div>
                                                
                                            </div>
                                            </div>
                                            <div class="col-6">
                                            <div class="row mb-1">
                                                <label class="col-md-3 col-form-label" for="password">Phone<span
                                            class="error">*</span></label>
                                                <div class="col-md-9">
                                                <input type="text" tabindex="10" class="form-control Phone" name="Phone" id="Phone" value="" >
                                                </div>
                                            </div>
                                            </div>
                                          </div>
                                               <div class="col-6">
                                            <div class="row mb-1">
                                             
                                                <div class="col-md-12 col-md-offset-3">
                                                <input type="button" tabindex="11" value="Save" class="btn btn-primary btnSubmit mt-3" id="btnSubmit" onclick="AddDriver()">
                                                <a href="{{url('ViewDriver')}}" tabindex="12" class="btn btn-primary mt-3">Cancel</a>
                                                <span class="error"></span>
                                                </div>
                                            </div>

                                            
                                        </div> <!-- end col -->
                                        
                                   </div>
                                 </div>
                               </div>
                           </div> <!-- tab-content -->
                        </div> <!-- end #basicwizard-->
                    </form>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
            <form action="" method="GET">
          @csrf
          @method('GET')
          <div class="card">
<div class="card-body">
<div class="tab-content">
  <div class="tab-pane show active" id="input-types-preview">
      <div class="row">
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
            <th style="min-width:130px;">SL#</th>
            <th style="min-width:130px;">Driver Name</th>
            <th style="min-width:130px;">Vendor Name</th>
            <th style="min-width:130px;">License No</th>
            <th style="min-width:130px;">License Exp Date</th>
            <th style="min-width:130px;">Address1</th>
            <th style="min-width:130px;">Address2</th>
            <th style="min-width:130px;">City</th>
            <th style="min-width:130px;">Pincode</th>
            <th style="min-width:130px;">State</th>
            <th style="min-width:130px;">Phone</th>
           	
             </tr>
         </thead>
         <tbody>
            <?php $i=0; ?>
            @foreach($driver as $driverDetails)
            <?php $i++; ?>
            <tr>
             <td><a href="javascript:void(0)" onclick="ViewDriver('{{$driverDetails->id}}')">View </a>/<a href="javascript:void(0)" onclick="EditDriver('{{$driverDetails->id}}')"> Edit</a></td>   
             <td>{{$i}}</td>
             <td>{{$driverDetails->DriverName}}</td>
             <td>@isset($driverDetails->VendorDetails->VendorName) {{$driverDetails->VendorDetails->VendorName}} @endisset</td>
             <td>{{$driverDetails->License}}</td>
             <td>{{$driverDetails->LicenseExp}}</td>
             <td>{{$driverDetails->Address1}}</td>
             <td>{{$driverDetails->Address2}}</td>
             <td>{{$driverDetails->City}}</td>
             <td>{{$driverDetails->Pincode}}</td>
             <td>{{$driverDetails->State}}</td>
             <td>{{$driverDetails->Phone}}</td>
            </tr>
            @endforeach
          
         </tbody>
        </table>
</div>
        <div class="d-flex d-flex justify-content-between">
        {!! $driver->appends(Request::all())->links() !!}
        </div>
        
        </div> <!-- end col -->
      

    </div>
</div>
<script type="text/javascript">
    $('.datepickerOne').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
      });

 function AddDriver()
 {
   
  // $(".btnSubmit").attr("disabled", true);
   if($('#DriverName').val()=='')
   {
      alert('please Enter Driver Name');
      return false;
   }
   if($('#VendorName').val()=='')
   {
      alert('please Select Vendor Name');
      return false;
   }
   
    if($('#License').val()=='')
   {
      alert('please Enter License');
      return false;
   }
   if($('#LicenseExp').val()=='')
   {
      alert('please Enter License Exp. Date');
      return false;
   }
   if($('#Address1').val()=='')
   {
      alert('please Enter Address 1');
      return false;
   }
   if($('#City').val()=='')
   {
      alert('please Enter City');
      return false;
   }
   if($('#Pincode').val()=='')
   {
      alert('please Enter Pincode');
      return false;
   }
   if($('#Pincode').val()!='')
   {
       if($('#Pincode').val().length!=6)
       {
          alert('Pincode Must Be 6 Digits No.');
          return false;
       }
    }
   if($('#State').val()=='')
   {
      alert('please Enter State');
      return false;
   }
   if($('#Phone').val()=='')
   {
      alert('please Enter Phone');
      return false;
   }

   if($('#Phone').val()!='')
   {
       if($('#Phone').val().length!=10)
       {
          alert('Phone No. Is Incorrect');
          return false;
       }
    }
  
   var DriverName=$('#DriverName').val();
   var VendorName=$('#VendorName').val();
   var License=$('#License').val();
   var LicenseExp=$('#LicenseExp').val();
   var Address1=$('#Address1').val();
   var Address2=$('#Address2').val();
   var City=$('#City').val();
   var Pincode=$('#Pincode').val();
   var State=$('#State').val();
   var Phone=$('#Phone').val();
   var did=$('#did').val();
 
      var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/AddDriver',
       cache: false,
       data: {
           'DriverName':DriverName,'VendorName':VendorName,'License':License,'LicenseExp':LicenseExp,'Address1':Address1,'Address2':Address2,'City':City,'Pincode':Pincode,'State':State,'Phone':Phone,'did':did
       },
       success: function(data) {
        location.reload();
       }
     });
  }  
  function ViewDriver(id)
  {
   var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/ViewDriverDetatils',
       cache: false,
       data: {
           'id':id
       },
       success: function(data) {
        const obj = JSON.parse(data);
         $('.DriverName').val(obj.DriverName);
         $('.DriverName').attr('readonly', true);
         $('.VendorName').val(obj.VendorName).trigger('change');
         $('.VendorName').attr('disabled', true);
         $('.License').val(obj.License);
         $('.License').attr('readonly', true);
         $('.LicenseExp').val(obj.LicenseExp);
         $('.LicenseExp').attr('readonly', true);
         $('.Address1').val(obj.Address1);
         $('.Address1').attr('readonly', true);
         $('.Address2').val(obj.Address2);
         $('.Address2').attr('readonly', true);
         $('.City').val(obj.City);
         $('.City').attr('readonly', true);
         $('.Pincode').val(obj.Pincode);
         $('.Pincode').attr('readonly', true);
         $('.State').val(obj.State);
         $('.State').attr('readonly', true);
         $('.Phone').val(obj.Phone);
         $('.Phone').attr('readonly', true);
         
      
       }
     });
  }
  function EditDriver(id)
  {
    var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/ViewDriverDetatils',
       cache: false,
       data: {
           'id':id
       },
       success: function(data) {
        const obj = JSON.parse(data);
         $('.did').val(obj.id);
         $('.DriverName').val(obj.DriverName);
         $('.DriverName').attr('readonly', false);

         $('.VendorName').val(obj.VendorName).trigger('change');
         $('.VendorName').attr('disabled', false);

          $('.VendorName').attr('readonly', false);
         $('.License').val(obj.License);
         $('.License').attr('readonly', false);
         $('.LicenseExp').val(obj.LicenseExp);
         $('.LicenseExp').attr('readonly', false);
         $('.Address1').val(obj.Address1);
         $('.Address1').attr('readonly', false);
         $('.Address2').val(obj.Address2);
         $('.Address2').attr('readonly', false);
         $('.City').val(obj.City);
         $('.City').attr('readonly', false);
         $('.Pincode').val(obj.Pincode);
         $('.Pincode').attr('readonly', false);
         $('.State').val(obj.State);
         $('.State').attr('readonly', false);
         $('.Phone').val(obj.Phone);
         $('.Phone').attr('readonly', false);
         
      
       }
     });
  }
</script>