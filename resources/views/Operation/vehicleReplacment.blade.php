@include('layouts.appTwo')
<style>
    .hideClass
    {
     display:none;
    }
</style>



<div class="generator-container allLists">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box main-title">
                <div class="page-title-right">
                    
                </div>
                <h4 class="page-title">VECHILE REPLACEMENT/BREAKDOWN</h4>
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
                                <div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                               
                                                <div class="tab-content" id="pills-tabContent">
                                                      <div class="tab-pane fade show active" id="pills-home" role="tabpanel"   aria-labelledby="pills-home-tab">
                                                        <div class="row">
                                                              
                                                            <div class="col-6">
                                                                <div class="row mb-1">
                                                                    <div class="col-12">
                                                                        <div class="row">
                                                                            <label class="col-md-4 col-form-label" for="gp_no">GP No<span
                                                                            class="error">*</span></label>
                                                                            <div class="col-md-8">
                                                                                 <input type="text" name="gp_number" id="gp_number" class="gp_number form-control" tabindex="1" onchange="getVehiclegatePass(this.value)">
                                                                                 <input type="text" name="gp_id" id="gp_id" class="gp_id form-control">
                                                                                 <input type="text" name="Vehicle" id="Vehicle" class="Vehicle form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="row">
                                                                            <label class="col-md-4 col-form-label" for="vechile_change_city">Incidence<span
                                                                            class="error">*</span></label>
                                                                            <div class="col-md-8">
                                                                             <select tabindex="2" class="form-control Incidence selectBox" name="Incidence" id="Incidence"  onchange="getFeildAccordIncid(this.value);">
                                                                            <option value="">--select--</option>
                                                                            <option value="1">Vehicle Replacement</option>
                                                                            <option value="2">Vehicle Breakdown</option>
                                                                            <option value="3">In Transit</option>
                                                                           
                                                                           </select>       
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 vechile_change_hide">
                                                                        <div class="row">
                                                                            <label class="col-md-4 col-form-label" for="vechile_change_city">Vehicle Change City<span
                                                                            class="error">*</span></label>
                                                                            <div class="col-md-8">
                                                                             <select tabindex="2" class="form-control vechile_change_city selectBox" name="vechile_change_city" id="vechile_change_city" value="" onclick="">
                                                                            <option value="">--select--</option>
                                                                           @foreach($OfficeMaster as $office)
                                                                            <option value="{{$office->id}}">{{$office->OfficeCode}}~{{$office->OfficeName}}</option>
                                                                            @endforeach
                                                                           
                                                                           </select>       
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-12 new_vechile_hide">
                                                                     <div class="row">
                                                                            <label class="col-md-4 col-form-label" for="new_vechile_number">New Vehicle Number<span
                                                                            class="error">*</span></label>
                                                                            <div class="col-md-8">
                                                                            <select tabindex="3" class="form-control new_vechile_number selectBox" name="new_vechile_number" id="new_vechile_number">   
                                                                            <option value="">--select--</option>
                                                                            @foreach($VehicleMaster as $vehicle)
                                                                             <option value="{{$vehicle->id}}">{{$vehicle->VehicleNo}}</option>
                                                                             @endforeach
                                                                             </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-12 new_driver_hide">
                                                                    
                                                                        <div class="row">
                                                                            <label class="col-md-4 col-form-label" for="new_driver_name">New Driver Name<span
                                                                            class="error">*</span></label>
                                                                            <div class="col-md-8">
                                                                               <select tabindex="4" class="form-control new_driver_name selectBox" name="new_driver_name" id="new_driver_name">
                                                                               <option value="">--select--</option>
                                                                               @foreach($DriverMaster as $driver)
                                                                              <option value="{{$driver->id}}">{{$driver->DriverName}}~{{$driver->License}}</option>
                                                                               @endforeach
                                                                             </select>
                                                                             
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                     <div class="col-12 reasonhide">
                                                                  
                                                                        <div class="row">
                                                                            <label class="col-md-4 col-form-label" for="reason">Reason<span
                                                                            class="error">*</span></label>
                                                                            <div class="col-md-8">
                                                                             <select tabindex="5" class="form-control reason selectBox" name="reason" id="reason" value="" onclick="">
                                                                            <option value="">--select--</option>
                                                                            @foreach($RepReason as $rep)
                                                                            <option value="{{$rep->id}}">{{$rep->Title}}</option>
                                                                            @endforeach
                                                                           
                                                                           </select>       
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 start_km_hide">
                                                                   
                                                                        <div class="row">
                                                                            <label class="col-md-4 col-form-label" for="start_km">Start Km<span
                                                                            class="error">*</span></label>
                                                                            <div class="col-md-8">
                                                                             <input type="text" tabindex="6" class="form-control start_km" name="start_km" id="start_km" value="">
                                                                           
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="row mb-1">
                                                                            <label class="col-md-4 col-form-label" for="password">Remark</label>
                                                                            <div class="col-md-8">
                                                                            <textarea rows="3" tabindex="7" class="form-control remark" name="remark" id="remark" ></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <label class="col-md-4 col-form-label pickupIn" for="password"></label>
                                                                        <input type="hidden" name="pickup" class="pickup" id="pickup">
                                                                        <input type="button" tabindex="8" value="Save" class="btn btn-primary btnSubmit mt-3" id="btnSubmit" onclick="SubmitVehicleReplacment()">
                                                                            <a href="{{url('PickupScan')}}" tabindex="9" class="btn btn-primary mt-3">Cancel</a>
                                                                    </div>
                                                                </div>
                                                            </div> 
                                                            <div class="col-6">

                                                                <table class="table table-bordered table-centered mb-1 ml-1 gatepassreceiving-table topay_table">
                                                                    <tbody>
                                                                        <tr class= "back-color">
                                                                            <td colspan="4" class="text-center">
                                                                               GatePass Details 
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="left" class="lblMediumBold possition back-color" nowrap="nowrap">GP Date
                                                                            </td>
                                                                            <td align="left"> 
                                                                                <span id="gp_date"></span>
                                                                            </td>
                                                                            <td class="back-color">
                                                                             GP No   
                                                                            </td>
                                                                             <td align="left"> 
                                                                                <span id="gp_no"></span>
                                                                            </td>
                                                                       
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="left" class="lblMediumBold possition Origin back-color" nowrap="nowrap">Origin
                                                                            </td>
                                                                            <td align="left" colspan="3"> 
                                                                                <span id="origin"></span>
                                                                            </td>
                                                                       
                                                                        </tr>
                                                                        <tr>
                                                                          <td align="left" class="destination back-color">
                                                                           Destination
                                                                        </td>
                                                                        <td align="left" colspan="3">
                                                                            <span id="destination"></span>
                                                                        </td>
                                                                        </tr>
                                                                        <tr>
                                                                        <td align="left" class="lblMediumBold possition vendor back-color" nowrap="nowrap">Vendor
                                                                        </td>
                                                                        <td align="left" colspan="3"> 
                                                                            <span id="vendor"></span>
                                                                        </td>
                                                                        
                                                                        </tr>
                                                                        <tr>
                                                                        <td align="left" class="lblMediumBold possition vechile_nVechile Number back-color">Vehicle Number
                                                                        </td>
                                                                        <td align="left" > 
                                                                            <span id="vechile_number_display"></span>
                                                                        </td>
                                                                         <td align="left" class="lblMediumBold possition seal_number back-color" nowrap="nowrap">Seal Number
                                                                        </td>
                                                                        <td align="left" > 
                                                                            <span id="seal_number"></span>
                                                                        </td>
                                                                        </tr>
                                                                        <tr>
                                                                        <td align="left" class="lblMediumBold possition driver_name back-color">Driver Name
                                                                        </td>
                                                                        <td align="left" class="ndr_reason" colspan="3">
                                                                            <span id="driver_name_display"></span>
                                                                        </td>
                                                                        
                                                                        
                                                                        </tr>
                                                                        <tr>
                                                                        <td align="left" class="lblMediumBold possition advanceToDrive back-color">Advance To Drive
                                                                        </td>
                                                                        <td align="left" class="advanceToDrive">
                                                                            <span id="advanceToDrive"></span>
                                                                        </td>
                                                                         <td align="left" class="lblMediumBold possition start_km back-color">Start Km
                                                                        </td>
                                                                        <td align="left" class="start_km">
                                                                            <span id="start_km_display"></span>
                                                                        </td>
                                                                        
                                                                        
                                                                        </tr>
                                                                        <tr>

                                                                        <td align="left" class="lblMediumBold possition reamrks back-color">Remarks
                                                                        </td>
                                                                        <td align="left" class="topay_amount" colspan="3">
                                                                            <span id="reamrks_display"></span>
                                                                        </td>
                                                                        
                                                                        </tr>
                                                                    </tbody>
                                                                </table>

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
                                 </div>
                               </div>
                           </div> <!-- tab-content -->
                        </div> <!-- end #basicwizard-->
                    </form>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="input-types-preview">
                            <div class="row tabels">
                            </div>
                        </div>
                    </div>

                </div> <!-- end card-body -->
            </div> <!-- end card-->
           
                 
              
      
        </div> <!-- end col -->
      

    </div>
