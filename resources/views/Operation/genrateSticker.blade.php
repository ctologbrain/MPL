@include('layouts.appTwo')

<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Operation</a></li>
                        <li class="breadcrumb-item active">MPS/DOCKET STICKER</li>
                    </ol>
                </div>
                <h4 class="page-title">MPS/DOCKET STICKER</h4>
                <div class="text-start fw-bold blue_color">
                    FIELDS WITH (*) MARK ARE MANDATORY.
                </div>
            </div>
        </div>
    </div>


    <form method="POST" action="" id="subForm">
        @csrf
        <div class="row pl-pr mt-1">
            <div class="col-xl-12">
                <div class="card customer_oda_rate">
                    <div class="card-body">
                        <div id="basicwizard">
                            <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">

                                    <div class="row pl-pr">
                                        <div class="col-6 pb-1">
                                            <div class="row">
                                                <label class="col-md-3 col-form-label mt-1" for="docket_type">Docket
                                                    Type</label>
                                                <div class="col-md-5 mt-1">
                                                    <select class="form-control docket_type selectBox" id="docket_type"
                                                        name="docket_type" tabindex="1">
                                                        <option value="">select</option>
                                                        <option value="1" selected>MPPS</option>
                                                        <option value="2">DOCKET</option>
                                                        <option value="3">COLOADER DOCKET</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                        </div>

                                        <hr>
                                        <div class="col-6 mb-1 mt-1">

                                            <div class="row">
                                                <label class="col-md-3 col-form-label"
                                                    for="Manual">Manual/Virtual</label>
                                                <div class="col-md-5">
                                                    <select class="form-control Manual selectBox" id="Manual"
                                                        name="Manual" tabindex="2" onchange="calculateManual(this.value)">
                                                        <option value="">select</option>
                                                        <option value="1" selected>MANUAL</option>
                                                        <option value="2">VIRTUAL</option>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-1 mt-1">

                                            <div class="row">


                                                <label class="col-md-3 col-form-label" for="docket_number">Docket
                                                    Number<span class="error">*</span></label>
                                                <div class="col-md-5">
                                                    <input type="text" name="docket_number"
                                                        class="form-control docket_number" id="docket_number"
                                                        tabindex="3" onchange="getDocketDetails(this.value)">

                                                </div>





                                            </div>
                                        </div>
                                        <div class="col-6 m-b-1">

                                            <div class="row">
                                                <label class="col-md-3 col-form-label" for="booking_office">Booking
                                                    Office<span class="error">*</span></label>
                                                <div class="col-md-7">
                                                     <select name="booking_office"  tabindex="4"
                                                        class="form-control booking_office selectBox" id="booking_office"
                                                        disabled>
                                                            <option value=""></option>
                                                            @foreach($offcieMaster as $office)
                                                            <option value="{{$office->id}}">{{$office->OfficeCode}}~{{$office->OfficeName}}</option>
                                                            @endforeach
                                                        </select>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 m-b-1">

                                            <div class="row">
                                                <label class="col-md-3 col-form-label" for="booking_date">Booking
                                                    Date<span class="error">*</span></label>
                                                <div class="col-md-3">
                                                    <input type="text" name="booking_date"
                                                        class="form-control booking_date datepickerOne" id="booking_date"
                                                        tabindex="5" readonly>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 m-b-1">

                                            <div class="row">
                                                <label class="col-md-3 col-form-label" for="customer_name">Customer
                                                    Name<span class="error">*</span></label>
                                                <div class="col-md-7">
                                                   <select name="customer_name"
                                                        class="form-control selectBox customer_name" id="customer_name"
                                                        tabindex="6" disabled onchange="getConsignerDetails(this.value)">
                                                            <option value=""></option>
                                                            @foreach($CustomerMaster as $cust)
                                                            <option value="{{$cust->id}}">{{$cust->CustomerCode}}~{{$cust->CustomerName}}</option>
                                                            @endforeach
                                                        </select>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6 m-b-1">

                                            <div class="row">
                                                <label class="col-md-3 col-form-label" for="consignor_name">Consignor
                                                    Name<span class="error">*</span></label>
                                                <div class="col-md-7">
                                                    <select  name="consignor_name"
                                                        class="form-control consignor_name selectBox consigner" id="consignor_name"
                                                        tabindex="6" disabled>
                                                        <option value=""></option>
                                                      </select>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 m-b-1">

                                            <div class="row">
                                                <label class="col-md-3 col-form-label" for="ref_no">Reference
                                                    Number</label>
                                                <div class="col-md-5">
                                                    <input type="text" name="ref_no" class="form-control ref_no"
                                                        id="ref_no" tabindex="7" readonly>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 m-b-1">

                                            <div class="row">
                                                <label class="col-md-3 col-form-label" for="mode">Mode<span
                                                        class="error">*</span></label>
                                                <div class="col-md-5">
                                                    <select class="form-control selectBox mode" id="mode" name="mode"
                                                        tabindex="8" disabled>
                                                        <option value=""></option>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 m-b-1">

                                            <div class="row">
                                                <label class="col-md-3 col-form-label" for="origin_city">Origin
                                                    City<span class="error">*</span></label>
                                                <div class="col-md-7">
                                                <select name="Origin" tabindex="9"
                                             class="form-control Origin selectBox" id="Origin" disabled>
                                            <option value=""></option>
                                            @foreach($city as $cities)
                                            <option value="{{$cities->id}}">{{$cities->CityName}}</option>
                                            @endforeach
                                              
                                            </select>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 m-b-1">

                                            <div class="row">
                                                <label class="col-md-3 col-form-label"
                                                    for="destination_city">Destination City<span
                                                        class="error">*</span></label>
                                                <div class="col-md-7">
                                                <select name="Destination" tabindex="10" class="form-control Destination selectBox" id="Destination" disabled>
                                            <option value=""></option>
                                            @foreach($city as $cities)
                                            <option value="{{$cities->id}}">{{$cities->CityName}}</option>
                                            @endforeach
                                            </select>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 m-b-1">

                                            <div class="row">
                                                <label class="col-md-3 col-form-label" for="pieces">Pieces<span
                                                        class="error">*</span></label>
                                                <div class="col-md-4">
                                                    <input type="text" name="pieces" class="form-control pieces"
                                                        id="pieces" tabindex="11" readonly>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 m-b-1">

                                            <div class="row">
                                                <label class="col-md-3 col-form-label" for="weight">Weight<span
                                                        class="error">*</span></label>
                                                <div class="col-md-4">
                                                    <input type="text" name="weight" class="form-control weight"
                                                        id="weight" tabindex="12" readonly>

                                                </div>
                                            </div>
                                        </div>


                                        <hr>

                                        <div class="col-12 text-center mb-1 mt-1">
                                            <input type="button" tabindex="13" value="Process"
                                                class="btn btn-primary btnSubmit" id="btnSubmit" onclick="submitSticker()">

                                            <a href="" tabindex="14" class="btn btn-primary">Reset</a>
                                        </div>



                                        <hr>



                                        <div class="col-12 main-title text-start fw-bold">
                                            <h6>Re Print Docket / MPPS</h6>
                                        </div>
                                        <div class="col-8">
                                            <div class="row mt-1 mb-1">
                                                <label class="col-md-2 col-form-label" for="reprint_docket_no">Reprint
                                                    Docket No.:<span class="error">*</span></label>
                                                <div class="col-md-3">
                                                    <input type="text" name="reprint_docket_no"
                                                        class="form-control reprint_docket_no" id="reprint_docket_no"
                                                        tabindex="12">
                                                </div>
                                                <div class="col-md-2">
                                                    <select class="form-control selectBox PrintDocketType" id="PrintDocketType"
                                                        name="origin_city" tabindex="9">
                                                        <option value="1">Docket</option>
                                                        <option value="2">Coloader Docket </option>
                                                        <option value="3">BROTHER - MPPS </option>
                                                        <option value="4">TSC - MPPS </option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <a href="javascript:void(0)" class="btn btn-primary" onclick="printSticker()">Print Sticker</a>
                                                        
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 main-title text-start fw-bold">
                                            <h6>Delete MPPS</h6>
                                        </div>
                                        <div class="col-7">
                                            <div class="row mt-1">
                                                <label class="col-md-2 col-form-label" for="docket_no">Docket No.<span
                                                        class="error">*</span></label>
                                                <div class="col-md-3">
                                                    <input type="text" name="docket_no" class="form-control docket_no"
                                                        id="docket_no" tabindex="12" >
                                                </div>
                                                <label class="col-md-2 col-form-label" for="reason">Reason<span
                                                        class="error">*</span></label>
                                                <div class="col-md-3">
                                                    <textarea class="form-control reason" name="reason"
                                                        id="reason"></textarea>
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="button" name="" class="btn btn-primary" value="Delete">
                                                </div>
                                            </div>
                                        </div>


                                    </div>




                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </form>
