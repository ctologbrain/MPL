@include('layouts.appTwo')


<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                   
                </div>
                <h4 class="page-title">GATEPASS/DRS - CANCEL</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form id="formaction">
                        <div id="basicwizard">
                           <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                            <div class="col-6">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <label class="col-md-3 col-form-label" for="userName">Activity Type<span
                                                        class="error">*</span></label>
                                                        <div class="col-md-9">
                                                       
                                                         <select tabindex="1" class="form-control ActivityType selectBox cancel_option" name="ActivityType" id="ActivityType" onchange="getDocumantDetails(this.value)">
                                                            <option value="">--select--</option>
                                                            @foreach($GetActivityType as $key)
                                                            <option value="{{$key->ID}}">{{$key->Title}}</option>
                                                            @endforeach
                                                         </select>
                                                        <span class="error"></span>
                                                        </div>
                                                        <div class="col-12">
                                                        <div class="row">
                                                            <label class="col-md-3 col-form-label" for="userName">Activity Number<span
                                                         class="error">*</span></label>
                                                            <div class="col-md-9">
                                                            <input onchange="getActivityDetail(this.value)" type="text" tabindex="2" class="form-control gatepass_number" name="gatepass_number" id="gatepass_number" >
                                                    
                                                        <span class="error"></span>
                                                             
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                   
                                                    <div class="col-12">
                                                    <div class="row">
                                                        <label class="col-md-3 col-form-label" for="userName">Remarks<span
                                                    class="error">*</span></label>
                                                        <div class="col-md-9">
                                                        <textarea name="Remarks" tabindex="3" id="Remarks" class="form-control Remarks" cols="5" rows="5"></textarea>
                                                        <span class="error"></span>
                                                        </div>
                                                    </div>
                                                    </div>
                                                   
           
                 
               
                                                    </div>
                                                  
                                                     <div class="col-12">
                                            <label class="col-md-3 col-form-label pickupIn" for="password"></label>
                                            <input type="hidden" name="pickup" class="pickup" id="pickup">
                                            <input type="button" tabindex="10" value="Save" class="btn btn-primary btnSubmit mt-3" id="btnSubmit" onclick="SubmitGatePass()">
                                                <a href="{{url('GatePassCanceled')}}" tabindex="10" class="btn btn-primary mt-3">Cancel</a>
                                            </div>
                                                    </div> 
                                                    
                                                </div>

                                           
                                            
                                            <div class="col-6">
                                                <table class="table table-bordered table-centered mb-1 ml-1 gatepassreceiving-table">
                                                            <tbody id="gatepass_data" class="loaddata">
                                                                <tr class="back-color">
                                                                <td align="left" class="lblMediumBold text-center" nowrap="nowrap" colspan="4">Gatepass Details
                                                                </td>
                                                               
                                                                </tr>
                                                            <tr>
                                                                <td align="left" class="lblMediumBold back-color">GP Date
                                                                </td>
                                                                <td align="left" class="gp_date">
                                                                    <span id="gp_date"></span>
                                                                </td>
                                                                <td align="left" class="lblMediumBold gp_number back-color">GP Number
                                                                </td>
                                                                <td align="left" class="possition">
                                                                    <span id="gp_number"></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" class="lblMediumBold back-color">Origin
                                                                </td>
                                                                <td align="left" class="possition" colspan="3">
                                                                    <span id="origin"></span>
                                                                </td>
                                                               
                                                            </tr>
                                                            <tr>
                                                                <td align="left" class="lblMediumBold destination back-color">Destination
                                                                </td>
                                                                <td align="left" class="possition" colspan="3">
                                                                    <span id="destination"></span>
                                                                    

                                                                </td>
                                                                
                                                            </tr>
                                                           
                                                            <tr>
                                                                <td align="left" class="lblMediumBold back-color" valign="top">Customer Name
                                                                </td>
                                                                <td align="left" class="possition">
                                                                    <span id="CustomerName"></span>
                                                                </td>

                                                                <td align="left" class="lblMediumBold back-color">Vendor Name
                                                                </td>
                                                                <td align="left" class="possition">
                                                                    <span id="VendorName"></span>
                                                                </td>
                                                                
                                                            </tr>
                                                          
                                                            <tr>
                                                                <td align="left" class="lblMediumBold back-color">Vechile Number
                                                                </td>
                                                                <td align="left" class="possition">
                                                                    <span id="vechile_number"></span>
                                                                </td>
                                                                <td align="left" class="lblMediumBold back-color" valign="top">Seal Number
                                                                </td>
                                                                <td align="left" class="seal_number">
                                                                    <span id="seal_number"></span>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td align="left" class="lblMediumBold driver_name back-color">Driver Name
                                                                </td>
                                                                <td align="left" class="" colspan="3">
                                                                    <span id="driver_name"></span>
                                                                </td>
                                                                 
                                                            </tr>
                                                           
                                                           
                                                            <tr>
                                                                 <td align="left" class="lblMediumBold advance_to_drive back-color" valign="top">Advance to Drive
                                                                </td>
                                                                <td align="left" class="advance_to_drive">
                                                                    <span id="advance_to_drive"></span>
                                                                    
                                                                </td>
                                                                <td align="left" class="lblMediumBold back-color" valign="top">Start Km
                                                                </td>
                                                                <td align="left" class="">
                                                                    <span id="StartKm"></span>
                                                                </td>
                                                               
                                                            </tr>
                                                            <tr>
                                                                <td align="left" class="lblMediumBold back-color" valign="top">Remarks
                                                                </td>
                                                                <td align="left" class="possition" colspan="3">
                                                                    <span id="RemarksgatePass"></span>
                                                                </td>
                                                            </tr>
                                                           
                                                            
                                                        </tbody>
                                                        <tbody id="drs_data" class="loaddatadrs d-none">
                                                            <tr class="back-color">
                 <td align="left" class="lblMediumBold text-center" nowrap="nowrap" colspan="4">DRS Details 
                                                                </td>
                                                               
                                                                </tr>
            <tr>
            <td align="left" class="lblMediumBold back-color">DRS Date
                                                                </td>
            <td align="left" class="drs_date">
            <span id="drs_date"></span>
                                                                </td>
            <td align="left" class="lblMediumBold drs_number back-color">DRS Number
                                                                </td>
            <td align="left" class="">
            <span id="drs_number"></span>
                                                                </td>
        </tr>
        <tr>
        <td align="left" class="lblMediumBold back-color">Delivery Office
                                                                </td>
        <td align="left" class="" colspan="3">
        <span id="delivery_office"></span>
                                                                </td>
                                                               
                                                            </tr>
        <tr>
        <td align="left" class="lblMediumBold delivery_boy back-color">Delivery Boy
                                                                </td>
        <td align="left" class="" colspan="3">
            <span id="delivery_boy"></span>
                                                                    

                                                                </td>
                                                                
                                                            </tr>
                                                           
        <tr>
        <td align="left" class="lblMediumBold back-color" valign="top">Vechile Type
                                                                </td>
        <td align="left" class="">
            <span id="vechile_type"></span>
                                                                </td>

        <td align="left" class="lblMediumBold back-color">Market Hire Amount
                                                                </td>
        <td align="left" class="">
                <span id="marketHireAmount"></span>
                                                                </td>
                                                                
                                                            </tr>                                               
        <tr>
        <td align="left" class="lblMediumBold back-color">Vechile Number
                                                                </td>
        <td align="left" class="">
                <span id="vechile_number"></span>
                                                                </td>
        <td align="left" class="lblMediumBold back-color" valign="top">Opening Km
                                                                </td>
        <td align="left" class="opening_km">
                <span id="opening_km"></span>
                                                                </td>
                                                            </tr>
        <tr>
        <td align="left" class="lblMediumBold driver_name back-color">Driver Name
                                                                </td>
        <td align="left" class="" >
                        <span id="driver_name"></span>
                                                                </td>
        <td align="left" class="lblMediumBold back-color" valign="top">Mobile Number
                                                                </td>
        <td align="left" class="mobile_number">
                <span id="mobile_number"></span>
                                                                </td>
                                                                 
                                                            </tr>
                                                                                                           
        <tr>
        <td align="left" class="lblMediumBold back-color" valign="top">Supervisor Name
                                                                </td>
        <td align="left" class="" colspan="3">
            <span id="supervisor_name"></span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                </table>
                                            </div> 
                                            <div class="tabels ml-1" ></div> 

                                    </div>
                                               
                                        
                                </div>
                           </div>
                        </div>
                           
                    </form>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div>
    </div>