</div>



<script type="text/javascript">
      $('select').select2();
    $('.datepickerOne').datepicker({
          format: 'yyyy-mm-dd',
          autoclose:true
      });
  function getFeildAccordIncid(inc)
  {
     if(inc==1)
     {
        $('.vechile_change_hide').removeClass('hideClass');
        $('.new_vechile_hide').removeClass('hideClass');
        $('.new_driver_hide').removeClass('hideClass');
        $('.start_km_hide').removeClass('hideClass');
      
     }
     else if(inc==2)
     {
        $('.vechile_change_hide').addClass('hideClass');
        $('.new_vechile_hide').addClass('hideClass');
        $('.new_driver_hide').addClass('hideClass');
        $('.start_km_hide').addClass('hideClass');    
     }
     else if(inc==3)
     {
        $('.vechile_change_hide').addClass('hideClass');
        $('.new_vechile_hide').addClass('hideClass');
        $('.new_driver_hide').addClass('hideClass');
        $('.start_km_hide').addClass('hideClass'); 
        $('.reasonhide').addClass('hideClass');    
     }
     else{
        $('.vechile_change_hide').removeClass('hideClass');
        $('.new_vechile_hide').removeClass('hideClass');
        $('.new_driver_hide').removeClass('hideClass');
        $('.start_km_hide').removeClass('hideClass');
        $('.reasonhide').removeClass('hideClass');    
     }
  }
  function getVehiclegatePass(gatePass)
  {
     var base_url = '{{url('')}}';
     $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/getVehicleGateDetailsById',
       cache: false,
       data: {
           'gatePass':gatePass
       },
       success: function(data) {
        const obj = JSON.parse(data);
        if(obj.status !='false')
       {
        
        $('#gp_date').text(obj.GP_TIME);
        $('#gp_no').text(obj.GP_Number);
        $('#origin').text(obj.route_master_details.statrt_point_details.CityName);
        $('#destination').text(obj.route_master_details.end_point_details.CityName);
        $('#vendor').text(obj.vendor_details.VendorName);
        $('#vechile_number_display').text(obj.vehicle_details.VehicleNo);
        $('#driver_name_display').text(obj.driver_details.DriverName+'( '+obj.driver_details.License+')');
        $('#advanceToDrive').text(obj.Driver_Adv);
        $('#start_km_display').text(obj.Start_Km);
        $('#reamrks_display').text(obj.Remark);
        $('#seal_number').text(obj.Seal);
        $('.gp_id').val(obj.id);
        $('.Vehicle').val(obj.vehicle_id);
      
       }
       else{
        alert(obj.message);
        $('.gp_number').val('');
        $('.gp_number').focus();
        $('#gp_date').text('');
        $('#gp_no').text('');
        $('#origin').text('');
        $('#destination').text('');
        $('#vendor').text('');
        $('#vechile_number_display').text('');
        $('#driver_name_display').text('');
        $('#advanceToDrive').text('');
        $('#start_km_display').text('');
        $('#reamrks_display').text('');
        $('#seal_number').text('');
        $('.gp_id').val('');
        $('.Vehicle').val('');
        return false;
       }
        
       }
     });
  }
  function SubmitVehicleReplacment()
  {
    if($('#gp_number').val()=='')
    {
        alert('Please Enter gatePass Number');
        return false;
    }
    if($('#Incidence').val()=='')
    {
        alert('Please select Incidence');
        return false;
    }
    var Incidence=$('#Incidence').val();
    if(Incidence==1)
    {
    if($('#vechile_change_city').val()=='')
    {
        alert('Please Select City');
        return false;
    }
    if($('#new_vechile_number').val()=='')
    {
        alert('Please select Vehicle Number');
        return false;
    }
  
    if($('#new_driver_name').val()=='')
    {
        alert('Please Enter Driver');
        return false;
    }
    if($('#reason').val()=='')
    {
        alert('Please Selelct Reason');
        return false;
    }
    if($('#start_km').val()=='')
    {
        alert('Select Start KM');
        return false;
    }
    if($('#remark').val()=='')
    {
        alert('Please Enter Remark');
        return false;
    }
   }
   if(Incidence==2)
    {
   
    if($('#reason').val()=='')
    {
        alert('Please Selelct Reason');
        return false;
    }
   
    if($('#remark').val()=='')
    {
        alert('Please Enter Remark');
        return false;
    }
   }
   if(Incidence==3)
    {
       if($('#remark').val()=='')
        {
            alert('Please Enter Remark');
            return false;
        }
    }
     if($('#gp_id').val()=='')
        {
            alert('Please Enter gate Pass id');
            return false;
        }
        if($('#Vehicle').val()=='')
        {
            alert('Please Enter Vehicle Id');
            return false;
        }
    

    
    var gp_number = $('#gp_number').val();
    var Incidence=$('#Incidence').val();
    var vechile_change_city=$('#vechile_change_city').val();
    var new_vechile_number=$('#new_vechile_number').val();
    var reason=$('#reason').val();
    var start_km=$('#start_km').val();
    var remark=$('#remark').val();
    var gp_id=$('#gp_id').val();
    var Vehicle=$('#Vehicle').val();
    var new_driver_name=$('#new_driver_name').val();
 
    var base_url = '{{url('')}}';
     $.ajax({
       type: 'POST',
       headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf"]').attr('content')
       },
       url: base_url + '/SubmitVehicleReplacment',
       cache: false,
       data: {
           'gp_number':gp_number,'Incidence':Incidence,'vechile_change_city':vechile_change_city,'new_vechile_number':new_vechile_number,'reason':reason,'remark':remark,'start_km':start_km,'gp_id':gp_id,'Vehicle':Vehicle,'new_driver_name':new_driver_name
       },
       success: function(data) {
        location.reload();
       }
     });
  }
</script>