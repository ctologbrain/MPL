@include('layouts.appTwo')

<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                    <button type="button" class="btn btn-primary">
                        Excess Recieving
                    </button>
                </div>
                <h4 class="page-title">{{$title}}</h4>
                <div class="text-start fw-bold blue_color">
                    FIELDS WITH (*) MARK ARE MANDATORY.
                 </div>
            </div>
        </div>
    </div>
    @if (session('status'))
     <!-- <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
     <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
     <strong>Success - </strong>  {{ session('status','') }}
    </div> -->
    <script>
    alert("Success - {{ session('status','') }}");
    </script>
    @endif
    <div class="row pl-pr mt-1">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form id="ReceiveForm" method="post" action="{{url('SubmitVehicleGatePassRe')}}">
                    @csrf
                        <div id="basicwizard">
                           <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row">
                                            <div class="col-6">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-12 m-b-1">
                                                            <div class="row">
                                                                <label class="col-md-3 col-form-label" for="userName">Receiving Office<span
                                                             class="error">*</span></label>
                                                                <div class="col-md-9">
                                                                 <select tabindex="2" class="form-control selectBox office" name="office" id="office">
                                                                  @foreach($offcie as $officelist)
                                                                    <option value="{{$officelist->id}}">{{$officelist->OfficeCode}} ~ {{$officelist->OfficeName}}</option>
                                                                    @endforeach
                                                                 </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 m-b-1">
                                                            <div class="row">
                                                                 <label class="col-md-3 col-form-label" for="userName">Receiving Date<span
                                                                class="error">*</span></label>
                                                                <div class="col-md-9">
                                                                <input type="text" tabindex="3" class="form-control datepickerOne rdate" name="rdate" id="rdate" >
                                                            
                                                                <span class="error"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 m-b-1">
                                                            <div class="row">
                                                                <label class="col-md-3 col-form-label" for="userName">Gatepass Number<span
                                                            class="error">*</span></label>
                                                                <div class="col-md-9">
                                                                <input type="text" tabindex="4" class="form-control  gpNumber" name="gpNumber" id="gpNumber" onchange="getGatePassDetails(this.value);">
                                                                <input type="hidden" tabindex="4" class="form-control  gatePassId" name="gatePassId" id="gatePassId">
                                                                <span class="error"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 m-b-1">
                                                            <div class="row">
                                                                <label class="col-md-3 col-form-label" for="userName">Supervisor Name<span
                                                            class="error">*</span></label>
                                                                <div class="col-md-9">
                                                                <input type="text" tabindex="5" class="form-control  supervisorName" name="supervisorName" id="supervisorName" >
                                                                
                                                                <span class="error"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 m-b-1">
                                                            <div class="row">
                                                                <label class="col-md-3 col-form-label" for="userName">Remarks</label>
                                                                <div class="col-md-9">
                                                                <textarea name="Remarks" tabindex="6" id="Remarks" class="form-control Remarks" cols="5" rows="5"></textarea>
                                                                <span class="error"></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 m-b-1 mt-1"> 
                                                            <div class="row">
                                                            <label class="col-md-3 col-form-label" for="userName"></label>
                                                                <div class="col-md-2"><span style="font-weight:bold;">Total:</span> <span class="total">0</span></div>
                                                                <div class="col-md-2"><span style="font-weight:bold;">Scan:</span> <span>0</span></div>
                                                                <div class="col-md-2"><span style="font-weight:bold;">Pending:</span> <span class="total">0</span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <table class="table-responsive table-bordered mt-1" width="100%">
                                                        <thead>
                                                            <tr class="main-title text-dark">
                                                                <th>#</th>
                                                                <th> <input type="checkbox" id="checkAll"></th>
                                                                <th>Docket</th>
                                                                <th>Pieces</th>
                                                                <th>Weight</th>
                                                                <th>Rece Qty <span class="error">*</span></th>
                                                                <th>Short Document</th>
                                                                <th>Short Box</th>
                                                                <th>Destination City</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="tabels"></tbody>
                                                    </table>
                                                </div>
                                                <div class="col-12 text-end mt-1">
                                                    <label class="col-md-3 col-form-label pickupIn" for="password"></label>
                                                    <input type="hidden" name="pickup" class="pickup" id="pickup">
                                                    <input onClick="getAlerts();" type="button" tabindex="10" value="Save" class="btn btn-primary btnSubmit " id="btnSubmit">
                                                        <a href="{{url('GateReceiving')}}" tabindex="10" class="btn btn-primary ">Cancel</a>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <table class="table table-bordered table-centered mb-1 ml-1 gatepassreceiving-table">
                                                            <tbody>
                                                            <tr>
                                                                <td align="left" class="lblMediumBold possition p-1" nowrap="nowrap">Gatepass Office
                                                                </td>
                                                                <td align="left" class="possition p-1" colspan="3">
                                                                    <span id="GatepassOffice"></span>
                                                                </td>
                                                            </tr>
                                                            <tr style="background-color:#ddd;">
                                                                <td align="left" class="lblMediumBold possition p-1">FPM Number
                                                                </td>
                                                                <td align="left" class="possition p-1">
                                                                    <span id="FPMNumber"></span>
                                                                </td>
                                                                <td align="left" class="lblMediumBold possition">Trip Type
                                                                </td>
                                                                <td align="left" class="possition p-1">
                                                                    <span id="TripType"></span>
                                                                </td>
                                                            </tr>
                                                            <tr style="background-color:#ddd;">
                                                                <td align="left" class="lblMediumBold possition p-1">Origin City
                                                                </td>
                                                                <td align="left" class="possition p-1">
                                                                    <span id="FPMOriginCity"></span>
                                                                </td>
                                                                <td align="left" class="lblMediumBold possition">Destination City
                                                                </td>
                                                                <td align="left" class="possition p-1">
                                                                    <span id="FPMDestinationCity"></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" class="lblMediumBold possition p-1" style="width: 16%;">GP Number
                                                                </td>
                                                                <td align="left" class="possition p-1" style="width: 33%;">
                                                                    <span id="GPNumber"></span>
                                                                </td>
                                                                <td align="left" class="lblMediumBold possition p-1" style="width: 18%;">GP Date&amp;Time
                                                                </td>
                                                                <td align="left" class="possition p-1" style="width: 33%;">
                                                                    <span id="GPTime"></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" class="lblMediumBold possition p-1">GP Type
                                                                </td>
                                                                <td align="left" class="possition p-1">
                                                                    <span id="GPType"></span>
                                                                </td>
                                                                <td align="left" class="lblMediumBold possition p-1">Place. Date&amp;Time
                                                                </td>
                                                                <td align="left" class="possition p-1" style="width: 35%;">
                                                                    <span id="VehPlaceTime"></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" class="lblMediumBold possition p-1">Vendor Name
                                                                </td>
                                                                <td align="left" class="possition p-1">
                                                                    <span id="VendorName"></span>
                                                                </td>
                                                                <td align="left" class="lblMediumBold possition p-1" valign="top">Customer Name
                                                                </td>
                                                                <td align="left" class="possition p-1">
                                                                    <span id="CustomerName"></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" class="lblMediumBold possition p-1">Route Name
                                                                </td>
                                                                <td align="left" class="possition p-1">
                                                                    <span id="RouteName"></span>
                                                                </td>
                                                                <td align="left" class="lblMediumBold possition p-1" valign="top">Device ID
                                                                </td>
                                                                <td align="left" class="possition p-1">
                                                                    <span id="DeviceID"></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" class="lblMediumBold possition p-1">Vehicle Model
                                                                </td>
                                                                <td align="left" class="possition p-1">
                                                                    <span id="VehicleModel"></span>
                                                                </td>
                                                                <td align="left" class="lblMediumBold possition p-1" valign="top">Vehicle Number
                                                                </td>
                                                                <td align="left" class="possition p-1">
                                                                    <span id="VehicleNumber"></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" class="lblMediumBold possition p-1" valign="top">Driver Name
                                                                </td>
                                                                <td align="left" class="possition p-1">
                                                                    <span id="DriverName"></span>
                                                                </td>
                                                                <td align="left" class="lblMediumBold possition p-1" valign="top">Mobile Number
                                                                </td>
                                                                <td align="left" class="possition p-1">
                                                                    <span id="MobileNumber"></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" class="lblMediumBold possition p-1" valign="top">Seal Number
                                                                </td>
                                                                <td align="left" class="possition p-1">
                                                                    <span id="SealNumber"></span>
                                                                </td>
                                                                <td align="left" class="lblMediumBold possition p-1" valign="top">Supervisor Name
                                                                </td>
                                                                <td align="left" class="possition p-1">
                                                                    <span id="SupervisorName"></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" class="lblMediumBold possition p-1" valign="top">Start Km
                                                                </td>
                                                                <td align="left" class="possition p-1">
                                                                    <span id="StartKm"></span>
                                                                </td>
                                                                <td align="left" class="lblMediumBold possition p-1" valign="top">Vehicle Tariff
                                                                </td>
                                                                <td align="left" class="possition p-1">
                                                                    <span id="VehicleTariff"></span>
                                                                    &nbsp;&nbsp;&nbsp;
                                                                    <b>Adv. To Driver</b>
                                                                    <span id="AdvToDriver"></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" class="lblMediumBold possition p-1" valign="top">Remarks
                                                                </td>
                                                                <td align="left" class="possition p-1" colspan="3">
                                                                    <span id="RemarksgatePass"></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" class="lblMediumBold possition p-1" valign="top">Total Docket
                                                                </td>
                                                                <td align="left" class="possition p-1">
                                                                    <span id="ctl00_ContentPlaceHolder1_lblTotalDocket"></span>
                                                                </td>
                                                                <td align="left" class="lblMediumBold possition p-1" valign="top">Charge Wt.
                                                                </td>
                                                                <td align="left" class="possition p-1">
                                                                    <span id="ctl00_ContentPlaceHolder1_lblTotalChargeWeight"></span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                </table>
                                            </div> 
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
          format: 'dd-mm-yyyy',
          autoclose:true,
          todayHighlight: true
      });
  $(".datepickerOne").val('{{date("d-m-Y")}}');
  function getGatePassDetails(getPass)
  {
         var base_url = '{{url('')}}';
         var officeId = $('.office').val();
         $.ajax({
           type: 'POST',
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
             },
           url: base_url + '/getGatePassDetails',
           cache: false,
           data: {
           'getPass':getPass,'officeId':officeId
           }, 
            success: function(data) {
                const obj = JSON.parse(data);
                if(obj.status=='true')
                {
                   $('.gatePassId').val(obj.datas.id)
                   if(obj.datas.fpm_details!=null)
                   {
                    $('#FPMNumber').text(obj.datas.fpm_details.FPMNo);
                   }
                  
                   if(obj.datas.fpm_details!=null && obj.datas.fpm_details.Trip_Type==1)
                   {
                    var tripType='OW';
                   }
                   else if(obj.datas.fpm_details!=null && obj.datas.fpm_details.Trip_Type==2)
                   {
                    var tripType='RT';
                   }
                   else{
                    var tripType='';
                   }
                   var dateBookType = new Date(obj.datas.GP_TIME);
                  var GP_TIME = ("0" +dateBookType.getDate()).slice(-2) + "-" + ("0" +(dateBookType.getMonth()+1)).slice(-2) + "-" + dateBookType.getFullYear()+' '+("0"+dateBookType.getHours()).slice(-2) + ":" + ("0"+dateBookType.getMinutes()).slice(-2);

                  var date = new Date(obj.datas.Place_Time);
                  var Place_Time = ("0" +date.getDate()).slice(-2) + "-" + ("0" +(date.getMonth()+1)).slice(-2) + "-" + date.getFullYear()+' '+("0"+date.getHours()).slice(-2) + ":" + ("0"+date.getMinutes()).slice(-2);
                   $('#TripType').text(tripType);
                   $('#GPNumber').text(obj.datas.GP_Number);
                   $('#GPTime').text(GP_TIME);
                   $('#GPType').text(obj.datas.Gp_Type);
                   $('#VehPlaceTime').text(Place_Time);
                   $('#FPMOriginCity').text(obj.datas.route_master_details.statrt_point_details.CityName);
                   $('#FPMDestinationCity').text(obj.datas.route_master_details.end_point_details.CityName);
                   $('#VendorName').text(obj.datas.vendor_details.VendorName);
                   $('#DeviceID').text(obj.datas.Device_ID);
                   $('#SealNumber').text(obj.datas.Seal);
                   $('#StartKm').text(obj.datas.Start_Km);
                   $('#VehicleTariff').text(obj.datas.Vehicle_Tarrif);
                   $('#AdvToDriver').text(obj.datas.Driver_Adv);
                   $('#RemarksgatePass').text(obj.datas.Remark);
                   $('#VehicleModel').text(obj.datas.vehicle_type_details.VehicleType);
                   $('#VehicleNumber').text(obj.datas.vehicle_details.VehicleNo);
                  
                    $("#SupervisorName").text(obj.datas.Supervisor); 
                   $('.tabels').html(obj.table);
                   $('.total').html(obj.totalPices);
                   $("#RouteName").text(obj.datas.route_master_details.RouteName);
                     if(obj.datas.TotalDocket!=null){
                     $("#ctl00_ContentPlaceHolder1_lblTotalDocket").text(obj.datas.TotalDocket);
                     }
                     if(obj.datas.driver_details!=null && typeof(obj.datas.driver_details.DriverName)!=='undefined'){
                        $('#DriverName').text(obj.datas.driver_details.DriverName);
                     }
                   if(typeof(obj.datas.driver_details.Phone)!=='null' && typeof(obj.datas.driver_details.Phone)!=='undefined'){
                    $("#MobileNumber").text(obj.datas.driver_details.Phone);
                    }
                     
                     var chek=obj.datas.get_pass_docket_data_details;
                     if(typeof(chek)!=='null' && typeof(chek.get_docket_master_detail)!=='null' && typeof(chek.get_docket_master_detail)!=='undefined'){
                    
                        $("#ctl00_ContentPlaceHolder1_lblTotalChargeWeight").text(obj.datas.get_pass_docket_data_details.get_docket_master_detail.docket_product_details_sum_charged__weight);
                     }
                }
                else{
                    alert(obj.message)
                    $('.gpNumber').val('');
                    $('#TripType').text('');
                   $('#GPNumber').text('');
                   $('#GPTime').text('');
                   $('#GPType').text('');
                   $('#VehPlaceTime').text('');
                   $('#FPMOriginCity').text('');
                   $('#FPMDestinationCity').text('');
                   $('#VendorName').text('');
                   $('#DeviceID').text('');
                   $('#SealNumber').text('');
                   $('#StartKm').text('');
                   $('#VehicleTariff').text('');
                   $('#AdvToDriver').text('');
                   $('#RemarksgatePass').text('');
                   $('#VehicleModel').text('');
                   $('#VehicleNumber').text('');
                   $('#DriverName').text('');
                   $("#SupervisorName").text('');
                    $("#MobileNumber").text('');
                    $("#RouteName").text('');
                    $("#ctl00_ContentPlaceHolder1_lblTotalDocket").text('');
                    $("#ctl00_ContentPlaceHolder1_lblTotalChargeWeight").text('');
                   $('.tabels').html('');
                    return false;
                }
              }
            });
  }

  $("#checkAll").click(function () {
     $('.docketFirstCheck').not(this).prop('checked', this.checked);
 });