</div>
<script type="text/javascript">
     $('.selectBox').select2();
    $('.datepickerOne').datepicker({
          format: 'yyyy-mm-dd',
          autoclose:true
      });
  // function getGatePassDetails(getPass)
  // {
  //        var base_url = '{{url('')}}';
  //        $.ajax({
  //          type: 'POST',
  //          headers: {
  //           'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
  //            },
  //          url: base_url + '/getGatePassDetails',
  //          cache: false,
  //          data: {
  //          'getPass':getPass
  //          }, 
  //           success: function(data) {
  //               const obj = JSON.parse(data);
  //               if(obj.status=='true')
  //               {
  //                  $('.gatePassId').val(obj.datas.id)
  //                  if(obj.datas.fpm_details!=null)
  //                  {
  //                   $('#FPMNumber').text(obj.datas.fpm_details.FPMNo);
  //                  }
                  
  //                  if(obj.datas.fpm_details!=null && obj.datas.fpm_details.Trip_Type==1)
  //                  {
  //                   var tripType='OW';
  //                  }
  //                  else if(obj.datas.fpm_details!=null && obj.datas.fpm_details.Trip_Type==2)
  //                  {
  //                   var tripType='RT';
  //                  }
  //                  else{
  //                   var tripType='';
  //                  }
  //                  $('#TripType').text(tripType);
  //                  $('#GPNumber').text(obj.datas.GP_Number);
  //                  $('#GPTime').text(obj.datas.GP_TIME);
  //                  $('#GPType').text(obj.datas.Gp_Type);
  //                  $('#VehPlaceTime').text(obj.datas.Place_Time);
  //                  $('#FPMOriginCity').text(obj.datas.route_master_details.statrt_point_details.CityName);
  //                  $('#FPMDestinationCity').text(obj.datas.route_master_details.end_point_details.CityName);
  //                  $('#VendorName').text(obj.datas.vendor_details.VendorName);
  //                  $('#DeviceID').text(obj.datas.Device_ID);
  //                  $('#SealNumber').text(obj.datas.Seal);
  //                  $('#StartKm').text(obj.datas.Start_Km);
  //                  $('#VehicleTariff').text(obj.datas.Vehicle_Tarrif);
  //                  $('#AdvToDriver').text(obj.datas.Driver_Adv);
  //                  $('#RemarksgatePass').text(obj.datas.Remark);
  //                  $('#VehicleModel').text(obj.datas.vehicle_type_details.VehicleType);
  //                  $('#VehicleNumber').text(obj.datas.vehicle_details.VehicleNo);
  //                  $('#DriverName').text(obj.datas.vehicle_details.VehicleNo);
  //               }
  //               else{
  //                   alert(obj.message)
  //                   $('.gpNumber').val('');
  //                   return false;
  //               }
  //             }
  //           });
  // }
  

  function SubmitGatePass(){
       
        var base_url = '{{url('')}}';
        
           
           if($("#ActivityType option:selected").val()=='')
           {
              alert('please select  Activity Type');
              return false;
           }

            if($("#gatepass_number").val()=='')
           {
              alert('please Enter Activity Number');
              return false;
           }

           if($("#Remarks").val()=='')
           {
              alert('please Enter Remarks');
              return false;
           }
          var formData = new FormData();
           var  ReceivingType = $("#ActivityType").val();
           var Remarks  = $("#Remarks").val();
           var gpNumber  = $("#gatepass_number").val();
            var activityId= $("#activityId").val();
          formData.append('ReceivingType',ReceivingType);
          formData.append('gpNumber',gpNumber);
          formData.append('Remarks',Remarks);
           formData.append('activityId',activityId);
          
           $.ajax({
           type: 'POST',
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
             },
           url: base_url + '/GatePassCanceledPost',
           cache: false,
           contentType: false,
            processData: false,
            data: formData,
            success: function(data) {
            const obj = JSON.parse(data);
            if(obj.success=='false'){
                alert('This Activity Number Already Canceled');
                $("#ActivityType").val('');
                $("#Remarks").val('');
                $("#gatepass_number").val('');
                $("#activityId").val('');
                 $("#gatepass_number").focus();
                 return false;
            }
            else if(obj.success=='true'){
                 alert('Canceled Successfully');
                  $("#ActivityType").val('');
                  $("#Remarks").val('');
                  $("#gatepass_number").val('');
                  $("#activityId").val('');
                  return false;
            }
            
               
            
            }
            });
    }
   

    
