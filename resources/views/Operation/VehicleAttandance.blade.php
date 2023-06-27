@include('layouts.appTwo')

<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                     <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Mpl</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Cash</a></li>
                        <li class="breadcrumb-item active">VEHICLE ATTENDANCE</li>
                    </ol>
                </div>
                <h4 class="page-title">VEHICLE ATTENDANCE</h4>
                <div class="text-start fw-bold blue_color">
                    FIELDS WITH (*) MARK ARE MANDATORY.
                 </div>
            </div>
        </div>
    </div>
    @if (session('status'))
     <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
     <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
     <strong>Success - </strong>  {{ session('status','') }}
    </div>
    @endif
    <div class="row pl-pr mt-1">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                        <div id="basicwizard">
                           <div class="tab-content b-0 mb-0">
                                <div class="tab-pane active show" id="basictab1" role="tabpanel">
                                    <div class="row pl-pr mt-1">
                                            <div class="col-6">
                                                <div class="col-12 m-b-1">
                                                    <div class="row">
                            <div class="col-12 m-b-1">                                            <div class="row">                                             <label class="col-md-3 col-form-label" for="userName">Reporting Date<span   class="error">*</span></label>                                          <div class="col-md-7">                                                                <input type="text" tabindex="1" class="form-control datepickerOne rdate" name="rdate" id="rdate" >                                                  
                                                                <span class="error"></span>
                                                                </div>
                                                            </div>
                            </div>
                <div class="col-12 m-b-1">                                                            <div class="row">                                                                <label class="col-md-3 col-form-label" for="vehicle_no">Vehicle No<span                                                             class="error">*</span></label>                                                                <div class="col-md-7">                                                                <input onchange="getVehicle(this.value);" type="text" name="vehicle_no" class="form-control" id="vehicle_no" tabindex="2">                                                                 <input value="" type="hidden" name="vehicleId" id="vehicleId">                                                                </div>                                                            </div>
                            </div>
                                                        
                         <div class="col-12 m-b-1">                                                  <div class="row">                                            <label class="col-md-3 col-form-label" for="userName">Reporting Type</label>                                                     <div class="col-md-7">                                        <select class="form-control selectBox" name="reporting_type" id="reporting_type" tabindex="3">                                                                   <option value="IN">IN</option>                                                                   <option value="OUT">OUT</option>                                                                   <option value="REPLACE">REPLACE</option>                                                                   <option value="EXTENSION">EXTENSION</option>                                                               </select>                                                                <span class="error"></span>                                                                </div>                                                            </div>
                                 </div>
                        <div class="col-12 m-b-1">                                                   <div class="row">                                                <label class="col-md-3 col-form-label" for="userName">Reporting Time<span   class="error">*</span></label>                                                                <div class="col-md-3">                                        <input type="time" tabindex="4" class="form-control  ReportingTime" name="ReportingTime" id="ReportingTime" >                                                          
                                                                <span class="error"></span>
                                                                </div>
                                                                <label class="col-md-3 col-form-label" for="userName">( 24:00hrs Format )</label>
                                                            </div>
                                     </div>
                                <div class="col-12 m-b-1">
                                                            <div class="row">
                                                                <label class="col-md-3 col-form-label" for="userName">Remarks</label>
                                                                <div class="col-md-7">
                                                                <textarea name="Remarks" tabindex="5" id="Remarks" class="form-control Remarks" cols="5" rows="5"></textarea>
                                                                <span class="error"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-10 text-end mt-1">
                                                    <label class="col-md-3 col-form-label pickupIn" for="password"></label>
                                                    <input type="hidden" name="pickup" class="pickup" id="pickup">
                                                    <input type="button" tabindex="6" value="Save" onclick="SubmitVehicleAttandence();" class="btn btn-primary btnSubmit " id="btnSubmit">
                                                        <a href="{{url('VehicleAttandance')}}" tabindex="7" class="btn btn-primary ">Reset</a>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <table class="table table-bordered table-centered mb-1 ml-1 vehicle_table">
                                                            <tbody>
                                                            <tr>
                                                                <td align="left" class="lblMediumBold possition p-1" nowrap="nowrap">Branch Name
                                                                </td>
                                                                <td align="left" class="possition p-1">
                                                                    <span id="branch_name"></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" class="lblMediumBold possition p-1">Vendor Name
                                                                </td>
                                                                <td align="left" class="possition p-1">
                                                                    <span id="vendor_name"></span>
                                                                </td>
                                                               
                                                            </tr>
                                                            <tr>
                                                                <td align="left" class="lblMediumBold possition p-1">Vehicle Model
                                                                </td>
                                                                <td align="left" class="possition p-1">
                                                                    <span id="vehicle_model"></span>
                                                                </td>
                                                              
                                                            </tr>
                                                            <tr>
                                                                <td align="left" class="lblMediumBold possition p-1" style="width: 20%;">Vehicle Size
                                                                </td>
                                                                <td align="left" class="possition p-1" style="width: 80%;">
                                                                    <span id="vehicle_size"></span>
                                                                </td>
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td align="left" class="lblMediumBold possition p-1">Placement Type
                                                                </td>
                                                                <td align="left" class="possition p-1">
                                                                    <span id="Placement_type"></span>
                                                                </td>
                                                              
                                                            </tr>
                                                            <tr>
                                                                <td align="left" class="lblMediumBold possition p-1">Vehicle Capacity
                                                                </td>
                                                                <td align="left" class="possition p-1">
                                                                    <span id="vechile_capacity"></span>
                                                                </td>
                                                               
                                                            </tr>
                                                            
                                                        </tbody>
                                                </table>
                                            </div> 
                                    </div>
                                </div>
                           </div>
                        </div>
                    
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
  function getVehicle(vehicleId)
  {
         var base_url = '{{url('')}}';
         $.ajax({
           type: 'POST',
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
             },
           url: base_url + '/VehicleAttandanceData',
           cache: false,
           data: {
           'vehicleId':vehicleId
           }, 
            success: function(data) {
                const obj = JSON.parse(data);
                if(obj.Status==1)
                {
                    $("#vehicleId").val(obj.datas.id);
                   $('#branch_name').text(obj.datas.office_details.OfficeCode+'~'+obj.datas.office_details.OfficeName);
                   if(obj.datas.vendor_details!=null){
                    $('#vendor_name').text(obj.datas.vendor_details.VendorCode+'~'+obj.datas.vendor_details.VendorName);
                   }
                   if(obj.datas.vehicle_type_details!=null){
                    $('#vehicle_model').text(obj.datas.vehicle_type_details.VehicleType);
                    $('#vehicle_size').text(obj.datas.vehicle_type_details.VehSize);
                   }
                   $('#Placement_type').text(obj.datas.PlacementType);
                   if(obj.datas.vehicle_type_details!=null){
                   $('#vechile_capacity').text(obj.datas.vehicle_type_details.Capacity);
                   }
           
                }
                else{
                    alert("Vehicle Not Found");
                    $('#vehicle_no').val('');
                    $('#vehicle_no').focus();
                    $('#branch_name').text('');
                    $('#vendor_name').text('');
                    $('#vehicle_model').text('');
                    $('#vehicle_size').text('');
                    $('#Placement_type').text('');
                    $('#vechile_capacity').text('');
                   
                  // $('.tabels').html('');
                    return false;
                }
              }
            });
  }

  $("#checkAll").click(function () {
     $('.docketFirstCheck').not(this).prop('checked', this.checked);
 });


