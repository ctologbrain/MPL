@include('layouts.appTwo')

<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Operation</a></li>
                        <li class="breadcrumb-item active">RFQ CREATION</li>
                    </ol>
                </div>
                <h4 class="page-title">RFQ CREATION</h4>
                <div class="text-start fw-bold blue_color">
                    FIELDS WITH (*) MARK ARE MANDATORY.
                 </div>
            </div>
        </div>
    </div>
   
     
<form method="POST" action="" id="subForm">
@csrf
    <div class="row">
        <div class="col-xl-12">
            <div class="card gatepass_generate">
                <div class="card-body">
                    <div id="basicwizard">
                        <div class="tab-content b-0 mb-0">
                            <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                <div class="row">
                                     <div class="col-8 m-b-1">
                                        <div class="">
                                             <div class="row">
                                                <label class="col-md-2 col-form-label" for="option">RFQ For</label>
                                                <div class="col-md-9 d-flex justify-content-between align-items-center">
                                                   
                                                   <input type="radio" name="with_fpm" tabindex="1"
                                                        class="with_fpm" id="with_fpm" value="1" onclick="gitFcmNumber(this.value)" checked> NATIONAL
                                                        <input type="radio" name="with_fpm" tabindex="2"
                                                        class="with_fpm" id="with_fpm" value="2" onclick="gitFcmNumber(this.value)"> LOCAL PICKUP
                                                         <input type="radio" name="with_fpm" tabindex="3"
                                                        class="with_fpm" id="with_fpm" value="2" onclick="gitFcmNumber(this.value)"> LOCAL DELIVERY
                                                         <input type="radio" name="with_fpm" tabindex="4"
                                                        class="with_fpm" id="with_fpm" value="2" onclick="gitFcmNumber(this.value)"> LOCAL PICKUP & DELIVERY
                                                <input type="hidden" name="id"
                                                class="form-control id" id="id" value="" readonly>
                                                </div>
                                               
                                             </div>
                                       </div>
                                    </div>
                                    <div class="col-6 m-b-1">
                                        <div class="">
                                             <div class="row">
                                                <label class="col-md-3 col-form-label" for="option">RFQ Placement</label>
                                                <div class="col-md-8 d-flex align-items-center">
                                                   
                                                   <input type="radio" name="with_fpm" tabindex="5"
                                                        class="with_fpm" id="with_fpm" value="1" onclick="gitFcmNumber(this.value)" checked style="margin-right: 10px;"> <span style="padding-right: 10px;">OFFICE</span>
                                                        <input type="radio" name="with_fpm" tabindex="6"
                                                        class="with_fpm" id="with_fpm" value="2" onclick="gitFcmNumber(this.value)" style="margin-right: 10px;"> CUSTOMER
                                                         
                                                <input type="hidden" name="id"
                                                class="form-control id" id="id" value="" readonly>
                                                </div>
                                               
                                             </div>
                                       </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="">
                                             <div class="row">
                                                <label class="col-md-4 col-form-label" for="fpm_number">Vehicle Model<span
                                                        class="error">*</span></label>
                                                <div class="col-md-8">
                                                    <select name="fpm_number" tabindex="7"
                                                        class="form-control fpm_number selectBox" id="fpm_number" onchange="GetFcmDetails(this.value)">
                                                       <option value="">--select--</option>
                                                     
                                                       <option value=""> 14 FEET CLOSE BODY</option> 
                                                       <option value=""> 17 FEET CLOSE BODY</option> 
                                                       <option value=""> 19 FEET CLOSE BODY</option> 
                                                       <option value=""> 20 FEET CLOSE BODY</option> 
                                                       <option value=""> 22 FEET CLOSE BODY</option> 
                                                       <option value=""> 24 FEET CLOSE BODY</option>
                                                       <option value=""> 32 FEET MULTI AXLE </option>
                                                       <option value=""> 32 FEET SINGLE AXLE</option>
                                                       <option value="">BOLERO</option>
                                                       <option value="">BUS</option>
                                                       <option value="">DOST</option>
                                                       <option value="">TATA ACE</option> 
                                                       <option value="">TRAIN</option> 
                                                       
                                                     </select>   
                                                       
                                                </div>
                                              
                                             </div>
                                       </div>
                                    </div>
                                    
                                        
                                    <div class="col-6 m-b-1">
                                        <div class="row">
                                             <label class="col-md-4 col-form-label" for="office_origin">Office Origin<span
                                                    class="error">*</span></label>
                                            <div class="col-md-8">
                                                <input type="text" name="office_origin" tabindex="8" class="form-control office_origin" id="office_origin">
                                           </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-6 m-b-1">
                                        <div class="row">
                                             <label class="col-md-4 col-form-label" for="destination_city">Destination City<span
                                                    class="error">*</span></label>
                                            <div class="col-md-8">
                                                <input type="text" name="destination_city" tabindex="9" class="form-control destination_city" id="destination_city">
                                           </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-6 m-b-1">
                                        <div class="row">
                                             <label class="col-md-4 col-form-label" for="fpm_date">Vehicle Placement Date</label>
                                            <div class="col-md-2">
                                                 <input type="text" name="vehicle_placement" tabindex="10"
                                                        class="form-control vehicle_placement datetimeTwo" id="vehicle_placement">
                                                
                                        </div>
                                         <label class="col-md-2 col-form-label" for="userName">Time<span
                                                    class="error">*</span></label>
                                            <div class="col-md-2">
                                                <input type="time" name="BookingTime" tabindex="11"
                                                    class="form-control BookingTime" id="BookingTime">

                                            </div>
                                            <label class="col-md-2 col-form-label" for="userName" style="font-size: 8px !important;">(24:00hrs Format)</label>
                                            
                                        </div>
                                    </div>
                                    <div class="col-6 m-b-1">
                                        <div class="row">
                                             <label class="col-md-4 col-form-label" for="fpm_date">Bidding Closer Date</label>
                                            <div class="col-md-2">
                                                 <input type="text" name="PlacementTimeStamp" tabindex="12"
                                                        class="form-control PlacementTimeStamp datetimeTwo" id="PlacementTimeStamp">
                                                
                                        </div>
                                         <label class="col-md-2 col-form-label" for="userName">Time<span
                                                    class="error">*</span></label>
                                            <div class="col-md-2">
                                                <input type="time" name="BookingTime" tabindex="13"
                                                    class="form-control BookingTime" id="BookingTime">

                                            </div>
                                            <label class="col-md-2 col-form-label" for="userName" style="font-size: 8px !important;">(24:00hrs Format)</label>
                                            
                                        </div>
                                    </div>
                                   
                                    
                                    <div class="col-6 m-b-1">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="base_price">Base Price</label>
                                            <div class="col-md-3">
                                               
                                               <input type="text" name="base_price" id="base_price" class="form-control base_price" tabindex="14">
                                            </div>
                                             <label class="col-md-3 col-form-label" for="expected_weight">Expected Weight</label>
                                             <div class="col-md-2">
                                               
                                               <input type="text" name="expected_weight" id="expected_weight" class="form-control expected_weight" tabindex="15">
                                            </div>
                                        </div>
                                    </div>
                                   
                                    
                                    <div class="col-6 m-b-1">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="expected_km">Expected Km</label>
                                                  <div class="col-md-4">
                                                <input type="text" name="expected_km" tabindex="8"
                                                    class="form-control expected_km" id="expected_km" onchange="">

                                                  </div>
                                        </div>
                                    </div>
                                    
                                    
                                   
                                   
                                   
                                    <div class="col-6 m-b-1">
                                        <div class="row">
                                            <label class="col-md-4 col-form-label" for="vendor_message">Vendor Message</label>
                                            <div class="col-md-8">
                                                <Textarea class="form-control vendor_message" tabindex="16"  name="vendor_message" id="vendor_message"></Textarea>
                                            </div>
                                        </div>
                                   </div>
                                   <div class="col-6 m-b-1">
                                        <div class="row">
                                            
                                            <label class="col-md-4 col-form-label" for="address">Address</label>
                                            <div class="col-md-8">
                                               
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    
                                   
                                  
                                  
                                   
                                   

                                </div>
                            </div>
                        </div> <!-- end col -->

                    </div>
               
                </div>
                <div class="col-xl-12 rfq_creation">
                  <table class="table-responsive table-bordered">
                    <thead>
                        <tr class="main-title text-dark">
                            <th class="p-1 td1">Stoppage</th>
                            <th class="p-1 td2">Docket Number</th>
                            <th class="p-1 td3"></th>
                            <th class="p-1 td4"></th>
                           

                        </tr>
                         </thead> 
                         <tbody>
                        <tr>
                            <td class="p-1"> 
                                <input type="text" name="stoppage" tabindex="17"
                                                    class="form-control stoppage" id="stoppage">  </td>
                            <td class="p-1"><input type="text" name="Docket" tabindex="18"
                                                    class="form-control Docket" id="Docket" disabled="">   </td>
                            <td class="p-1 text-start">  
                            <input type="button" value="Add" class="btn btn-primary btnSubmitDocket" id="btnSubmitDocket" onclick="SaveGatePassOrDocket()" tabindex="19"> 
                            <input type="button" value="Cancel" class="btn btn-primary btnSubmitDocket" id="btnSubmitDocket" onclick="SaveGatePassOrDocket()" tabindex="20"> 
                                </td>

                            <td class="p-1">
                                <div class="row text-end">
                                    <label class="col-md-4 col-form-label" for="rfq_no">RFQ Number</label>
                                             <div class="col-md-8">
                                               
                                               <input type="text" name="rfq_no" id="rfq_no" class="form-control rfq_no" tabindex="21">
                                            </div>
                                </div>
                                                
                                                </td>
                           
                           
                        </tr>
                        <tr>
                            <td colspan="4" class="p-1 text-start">
                                <input type="button" value="Generate RFQ" class="btn btn-primary btnSubmitDocket" id="btnSubmitDocket" onclick="SaveGatePassOrDocket()" tabindex="22"> 
                            </td>
                        </tr>
                        </tbody>
                         
                  </table> 
                  <div class="tabelData"></div>
              </div> 
           </div>     
        </div>
    </div>