function getDocumantDetails(ActivityType)
{

    

   if(ActivityType==1)
   {
    $('#gatepass_data').removeClass('d-none');
    $('#drs_data').addClass('d-none');
   }
   else if(ActivityType==2)
   {
    $('#gatepass_data').addClass('d-none');
    $('#drs_data').removeClass('d-none');
   }
   else{
    $('#gatepass_data').removeClass('d-none');
    $('#drs_data').addClass('d-none');
   }
}

   function getActivityDetail(Numbr)
    { 
    var ActivityType =  $(".ActivityType  option:selected").val();
    
    var base_url= "{{url('')}}";
    if(ActivityType!='' ){
     $.ajax({
           type: 'POST',
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
             },
           url: base_url + '/GatePassAllInfomation',
           cache: false,
            data: {'Number':Numbr,'ActivityType':ActivityType},
            success: function(data) {
                const obj = JSON.parse(data);

                if(obj.status==1){
                 $('.loaddata').html(obj.body);
                }
                else if(obj.status==2){
                     $('.loaddatadrs').html(obj.body);
                }
                else{
                    alert('Activity Number Do not found');

                   $( "#gatepass_number").val('');
                    $("#drs_number").val('');
                    if(ActivityType==1){
                        $( "#gatepass_number").focus();
                    }
                    else{
                        $("#drs_number").focus();
                    }
                }
            }
            
            });
         }
         else{
             alert('Please select Receive Type');
             $(".ActivityType").focus();
         }
    }
   

</script>