function getReceivedQty(pices,recQty,docket,inc)
{
   if(parseFloat(pices) > parseFloat(recQty))
  {
    $('#ShotQty'+inc).trigger('click').prop('checked', true);
    
  }
  else if(parseFloat(pices) < parseFloat(recQty))
  {
    alert('Please Check Rece Qty');
    $('#receivedQty'+inc).val('');
    $('#receivedQty'+inc).focus();
    $('#ShotQty'+inc).trigger('click').prop('checked', false);
  }
  else{
    $('#ShotQty'+inc).trigger('click').prop('checked', false);
  }
    
}

function getAlerts(){
    if($("#office").val()==''){
        alert("Please Select Receiving Office");
        return false;
    }

    if($("#rdate").val()==''){
        alert("Please Select Receiving Date");
        return false;
    }
    if($("#gpNumber").val()==''){
        alert("Please Enter Gatepass Number");
        return false;
       
    }
    if($("#supervisorName").val()==''){
        alert("Please Select Supervisor Name");
        return false;
    }

    if($("#supervisorName").val()==''){
        alert("Please Select Supervisor Name");
        return false;
    }

   var length= $(".docketFirstCheck:checked").length;
   var Data=$(".docketFirstCheck:checked").val();
   if(typeof Data==='undefined'){
    alert("Please Select Docket"); return false;
   }
   else{
    var getID =[];
    var res= $(".docketFirstCheck:checked").each(function(i){
       getID.push($(this).val());
       
         ++i;
     });

     for(var i=0; i<length; i++){
        if($("#receivedQty"+getID[i]).val()==''){
           alert("Please Enter Recv Qty");
           return false;
         }
        
     }
    $("#ReceiveForm").submit();
   }
   
    
}
 
  
    



  
</script>