</div>
<script src="{{url('js/custome.js')}}"></script>
<script>
 $('.selectBox').select2();
 $('.datepickerOne').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        todayHighlight: true
    });
 function calculateManual(id)
 {
   
   if(id==2)
   {
     $('.docket_number').attr('readonly', true);
     $('.booking_office').attr('disabled',false);
     $('.customer_name').attr('disabled',false);
     $('.consignor_name').attr('disabled',false);
     $('.ref_no').attr('readonly',false);
     $('.mode').attr('disabled',false);
     $('.Origin').attr('disabled',false);
     $('.Destination').attr('disabled',false);
     $('.pieces').attr('readonly',false);
     $('.weight').attr('readonly',false);
     $('.booking_date').attr('readonly',false);
     $('.booking_office').val('').trigger('change'); 
     $('.customer_name').val('').trigger('change'); 
     $('.ref_no').val(''); 
     $('.Origin').val('').trigger('change'); 
     $('.Destination').val('').trigger('change'); 
     $('.mode').val('').trigger('change');
     $('.pieces').val(''); 
     $('.weight').val(''); 
     $('.booking_date').val('');
     $('.docket_number').val('');
   
   }
   else
   {
     $('.docket_number').attr('readonly', false);  
     $('.booking_office').attr('disabled',true);
     $('.customer_name').attr('disabled',true);
     $('.consignor_name').attr('disabled',true);
     $('.ref_no').attr('readonly',true);
     $('.mode').attr('disabled',true);
     $('.Origin').attr('disabled',true);
     $('.Destination').attr('disabled',true);
     $('.pieces').attr('readonly',true);
     $('.weight').attr('readonly',true); 
     $('.booking_date').attr('readonly',true);
   }
 }
 function getDocketDetails(Docket)
 {
    if($('#docket_type').val()=='')
    {
       alert('Please select Docket type');
       $('.docket_number').val('');
       $('.docket_number').focus();
       return false; 
    }
     var docket_type=$('#docket_type').val()
     var base_url = '{{url('')}}';
     $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/CheckDocketForSticker',
       cache: false,
       data: {
           'Docket':Docket,'docket_type':docket_type
       },
       success: function(data) {
           if(data=='false')
           {
            $('.booking_office').attr('disabled',false);
            $('.customer_name').attr('disabled',false);
            $('.consignor_name').attr('disabled',false);
            $('.ref_no').attr('readonly',false);
            $('.mode').attr('disabled',false);
            $('.Origin').attr('disabled',false);
            $('.Destination').attr('disabled',false);
            $('.pieces').attr('readonly',false);
            $('.weight').attr('readonly',false);
            $('.booking_date').attr('readonly',false);
           }
           else
           {
               var obj=JSON.parse(data);
               var BookingDate=moment(obj.Booking_Date).format('DD-MM-YYYY');
                $('.booking_office').val(obj.Office_ID).trigger('change'); 
               $('.customer_name').val(obj.Cust_Id).trigger('change'); 
               $('.ref_no').val(obj.Ref_No); 
               $('.Origin').val(obj.pincode_details.city).trigger('change'); 
               $('.Destination').val(obj.dest_pincode_details.city).trigger('change'); 
               $('.pieces').val(obj.docket_product_details.Qty); 
               $('.weight').val(obj.docket_product_details.Actual_Weight); 
               $('.booking_date').val(BookingDate);
               $('.booking_office').attr('disabled',true);
               $('.customer_name').attr('disabled',true);
               $('.consignor_name').attr('disabled',true);
               $('.ref_no').attr('readonly',true);
               $('.mode').attr('disabled',true);
               $('.Origin').attr('disabled',true);
               $('.Destination').attr('disabled',true);
               $('.pieces').attr('readonly',true);
               $('.weight').attr('readonly',true); 
               $('.booking_date').attr('readonly',true);
           }
         }
     });
 } 
 function getConsignerDetails(customer)
 {
    var base_url = '{{url('')}}';
     $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/GetConsigneeForCust',
       cache: false,
       data: {
           'customer':customer
       },
       success: function(data) {
        $('.consigner').html(data);
        $('.mode').html('<option value="Road">Road</option>')
       }
     });
 } 
         function submitSticker()
        {
               
                
               if($('#docket_type').val()=='')
               {
                  alert('Please select docket type');
                  return false; 
               }
               if($('#Manual').val()=='')
               {
                  alert('Please select Manual');
                  return false; 
               }
                if($('#booking_office').val()=='')
               {
                  alert('Please select office');
                  return false; 
               }
               if($('#booking_date').val()=='')
               {
                  alert('Please enter booking date');
                  return false; 
               }
               if($('#customer_name').val()=='')
               {
                  alert('Please select Customer');
                  return false; 
               }
               if($('#consignor_name').val()=='')
               {
                alert('Please select consigner');
                  return false; 
               }
               if($('#mode').val()=='')
               {
                alert('Please select mode');
                  return false; 
               }
               if($('#ref_no').val()=='')
               {
                  alert('Please enter ref No');
                  return false; 
               }
               if($('#Origin').val()=='')
               {
                  alert('Please select Origin');
                  return false; 
               }
               if($('#Destination').val()=='')
               {
                  alert('Please select Destination');
                  return false; 
               }
               if($('#pieces').val()=='')
               {
                  alert('Please enter pieces');
                  return false; 
               }
               if($('#weight').val()=='')
               {
                  alert('Please enter weight');
                  return false; 
               }
             var docket_type=$('#docket_type').val()
             var Manual=$('#Manual').val()
             var docket_number=$('#docket_number').val(); 
             var booking_office=$('#booking_office').val(); 
             var customer_name=$('#customer_name').val(); 
             var consigner=$('#consignor_name').val(); 
             var mode=$('#mode').val(); 
             var ref_no=$('#ref_no').val(); 
             var Origin=$('#Origin').val(); 
             var Destination= $('#Destination').val(); 
             var pieces=$('#pieces').val(); 
             var weight=$('#weight').val(); 
             var booking_date=$('#booking_date').val();
             var base_url = '{{url('')}}';
                $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
                },
                url: base_url + '/SubmitSticket',
                cache: false,
                data: {
                    'docket_type':docket_type,'Manual':Manual,'docket_number':docket_number,'booking_office':booking_office,'customer_name':customer_name,'ref_no':ref_no,'Origin':Origin,'Destination':Destination,'pieces':pieces,'weight':weight,'booking_date':booking_date,'consigner':consigner,'mode':mode
                },
                success: function(data) {
                    if($('.reprint_docket_no')=='')
                    {
                        alert('Please enter docket');
                        return false;
                    }
                    if($('.PrintDocketType')=='')
                    {
                        alert('Please enter docket type');
                        return false;
                    }
                    $('.reprint_docket_no').val(data);
                    $('.booking_office').val('').trigger('change'); 
                    $('.customer_name').val('').trigger('change'); 
                    $('.ref_no').val(''); 
                    $('.Origin').val('').trigger('change'); 
                    $('.Destination').val('').trigger('change'); 
                    $('.mode').val('').trigger('change');
                    $('.pieces').val(''); 
                    $('.weight').val(''); 
                    $('.booking_date').val('');
                    $('.docket_number').val('');
                }
                });
 }
 function printSticker()
 {
     if($('.reprint_docket_no').val()=='')
     {
         alert('Please enter docket');
         return false;
     }
     if($('.PrintDocketType').val()=='')
     {
         alert('Please enter docket type');
         return false;
     }
     var base_url = '{{url('')}}';
     var docket=$('#reprint_docket_no').val();
     var dockPrintDocketTypeet=$('#PrintDocketType').val();
      location.href = base_url+"/print_sticker/"+docket+'/'+dockPrintDocketTypeet;
      target = "_blank";
      done = 1;
   
 }
</script>