function SubmitVehicleAttandence(){

    if($('#rdate').val()==''){
        alert("Please Enter Reporting Date")
        return false;
    }

    if($('#vehicleId').val()==''){
        alert("Please Enter Vehicle No.")
        return false;
    }

    if($('#reporting_type').val()==''){
        alert("Please Enter Reporting Type")
        return false;
    }


    if($('#ReportingTime').val()==''){
        alert("Please Enter Reporting Time")
        return false;
    }
    var formData = new FormData();
   var rdate=  $('#rdate').val();
   var vehicle_no=  $('#vehicle_no').val();
   var vehicleId=  $('#vehicleId').val();
   var reporting_type=  $('#reporting_type').val();
   var Remarks=  $('#Remarks').val();
   var ReportingTime=  $('#ReportingTime').val();

    formData.append('rdate',rdate);

    formData.append('vehicle_no',vehicle_no);
    formData.append('vehicleId',vehicleId);
    formData.append('reporting_type',reporting_type);
    formData.append('ReportingTime',ReportingTime);
    formData.append('Remarks',Remarks);
    var base_url = '{{url('')}}';
         $.ajax({
           type: 'POST',
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
             },
           url: base_url + '/VehicleAttandancePost',
           cache: false,
           processData: false,
           contentType: false,
           data:formData, 
            success: function(data) {
                alert(data);
                location.reload();
            }
         });

}
 
  
    



  
</script>