</form>
</div>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script>
   
    $('select').select2();
    $('.datetimeone').datetimepicker({footer: true,format: 'yyyy-mm-dd HH:MM',modal: true});
    $('.datetimeTwo').datetimepicker({footer: true,format: 'yyyy-mm-dd HH:MM',modal: true});
    function gitFcmNumber(value)
    {
     
     if(value==1)
      { 
        $('.fpm_number').attr('disabled', false);
      }
     else{
       
         $('.fpm_number').attr('disabled', true);
     }
    }
    function GetFcmDetails(Fpm)
    {
        var base_url = '{{url('')}}';
        $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/getFcmDetails',
       cache: false,
       data: {
           'Fpm':Fpm
       },
       success: function(data) {
        const obj = JSON.parse(data);
        $('.route').val(obj.Route_Id).trigger('change');
        $('.vendor_name').val(obj.Vehicle_Provider).trigger('change');
        $('.vehicle_name').val(obj.Vehicle_No).trigger('change');
        $('.vehicle_model').val(obj.Vehicle_Model).trigger('change');
        $('.driver_name').val(obj.Driver_Id).trigger('change');
     
       }
     });
    }
    function getSourceAndDest(routeId)
    {
        var base_url = '{{url('')}}';
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/getSourceAndDest',
       cache: false,
       data: {
           'routeId':routeId
       }, 
       success: function(data) {
        const obj = JSON.parse(data);
          $('.origin').val(obj.statrt_point_details.CityName);
          $('.origin').attr('readonly', true);
          $('.destination').val(obj.end_point_details.CityName);
          $('.destination').attr('readonly', true);
    //       $.ajax({
    //      type: 'POST',
    //      headers: {
    //      'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
    //    },
    //    url: base_url + '/getOffcieByCity',
    //    cache: false,
    //    data: {
    //        'EndPoint':obj.Destination
    //    }, 
    //    success: function(data) {
    //     const obj = JSON.parse(data);
         
         
    //    }
    //  });
       }
     });
    }
    function getDocketDetails(Docket,BranchId)
{
    var base_url = '{{url('')}}';
    var BranchId = $('.destination_office').val();
       $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/CheckDocketIsBooked',
       cache: false,
       data: {
           'Docket':Docket,'BranchId':BranchId
       },
       success: function(data) {
        const obj = JSON.parse(data);
        if(obj.status=='false')
        {
            alert(obj.message)
            $('.Docket').val('');
            $('.Docket').focus();
            $('.pieces').val('');
            $('.weight').val('');
            $('.displayPices').val('');
            $('.displayWeight').val('');
            $('#partpices').text('');
            $('#partWidth').text('');
            return false;
        }
        else{
            $('.pieces').val(obj.partQty);
            $('.weight').val(obj.partWeight);
            $('.displayPices').val(obj.qty);
            $('.displayWeight').val(obj.ActualW);
            $('#partpices').text(obj.partQty);
            $('#partWidth').text(obj.partWeight);
            
           
        }

       }
     });
}
function genrateGatePass()
{
    if($('#GP_Time_Stamp').val()=='')
    {
        alert('Please Enter gatePass Time');
        return false;
    }
    if($('#PlacementTimeStamp').val()=='')
    {
        alert('Please Enter Placement Time');
        return false;
    }
    if($('#route').val()=='')
    {
        alert('Please Select Route');
        return false;
    }
    if($('#vendor_name').val()=='')
    {
        alert('Please Selelct Vendor Name');
        return false;
    }
    if($('#vehicle_name').val()=='')
    {
        alert('Please Selelct Vehicle Name');
        return false;
    }
    if($('#vehicle_model').val()=='')
    {
        alert('Please Selelct Vehicle Model');
        return false;
    }
    if($('#sprvisor_name').val()=='')
    {
        alert('Please Enter Sprvisor Name');
        return false;
    }
    
    var with_fpm = $("input[name=with_fpm]:checked").val();
    var GP_Time_Stamp=$('#GP_Time_Stamp').val();
    var fpm_number=$('#fpm_number').val();
    var PlacementTimeStamp=$('#PlacementTimeStamp').val();
    var route=$('#route').val();
    var type=$('#type').val();
    var vendor_name=$('#vendor_name').val();
    var vehicle_name=$('#vehicle_name').val();
    var vehicle_model=$('#vehicle_model').val();
    var driver_name=$('#driver_name').val();
    var mob_no=$('#mob_no').val();
    var dev_id=$('#dev_id').val();
    var sprvisor_name=$('#sprvisor_name').val();
    var seal_number=$('#seal_number').val();
    var remark=$('#remark').val();
    var start_km=$('#start_km').val();
    var vehicle_teriff=$('#vehicle_teriff').val();
    var adv_driver=$('#adv_driver').val();
    var base_url = '{{url('')}}';
     $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/SubmitVehicleGatePass',
       cache: false,
       data: {
           'with_fpm':with_fpm,'GP_Time_Stamp':GP_Time_Stamp,'PlacementTimeStamp':PlacementTimeStamp,'route':route,'vendor_name':vendor_name,'vehicle_name':vehicle_name,'vehicle_model':vehicle_model,'driver_name':driver_name,'mob_no':mob_no,'dev_id':dev_id,'sprvisor_name':sprvisor_name,'remark':remark,'start_km':start_km,'vehicle_teriff':vehicle_teriff,'adv_driver':adv_driver,'type':type,'seal_number':seal_number,'fpm_number':fpm_number
       },
       success: function(data) {
        $(".btnSubmit").attr("disabled", true);
        const obj = JSON.parse(data);
        $('.gatepassNo').text(' '+obj.gatepass);
        $('.gate_pass_number').val(obj.gatepass);
        $('.id').val(obj.id);
       }
     });

}
function SaveGatePassOrDocket()
{
    if($('#id').val()=='')
    {
       alert('Please Genrate Gatepass number first');
       return false; 
    }
    if($('#destination_office').val()=='')
    {
       alert('Please Enter destination office');
       return false; 
    }
    if($('#Docket').val()=='')
    {
       alert('Please Enter Docket');
       return false; 
    }
    var id=$('#id').val();
    var Docket=$('#Docket').val();
    var destination_office=$('#destination_office').val();
    var pieces=$('#pieces').val();
    var weight=$('#weight').val();
    var base_url = '{{url('')}}';
     $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/GatePassWithDocket',
       cache: false,
       data: {
           'id':id,'Docket':Docket,'destination_office':destination_office,'pieces':pieces,'weight':weight
       },
       success: function(data) {
        $('.Docket').val('');
        $('.pieces').val('');
        $('.weight').val('');
        $('.displayPices').val('');
        $('.displayWeight').val('');
        $('#partpices').text('');
        $('#partWidth').text('');
        $('.Docket').focus();
        $('.tabelData').html(data);
        $('#hidden').addClass('pppp');
       }
     });
}
function printgatePass()
{
    if($('#gate_pass_number').val()=='')
    {
        alert('Please Enter GatePass Number');
        return false;
    }
    var base_url = '{{url('')}}';
    var gatePass=$('#gate_pass_number').val();
    location.href = base_url+"/print_gate_Number/"+gatePass;
  
}
    </script>
             
    